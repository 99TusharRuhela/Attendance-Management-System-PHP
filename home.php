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
		<a href="view.php" class="btn btn-primary">View</a>
		<a href="add.php" class="btn btn-primary pull-right">Add</a>
		
		<form action="" method="post">
		<table class="table">
		
		<thead>
		
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Father Name</th>
			<th>Email</th>
			<th>Attendance</th>
		</tr>
		
		</thead>
		
		
		<tbody>
		
		<?php
		
			$query="select * from emp";
			$result=$link->query($query);
			while($show=$result->fetch_assoc()){
			
			
			 
		
		?>
		
		<tr>
			<td><?php echo $show['emp_id']; ?></td>
			<td><?php echo $show['name']; ?></td>
			<td><?php echo $show['fname']; ?></td>
			<td><?php echo $show['email']; ?></td>
			<td>
			
				Present<input required type="radio" name="attendance[<?php echo $show['emp_id']; ?>]" value="Present" id="" />
				Absent<input  required type="radio" name="attendance[<?php echo $show['emp_id']; ?>]" value="Absent" id="" />
			
			</td>
		</tr>
		<?php } ?>
		
		
		</tbody>
		
		
		
		
		
		<?php
		
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$att=$_POST['attendance'];
				$date=date('d-m-y');
				
				$query="select distinct date from attendance";
				$result=$link->query($query);
				$b=false; 
				if($result->num_rows>0){
				while($check=$result->fetch_assoc()){
				
					if($date==$check['date']){
					$b=true;
					echo "<div class='alert alert-danger'> 
					
					Attendance already taken today!!!;
					
					</div>";
					
				 }
				}
			}	
				if(!$b){
					foreach($att as $key => $value){
						
						if($value=="Present"){
							
							$query="insert into attendance(value,emp_id,date) values('Present','$key','$date')";
							$insertResult=$link->query($query);
							
						}
						else{
							
							$query="insert into attendance(value,emp_id,date) values('Absent','$key','$date')";
							$insertResult=$link->query($query);
							
							
						}
						
					}
					
					if($insertResult){
							echo "<div class='alert alert-success'> 
					
					            Attendance taken successfully!!!;
					
					        </div>";
					
					}
					
				}
				
				
			 
			  
			}
		
		
		?>
		
		
		
		</table>
			<input type="submit" class="btn btn-primary" value="Take Attendance" />
		</form>
	</div>
	
	<div class="panel-footer">
		
	</div>
	
	
	</div>
</body>
</html>