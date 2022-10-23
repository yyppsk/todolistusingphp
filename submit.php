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

require "Database/ConnectBD.php";

    $pdo = ConnectBD::createConnection();

    $username = $_POST['username'];
    $todo = $_POST['todo'];
    $email = $_POST['email'];

    if(isset($_POST["submit"])){
        $statement = $pdo->prepare("INSERT INTO list(username,email,todo,date_at) VALUES(?,?,?,?)");
        $statement->bindValue(1,$_POST['username']);
        $statement->bindValue(2,$_POST['email']);
        $statement->bindValue(3,$_POST['todo']);
        $statement->bindValue(4,date("Y-m-d H:i:s"));

        if($statement->execute()){
            echo "Success";
        }else{
            echo "Failure";
        }
    }
?>
</body>
</html>