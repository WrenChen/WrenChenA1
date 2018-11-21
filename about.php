<?php
session_start();

$dsn = "mysql:host=localhost;dbname=chemiche_immnewsnetwork;charset=utf8mb4";
$dbusername = "chemiche_wrenche";
$dbpassword = "G0atpandah!";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$stmt = $pdo->prepare("SELECT * FROM `content`WHERE `id`='2'");

$stmt->execute();
?>

<!doctype html>
<html>
    <head>
        <title>About</title>
        <meta charset="utf-8" />
        <link rel="icon" href="images/favicon.ico" />
    </head>

    <header>
        <img src = "images/logo.png" />
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="form.php">Contact Us</a></li>
                <?php if ($_SESSION['logged-in'] == true){
                ?><li><a href="logout.php">Logout</a></li><?php
            }else{?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php } ?>
                <?php if ($_SESSION['role'] == 1) { ?> <li><a href="dashboard.php">Dashboard</a></li> <?php } ?>
            </ul>
        </nav>
    </header>

		<?php
		while($row = $stmt->fetch()) {
			?><div>
				<h3><p><?php echo($row["Title"]); ?></p></h3>
				<p><?php echo($row["Text"]); ?></p>
			</div>
		<?php }
		?>

		<footer>
			By visiting <a href="index.php">immnewsnetwork.com</a> you agree to our <a href="cookiepolicy.html" target="_blank">cookie policy</a>.
		</footer>
	</html>
