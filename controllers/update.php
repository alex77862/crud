<?php
require './config/config.php';
require 'inputControl.php';
$bdd = connexion();
if (isset($_GET['id'])) {
    if ($_COOKIE['name']) {
        $id = (int)$_GET['id'];
        $updateCar = $bdd->prepare('SELECT * from cars where id = ?');
        $updateCar->execute(array($_GET['id']));
        $updateCar = $updateCar->fetch();
    }
}
if (isset($_POST['voitureUpdate'])) {
    if (isset($_POST['voitureName'], $_POST['voitureModel'], $_POST['voitureMoteur'], $_POST['voitureYear'], $_POST['voitureDesc'], $_POST['voitureDisp']) && !empty($_POST['voitureName']) && !empty($_POST['voitureModel']) && !empty($_POST['voitureMoteur']) && !empty($_POST['voitureYear']) && !empty($_POST['voitureDesc']) && !empty($_POST['voitureDisp'])) {
        $voitureName = test_input($_POST['voitureName']);
        $nameLength = mb_strlen($voitureName);
        $voitureModel = test_input($_POST["voitureModel"]);
        $voitureModelLength = mb_strlen($voitureModel);
        $voitureMoteur = test_input($_POST["voitureMoteur"]);
        $voitureMoteurLength = mb_strlen($voitureMoteur);
        $voitureYear = test_input($_POST["voitureYear"]);
        $voitureDesc = test_input($_POST["voitureDesc"]);
        $voitureDisp = test_input($_POST['voitureDisp']);
        if ($nameLength < 30 && $voitureModelLength < 30 && $voitureMoteurLength < 30) {
            $updateInfo = $bdd->prepare('UPDATE cars SET name = ?, model = ?, engine = ?, year = ?, description = ?, access = ? where id = ?');
            $updateInfo->execute(array($voitureName, $voitureModel, $voitureMoteur, $voitureYear, $voitureDesc, $voitureDisp, $_GET['id']));
            $err = 'Information modifiée';
            header('Location: index.php');
        }
    } else {
        $err = 'Remlissez tous les champs';
    }
}
if (isset($_FILES['voitureImg']) && !empty($_FILES['voitureImg']['name'])) {
    $maxSize = 2097152;
    $extensionValid = array('jpg', 'jpeg', 'png');
    if ($_FILES['voitureImg']['size'] <= $maxSize) {
        $extensionUpload = strtolower(substr(strrchr($_FILES['voitureImg']['name'], '.'), 1));
        if (in_array($extensionUpload, $extensionValid)) {
            $path = "./media/pictures/" . $voitureName . "." . $extensionUpload;
            $result = move_uploaded_file($_FILES['voitureImg']['tmp_name'], $path);
            if ($result) {
                $updatePhoto = $bdd->prepare('UPDATE cars SET img = ? where id = ?');
                $updatePhoto->execute(array($voitureName . '.' . $extensionUpload, $_GET['id']));
                $err = 'Information modifiée';
            }
        } else {
            $err = 'La taille ne peut pas depasser 2Mo';
        }
    }
}
