<?php
include "../../fungsi/koneksi.php";
$id = $_GET['id'];
$quermateri = mysqli_query($connect,"SELECT * FROM materi WHERE id='$id'");
$tmpilmateri = mysqli_fetch_array($quermateri);
unlink("../hasil_file/".$tmpilmateri['materi_file']);
$query = mysqli_query($connect,"DELETE FROM materi WHERE id = '$id'");

if ($query){
	echo "<script>alert('Berhasil di Hapus!'); window.location = '../controller/table_materi'</script>";
} else {
	echo "<script>alert('Gagal di Hapus!'); window.location = '../controller/table_materi'</script>";	
}
?>