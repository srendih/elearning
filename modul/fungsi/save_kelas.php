<?php
include "../../fungsi/koneksi.php";
$nmkelas =$_POST['nm_kelas'];
$jrusan = $_POST['jurusan'];
$id = $_POST['Id'];

$q = "INSERT INTO m_kelas (
	   
	   id,
	   nama_kelas,
	   jurusan
	  ) VALUES(
	  '".$id."',
	  '".$nmkelas."', 
	  '".$jrusan."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../controller/table_kelas'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../controller/table_kelas'</script>";	
}

?>