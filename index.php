<?php
session_start();
require __DIR__ . '/controllers/categorieCar.php';
?>
<!DOCTYPE html>
<?php require __DIR__ . '/includes/head.php';
?>

<body>
    <?php require __DIR__ . '/includes/Header.php';
    var_dump($_SESSION['id']) ;?>
    <form method="GET" class="d-flex justify-content-between mt-5 serch-form p-5">
        <input class="form-control me-2 w-70" name="search_field" type="search" placeholder="Search" aria-label="Search">
        <button type="submit" name="search" class="btn btn-search"><i class="bi bi-search text-info"></i></button>
    </form>
    <?php if (isset($_GET['search_field']) && !empty($_GET['search_field'])) {
        require './views/searchView.php';
    } else {
    ?>
        <main class="d-flex flex-column">
            <?php require __DIR__ . '/includes/carousel.php'; ?>
            <div class="container-fluid p-0">
                <div class="row w-100 mx-auto">
                    <section class="avantage d-flex flex-wrap  p-2 justify-content-around align-items-center bg-warning gap-3 w-100">
                        <h2 class="w-100 text-center text-dark">Pourquoi nos vehicules</h2>
                        <div class="card col-12 col-md-3" style="height:15rem">
                            <div class="card-body cause1 d-flex align-items-end">
                                <p class="card-text mx-auto text-light bg-info bg-opacity-25 text-center p-1">Nos voitures sont garées en permanence dans le parking souterrain.</p>
                            </div>
                        </div>
                        <div class="card col-12 col-md-3" style="height:15rem">
                            <div class="card-body cause2 d-flex align-items-end">
                                <p class="card-text mx-auto text-light bg-info bg-opacity-25 text-center p-1">Nos véhicules sont toujours entretenus par les meilleurs mécaniciens.</p>
                            </div>
                        </div>
                        <div class="card col-12 col-md-3" style="height:15rem">
                            <div class="card-body cause3 d-flex align-items-end">
                                <p class="card-text  mx-auto text-light bg-info bg-opacity-25 text-center p-1">Réservez votre voiture en toute simplicité en quelques clics.</p>
                            </div>
                        </div>
                    </section>
                </div>
                <section class="categories d-flex flex-wrap justify-content-center align-items-center gap-3">
                    <div class="row">
                        <?php foreach ($categories as $categorie) { ?>
                            <div class="col-sm-12 col-md-4 cat-item d-flex flex-column justify-content-end">
                                <div class="img d-flex align-items-center"><img src="./images/<?= $categorie['categorie_img']; ?>" alt="" class="cat-img"></div>
                                <a href="categorieCars.php?categorie=<?= $categorie['categorie_id']; ?>" class="btn btn-outline-warning cat-button"><?= $categorie['categorie_name']; ?></a>
                            </div>
                        <?php } ?>
                    </div>
                    <a href="allCars.php" class="mx-auto text-warning m-3 all-cars"><i class="bi bi-arrow-right-circle"></i> Voir tous nos vehicules</a>
                </section>
                <!-- <section></section> -->
        </main>
    <?php require __DIR__ . '/includes/Footer.php';
    } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
</body>

</html>