<main class="d-flex flex-column">
    <div class="container">

        <div class="row mt-5">
            <?php if (isset($msg)) { ?> <h2 class="mx-auto text-success"><?= $msg; ?></h2> <?php } ?>
            <section class="cars d-flex flex-wrap justify-content-around">
                <?php

                // if ($result == true) {

                foreach ($result as $r) {
                ?>

                    <div class="card m-3" style="width: 18rem;">
                        <img src="media/pictures/<?= $r['img']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $r['name']; ?></h5>
                            <h5 class="card-title"><?= $r['model']; ?></h5>
                            <h5 class="card-title">Engine: <?= $r['engine']; ?></h5>
                            <h5 class="card-title">Year: <?= $r['year']; ?></h5>
                            <p class="card-text"><b>Description:</b><br><?= $r['description']; ?></p>
                            <p class="card-text"><b>Disponibilité:</b><br><?php if ($r['access'] == 1) { ?> <span class="text-success p-2"><?= 'Oui'; ?></span><?php } else { ?> <span class="text-warning"><?= 'Reservé'; ?></span><?php }; ?></p>

                            <form class="buttons d-flex gap-2" method="POST">
                                <button class="btn btn-danger w-50" type="submit" name="deleteCar" value="<?= $r['id']; ?>">Reserver</button>
                            </form>
                        </div>
                    </div>
                <?php }
                // } else {
                //     $message = 'Pas de voitures dans le garage';
                // } 
                ?>
                <?php if (isset($message)) { ?> <h2 class="text-danger mx-auto"><?= $message; ?></h2><?php } ?>



            </section>
        </div>
        <div class="row">
            <?php require './includes/carousel.php'; ?>
        </div>
    </div>
</main>