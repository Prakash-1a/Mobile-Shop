<?php
require("connection1.php");
extract($_GET);
$gst=18;


$stm="select * from sales where Billno='$Billno'";
$usrdata=$con->query($stm);
if(mysqli_num_rows($usrdata)>0)
{
	$usrdata=mysqli_fetch_array($usrdata);
$h="$usrdata[8]";
$cgstam=($h*18)/100;
$sgstam=($h*18)/100;
$netbill=$h+$sgstam;

	
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
                	<input type="text" name="cname" style="width:400px; height:30px;" id="textbox" value="'.$usrdata[1].'" readonly/>
                </td>
            </tr>
             <tr>
			 
            	<td bgcolor="lightyellow"><p1>Address:<p1> </td>
            	<td bgcolor="lightyellow">
                	<input type="text" name="add" id="textbox" style="width:400px; height:30px;" value="'.$usrdata[2].'" readonly />
                </td>
            </tr>
           
			
            <tr>
            	<td bgcolor="lightyellow"><p2>Mobile No:<p2></td>
            	<td bgcolor="lightyellow">
                	<input type="text" name="mob" id="textbox" style="width:400px; height:30px;" value="'.$usrdata[3].'" readonly/>
                </td>
            </tr>
				
				 <td bgcolor="lightyellow"><p4>Bill No:</p4></td>
            	<td bgcolor="lightyellow">
                	<input type="number" name="bill" id="textbox" style="width:250px; height:30px;"  value="'.$usrdata[0].'" readonly/>
					<p4>Date:&nbsp</p4><input type="date" name="date" value="'.$usrdata[7].'" readonly/>
                </td>
            </tr>
			
            <tr>
            	<td bgcolor="lightyellow"><p3>Model Name:<p3></td>
            	<td bgcolor="lightyellow">
                	<input type="text" name="mname" id="textbox" style="width:250px; height:30px;" 	 value="'.$usrdata[4].'"  readonly/>
                </td>
            </tr>
			
			<td bgcolor="lightyellow"><p4>IMEI No:</p4></td>
            	<td bgcolor="lightyellow">
                	<input type="number" name="imei" id="textbox" style="width:250px; height:30px;"  value="'.$usrdata[5].'" readonly/>
                </td>
            </tr>
				
			<td bgcolor="lightyellow"><p4>Charger No:</p4></td>
            	<td bgcolor="lightyellow">
                	<input type="number" name="charge" id="textbox" style="width:250px; height:30px;"  value="'.$usrdata[6].'" readonly/>
                </td>
            </tr>
			
			<td bgcolor="lightyellow"><p4>Amount:</p4></td>
            	<td bgcolor="lightyellow">
                	<input type="number" name="sprice" id="textbox" style="width:250px; height:30px;"  value="'.$usrdata[8].'" readonly/>
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
<hr size=5>
   </div>
    </form>

';
}

else
{
	echo '<script> alert("Product does not exist.");</script>';
}

?>
