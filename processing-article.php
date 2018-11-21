<?php

$uploaddir = 'images/';
$uploadfile = $uploaddir . basename($_FILES['image']['name']);

if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded. Thank you!</a>\n";

} else {
    echo "Error occurred, please try again!\n";
}

 ?><a href="index.php">Go Back to Home</a> <?php

$id = $_POST['id'];
$author = $_POST['author'];
$category = $_POST['category'];
$title = $_POST['title'];
$content = $_POST['content'];
$preview = $_POST['preview'];
$image = $_FILES['image']['name'];
$url = $_POST['url'];

$dsn = "mysql:host=localhost;dbname=chemiche_immnewsnetwork;charset=utf8mb4";
$dbusername = "chemiche_wrenche";
$dbpassword = "G0atpandah!";

$pdo = new PDO($dsn, $dbusername, $dbpassword);

if ($id> 0) {
    $stmt = $pdo->prepare("UPDATE `articles` SET `author` = '$author',  `category` = '$category', `title` = '$title', `content` = '$content',
        `preview` = '$preview',`image` = '$image', `url` = '$url' WHERE `id` = '$id'");

}else{

$stmt = $pdo->prepare("INSERT INTO `articles` (`id`, `author`, `category`, `title`, `content`, `preview`,`image`, `url`)
		VALUES (NULL, '$author', '$category', '$title', '$content', '$preview','$image', '$url'
		); ");
};
$stmt->execute();

?>
