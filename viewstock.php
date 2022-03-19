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
<?php include("menu.html"); ?>


 <br>
 <h2 style="background-color: silver; text-align: center; font-size:30px;"> View Stock </h2> <br>

 <center>
<table  border="5" cellspacing=3  cellpadding=4>
<tr>
<th>Model Name</th>
<th>Quantity</th>
</tr>
<?php
require("connection1.php");
$stm="select * from stock";
$data=$con->query($stm);

while($row=mysqli_fetch_array($data)){
	echo '
	<tr>
	<td> '.$row[0].' </td>
	<td> '.$row[1].' </td>
	';
}

?>
</table></center>
</body>
</html>