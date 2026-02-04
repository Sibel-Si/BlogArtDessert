<?php
include '../../../header.php';
?>
<div class="container mt-5" style="max-width: 500px;">

    <h2 class="mb-4 text-center">
        <i class="bi bi-person-plus"></i> Inscription
    </h2>

    <form method="post" action="/api/security/signup.php">

        <!-- PSEUDO -->
        <label class="form-label">Pseudo (non modifiable)</label>
        <input type="text" name="pseudoMemb" class="form-control" required >

        <!-- PRENOM -->
        <label class="form-label mt-3">Prénom</label>
        <input type="text" name="prenomMemb" class="form-control" required>

        <!-- NOM -->
        <label class="form-label mt-3">Nom</label>
        <input type="text" name="nomMemb" class="form-control" required>

        <!-- EMAIL -->
        <label class="form-label mt-3">E-mail</label>
        <input type="email" name="emailMemb" class="form-control" required>

        <!-- CONFIRM EMAIL -->
        <label class="form-label mt-3">Confirmez e-mail</label>
        <input type="email" name="emailMembConfirm" class="form-control" required>

        <!-- PASSWORD -->
        <label class="form-label mt-3">Mot de passe</label>
        <input type="password" name="passMemb" class="form-control" required>

        <!-- CONFIRM PASSWORD -->
        <label class="form-label mt-3">Confirmez mot de passe</label>
        <input type="password" name="passMembConfirm" class="form-control" required>

        <!-- AFFICHER MDP -->
        <div class="form-check mt-2">
            <input class="form-check-input" type="checkbox" id="showPass" onclick="togglePassword()">
            <label class="form-check-label" for="showPass">
                Afficher MDP
            </label>
        </div>

        <!-- CONSENTEMENT -->
        <label class="form-label mt-4">J’accepte que mes informations soient conservées</label>
        <div class="d-flex gap-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="consent" value="oui" required>
                <label class="form-check-label">Oui</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="consent" value="non" required>
                <label class="form-check-label">Non</label>
            </div>
        </div>

        <!-- CAPTCHA (placeholder) -->
        <div class="mt-3">
            <button type="button" class="btn btn-light w-100" disabled>
                Captcha
            </button>
        </div>

        <!-- SUBMIT -->
        <div class="mt-4">
            <button type="submit" class="btn btn-primary w-100">
                Créer mon compte
            </button>
        </div>

        <!-- LOGIN -->
        <div class="text-center mt-3">
            <a href="/views/backend/security/login.php">
                Déjà un compte ? Se connecter
            </a>
        </div>

    </form>
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