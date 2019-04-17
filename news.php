<!DOCTYPE html>
<html>
	<head>
		<title>Administration</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style/style.css" /> 
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
		<div id="connexion_admin" class="container">
		<img id="logo2" src="images/logoanbginformatique.png" alt="logo anbg informatique"/>
		<form action="news.php" method="post" class="container">
			<p>Nom du produit</p>
			  <input type="text" name="produit" value="" class="nom"/><br/>
			<p>Descriptif</p>
				<input type="textarea" name="descriptif" value="" class="nom"/><br/>
			<p>Prix</p>
				<input type="number" name="prix" value="" class="nom"/><br/>
			<input type="submit" value="Ajouter" class="envoyer"/>
		</form>
		
<?php 
		@require('config.php');
		$db = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
		$pdo = new PDO($db,$dbuser,$dbpass);
		
				
				
		if (isset($_POST['produit']) && isset($_POST['descriptif']) && isset($_POST['prix'])) {
				
		$nomproduit = $_POST['produit'];
		$descriptif = $_POST['descriptif'];
		$prix = $_POST['prix']; 
		$req = $pdo->prepare("INSERT INTO produit(nomproduit, descriptif, prix) VALUES('".$nomproduit."','".$descriptif."','".$prix."')");
		
		$req->execute(array(
					'produit' => $nomproduit,
					'descriptif' => $descriptif,
					'prix' => $prix));
					echo "Ajout réussi";
		
		}
				
				
				
?>
		<h2>Base de données Produits</h2>
<?php 
	@require('config.php');
		$db = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
		$pdo = new PDO($db,$dbuser,$dbpass);
		$req = $pdo->query('SELECT idproduit,nomproduit,descriptif,prix FROM produit');
		while ($row = $req->fetch())
			{
				echo 'N°', $row['idproduit'] .'<br/>';
				echo $row['nomproduit'] .'<br/>'.'<br/>';
				$id = $row['idproduit'];
				$nomproduit2 = $row['nomproduit'];
				$descriptif2 = $row['descriptif'];
				$prix2 = $row['prix'];
			}
	
			?>
				<form action="changenews.php" method="post">
					<input type="hidden" name="produit" value="<?php echo "".$id."" ?>"></input>
					<input type="hidden" name="nomproduit" value="<?php echo "".$nomproduit2."" ?>"></input>
					<input type="hidden" name="contenu" value="<?php echo "".$descriptif2."" ?>"></input>
					<input type="hidden" name="valeur" value="<?php echo "".$prix2."" ?>"></input>
					<input type="number" name="idmodif" class="nom" value="" /> <?php
					?>
					<br/> <p>Entrez N° pour modification </p>
					<input type="submit" name="modif" class="envoyer" value="Modifier" />
				</form>
				<form action="delnews.php" method="post">
				<input type="number" name="id" class="nom" value="" />
					<br/> <p>Entrez N° pour suppression </p>
				<input type="submit" class="envoyer" value="Supprimer" />
				</form>
				<a href="statistique.php">Accéder aux statistiques</a>
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