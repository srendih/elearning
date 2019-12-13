<?php
include "../../fungsi/koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($connect,"DELETE FROM m_kelas WHERE id = '$id'");
if ($query){
	echo "<script>alert('Berhasil di Hapus!'); window.location = '../controller/table_kelas'</script>";	
} else {
	echo "<script>alert('Gagal di Hapus!'); window.location = '../controller/table_kelas'</script>";	
}
?>