<?php include("server.php");
	if(isset($_GET["edit"])){
		$id=$_GET["edit"];
		$edit_state=true;
		$query="SELECT * from operate where id='".$id."'";
		$rec=mysqli_query($db,$query);
		$record=mysqli_fetch_array($rec);
		$name=$record["name"];
		$ridet=$record["rideT"];
		$rided=$record["rideD"];
		$dest=$record["destination"];
		$gender=$record["gender"];
	}
?>	
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	table{
		width:50%;
		margin:auto;
		border-collapse: collapse;
	}
	tr{
		border-bottom:1px solid black;
	}
	th,td{
		height:20px;
		padding:5px;
		text-align:center;
	}
	body{
		margin:auto;
		background: url(".jpg");
		background-repeat: no-repeat;

	}
	form{
		padding:10px;
		margin: 10px auto;
		background: rgba(0,0,0,0.2);
		width: 400px;
		height:600px;
		border-radius:10px;
	}
	.input_field{
		width:100%;
		margin-bottom:10px;
		margin-left:15px;
	}
	
	input[type="text"],input[type="date"],input[type="time"],input[type="date"]{
		width: 320px;
		padding:10px;
		margin:10px;
		margin-left:15px;
		border-radius:5px;
	}
	.btn{
		
		font-size:20px;
		border-radius:5px;
		background-color: #4CAF50;
		border: none;
		color: white;
		padding: 10px;
		text-align: center;
		text-decoration: none;
		margin: 10px;
		position:relative;
		left:120px;
	}
	.btn1{
		font-size:10px;
		border-radius:5px;
		border: none;
		color: white;
		padding: 5px;
		text-align: center;
		text-decoration: none;
		margin: 2px;
	
	}
	select{
		width: 337px;
		padding:10px;
		margin:10px;
		margin-left:15px;
		border-radius:5px;
	}
	.input_form{
		margin-left:10px;
		color:white;
		font-size: 20px; 
	}
	.input_val{
		width:30%;
		float:left;
		color:white;
		font-size:19px;
		margin:5px;
	}
</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Ride Date</th>
				<th>Ride Time</th>
				<th>Destination</th>
				<th>Gender</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query="SELECT * from operate order by id desc";
			$sno=1;
			$results=mysqli_query($db,$query);
			while($row = mysqli_fetch_array($results)){ ?>
				<tr>
					<td><?php echo $sno;?></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['rideD'];?></td>
					<td><?php echo $row['rideT'];?></td>
					<td><?php echo $row['destination'];?></td>
					<td><?php echo $row['gender'];?></td>
					<td><a href="Register.php?edit=<?php echo $row["id"];?>"><input type="submit" value="Edit" name="sub" class="btn1" style="background-color:red;"></a></td>
					<td><a href="server.php?delete=<?php echo $row["id"];?>"><input type="submit" value="Delete" name="sub" class="btn1" style="background-color:skyblue;"></a></td>
				</tr>
			<?php 
			$sno=$sno+1;} 
			?>
			
		</tbody>
		
	</table>
		  
<div class="img_box">
	
		<form method="post" action="server.php" >
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<h1 style="margin:25px; color:white">Book now!</h1>
			<div class="input_field">
				<div class="input_form">Name</div>
				<input type="text" placeholder="Enter Name" name="user_name" value="<?php echo $name; ?>">
			</div>
			<div class="input_field">
				<div class="input_form">Ride Date</div>
				<input type="date" name="ride_date" value="<?php echo $ridet; ?>">
			</div>	
			<div class="input_field">
				<div class="input_form">Ride Time</div>
				<input type="time" name="usr_time" value="<?php echo $rided; ?>">
			</div>
			<div class="input_field">
				<div class="input_form">Choose Destination</div>
				<select name="cities">
					<option value="Assam" <?php echo ((isset($row["destination"])) && ($row["destination"]!="") && ($row["destination"]="Assam") ? "selected='selected'": "")?>>Assam</option>
					<option value="Pune" <?php echo ((isset($row["destination"])) && ($row["destination"]!="") && ($row["destination"]="Pune") ? "selected='selected'": "")?>>Pune</option>
					<option value="Kannur" <?php echo ((isset($row["destination"])) && ($row["destination"]!="") && ($row["destination"]="Kannur") ? "selected='selected'": "")?>>Kannur</option>
					<option value="Darjelling" <?php echo ((isset($row["destination"])) && ($row["destination"]!="") && ($row["destination"]="Darjelling") ? "selected='selected'": "")?>>Darjelling</option>
					<option value="Meghalya" <?php echo ((isset($row["destination"])) && ($row["destination"]!="") && ($row["destination"]="Meghalya") ? "selected='selected'": "")?>>Meghalya</option>
					<option value="Mumbai" <?php echo ((isset($row["destination"])) && ($row["destination"]!="") && ($row["destination"]="Mumbai") ? "selected='selected'": "")?>>Mumbai</option>
				</select>
			</div>
			<div class="input_field">
				<div class="input_form">Gender</div>
				<div class="input_val"><input type="radio" name="gender" value="Male"<?php echo ((isset($row["gender"])) && ($row["gender"]!="") && ($row["gender"]="Male") ? "checked": "")?>>Male</div>
				<div class="input_val"><input type="radio" name="gender" value="Female"<?php echo ((isset($row["gender"])) && ($row["gender"]!="") && ($row["gender"]="Female") ? "checked": "")?>>Female</div>
				<div class="input_val"><input type="radio" name="gender" value="Other"<?php echo ((isset($row["gender"])) && ($row["gender"]!="") && ($row["gender"]="Other") ? "checked": "")?>>Other</div>
			</div>
			<?php if($edit_state==false): ?>
			<div class="input_field">
				<input type="submit" value="submit" name="submit" class="btn">
			</div>	
			<?php else:?>
			<div class="input_field">
				<input type="submit" value="Update" name="update" class="btn">
			</div>
			<?php endif ?>
		</form>
	
</div>
</body>
</html>