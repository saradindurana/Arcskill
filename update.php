<?php
include 'database.php';
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$mail=$_POST['mail'];
$country=$_POST['country'];
$sql = "UPDATE `people` SET `l_name`='$l_name', `mail`='$mail',`country`='$country' WHERE f_name='$f_name' ";
mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        alert("Edited Succesfully, returning to User details.");
        window.location.href = "index.php";
    </script>
</body>
</html>