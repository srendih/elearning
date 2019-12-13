<?php
include "../../fungsi/koneksi.php";

$tgl_mulai = $_POST['tgl_mulai'];
$tgl_akhir = $_POST['tgl_akhir'];
$waktu_mulai= $_POST['waktu_mulai'];
$waktu_akhir = $_POST['waktu_akhir'];
$id = $_POST['Id'];


$q = "INSERT INTO m_guru (
	   id,
	   nm_guru,
	   id_pelajaran,
	   id_kelas,
	   id_user
	  ) VALUES(
	  '".$id."',
	  '".$tgl_akhir."',
	  '".$tgl_mulai."',
	  '".$waktu_akhir."',
	  '".$waktu_mulai."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../controller/table_guru'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../controller/table_guru'</script>";	
}

// echo $tgl_akhir;

//     $q = "INSERT INTO jadwal_kuis (
	   
// 	   id_jadwal,
// 	   tanggal_mulai,
// 	   tanggal_akhir,
// 	   waktu_akhir,
// 	   waktu_mulai
// 	  ) VALUES(
// 	  '".$id."',
// 	  '".$tgl_mulai."',
// 	  '".$tgl_akhir."',
// 	  '".$waktu_akhir."',
// 	  '".$waktu_mulai."')";

//     $aksi = mysqli_query($connect, $q);
//     // end of code C
//     // code D
//    if ($aksi){
//    echo "<script>alert('Berhasil'); window.location = '../controller/grid_jadwal_kuis'</script>";	
// } else {
// 	echo "<script>alert('Gagal'); window.location = '../controller/grid_jadwal_kuis'</script>";	
// }

?>