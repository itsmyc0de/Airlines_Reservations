<?php
require('php/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Flights Today In service</title>
<link href="css/ind_css.css" rel="stylesheet" type="text/css" />
<link href="css/fli_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="navigation">
<div class="hme"><a href="index.php">Home</a></div>
<div class="hme1"><a href="flights_avail.php">List Flights Available</a></div>
<div class="reglog"><a href="loginreg_htm.php">Login/Register</a></div>
</div>

<div class="service_main">
<h2>NUMBER OF FLIGHTS TODAY IN SERVICE</h2>
<BR />
<table width="100%" style="color:#F00; font-size:24px;" align="center">

<?PHP
$query  = mysqli_query($link,"select flightname from flight_details") or die("cant connect to db");
 while ($row=mysqli_fetch_array($query)) {
            $on=$row["flightname"];
               
          echo "<tr><td align=center>$on</td></tr>";
            }
?>
</table>
</div>


</body>
</html>