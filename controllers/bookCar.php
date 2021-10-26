<?php
require './models/BookCarModel.php';
if (isset($_POST['bookCar'])) {
    bookCar();
    $msg = 'Votre voiture vous attend!!!';
}
