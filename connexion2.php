
<?php 
	session_start();
	if (!isset($_SESSION['connect'])) {
		$_SESSION['connect'] = FALSE;
	}
	if($_SESSION['connect'] ===TRUE){
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="style/style.css" /> 
		<title>Anbg Informatique - Découvrez tous nos services informatiques sur Toulouse </title>
		<meta name="description" content="Bienvenue sur le site de Anbg-Informatique" />	
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="favicon.ico">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
		<meta name="viewport" content="width=device-width">
</head>
<body>
	<section id="connexion_admin" class="container">
		<a href="index.php"><img id="logo2" src="images/logoanbginformatique.png" alt=""></a>
		<h2>Connexion</h2>
		<form action="" name="connexion" method="POST">
			<input type="text" name="login" class="nom" placeholder="Login"/><br/>
			<input type="text" name="mdp" class="nom" placeholder="Mot de passe"/><br/>
			<input type="submit" name="connexion" class="envoyer" value="Connexion"/>
		</form>
		<?php
			@require('config.php');
			$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", "$dbuser", "$dbpass");
			if (isset($_POST['login']) AND isset($_POST['mdp']))
			{
				$login =$_POST['login'];
				$mdp = $_POST['mdp'];

				$req = $pdo->query('SELECT id, username FROM users WHERE username = "'.$login.'" && password = "'.$mdp.'"');
				$row = $req->fetch();
				if ($row['0'] != NULL) {
					$_SESSION['connect'] = TRUE;
					$_SESSION['idProfil'] = $row['0'];
					$_SESSION['user'] = $row['1'];
					$_SESSION['role'] = 0;

					header("Location:index.php");

				}else{
					echo '<p class="erreur">Erreur du mot de passe ou de l\'identifiant</p>';
					$_SESSION['connect'] = FALSE;
				}
   			}
	?>
		<p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous</a></p>
		<a href="index.php">Retour à l'accueil</a></br>
	</section>
</body>
</html>