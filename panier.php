<?php 
require '_header.php';
 ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style/style.css" /> 
		<title>Anbg Informatique - Découvrez tous nos services informatiques sur Toulouse </title>
		<meta name="description" content="Bienvenue sur le site de Anbg-Informatique" />	
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="style/slick.css"/>
		<link rel="stylesheet" type="text/css" href="style/slick-theme.css"/>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
		<meta name="viewport" content="width=device-width">
	</head>
	<body>
		<header>
			<div class="hautdusite">
			<div class="container">
			<div class="seconnecter3">
				<a href="produit.php" class="rendez_vous3">Retourner aux produits</a>
				<a href="panier.php" class="panier">
					<img src="images/shoppingvide.png" alt="logo panier" />
					<p>Voir Panier</p>
				</a>
				<div class="panier2">
					<h3>Items  <span id="count"><?php echo $panier->count();?></span></h3>
				</div>
			</div>
			</div>
			</div>
			<div class="background">
				<div class="container" id="navigation">
					<a href="produit.php"><img id="logo" src="images/logoanbginformatique.png" alt="logo anbg informatique"/></a>
				</div>
			</div>
		</header>
	<form method="post" action="panier.php">
    <section id="presentation" class="container">
        <h1>Voici votre panier :</h1>
	<div class="cleaner"></div>
	</section>
	<section id="list_produit" class="container"> 
		<?php 
			$ids = array_keys($_SESSION['panier']);
			if(empty($ids)){
				$products = array();
			}else{
				$products = $DB->query('SELECT * FROM produit WHERE idproduit IN('.implode(',',$ids).')');
			}
			foreach ($products as $product){ 
		?>
			<div class="produit">
				<a href="#" class="imageproduit"><img src="images/<?php echo $product->idproduit;?>.jpg"></a>
				<h3><?php echo $product->nomproduit; ?></h3>
				<span class="quantity"><p>Quantité</p><input type="text" name="panier[quantity][<?php echo $product->idproduit; ?>]" value="<?php echo $_SESSION['panier'][$product->idproduit];?>" class="inputqte"> </span>
				<input type="submit" value="Recalculer" class="inputrecalcul">
				<h4> <?php echo number_format($product->prix,2,',',' '); ?>€</h4>
				<a href="panier.php?delPanier=<?php echo $product->idproduit; ?>"class="del"><img src="images/corbeille.png"></a>
			</div>
			<?php 		
			}
			
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
		?>	<span class="total"><span id="total"><p>Prix total : </p> <?php echo number_format($panier->total(),2,',',' '); ?>€</span>
			<?php if($_SESSION['connect'] ===TRUE){
						echo "<a href=\"commande.php\" class=\"commande\">Cliquez ici pour commander !</a>" ;
						}else{
						echo"<td><td class=\"connectezvous\">Connectez-vous pour ajouter au panier</td>	</td>";
					}?>
   </section>
   </form>
	<footer>
	</footer>
	</body>
</html>