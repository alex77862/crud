<?php
require './config/config.php';
$bdd = connexion();

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $deleteCars = $bdd->prepare('DELETE FROM `cars` WHERE `cars`.`id` = ?');
    $deleteCars->execute(array($id));


    $msg = 'Voiture supprimée !';
    header("location: ./index.php");
}
