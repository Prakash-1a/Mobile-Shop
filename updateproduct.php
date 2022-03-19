<?php
session_start();
if(!isset($_SESSION['user']))
{
echo '<script> alert("Please Login First");   </script>';
echo '<script>window.location.href="index.php"; </script>';
}

?>

<?php
if(isset($_POST['upt']))
{

extract($_POST);
require("connection1.php");

$stmt="update product set Brand='$brand',Mname='$mname',Myear='$year',Cprice='$cprice',Sprice='$sprice' where Mname='$mname'";
$temp=$con->query($stmt);

if(mysqli_affected_rows($con)>0)
{
    echo '<script>alert(" Product Updated successfully");</script>';
}
else
{
    echo '<script>alert(" Product Updation failed.");</script>';
    echo mysqli_error($con);
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
select{
	width:160px;
	height:22px;
}
input[type=date]
{
	width:160px;
	height:22px;
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
<h2 style="background-color: silver; text-align: center; font-size:30px;"> Update Product </h2>
<br>
<form name="form1" method="POST" action="#">
<table align='right' class="black" width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td colspan="3"><strong><font  size=6 color="white">Update Product</font></strong></td>
</tr>
<tr>
<td width="78"><font color="white" size=5>ModelName</font></td>
<td width="6"><font color="white">:</font></td>
<td width="294"><input name="usn" type="text" id="usn" required></td>
</tr>
<tr>
<td align='right'><input align='right' type="submit" name="sbt" value="Update"></td>
</tr>
</table>
</form>
</form>
<?php
if(isset($_POST['sbt']))
{
require("connection1.php");
$usr=@$_POST['usn'];

$stm="select * from product where Mname='$usr'";
$usrdata=$con->query($stm);
if(mysqli_num_rows($usrdata)>0)
{
	$usrdata=mysqli_fetch_array($usrdata);
echo '
<form method="POST" action="#">
    	<div>
    	<table class="t1" border="0" cellpadding="4" cellspacing="0">
        
            <tr>
            	<td><p>Brand:</p> </td>
            	<td>
                	<input type="text" name="brand" id="textbox" value="'.$usrdata[0].'" readonly />
                </td>
            </tr>
             <tr>
			 
            	<td><p1>Model Name:<p1> </td>
            	<td>
                	<input type="text" name="mname" id="textbox" value="'.$usrdata[1].'" readonly />
                </td>
            </tr>
           
			
            <tr>
            	<td><p2>Model Year:<p2></td>
            	<td>
                	<input type="number" name="year" id="textbox" value="'.$usrdata[2].'" readonly/>
                </td>
            </tr>
            
            <tr>
            	<td><p3>Cost Price:<p3></td>
            	<td>
                	<input type="number" name="cprice" id="textbox" value="'.$usrdata[3].'"  required/>
                </td>
            </tr>
            
            <td><p4>Selling Price:</p4></td>
            	<td>
                	<input type="number" name="sprice" id="textbox" value="'.$usrdata[4].'" required/>
                </td>
            </tr>
						            
            <tr>
                <td colspan="2">
                	
                	<input type="submit" name="upt" value="Update" id="button-in"  />
                </td>
            </tr>
        </table>

   </div>
    </form>

';

}
else
{
	echo '<script> alert("Product does not exist.");</script>';
}

}
?>









</body>
</html>
