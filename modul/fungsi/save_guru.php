<?php
include "../../fungsi/koneksi.php";
$nmguru = $_POST['nm_guru'];
$idpelajaran = $_POST ['id_pelajaran'];
$iduser = $_POST ['id_user'];
$id = $_POST['Id'];
$kelas = $_POST['kelas'];

$q = "INSERT INTO m_guru (
	   id,
	   nm_guru,
	   id_pelajaran,
	   id_kelas,
	   id_user
	  ) VALUES(
	  '".$id."',
	  '".$nmguru."',
	  '".$idpelajaran."',
	  '".$kelas."',
	  '".$iduser."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../controller/table_guru'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../controller/table_guru'</script>";	
}

?>