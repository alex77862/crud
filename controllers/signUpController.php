<?php
require './config/config.php';
require __DIR__ .'/inputControl.php';
$pdo = connexion();

if (isset($_POST['signup'])) {
    if (isset($_POST['name'], $_POST['mail1'], $_POST['mail2'], $_POST['pass1'], $_POST['pass2']) && !empty($_POST['name']) && !empty($_POST['mail1']) && !empty($_POST['mail2']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])) {
        $name = test_input($_POST['name']);
        $mail1 = test_input($_POST['mail1']);
        $mail2 = test_input($_POST['mail2']);
        $pass1 = test_input($_POST['pass1']);
        $pass2 = test_input($_POST['pass2']);
        $nameLength = mb_strlen($name);
        if ($nameLength <= 30) {
            if ($mail1 === $mail2) {
                $verifUser = $pdo->prepare('SELECT * from users where user_name = ? and user_mail = ?');
                $verifUser->execute(array($name, $mail1));
                $verifUser = $verifUser->rowCount();
                if ($verifUser == 0) {
                    if ($pass1 === $pass2) {
                        $hash = password_hash($pass1, PASSWORD_DEFAULT);
                        if(password_verify($pass1, $hash)){
                            $insertUser = $pdo->prepare('INSERT INTO users (user_name, user_mail, user_password) VALUES (?, ?, ?)');
                            $insertUser->execute(array($name, $mail1, $hash));
                            $err = 'Bienvenue dans notre monde';
                        }
                    } else {
                        $err = 'Mots de passe ne correspondent pas';
                    }
                } else {
                    $err = 'Le nom d\'utilisateur ou adresse email existe déjà';
                }
            } else {
                $err = 'Adresses mails ne correspondent pas';
            }
        } else {
            $err = 'Nom n\'est peut pas depasser 30 caracteres';
        }
    } else {
        $err = 'Tous les chaps doivent être remplis';
    }
}
