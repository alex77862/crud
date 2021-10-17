<?php
require './config/config.php';
if (isset($_POST['connect'])) {
    if (isset($_POST['nickname'], $_POST['password']) && !empty($_POST['nickname']) && !empty($_POST['password'])) {
        $adminName = htmlspecialchars($_POST['nickname']);
        $adminPass = htmlspecialchars($_POST['password']);

        if ($adminName === $admin && $adminPass === $pass) {
            $adminPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            setcookie('name', $adminName, time() + 365 * 24 * 3600, null, null, false, true);
            setcookie('password', $adminPass, time() + 365 * 24 * 3600, null, null, false, true);
            header('Location: ./index.php');
        } else {
            $err = 'Mot de passe ou login n\'existe pas';
        }
    } else {
        $err = 'Veuillez remplir tous les champs!!!';
    }
}
