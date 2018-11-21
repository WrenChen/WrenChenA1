<?php
session_start();

$dsn = "mysql:host=localhost;dbname=chemiche_immnewsnetwork;charset=utf8mb4";
$dbusername = "chemiche_wrenche";
$dbpassword = "G0atpandah!";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM `articles` WHERE `id` = '$id' ");

$stmt->execute();
?>

<!doctype html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8" />
        <link rel="icon" href="../images/favicon.ico" />
    </head>

    <header>
        <img src = "../images/logo.png" />
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../about.php">About</a></li>
                <li><a href="../form.php">Contact Us</a></li>
                <?php if ($_SESSION['logged-in'] == true){
                ?><li><a href="../logout.php">Logout</a></li><?php
            }else{?>
                <li><a href="../login.php">Login</a></li>
                <li><a href="../register.php">Register</a></li>
            <?php } ?>
            </ul>
        </nav>
    </header>

    <p>
        <?php
        while($row = $stmt->fetch()) {
            ?><div>
                <p><img src='../images/<?php echo ($row["image"]); ?>'width = "800"></p>
                <h1><?php echo($row["title"]); ?></h1>
                <h2><?php echo($row["author"]); ?></h2>
                <p><?php echo($row["content"]); ?></p>
                <a href="<?php echo($row["url"]); ?>">Click for the original source</a>
            </div>
        <?php }
        ?>
    </p>

    <footer>
        By visiting <a href="../index.php">immnewsnetwork.com</a> you agree to our <a href="../cookiepolicy.html">cookie policy</a>.
    </footer>

</html>
