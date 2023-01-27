<?php 
	
		$id=$_GET['uid'];
		$con=new mysqli("localhost","root","","pencilbox");
		$con->query("DELETE FROM tbl_students WHERE id='$id'");
	
header("location: index.php");

 ?>