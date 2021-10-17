<?php
require './config/config.php';
if (isset($_POST["voitureSubmit"])) {
    if (isset($_POST["voitureName"], $_POST["voitureModel"], $_POST["voitureMoteur"], $_POST["voitureYear"], $_POST["voitureDesc"], $_FILES['voitureImg']) && !empty($_POST["voitureName"]) && !empty($_POST["voitureModel"]) && !empty($_POST["voitureMoteur"]) && !empty($_POST["voitureYear"]) && !empty($_POST["voitureDesc"]) && !empty($_FILES['voitureImg']['name'])) {
        $voitureName = htmlspecialchars($_POST['voitureName']);
        $nameLength = mb_strlen($voitureName);
        $voitureModel = htmlspecialchars($_POST["voitureModel"]);
        $voitureModelLength = mb_strlen($voitureModel);
        $voitureMoteur = htmlspecialchars($_POST["voitureMoteur"]);
        $voitureMoteurLength = mb_strlen($voitureMoteur);
        $voitureYear = htmlspecialchars($_POST["voitureYear"]);
        $voitureDesc = htmlspecialchars($_POST["voitureDesc"]);
        $maxSize = 2097152;
        $extensionValid = array('jpg', 'jpeg', 'png');

        if ($nameLength < 30 && $voitureModelLength < 30 && $voitureMoteurLength < 30) {
            if ($_FILES['voitureImg']['size'] <= $maxSize) {
                var_dump($_FILES);
                $extensionUpload = strtolower(substr(strrchr($_FILES['voitureImg']['name'], '.'), 1));
                if (in_array($extensionUpload, $extensionValid)) {
                    $path = "./media/pictures/" . $voitureName . "." . $extensionUpload;
                    $result = move_uploaded_file($_FILES['voitureImg']['tmp_name'], $path);
                    if ($result) {
                        $insertCars = $bdd->prepare('INSERT INTO cars (name, model, engine, year, description, img) VALUES (?, ?, ?, ?, ?, ?)');
                        $insertCars->execute(array($voitureName, $voitureModel, $voitureMoteur, $voitureYear, $voitureDesc, $voitureName . '.' . $extensionUpload));
                        $err = 'Voiture ajouté';
                        header('Location: create.php');
                    }
                }
            } else {
                $err = 'La taille ne peut pas depasser 2Mo';
            }


            // var_dump($voitureModel);
            // header('Location:index.php?id=' . $_SESSION['id']);
            // $RequetStatement = $bdd->query($req);
        } else {
            $err = 'Le nom, modele et type de moteur ne peuvent pas depasser 30 caracteres';
        }
    } else {
        $err = 'tous les champs doivent etre remplis!';
    }
}
