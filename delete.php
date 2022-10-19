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
    $id = (int)$_GET['id']; //FIX SQL INJECTION

    $statement = $pdo->prepare("DELETE FROM list WHERE id = ?");
    $statement->bindValue(1,$id);

    if ($statement->execute()){
        echo "Success";
    }else{
        echo "Failure";
    }
    
?>
</body>
</html>