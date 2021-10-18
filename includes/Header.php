<?php
require './controllers/connection.php';
?>
<header>
    <nav class="navbar navbar-nav-scroll navbar-dark bg-dark p-2">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">Our garage</a>
            <form class="d-flex" method="POST">
                <input class="form-control me-2 w-50" type="search" placeholder="Search" aria-label="Search">
                <?php if (!isset($_COOKIE['name'])) { ?>
                    <a href="login.php" class="btn btn-outline-info" name="connect" type="submit">Admin</a>
                <?php } else { ?>
                    <a href="deconnection.php" class="btn btn-outline-info" name="connect" type="submit">Se deconnecter</a>
                <?php } ?>
            </form>

        </div>
    </nav>
</header>