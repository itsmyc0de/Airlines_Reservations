<?php
	require('config.php');
	
	if(($_POST['username'] || $_POST['password']) == "")
	{
		echo '<script>alert("Fiellds Are Empty");</script>';
		Print '<script>window.location.assign(" ../loginreg_htm.php");</script>';
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/",$_POST['username']))
	{
		
		echo '<script>alert("Username Must Contain Alphanumeric charecters");</script>';
		Print '<script>window.location.assign(" ../loginreg_htm.php");</script>';
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/",$_POST['password']))
	{
		
		echo '<script>alert("password Must Contain Alphanumeric charecters");</script>';
		Print '<script>window.location.assign(" ../loginreg_htm.php");</script>';
	}
	
	else
	{
	
	
	
	
	session_start();
	$username = mysqli_real_escape_string($link,$_POST['username']);
	$password = mysqli_real_escape_string($link,$_POST['password']);
	$query = mysqli_query($link,"SELECT * from user WHERE username='$username'") or die(mysqli_error($link)); 
	$exists = mysqli_affected_rows($link); 
	$table_users = "";
	$table_password = "";
	if($exists > 0) 
	{
		while($row = mysqli_fetch_assoc($query))
		{
			$table_users = $row['username']; 
			$table_password = $row['password'];
		}
		if(($username == $table_users) && ($password == $table_password))
		{
				if($password == $table_password)
				{
					$_SESSION['user'] = $username;
					header("location: home.php"); 
				}
				
		}
		else
		{
			Print '<script>alert("Incorrect Password!");</script>'; 
			Print '<script>window.location.assign("../loginreg_htm.php");</script>';
		}

	}
	else
	{
		Print '<script>alert("Incorrect Username!");</script>';
		Print '<script>window.location.assign("../loginreg_htm.php");</script>'; 
	}





	}

?>