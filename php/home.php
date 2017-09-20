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
</head>
<body>
<div class="navigation">
<div class="hme"><a href="../index.php">Home</a></div>
<div class="hme1"><a href="../flights_avail.php">List Flights Available</a></div>
<div class="hme1"><a href="cacl_tck.php">Cancel Ticket</a></div>
<div class="reglog">Welcome: <?php echo $user; ?> &nbsp; &nbsp;<a href="logout.php">Logout</a></div>
</div>


<div class="formcnt">
<table width="100%" border="0" cellpadding="10" cellspacing="10" >
<tr>
  <td colspan="4" align="center">Search Availability</td></tr>
<tr>
<td align="center" valign="middle">From</td>
<td align="center" valign="middle">To</td>
<td align="center" valign="middle">Journey Date</td>

</tr>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">

<tr>
<td><select name="jf">

<option selected="selected">Journey From</option>
<?php
            $query = mysqli_query($link,"select * from flight_details") or die ("query error");
            while ($cdrow=mysqli_fetch_array($query)) {
            $cdTitle=$cdrow["frm"];
               
          echo "<option>$cdTitle</option>";
            }
        ?>        
            
</td>
<td><select name="jt"><option selected="selected">Journey To</option>
<?php
            $query = mysqli_query($link,"select * from flight_details") or die ("query error");
            while ($cdrow=mysqli_fetch_array($query)) {
            $cdTitle=$cdrow["fto"];
               
          echo "<option>$cdTitle</option>";
            }
        ?>   




</td>
<td><input type="date" name="jd"/></td>
<td rowspan="2" align="center" valign="top"><input type="submit" value="SEARCH" /></td>
</tr>
</form>
</table>
</div>
<div class="flightcnt">
<table width="100%" border="2" cellpadding="10" cellspacing="10" bgcolor="#FFFFFF" >

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	if(isset($_POST['jf']) && isset($_POST['jt']) && isset($_POST['jd']))
	{
	$jf = $_POST['jf'];
	$jt = $_POST['jt'];
	$jd = $_POST['jd'];

			$query=mysqli_query($link,"select * from flight_details where frm='$jf' AND fto='$jt' AND doc='$jd'") or die(mysqli_error($link)) ;
echo "<tr bgcolor='#anja'><td colspan=6 align=center>Flight Details</td></tr>";
echo "<tr>";
echo "<td>FLIGHT NAME</td><td>JOURNEY FROM</td><td>JOURNEY TO</td> <td>AMOUNT</td><td>SEATS AVAILABLE</td><td>Book</td>";
echo "</tr>";
	while($row = mysqli_fetch_array($query))
	{
		echo "<tr>";
		echo "<td align=center>".$row['flightname']."</td>";
		echo "<td align=center>".$row['frm']."</td>";
		echo "<td align=center>".$row['fto']."</td>";
		echo "<td align=center>".$row['amount']."</td>";
		echo "<td align=center>".$row['seatavil']."</td>";
		echo '<td align=center><a href="book.php?id='.$row['id'].'"><button>Book</button><a></td>';
		echo "</tr>";
	}

}
}
?>
<tr>
<td colspan="6"><marquee>You are loged in Dont forget to signout the session after booking</marquee></td>
</tr>
</table></div>



</body>
</html>