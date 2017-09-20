<?php
require('php/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Flights Today In service</title>
<link href="css/ind_css.css" rel="stylesheet" type="text/css" />
<link href="css/reghtm_css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="navigation">
<div class="hme"><a href="index.php">Home</a></div>
<div class="hme1"><a href="flights_avail.php">List Flights Available</a></div>
<div class="reglog"><a href="loginreg_htm.php">Login/Register</a></div>
</div>

<div class="log_main">
<table width="500px" border="0" cellpadding="10" cellspacing="10">
<form method="post" action="php/logcheck.php"  autocomplete="off">
<tr><td align="center" colspan="2">login</td></tr>
<tr>
<td align="center">User Name:<sup>*</sup></td>
<td align="center"><input type="text" name="username" placeholder="Enter username.."  /></td>
</tr>
<tr>
<td align="center">Password :<sup>*</sup></td>
<td align="center"><input type="password" name="password" placeholder="Enter Password.." /></td>
</tr>
<tr>
<td align="center"><input type="submit" value="Login" /></td>
<td align="center"><input type="reset" value="Reset" /></td>
</tr>
</form>
<tr>
<td align="center" colspan="2"><a href="reghtm.php"><input type="button" value="Not an User? Register Here..." /></a></td>
</tr>

</table>

</div>

</body>
</html>