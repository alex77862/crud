<?php
// require './controllers/search.php';
?>
<main class="d-flex flex-column">
    <div class="container">
        <div class="row mt-5">
            <?php if (isset($msg)) { ?> <h2 class="mx-auto text-success"><?= $msg; ?></h2> <?php } ?>
            <section class="cars d-flex flex-wrap justify-content-around">
                <?php
                // var_dump($result);
                if (!$result) {
                    $message = 'Pas de voitures dans le garage';
                } else {
                ?>
                    <div class="card m-3 col-4" >
                        <a href="./carArticle.php?id=<?= $result['id'];?>"><img src="media/pictures/<?= $result['img']; ?>" class="card-img-top" alt="..."></a>
                        <div class="card-body">
                            <h5 class="card-title"><?= $result['name']; ?></h5>
                            <h5 class="card-title"><?= $result['model']; ?></h5>
                            <h5 class="card-title">Engine: <?= $result['engine']; ?></h5>
                            <h5 class="card-title">Year: <?= $result['year']; ?></h5>
                            <p class="card-text"><b>Description:</b><br><?= $result['description']; ?></p>
                            <p class="card-text"><b>Disponibilité:</b><br><?php if ($result['access'] == 1) { ?> <span class="text-success p-2"><?= 'Oui'; ?></span><?php } else { ?> <span class="text-warning"><?= 'Reservé'; ?></span><?php }; ?></p>
                            <form class="buttons d-flex gap-2" method="POST">
                                <button class="btn btn-danger w-50" type="submit" name="deleteCar" value="<?= $result['id']; ?>">Reserver</button>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>
                <?php if (isset($message)) { ?> <h2 class="text-danger mx-auto"><?= $message; ?></h2><?php } ?>
            </section>
        </div>
        <div class="row">
            <!-- <?php require __DIR__ . '/includes/carousel.php'; ?> -->
        </div>
    </div>
</main>