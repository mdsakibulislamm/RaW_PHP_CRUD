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

			if(isset($_POST['save']))
			{
				 $sakib->insert($_POST);	
			}

			 ?>
			<form method="POST">
				<div class="form-group">
					<label for="">User name</label>
					<input type="text" class="form-control" placeholder="Enter your name" name="name">
				</div>			
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" class="form-control" placeholder="Enter your email" name="email">
				</div>			
				<div class="form-group">
					<label for="">Status</label>
					<select name="status" class="form-control">
						<option value="1">-----Select Status-----</option>
						<option value="1">Active</option>
						<option value="2">Inactive</option>	
					</select>
				</div>
				<button name="save" class="mt-3 btn btn-info form-control">Save</button>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 offset-md-3">
			<table class="table">
				<tr>
					<th>#sl</th>
					<th>Name</th>
					<th>Email</th>
					<th>Action</th>					
					<th>Status</th>
				</tr>

				<?php 
				$result=$sakib->show();
				if ($result->num_rows>0) {
					$sl=1;
					while($data=$result->fetch_assoc()) {
						echo ' 				<tr>
												<td>'.$sl.'</td>
												<td>'.$data["name"].'</td>
												<td>'.$data["email"].'</td>
												<td>
													<a  href="edit.php?editId='.$data["id"].'" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
													<a href="delete.php?uid='.$data["id"].'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
												</td>';
											if ($data["status"]==1) {
												echo '<td>Activate</td></tr>';
											}else{
												echo '<td>Inactivate</td></tr>';

											}
						$sl++;
						
					}

				}else{
					echo "<tr>
								<td  colspan='5'>DATA NOT FOUND</td>
						</tr>";
				}


				 ?>
			</table>
		</div>
	</div>

</body>
</html>