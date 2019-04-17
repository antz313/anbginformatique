
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style/style.css" /> 
		<title>Anbg Informatique - Découvrez tous nos services informatiques sur Toulouse </title>
		<meta name="description" content="Bienvenue sur le site de Anbg-Informatique" />	
		<meta charset="UTF-8"/>
		<link rel="shortcut icon" href="favicon.ico">
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/script.js"></script>
		<link rel="stylesheet" type="text/css" href="style/slick.css"/>
		<link rel="stylesheet" type="text/css" href="style/slick-theme.css"/>
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
    <section id="stats" class="container">
        <table>
            <h3>CA à l'année par produit et par mois</h3>
            <tr>
                <td>Référence du produit</td>
                <td>Mois</td>
                <td>Année</td>
                <td>Quantité vendue</td>
                <td>Total HT</td>
            </tr>
            <?php 
            
            @require('config.php');
            $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", "$dbuser", "$dbpass");
            $donnees = $pdo->query("SELECT produit.nomproduit, 
									YEAR(commande.date) AS year, 
									MONTH(commande.date) AS month, 
									SUM(detailcommande.quantite) AS total, 
									produit.prix FROM produit, 
									detailcommande, 
									commande 
									WHERE commande.idCommande = detailcommande.idCommande 
									AND detailcommande.idproduit = produit.idproduit 
									GROUP BY produit.nomproduit");
            foreach ($donnees as $key) {
                echo "<tr>";
                echo  "   <td>".$key['nomproduit']."</td>";
                echo  "    <td>".$key['month']."</td>";
                echo  "    <td>".$key['year']."</td>";
                echo  "    <td>".$key['total']."</td>";
                echo  "    <td>".$key['prix'] * $key['total']."</td>";
                echo  "</tr>";
            }
             
            ?>
        </table>
        <table>
            <h3>Record du site</h3>
            <tr>
                <td>Nombre de commandes</td>
                <td>Nombre de rendez-vous</td>
                <td>Nombre de produits vendus</td>
                <td>Nombre de clients</td>
                <td>Produit le plus vendu</td>
            </tr>
            <?php 

            @require('config.php');
            $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", "$dbuser", "$dbpass");
                echo "<tr>";
                $donnees = $pdo->query("SELECT COUNT(id) FROM commande");
                $rs = $donnees -> fetch();
                echo  "   <td>".$rs['0']."</td>";
                $donnees = $pdo->query("SELECT COUNT(id) FROM rdvs");
                $rs = $donnees -> fetch();
                echo  "    <td>".$rs['0']."</td>";
                $donnees = $pdo->query("SELECT SUM(quantite) FROM detailcommande");
                $rs = $donnees -> fetch();
                echo  "    <td>".$rs['0']."</td>";
                $donnees = $pdo->query("SELECT COUNT(id) FROM users");
                $rs = $donnees -> fetch();
                echo  "    <td>".$rs['0']."</td>";
                $donnees = $pdo->query("SELECT nomproduit FROM produit, detailcommande WHERE detailcommande.idproduit = produit.idproduit GROUP BY produit.idproduit ORDER BY SUM(quantite) DESC LIMIT 0,1");
                $rs = $donnees -> fetch();
                echo  "    <td>".$rs['0']."</td>";
                echo  "</tr>";          
            ?>
        </table>
		<a href="news.php" class="retour">Retour</a>
    </section>
	<footer id="footstats">
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
</body>
</html>