<html>
<body>
<?php
	date_default_timezone_set("Europe/Helsinki");
	$upload_dir="uploads/";
	if(!file_exists($upload_dir)) {
		mkdir($upload_dir, 0711);
		chmod($upload_dir, 0711);
	}

	for($counter=0; $counter<count($_FILES['upload_file']['name']); $counter++){
		if($_FILES["upload_file"]["error"][$counter]<>0 ) {
			switch($_FILES["upload_file"]["error"][$counter] ){
			case 1: 
				echo "The uploaded file exceeds the upload_max_filesize directive in php.ini.<br />";
				break;
			case 2:
				echo "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form." . "<br />";
				break;
			case 3:
				echo "The uploaded file was only partially uploaded. " . "<br />";
				break; 
			case 4:
				echo "No file was uploaded." . "<br />";
				break;
			case 6: 
				echo "Missing a temporary folder." . "<br />";
				break;
			case 7:
				echo "Failed to write file to disk." . "<br />";
				break;
			case 8:
				echo "Failed to write file to disk." . "<br />";
				break;
			}
			echo "<hr>";
			echo "<br><br><a href='upload_file.html'>Main Page</a><br/>";
			return;
		}
		else
		{
			echo "File name: " . $_FILES["upload_file"]["name"][$counter] . "<br />";
			echo "File type: " . $_FILES["upload_file"]["type"][$counter] . "<br />";
			echo "File size: " . ($_FILES["upload_file"]["size"][$counter]) . " byte(s). <br/>";
			echo "Temporary location: " . $_FILES["upload_file"]["tmp_name"][$counter] . "<br/>";
		}
		if (file_exists($upload_dir . $_FILES["upload_file"]["name"][$counter]))
		{
			echo "<hr>";
			echo "File " . $_FILES["upload_file"]["name"][$counter] . " already exists. <br/>";
		}
		else
		{
			move_uploaded_file($_FILES["upload_file"]["tmp_name"][$counter],
			$upload_dir . $_FILES["upload_file"]["name"][$counter]);
			chmod($upload_dir . $_FILES["upload_file"]["name"][$counter], 0644);
			echo "File was saved as: " . $upload_dir . $_FILES["upload_file"]["name"][$counter] . "<br/>";
			echo "<hr>";
		}	
	}

	echo "<br><br><a href='upload_file.html'>Main Page</a><br/>";

?> 
</body>
</html>