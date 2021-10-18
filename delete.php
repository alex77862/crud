<?php
require './config/config.php';

if (isset($_POST['deleteCar'])) {
    $id = (int)$_POST['deleteCar'];
    $deleteCars = $bdd->prepare('DELETE FROM `cars` WHERE `cars`.`id` = ?');
    $deleteCars->execute(array($id));


    $msg = 'Voiture supprimée !';
    header("location:index.php");
}
