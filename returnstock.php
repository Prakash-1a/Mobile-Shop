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
	extract($_POST);
require("connection1.php");

$stm="select * from stock where Modelname='$usn'";
$usrdata=$con->query($stm);

if(mysqli_num_rows($usrdata)>0)
{
$stm="update stock set Quantity= Quantity-'$Qty' where Modelname='$usn'";
	$abc=$con->query($stm);

if(mysqli_affected_rows($con)>0)
{
	echo '<script> alert(" Returned successfully.");</script>';
}
else
{
	echo '<script> alert("Operation failed.");</script>';
}

}
else
{
	echo '<script> alert("Stock does not exist.");</script>';
}


}


?>




<html>

<head>
  <style type="text/css">
      body{background:url(bb.jpg);
	   background-size:200% 200%;
	      background-repeat:no-repeat;
	   word-wrap:break-word;
	  }
        
     table.black{background:url(02.jpg);
                 padding-left:4cm;
                 padding-right:4cm;
								
								margin-left:500px;
								border-radius:15px;
				 }
				 
	 input[type=submit]   
{
	
	background-color:green;
	color:white;
	padding:14px 20px;
	margin:10px 0;
	margin-left:0px;
	border:none;
	cursor:pointer;
	width:80px;

}
select
	{
		width:160px;
		height:25px;
	}
	
           
    
     
  </style>
   <link rel="stylesheet" type="text/css" href="deleteuser.css"/>
   <link rel="stylesheet" type="text/css" href="menu.css"/>
</head>

<body style="background-image: url(bb.jpg);">
<font color="black" />
	
<font size="6" color="white" />
    <div class=bg>
<img src="img.jpg" height=140 width=100%></div> 
	
 
<?php include("menu.html"); ?>

<br>
<h2 style="background-color: silver; text-align: center; font-size:30px;">Return Stock </h2>
<br>
<form name="form1" method="POST" action="#">
<table align='right' class="black" width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td colspan="3"><strong><font  size=6 color="white">Return Stock</font></strong></td>
</tr>
<tr>
<td width="78"><font color="white" size=5>ModelName</font></td>
<td width="6"><font color="white">:</font></td>
<td width="294"><select name="usn" type="text" id="usn" required>
<?php

require("connection1.php");
$stm="select * from product";
$data=$con->query($stm);
while($row=mysqli_fetch_row($data))
{
	echo '<option value="'.$row[1].'">'.$row[1].'</option>';
}

?>
</td>
</tr>
<tr>
<td width="78"><font color="white" size=5>Quantity</font></td>
<td width="6"><font color="white">:</font></td>
<td width="294"><input name="Qty" type="text" id="usn" required></td>
</tr>
<tr>
<td align='right'><input align='right' type="submit" name="sbt" value="Return"></td>
</tr>
</table>
</form>
</form>


</body>
</html>
