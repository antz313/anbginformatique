<!DOCTYPE html>
<html>
		<link rel="stylesheet" href="style/style.css" /> 
		<title>Anbg Informatique - Découvrez tous nos services informatiques sur Toulouse </title>
		<meta name="description" content="Bienvenue sur le site de Anbg-Informatique" />	
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="favicon.ico">
		<meta name="viewport" content="width=device-width">
	<head>
	</head>
		<body>
			<header>
			</header>
			<div id="connexion_admin" class="container">
				<form action="test.php" method="post">
					<p>Pseudo</p>
						<input type="text" name="pseudo" class="nom" placeholder="Pseudo"/>
					<p>Mot de passe</p>
						<input type="text" name="pass" class="nom" placeholder="Mot de passe"/>
					<p>Retapez votre mot de passe</p>
						<input type="text" name="pass2" class="nom" placeholder="Resaisissez votre mot de passe"/>
					<p>Adresse email</p>
						<input type="text" name="mel" class="nom" placeholder="Votre email"/>
					</br>
					</br>
							<select name="droit" size="1">
							<option>Admin
							</select>
					</br>
					</br>
						<button name="envoi" type="submit" href="test.php" class="envoyer">Inscrivez-vous !</button>
				</form>
				</div>
<?php
		if (isset($_POST['mel']) && isset($_POST['pseudo']) && isset($_POST['pass2']) && isset($_POST['pass']))
		{
			if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['mel']))
			{
				echo "email ok : ".$_POST['mel'];
			}
			else
			{
				echo "Renseignez votre email";
			}
			if (isset($_POST['pseudo']) == false)
			{
				$erreur="Votre pseudo est manquant";
			}
			else {
				echo "Pseudo ok";
			}
			if (isset($_POST['mel']) == false) 
			{
				$erreur = "Votre adresse email est manquante !";
			}
			else
			{
				echo "form invalid";
			}
		}
		
?>

		</body>
			
</html>