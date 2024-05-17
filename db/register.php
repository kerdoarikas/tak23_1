<?php

require '../config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if ($password != $password2) {
    exit;
}

if (registerUser($username, $password)) {
    header("Location: ../login.php");
    exit;
}
