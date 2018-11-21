<?php

$id = $_GET['id'];

$dsn = "mysql:host=localhost;dbname=chemiche_immnewsnetwork;charset=utf8mb4";
$dbusername = "chemiche_wrenche";
$dbpassword = "G0atpandah!";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->prepare("SELECT * FROM `articles` WHERE id = $id");

$stmt->execute();

$row = $stmt->fetch();
?>
<h1>Are you sure you want to delete this article?</h1>
<p>Author: <?php echo($row["author"]); ?></p>
<p>Title: <?php echo($row["title"]); ?></p>
<p>Content: <?php echo($row["content"]); ?></p>

<?php ?>
<form action="confirm-delete.php" method="POST">
	<input type="hidden" value="<?php echo($row["id"]); ?>" name="id"/>
	<input type="submit" value="Confirm"/>
</form>
