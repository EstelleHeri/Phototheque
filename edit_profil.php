<?php
session_start();

include 'connexionbdd.php';

/* Si l'utilisateur est connecté alors il peut modifier son compte sinon ...
*/
/*
Si l'utilisateur clique sur le bouton "mettre à jour !" alors qu'il na rien changé il retourne sur son profil.
Il peut modifier son pseudo et son mot de passe qui doit taper deux fois pour confirmer.
 */
if(isset($_SESSION['id'])) {
	$requser = $bdd ->prepare("SELECT * FROM membres WHERE id=?");
	$requser->execute(array($_SESSION['id']));
	$user = $requser->fetch();
	
	if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) 
	{
		$newpseudo = htmlspecialchars($_POST['newpseudo']);
		$insertpseudo = $bdd->prepare("UPDATE membres SET pseudo=? WHERE id=?");
		$insertpseudo->execute(array($newpseudo, $_SESSION['id']));
		header('Location: profil.php?id='.$_SESSION['id']);
	}
	
	if(isset($_POST['newmdpasse']) AND !empty($_POST['newmdpasse'])
		AND isset($_POST['newmdpasse2']) AND !empty($_POST['newmdpasse2']))
	{
		$mdp1 = sha1($_POST['newmdpasse']);
		$mdp2 = sha1($_POST['newmdpasse2']);
		
		if ($mdp1 == $mdp2) {
			$insertmdp = $bdd->prepare("UPDATE membres SET motdepasse=? WHERE id=?");
			$insertmdp->execute(array($mdp1, $_SESSION['id']));
			header('Location: profil.php?id='.$_SESSION['id']);
		}
		else {
			$message = "Vos deux mots de passes ne correspondent pas ! ";
		}
	}
	
	if(isset($_POST['newpseudo']) AND $_POST['newpseudo']== $user['pseudo'] 
		AND empty($_POST['newmdpasse']) AND empty($_POST['newmdpasse2']))
	{
		header('Location: profil.php?id='.$_SESSION['id']);
	}

?>

<!DOCTYPE html>
<!-- HERIPRET Estelle
Page d'edition du profil 
-->
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">

	<head>
	<meta charset="UTF-8"/>
	<title>Edition du Profil</title>
	<meta name="author" content="Estelle Heripret"/>
	<link href="./css/style.css" type="text/css" rel="stylesheet" title="style" />
	</head>

	<body>
		<?php include 'menu.php'; ?>
		<section>
			<div id="centrer">
				<h2>Edition du Profil</h2>
				<br/>
				<!-- Formulaire d'edition du profil -->
				<form method="POST">
					<label>Pseudo :</label>
					<input type="text" name="newpseudo" value="<?php echo $user['pseudo']; ?>"/></br>
					<label>Mot de passe :</label>
					<input type="password" name="newmdpasse" placeholder="Nouveau mot de passe"/></br>
					<label>Confirmation du mot de passe :</label>
					<input type="password" name="newmdpasse2" placeholder="Confirmation mdpasse"/></br>
					<input type="submit" value="Mettre à jour ! "/>
				</form>
				<?php 
					if(isset($message)) 
					{
						echo '<span>'.$message.'</span>';
					} 
				?>
			</div>
		</section>
		<?php include 'piedpage.php'; ?>
	</body>
</html>
<?php
}
/* ... il est redirigé vers la page de connexion */
else
{
	header("Location: login.php");
}
?>
