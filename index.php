<?php
//ouverture de la session
session_start();

// chargement des classes
require('modele/class/class.Autoloader.php');
Autoloader::register();

$routeur = new Routeur();
$routeur->RouterRequete();
?>