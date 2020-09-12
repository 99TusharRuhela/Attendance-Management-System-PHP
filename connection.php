<?php

	$host="localhost";
	$dbname="attnd";
	$user="root";
	$pass="";
	
	$link=new mysqli($host,$user,$pass,$dbname);
	
	if($link){
		//echo"Connection Establish Succesfully";
	}
	
	else{
		echo"error";
	}
?>