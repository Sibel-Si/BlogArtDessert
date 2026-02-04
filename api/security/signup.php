<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/pdo.php'; // connexion PDO

// Vérifier que le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération des champs
    $pseudo     = trim($_POST['pseudoMemb']);
    $prenom     = trim($_POST['prenomMemb']);
    $nom        = trim($_POST['nomMemb']);
    $email      = trim($_POST['emailMemb']);
    $email2     = trim($_POST['emailMembConfirm']);
    $pass       = $_POST['passMemb'];
    $pass2      = $_POST['passMembConfirm'];
    $consent    = $_POST['consent'] ?? null;

    // Vérifications
    $errors = [];

    if ($email !== $email2) {
        $errors[] = "Les emails ne correspondent pas.";
    }

    if ($pass !== $pass2) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    if ($consent !== "oui") {
        $errors[] = "Vous devez accepter la conservation des données.";
    }

    if (!empty($errors)) {
        // Affichage simple (à remplacer par un système de flash messages si tu veux)
        foreach ($errors as $e) {
            echo "<p style='color:red;'>$e</p>";
        }
        exit;
    }

    // Hash du mot de passe
    $passHash = password_hash($pass, PASSWORD_DEFAULT);

    // Insertion en base
    try {
        $sql = "INSERT INTO membre 
                (pseudoMemb, prenomMemb, nomMemb, emailMemb, passMemb, consentMemb, dtCreaMemb)
                VALUES 
                (:pseudo, :prenom, :nom, :email, :pass, :consent, NOW())";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':pseudo'   => $pseudo,
            ':prenom'   => $prenom,
            ':nom'      => $nom,
            ':email'    => $email,
            ':pass'     => $passHash,
            ':consent'  => ($consent === "oui") ? 1 : 0
        ]);

        // Redirection après succès
        header("Location: /views/backend/security/login.php?signup=success");
        exit;

    } catch (PDOException $e) {
        // Gestion des erreurs (ex : pseudo ou email déjà pris)
        echo "<p style='color:red;'>Erreur : " . $e->getMessage() . "</p>";
        exit;
    }
}
?>