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

<title>Untitled Document</title>
  <link rel="stylesheet" type="text/css" href="menu.css"/>
<link rel="stylesheet" type="text/css" href="adduser.css"/>
</head>
<body style="background-image: url(bb.jpg);">
	<div id="top_style">
	<div id="image">
	<img src="img.jpg" height=150 width=100%></div>
	



 
<?php include("menu.html"); ?>

<br>       
<br>
<h1 style="background-color: silver; text-align: center; font-size:30px;"> Welcome to User Menu </h1>

</div>
</body>
</html>
