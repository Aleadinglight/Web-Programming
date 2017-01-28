<!DOCTYPE html>
<!-- This is the starting form for example 9 -->
<html>

<head>
	<title></title>
</head>


<body background="http://cdn.paper4pc.com/images/fantasy-art-winter-wallpaper-1.jpg">
	
<?php
	ob_start();
	session_start();			
	session_unset(); 
	session_destroy(); 
	header("Location: login.php");
?>


</body> 

</html>