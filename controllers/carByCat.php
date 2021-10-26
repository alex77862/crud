<?php
require './config/config.php';
$pdo = connexion();
$carCat = $pdo->prepare('SELECT * from cars where categorie_car = ?');
$carCat->execute(array($_GET['categorie']));

