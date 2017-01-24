<?php

include 'connexionbdd.php';

/* Si il clique sur le bouton "je m'inscris" on regarde si les champs du formulaire ne sont pas vides.
On regarde aussi si les mots de passes correspondent si c'est le cas on crée le compte et on connecte l'utilisateur
sinon on renvoit un message d'erreur */
if(isset($_POST['forminscription']))
{
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$mdp = sha1($_POST['mdp']);
	$mdp2 = sha1($_POST['mdp2']);
		
	if(!empty($_POST['pseudo']) and !empty($_POST['mdp']) and !empty($_POST['mdp2']))
	{
		$pseudolength = strlen($pseudo);
		if ($pseudolength <= 255)
		{
			if ($mdp == $mdp2)
			{
				$insertmembre = $bdd -> prepare('INSERT INTO membres(pseudo,motdepasse) VALUES(?,?)') ;
				$insertmembre -> execute(array($pseudo,$mdp));
				$message ="Votre compte a été créé ! ";
			}
			else
			{
				$message = "Vos mots de passes ne correspondent pas ! ";
			}
		}
		else{
			$message = "Le pseudo ne doit pas dépassés 255 caractères ! ";
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
Page de création d'un compte 
 -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">

	<head>
	<meta charset="UTF-8"/>
	<title>Creation compte</title>
	<meta name="author" content="Estelle Heripret"/>
	<link href="./css/style.css" type="text/css" rel="stylesheet" title="style_principal" />
	</head>

	<body>
		<?php include 'menu.php'; ?>
		<section>
			<div id="centrer">
				<h2>Inscription</h2>
				<br/>
				<!-- Formulaire de création de compte -->
				<form method="POST" id="connect">
					<table>
						<tr>
							<td class="right">
								<label for="pseudo">Pseudo : </label>
							</td>
							<td>
								<input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" 
								value="<?php if(isset($pseudo)) { echo $pseudo;} ?>"/>
							</td>
						</tr>
						
						<tr>
							<td class="right">
								<label for="mdp">Mot de Passe : </label>
							</td>
							<td>
								<input type="password" placeholder="Votre mot de passe" id="mtp" name="mdp" />
							</td>
						</tr>
						
						<tr>
							<td class="right">
								<label for="mdp2">Confirmation du Mot de Passe : </label>
							</td>
							<td>
								<input type="password" placeholder="Confirmez mot de passe" id="mtp2" name="mdp2" />
							</td>
						</tr>
						
						<tr>
							<td>
							</td>
							<td>
							<br/>
								<input type="submit" name="forminscription" value="Je m'inscris" />
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
