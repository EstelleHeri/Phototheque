<?php
session_start();

include 'connexionbdd.php';

/* Si un utilisateur est connecté on continue ... */
if(isset($_GET['id']) AND ($_GET['id'] > 0))
{
	$getid = intval($_GET['id']);
	$requser = $bdd -> prepare("SELECT * FROM membres WHERE id = ?");
	$requser -> execute(array($getid));
	$userinfo = $requser->fetch();
?>

<!DOCTYPE html>
<!-- HERIPRET Estelle
Page du profil de l'utilisateur enregistré
 -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">

	<head>
	<meta charset="UTF-8"/>
	<title>Profil</title>
	<meta name="author" content="Estelle Heripret"/>
	<link href="./css/style.css" type="text/css" rel="stylesheet" title="style" />
	</head>

	<body>
		<?php include 'menu.php'; ?>
		<section>
			<div id="centrer">
				<h2>Mon Profil</h2>
				<br/>
				Votre Pseudo est :
				<?php
					echo '<b>'.$userinfo['pseudo'].'</b>';
				?>
				<br/>
				<br/>
				<?php
				/* si l'utilsateur connecté est sur sa page de profil alors il peut voir 
				les informations suivantes : voir sa photothèque, voir les utilisateurs enregistrés, editer son
				profil et se déconnecter */
				if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
				{
				?>
				<a href="./maphototheque.php">Voir ma Photothèque</a>
				<br/>
				<br/>
				<a href="./liste_user.php">Voir utilisateurs enregistrés</a>
				<br/>
				<br/>
				<a href="./edit_profil.php">Editer mon profil</a> 
				<a href="./logout.php">Se déconnecter</a>
				<?php
				}
				?>
			</div>
		</section>
		<?php include 'piedpage.php'; ?>
	</body>
</html>
<?php
}
/* ...sinon on est redirgé vers la page de connexion */
else
{
	header("Location: login.php");
}
?>
