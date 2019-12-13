<?php
include "../../fungsi/koneksi.php";

$nmsiswa = $_POST['nm_siswa'];
$jenkel = $_POST ['jenkel'];
$nisn = $_POST ['nisn'];
$idkelas = $_POST ['id_kelas'];
$tempatlahir = $_POST ['tempat_lahir'];
$tgllahir = $_POST ['tgl_lahir'];
$iduser = $_POST ['id_user'];
$id = $_POST['id'];

$query = "UPDATE m_siswa SET nm_siswa='$nmsiswa', jenkel='$jenkel', nisn='$nisn', id_kelas='$idkelas', tempat_lahir='$tempatlahir', tgl_lahir='$tgllahir', id_user='$iduser'
  WHERE id = '$id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../controller/table_siswa'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../controller/table_siswa'</script>";	
}

?>