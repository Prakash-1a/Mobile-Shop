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
 <h2 style="background-color: silver; text-align: center; font-size:30px;"> View Product </h2>

 <center>
<table  border="5" cellspacing=3  cellpadding=4>
<tr>
<th>Brand</th>
<th>Model Name</th>
<th>Model Year</th>
<th>Cost Price</th>
<th>Selling Price</th>
</tr>
<?php
require("connection1.php");
$stm="select * from product";
$data=$con->query($stm);

while($row=mysqli_fetch_array($data))
{
	echo '
	<tr>
	<td> '.$row[0].' </td>
	<td> '.$row[1].' </td>
	<td> '.$row[2].' </td>
	<td> '.$row[3].' </td>
	<td> '.$row[4].' </td>

	';
}

?>
</table></center>
</body>
</html>