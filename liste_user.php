<?php
session_start();

include 'connexionbdd.php';

/* Si l'utilisateur est connecté affiche la page sinon ... */
if(isset($_SESSION['id']))
{
	$getid = intval($_GET['id']);
	$requser = $bdd -> query("SELECT * FROM membres");
	$usersinfo = $requser->fetchAll();
?>

<!DOCTYPE html>
<!-- HERIPRET Estelle
Page des utilisateurs enregistrés -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">

	<head>
	<meta charset="UTF-8"/>
	<title>Utilisateurs enregistrés</title>
	<meta name="author" content="Estelle Heripret"/>
	<link href="./css/style.css" type="text/css" rel="stylesheet" title="style" />
	</head>

	<body>
		<?php include 'menu.php'; ?>
		<section>
			<div id="centrer">
				<h2>Listes des utilisateurs enregistrés</h2>
				<br/>
				<?php
				foreach ($usersinfo as $userinfo)
				{
					echo 'Pseudo : '.$userinfo['pseudo'].'<br/>';

				}
				?>
			</div>
		</section>
		<?php include 'piedpage.php'; ?>
	</body>
</html>
<?php
}
/* .. retourne à la page de connexion */
else
{
	header("Location: login.php");
}
?>
