<?php
require 'config/config.php';
if (isset($_POST['reservedCar'])) {
    $id = (int)$_POST['reservedCar'];
    $newValue = 0;
    $updateCar = $bdd->prepare('UPDATE cars SET access = ? where id = ?');
    $updateCar->execute(array($newValue, $id));
    $msg = 'Votre voiture vous attend!!!';
}
