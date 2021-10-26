<?php
require __DIR__ . '/controllers/carByCat.php';
require __DIR__ . '/includes/head.php';
?>

<body>

    <?php require './includes/Header.php'; ?>

    <main class="d-flex flex-column">
        <?php require __DIR__ . '/includes/carousel.php'; ?>
        <div class="container-fluid">
            <div class="car-list d-flex flex-wrap gap-3 justify-content-center p-3">
                <?php
                foreach ($carCat as $car) {
                ?>
                    <div class="card p-2" style="width: 22rem;">
                        <div class="card-body">
                            <h3 class="card-title"><?= $car['name']; ?></h3>
                            <h5 class="card-title"><?= $car['model']; ?></h5>
                        </div>
                        <a href="carArticle.php?id=<?= $car['id']; ?>"><img src="./media/pictures/<?= $car['img']; ?>" class="card-img-top" alt="..."></a>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </main>
    <?php
    require './includes/Footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>

</body>