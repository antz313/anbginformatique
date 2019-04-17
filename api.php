<?php 
	header('Content-Type: application/json');
		@require('config.php');
		
		try{
			$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", "$dbuser", "$dbpass");
		$retour["success"] = true;
		}catch(Exception $e){
			$retour["success"] = false;
		}
		if(isset($_GET['produit'])){
			$numProduit = $_GET['produit'];
			$req = $pdo->prepare("SELECT * FROM produit WHERE idproduit ='$numProduit'");
			$req->execute();
			$resultats = $req->fetchALL();
			
			$retour["sucess"] = true;
			$retour["nbProduit"] = count($resultats);
			$retour["produits"] = $resultats;
		}else if(isset($_GET['prix'])&& isset($_GET['prix2'])){
			$prixProduit = $_GET['prix'];
			$prixProduit2 = $_GET['prix2'];
			$req = $pdo->prepare("SELECT * FROM produit WHERE prix BETWEEN '$prixProduit' AND '$prixProduit2'");
			$req->execute();
			$resultatsPrix = $req->fetchALL();
			
			$retour["sucess"] = true;
			$retour["nbProduit"] = count($resultatsPrix);
			$retour["produits"] = $resultatsPrix;
		}else{
			$req = $pdo->prepare("SELECT * FROM produit");
			$req->execute();
			$resultats = $req->fetchALL();
			
			$retour["sucess"] = true;
			$retour["nbProduit"] = count($resultats);
			$retour["produits"] = $resultats;
		}
		echo json_encode($retour);
?>