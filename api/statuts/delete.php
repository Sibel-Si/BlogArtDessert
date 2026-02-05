<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$numStat = ($_POST['numStat']);

// Check if the thematique is being used by any article
$membreWithStat = sql_select('MEMBRE', 'COUNT(*) as count', "numStat = $numStat");
$membreCount = $membreWithStat[0]['count'] ?? 0;

if ($membreCount > 0) {
    // Thematique cannot be deleted because it's associated with articles
    $_SESSION['error_message'] = "Impossible de supprimer ce statut : $membreCount membre(s) utilise(nt) ce statut.";
    header('Location: ../../views/backend/thematiques/delete.php?numStat=' . $numStat);
    exit();
}

sql_delete('STATUT', "numStat = $numStat");


header('Location: ../../views/backend/statuts/list.php');