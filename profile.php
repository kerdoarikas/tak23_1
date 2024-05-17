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
    <h5 class="m-0">Tere tulemast, <?php print($_SESSION['user']['username']);?>!</h5>
    <a href="db/logout.php" class="btn btn-dark">Logi välja</a>
    </div>
</div>
<div class="container bg-white rounded p-3 shadow mt-3">
    <div class="row">
        <div class="col">Profiili info tuleb siia</div>
        <div class="col"> Valikud midagi muuta tulevad siia</div>
    </div>
    <div class="row">
        <div class="col"> Kasutajanimi: <?php print_r($_SESSION['user']['username']);?> </div>
        <div class="col"> muuda parooli: </div>
        <div class="col"> 
            <form action="db/deletepro.php" method="post">
                <h3>Kustuta konto</h3>
                <div class="form-group">
                    <label for="password">Parool</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-dark mt-3 w-100">Kustuta</button>       
            </form>
                        
        </div>
    </div>
</div>