<?php
require './controllers/connection.php';
require './includes/head.php'; ?>

<body>
    <main class="d-flex flex-column align-items-center text-center login h-100 m-0">
        <form class="d-flex flex-column gap-2 align-items-start text-center my-auto connect-form m-3 p-5" action="#" method="POST">
            <h2 class="mx-auto text-info">LogIn</h2>
            <label for="nickname" class="text-info">Identifiant admin:</label>
            <input type="text" name="nickname" id="nickname" placeholder="Admin name">
            <label for="password" class="text-info">Votre mot de passe:</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe">
            <input type="submit" class="mx-auto w-50 btn-outline-info" name="connect" value="Se connecter">
            <a href="./index.php" class="mx-auto text-warning">Page d'accueil</a>
            <?php if (isset($err)) { ?><h2 class="mx-auto text-danger"><?= $err; ?></h2>
            <?php }
            ?>
        </form>
    </main>
</body>

</html>