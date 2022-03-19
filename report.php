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
<h2 style="background-color: silver; text-align: center; font-size:30px;"> Report </h2>
<br>
<form name="form1" method="POST" action="rep.php">
<table align='right' class="black" width="400" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
<tr>

<td><font color="white" size=5 >Start Date</font></td>
<td><font color="white">:</font></td>
<td><input name="sdate" type="date" id="usn" required>


</td>
</tr>

<tr>

<td width="78"><font color="white" size=5 >End Date</font></td>
<td width="6"><font color="white">:</font></td>
<td width="294"><input name="edate" type="date" id="usn" required>
									</td>
</tr>


<tr>	
<td align='right'><input align='right' type="submit" name="sbt" value="Generate Report" style="width:150px;"></td>
</tr>
</table>
</form>
</form>


</body>
</html>