
<?php
require 'config.php';
$pdostatement=$pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
$pdostatement->execute();
$result=$pdostatement->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	
	<div class="card">
		<div class="card-body">
			<h2>Todo Home Page</h2>
			<div>
			<a href="add.php" type="button" class="btn btn-success" >Create New</a>
			</div>
			<br>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Description</th>
						<th>Created</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
                    $i=1;
                    if($result){
                        foreach($result as $r){
                    
                    
                    ?>
						<td><?php echo $i;?></td>
						<td><?php echo $r['title'] ?></td>
						<td><?php echo $r['description'] ?></td>
						<td><?php echo date('Y-m-d',strtotime($r['date'])) ?></td>
                        
						<td>
							<a href="edit.php?id=<?php echo $r['id'];?>" type="button" class="btn btn-warning">Edit</a>
							<a href="delete.php?id=<?php echo $r['id'];?>" type="button" class="btn btn-danger">Delete</a>
						</td>
					</tr>
					<?php
                    $i++;
                    }
                }
                    ?>
					
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>