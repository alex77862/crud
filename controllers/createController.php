<?php
require './config/config.php';
require 'inputControl.php';
$bdd = connexion();
if (isset($_POST["voitureSubmit"])) {
    if (isset($_POST["voitureName"], $_POST["voitureModel"], $_POST["voitureMoteur"], $_POST["voitureYear"], $_POST["voitureDesc"], $_POST["voitureCategorie"], $_POST["gearBox"], $_POST["doors"], $_POST["seats"], $_POST["luggage"], $_FILES['voitureImg']) && !empty($_POST["voitureName"]) && !empty($_POST["voitureModel"]) && !empty($_POST["voitureMoteur"]) && !empty($_POST["voitureYear"]) && !empty($_POST["voitureDesc"]) && !empty($_POST["voitureCategorie"]) && !empty($_POST["gearBox"]) && !empty($_POST["doors"]) && !empty($_POST["luggage"]) && !empty($_POST["seats"]) && !empty($_POST["voitureCategorie"]) && !empty($_FILES['voitureImg']['name'])) {
        $voitureName = test_input($_POST['voitureName']);
        $nameLength = mb_strlen($voitureName);
        $voitureModel = test_input($_POST["voitureModel"]);
        $voitureModelLength = mb_strlen($voitureModel);
        $voitureMoteur = test_input($_POST["voitureMoteur"]);
        $voitureMoteurLength = mb_strlen($voitureMoteur);
        $voitureYear = test_input($_POST["voitureYear"]);
        $voitureDesc = test_input($_POST["voitureDesc"]);
        $voitureCat = test_input($_POST['voitureCategorie']);
        $gearBox = test_input($_POST['gearBox']);
        $seats = test_input($_POST['seats']);
        $doors = test_input($_POST['doors']);
        $luggage = test_input($_POST['luggage']);
        $maxSize = 2097152;
        switch ($voitureCat) {
            case 'berline':
                $voitureCat = 1;
                break;
            case 'suv':
                $voitureCat = 5;
                break;
            case 'citadine':
                $voitureCat = 2;
                break;
            case 'coupe':
                $voitureCat = 3;
                break;
            case '4x4':
                $voitureCat = 4;
                break;
            case 'elecrique':
                $voitureCat = 6;
                break;

            default:
                $voitureCat = 0;
                break;
        }
        var_dump($voitureCat);
        $extensionValid = array('jpg', 'jpeg', 'png');
        if ($nameLength < 30 && $voitureModelLength < 30 && $voitureMoteurLength < 30) {
            if ($_FILES['voitureImg']['size'] <= $maxSize) {
                $extensionUpload = strtolower(substr(strrchr($_FILES['voitureImg']['name'], '.'), 1));
                if (in_array($extensionUpload, $extensionValid)) {
                    $path = "./media/pictures/" . $voitureName . $voitureModel . "." . $extensionUpload;
                    $result = move_uploaded_file($_FILES['voitureImg']['tmp_name'], $path);
                    if ($result) {
                        $insertCars = $bdd->prepare('INSERT INTO cars (name, model, engine, year, categorie_car, img, gearbox, doors, seats, luggage, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                        $insertCars->execute(array($voitureName, $voitureModel, $voitureMoteur, $voitureYear, $voitureCat, $voitureName . $voitureModel . '.' . $extensionUpload, $gearBox, $doors, $seats, $luggage, $voitureDesc));
                        $err = 'Voiture ajouté';
                        header('Location: create.php');
                    }
                }
            } else {
                $err = 'La taille de photo ne peut pas depasser 2Mo';
            }
        } else {
            $err = 'Le nom, modele et type de moteur ne peuvent pas depasser 30 caracteres';
        }
    } else {
        $err = 'Tous les champs doivent etre remplis!';
    }
}
