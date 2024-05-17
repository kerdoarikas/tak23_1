<?php 
require '../config.php';

session_start();

$id = $_SESSION['user']['id'];
// $password = $_POST['password'];

if (deleteCurrentUser($id) == true) {
    header("Location: ../login.php");
    exit;
}
else {
    print('midagi läks valesti');
}
?>