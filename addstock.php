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
	$stmt="select * from stock where Modelname='$mname'";
	$data=$con->query($stmt);
if(mysqli_num_rows($data)>0)
{
	$stm="update stock set Quantity= Quantity+'$Qty' where Modelname='$mname'";
	$abc=$con->query($stm);
	if(mysqli_affected_rows($con)>0)
{
    echo '<script>alert("Stock updated Successfully.");</script>';
}
else
{
    echo '<script>alert("Operation Failed.");</script>';
    echo mysqli_error($con);
}
	}
	else 
	{
	$stmt="insert into stock(Modelname,Quantity)values('$mname','$Qty')";
	$data=$con->query($stmt);
	if($data)
	{
		  echo '<script>alert("Stock added Successfully.");</script>';
		 }
	else{
		  echo '<script>alert("Stock insertion failed.");</script>';
	}
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
                 padding-left:0cm;
                 padding-right:0cm;
				 				
								margin-left:450px;
								border-radius:15px;
								
				 }
				 table.t1{
					 margin-bottom:200px;
					 position:absolute;
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
           
    
     
  </style>
   <link rel="stylesheet" type="text/css" href="adduser.css"/>
   <link rel="stylesheet" type="text/css" href="menu.css"/>
</head>

<body style="background-image: url(bb.jpg);">
<font color="black" />
	
<font size="6" color="white" />
    <div class=bg>
<img src="img.jpg" height=140 width=100%></div> 
	
 
<?php include("menu.html"); ?>

<br>
<h2 style="background-color: silver; text-align: center; font-size:30px;"> Add Stock </h2>
<br>
<form name="form1" method="POST" action="#">
<table align='right' class="black" width="400" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
<tr>

<td><font color="white" size=5 >Model Name</font></td>
<td><font color="white">:</font></td>
<td><select name="mname" type="text" id="usn" required>
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

<td width="78"><font color="white" size=5 >Quantity</font></td>
<td width="6"><font color="white">:</font></td>
<td width="294"><input name="Qty" type="text" id="usn" required>
									</td>
</tr>


<tr>	
<td align='right'><input align='right' type="submit" name="sbt" value="Proceed"></td>
</tr>
</table>
</form>
</form>


</body>
</html>