<?php
session_start();
include 'connexionbdd.php';

/* Selectionne les images correspondant au mot recherché */
$requete = htmlspecialchars($_POST['mots']);
$req = $bdd -> query("SELECT * FROM image WHERE auteur='$requete' OR motscles like '%$requete%'") ;

$nbimgparlignes = 5;// nombre d'images maximum par ligne
$numimgligne = 0;// numéro de l'image 
?>
<!DOCTYPE html>
<!-- HERIPRET Estelle
Page de recherche -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">

	<head>
	<meta charset="UTF-8"/>
	<title>Photothèque</title>
	<meta name="author" content="Estelle Heripret"/>
	<link href="./css/style_photos.css" type="text/css" rel="stylesheet" title="style_photos" />
	<script src="./scripts/diaporama.js"></script>
	</head>

	<body>
		<div id="overlay" title="fermer"> 
		</div>
		<?php include 'menu.php'; ?>
		
		<!-- Affichage des vignettes + informations des images -->
		<section>
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
				<div class="info"><img src="<?php echo './images2/thumbnails/'.$info['nom'] ?>" />
				<span>
						<h1 id="titrephoto"><?php echo $info['titre'] ?></h1>
						<?php
						/* Seulement si l'utilisateur est connecté, il peut ajouter une image à 
						sa photothèque */
						if(isset($_SESSION['id']))
						{					
							echo '
							<form method="post" action="ajoutimg.php">
								<button name="ajouter" type="submit">Ajouter image</button>
							</form>
							<br/>';
						}
						?>
						<b>Auteur : </b><?php echo $info['auteur'] ?> <br/>
						<a href="<?php echo $info['urlauteur'] ?>"><b>Page web auteur</b></a> <br/><br/>
						<a href="<?php echo $info['urlphoto'] ?>"><b>Image originale</b></a> <br/>
						<b>Dimensions : </b><?php echo $info['dimension'] ?> px <br/>
						<b>Type MIME : </b><?php echo $info['mime'] ?><br>
						<b>Type de licence CC : </b><?php echo $info['typelicence'] ?> <br/><br/>
						<b>Catégorie(s) : </b><?php echo $info['categorie'] ?> <br/>
						<b>Mots clés : </b><?php echo $info['motscles'] ?> <br/>
				</span>
				</div>
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
