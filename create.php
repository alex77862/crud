<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Supprimer une voiture</h1>
    <?php
    // $ipServerSQL = "";
    // $nomBase = "voiture";
    // $userLog = "JeanPaul";
    // $userPass = "afp13";

    // try {
    //     $basePDO = new PDO("mysql:host" . $ipServerSQL . ";dbname=" . $nomBase . ";port=3306", $userLog, $userPass);
    // } catch (Exception $e) {
    //     echo $e->getMessage();
    // }

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=garage', 'root', 'root');
        if (isset($_POST["voitureSubmit"])) {
            if (!empty($_POST["voitureName"]) && !empty($_POST["voitureModel"]) && !empty($_POST["voitureMoteur"]) && !empty($_POST["voitureYear"]) && !empty($_POST["voitureDesc"]) && !empty($_POST["voitureImg"]))
                $voitureName = $_POST["voitureName"];
            $voitureModel = $_POST["voitureModel"];
            $voitureMoteur = $_POST["voitureMoteur"];
            $voitureYear = $_POST["voitureYear"];
            $voitureDesc = $_POST["voitureDesc"];
            $voitureImg = $_POST["voitureImg"];

            $insertCars = $bdd->prepare('INSERT INTO cars (name, model, engine, year, description, img) VALUES (?, ?, ?, ?, ?, ?)');
            $insertCars->execute(array($voitureName, $voitureModel, $voitureMoteur, $voitureYear, $voitureDesc, $voitureImg));
            echo 'ok';
            // header('Location:index.php?id=' . $_SESSION['id']);
            // $RequetStatement = $bdd->query($req);

            $error = 'On dirait que ça plante';
        }
    } catch (PDOException $e) {
        //throw $th;
        echo $e->getMessage();
        exit;
    }
    ?>


    <form action="" method="POST" class="formCreate">
        <div class="form-example">
            <label for="voitureName">Nom : </label>
            <input type="text" name="voitureName" id="voitureName" required>
        </div>
        <div class="form-example">
            <label for="voitureModel">Modele : </label>
            <input type="text" name="voitureModel" id="voitureModel" required>
        </div>
        <div class="form-example">
            <label for="voitureMoteur">Moteur : </label>
            <input type="text" name="voitureMoteur" id="voitureMoteur" required>
        </div>
        <div class="form-example">
            <label for="voitureYear">Année : </label>
            <input type="number" name="voitureYear" id="voitureYear" required>
        </div>
        <div class="form-example">
            <label for="voitureDesc">Description : </label>
            <input type="text" name="voitureDesc" id="voitureDesc" required>
        </div>
        <div class="form-example">
            <label for="voitureImg">IMG : </label>
            <input type="text" name="voitureImg" id="voitureImg" required>
        </div>
        <div class="form-example">
            <input type="submit" name="voitureSubmit" value="Ajouter un véhicule">
        </div>
    </form>
</body>

</html>