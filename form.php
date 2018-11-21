<?php
session_start();

$dsn = "mysql:host=localhost;dbname=chemiche_immnewsnetwork;charset=utf8mb4";
$dbusername = "chemiche_wrenche";
$dbpassword = "G0atpandah!";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

?>

<!doctype html>
<html>
    <head>
        <title>Contact Form</title>
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
        <form action="processing-contact.php" method="POST">
            <h1>Contact Us</h1>
            <fieldset>
            <p>
                <h2>Your information:</h2>
                First name:<input type = "text" name = "firstName" required/>
                Last name:<input type = "text" name="lastName" required/>
            </p>
                Email:<input type = "email" name="email" placeholder="e.g. name@hotmail.com" required/>
            <p>
                Subject:<input type = "text" name="subject" required/>
            </p>
            <p>
                Message: <br>
                <textarea name="message" required></textarea>
                <h4>What categories are you interested in?</h4>
                Industry:<input type="checkbox" name="industry" value="industry"/>
                Technical:<input type="checkbox" name="technical" value="technical"/>
                Career:<input type="checkbox" name="career" value="career"/><br>
            </p>
                <h2>Your role:</h2>
                <select name="role">
                    <option value="1">Administrator</option>
                    <option value="2">Writer</option>
                    <option value="3" selected>Contributor</option>
                </select>

            </fieldset>
            <input type="submit" />
        </form>
    </body>

    <footer>
        By visiting <a href="index.php">immnewsnetwork.com</a> you agree to our <a href="cookiepolicy.html" target="_blank">cookie policy</a>.
    </footer>
</html>
