<!DOCTYPE html>
<!-- This is the starting form for example 9 -->
<html>
<head>
<title>User Blog</title>
<style>
	th, td {
		padding: 5px;
		text-align: left;
				font-size:18px;
		font-size:18px;

	}
	body { 
		background-image: url("https://newevolutiondesigns.com/images/freebies/anime-wallpaper-7.jpg");
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
	fieldset
	{
		padding:18px;	
		border-radius: 30px;
		border-color:black;
		border-width: 2px;
		border-left: 4.5px inset black;
		border-top: 3px inset black;
		border-bottom: 2.5px inset black;
		border-right: 2.1px inset black;
		font-size:18px;
		border-style: inset;
	}
	textarea {
		width: 1400px;
		height: 100px;
		border-radius: 10px;
	}
	hr{
		background-color:#f3f6db;
		color:black;
		border-color:black;
	}
</style>
</head>

<body>
<?php
	session_start();
?>


<?php

		function handle_post() 
		{
			$dir="blog/";
			$filePrefix="comment";
			if (!file_exists($dir)) 
			{
				mkdir($dir);
				chmod($dir, 0711);
			}
			$time=microtime();
			$timeArray = explode(" ", $time);
			$timeStamp = (float) $timeArray[1] + (float) $timeArray[0];
			
			
			if(isset($_POST["submit_comment_data"])) {
				$newEntry = "<fieldset><strong>".$_POST["name"] . " </strong>say: <br><hr><br>" . $_POST["comment"] ."<br><br>"."<i>at ".date("H:i:s, d/m/Y", time())."</i><br><br></fieldset><br>";
				$file=$dir . $filePrefix . $timeStamp;
				if(file_put_contents($file, $newEntry) >0)
					echo "";
				else
					echo "Data could not be written to " . htmlentities($file) . "<br/>";
			}
			
			$files=scandir($dir);
			foreach($files as $f) {
				if(substr($f, 0, strlen($filePrefix)) == $filePrefix)
					echo file_get_contents($dir . $f);
			}
			
		} 
		handle_post();
		unset($_POST["submit_comment_data"]);
		echo "<br><br><br>";
?>


	<h1>Comment</h1>
	<table border=0>
	<form action="blog_data1.php" method="post" enctype="multipart/form-data"> 
		<input type="hidden" name="name" value="<?php if (isset($_SESSION["username"])) echo $_SESSION["username"]; ?>" >
		<input type="hidden" name="MAX_FILE_SIZE" value="5004000"/> 
		<tr>
		<th></th><td><textarea name="comment" ></textarea></td> <td></td>
		</tr>
		
		<tr>
		<td></td>
		<td><input type="submit" name="submit_comment_data" value="Send your comment" /></td>
		<td></td>
		</tr>
	</form>	
	</table>
	<br><br>
	<table>
		<form action="search.php" method="post">
		<tr><th>Enter the search query</th></tr><br>
		<tr><td><input type="text" name="search_q" id="search"></td>
		<td><input type="submit" name="search" value="search"><td></tr>
		</form>
	</table>
	
	<br><br><br>
	<form action="logout.php" method="post">
		<input type="submit" name="out" value="logout">
	</form>
</body> 
</html>

