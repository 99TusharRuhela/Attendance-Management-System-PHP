<?php include_once("connection.php"); ?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
		
		<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css" />
		<script type="text/javascript" src="bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
		
</head>
<body>
	<div class="panel panel-default container">
	
	<div class="panel-heading">
		<h1 style="text-align:center;">Attendance Management System</h1>
	</div>
	
	<div class="panel-body">
		<a href="home.php" class="btn btn-primary">Home</a>
		<a href="add.php" class="btn btn-primary pull-right">Add</a>
		
		<form action="" method="post">
		<table class="table">
		
		<thead>
		
		<tr>
			<th>Sr No.</th>
			<th>Date</th>
			<th>View</th>
		</tr>
		
		</thead>
			
			<?php
			
				$query="select distinct date from attendance";
				$result=$link->query($query);
				
				if($result->num_rows>0){
					$i=0;
					 while($val=$result->fetch_assoc()){
					     $i++;	
					
									
			
			
			?>
			
			
			
		<tr>
			<td><?php echo $i; ?></td>
			
			<td><?php echo $val['date']; ?></td>
			
			<td><a href="viewp.php?date=<?php echo $val['date'] ?>" class="btn btn-primary">View</a></td>
			
		</tr>
		<?php } } ?>
		
	</div>
	
	<div class="panel-footer">
		
	</div>
	
	
	</div>
</body>
</html>