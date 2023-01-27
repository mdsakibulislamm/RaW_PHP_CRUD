<?php 
include "classes.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Boostrap CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Document</title>
</head>
<body>
	<div class="row mt-5">
		<div class="col-md-6 offset-md-3">
			<?php 
			$sakib= new sakib;
			$id=$_GET['editId'];

			if(isset($_GET['editId']))
			{
				
				$data=$sakib->findData($id)->fetch_assoc();
				 	
			}else{
				header("location: index.php");
			}
			if (isset($_POST['update'])) {
				$sakib->update($_POST, $id);			
			}

			 ?>
			<form method="POST">
				<div class="form-group">
					<label for="">User name</label>
					<input type="text" class="form-control" placeholder="Enter your name" name="name" value="<?php echo $data["name"]; ?>">
				</div>			
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" class="form-control" placeholder="Enter your email" name="email" value="<?php echo $data["email"]; ?>">
				</div>			
				<div class="form-group">
					<label for="">Status</label>
					<select name="status" class="form-control">
						<option value="1">-----Select Status-----</option>
						<option value="1">Active</option>
						<option value="2">Inactive</option>	
					</select>
				</div>
				<button name="update" class="mt-3 btn btn-info form-control">Update</button>
			</form>
		</div>
	</div>

	

</body>
</html>