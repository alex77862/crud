<?php
if (isset($_POST['deconnect'])) {
    setcookie('name', "", time() - 3600);
    setcookie('password', "", time() - 3600);
    session_destroy();
    header('Location: index.php');
}
