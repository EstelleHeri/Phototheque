<?php
session_start();
?>
<!DOCTYPE html>
<!-- HERIPRET Estelle
Page d'accueil 
 -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">

	<head>
	<meta charset="UTF-8"/>
	<title>Photothèque</title>
	<meta name="author" content="Estelle Heripret"/>
	<link href="./css/style.css" type="text/css" rel="stylesheet" title="style_principal" />
	<script src="./scripts/mini_diapo.js"></script>
	</head>

	<body>
		<?php include 'menu.php'; ?>
		<section>
			<article>
				<h2>Bienvenue !</h2>
				<br/>
				<div class="mini-slider">
					<img id="slides" src="./images2/thumbnails/th-JKe5DL.jpg" alt="image" />
				</div>
				<br/>
				<p>Ce site vous propose une sélection d'images toutes libres de droits.</p>
				<p>Vous pouvez sélectionner les photographies par catégorie ou via la barre de recherche en tapant 
				un mot clé, un auteur, etc.</p>
				<p>Nous vous proposons aussi un espace membre où vous pouvez créer votre compte et ainsi pouvoir créer
				votre propre photothèque et voir les photothèques des autres utilisateurs enregistrés.</p>
				<p>Bonne visite !</p>
			</article>
		</section>		
		<?php include 'piedpage.php'; ?>
	</body>
</html>

