<?php
            if(isset($_GET['id'])){
                @require('config.php'); 
                $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", "$dbuser", "$dbpass");
                $id = $_GET['id'];
                $pdo -> exec("DELETE FROM rdvs WHERE id = $id");
            }
            header('Location: rendez_vous.php');
        ?>