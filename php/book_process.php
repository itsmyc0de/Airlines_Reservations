<?php
require('config.php');
$id = $_POST['id'];
$name = $_POST['name'];
$flightname = $_POST['flightname'];
$frm = $_POST['frm'];
$fto = $_POST['fto'];
$amount = $_POST['amount'];
$avail = $_POST['avail'];
$pass = $_POST['pass'];
$ref_no = rand(11,55555);

$total = $amount * $pass;
$balticket = $avail - $pass;
//echo $ref_no + 1;
//echo $amount;

$query = mysqli_query($link,"INSERT INTO `airlines`.`ticket` (`name`, `flightname`, `frm`, `fto`, `amount`, `avail`, `pass`, `ref_no`, `total`,`flight_id`) VALUES ('$name', '$flightname', '$frm', '$fto', '$amount', '$avail', '$pass', '$ref_no', '$total', '$id')") or die(mysqli_error($link));
//echo "Values inserted";
$query = mysqli_query($link,"update flight_details set seatavil='$balticket' where id='$id'");
//echo "Updated";
?>

<html>
<head><title>Print Ticket</title>
<script>
alert('Note: Please note the reference Number in the Bill.\n For further processing regards incase lost  the reference number cannot cancel the ticket');
</script>

<link href="../css/metro.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="note()">
<div al align="center">
<table width="582" height="496" border="1" cellpadding="5" cellspacing="5">
<tr>
<td colspan="2" align="center">Flight Ticket</td>
</tr>
<tr>
<td width="248">Name: <?php echo $name?></td>
<td width="211">Flight Name: <?php echo $flightname?></td>
</tr>
<tr>
<td>Journey From: <?php echo $frm?></td>
<td>Journey To: <?php echo $fto?></td>
</tr>
<tr>
<td>Amount : <?php echo $amount?></td>
<td>Passengers : <?php echo $pass?></td>
</tr>
<tr>
<td>Reference Number : <?php echo $ref_no?></td>
<td>Grant Total: <?php echo $total?></td>
</tr>
<tr>
<td align="center" valign="middle"><input type="submit" value="Print"  onClick="window.print();"/></td>
<td align="center" valign="middle"><a href="home.php"><input type="submit" value="Go Back" /></a></td>
</tr>
</table>
</div>
</body>

</html>