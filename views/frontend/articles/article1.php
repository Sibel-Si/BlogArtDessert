<?php
require_once '../../../header.php';
?>
<?php

// Get the article ID from URL parameter
$numArt = isset($_GET['numArt']) ? (int)$_GET['numArt'] : 0;

// Validate article ID exists before querying
if ($numArt <= 0) {
    header("Location: list.php");
    exit;
}

// Fetch the specific article to view
$article = sql_select("ARTICLE", "*", "numArt = $numArt");
$article = !empty($article) ? $article[0] : null;

if (!$article) {
    header("Location: list.php");
    exit;
}

$libTitrArt = $article['libTitrArt'] ?? "Titre de l'article";
$dtCreaArt = $article['dtCreaArt'] ??"date de création";
$libChapoArt = $article['libChapoArt'] ?? "chapeau de l'article";
$libAccrochArt = $article['libAccrochArt'] ?? "accroche";
$parag1Art = $article['parag1Art'] ?? "Premier paragraphe";
$libSsTitr1Art = $article['libSsTitr1Art'] ?? "Premier sous-titre";
$parag2Art = $article['parag2Art'] ?? "Deuxième paragraphe";
$libSsTitr2Art = $article['libSsTitr2Art'] ?? "Second sous-titre";
$parag3Art = $article['parag3Art'] ?? "Troisième paragraphe";
$libConclArt = $article['libConclArt'] ?? "Conclusion de l'article";
$imagePath = $article['urlPhotArt'] ?? "/src/uploads/default.png";

// Fetch necessary data from the database
$themes = sql_select("THEMATIQUE", "*", "numArt = $numArt");

$numThem = $article['libChapoArt'] ?? 0;
$theme = $themes['numThem'] ?? "Thématique par défaut";

$numMotCles = sql_select("MOTCLEARTICLE", "*", "numArt = $numArt");
$motscles = sql_select("MOTCLE", "*", "numMotCle = $numMotCles");

?>

<main class="container">
	<article class="article-template">
		<h1><?php echo esc($title); ?></h1>

		<p class="meta">Publié le <time datetime="<?php echo esc($created_at); ?>"><?php echo esc($displayDate); ?></time></p>

		<p class="chapeau"><strong>Chapeau:</strong> <?php echo esc($chapeau); ?></p>

		<p class="accroche"><em>Accroche:</em> <?php echo esc($accroche); ?></p>

		<section>
			<p><?php echo nl2br(esc($paragraph1)); ?></p>
		</section>

		<h2><?php echo esc($subtitle1); ?></h2>
		<section>
			<p><?php echo nl2br(esc($paragraph2)); ?></p>
		</section>

		<h2><?php echo esc($subtitle2); ?></h2>
		<section>
			<p><?php echo nl2br(esc($paragraph3)); ?></p>
		</section>

		<section class="conclusion">
			<h3>Conclusion</h3>
			<p><?php echo nl2br(esc($conclusion)); ?></p>
		</section>

		<aside class="meta-data">
			<p><strong>Thématique:</strong> <?php echo esc($theme); ?></p>
			<p><strong>Mots-clés:</strong> <?php echo $keywordsStr; ?></p>
		</aside>

		<figure>
			<img src="<?php echo esc($imagePath); ?>" alt="<?php echo esc($imageAlt); ?>" style="max-width:100%;height:auto;">
			<figcaption><?php echo esc($imageCaption); ?></figcaption>
		</figure>
	</article>
</main>

<?php
require_once '../../../footer.php';
?>