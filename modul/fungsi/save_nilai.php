<?php
include "../../fungsi/koneksi.php";
$idpelajaran = $_POST ['id_pelajaran'];
$nilai = $_POST ['nilai'];
$ket = $_POST ['ket'];
$id = $_POST['Id'];

$q = "INSERT INTO m_nilai (
	   
	   id,
	   id_pelajaran,
	   nilai,
	   ket
	  ) VALUES(
	  '".$id."',
	  '".$idpelajaran."',
	  '".$nilai."',
	  '".$ket."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../controller/table_nilai'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../controller/table_nilai'</script>";	
}

?>