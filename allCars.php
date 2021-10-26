<?php
require __DIR__ . '/controllers/allCarsController.php';
require __DIR__ . '/includes/head.php';
?>
<body>
    <?php
    require __DIR__ . '/includes/Header.php';
    require __DIR__ . '/includes/carousel.php';
    ?>
    <main class="m-5">
        <div class="container-fluid d-flex ">
            <div class="car-list d-flex flex-wrap col-12 mx-auto justify-content-around gap-3">
                <?php
                foreach ($cars as $car) {
                    if ($car['access'] == 0) { ?>
                        <div class="booked">
                            <h2 class="text-danger text-center booked-text mx-auto">Réservé</h2>
                            <div class="card bg-warning booked-car" style="width: 22rem;">
                                <div class="card-body">
                                    <h3 class="card-title"><?= $car['name']; ?></h3>
                                    <h5 class="card-title"><?= $car['model']; ?></h5>
                                </div>
                                <a href="carArticle.php?id=<?= $car['id']; ?>"><img src="./media/pictures/<?= $car['img']; ?>" class="card-img-top" alt="..."></a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="card bg-warning col-12 col-md-4" style="width: 22rem;">
                            <div class="card-body">
                                <h3 class="card-title"><?= $car['name']; ?></h3>
                                <h5 class="card-title"><?= $car['model']; ?></h5>
                            </div>
                            <a href="carArticle.php?id=<?= $car['id']; ?>"><img src="./media/pictures/<?= $car['img']; ?>" class="card-img-top" alt="..."></a>
                        </div>
                    <?php }
                    ?>
                <?php }
                ?>
            </div>
        </div>
    </main>
    <?php
    require __DIR__ . '/includes/Footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
</body>