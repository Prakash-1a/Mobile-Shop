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
include("connection1.php");

$stmt="insert into product(Brand,Mname,Myear,Cprice,Sprice)values('$brand','$mname','$year','$cprice','$sprice')";
$temp=$con->query($stmt);

if($temp)
{
    echo '<script>alert(" Product added successfully");</script>';
}
else
{
    echo '<script>alert(" Product insertion failed.");</script>';
    echo mysqli_error($con);
}
 
}

?>
<html>
<head>

<title>Untitled Document</title>
  <link rel="stylesheet" type="text/css" href="adduser.css"/>
  <link rel="stylesheet" type="text/css" href="menu.css"/>
	
</head>

	<div id="top_style">
	<div id="image">
	<img src="img.jpg" height=150 width=100%></div>
	

<body style="background-image: url(bb.jpg);">

 
<?php include("menu.html"); ?>

<br>       


<h2 style="background-color: silver; text-align: center; font-size:30px;"> Add Product </h2>



<div id="style_informations">
	<form method="POST" action="#">
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        
            <tr>
            	<td><p>Choose Brand:</p> </td>
            	<td>
                	<select type="text" name="brand" id="textbox" required />
										<option value=samsung>Samsung</option>	
										<option value=Vivo>Vivo</option>	
										<option value=Oppo>Oppo</option>	
										<option value=Mi>Mi</option>	
										<option value=lenovo>Lenovo</option>	
										<option value=Apple>Apple</option>	
										<option value=Asus>Asus</option>	
                </td>
            </tr>
             <tr>
			 
            	<td><p1>Model Name:<p1> </td>
            	<td>
                	<input type="text" name="mname" id="textbox" required />
                </td>
            </tr>
           
			
            <tr>
            	<td><p2>Model Year:<p2></td>
            	<td>
                	<input type="number" name="year" id="textbox" required/>
                </td>
            </tr>
            
            <tr>
            	<td><p3>Cost Price:<p3></td>
            	<td>
                	<input type="number" name="cprice" id="textbox"  required/>
                </td>
            </tr>
            
            <td><p4>Selling Price:</p4></td>
            	<td>
                	<input type="number" name="sprice" id="textbox"  required/>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                	
                	<input type="submit" name="sbt" value="Add" id="button-in"  />
                </td>
            </tr>
        </table>

   </div>
    </form>




</body>
</html>