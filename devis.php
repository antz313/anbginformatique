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
		<form action="devis.php#ancredevis"" method="post" class="container">
			<h2 id="ancrecontact">Devis en ligne !</h2>
				<p>Nom :</p>
			<input type="text" required name="name" class="nom" placeholder="Votre Nom"/>
				<p>Prénom :</p>
			<input type="text" required name="prenom" class="nom" placeholder="Votre Prénom"/>
				<p>Email :</p>	
			<input type="mel" required name="email" class="nom" placeholder="Entrez votre mail"/>
				<p>Téléphone :</p>
			<input type="tel" required name="tel" class="nom" placeholder="Votre numéro de téléphone"/>
				<p>Date du devis :</p>
			<input type="date" required name="date" class="nom" placeholder="Date du devis"/>
				<p>Le nom de votre Adresse (rue,allée,chemin...) :</p>
			<input type="text" required name="rue" class="nom" placeholder="Votre Adresse"/>
				<p>Code postal</p>
			<input type="text" required name="codepostal" class="nom" placeholder="Votre Code Postal"/>	
				<p>Ville</p>
			<input type="text" required name="ville" class="nom" placeholder="Votre ville"/>	
				<p>Forfait Installation logiciels ou périphériques</p>
			<input name="installation" type="number" class="nom"  placeholder="Nombre d'heures" min="0"/>
				<p>Forfait Panne</p>
			<input name="panne" type="number" class="nom" placeholder="Nombre d'heures" min="0"/>
				<p>Forfait Cours à domicile</p>
			<input name="cours" type="number" class="nom" placeholder="Nombre d'heures" min="0"/>	
				<p>Forfait Conseil</p>
			<select name="conseil" type="number" class="nom" placeholder="Nombre d'heures"/>
				<option value="">
				<option>1
			</select>
				<p>Forfait Maintenance</p>
			<input name="maintenance" type="number" class="nom" placeholder="Nombre d'heures" min="0"/>
				<p> Si vous souhaitez prendre rendez vous veuillez cocher cette case</p>
			<input type="checkbox" class="envoiedevis" name="choix">
			<button name="envoi" type="submit" class="envoyer">Voir mon devis en ligne</button>
			</form>
