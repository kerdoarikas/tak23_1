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
    <a href="profile.php" class="btn btn-dark">Profiil</a>
    <a href="db/logout.php" class="btn btn-dark">Logi välja</a>
    </div>
</div>

<div class="row">
    <div class="col-6">
    <div class="bg-white rounded shadow mt-3 ms-3 pb-4">
    <a href="add_task.php" class="btn btn-dark mx-3 my-3"><i class="fa-solid fa-plus me-2"></i>Lisa uus</a>
    <table class="table table-hover mt-3">
        <thead>
            <tr class="table-secondary">
            <th>#</th>
            <th>Staatus</th>
            <th>Kirjeldus</th>   
            <th>Lisatud</th>
            <th>Toimingud</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($tasks)): ?>
                <?php foreach($tasks as $task): ?>
                    <?php 
                    if ($task['status'] == 'ootel') {
                        $taskBadge = "bg-warning";
                    }
                    if ($task['status'] == 'tegemisel') {
                        $taskBadge = "bg-secondary";
                    }
                    if ($task['status'] == 'valmis') {
                        $taskBadge = "bg-success";
                    }
                    $date = new DateTime($task['added_at']);
                    $formattedDate = $date->format('d.m.Y');
                    ?>
                    <tr>
                        <td><?= $task['id'] ?></td>
                        <td> <span class="badge <?= $taskBadge ?>"><?= $task['status'] ?></span></td>
                        <td><?= $task['text']?></td>
                        <td><?= $formattedDate?></td>
                        <td class="text-center">
                            <a href="edit_task.php?id=<?= urlencode($task['id']) ?>" class="text-primary" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="db/delete_task.php?id=<?= urlencode($task['id']) ?>" class="text-danger" title="Delete"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php if(empty($tasks)): ?>
    <p class="small w-100 text-center"><i class="fa-solid fa-warning me-1"></i>Sul ei ole hetkel ühtegi ülesannet.</p>
    <?php endif; ?>
</div>
    </div>
    <div class="col-6">

    </div>
</div>

<?php include 'elements/foot.php'; ?>