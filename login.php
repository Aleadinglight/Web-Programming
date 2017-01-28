<!DOCTYPE html>
<!-- This is the starting form for example 9 -->
<html>

<head>
	<title>Sign In</title>
	<style>
	th, td {
		padding: 5px;
		text-align: left;
	}
	.fieldset-auto-width {
		width: 300px;
		border-style: inset;
		border-radius: 8px;
	}
	#block1{
		width:30%;
		margin:0 auto;
		vertical-align:middle;
		padding: 100px;
	}
	
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
         }
         
         h2{
            text-align: center;
         }
	</style>
</head>


<body background="http://cdn.paper4pc.com/images/fantasy-art-winter-wallpaper-1.jpg">
	
	<?php
		ob_start();
		session_start();
	?>
	
	<h2>Enter Username and Password</h2> 
		<div class = "container form-signin">         
			<?php
				function check() 
				{
					$dir="user/";
					$checkname=$dir."/".$_POST["username"];
					$checkpwd=$checkname."/"."password";
					$pwd=$_POST["password"];
					if (!file_exists($dir)) 
					{
						mkdir($dir);
						chmod($dir, 0711);
					}
					if (!file_exists($checkname))
						echo "Wrong username or password";
					else
					{
						$pwd = file_get_contents($checkpwd);
						if ($pwd==$_POST["password"]){
							echo "Login successful.";
							return true;
						}
						else
							echo "Wrong username or password.";
					}
					return false;
				}
				
				if (isset($_POST["register_data"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
					if (check()==true){
						$_SESSION["valid"] = true;
						$_SESSION["timeout"] = time();
						$_SESSION["username"] = $_POST["username"];
						header("Location: blog_data1.php");
					}
				}
			?>
		</div>

	<div id="block1">
	<form action="login.php" method="post">
		<fieldset class="fieldset-auto-width">
			<legend><strong>Sign In</strong></legend>
			<br>
			<label for="username"><strong>Username: </strong></label><br>
			<input type="text" name="username" id="username"/><br>
			
			<label for="password"><strong>Password: </strong></label><br> 
			<input type="password" name="password" id="password"/><br>
			<br>
			<input type="submit" value="Log In" name="register_data">
			<button onclick="location.href='register.html'" type="button">Register</button>
		</fieldset>
	</form>
	</div>
</body> 

</html>