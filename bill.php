<?php
session_start();
if(!isset($_SESSION['user']))
{
echo '<script> alert("Please Login First");   </script>';
echo '<script>window.location.href="index.php"; </script>';
}

?>

<html>
<body background="bg.jpg">
<?php
if(isset($_POST['bill']))
{
	extract($_POST);
require("connection1.php");


				
$gst=18;
$a=@$_POST['cname'];
$b=@$_POST['add'];
$c=@$_POST['mob'];
$d=@$_POST['mname'];
$e=@$_POST['imei'];
$f=@$_POST['charge'];
$g=@$_POST['date'];
$h=@$_POST['sprice'];

$cgstam=($h*18)/100;
$sgstam=($h*18)/100;
$netbill=$h+$sgstam;

$randomNumber=rand(100000,999999);
$abc="select * from stock where Modelname='$d'";
$smt=$con->query($abc);

while($row=mysqli_fetch_array($smt))
if($row[1]>0)
{
$stmt="insert into sales(BillNo,CustomerName,Address,Mobile,ModelName,Imei,Chargerno,Date,Sellingprice)values('$randomNumber','$cname','$add','$mob','$mname','$imei','$charge','$date','$sprice')";
$temp=$con->query($stmt);
if($temp)
{
	$stm="update stock set Quantity= Quantity-'1' where Modelname='$d'";
	$abc=$con->query($stm);

}
}
	else
	{
		  echo '<script>alert("Stock not available");</script>';
		  echo '<script> window.location.href="sales.php";   </script>';
	}

$stm="select * from sales";
$usrdata=$con->query($stm);
if(mysqli_num_rows($usrdata)>0)
{
	$usrdata=mysqli_fetch_array($usrdata);
echo '
<form method="POST" action="#">	
    	<div>
		<center>
    	<table class="t1" border="1" width=50% height=80% cellpadding="4" cellspacing="0">
        
            <tr>
            	<td colspan="2" bgcolor="black">
					<center><font face="Bodoni MT Black"><font color="orange" size="+3">ABC Mobile Shop </font><center>
                </td>
            </tr>
             <tr>
			 
            	<td colspan="2" bgcolor="gray">
            	   	<center><font face="Bodoni MT Black"><font color="yellow" size="+3">	Municipal Chowk,Chapra </font><center>
                </td>
            </tr>
           
		             

			
            <tr>
            	<td bgcolor="lightyellow"><p>Customer Name:</p> </td>
            	<td bgcolor="lightyellow">
                	<input type="text" name="cname" style="width:400px; height:30px;" id="textbox" value="'.$a.'" readonly/>
                </td>
            </tr>
             <tr>
			 
            	<td bgcolor="lightyellow"><p1>Address:<p1> </td>
            	<td bgcolor="lightyellow">
                	<input type="text" name="add" id="textbox" style="width:400px; height:30px;" value="'.$b.'" readonly />
                </td>
            </tr>
           
			
            <tr>
            	<td bgcolor="lightyellow"><p2>Mobile No:<p2></td>
            	<td bgcolor="lightyellow">
                	<input type="text" name="mob" id="textbox" style="width:400px; height:30px;" value="'.$c.'" readonly/>
                </td>
            </tr>
				
				 <td bgcolor="lightyellow"><p4>Bill No:</p4></td>
            	<td bgcolor="lightyellow">
                	<input type="number" name="bill" id="textbox" style="width:250px; height:30px;"  value="'.$randomNumber.'" readonly/>
					<p4>Date:&nbsp</p4><input type="date" name="date" value="'.$g.'" readonly/>
                </td>
            </tr>
			
            <tr>
            	<td bgcolor="lightyellow"><p3>Model Name:<p3></td>
            	<td bgcolor="lightyellow">
                	<input type="text" name="mname" id="textbox" style="width:250px; height:30px;" 	 value="'.$d.'"  readonly/>
                </td>
            </tr>
			
			<td bgcolor="lightyellow"><p4>IMEI No:</p4></td>
            	<td bgcolor="lightyellow">
                	<input type="number" name="imei" id="textbox" style="width:250px; height:30px;"  value="'.$e.'" readonly/>
                </td>
            </tr>
				
			<td bgcolor="lightyellow"><p4>Charger No:</p4></td>
            	<td bgcolor="lightyellow">
                	<input type="number" name="charge" id="textbox" style="width:250px; height:30px;"  value="'.$f.'" readonly/>
                </td>
            </tr>
			
			<td bgcolor="lightyellow"><p4>Amount:</p4></td>
            	<td bgcolor="lightyellow">
                	<input type="number" name="sprice" id="textbox" style="width:250px; height:30px;"  value="'.$h.'" readonly/>
                </td>
            </tr>
			
				<td rowspan="4" bgcolor="lightyellow">
            	<td bgcolor="lightyellow">
                	<center>CGST(%):&nbsp<input type="number" name="cgst" id="textbox" style="width:100px; height:30px; "  value="'.$gst.'" readonly/>
                </td>
            </tr>
			
			<td bgcolor="lightyellow">
            	
               <center>SGST(%):&nbsp<input type="number" name="sgst" id="textbox" style="width:100px; height:30px;"  value="'.$gst.'" readonly/>
				
          </td>
		  <tr>
		  <td bgcolor="lightyellow">
            	
               <center>CGST Amount:&nbsp<input type="number" name="sgstamt" id="textbox" style="width:100px; height:30px;"  value="'.$cgstam.'" readonly/>
				
          </td>
		  </tr>
		  <tr>
		  <td bgcolor="lightyellow">
            	
               <center>SGST Amount:&nbsp<input type="number" name="cgstamt" id="textbox" style="width:100px; height:30px;"  value="'.$sgstam.'" readonly/>
				
          </td>
            
								            
            <tr>
                <td colspan="3" bgcolor="lightyellow">
                	<input type="number" name="tbill" style="width:70px; float:right;" value="'.$netbill.'" id="button-in"  />
                	<input type="submit" name="total" style="width:90px; float:right;" value="Net Payable:-" id="button-in"  />
							
                </td>
            </tr>
			<hr size=5>
        </table>

   </div>
    </form>

';
}
}
else
{
	echo '<script> alert("Product does not exist.");</script>';
}

?>
<center><button type="button"><a href="usermenu.php">
<font size=4 face="forte" color=purple>Back to Home Page</font></a></button>
</body>
</html>
