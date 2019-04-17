<?php 
    session_start();
    if(!isset($_SESSION['connect'])){
		$_SESSION['connect'] = FALSE;
    }
?>
<?php require '_header.php';
?>
<?php 
$DB->query('SELECT * from produit');
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style/style.css" /> 
		<title>Anbg Informatique - Découvrez tous nos services informatiques sur Toulouse </title>
		<meta name="description" content="Bienvenue sur le site de Anbg-Informatique" />	
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
				<a href="panier.php" class="panier">
					<img src="images/shoppingvide.png" alt="logo panier" />
					<p>Voir Panier</p>
				</a>
				<div class="panier2">
					<h3>Items  <span id="count"><?php echo $panier->count();?></span></h3>
				</div>
				 <a href="rendez_vous.php" class="rendez_vous">Mes rendez-vous</a>
				 <div class="seconnecter">
				        <?php 
                if(isset($_SESSION['connect']) AND $_SESSION['connect'] ===TRUE){
                    echo '<a href="deconnexion.php">Se Déconnecter</a>';
                }else{
                    echo '<a href="connexion2.php">Se connecter</a>';
                }
            ?>
			</div>
			</div>
			</div>
			<div class="background">
				<div class="container" id="navigation">
					<a href="index.php"><img id="logo" src="images/logoanbginformatique.png" alt="logo anbg informatique"/></a>
					<nav>
						<ul class="menus">
							<li><a href="index.php">Accueil</a></li>
							<li><a href="index.php#ancreservices">Services</a></li>
							<li><a href="produit.php">Produits</a></li>
							<li><a href="devis.php">Devis</a></li>
							<li><a href="rendez_vous.php">Rendez-vous</a></li>
							<li><a href="index.php#ancreapropos">A propos</a></li>
							<li><a href="index.php#ancrecontact">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
<?php
		@require('config.php');
		$db = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
		$pdo = new PDO($db,$dbuser,$dbpass);
		$nomproduit = $pdo->query('SELECT nomproduit FROM produit');
		$rownomprod = $nomproduit->fetch();
		$recapitulatif = ['nomproduit'];
		$descriptif = $pdo->query('SELECT descriptif FROM produit');
		$rowdescriptif = $descriptif->fetch();
		$recapitulatif = ['descriptif'];
		$prixcherche = $pdo->query('SELECT prix FROM produit');
		$rowprix= $prixcherche->fetch();
		$prix = ['prix'];
		
?>
	<form action="addpanier.php" method="post" class="container">
    <section id="presentation" class="container">
        <h1>Découvrez tous nos produits ci-dessous :</h1>
        <div class="cleaner"></div>
    </section>
		<section id="list_produit" class="container">
		
<?php
  /*  $tab = $pdo->query("SELECT * FROM produit");	
	foreach ($tab as $val) { ?>
		<form action="addpanier.php" method="post" class="container">
		<div class="produit">
					<img src="images/<?php echo "".$val['idproduit'].""?>.jpg" alt="">
					<h3> <?php echo $val["nomproduit"] ?></h3>
					<p> <?php echo $val["descriptif"]?> </p>
					<h4> <?php echo $val["prix"]?>€</h4>
					<input name="nomProduit" type="hidden" value="<?php echo "".$val['nomproduit']."" ?>" /> 
					<input name="prixProduit" type="hidden" value="<?php echo "".$val['prix']."" ?>" />
					<input name="idhidden" type="hidden" value=" <?php echo "".$val['idproduit']."" ?>"/>
					<a href="addpanier.php?id=<?php echo "".$val['idproduit'].""; ?>" name="ajoutpanier" class="ajouterpanier addPanier">Ajouter</a>
					<span class="quantity"><p>Quantité</p><input type="text" name="panier[quantity][<?php echo "".$val['idproduit'].""; ?>]" value="<?php echo "".$_SESSION['panier'].$val['idproduit']."";?>" class="inputqte"> </span>
					<input name="qteProduit" class="input" min="0" max=""  value="0" type="number">
					
					
					<a class="ajouterpanier addPanier" href="addpanier.php?id=<?php echo $product->idproduit; ?>" name="ajoutpanier">Ajouter</a>
		
		</div>
		</form>	
	<?php
	
	}
?>
*/
        $donnees = $pdo->query("SELECT COUNT(idproduit) as nbArticle FROM produit");
        $nbArticles = $donnees->fetch();
         
        if(!isset($_GET['o'])){
            $pageArticle = 0;
        }else{
            $pageArticle = $_GET['o'] * 5;
        }
        $pageArticle2 = $pageArticle + 5;
        $products = $DB -> query("SELECT * FROM produit LIMIT $pageArticle, $pageArticle2");
        foreach ($products as $product)
        { ?>
		<div class="produit">
					<table>
					<img src="images/<?php echo $product->idproduit;?>.jpg" alt="">
					<h3> <?php echo $product->nomproduit; ?></h3>
					<p> <?php echo $product->descriptif; ?> </p>
					<h4> <?php echo $product->prix; ?>€</h4>
					<input name="nomProduit" type="hidden" value="<?php echo $product->nomproduit; ?>" /> 
					<input name="prixProduit" type="hidden" value="<?php echo $product->prix;?>" />
					<input name="idhidden" type="hidden" value=" <?php echo $product->idproduit; ?>"/>
					<?php if($_SESSION['connect'] ===TRUE){
						echo "<a class=\"ajouterpanier @addPanier\" href=\"addpanier.php?id= ".$product->idproduit." name=\"ajoutpanier\">Ajouter</a>" ;
						}else{
						echo"<td><td class=\"connectezvous\">Connectez-vous pour ajouter au panier</td>	</td>";
					}?>
				
					</table>	
		</div>
		</form>	
		<?php
		}
		?>
			<div class="navPage">
			   <ul>
			   <li><a href="produit.php?o=<?php if(!isset($_GET['o'])|| $_GET['o']==0){echo "0";}else{ echo $_GET['o']-1;}?>"><</a></li>
			   <?php 
			   for($i=0; $i<=(($nbArticles['nbArticle']/5)); $i++){
					echo "<li><a href=\"produit.php?o=$i\">",$i+1,"</a></li>";
					}
				?>
					<li><a href="produit.php?o=<?php if(!isset($_GET['o'])){echo "1";}elseif($_GET['o']==floor(($nbArticles['nbArticle']/5))){ echo $_GET['o'];}else{ echo $_GET['o']+1;}?>">></a></li>
            </ul>
			</div>
    </section>
	<footer>
			<div class="footer2">
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
		</div>
	</footer>
	</body>
</html>