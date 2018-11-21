<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$dsn = "mysql:host=localhost;dbname=chemiche_immnewsnetwork;charset=utf8mb4";
$dbusername = "chemiche_wrenche";
$dbpassword = "G0atpandah!";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->prepare(
	"SELECT * FROM `users`
	WHERE `username` = '$username'
	AND `password` = '$password'");

$stmt->execute();

if($row = $stmt->fetch()){
	$_SESSION['logged-in'] = true;
	$_SESSION['username'] = $row['username'];
	$_SESSION['role'] = $row['role'];
	$_SESSION['id'] = $row['id'];

	if (($_SESSION['role'] == 2) || ($_SESSION['role'] == 3)){

	header("Location: index.php");

	}else{

	header("Location: dashboard.php");

	}
}else{
	header("Location: login.php");
}
?>
