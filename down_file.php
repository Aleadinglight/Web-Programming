<?php
	//Here we specify the directory path from which files will be read
	$dir="uploads";
	//Here we read the file name specified by the user
	$file_name=$_POST["down_file"]; 
	//Here we make the absolute path of the file
	$filePathName= $dir . "/" . $file_name;
	//Here we check whether the file can be read 
	if(is_readable($filePathName)) {
		header("Content-Description: File Transfer");
		header("Content-Type: application/force-download");
		header("Content-Disposition: attachment; filename=".$file_name);
		header("Content-Encoding: binary");
		header("Transfer-Encoding: binary");
		header("Content-Length: " . filesize($filePathName)) ;
		readfile($filePathName);
	} 
	else {
		echo "<p>There was a problem with reading " . htmlentities($file_name) . " file! </p>";
		if(file_exists($filePathName)) 
			echo "File size: " . filesize($filePathName) . "<br/>";
	}
	
?>
