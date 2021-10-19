<?php
if (isset($_GET['search_field']) && !empty($_GET['search_field'])) {
    $search = htmlspecialchars($_GET['search_field']);
    $result = $bdd->query('SELECT * from cars where name LIKE "%' . $search . '%"');
    // $result = $result->fetch();
    // var_dump($result);
}
