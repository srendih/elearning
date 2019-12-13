<?php
include "../../fungsi/koneksi.php";

$nmguru = $_POST['nm_guru'];
$idpelajaran = $_POST ['id_pelajaran'];
$iduser = $_POST ['id_user'];
$id = $_POST['Id'];
$kelas = $_POST['kelas'];

$query = "UPDATE m_guru SET nm_guru='$nmguru', id_pelajaran='$idpelajaran', id_user='$iduser', id_kelas='$kelas'
  WHERE id = '$id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../controller/table_guru'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../controller/table_guru'</script>";	
}

?>