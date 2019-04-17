<?php 
    session_start();
    if(!isset($_SESSION['connect'])){
		$_SESSION['connect'] = FALSE;
    }
?>
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
				<div class="seconnecter2">
					<?php 
						if(isset($_SESSION['connect']) AND $_SESSION['connect'] ===TRUE){
							echo '<a href="deconnexion.php">Se Déconnecter</a>';
						}else{
							echo '<a href="connexion2.php">Se connecter</a>';
						}
						if(isset($_SESSION['connect']) AND $_SESSION['connect'] ===TRUE){
							echo "<a href=\"panier.php\" class=\"monpanier\">Mon panier</a>"; 
						}
					?>
			</div>
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
			<div class="diaporama">
				<div><img src="images/diapo.jpg" alt="ordinateur cafe news"/></div>
				<div><img src="images/diaporama.jpg" alt="ampoule ordinateur smartphone aide"/></div>
			</div>
				<div class="container">
				<div class="police">
					<h1 id="ancreservices">UNE OFFRE SUR MESURE POUR CHACUN</h1>
				<div class="soulignement">
				</div>
				<div class="soulignement2">
				</div>
					<p>Je vous propose un service d’assistance informatique à domicile. Je me déplace chez vous pour vous dépanner mais aussi pour vous former et vous conseiller.
					Le but est par ma pédagogie de vous rendre rapidement autonome sur les outils à votre disposition: PC, MAC, tablettes ,mobiles. Mais aussi de vous amener à réduire vos dépenses liées à la multiplicité de vos abonnements.
					Nous bâtissons ensemble un projet à la carte selon votre demande . Pour cela différentes formules vous sont proposeés.
					Les rendez-vous s’effectuent sur Toulouse et ses environs à votre domicile.</p>
			<div class="container">
		<section id="article">
				<h3>Dans le but de vous apporter le meilleur service</h3>
				<p>Généralement, une intervention ne dépasse pas 3 heures (selon l’âge de l’ordinateur, ou une opération récente de nettoyage etc.)
				Possibilité de devis sur mesure reprenant les services de votre choix.
				Sur chaque intervention le tarif comprend le déplacement et l’émission d’un devis.
				Retour de la machine à l’atelier : 90€ pour certaines réparations.
				Service après-vente assuré gratuitement dans un délai d’un mois après la visite du technicien. Intervention à domicile compris.
				A noter : installation d’un logiciel de prise en main à distance afin de garantir le service après-vente pendant 1 mois, compris dans chaque pack.
				Si problème non résolu le client ne sera pas facturé.</p>
			</div>
				<article class="services gauche">
					<img src="images/securite.png" alt="dessin bouclier shield securite"/>
					<div class="texteservices">
						<h3>Nous sécurisons et rendons plus rapide votre ordinateur</h3>
						<p>Le technicien intervient au domicile de la personne afin d’effectuer un nettoyage complet de l’ordinateur afin d’en optimiser le fonctionnement :</p>
					<ul>
						<li>Elimination de virus, spyware, adwares, logiciels publicitaires, blocage des spams.</li>
						<li>Nettoyage logiciel de l’ordinateur, suppression de logiciels non utilisés ou obsolètes.</li>
						<li>Nettoyage des fichiers temporaires, optimisation de la base de registre.</li>
						<li>Optimisation du démarrage.</li>
					</ul>
						<p>A son départ le technicien lance une défragmentation du disque dur de votre ordinateur afin d’en améliorer les performances.<br/>
						<br/><p>Prix pour 1 heure : 35 €
						<br/><br/>2 heures : 65 €<br/>
						<br/>3 heures : 90 €</p>
							
					</div>
				</article>
				<article class="services droite">
					<img src="images/installation.png" alt="logo installation download"/>
					<div class="texteservices">
						<h3>Un technicien effectue votre maintenance et installe vos logiciels ou périphériques</h3>
						<p>Le technicien intervient au domicile de la personne afin d’effectuer un nettoyage complet de l’ordinateur afin d’en optimiser le fonctionnement :</p>
						<ul>
							<li>Installation d’antivirus.</li>
							<li>Installation et configuration de vos divers périphériques (imprimantes, difficultés d’impression etc).</li>
							<li>Installation d’un scanner.</li>
							<li>Diagnostic de votre installation internet (sfr, free, orange etc…).</li>
							<li>Installation de votre box internet, configuration d’un routeur, configuration Wifi et sécurisation de votre connexion.</li>
							<li>Installation et configuration d’un outil pour lire vos mails (ex : Thunderbird ou Outlook).</li>
						</ul>
						<p>Prix pour 1 heure : 35 €
						<br/><br/>2 heures : 65 €<br/>
						<br/>3 heures : 90 €</p>
					</div>
				</article>
				<article class="services gauche">
					<img src="images/settings.png" alt="image settings roue dent reparation panne"/>
					<div class="texteservices">
						<h3>Un technicien se déplace chez vous</h3>
						<p>Votre ordinateur ne démarre plus, vous êtes devant un écran noir ou bleu.<br/> Votre PC s’arrête tout seul, votre ordinateur est en surchauffe.<br/> 
						Le ventilateur fait trop de bruit.<br/> Votre ordinateur est lent lorsque vous l’utilisez.<br/> Votre ordinateur met du temps à démarrer, suite à l’intervention du technicien il y aura 2 possibilités :</p>
					<ul>
						<li>soit le problème peut être réglé directement au domicile de la personne.</li>
						<li>soit il y aura un retour à l’atelier afin de remédier à la panne (réinstallation de Windows si nécessaire).</li>
					</ul>
						<p>Devis proposé au client si besoin de changer un composant.<br/>
						<p>Prix pour 1 heure : 35 €
						<br/><br/>2 heures : 65 €<br/>
						<br/>Retour de la machine du client à l’atelier facturé 90 €</p>
					</div>
				</article>
				<article class="services droite">
					<img src="images/cours.png" alt="homme lit apprendre cours"/>
					<div class="texteservices">
						<h3>Nous partageons nos connaissances</h3>
						<p>Je vous proposerais différents cours individuels sur l’utilisation de vos outils informatiques, PC, mobile, tablette… Je vous apprendrais à être autonome ! Votre utilisation quotidienne sera donc beaucoup plus agréable.</p>
					<ul>
						<li>Cours Windows adapté au niveau de chacun.</li>
						<li>Cours sur utilisation de divers logiciels.</li>
					</ul>
						<p>Prix pour 1 heure : 35 €<br/>
						<br/><br/>2 heures : 65 €<br/>
						<br/>3 heures : 90 €</p>
					</div>
				</article>
				
				<div class="container">
				<article id="conseil">
					<img src="images/conseil.png" alt="image lumière ampoule conseil"/>
					<div class="texteservices">
						<h3>Nous prenons le temps de bien vous conseiller</h3>
						<p>Si vous voulez faire des économies sur vos dépenses liées à vos forfaits internet, mobile, télévision, nous serons à votre écoute. Vous avez besoin de changer d’ordinateur,
						ou vous souhaitez améliorer les performances de celui-ci en changeant quelques pièces ? Ce pack est fait pour vous. En fonction de vos attentes je saurais vous apporter la meilleure expertise possible.</br>
						</br>Prix unique : 35 €</p>
					</div>
				</article>
				</div>
				</div>
				</div>
				</div>
		</section>
		<section class="imageblocnote">
				<section id="histoireanbg">
					<h2 id="ancreapropos">Un accompagnement pour toutes vos demandes informatiques
					</h2>
				<div class="soulignement3">
				</div>
				<div class="soulignement4">
				</div>
						<p>Qualifié en maintenance et réseaux informatiques, <strong>Antoine Neybourger 27 ans</strong> passionné d’informatique depuis mon plus jeune âge, j’ai souvent 
						été sollicité par les gens de mon entourage pour résoudre leurs petits problèmes informatiques du quotidien.</br>
						</br>J'ai donc décidé de créer mon entreprise.</br>
						</br>Suite à cela j’ai suivi une formation avec l’ADIE qui m’a accompagné tout au long de la création ainsi qu’au démarrage. 
						Au mois de mars de l’année<strong> 2016 à Toulouse</strong>, voit le jour <strong>ANBG Informatique</strong>.</br>
						</br>Afin de venir en aide aux non initiés des nouvelles technologies ainsi qu’à tout ceux ayant des problèmes divers avec leurs outils informatiques, je saurais répondre à vos besoins.
						Je possède plusieurs qualités indispensables pour exercer ce métier : la patience, une grande pédagogie, ainsi que du savoir-faire. 
						Tout cela avec un contact agréable et dans le but d’installer avec vous un accompagnement régulier.
						</p>
		</section>
		</section>
		<form action="index.php" method="post" class="container">

			<h2 id="ancrecontact">Des questions ? Contactez-nous !</h2>
			<div class="telsize">
				<p>Tel : 06 51 41 71 86
				</p>
			</div>
				<p>Nom :</p>
			<input type="text" required name="nom" class="nom" placeholder="Entrez votre nom"/>
				<p>Email :</p>	

			<input type="mel" required name="email" class="mailcontact" placeholder="Entrez votre mail"/>
				<p>Message :</p>
			<textarea name="message" required class="message" placeholder="Entrez votre message"></textarea>
			<button name="envoi" type="submit" class="envoyer">Envoyer votre message</button>
	<?php
		if (isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['message']))
		{
			if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['email']))
			{
				$destinataire = 'a.nbg31100@gmail.com';
				$nom     = $_POST['nom'];
				$email   = $_POST['email'];
				$message = $_POST['message'];
							
					$message = str_replace("&#039;","'",$message);
					$message = str_replace("&#8217;","'",$message);
					$message = str_replace("&quot;",'"',$message);
					$message = str_replace('<br>','',$message);
					$message = str_replace('<br />','',$message);
					$message = str_replace("&lt;","<",$message);
					$message = str_replace("&gt;",">",$message);
					$message = str_replace("&amp;","&",$message);
							$num_emails = 0;

				mail($destinataire,'Envoyé depuis le formulaire', $message, $email);
				echo "Message envoyé: ".$_POST['email'];
			}
			else
			{
				echo "Email incorrect";
			}
		}
	?>
		</form>
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
			<script src="js/jquery.anchorScroll.js"></script>
			<script src="js/jquery.anchorScroll.min.js"></script>
			<script> $('.anchor-scroll').anchorScroll({
						scrollSpeed: 800, // scroll speed
						offsetTop: 0, // offset for fixed top bars (defaults to 0)
						onScroll: function () { 
						  // callback on scroll start
						},
						scrollEnd: function () { 
						  // callback on scroll end
						}
					 });
			</script>
	</body>
</html>