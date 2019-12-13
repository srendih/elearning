<?php
include "../../fungsi/koneksi.php";
$pelajaran =$_POST['mata_pelajaran'];
$kelas = $_POST['kelas'];
$materi = $_POST['materi'];
$jawaban = $_POST['jawaban'];
$sesi = $_POST['sesi'];
$Id = $_POST['Id'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];

$query = "UPDATE m_pelajaran SET mata_pelajaran='$pelajaran', id_kelas='$kelas', materi='$materi', jawaban='$jawaban', a='$a', b='$b', c='$c', d='$d', sesi='$sesi'
  WHERE id = '$Id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../controller/table_pelajaran'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../controller/table_pelajaran'</script>";	
}

?>