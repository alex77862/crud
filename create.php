<?php
require './controllers/createController.php';
?>
<!DOCTYPE html>
<?php require './includes/head.php'; ?>


<body>
    <?php require './includes/Header.php'; ?>
    <?php
    // var_dump($_FILES['voitureImg']['name']);
    // $ipServerSQL = "";
    // $nomBase = "voiture";
    // $userLog = "JeanPaul";
    // $userPass = "afp13";

    // try {
    //     $basePDO = new PDO("mysql:host" . $ipServerSQL . ";dbname=" . $nomBase . ";port=3306", $userLog, $userPass);
    // } catch (Exception $e) {
    //     echo $e->getMessage();
    // }

    // // try {
    //     var_dump($_POST);
    //     $bdd = new PDO('mysql:host=localhost;dbname=garage', 'root', 'root');
    //     if (isset($_POST["voitureSubmit"])) {
    //         if (!empty($_POST["voitureName"]) && !empty($_POST["voitureModel"]) && !empty($_POST["voitureMoteur"]) && !empty($_POST["voitureYear"]) && !empty($_POST["voitureDesc"]) && !empty($_POST["voitureImg"])) {
    //             $voitureName = htmlspecialchars($_POST["voitureName"]);
    //             $voitureNameLength = strlen($voitureName);
    //             $voitureModel = htmlspecialchars($_POST["voitureModel"]);
    //             $voitureModelLength = strlen($voitureModel);
    //             $voitureMoteur = htmlspecialchars($_POST["voitureMoteur"]);
    //             $voitureMoteurLength = strlen($voitureMoteur);
    //             $voitureYear = htmlspecialchars($_POST["voitureYear"]);
    //             $voitureDesc = htmlspecialchars($_POST["voitureDesc"]);

    //             $voitureImg = htmlspecialchars($_POST["voitureImg"]);
    //             if ($voitureNameLength <= 30 && $voitureModelLength <= 30 && $voitureMoteurLength <= 30) {

    //                 $insertCars = $bdd->prepare('INSERT INTO cars (name, model, engine, year, description, img) VALUES (?, ?, ?, ?, ?, ?)');
    //                 $insertCars->execute(array($voitureName, $voitureModel, $voitureMoteur, $voitureYear, $voitureDesc, $voitureImg));
    //                 echo 'ok';
    //                 // header('Location:index.php?id=' . $_SESSION['id']);
    //                 // $RequetStatement = $bdd->query($req);
    //             } else {
    //                 $err = 'Le nom, modele et type de moteur ne peuvent pas depasser 30 caracteres';
    //             }
    //         }


    //         $error = 'On dirait que ça plante';
    //     }
    // // } catch (PDOException $e) {
    // //     //throw $th;
    // //     echo $e->getMessage();
    // //     exit;
    // // }
    ?>

    <main class="d-flex align-items-center text-center login">
        <form method="POST" class="formCreate d-flex text-info flex-column mx-auto gap-2 w-50" enctype="multipart/form-data">
            <div class="form-example d-flex justify-content-between">
                <label for="voitureName">Nom : </label>
                <input type="text" name="voitureName" id="voitureName" required>
            </div>
            <div class="form-example d-flex justify-content-between">
                <label for="voitureModel">Modele : </label>
                <input type="text" name="voitureModel" id="voitureModel" required>
            </div>
            <div class="form-example d-flex justify-content-between">
                <label for="voitureMoteur">Moteur : </label>
                <input type="text" name="voitureMoteur" id="voitureMoteur" required>
            </div>
            <div class="form-example d-flex justify-content-between">
                <label for="voitureYear">Année : </label>
                <input type="number" name="voitureYear" id="voitureYear" required>
            </div>
            <div class="form-example d-flex justify-content-between">
                <label for="voitureDesc">Description : </label>
                <textarea name="voitureDesc" id="voitureDesc" rows="2"></textarea>
            </div>
            <div class="form-example d-flex justify-content-between">
                <label for="voitureImg">IMG : </label>
                <input type="file" name="voitureImg">
            </div>
            <div class="form-example d-flex justify-content-center mt-4">
                <input type="submit" name="voitureSubmit" value="Ajouter un véhicule" class="btn btn-info">
            </div>
            <?php
            if (isset($err)) { ?>
                <h3 class="d-flex text-danger mx-auto mt-2"><?= $err; ?></h3>
            <?php } ?>
        </form>
    </main>
</body>

</html>