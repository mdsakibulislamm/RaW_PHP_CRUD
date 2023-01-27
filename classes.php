<?php 

/**
 * 
 */
class sakib
{
	private $con;
	function __construct()
	{
		$this->con=new mysqli("localhost","root","","pencilbox");
	}
	function insert($data){
		$name=$data['name'];
		$email=$data['email'];
		$status=$data['status'];
		if(empty($name)){
			echo "!!!Name field is empty!!!";
		}
		if(empty($email)){
			echo "!!!Email field is empty!!!";
		}
		else{
				$result= $this->con->query("INSERT INTO tbl_students(name,email,status)VALUES('$name','$email','$status')");
													if ($result){
														echo "Success";
													}
													else{
														echo "Failed";
													}

		}

	}
	function show(){
		$result= $this->con->query("SELECT *FROM tbl_students");
		return $result;

	}
		function findData($id){
		$result= $this->con->query("SELECT *FROM tbl_students WHERE id='$id' LIMIT 1");
		return $result;

	}
		function update($data,$id){
			$name=$data["name"];
			$email=$data["email"];
			$status=$data["status"];
			$result= $this->con->query("UPDATE tbl_students SET name='$name',email='$email',status='$status' WHERE id='$id' LIMIT 1");
		header("location: index.php");
	

	}


}


 ?>