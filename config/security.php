<?php
if (session_status() === PHP_SESSION_NONE) session_start();

// Define constant for login status
define('IS_LOGGED_IN', isset($_SESSION['id_user']));

/**
 * Check access for pages and set alert if not logged in
 */
function check_access($allowed_levels = []) {
    if (!IS_LOGGED_IN) {
        $_SESSION['login_alert'] = "Veuillez vous connecter pour voir cette page.";
        header('Location: /views/backend/security/login.php');
        exit;
    }

    if (!empty($allowed_levels)) {
        if (!in_array($_SESSION['numStat'], $allowed_levels)) {
            header('Location: /?error=unauthorized');
            exit;
        }
    }
}

/**
 * API Protection: Call this at the start of API files
 * Returns a 403 error instead of a redirect (better for AJAX/APIs)
 */
function check_api_access($allowed_levels = []) {
    if (!IS_LOGGED_IN || (!empty($allowed_levels) && !in_array($_SESSION['numStat'], $allowed_levels))) {
        header('HTTP/1.1 403 Forbidden');
        echo json_encode(['error' => 'Access Denied']);
        exit;
    }
}