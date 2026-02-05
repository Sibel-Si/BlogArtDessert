<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../../functions/global.inc.php';
require_once __DIR__ . '/../../functions/ctrlSaisies.php';

if (!isset($_POST['pseudoMemb'], $_POST['passMemb'], $_POST['g-recaptcha-response'])) {
    header('Location: /views/backend/security/login.php');
    exit;
}

$pseudo = ctrlSaisies($_POST['pseudoMemb']);
$pass   = ctrlSaisies($_POST['passMemb']);
$captchaRes = $_POST['g-recaptcha-response'];

if ($pseudo === '' || $pass === '') {
    $_SESSION['login_error'] = "Champs obligatoires manquants.";
    header('Location: /views/backend/security/login.php');
    exit;
}

$secretKey = "6LcBgWAsAAAAAPOCwFqU7RpKNOrAZV6tagbaKL5S";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'secret'   => $secretKey,
    'response' => $captchaRes
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$captchaSuccess = json_decode($response);

if (!$captchaSuccess->success || $captchaSuccess->score < 0.5) {
    $_SESSION['login_error'] = "Vérification reCAPTCHA échouée.";
    header('Location: /views/backend/security/login.php');
    exit;
}

$membre = sql_select(
    'membre',
    '*',
    "pseudoMemb = '$pseudo'"
);

if (!$membre || count($membre) !== 1) {
    $_SESSION['login_error'] = "Pseudo ou mot de passe incorrect.";
    header('Location: /views/backend/security/login.php');
    exit;
}

if ($pass !== $membre[0]['passMemb']) {
    $_SESSION['login_error'] = "Pseudo ou mot de passe incorrect.";
    header('Location: /views/backend/security/login.php');
    exit;
}

$_SESSION['id_user '] = $membre[0]['numMemb'];
$_SESSION['pseudoMemb'] = $membre[0]['pseudoMemb'];
$_SESSION['numStat'] = (int)$membre[0]['numStat'];

header('Location: /');
exit;