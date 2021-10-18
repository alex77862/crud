<?php
session_start();
setcookie('name', "", time() - 3600);
setcookie('password', "", time() - 3600);
session_destroy();
header('Location: index.php');
