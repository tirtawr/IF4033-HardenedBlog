<?php

//Ntar ini credentials nya diganti yaa
$host = "localhost";
$username = "root";
$password = "";
$database = "simple_blog";
$con = mysql_connect($host,$username,$password);

$action = "";

if (!$con){
	throw new Exception("Database connection error");
} else {
	mysql_select_db($database,$con);
}

function getPosts($page = null){
	$sql = "SELECT * FROM `tb_post` ORDER BY `post_id` DESC";
	$resource = mysql_query($sql);
	$result = array();
	while ($row = mysql_fetch_array($resource)){
		array_push($result,$row);
	}
	return $result;
}

function getPost($post_id){
	$sql = sprintf("SELECT * FROM `tb_post` WHERE `post_id` = %d", $post_id);
	$resource = mysql_query($sql);
	while($row = mysql_fetch_array($resource)){
		return $row;
	}
}

function editPost($judul, $tanggal, $konten, $id, $path_image){
	$sql = "UPDATE `simple_blog`.`tb_post` SET `post_title` = '$judul', `post_date` = '$tanggal', `post_content` = '$konten', `image_path` = '$path_image' WHERE `tb_post`.`post_id` = $id;";
	mysql_query($sql);
}

function editPostNoPict($judul, $tanggal, $konten, $id){
	$sql = "UPDATE `simple_blog`.`tb_post` SET `post_title` = '$judul', `post_date` = '$tanggal', `post_content` = '$konten' WHERE `tb_post`.`post_id` = $id;";
	mysql_query($sql);
}

function getComments($post_id){
	$sql = sprintf("SELECT * FROM `tb_comments` WHERE `post_id`=%d ORDER BY cmt_id DESC", $post_id);
	$resource = mysql_query($sql);
	$result = array();
	while ($row = mysql_fetch_array($resource)){
		array_push($result, $row);
	}
	return $result;
}

function addComment($data){
	$post_id = htmlentities(mysql_real_escape_string($data['post_id']));
	$nama = htmlentities(mysql_real_escape_string($data['name']));
	$email = htmlentities(mysql_real_escape_string($data['email']));
	$komentar = htmlentities(mysql_real_escape_string($data['post_comment']));
	$sql = "INSERT INTO `tb_comments`(`post_id`,`name`,`email`,`post_comment`) VALUES ('$post_id','$nama','$email','$komentar') ";
	mysql_query($sql);
}


function cekuser($q) {
	$query = "SELECT * FROM `tb_user` WHERE username = '$q'";
	$hasil = mysql_query($query);
	$data = mysql_fetch_array($hasil);
	if ($data['username'] == ""){
		return false;
	}else{
		return true;
	}
}


?>
