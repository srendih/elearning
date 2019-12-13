<?php
include "../../fungsi/koneksi.php";
$nmkelas =$_POST['nm_kelas'];
$jrusan = $_POST['jurusan'];
$id = $_POST['Id'];

$query = "UPDATE m_kelas SET nama_kelas='$nmkelas', jurusan='$jrusan'
  WHERE id = '$id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../controller/table_kelas'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../controller/table_kelas'</script>";	
}

?>