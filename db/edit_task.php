<?php

require '../config.php';

$id = $_POST['id'];
$text = $_POST['text'];
$status = $_POST['status'];

if (editTask($id, $text, $status)) {
    header("Location: ../view_tasks.php");
    exit;
}