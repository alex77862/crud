<?php
session_start();
require './config/config.php';
require './controllers/connection.php';
require './controllers/cars.php';
require './controllers/update.php';
require './controllers/bookCar.php';
require 'delete.php';
?>
<!DOCTYPE html>
<?php require './includes/head.php'; ?>

<body>
    <?php
    require './includes/Header.php';
    ?>
    <main class="d-flex flex-column">
        <div class="container">
            <div class="row">
                <?php require './includes/carousel.php'; ?>
            </div>
            <?php if (isset($_COOKIE['name']) && $_COOKIE['name'] === $admin) {
            ?>
                <div class="row">
                    <?php if (isset($msg)) { ?> <h2 class="mx-auto text-success"><?= $msg; ?></h2> <?php } ?>
                    <section class="cars d-flex flex-wrap justify-content-around">
                        <?php foreach ($allCars as $c) { ?>
                            <div class="card m-3" style="width: 18rem;">
                                <img src="media/pictures/<?= $c['img']; ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $c['name']; ?></h5>
                                    <h5 class="card-title"><?= $c['model']; ?></h5>
                                    <h5 class="card-title">Engine: <?= $c['engine']; ?></h5>
                                    <h5 class="card-title">Year: <?= $c['year']; ?></h5>
                                    <p class="card-text"><b>Description:</b><br><?= $c['description']; ?></p>
                                    <p class="card-text"><b>Disponibilité:</b><br><?php if ($c['access'] == 1) { ?> <span class="text-success p-2"><?= 'Oui'; ?></span><?php } else { ?> <span class="text-warning"><?= 'Reservé'; ?></span><?php }; ?></p>

                                    <form class="buttons d-flex gap-2" method="POST">
                                        <a href="edition.php?id=<?= $c['id']; ?>" class="btn btn-warning w-50" name="reservedCar">Modifier</a>
                                        <button class="btn btn-danger w-50" type="submit" name="deleteCar" value="<?= $c['id']; ?>">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                    </section>
                </div>
        </div>
        <a href="create.php" class="btn btn-dark new-car d-flex align-items-center justify-content-center" name="newCar">Add new car</a>
    <?php } else { ?>
        <div class="container">
            <div class="row">
                <section class="cars d-flex flex-wrap justify-content-around">
                    <?php foreach ($cars as $car) { ?>
                        <form class="card m-3" style="width: 18rem;" method="POST">
                            <img src="media/pictures/<?= $car['img']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $car['name']; ?></h5>
                                <h5 class="card-title"><?= $car['model']; ?></h5>
                                <h5 class="card-title">Engine: <?= $car['engine']; ?></h5>
                                <h5 class="card-title">Year: <?= $car['year']; ?></h5>
                                <p class="card-text"><b>Description:</b><br><?= $car['description']; ?></p>
                                <button class="btn btn-warning w-50 mx-auto" value="<?= $car['id']; ?>" type="submit" name="bookCar">Reserver</button>
                            </div>
                        </form>
                    <?php } ?>
                </section>
            </div>
        </div>
    <?php
            } ?>
    </main>
    <?php require './includes/Footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>