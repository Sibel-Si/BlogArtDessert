<?php
include '../../../header.php';
?>
<div class="container mt-5" style="max-width: 500px;">

<<<<<<< Updated upstream
    <h2 class="mb-4 text-center">
        <i class="bi bi-person-plus"></i> Inscription
    </h2>

    <form method="post" action="/api/security/signup.php">

        <label class="form-label">Pseudo (non modifiable)</label>
        <input type="text" name="pseudoMemb" class="form-control" required>

        <label class="form-label mt-3">Prénom</label>
        <input type="text" name="prenomMemb" class="form-control" required>

        <label class="form-label mt-3">Nom</label>
        <input type="text" name="nomMemb" class="form-control" required>

        <label class="form-label mt-3">E-mail</label>
        <input type="email" name="emailMemb" class="form-control" required>

        <label class="form-label mt-3">Confirmez e-mail</label>
        <input type="email" name="emailMembConfirm" class="form-control" required>

        <label class="form-label mt-3">Mot de passe</label>
        <input type="password" name="passMemb" class="form-control" required>

        <label class="form-label mt-3">Confirmez mot de passe</label>
        <input type="password" name="passMembConfirm" class="form-control" required>

        <label class="form-label mt-3">J'accepte que mes informations soient conservées</label>
        <div class="d-flex gap-3">
            <div>
                <input type="radio" id="accordOui" name="accordMemb" value="1" required>
                <label for="accordOui">Oui</label>
            </div>
            <div>
                <input type="radio" id="accordNon" name="accordMemb" value="0" required>
                <label for="accordNon">Non</label>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success w-100">Créer mon compte</button>
        </div>

    </form>
=======
<!-- CARAMEL MAIN BAND WITH "NOM DU BLOG" -->
<div class="main-caramel-band">
    <h2>INSCRIPTIONS</h2>
</div>

<div class="form-container">
    <div class="form-card">
        <h3>👤 Créer un Compte</h3>
        
        <form action="<?php echo ROOT_URL . '/api/members/create.php' ?>" method="post" onsubmit="return validateSignupForm()">
            
            <div class="form-group">
                <label for="pseudo">Pseudo *</label>
                <input id="pseudo" name="pseudo" type="text" placeholder="Choisissez votre pseudo" required />
            </div>

            <div class="form-group">
                <label for="firstName">Prénom *</label>
                <input id="firstName" name="firstName" type="text" placeholder="Votre prénom" required />
            </div>

            <div class="form-group">
                <label for="lastName">Nom *</label>
                <input id="lastName" name="lastName" type="text" placeholder="Votre nom" required />
            </div>

            <div class="form-group">
                <label for="email">E-Mail *</label>
                <input id="email" name="email" type="email" placeholder="Votre adresse e-mail" required />
            </div>

            <div class="form-group">
                <label for="password">Mot de Passe *</label>
                <input id="password" name="password" type="password" placeholder="Entrez un mot de passe sécurisé" required />
            </div>

            <div class="captcha-box">
                🔒 Captcha - Vérification de sécurité
            </div>

            <?php if(isset($_SESSION['error_message'])): ?>
                <div style="background-color: #ffcccc; border: 2px solid #cc0000; padding: 12px; border-radius: 8px; color: #cc0000; margin: 15px 0;">
                    <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
                </div>
            <?php endif; ?>

            <?php if(isset($_SESSION['success_message'])): ?>
                <div style="background-color: #ccffcc; border: 2px solid #00cc00; padding: 12px; border-radius: 8px; color: #00cc00; margin: 15px 0;">
                    <?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
                </div>
            <?php endif; ?>

            <div class="form-buttons">
                <button type="submit" class="btn-create">Create</button>
                <a href="login.php" class="btn-already">Déjà un compte ?</a>
            </div>
        </form>
    </div>
>>>>>>> Stashed changes
</div>

<script>
function togglePassword() {
    const pass1 = document.querySelector('input[name="passMemb"]');
    const pass2 = document.querySelector('input[name="passMembConfirm"]');

    pass1.type = (pass1.type === 'password') ? 'text' : 'password';
    pass2.type = (pass2.type === 'password') ? 'text' : 'password';
}
</script>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
?>
=======
    if (pseudo === '' || firstName === '' || lastName === '' || email === '' || password === '') {
        alert('Tous les champs sont obligatoires.');
        return false;
    }
    if (!email.includes('@')) {
        alert('Veuillez entrer une adresse e-mail valide.');
        return false;
    }
    if (password.length < 6) {
        alert('Le mot de passe doit contenir au moins 6 caractères.');
        return false;
    }
    return true;
}
</script>

<?php require_once '../../../footer.php'; ?>
>>>>>>> Stashed changes
