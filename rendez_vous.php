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
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
		<meta name="viewport" content="width=device-width">
		
	</head>
<body>
    <header>
		
			<div class="hautdusite">
			<div class="container">
				<div class="seconnecter3">
				<?php 
                if(isset($_SESSION['connect']) AND $_SESSION['connect'] ===TRUE){
                    echo '<a href="deconnexion.php">Se Déconnecter</a>';
                }else{
                    echo '<a href="connexion2.php">Se connecter</a>';
                }
            ?>
				<a href="index.php" class="rendez_vous3">Retourner à l'accueil</a>
				<a href="panier.php" class="panier">
					<img src="images/shoppingvide.png" alt="logo panier" />
					<p>Voir Panier</p>
				</a>
				<a href="tel:+33651417186" class="tel">
					<img src="images/telephone.png" alt="logo telephone"/>
					<p>06 51 41 71 86</p>
				</a>
			</div>
			</div>
			</div>
			<div class="background">
				<div class="container" id="navigation">
					<a href="index.php"><img id="logo" src="images/logoanbginformatique.png" alt="logo anbg informatique"/></a>
				</div>
			</div>
    </header>
    <div class="cleaner"></div>
    <section id="presentation3" class="container">
        <h1>Bienvenue sur Anbg-Informatique</h1>
        <div class="cleaner"></div>
        <p>Une question, un besoin, des renseignements ? Prenez rendez-vous avec nos spécialistes !</p>
    </section>
    <?php
    if($_SESSION['connect']==TRUE){?>
        <section id="mesRdvs" class="container">
            <h2>Vos rendez-vous :</h2>
            <?php 
                @require('config.php'); 
                $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", "$dbuser", "$dbpass");
                $req = $pdo -> query("SELECT * FROM rdvs WHERE id_user = ".$_SESSION['idProfil']);
                if ($req -> rowCount() != 0 ) {
                    foreach($req as $key){
                        echo "<p>Vous avez rendez-vous le ".date('d-m-y', strtotime($key['date']))." à ".$key['heure']." <a href=\"retirer_rdv.php?id=".$key['id']."\">Annuler le rendez-vous</a></p>";
                    }
                }else{
                    echo "<p>Vous n'avez aucun rendez-vous de prévu</p>";
                }
            ?>
        </section>
        <section id="form" class="container">
            <h2>Prendre rendez-vous</h2>
            <form action="" method="POST" name="prendreRendezVous" id="formrdv">
                <input type="date" name="date" class="nom"/><br/>
                <input type="time" name="time" class="nom"/><br/>
                <textarea name="description" placeholder="Description" class="descript"></textarea><br/>
                <input type="submit" name="envoyer" class="envoyer" value="Prendre rendez-vous"/>
            </form>
            <?php
            if(isset($_POST['date']) && isset($_POST['time']) && isset($_POST['description'])){
                @require('config.php'); 
                $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", "$dbuser", "$dbpass");
                $date = $_POST['date'];
                $time = $_POST['time'];
                $description = $_POST['description'];
                $id = $_SESSION['idProfil'];
                $pdo -> exec("INSERT INTO rdvs(date, heure, id_user, resumer) VALUES('$date', '$time', '$id', '$description')"); 
                echo "<p>Vous avez pris rendez vous le ".date('d-m-y', strtotime($date))." à ".$time."</p>";  
            }
        ?>
        </section>
        <?php }else{
            ?>
            <section id="rdvnonco" class="container">
                <h2>Vous devez être connecté pour voir vos rendez-vous ou pour prendre rendez-vous.</h2>
            </section>
       <?php } ?>
</body>
</html>