<?php
	/*if (isset($_POST['installation']) OR isset($_POST['panne']) OR isset($_POST['cours']) OR isset($_POST['conseil']) OR isset($_POST['maintenance'])) { 
		
	$installation = 35;
	$panne = 35;
	$cours = 35;
	$conseil = 35;
	$maintenance = 35;
	$installationdemande = $_POST['installation'];
	$pannedemande = $_POST['panne'];
	$coursdemande = $_POST['cours'];
	$conseildemande = $_POST['conseil'];
	$maintenancedemande = $_POST['maintenance'];
	$nom = $_POST['name'];
	$prenom = $_POST['prenom'];
	$mail = $_POST['email'];
	$telephone = $_POST['tel'];
	$forfaitinstall = "Forfait installation logiciels ou périphériques";
	$forfaitpanne = "Forfait Panne";
	$forfaitcours= "Forfait cours à domicile";
	$forfaitconseil = "Forfait Conseil";
	$forfaitmaintenance = "Forfait Maintenance";
	
	
	$resultat = $installation*$installationdemande+$panne*$pannedemande+$cours*$coursdemande+$conseil*$conseildemande+$maintenance*$maintenancedemande;
	echo $resultat; echo $nom; echo $prenom; echo $mail; echo $telephone;
	}
	
	if (isset($_POST['installation'])) {
		echo $forfaitinstall;
	}

	if (isset($_POST['panne'])) {
		echo $forfaitpanne;
	}
	if (isset($_POST['cours'])) {
		echo $forfaitcours;
	}
	if (isset($_POST['conseil'])) {
		echo $forfaitconseil;
	}
	if (isset($_POST['maintenance'])) {
		echo $forfaitmaintenance;
	
	}
		
		$installationdemande = $_POST['installation'];
		$pannedemande = $_POST['panne'];
		$coursdemande = $_POST['cours'];
		$conseildemande = $_POST['conseil'];
		$maintenancedemande = $_POST['maintenance'];
		
		$installationdemande = $_POST['installation'];
		$pannedemande = $_POST['panne'];
		$coursdemande = $_POST['cours'];
		$conseildemande = $_POST['conseil'];
		$maintenancedemande = $_POST['maintenance'];
		
		$nombredheure = $installationdemande+$pannedemande+$coursdemande+$conseildemande+$maintenancedemande;
		
		
		
		if ($nombredheure > 3) {
			$prixsuperieur3h = $resultat;
		}
		
		$resultat = $prixxx+$prix*$nombredheure;
		$resultat = $donnes['prix3']+$donnes['prix1']*$nombredheure;
		
		
		
		if (!empty($_POST['date']) && !empty($_POST['name']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['rue']) && !empty($_POST['ville']) && !empty($_POST['codepostal'])) {
						if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i")) {
						echo "Voici votre Devis ".$_POST['email'];
					}
				
					
				else {	

				echo 'forminvalid';
					}
				}
		
	} */
		@require('config.php');
		$db = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
		$pdo = new PDO($db,$dbuser,$dbpass);
		$req = $pdo->query('SELECT idservice,nomservice,prix1,prix2,prix3,descriptif FROM service');
		$install = $pdo->query('SELECT idservice,nomservice,prix1,prix2,prix3,descriptif FROM service WHERE idservice = 1');
		$panne = $pdo->query('SELECT idservice,nomservice,prix1,prix2,prix3,descriptif FROM service WHERE idservice = 2');
		$cours = $pdo->query('SELECT idservice,nomservice,prix1,prix2,prix3,descriptif FROM service WHERE idservice = 3');
		$conseil = $pdo->query('SELECT idservice,nomservice,prix1,prix2,prix3,descriptif FROM service WHERE idservice = 4');
		$maintenance = $pdo->query('SELECT idservice,nomservice,prix1,prix2,prix3,descriptif  FROM service WHERE idservice = 5');
		$descriptif = $pdo->query('SELECT descriptif FROM service WHERE idservice =1');
		$descriptif2 = $pdo->query('SELECT descriptif FROM service WHERE idservice =2');
		$descriptif3 = $pdo->query('SELECT descriptif FROM service WHERE idservice =3');
		$descriptif4 = $pdo->query('SELECT descriptif FROM service WHERE idservice =4');
		$descriptif5 = $pdo->query('SELECT descriptif FROM service WHERE idservice =5');
		$query = $pdo->query('SELECT prix1,prix3 FROM service');
		$selectprix = $pdo->query('SELECT idservice, prix1 + prix3 FROM service');
		$prixxxx = $selectprix->fetch();
		$resultatprix1 = $pdo->query('SELECT prix1 FROM service where idservice=1'); 
		$rowcalculprix = $resultatprix1->fetch();
		$nomservice = ['nomservice'];
		$prix = ['prix1'];
		$prixx = ['prix2'];
		$prixxx = ['prix3'];
		$donnes = $query->fetch();
		$nom = isset($_POST['name']) ? $_POST['name'] : NULL;
		$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : NULL;
		$mail = isset($_POST['email']) ? $_POST['email'] : NULL;
		$telephone = isset($_POST['tel']) ? $_POST['tel'] : NULL;
		$rue = isset($_POST['rue']) ? $_POST['rue'] : NULL;
		$codepostal = isset($_POST['codepostal']) ? $_POST['codepostal'] : NULL;
		$ville = isset($_POST['ville']) ? $_POST['ville'] : NULL;
		$date = isset($_POST['date']) ? $_POST['date'] : NULL;
		$row = $req->fetch(); 
		$rowinstall = $install->fetch();
		$rowpanne = $panne->fetch();
		$rowcours = $cours->fetch();
		$rowconseil = $conseil->fetch();
		$rowmaintenance = $maintenance->fetch();
		$installationdemande = isset ($_POST['installation']) ? $_POST['installation'] : NULL;
		$pannedemande = isset ($_POST['panne']) ? $_POST['panne'] : NULL;
		$coursdemande = isset ($_POST['cours']) ? $_POST['cours'] : NULL;
		$conseildemande = isset ($_POST['conseil']) ? $_POST['conseil'] : NULL;
		$maintenancedemande = isset ($_POST['maintenance']) ? $_POST['maintenance'] : NULL;
		$rowdescriptif = $descriptif->fetch();
		$recapitulatif = ['descriptif'];
		$rowdescriptif2 = $descriptif2->fetch();
		$recapitulatif2 = ['descriptif'];
		$rowdescriptif3 = $descriptif3->fetch();
		$recapitulatif3 = ['descriptif'];
		$rowdescriptif4 = $descriptif4->fetch();
		$recapitulatif4 = ['descriptif'];
		$rowdescriptif5 = $descriptif5->fetch();
		$recapitulatif5 = ['descriptif'];
		$checkbox = isset($_POST['choix']) ? $_POST['choix'] : NULL;
		
		
		
		
		
		$calculprix1 = 35;
		$calculprix2 = 65;
		$calculprix3 = 90;
		
		
		$resultat2 = $calculprix3;
		$nombredheure = $installationdemande+$pannedemande+$coursdemande+$conseildemande+$maintenancedemande;
		$superieura3 = $nombredheure-3;
		$resultat = $calculprix3+$calculprix1*$superieura3;
		$total = $nombredheure;
		
		
		
		
						
	
		
			
				?><div class="container" id="ancredevis"><?php
				
		if ($nombredheure > 3)  {
			$prixparheure = $resultat/$nombredheure;
						
						
				if (!empty($_POST['date']) && !empty($_POST['name']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['rue']) && !empty($_POST['ville']) && !empty($_POST['codepostal'])) {
						?><div class="reponse4"><strong><?php echo 'Votre Devis !'.'<br/><br/><br/>';?></strong><strong><img id="logodevis" src="images/logoanbginformatique.png" alt="logo anbg informatique"/></div><div class="reponse3"><?php echo 'Date du devis : '.'</strong>' .$date .'<br/><br/>'?><strong><?php echo 'Devis pour : '.'</strong>' .$nom. ' ' .$prenom.'<br/><br/>'?> <strong><?php echo 'Adresse Email : '.'</strong>'.$mail.'<br/><br/>'?> <strong><?php echo 'Numero de téléphone : '.'</strong>' .$telephone.'<br/><br/>'?><strong><?php echo 'Adresse Postale : '.'</strong>' .$rue.' '.$codepostal.' '.$ville.'<br/><br/>';?></div><?php
				
				if (!empty($_POST['installation'])) {
							$installation2 = intval($_POST['installation']);
								?><div class="reponse2"><strong><?php echo 'Nom du service : ' .'</strong>'.$rowinstall['nomservice'].'<br/><br/>';?></div>
								<div class="reponse2"><strong><?php echo 'Prix pour 1 heure : '.'</strong>'.$prixparheure.' €' .'<br/><br/>';?>
								<div class="reponse2"><strong><?php echo 'Nombre d heures : '.'</strong>'.number_format ($installation2, 0, ',', '').'<br/><br/>';?></div>
								<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif['descriptif'].'<br/><br/>';?></div><?php
							}
						
					
						if (!empty($_POST['panne'])) {
							$panne2 = intval($_POST['panne']);
							
							?><div class="reponse2"><strong><?php echo 'Nom du service : '.'</strong>'.$rowpanne['nomservice'] .'<br/><br/>';?></div>
							<div class="reponse2"><strong><?php echo 'Prix pour 1 heure : '.'</strong>'.$prixparheure.' €' .'<br/><br/>';?>
							<div class="reponse2"><strong><?php echo 'Nombre d heures : '.'</strong>' .number_format ($panne2, 0, ',', '').'<br/><br/>';?></div>
							<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif2['descriptif'].'<br/><br/>';?></div><?php
							}
						
						
						if (!empty($_POST['cours'])) {
							$cours2 = intval($_POST['cours']);
							
							?><div class="reponse2"><strong><?php echo 'Nom du service : '.'</strong>'.$rowcours['nomservice'] .'<br/><br/>';?></div>
							<div class="reponse2"><strong><?php echo 'Prix pour 1 heure : '.'</strong>'.$prixparheure.' €' .'<br/><br/>';?>
							<div class="reponse2"><strong><?php echo 'Nombre d heures : '.'</strong>' .number_format ($cours2, 0, ',', '').'<br/><br/>';?></div>
							<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif3['descriptif'].'<br/><br/>';?></div><?php
							}
				
						if (!empty($_POST['conseil'])) {
							$conseil2 = intval($_POST['conseil']);
							
								?><div class="reponse2"><strong><?php echo 'Nom du service : '.'</strong>'.$rowconseil['nomservice'] .'<br/><br/>';?></div>
								<div class="reponse2"><strong><?php echo 'Prix pour 1 heure : '.'</strong>'.$prixparheure.' €' .'<br/><br/>';?>
								<div class="reponse2"><strong><?php echo 'Nombre d heures : '.'</strong>' .number_format ($conseil2, 0, ',', '').'<br/><br/>';?></div>
								<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif4['descriptif'].'<br/><br/>';?></div><?php
							}
					
						
						if (!empty($_POST['maintenance'])) {
							$maintenance2 = intval($_POST['maintenance']);
							
							?><div class="reponse2"><strong><?php echo 'Nom du service : '.'</strong>'.$rowmaintenance['nomservice'] .'<br/><br/>';?></div>
							<div class="reponse2"><strong><?php echo 'Prix pour 1 heure : '.'</strong>'.$prixparheure.' €' .'<br/><br/>';?>
							<div class="reponse2"><strong><?php echo 'Nombre d heures : '.'</strong>' .number_format ($maintenance2, 0, ',', '').'<br/><br/>';?></div>
							<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif5['descriptif'].'<br/><br/>';?></div><?php
							}
							
						
							?><div class="reponse2"><strong><?php echo 'Prix total : ' .$resultat .' €'.'</strong>';?></div><?php
				
					if (!empty($_POST['date']) && !empty($_POST['name']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['rue']) && !empty($_POST['ville']) && !empty($_POST['codepostal']) && !empty($_POST['choix'])) {
								if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['email'])) {
								
								
								$contenumail = $date.' '.'<br/>'.$nom.' '.'<br/>'.$prenom.' '.'<br/>'.$mail.' '.'<br/>'.$telephone.' '.'<br/>'.$rue.' '.'<br/>'.$ville.' '.'<br/>'.$codepostal.' '.'<br/> Prix total : '.$resultat;
							
										$num_emails = 0;

									$destinataire = 'a.nbg31100@gmail.com';	
										
							mail($destinataire,'Prise de rendez-vous : ', $contenumail);
						
						
						
						
						?><div class="reponse2"><?php echo 'Vous allez être recontacté pour votre rendez-vous au : '.$_POST['tel'];?></div><?php
					}
			}
				
				}
			
			}
			
			
			else {	
				
					if ($nombredheure <= 3) {
						
						
						if (!empty($_POST['date']) && !empty($_POST['name']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['rue']) && !empty($_POST['ville']) && !empty($_POST['codepostal'])) {
						?><div class="reponse4"><strong><?php echo 'Votre Devis !'.'<br/><br/><br/>';?></strong><strong><img id="logodevis" src="images/logoanbginformatique.png" alt="logo anbg informatique"/></div><div class="reponse3"><?php echo 'Date du devis : '.'</strong>' .$date .'<br/><br/>'?><strong><?php echo 'Devis pour : '.'</strong>' .$nom. ' ' .$prenom.'<br/><br/>'?> <strong><?php echo 'Adresse Email : '.'</strong>'.$mail.'<br/><br/>'?> <strong><?php echo 'Numero de téléphone : '.'</strong>' .$telephone.'<br/><br/>'?><strong><?php echo 'Adresse Postale : '.'</strong>' .$rue.' '.$codepostal.' '.$ville.'<br/><br/>';?></div><?php
							
			
						if (!empty($_POST['installation'])) {
							$installation3 = intval($_POST['installation']);
							if ($installation3 == 1) {
								?><div class="reponse2"><strong><?php echo 'Nom du service : ' .'</strong>'.$rowinstall['nomservice'].'<br/><br/>';?></div>
								<div class="reponse2"><strong><?php echo 'Prix pour 1 heure : '.'</strong>'.$rowinstall['prix1'] .' €'.'<br/><br/>';?>
								<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif['descriptif'].'<br/><br/>';?></div><?php
							}
						}
						if (!empty($_POST['installation'])) {
							if ($installation3 == 2) {
								?><div class="reponse2"><strong><?php echo 'Nom du service : '.'</strong>'.$rowinstall['nomservice'] .'<br/><br/>';?></div>
								<div class="reponse2"><strong><?php echo 'Prix pour 2 heures : '.'</strong>'.$rowinstall['prix2'] .' €'.'<br/><br/>';?>
								<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif['descriptif'].'<br/><br/>';?></div><?php
							}
						}
						if (!empty($_POST['installation'])) {
							if ($installation3 == 3) {
								?><div class="reponse2"><strong><?php echo 'Nom du service : '.'</strong>'.$rowinstall['nomservice'] .'<br/><br/>';?></div>
								<div class="reponse2"><strong><?php echo 'Prix pour 3 heures : '.'</strong>'.$rowinstall['prix3'] .' €'.'<br/><br/>';?>
								<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif['descriptif'].'<br/><br/>';?></div><?php
							}
						}
						if (!empty($_POST['panne'])) {
							$panne3 = intval($_POST['panne']);
							if ($panne3 == 1) {
							?><div class="reponse2"><strong><?php echo 'Nom du service : '.'</strong>'.$rowpanne['nomservice'] .'<br/><br/>';?></div>
							<div class="reponse2"><strong><?php echo 'Prix pour 1 heure : '.'</strong>'.$rowpanne['prix1'] .' €'.'<br/><br/>';?>
							<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif2['descriptif'].'<br/><br/>';?></div><?php
							}
						}
						if (!empty($_POST['panne'])) {
							if ($panne3 == 2) {
							?><div class="reponse2"><strong><?php echo 'Nom du service : '.'</strong>'.$rowpanne['nomservice'] .'<br/><br/>';?></div>
							<div class="reponse2"><strong><?php echo 'Prix pour 2 heures : '.'</strong>'.$rowpanne['prix2'] .' €'.'<br/><br/>';?>
							<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif2['descriptif'].'<br/><br/>';?></div><?php
							}
						}
						if (!empty($_POST['panne'])) {
							if ($panne3 == 3) {
							?><div class="reponse2"><strong><?php echo 'Nom du service : '.'</strong>'.$rowpanne['nomservice'] .'<br/><br/>';?></div>
							<div class="reponse2"><strong><?php echo 'Prix pour 3 heures : '.'</strong>'.$rowpanne['prix3'] .' €'.'<br/><br/>';?>
							<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif2['descriptif'].'<br/><br/>';?></div><?php
							}
						}
						
						if (!empty($_POST['cours'])) {
							$cours3 = intval($_POST['cours']);
							if ($cours3 == 1) {
							?><div class="reponse2"><strong><?php echo 'Nom du service : '.'</strong>'.$rowcours['nomservice'] .'<br/><br/>';?></div>
							<div class="reponse2"><strong><?php echo 'Prix pour 1 heure : '.'</strong>'.$rowcours['prix1'] .' €'.'<br/><br/>';?>
							<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif3['descriptif'].'<br/><br/>';?></div><?php
							}
						}
						if (!empty($_POST['cours'])) {
							if ($cours3 == 2) {
							?><div class="reponse2"><strong><?php echo 'Nom du service : '.'</strong>'.$rowcours['nomservice'] .'<br/><br/>';?></div>
							<div class="reponse2"><strong><?php echo 'Prix pour 2 heures : '.'</strong>'.$rowcours['prix2'] .' €'.'<br/><br/>';?>
							<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif3['descriptif'].'<br/><br/>';?></div><?php
							}
						}
						if (!empty($_POST['cours'])) {
							if ($cours3 == 3) {
							?><div class="reponse2"><strong><?php echo 'Nom du service : '.'</strong>'.$rowcours['nomservice'] .'<br/><br/>';?></div>
							<div class="reponse2"><strong><?php echo 'Prix pour 3 heures : '.'</strong>'.$rowcours['prix3'] .' €'.'<br/><br/>';?>
							<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif3['descriptif'].'<br/><br/>';?></div><?php
							}
						}
						if (!empty($_POST['conseil'])) {
							$conseil3 = intval($_POST['conseil']);
							if ($conseil3 == 1) {
								?><div class="reponse2"><strong><?php echo 'Nom du service : '.'</strong>'.$rowconseil['nomservice'] .'<br/><br/>';?></div>
								<div class="reponse2"><strong><?php echo 'Prix pour 1 heure : '.'</strong>'.$rowconseil['prix1'] .' €'.'<br/><br/>';?>
								<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif4['descriptif'].'<br/><br/>';?></div><?php
							}
						}
						if (!empty($_POST['maintenance'])) {
							$maintenance3 = intval($_POST['maintenance']);
							if ($maintenance3 == 1) {
							?><div class="reponse2"><strong><?php echo 'Nom du service : '.'</strong>'.$rowmaintenance['nomservice'] .'<br/><br/>';?></div>
							<div class="reponse2"><strong><?php echo 'Prix pour 1 heure : '.'</strong>'.$rowmaintenance['prix1'] .' €'.'<br/><br/>';?>
							<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif5['descriptif'].'<br/><br/>';?></div><?php
							}
						}
						if (!empty($_POST['maintenance'])) {
							if ($maintenance3 == 2) {
							?><div class="reponse2"><strong><?php echo 'Nom du service : '.'</strong>'.$rowmaintenance['nomservice'] .'<br/><br/>';?></div>
							<div class="reponse2"><strong><?php echo 'Prix pour 2 heures : '.'</strong>'.$rowmaintenance['prix2'] .' €'.'<br/><br/>';?>
							<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif5['descriptif'].'<br/><br/>';?></div><?php
							}
						}
						if (!empty($_POST['maintenance'])) {
							if ($maintenance3 == 3) {
							?><div class="reponse2"> <strong><?php echo 'Nom du service : '?></div></strong><div class ="formulairenomservice"><?php echo $rowmaintenance['nomservice'].'<br/><br/>';?></div>
							<div class="reponse2"><strong><?php echo 'Prix pour 3 heures : '.'</strong>'.$rowmaintenance['prix3'] .' €'.'<br/><br/>';?>
							<strong><?php echo 'Récapitulatif du service : '.'</strong>'.$rowdescriptif5['descriptif'].'<br/><br/>';?></div><?php
							}
						}	
				
					
							
						$prix1maintenance = (!empty($_POST['maintenance']) && ($maintenance3 == 1) == ($rowmaintenance['prix1'])) * 35;
						$prix2maintenance = (!empty($_POST['maintenance']) && ($maintenance3 == 2) == ($rowmaintenance['prix2'])) * 65;
						$prix3maintenance = (!empty($_POST['maintenance']) && ($maintenance3 == 3) == ($rowmaintenance['prix3'])) * 90;	
						$prix1conseil = (!empty($_POST['conseil']) && ($conseil3 == 1) == ($rowconseil['prix1'])) * 35;
						$prix1cours = (!empty($_POST['cours']) && ($cours3 == 1) == ($rowcours['prix1'])) * 35;
						$prix2cours = (!empty($_POST['cours']) && ($cours3 == 2) == ($rowcours['prix2'])) * 65;
						$prix3cours = (!empty($_POST['cours']) && ($cours3 == 3) == ($rowcours['prix3'])) * 90;	
						$prix1panne = (!empty($_POST['panne']) && ($panne3 == 1) == ($rowpanne['prix1'])) * 35;
						$prix2panne = (!empty($_POST['panne']) && ($panne3 == 2) == ($rowpanne['prix2'])) * 65;
						$prix3panne = (!empty($_POST['panne']) && ($panne3 == 3) == ($rowpanne['prix3'])) * 90;
						$prix1installation = (!empty($_POST['installation']) && ($installation3 == 1) == ($rowinstall['prix1'])) * 35;
						$prix2installation= (!empty($_POST['installation']) && ($installation3 == 2) == ($rowinstall['prix2'])) * 65;
						$prix3installation = (!empty($_POST['installation']) && ($installation3 == 3) == ($rowinstall['prix3'])) * 90;
						$resultatprixtotal = $prix1maintenance+$prix2maintenance+$prix1conseil+$prix1cours+$prix2cours+$prix3cours+$prix1panne+$prix2panne+$prix3panne+$prix1installation+$prix2installation+$prix3installation;
							
				
				?><div class="reponse2"><strong><?php echo 'Prix total : ' .$resultatprixtotal .' €'.'</strong>';?></div><?php
				
				}
				
				
							if (!empty($_POST['date']) && !empty($_POST['name']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['rue']) && !empty($_POST['ville']) && !empty($_POST['codepostal']) && !empty($_POST['choix'])) {
								if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['email'])) {
								
								
								$contenumail = $date.'<br/>'.$nom.'<br/>'.$prenom.'<br/>'.$mail.'<br/>'.$telephone.'<br/>'.$rue.'<br/>'.$ville.'<br/>'.$codepostal.'<br/>'.'Prix total : '.$resultatprixtotal ;
							
										$num_emails = 0;

							$destinataire = 'a.nbg31100@gmail.com';	
										
							mail($destinataire,'Prise de rendez-vous : ', $contenumail);
						
						
						
						
						?><div class="reponse2"><?php echo 'Vous allez être recontacté pour votre rendez vous au : '.$_POST['tel'];?></div><?php
					}
			}	
					
		}
			}	
		
				
		
			
			
			
		
			/*if ($nombredheure > 3) {
			$prixsuperieur3h = $resultat;
			}*/
		
		
			
	
		
		
		
			
			
	
?> </div>
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
	</body>
</html>