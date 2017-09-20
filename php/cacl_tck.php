<?php
require('config.php');

	session_start(); 
	if($_SESSION['user']){}
	else{
		header("location: ../index.php");
	}
	$user = $_SESSION['user'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Flights Today In service</title>
<link href="../css/ind_css.css" rel="stylesheet" type="text/css" />
<link href="../css/fli_css.css" rel="stylesheet" type="text/css" />
<link href="../css/serch_tck_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="navigation">
<div class="hme"><a href="../index.php">Home</a></div>
<div class="hme1"><a href="../flights_avail.php">List Flights Available</a></div>
<div class="hme1"><a href="cacl_tck.php">Cancel Ticket</a></div>
<div class="reglog">Welcome: <?php echo $user; ?> &nbsp; &nbsp;<a href="logout.php">Logout</a></div>
</div>

<div class="search_bar"><center><h1>Enter the Search</h1></center>
<div class="search_box"><form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" autocomplete="off"><input type="text" placeholder="Enter the Refence number or username to cancel Ticket" name="search" /></form>Note: Search with The Reference Number or with the username<sup>*</sup> to cancel the Ticket.</div>
</div>
<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{

if(isset($_POST['search']))
{
	$search = $_POST['search'];
	$query = mysqli_query($link,"select * from ticket where name='$search' OR ref_no='$search'") or die("Query Error base");
	$row = mysqli_fetch_array($query);
	$ref = $row['flight_id'];
	$ticket_id = $row['id'];
	//echo $ticket_id;
	$pass = $row['pass'];
	$query1 = mysqli_query($link,"select * from flight_details where id='$ref'") or die("Query1 Error");
	$row1 = mysqli_fetch_array($query1);
	$avail = $row1['seatavil'];
	$ticket = $pass + $avail;
	//echo $ticket;
	$query3 = mysqli_query($link,"update flight_details set seatavil='$ticket' where id='$ref'") or die("Query 3 Error");
	$query4 = mysqli_query($link,"delete from ticket where id='$ticket_id'") or die("Query4 Error");
		Print '<script>alert("Successfully Ticket was Cancelled Reference id or username :'.$search.'\n Thank you :)");</script>';
		Print '<script>window.location.assign("home.php");</script>';
}


}


?>




</body>
</html>