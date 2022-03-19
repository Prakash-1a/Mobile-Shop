<?php
session_start();
if(!isset($_SESSION['user']))
{
echo '<script> alert("Please Login First");   </script>';
echo '<script>window.location.href="index.php"; </script>';
}

?>

<?php
if(isset($_POST['sbt']))
{

echo '<center>
<table  border="5" cellspacing=3  cellpadding=4>
<tr>
<th>SNo.</th>
<th>Bill No</th>
<th>Model Name</th>
<th>Selling Price</th>
<th>Cost Price</th>
<th>Profit</th>

</tr>';

require("connection1.php");
$stm="select * from sales order by Date desc";
$data=$con->query($stm);
$sdat=@$_POST['sdate'];
$edat=@$_POST['edate'];
$total=0;
$stm="select * from  sales where Date >= '$sdat' and date <='$edat' ";
$data=$con->query($stm);
if(mysqli_num_rows($data)>0)
{
	$i=1;
while($row=mysqli_fetch_array($data))
{
	$stmt="select Cprice from product where Mname='$row[4]'";
$abc=$con->query($stmt);
while($skt=mysqli_fetch_array($abc))
{
	$a="$skt[0]";
	$profit="$a"-"$row[8]";
	$total="$total"+"$profit";
{	
	echo '
	<tr>
	<td> '.$i.'   </td>
	<td> '.$row[0].' </td>
	<td> '.$row[4].' </td>
	<td> '.$row[8].' </td>
	<td>  '.$a.'	</td>
	<td> '.$profit.'	</td>
	';
	$i++;
	
}
}}}
else
{
	echo '<script> alert("Product not Available");</script>';
}

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
 <h2 style="background-color: silver; text-align: center; font-size:30px;">Report </h2>

 <center><font size=+2 >Start date:&nbsp<input type="date" name="startdate" value="<?php echo $sdat;?>"><br>
					End date:&nbsp<input type="date" name="enddate" value="<?php echo $edat;?>"><br>
<font size=+2 >Total Profit:<input type="number"  style="margin-right:150px; margin-top:20px; width:60px;" name="totalprofit"  value="<?php echo $total;?>" readonly><br>

</body>
</html>