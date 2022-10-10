<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-DO</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<style>
  input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=email], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
    body{
    display: flex;
    flex-direction: column;
    align-items: center;
    }
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>A To-do List</h1>

<table id="customers">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>To do</th>
    <th>Submited</th>
    <th>Action</th>
  </tr>
<?php
 $server = "localhost";
 $user = "root";
 $password = "";
 $db = "todolist";
 $conn= new mysqli($server,$user,$password,$db);
 if($conn){
    echo '<div class="p-3 mb-2 bg-success text-white"><p class="text-success" style="font-size: 28px;">',"You are Succesfully connected to the Database!",'</p></div>';
 }else{
    echo '<div class="p-3 mb-2 bg-danger text-white"><p class="text-bg-danger" style="font-size: 28px;">',"You failed to connect to the Datbase",'</p></div>';;
 }
 $conn = mysqli_connect($server,$user,$password,$db);
 $sql = "SELECT * FROM list";
 $res_data = mysqli_query($conn,$sql);
      if(mysqli_num_rows($res_data) < 1)
      {
        echo "<tr>
                <td colspan='5'><center>No data existing!</center></td>
              </tr>";
      }

      while($row = mysqli_fetch_array($res_data)){
          //here goes the data   //mysqli_close($conn);
          echo '<tr>';
          echo '<td>',$row['email'],'</td>';
          echo '<td>',$row['username'],'</td>';
          echo '<td>',$row['todo'],'</td>';
          echo '<td>',$row['date_at'],'</td>';
          echo '<td><a href="delete.php?id=',$row['id'],'" onClick="ConfirmDelete()" >Delete</a></td>';
          echo '</tr>';
      }
  ?>
  </table>
  <h1>To Do list</h1>
  <form action="submit.php" method="POST">
            Name: <input type="text" name="username" required>
            <br/>
            Email: <input type="email" name="email" required>
            <br/>
            To do: <input type="text" id="todo" name="todo"
          rows="5" cols="33" required>
          <small>Enter your to do tasks here</small>
    </input>
            <br/>
            <input type="submit" name="submit" value="Register">
        </form>

        <script>
          function ConfirmDelete()
{
  return confirm("Are you sure you want to delete?");
}
        </script>
</body>
</html>