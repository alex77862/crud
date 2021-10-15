<?php
require 'connection.php';
?>
<!DOCTYPE html>
<?php require 'includes/Header.php';?>
    <main class="d-flex flex-column align-items-center text-center">
        <form class="d-flex flex-column gap-2 align-items-start text-center my-auto connect-form m-3 p-5" action="#" method="POST">
            <h2 class="mx-auto">LogIn</h2>
            <label for="nickname">Votre nickname:</label>
            <input type="text" name="nickname" id="nickname" placeholder="Votre nickname">
            <label for="password">Votre mot de passe:</label>
            <input type="password" name="password" id="password" placeholder="Mot de passe">
            <input type="submit" class="mx-auto w-50 btn-outline-info" name="connect" value="Se connecter">
        </form>
    </main>
<?php require 'includes/Footer.php';?>
</body>
</html>