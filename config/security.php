<?php
/**
 * Check if user is logged in with SESSION
 */
session_start();

if(isset($_SESSION["USER_ID"])){ //trouver le nom donné dans login.php et l'utiliser dans les guillemets
    header("Location : index.php");
    exit();
}

 // hint : $_SESSION['USER_ID']
 // define constant ID_USER if user is logged in with define function

?>