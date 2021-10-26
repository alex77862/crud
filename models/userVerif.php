<?php
session_start();
require __DIR__ . '/../config/config.php';
function userVerif($name, $pass)
{
    $pdo = connexion();
    $verifExist = $pdo->prepare('SELECT * from users where user_name = ?');
    $verifExist->execute(array($name));
    $nameExist = $verifExist->rowCount();
    if ($nameExist == 1) {
        $user = $verifExist->fetch();
        if (password_verify($pass, $user['user_password'])) {
            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT );
            setcookie('name', $name, time() + 365 * 24 * 3600, null, null, false, true);
            setcookie('password', $pass, time() + 365 * 24 * 3600, null, null, false, true);
            $_SESSION['id'] = $user['id'];
            header('Location: index.php');
        } else {
            $err = 'Adresse mail ou mot de passe incorrect';
            return $err;
        }
    }
}
