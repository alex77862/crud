<?php
require './config/config.php';
$pdo = connexion();

$carArt = $pdo->prepare('SELECT * FROM cars c LEFT JOIN cars_categories cc ON cc.categorie_id = c.categorie_car WHERE  id = ?');
$carArt->execute(array($_GET['id']));
$car = $carArt->fetch();