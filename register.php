<!DOCTYPE html>
<html> 
<head>
	<title>Register confirm</title>
</head>
	
<body background="http://eskipaper.com/images/sky-wallpaper-35.jpg">
	<?php
		function handle_post() 
		{
			if (empty($_POST["username"]) || empty($_POST["name"]) || empty($_POST["Lname"]) || empty($_POST["password"]) || empty($_POST["Phone"]))
			{
				echo "Please fill all missing information.<br><br>";
				echo "<a href='register.html'>Register again.</a>";
				return;
			}
			$dir="user/";			
			$username=$_POST["username"]."/";
			$link_user=$dir.$username;
			$phonenumber=$link_user."Pnumber";
			$lastname=$link_user."lastname";
			if (!file_exists($dir)) 
			{
				mkdir($dir);
				chmod($dir, 0711);
			}
			
			$time=microtime();
			$timeArray = explode(" ", $time);
			$timeStamp = (float) $timeArray[1] + (float) $timeArray[0];
			if(isset($_POST["register_data"])) {
				
				//ktra trung ten
				if (!file_exists($link_user))
				{
					mkdir($link_user);
					chmod($link_user, 0711);
					//luu du lieu
					$password=$link_user."password";
					$r_name = $link_user."name";
					if((file_put_contents($password, $_POST["password"]) >0) && (file_put_contents($r_name, $_POST["name"]) >0) && (file_put_contents($lastname, $_POST["Lname"]) >0) && (file_put_contents($phonenumber, $_POST["Phone"]) >0))
						echo "<br> <br> Registered successfully. <br> Login and share your thought to the world.<br>";						
					else
						echo "Ooop!! Something wrong happen, please register again.";
				
					echo "<hr><br>";
					echo "<br><a href='login.php'>Login </a>";
				}
				else
				{
					echo "<br><br>Username already exist!<br><br>";
					echo "<a href='register.html'>Register again</a>";
				}
				
			}
			unset($_POST["register_data"]);
		}
		handle_post();
		?>
	</body>
</html>