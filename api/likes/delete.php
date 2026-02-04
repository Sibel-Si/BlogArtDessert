<?php
session_start();
require_once 'functions/your_script_name.php';

// Define the required level (e.g., 1 for Admin, 2 for Moderator)
$required_level = 1; 

if (!check_access($required_level)) {
    // Redirect unauthorized users to login or an error page
    header("Location: login.php?error=unauthorized");
    exit(); // Always exit after a header redirect
}

// Це API файл
// Він не показує HTML
// Він отримує дані з форми і видаляє рядок з БД

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php'; // конфіг і з’єднання з БД
require_once '../../functions/ctrlSaisies.php';         // функції захисту/перевірок

// 1) Забираємо numMemb з POST
$numMemb = (int)($_POST['numMemb'] ?? 0);

// 2) Забираємо numArt з POST
$numArt  = (int)($_POST['numArt'] ?? 0);

// 3) Видаляємо рядок із likeart
// Важливо: видаляємо саме по двох ключах
// Бо в likeart немає одного id
sql_delete(
    "likeart",
    "numMemb = $numMemb AND numArt = $numArt"
);

// 4) Повертаємося назад на список
header('Location: ../../views/backend/likes/list.php');
