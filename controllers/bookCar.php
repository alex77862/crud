<?php
require './config/config.php';
if (isset($_POST['bookCar'])) {
    $id = (int)$_POST['bookCar'];
    $newValue = 0;
    $updateCar = $bdd->prepare('UPDATE cars SET access = ? where id = ?');
    $updateCar->execute(array($newValue, $id));
    header("location:index.php");
    $msg = 'Votre voiture vous attend!!!';
}
