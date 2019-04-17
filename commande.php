<?php
// Je fais appel à mes fonctions classes et à la base de donnée dans le fichier header.php et config.php
			require '_header.php';
			require 'config.php';
			$DB = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", "$dbuser", "$dbpass");
	
			$totalPanier = $panier->total();
			$idProfil = $_SESSION['idProfil'];
			$date = date('Y-m-d');
			//j'ajoute les valeurs	récupérées dans ma table commande.
			$DB -> exec("INSERT INTO `commande` (`idCommande`, `date`, `prixTotal`, `id`) VALUES (NULL, '".$date."', '".$totalPanier."', '".$idProfil."')");
			$reponse = $DB->query("SELECT * FROM commande"); // Requête SQL
			$donnees = $reponse->fetch();
			$idCommande = $donnees['idCommande'];
			$ids = ($_SESSION['panier']);
			if(empty($ids)){
					$_SESSION['panier'] = array();
			}
				
				
	
			
			foreach ($_SESSION['panier'] as $produits => $produit) {     
				$prix = $panier->getPrixProduit($produits);      
				$quantity = $produit;     
				$idproduit = $produits;           
				$sth = $DB->prepare("INSERT INTO `detailcommande`(`idDetail`, `prix`, `quantite`, `idCommande`, `idproduit`, `id`) VALUES (NULL,'".$prix."','".$quantity."','".$idCommande."','".$idproduit."','".$idProfil."')");     
				$sth->execute();         
				$arr = $sth->errorInfo(); 	
			}
		exit();
		

		
?>
