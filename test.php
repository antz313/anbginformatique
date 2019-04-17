<?php
		@require('config.php');
		$db = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
		$pdo = new PDO($db,$dbuser,$dbpass);
		$pseudo = $_POST['pseudo'];
		$req = $pdo->query('SELECT * FROM utilisateur WHERE login="'.$pseudo.'"');
				$row = $req->fetch();
				if ($row['0'] != NULL)
				{
					echo 'Login déjà existant';
				}
				else 
				{
					$mail = $_POST['mel'];
					$password = $_POST['pass'];
					$droit = $_POST['droit'];
					echo $pseudo.'</br>'.$mail.'</br>' .$password.'</br>'.$droit.'</br>';
					$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
					$req = $pdo->prepare("INSERT INTO utilisateur(login, mdp, droit, email) VALUES('".$pseudo."','".$pass_hache."','".$droit."','".$mail."')");
					$req->execute(array(
					'pseudo' => $pseudo,
					'pass' => $pass_hache,
					'email' => $mail));
					echo "Ajout réussi";
				}

		
		
?>