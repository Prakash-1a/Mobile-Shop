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
<h2 style="background-color: silver; text-align: center; font-size:30px;">Sales</h2>
<br>
<form name="form1" method="POST" action="#">
<table align='right' class="black" width="400" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
<tr>

<td><font color="white" size=5 >Select Model</font></td>
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
<td align='right'><input align='right' type="submit" name="sbt" value="Proceed"></td>
</tr>
</table>
</form>
</form>

<?php
if(isset($_POST['sbt']))
{
require("connection1.php");
$usr=@$_POST['mname'];

$stm="select * from product where Mname='$usr'";
$usrdata=$con->query($stm);
if(mysqli_num_rows($usrdata)>0)
{
	$usrdata=mysqli_fetch_array($usrdata);
echo '
<form method="POST" action="bill.php">
    	<div>
    	<table class="t1" border="0" cellpadding="4" cellspacing="0">
        
            <tr>
            	<td><p1>Customer Name:<p1> </td>
            	<td>
                	<input type="text" name="cname"  id="textbox" value="" required/>
                </td>
            </tr>
             <tr>
			 
            	<td><p1>Address:<p1> </td>
            	<td>
                	<input type="text" name="add" id="textbox" value="" required />
                </td>
            </tr>
           
			
            <tr>
            	<td><p2>Mobile No:<p2></td>
            	<td>
                	<input type="text" name="mob" id="textbox" value="" required/>
                </td>
            </tr>
            
            <tr>
            	<td><p3>Model Name:<p3></td>
            	<td>
                	<input type="text" name="mname" id="textbox" value="'.$usrdata[1].'"  readonly/>
                </td>
            </tr>
            
            <td><p4>Cost Price:</p4></td>
            	<td>
                	<input type="number" name="cprice" id="textbox" value="'.$usrdata[3].'" readonly/>
                </td>
            </tr>
			
			<td><p4>Selling Price:</p4></td>
            	<td>
                	<input type="number" name="sprice" id="textbox" value="'.$usrdata[4].'" readonly/>
                </td>
            </tr>
			
			<td><p4>Discount(%):</p4></td>
            	<td>
                	<input type="number" name="dis" id="textbox" value="" />
                </td>
            </tr>
			
			<td><p4>IMEI No:</p4></td>
            	<td>
                	<input type="number" name="imei" id="textbox" value="" required/>
                </td>
            </tr>
			
			<td><p4>Charger No:</p4></td>
            	<td>
                	<input type="number" name="charge" id="textbox" value="" required/>
                </td>
            </tr>
			
			<td><p4>Date:</p4></td>
            	<td>
                	<input type="date" name="date" id="textbox" value="" required/>
                </td>
            </tr>
						            
            <tr>
                <td colspan="2">
                	
                	<input type="submit" name="bill" style="width:140px" value="Generate Bill" id="button-in"  />
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
