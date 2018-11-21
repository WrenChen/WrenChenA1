<?php

header("Location: thank-you.php");

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$role = $_POST['role'];
$industry = $_POST['industry'];
$technical = $_POST['technical'];
$career = $_POST['career'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$dsn = "mysql:host=localhost;dbname=chemiche_immnewsnetwork;charset=utf8mb4";
$dbusername = "chemiche_wrenche";
$dbpassword = "G0atpandah!";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->prepare("INSERT INTO `contact` (`id`, `firstName`, `lastName`, `email`, `role`, `industry`, `technical`, `career`, `subject`, `message`)
		VALUES (NULL, '$firstName', '$lastName', '$email', '$role', '$industry', '$technical', '$career', '$subject', '$message'
		); ");

$stmt->execute();

?>
