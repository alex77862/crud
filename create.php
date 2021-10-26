<?php
require __DIR__ . '/controllers/createController.php';
?>
<!DOCTYPE html>
<?php require __DIR__ . '/includes/head.php'; ?>

<body class="">
    <?php require __DIR__ . '/includes/Header.php'; ?>
    <main class="d-flex align-items-center text-center mt-5 login h-100 p-5">
        <form method="POST" class="formCreate d-flex text-info flex-column mt-5 mx-auto gap-2 w-50" enctype="multipart/form-data">
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
                <label for="voitureCategorie">Categorie : </label>
                <select name="voitureCategorie" id="voitureCategorie">
                    <option value="berline">Berline</option>
                    <option value="suv">SUV</option>
                    <option value="coupe">Coupé</option>
                    <option value="4x4">4x4</option>
                    <option value="citadine">Citadine</option>
                    <option value="electrique">Electrique</option>
                </select>
            </div>
            <div class="form-example d-flex justify-content-between">
                <label for="gearBox">Boite de vitesse : </label>
                <input type="text" name="gearBox" id="gearBox" required>
            </div>
            <div class="form-example d-flex justify-content-between">
                <label for="doors">Nombre de portiéres : </label>
                <input type="number" name="doors" id="doors" required>
            </div>
            <div class="form-example d-flex justify-content-between">
                <label for="seats">Nombre de sie2ges : </label>
                <input type="number" name="seats" id="seats" required>
            </div>
            <div class="form-example d-flex justify-content-between">
                <label for="luggage">Capacité de coffre (en sacs) : </label>
                <input type="number" name="luggage" id="luggage" required>
            </div>
            <div class="form-example d-flex justify-content-between">
                <label for="voitureDesc">Description : </label>
                <textarea name="voitureDesc" id="voitureDesc" rows="2"></textarea>
            </div>
            <div class="form-example d-flex justify-content-between">
                <label for="voitureImg">IMG : </label>
                <input type="file" class="ms-auto" accept="image/*" onchange="loadFile(event)" name="voitureImg">
                <div class="new-img">
                    <img id="output" class="p-1 mx-auto">
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="js/index.js"></script>
</body>

</html>