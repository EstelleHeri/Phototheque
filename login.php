<?php
session_start();

include 'connexionbdd.php';

/* Si il clique sur le bouton connexion on regarde si les champs du formulaire ne sont pas vides.
On regarde aussi si le nom de compte et le mot de passe correspondent si c'est le cas on se connecte
sinon on recommence  */
if(isset($_POST['formconnexion']))
{
	$pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);
	if (!empty($pseudoconnect) AND !empty($mdpconnect)) 
	{
		$requser = $bdd -> prepare("SELECT * FROM membres WHERE pseudo = ? AND motdepasse = ?") ;
		$requser -> execute(array($pseudoconnect,$mdpconnect));
		$userexist = $requser -> rowCount();
		if ($userexist == 1)
		{
			$userinfo = $requser-> fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['pseudo'] = $userinfo['pseudo'];
			header("Location: profil.php?id=".$_SESSION['id']);
		}
		else
		{
			$message = "Mauvais pseudo ou mot de passe ! ";
		}
	}
	else 
	{
		$message = "Tous les champs doivent être complétés ! ";
	}
}
?>

<!DOCTYPE html>
<!-- HERIPRET Estelle
Page de connexion
 -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">

	<head>
	<meta charset="UTF-8"/>
	<title>Connexion</title>
	<meta name="author" content="Estelle Heripret"/>
	<link href="./css/style.css" type="text/css" rel="stylesheet" title="style_principal" />
	</head>

	<body>
		<?php include 'menu.php'; ?>
		<section>
			<div id="centrer">
				<h2>Connexion</h2>
				<a href="./registrer.php">Créer son compte</a>
				<br/>
				<br/>
				<!-- Formulaire de connexion -->
				<form method="POST" id="connect">
					<table>
						<tr>
							<td class="right">
								<label for="pseudo">Pseudo : </label>
							</td>
							<td>
								<input type="text" placeholder="Votre pseudo" name="pseudoconnect" id="pseudo"/>
							</td>
						</tr>
						
						<tr>
							<td class="right">
								<label for="mdp">Mot de Passe : </label>
							</td>
							<td>
								<input type="password" placeholder="Votre mot de passe" name="mdpconnect" id="mdp"/>
							</td>
						</tr>
						
						<tr>
							<td>
							</td>
							<td>
							<br/>
								<input type="submit" value="Connexion" name="formconnexion" />
							</td>
						</tr>
						
					</table>
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
