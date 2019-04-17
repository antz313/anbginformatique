<?php 
	session_start();
	$_SESSION['connect'] = FALSE;
	session_destroy();
	header('Location:connexion2.php');
?>