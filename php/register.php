<?php
require('config.php');

if(($_POST['name'] || $_POST['username'] || $_POST['email'] || $_POST['password'] || $_POST['phone']) == "")
{
	echo '<script>alert("Fiellds Are Empty");</script>';
	Print '<script>window.location.assign("../reghtm.php");</script>';
	
}
else if(!preg_match("/^[a-zA-Z0-9]*$/",$_POST['name']))
	{
		echo '<script>alert("Name Must Contain Alphanumeric charecters");</script>';
		Print '<script>window.location.assign("../reghtm.php");</script>';
	}
else if(!preg_match("/^[a-zA-Z0-9]*$/",$_POST['username']))
	{
		echo '<script>alert("Username Must Contain Alphanumeric charecters");</script>';
		Print '<script>window.location.assign("../reghtm.php");</script>';
	}
else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST['email']))
	{
		echo '<script>alert("Email Must be in Format xx@yy.zz");</script>';
		Print '<script>window.location.assign("../reghtm.php");</script>';
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/",$_POST['password']))
	{
		echo '<script>alert("password Must Contain Alphanumeric charecters");</script>';
		Print '<script>window.location.assign("../reghtm.php");</script>';
	}
	else if(!preg_match("/[0-9]*$/",$_POST['phone']))
	{
		echo '<script>alert("Phone number Must Contain 10 digita [0-9]");</script>';
		Print '<script>window.location.assign("../reghtm.php");</script>';
	}
		
else
{

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = mysqli_real_escape_string($link,$_POST['name']);
	$username = mysqli_real_escape_string($link,$_POST['username']);
	$email = mysqli_real_escape_string($link,$_POST['email']);
	$password = mysqli_real_escape_string($link,$_POST['password']);
	$phone = mysqli_real_escape_string($link,$_POST['phone']);
	$sno = mysqli_real_escape_string($link,$_POST['sno']);
    $bool = true;
	$query = mysqli_query($link,"Select * from user");
	while($row = mysqli_fetch_array($query))
	{
		$table_users = $row['username']; 
		if($username == $table_users) 
		{
			$bool = false;
			Print '<script>alert("Username has been taken! \n Try Again with Another Username :)");</script>';
			Print '<script>window.location.assign("../reghtm.php");</script>'; 
		}
	}

	if($bool)
	{
		mysqli_query($link,"INSERT INTO user (name,username,email, password,phone,secret) VALUES ('$name','$username','$email','$password','$phone','$sno')") or die(mysqli_error($link)); 
		Print '<script>alert("Successfully Registered!");</script>';
		Print '<script>window.location.assign("../loginreg_htm.php");</script>';
		}

}


}
?>