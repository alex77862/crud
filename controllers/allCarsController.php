<?php
require __DIR__ . '/../config/config.php';
$pdo = connexion();
$cars = $pdo->query('SELECT * from cars');