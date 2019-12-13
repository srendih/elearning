<?php
include "../../fungsi/koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM user WHERE id = '$id'");
if ($query){
	echo "<script>alert('Berhasil di Hapus!'); window.location = '../controller/table_user'</script>";	
} else {
	echo "<script>alert('Gagal di Hapus!'); window.location = '../controller/table_user'</script>";	
}
?>