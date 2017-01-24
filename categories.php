<?php
session_start();
include 'connexionbdd.php';
?>
<!DOCTYPE html>
<!-- HERIPRET Estelle 
Page des catégories des images 
-->
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">

	<head>
	<meta charset="UTF-8"/>
	<title>Categories</title>
	<meta name="author" content="Estelle Heripret"/>
	<link href="./css/style_album.css" type="text/css" rel="stylesheet" title="style_album" />
	</head>

	<body>	
		<?php include 'menu.php'; ?>
		<section>
			<table id="album">
				<tbody>
					<tr>
						<th>
							<a href="./animaux.php"> <img src="images2/thumbnails/th-2xjZyl.jpg" alt="animaux"/></a>
						</th>
						<th>
							<a href="./paysages.php"> <img src="images2/thumbnails/th-JKe5DL.jpg" alt="paysages"/></a>
						</th>
					</tr>
					<tr>
						<td><b>Animaux</b></td>
						<td><b>Paysages</b></td>
					</tr>
				</tbody>
			</table>	
		</section>
		<?php include 'piedpage.php'; ?>
	</body>
</html>
