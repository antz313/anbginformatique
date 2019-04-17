<?php 
  @require('config.php');
    $db = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
    $pdo = new PDO($db,$dbuser,$dbpass);
	$id = $_POST['id'];
	$req = $pdo->query("SELECT idproduit FROM produit WHERE idproduit='$id'");
	$row = $req->fetch();
	$idd = $row['idproduit'];
	
	
	if (($id == $idd) && !empty($_POST['id'])) {		
		echo 'Suppresion Reussi !';	
		$pdo->exec('DELETE FROM produit WHERE idproduit ="'.$id.'"');
	}
	else {
	   echo "Le produit est introuvable suppression impossible !";
	}

?>
<p><a href="news.php">Retourner sur la page d'Administration</a></p>