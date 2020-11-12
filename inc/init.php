<?php
//Ce fichier init.php sera inclus dans tous les scripts du site (hors inclusions ) pour initialiser les éléments nécessaires au fonctionnement du site.

//Connexion à la BDD "boutique"
$pdo = new PDO('mysql:host=localhost; dbname=restaurants','root', '', array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


// Constante qui contient le chemin du site
define('RACINE_SITE', '/PHP/Restaurant/' ); 

//Initialisation d'une variable pour afficher du contenu HTML: 
$contenu='';

//Inclusions de fonctions :
require_once 'functions.php';
