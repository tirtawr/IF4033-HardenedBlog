<?php
	session_start();
	//cek Brutforce login
	if ($_SESSION["login"]> 10 || !isset($_SESSION["login"]){
		header('location:youbastart.html');
	}else{
		require "db_handler.php";
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$password = hash('sha256', $password);
		if ($email == null){
			login($username, $password);
		}else{
			if (cekuser($username)){
				echo "user sudah ada";
			}else{
				$sql = "INSERT INTO `tb_user`(`username`,`password`,`email`) VALUES ('$username','$password','$email') ";
				mysql_query($sql);
				header('location:index.php');
			}
		}
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
	function login($q, $p) {
		$query = "SELECT * FROM `tb_user` WHERE username = '$q'";
		$hasil = mysql_query($query);
		$data = mysql_fetch_array($hasil);
		
		if ($data['username'] != ""){
			if ($data['password'] == $p){
				session_destroy();
				session_start();
				$_SESSION["user"] = $q;
				header('location:home.php');
			}else {
				$_SESSION["login"]++;
				header('location:index.php');
			}
		}else{
			$_SESSION["login"]++;
			header('location:index.php');
		}
	}
?>