<?php
include "../../fungsi/koneksi.php";
$nmsiswa = $_POST['nm_siswa'];
$jenkel = $_POST ['jenkel'];
$nisn = $_POST ['nisn'];
$idkelas = $_POST ['id_kelas'];
$tempatlahir = $_POST ['tempat_lahir'];
$tgllahir = $_POST ['tgl_lahir'];
$iduser = $_POST ['id_user'];
$id = $_POST['Id'];

$q = "INSERT INTO m_siswa (
	   
	   id,
	   nm_siswa,
	   jenkel,
	   nisn,
	   id_kelas,
	   tempat_lahir,
	   tgl_lahir,
	   id_user
	  ) VALUES(
	  '".$id."',
	  '".$nmsiswa."',
	  '".$jenkel."',
	  '".$nisn."',
	  '".$idkelas."',
	  '".$tempatlahir."',
	  '".$tgllahir."',
	  '".$iduser."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../controller/table_siswa'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../controller/table_siswa'</script>";	
}

?>