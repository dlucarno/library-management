<?php
include_once('config.php');
$conn = mysqli_connect($db['host'], $db['user'], $db['password'], $db['dbname']);
if(!$conn){
  echo "Erreur de connexion à la base de données";
  die();
}
