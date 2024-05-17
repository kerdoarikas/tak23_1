<?php
require 'config.php';

session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}

$username = $_SESSION['user']['username'];

$tasks = getUserTasks($_SESSION['user']['id']);


include 'elements/head.php';
?>

<div class="container-fluid px-4 bg-white py-3 shadow">
            <div class="d-flex align-items-left justify-content-start">
                <img src="static/img/logo.png" alt="logo" class="img-fluid" style="width: 100px; height: auto;">
            </div>
    <div class="d-flex justify-content-between align-items-center">
    <h5 class="m-0">Tere tulemast, kasutajanimi!</h5>
    <a href="db/logout.php" class="btn btn-dark">Logi välja</a>
    </div>
</div>

