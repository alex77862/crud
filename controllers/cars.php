<?php
require 'config/config.php';

try {
    $cars = $bdd->query('SELECT * from cars WHERE access = 1');
    // $cars = $cars->fetch();
    
} catch (\Throwable $th) {
    //throw $th;
}