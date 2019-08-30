<?php
	session_start();
	$id=1;
	$edit_state=false;
	date_default_timezone_set("Asia/kolkata");
	$db=mysqli_connect("localhost","root","","connection");    //connect to datebase
	$name= $ridet= $rided= $dest= $gender= "";
	if(isset($_POST["submit"])){                     //when submit button is clicked
		
		$name=$_POST["user_name"];
		$ridet=$_POST["usr_time"];
		$rided= $_POST['ride_date'];
		$dest=$_POST["cities"];
		$gender=$_POST["gender"];
		
		$query="INSERT INTO operate (name,rideD,rideT,destination,gender) VALUES ('".$name."','".$rided."','".$ridet."','".$dest."','".$gender."')"; 
		mysqli_query($db,$query);
		header('location:Register.php?save=true');     //redirect to index page
	}
	
	if(isset($_POST["update"])){                //when update button is clicked
		$id=$_POST["id"];
		$name=$_POST["user_name"];
		$ridet=$_POST["usr_time"];
		$rided=$_POST["ride_date"];
		$dest=$_POST["cities"];
		$gender=$_POST["gender"];
		
		echo $query1="UPDATE operate SET name='".$name."', rideD='".$rided."', rideT='".$ridet."', destination='".$dest."', gender='".$gender."'  WHERE id= '".$id."' "; 
		mysqli_query($db,$query1);
		header('location:Register.php?save=true');
	}
	
	
	
	if(isset($_GET["delete"])){           //when delete button is clicked
		$id=$_GET["delete"];
		$query2="DELETE from operate where id='".$id."' "; 
		$rec=mysqli_query($db,$query2);
		header('location:Register.php?save=true');
	}
		//$id=@$_GET['id'];
		//$query1="Select * from operate where id='".$id."'";
		//$results=mysqli_query($db,$query1);
	

?>