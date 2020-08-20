<?php 
require 'config.php';
if($_POST){
    $id = $_POST['id'];
   
    $title = $_POST['title'];
    $description = $_POST['description'];

    $pdostatement= $pdo->prepare("UPDATE todo SET title='$title',description='$description' WHERE id='$id';");
    $result = $pdostatement->execute();

   
    if($result){
      
     echo "<script>alert('New Todo update')</script>";
         echo"<script>document.location.href = 'index.php',true;</script>";
        
    } 
    exit();
}else{
$pdostatement=$pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
$pdostatement->execute();
$result=$pdostatement->fetchAll();

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
<h1>Edit todo</h1>
<div class="card-body">
<form action="edit.php" method="post">
<input type="hidden" name="id" value="<?php echo $result[0]['id'];?>">
    <div class="form-group">
    

 <label for="">Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'];?>" required>
    </div>
    <div class="form-group">
 <label for="">Description</label>
    <textarea name="description" id="" cols="30" rows="5" class="form-control" required><?php echo $result[0]['description'];?></textarea>
    </div>
    
    <input type="submit" class="btn btn-success" value="update">
    </form>

    
</div>
</div>
    
</body>
</html>