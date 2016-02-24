<?php




if(isset($_POST)){

	$judul = htmlentities(mysql_real_escape_string($_POST['Judul']));
	$tanggal = htmlentities(mysql_real_escape_string($_POST['Tanggal']));
	$konten = htmlentities(mysql_real_escape_string($_POST['Konten']));
	$id = htmlentities(mysql_real_escape_string($_POST['Id']));

	require 'db_handler.php';
	editPost($judul, $tanggal, $konten, $id);



	header("Location: home.php");



}else{
	echo "Nggak jalan bro";
}

?>
