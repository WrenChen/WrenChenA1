<?php
session_start();

$dsn = "mysql:host=localhost;dbname=chemiche_immnewsnetwork;charset=utf8mb4";
$dbusername = "chemiche_wrenche";
$dbpassword = "G0atpandah!";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

$welc= $pdo->prepare("SELECT * FROM `content`WHERE `id`='1'");
$video= $pdo->prepare("SELECT * FROM `content`WHERE `id`='3'");
$feat = $pdo->prepare("SELECT * FROM `articles` WHERE `featured` = '1'");
$career = $pdo->prepare("SELECT * FROM `articles` WHERE (`featured` = '0' AND `category` = '1')");
$industry = $pdo->prepare("SELECT * FROM `articles` WHERE (`featured` = '0' AND `category` = '2')");
$technical = $pdo->prepare("SELECT * FROM `articles` WHERE (`featured` = '0' AND `category` = '3')");

$welc->execute();
$video->execute();
$feat->execute();
$career->execute();
$industry->execute();
$technical->execute();
?>

<!doctype html>
<html>
    <head>
        <title>Home</title>
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
            <p>
                <?php
                while($row = $welc->fetch()) {
                    ?><div>
                        <h1><p><?php echo($row["Title"]); ?></p></h1>
                        <p><?php echo($row["Text"]); ?></p>
                    </div>
                <?php }
                ?>
            </p>

            <p>
                <?php
                while($row = $video->fetch()) {
                    ?><div>
                        <h2><p><?php echo($row["Title"]); ?></p></h2>
                        <iframe width="560" height="315" src="<?php echo ($row["Text"]); ?>"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                        </iframe>
                    </div>
                <?php }
                ?>
            </p>
            <p>
                <h2>Featured Article:</h2>
                <?php
                while($row = $feat->fetch()) {
                    ?><div>
                        <p><img src='images/<?php echo ($row["image"]); ?>'width = "800"></p>
                        <h3><?php echo($row["title"]); ?></h3>
                        <?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2){ ?><a href="addeditarticle.php?id=<?= $row['id'] ?>">Edit</a><?php } ?>
                        <?php if ($_SESSION['role'] == 1){ ?><a href="delete.php?id=<?= $row['id'] ?>">Delete</a><?php } ?>
                        <p><?php echo($row["author"]); ?></p>
                        <p><?php echo($row["preview"]); ?></p>
                        <a href="articles/article.php?id=<?= $row['id'] ?>">Read the full article</a>
                    </div>
                <?php }
                ?>
            </p>

            <p>
                <h2>Career:</h2>
                <?php
                while($row = $career->fetch()) {
                    ?><div>
                        <p><img src='images/<?php echo ($row["image"]); ?>'width = "800"></p>
                        <h3><?php echo($row["title"]); ?></h3>
                        <?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2){ ?><a href="addeditarticle.php?id=<?= $row['id'] ?>">Edit</a><?php } ?>
                        <?php if ($_SESSION['role'] == 1){ ?><a href="delete.php?id=<?= $row['id'] ?>">Delete</a><?php } ?>
                        <p><?php echo($row["author"]); ?></p>
                        <p><?php echo($row["preview"]); ?></p>
                        <a href="articles/article.php?id=<?= $row['id'] ?>">Read the full article</a>
                    </div>
                <?php }
                ?>
            </p>

            <p>
                <h2>Industry:</h2>
                <?php
                while($row = $industry->fetch()) {
                    ?><div>
                        <p><img src='images/<?php echo ($row["image"]); ?>'width = "800"></p>
                        <h3><?php echo($row["title"]); ?></h3>
                        <?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2){ ?><a href="addeditarticle.php?id=<?= $row['id'] ?>">Edit</a><?php } ?>
                        <?php if ($_SESSION['role'] == 1){ ?><a href="delete.php?id=<?= $row['id'] ?>">Delete</a><?php } ?>
                        <p><?php echo($row["author"]); ?></p>
                        <p><?php echo($row["preview"]); ?></p>
                        <a href="articles/article.php?id=<?= $row['id'] ?>">Read the full article</a>
                    </div>
                <?php }
                ?>
            </p>

            <p>
                <h2>Technical:</h2>
                <?php
                while($row = $technical->fetch()) {
                    ?><div>
                        <p><img src='images/<?php echo ($row["image"]); ?>'width = "800"></p>
                        <h3><?php echo($row["title"]); ?></h3>
                        <?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2){ ?><a href="addeditarticle.php?id=<?= $row['id'] ?>">Edit</a><?php } ?>
                        <?php if ($_SESSION['role'] == 1){ ?><a href="delete.php?id=<?= $row['id'] ?>">Delete</a><?php } ?>
                        <p><?php echo($row["author"]); ?></p>
                        <p><?php echo($row["preview"]); ?></p>
                        <a href="articles/article.php?id=<?= $row['id'] ?>">Read the full article</a>
                    </div>
                <?php }
                ?>
            </p>
            <p>
            <table style="width:50%">
                <h4>Site Visitors</h4>
                <tr>
                    <th>Month</th>
                    <th>Visitor Count</th>
                </tr>
                <tr>
                    <td>June</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>July</td>
                    <td>54</td>
                </tr>
                <tr>
                    <td>August</td>
                    <td>460</td>
                </tr>
                <tr>
                    <td>September</td>
                    <td>805</td>
                </tr>
                <tr>
                    <td>October</td>
                    <td>1054</td>
                </tr>
                <tr>
                    <td>November</td>
                    <td>1</tds>
                </tr>
            </p>
</table>
    </body>

    <footer>
        By visiting <a href="index.php">immnewsnetwork.com</a> you agree to our <a href="cookiepolicy.html" target="_blank">cookie policy</a>.
    </footer>

</html>
