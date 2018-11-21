<?php
session_start();

$dsn = "mysql:host=localhost;dbname=chemiche_immnewsnetwork;charset=utf8mb4";
$dbusername = "chemiche_wrenche";
$dbpassword = "G0atpandah!";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$intro = $pdo->prepare("SELECT * FROM `content` WHERE `id` = 1 ");
$about = $pdo->prepare("SELECT * FROM `content` WHERE `id` = 2 ");

$intro->execute();
$about->execute();

$row1 = $intro->fetch();
$row2 = $about->fetch();
?>

<!doctype html>
<html>
    <head>
        <title>Dashboard</title>
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

    <body>
        <form action="processing-content.php" method="POST" enctype='multipart/form-data'>
            <h1>Dashboard</h1>
            <fieldset>
            <h2>Intro</h2>
            <p>
                Title:<input type = "text" name = "title" required/>
            </p>
                Text: <br>
                <textarea rows="10" cols="100" name="text" required><?php echo $row1['text'] ?></textarea>
            </p>

            <h2>About</h2>
            <p>
                Title:<input type = "text" name = "title" required/>
            </p>
                Text: <br>
                <textarea rows="10" cols="100" name="text" required><?php echo $row2['text'] ?></textarea>
            </p>

            </fieldset>
            <input type="submit" />
        </form>
    </body>

</html>

<?php
// }
?>
