<?php
session_start();

$dsn = "mysql:host=localhost;dbname=chemiche_immnewsnetwork;charset=utf8mb4";
$dbusername = "chemiche_wrenche";
$dbpassword = "G0atpandah!";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM `articles` WHERE `id` = '$id' ");

$stmt->execute();

$row = $stmt->fetch();
?>

<!doctype html>
<html>
    <head>
        <input type="hidden" value="<?php echo($row["id"]); ?>" name="id"/>
                <?php if (isset($id)){
                ?>
                <title>Edit Article</title><?php
                }else{?>
                <title>Add Article</title>
                <?php } ?>
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
        <form action="processing-article.php" method="POST" enctype='multipart/form-data'>
            <?php if (isset($id)){
            ?>
            <h1>Edit</h1><?php
            }else{?>
            <h1>Contribute</h1>
            <?php } ?>
            <input type="hidden" value="<?php echo($row["id"]); ?>" name="id"/>
            <p>
                Author Name:<input type = "text" name = "author" value = "<?php echo $row['author'] ?>" required/>
            </p>
            <p>
                Article Category:
            <select name="category">
                <option value="1">Career</option>
                <option value="2">Industry</option>
                <option value="3">Technical</option>
            </select>
            </p>
            <p>
                Title:<input type = "text" name="title" value = "<?php echo $row['title'] ?>" required/>
            </p>
            <p>
                Article Content: <br>
                <textarea rows="10" cols="100" name="content" required><?php echo $row['content'] ?></textarea>
            </p>
            <p>
                Summary: <br>
                <textarea rows="10" cols="100" name="preview"
                placeholder="A brief summary of your article, less than 1000 characters."
                required><?php echo $row['preview'] ?></textarea>
            </p>
            <p>
                Image:<input type = "file" name="image"/>
            </p>
            <p>
                Article Link:<input type = "text" name="url" value = "<?php echo $row['url'] ?>" placeholder="Paste link here!"/>
            </p>


            </fieldset>
            <input type="submit" />
        </form>
    </body>

    <footer>
        By visiting <a href="index.php">immnewsnetwork.com</a> you agree to our <a href="cookiepolicy.html" target="_blank">cookie policy</a>.
    </footer>
</html>
