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
<div class="container bg-white rounded p-3 shadow mt-3">
    <div class="row">
        <div class="col">Profiili info tuleb siia</div>
        <div class="col"> Valikud midagi muuta tulevad siia</div>
    </div>
    <div class="row">
        <div class="col"> Kasutajanimi: Taske: </div>
        <div class="col"> muuda parooli ja siia paneb paroolikastid ja submit buttoni
            kutsuta konto button siia
        </div>
    </div>
</div>