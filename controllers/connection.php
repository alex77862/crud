<?php
session_start();
require './controllers/inputControl.php';
require __DIR__ . '/../models/userVerif.php';
if (isset($_POST['connect'])) {
    if (isset($_POST['nickname'], $_POST['password']) && !empty($_POST['nickname']) && !empty($_POST['password'])) {
        try {
            $userName = test_input($_POST['nickname']);
            $userPass = test_input($_POST['password']);
            $userExist = userVerif($userName, $userPass);
        } catch (Throwable $e) {
           $err = $e->getMessage();
        }
    } else {
        $err = 'Veuillez remplir tous les champs!!!';
    }
}
