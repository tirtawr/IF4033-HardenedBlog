<?php
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


?>
