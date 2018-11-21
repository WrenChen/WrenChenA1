<?php

$id = $_POST["id"];

$dsn = "mysql:host=localhost;dbname=chemiche_immnewsnetwork;charset=utf8mb4";
$dbusername = "chemiche_wrenche";
$dbpassword = "G0atpandah!";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->prepare("DELETE FROM `articles` WHERE `id` = $id");

$stmt->execute();

header("Location: index.php");

?>
