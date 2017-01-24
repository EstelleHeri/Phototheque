<?php
/* HERIPRET Estelle
En-tête, menu et barre de recherches
*/
echo
'
	<header>
		Photothèque
	</header>
	<div id="menu">
		<ul>
			<li class="bouton_gauche"> <a href="./accueil.php">Accueil</a></li>
			<li class="bouton_gauche"> <a href="./categories.php">Catégories</a></li>
			<li class="bouton_gauche"> <a>Profil</a>
				<ul>
					<li class="sous_menu"> <a href="./profil.php?id='.$_SESSION['id'].'">Mon Profil</a></li>
					<li class="sous_menu"> <a href="./maphototheque.php">Ma photothèque</a></li>
				</ul>
			</li>
			<li class="bouton_droit"> <a href="./login.php">Se connecter</a></li>
		</ul>
	</div>
	<form id="barre" method="POST" action="page_recherche.php" >
		<input type="search" placeholder="Ici les mots recherchés" id="mots" name="mots" />
		<button type="submit" name="rechercher">Rechercher</button>
	</form>
';
?>
