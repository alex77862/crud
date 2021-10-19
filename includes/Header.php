<?php
require './controllers/connection.php';
require './controllers/search.php';
?>
<header>
    <nav class="navbar navbar-nav-scroll navbar-dark bg-dark p-2">
        <div class="container-fluid d-flex">
            <a href="index.php" class="navbar-brand">Our garage</a>
            <form class="d-flex col-lg-4 justify-content-end" method="POST">
                <?php if (!isset($_COOKIE['name'])) { ?>
                    <a href="login.php" class="btn btn-outline-info" name="connect" type="submit">Admin</a>
                <?php } else { ?>
                    <a href="deconnection.php" class="btn btn-outline-info" name="connect" type="submit">Se deconnecter</a>
                <?php } ?>
            </form>
            <form method="GET" class="d-flex w-100 justify-content-between mt-2">
                <input class="form-control me-2 w-70" name="search_field" type="search" placeholder="Search" aria-label="Search">
                <button type="submit" name="search" class="btn btn-search"><i class="bi bi-search text-info"></i></button>
            </form>

        </div>
    </nav>
</header>