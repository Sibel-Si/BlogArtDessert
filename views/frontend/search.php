<?php
require_once '../../header.php';
echo ("Recherche");
?>

<!-- <h1>Recherche Avancée</h1> -->

<h2>Rechercher par mots clés</h2>
<?php 
//SELECT * FROM article WHERE libTitrArt LIKE '%n%';

if(isset($_GET("libMotCle"))){
    $rechercheTitr = $_GET("libMotCle");
}
$motcle = sql_select("ARTICLE", "*", "LIKE %".$rechercheTitr."%")
?>

<!-- <h2>Rechercher par thèmes</h2>

<h2>Recherche libre</h2> -->
<p></p>

<?php
require_once '../../footer.php';
?>