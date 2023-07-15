<?php
include('config.php');
# connexion a la base donnée
try {	
$conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['name']);
}catch (Exception $e) {
echo "ERREUR DE CONNEXION A LA BASE DE DONNEE !";
die();
}
