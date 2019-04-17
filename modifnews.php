<?php 
  @require('config.php');
    $db = "mysql:host=$dbhost;dbname=$dbname;charset=utf8";
    $pdo = new PDO($db,$dbuser,$dbpass);
    $id = $_POST['id'];
    $nomproduit = $_POST['nomproduit'];
    $prix = $_POST['prix'];
    $contenu = $_POST['contenu'];
    $pdo->exec("UPDATE produit SET nomproduit='$nomproduit', descriptif='$contenu', prix='$prix' WHERE idproduit='$id'");
    echo "Modification réussi !";
?>
    <p><a href="news.php">Retourner sur la page d'Administration</a></p>