<?php
include "../../fungsi/koneksi.php";

$idpelajaran = $_POST['id_pelajaran'];
$nilai = $_POST ['nilai'];
$ket = $_POST ['ket'];
$id = $_POST['Id'];

$query = "UPDATE m_nlai SET id_pelajaran='$idpelajaran', nilai='$nilai', ket='$ket'
  WHERE id = '$id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../controller/table_nilai'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../controller/table_nilai'</script>";	
}

?>