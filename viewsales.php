<?php
session_start();
if(!isset($_SESSION['user']))
{
echo '<script> alert("Please Login First");   </script>';
echo '<script>window.location.href="index.php"; </script>';
}

?>

<html>
<head>
 <link rel="stylesheet" type="text/css" href="admin.css"/>
 <link rel="stylesheet" type="text/css" href="menu.css"/>
</head>
<body style="background-image: url(bb.jpg);">
<div id =image>
<img src="img.jpg" height=150 width=100%></div>
<?php include("menu.html");
 ?>


 <br><br>
 <h2 style="background-color: silver; text-align: center; font-size:30px;"> View Sales </h2>

 <center>
<table  border="5" cellspacing=3  cellpadding=4>
<tr>
<th>Bill No</th>
<th>Customer Name</th>
<th>Address</th>
<th>Mobile no</th>
<th>Model Name</th>
<th>IMEI No</th>
<th>Charger No</th>
<th>Selling Price</th>
<th>Date</th>
</tr>
<?php
require("connection1.php");
$stm="select * from sales order by Date desc";
$data=$con->query($stm);

while($row=mysqli_fetch_array($data))
{
	echo '
	<tr>
	<td> <a href="invoice.php?Billno='.$row[0].'">'.$row[0].'</a></td>
	<td> '.$row[1].' </td>
	<td> '.$row[2].' </td>
	<td> '.$row[3].' </td>
	<td> '.$row[4].' </td>
	<td> '.$row[5].' </td>
	<td> '.$row[6].' </td>
	<td> '.$row[8].' </td>
	<td> '.$row[7].' </td>
	

	';
}

?>
</table></center>
</body>
</html>