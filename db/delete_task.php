<?php

require '../config.php';

$id = $_GET['id'];

if (deleteTask($id)) {
    header("Location: ../view_tasks.php");
    exit;
}