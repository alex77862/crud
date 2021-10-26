<?php
session_start();
// require '../controllers/Cars.php';
// require './config/config.php';
function bookCar()
{
    $pdo = connexion();
    $id = (int)$_POST['bookCar'];
    $newValue = 0;
    $session = $_SESSION['id'];
    $updateCar = $pdo->prepare('UPDATE cars SET access = ?, reserved_id = ? where id = ?');
    $updateCar->execute(array($newValue, $session, $id));
    header('Refresh:2');
}
