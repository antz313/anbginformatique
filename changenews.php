<?php 
  @require('config.php');
    $db = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
    $pdo = new PDO($db,$dbuser,$dbpass);
	$id = $_POST['idmodif'];
	$req = $pdo->query('SELECT idproduit,nomproduit,descriptif,prix FROM produit WHERE idproduit ="'.$id.'"');
	$row = ($req->fetch());
	$nomproduit2 = $row['nomproduit'];
	$descriptif2 = $row['descriptif'];
	$prix2 = $row['prix'];
	$idd = $row['idproduit'];
	

	if (($id == $idd) && !empty($_POST['idmodif'])) {		
		?><form action="modifnews.php" method="post" class="container">
        
        Nom Produit : <input type="text" name="nomproduit" value="<?php echo "".$nomproduit2."" ?>" /><br />

        Prix : <input type="text" name="prix" value="<?php echo "".$prix2."" ?>" /><br />
        
        Descriptif :<br /><textarea rows="8" cols="60" name="contenu"><?php echo "".$descriptif2."" ?></textarea><br />

		 <input type="hidden" name="id" value="<?php echo "".$id."" ?>"></input>
       
    <input type="submit" value="Modifier" />
</form> 
		<?php
	}

	else {
	   echo "Le produit est introuvable modification impossible !";
	}

?>