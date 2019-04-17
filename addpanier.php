<?php 
require '_header.php';
	$json = array('error' => true);
	if(isset($_GET['id'])){
		$product = $DB->query('SELECT idproduit FROM produit WHERE idproduit=:id', array('id' => $_GET['id'])); /* remttre array id et non pas idproduit */
		$panier->add($product[0]->idproduit);
		$json['error'] = false;
		$json['total'] = number_format($panier->total(),2,',',' ');
		$json['count'] = $panier->count(); 
		$json['message'] = 'Le produit a bien été ajouté à votre panier';
	}else {
		$json['message'] = "Vous n'avez pas sélectionné de produit à ajouter au panier";
	}
	 header('Location:produit.php');
		exit();
?>
