<?php
if (session_status() === PHP_SESSION_NONE) session_start();

// Define a constant to check if logged in anywhere in the app
define('IS_LOGGED_IN', isset($_SESSION['id_user']));

/**
 * Call this function at the top of any page that needs protection.
 * @param array $allowed_levels Example: [1, 2]
 */
function check_access($allowed_levels = []) {
    if (!IS_LOGGED_IN) {
        
        header('Location: /views/backend/security/login.php');
        exit;
    }

    if (!empty($allowed_levels)) {
        if (!in_array($_SESSION['numStat'], $allowed_levels)) {
            // Redirect to home if they don't have the right rank
            header('Location: /?error=unauthorized');
            exit;
        }
    }
}
?>