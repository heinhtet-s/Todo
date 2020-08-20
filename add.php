<?php
require 'config.php';
if($_POST){
$title=$_POST['title'];
$desc=$_POST['description'];
$sql="INSERT INTO todo(title,description) VALUES (:title,:description)";

$pdostatement=$pdo->prepare($sql);
$result=$pdostatement->execute(
    [
        ":title"=>$title,
        ":description"=>$desc,
    ]
    );
    if($result){
        echo "<script>alert('New todo Added')</script>";
        echo"<script>document.location.href = 'index.php',true;</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="card">
<h1>Create new todo</h1>
<div class="card-body">
<form action="add.php" method="post">
    <div class="form-group">
 <label for="">Title</label>
    <input type="text" class="form-control" name="title" required>
    </div>
    <div class="form-group">
 <label for="">Description</label>
    <textarea name="description" id="" cols="30" rows="5" class="form-control" required></textarea>
    </div>
    
    <input type="submit" class="btn btn-success" value="add new">
    </form>

    
</div>
</div>
    
</body>
</html>