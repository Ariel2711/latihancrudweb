<?php
require "config.php";
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn,"select * from user where id = '$id'");
    $row = mysqli_fetch_assoc($result);
}else{
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1 class="text-center">Welcome <?php echo $row["username"] ?></h1>
    <a href="logout.php"><h1 class="text-center">Logout</h1></a>
</body>
</html>