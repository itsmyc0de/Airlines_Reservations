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
<link href="../css/book.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="navigation">
<div class="hme"><a href="../index.php">Home</a></div>
<div class="hme1"><a href="../flights_avail.php">List Flights Available</a></div>
<div class="reglog">Welcome: <?php echo $user; ?> &nbsp; &nbsp;<a href="logout.php">Logout</a></div>
</div>

<?php
$id = $_GET['id'];
$query = mysqli_query($link,"select * from flight_details where id='$id'") or die(mysqli_error($link));
$row = mysqli_fetch_array($query);
//echo $row['fto'];
?>
<div class="log_main">
<form method="post" action="book_process.php">
<table width="500px" border="0" cellpadding="10" cellspacing="10">
<tr><input type="hidden" value="<?php echo $id ?>" readonly="readonly"  name="id"/>
<td width="215">Name:<input type="text" value="<?php echo $user ?>" name="name" /></td>
<td width="215">Flight Name:<input type="text" value="<?php echo $row['flightname'] ?>" readonly="readonly"  name="flightname"/></td>
</tr>
<tr>
<td>From:<input type="text" value="<?php echo $row['frm'] ?>" readonly="readonly" name="frm"/></td>
<td>To:<input type="text" value="<?php echo $row['fto'] ?>" readonly="readonly"  name="fto"/></td>
</tr>
<tr>
<td align="center">Flight Charge Including Tax/person:<input type="text" value="<?php echo $row['amount'] ?>" readonly="readonly" name="amount" /></td>
<td>Ticket Available :<input type="text" value="<?php echo $row['seatavil'] ?>" readonly="readonly"  name="avail"/></td>
</tr>
<tr>
<td colspan="2" align="center">Number Of Passengers:<input type="text" name="pass" name="pass"/></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="Book" /></td>
</tr>

</table>
</form>
</div>
</body>
</html>