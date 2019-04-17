	<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" href="style/style.css" /> 
		<title>Anbg Informatique - API </title>
		<meta name="description" content="Bienvenue sur l'API de Anbg-Informatique" />	
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="favicon.ico">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
		<meta name="viewport" content="width=device-width">
		
	</head>
	<body>
	<header>
		<div class="hautdusite">
			<div class="container">
				<a href="devis.php" class="devis">
					<img src="images/hautdusite2.png" alt="logo devis" />
					<p>Demandez un devis</p>
				</a>
				<a href="tel:+33651417186" class="tel">
					<img src="images/telephone.png" alt="logo telephone"/>
					<p>06 51 41 71 86</p>
				</a>
			</div>
			</div>
			<div class="background">
				<div class="container" id="navigation">
					<img id="logo" src="images/logoanbginformatique.png" alt="logo anbg informatique"/>
					<nav>
						<ul class="menus">
							<li><a href="index.php">Accueil</a></li>
							<li><a href="#ancreservices" class="anchor-scroll" data-class-to="body" data-on-scroll="blur-effect">Services</a></li>
							<li><a href="produit.php">Produits</a></li>
							<li><a href="devis.php">Devis</a></li>
							<li><a href="rendez_vous.php">Rendez-vous</a></li>
							<li><a href="index.php#ancreapropos" class="anchor-scroll" data-class-to="body" data-on-scroll="blur-effect">A propos</a></li>
							<li><a href="#ancrecontact" class="anchor-scroll" data-class-to="body" data-on-scroll="blur-effect">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
	</header>
	<h2>Base de données API</h2>
	<div class="soulignement">
	</div>
<?php 	
	$curl = curl_init();
	$url = "http://localhost/anbginformatiquesuite/api.php";
	if(isset($_POST['numProduit']) && ($_POST['numProduit']) != null){
		$url = "http://localhost/anbginformatiquesuite/api.php?produit=".$_POST['numProduit'];
	}
	if(isset($_POST['prix1']) && isset($_POST['prix2']) && $_POST['prix1'] != null && $_POST['prix2'] != null){
		$url = "http://localhost/anbginformatiquesuite/api.php?prix=".$_POST['prix1']."&prix2=".$_POST['prix2'];
	}
	curl_setopt_array($curl, array(
	  CURLOPT_URL => $url,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	$response = json_decode($response, true); //because of true, it's in an array
	
	?>	
		<div class="apiForm">
		<form method='POST' action="">
			<h3>Effectuer une recherche via l'Id du produit : </h3>
			<input type="number" class="nom" name="numProduit"></input>
			<button type="submit" class="send">Chercher</button>
		</form>
		</div>
		<div class="apiForm">
		<form method='POST' action="">
			<h3>Effectuer une recherche d'une gamme de prix</h3>
			<h3> Prix entre : </h3>
			<input type="number" class="nom" name="prix1"></input>
			<h3> Et : </h3>
			<input type="number" class="nom" name="prix2"></input>
			<button type="submit" class="send">Chercher</button>
		</form>
		</div>
		<h3> <?php echo 'Nombre de produits: '. $response['nbProduit']; ?> </h3> <?php		
		$produits = $response['produits'];

			foreach ($produits as $products){
				?><div class="apiProducts"><?php
				?> 	<img src="images/<?php echo $products['idproduit'];?>.jpg" alt="">
					<h3> <?php echo 'Nom du produit: '. $products['nomproduit']; ?> </h3>
					<h3> <?php echo 'Descriptif: '. $products['descriptif']; ?> </h3>
					<h3> <?php echo 'Prix: '. $products['prix'].' €'; ?> </h3>
		</div>
		<?php	
	}
?>
<footer>
		<h2>Anbg-Informatique</h2>
		<div class="basdepage" class="container">
				<img src="images/mailbas.png" alt="dessin boite mail"/><a href="mailto:a.nbg31100@gmail.com?">Contactez-moi</a>
				<img src="images/carnetbas.png" alt="dessin carnet stylo"/><a href="tel:+33651417186">06 51 41 71 86</a>
				<img src="images/localisationbas.png" alt="dessin localisation"/>
				<p>3 bis rue de Castanet 31400 Toulouse
				</p>
			<h4>Plus d'infos sur :</h4>
			<a href="https://www.facebook.com/anbginformatique/?ref=bookmarks" target="_blank"><img src="images/facebook.png" alt="logo lien facebook"></a> 
			<a href="https://www.ladepeche.fr/article/2015/08/17/2160594-l-informatique-pour-les-nuls.html" target="_blank"><img src="images/ladepeche.png" alt="logo lien la depeche"></a>  
		</div>
	</footer>
	</div>
</body>
</html>