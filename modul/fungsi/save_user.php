<?php
include "../../fungsi/koneksi.php";
$user =$_POST['username'];
$pass = $_POST['password'];
$level = $_POST['level'];
$id = $_POST['Id'];

$q = "INSERT INTO user (
	   
	   id,
	   username,
	   password,
	   level
	  ) VALUES(
	  '".$id."',
	  '".$user."',
	  '".$pass."', 
	  '".$level."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../controller/table_user'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../controller/table_user'</script>";	
}

?>