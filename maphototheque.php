<?php
session_start();
include 'connexionbdd.php';

/* Selection des images de l'utilisateur si connecté sinon ... */
if(isset($_SESSION['id'])) {
$req = $bdd -> query("SELECT * FROM imagesusers WHERE id={$_SESSION['id']}");

$nbimgparlignes = 5;// nombre d'images maximum par ligne
$numimgligne = 0;// numéro de l'image 
?>
<!DOCTYPE html>
<!-- HERIPRET Estelle
Photothèque de l'utilisateur connecté -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">

	<head>
	<meta charset="UTF-8"/>
	<title>Photothèque</title>
	<meta name="author" content="Estelle Heripret"/>
	<link href="./css/style_photos.css" type="text/css" rel="stylesheet" title="style_photos" />
	</head>

	<body>
		<?php include 'menu.php'; ?>
		<section>
			<!-- Affichage des vignettes -->
			<div id = "photos">
			<?php 
			echo
				"<table>
				<tr>";
			$infos = $req-> fetchAll();
			foreach ($infos as $info) {
				if ($numimgligne>= $nbimgparlignes) {
					echo 
					"</tr>
					<tr>";
					$numimgligne = 0;
				}
				$numimgligne++;
				echo 
				"<td>";
			?>
			<img src="./images2/thumbnails/<?php echo $info['nom'] ?>" />
			<?php 	
			echo 
			"</td>";
			}
			$req->closeCursor();
			echo 
			"</tr> 
			</table>";
			?>
			</div>
		</section>
		<?php include 'piedpage.php'; ?>
	</body>
</html>	
<?php
}
/* ... retourne à la page de connexion */
else {
	header("Location: login.php");
}
?>
