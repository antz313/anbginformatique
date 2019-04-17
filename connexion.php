<!DOCTYPE html>
<html>

	<head>
		<link rel="stylesheet" href="style/style.css" /> 
		<title>Anbg Informatique - Découvrez tous nos services informatiques sur Toulouse </title>
		<meta name="description" content="Bienvenue sur le site de Anbg-Informatique" />	
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="favicon.ico">
		<meta name="viewport" content="width=device-width">
	</head>
		<body>
		
			<header>
			</header>
			<div id="connexion_admin" class="container">
				<img id="logo2" src="images/logoanbginformatique.png" alt="logo anbg informatique"/>
				<form action="" method="post" class="container">
					<p>Pseudo</p>
						<input type="text" name="pseudo" class="nom" placeholder="Pseudo"/>
					<p>Mot de passe</p>
						<input type="password" name="pass" class="nom" placeholder="Mot de passe"/>
					</br>
					</br>
						<button name="connexion" type="submit" href="news.php" class="envoyer">Connexion !</button>
				</form>
			</div>
	<footer>
	</footer>
<?php
	@require('config.php');
	if (isset($_POST['pseudo']) && isset($_POST['pass'])) {
	
	
	$db = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
	$pdo = new PDO($db,$dbuser,$dbpass);
				$pseudo = $_POST['pseudo'];
				$pass = $_POST['pass'];
				$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
				$req = $pdo->query('SELECT * FROM utilisateur WHERE login="'.$pseudo.'"');
				$row = $req->fetch();
				if (password_verify($pass, $row['2']))
				{
					
					$_SESSION['pseudo'] = $pseudo;
					header("Location: news.php");
					
				}
				else 
				{
					echo '<p class="erreur">Erreur du mot de passe ou de l\'identifiant</p>';
				}
	}
?>
</body>
</html>