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
		<a href="view.php" class="btn btn-primary pull-right">Back</a>
		
		<form action="" method="post">
		<table class="table">
		
		<thead>
		
		<tr>
			<th>Sr No.</th>
			<th>Name</th>
			<th>Father Name</th>
			<th>Email</th>
			<th>Attendance</th>
		</tr>
		
		</thead>
			
			<?php
			
			if($_GET['date']){
				$date=$_GET['date'];
			
				$query="SELECT emp.*,attendance.* FROM attendance inner join emp on attendance.emp_id=emp.emp_id and attendance.date='$date'";
				$result=$link->query($query);
				
				if($result->num_rows>0){
					$i=0;
					 while($val=$result->fetch_assoc()){
					     $i++;	
					
									
			
			
			?>
			
			
			
		<tr>
			<td><?php echo $i; ?></td>
			
			<td><?php echo $val['name']; ?></td>
			
			<td><?php echo $val['fname']; ?></td>
			
			<td><?php echo $val['email']; ?></td>
			
			<td>
			
				Present <input type="radio" value="Present" 
				
				<?php
				 
				 if($val['value']=='Present')
					echo "Checked";
				
				?>
				
				/>
			
			
				Absent <input type="radio" value="Absent" 
				
				<?php
				 
				 if($val['value']=='Absent')
					echo "Checked";
				
				?>
				
				/>
			
			
			</td>
			
		</tr>
		<?php } } } ?>
		
	</div>
	
	<div class="panel-footer">
		
	</div>
	
	
	</div>
</body>
</html>