<!DOCTYPE html>
<html>
<head>
	<title>Ajouter utilisateur</title>
	<link rel="stylesheet" href="style/style.css" /> 
</head>
<body>
	<section class="container" id="connexion_admin">
		<img id="logo2" src="images/logoanbginformatique.png" alt="logo anbg informatique"/>
		<h2>Inscription</h2>
		<form action="" name="ajouter" method="POST">
			<input type="text" name="nom" placeholder="nom" class="nom"/><br/>
			<input type="text" name="prenom" placeholder="prenom" class="nom"/><br/>
			<input type="text" name="adresse" placeholder="adresse" class="nom"/><br/>
			<input type="number" name="cp" placeholder="cp" class="nom"/><br/>
			<input type="text" name="ville" placeholder="ville" class="nom"/><br/>
			<input type="text" name="pays" placeholder="pays" class="nom"/><br/>
			<input type="tel" name="tel" placeholder="tel" class="nom"/><br/>
			<input type="text" name="login" placeholder="login" class="nom"/><br/>
			<input type="password" name="mdp" placeholder="Mot de passe" class="nom"/><br/>
			<input type="password" name="confirmmdp" placeholder="Confirmer mot de passe" class="nom"/><br/>
			<input type="mel" name="email" placeholder="email" class="nom"/><br/>
			<input type="mel" name="confirmemail" placeholder="confirmer email" class="nom"/><br/>
			<input type="radio" name="pro" value="1" id="pro"><label for="pro">Pro</label><br/>
			<input type="radio" name="pro" value="0" id="particulier"><label for="particulier">Particulier</label><br/>
			<input type="submit" name="ajouter" class="envoyer" value="S'inscrire"/>
		</form>
		<br/><br/><br/>
		<a href="connexion2.php" class="bouton">Retour à la page de connexion</a></br>
		<?php
			@require('config.php');
			$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", "$dbuser", "$dbpass");
			if ((isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['adresse']) AND isset($_POST['cp']) AND isset($_POST['ville']) AND isset($_POST['pays']) AND isset($_POST['tel']) AND isset($_POST['login']) AND isset($_POST['email']) === isset($_POST['confirmemail']) AND isset($_POST['confirmmdp'])===isset($_POST['mdp']) AND isset($_POST['pro'])))
			{
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$adresse = $_POST['adresse'];
				$cp = $_POST['cp'];
				$ville = $_POST['ville'];
				$pays = $_POST['pays'];
				$tel = $_POST['tel'];
				$login = $_POST['login'];
				$mdp = $_POST['mdp'];
				$email = $_POST['email'];
				$pro = $_POST['pro'];

				$pdo -> exec("INSERT INTO users(nom, prenom, adresse, cp, ville, pays, mail, tel, username, password, pro) VALUES('$nom','$prenom','$adresse','$cp','$ville','$pays', '$email', '$tel', '$login', '$mdp', '$pro')");

				echo "Votre compte a été crée avec succès !";
			}else{
				echo "Veuillez remplir tous les champs.";
			}		
	?>
	</section>
</body>
</html>