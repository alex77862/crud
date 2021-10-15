<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=garage', 'root', '');
    //code...
} catch (PDOException $e) {
    //throw $th;
    echo $e->getMessage();
    exit;
}
