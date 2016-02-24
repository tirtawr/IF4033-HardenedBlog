<?php
session_start();
$user = $_SESSION["user"];
$host = "localhost";
$username = "root";
$password = "";
$database = "simple_blog";
$con = mysql_connect($host,$username,$password);

if (!$con){
	echo "db connection error";
	throw new Exception("Database connection error");
} else {
	mysql_select_db($database,$con);
}



if(isset($_POST)){

	$judul = $_POST['Judul'];
	$tanggal = $_POST['Tanggal'];
	$konten = $_POST['Konten'];



	if ($_FILES["fileToUpload"]["name"] != ''){
	// if (false){

		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 5000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo $imageFileType;
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		        $sql = "INSERT INTO `tb_post`(`username`,`post_title`,`post_date`,`post_content`, `image_path`) VALUES ('$user','$judul','$tanggal','$konten', '$target_file')";
		        mysql_query($sql);
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

	} else {
		$sql = "INSERT INTO `tb_post`(`username`,`post_title`,`post_date`,`post_content`, `image_path`) VALUES ('$user','$judul','$tanggal','$konten', 'img/aang.jpg')";
		mysql_query($sql);

		header("Location: home.php");
		die();
	}


	//header("Location: home.php");



}else{
	echo "Nggak jalan bro";
}

?>
