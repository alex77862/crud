<?php
$admin = 'bigboss';
$pass = '12345';
try {
    $bdd = new PDO('mysql:host=localhost;dbname=garage', 'root', 'root');
    //code...
} catch (PDOException $e) {
    //throw $th;
    echo $e->getMessage();
    exit;
}
