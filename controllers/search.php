<?php
require './controllers/inputControl.php';
require './config/config.php';
$pdo = connexion();
if (isset($_GET['search_field']) && !empty($_GET['search_field'])) {
    $search = test_input($_GET['search_field']);
    $result = $pdo->query('SELECT * from cars where name LIKE "%' . $search . '%"');
    // $result = $result->fetch();
}
