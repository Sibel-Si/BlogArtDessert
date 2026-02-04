<?php
require_once '../../header.php';

?>
<!-- <h1>Recherche Avancée</h1>
<h2>Rechercher par thèmes</h2>
<h2>Recherche libre</h2> -->

<br/>
<!--search bar de la page-->
<h2>Rechercher par mots clés</h2>
<br />
    <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Rechercher sur le site..." aria-label="Search" value ="<?php echo isset($_POST['recherche']) ? $_POST['recherche'] : '' ?>">
        <button class="btn btn-fonce" type="submit">Recherche avancée</button>
        </form>
    </div>
    </nav>

<!--tableau d'affichage-->
<table class="table">
<thead>
    <tr>
        <th scope="col">Résultats Mots Clés</th>
    </tr>
</thead>
<tbody>
    <tr>
        <th scope="row">1</th>
        <td><?php echo($recherFinal) ?></td>
    </tr>
</tbody>
</table>

<?php 

//SELECT * FROM article WHERE libTitrArt LIKE '%n%';

$motcle= isset($_POST["recherche"]);

//si motcle existe, on la place dans une variable
if(isset($motcle)){
    $rechercheTitr = $motcle["recherche"];
    $recherFinal = sql_select("ARTICLE", "*", "libTitrArt LIKE '%$rechercheTitr%'");
    echo($recherFinal);
}

?>

<?php
require_once '../../footer.php';
?>