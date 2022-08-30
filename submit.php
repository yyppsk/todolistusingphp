<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Refresh" content="0; url='./index.php'" />
    <title>Document</title>
</head>
<body>
<?php
    $server = "localhost";
    $user = "rootuser";
    $password = "123123test";
    $db = "todo";
    $username = $_POST['username'];
    $todo = $_POST['todo'];
    $email = $_POST['email'];
    $connect = mysqli_connect($server,$user,$password,$db);
    if(isset($_POST["submit"])){
        if($query = mysqli_query($connect,"INSERT INTO list VALUES('".$email."','".$username."', '".$todo."')")){
            echo "Success";
        }else{
            echo "Failure" . mysqli_error($connect);
        }
    }
?>
</body>
</html>