<?php
include "../../fungsi/koneksi.php";
$pelajaran =$_POST['mata_pelajaran'];
$kelas = $_POST['kelas'];
$session = $_POST['session'];
$id = $_POST['Id'];

$query = mysqli_query($connect, "SELECT * FROM user WHERE username ='$session'");
$tmpil_user = mysqli_fetch_array($query);
$queryguru = mysqli_query($connect, "SELECT * FROM m_guru WHERE id_user ='$tmpil_user[id]'");
$tmpil_guru = mysqli_fetch_array($queryguru);
$idguru = $tmpil_guru['id'];

  $dir_upload = "../hasil_file/";
  $lokasi_file = $_FILES['file']['tmp_name'];
  $nama_file = $_FILES['file']['name'];
  $tipe_file   = $_FILES['file']['type'];
  $gmbr = $pelajaran.'-'.$nama_file;

  if (!empty($lokasi_file)) {
  move_uploaded_file ($_FILES['file']['tmp_name'],$dir_upload. $pelajaran.'-'.$nama_file);
   
    $q = "INSERT INTO materi (
	   
	   id,
	   mata_pelajaran,
	   materi_file,
	   id_guru,
	   id_kelas
	  ) VALUES(
	  '".$id."',
	  '".$pelajaran."',
	  '".$gmbr."',
	  '".$idguru."', 
	  '".$kelas."')";
    $aksi = mysqli_query($connect, $q);
    // end of code C
    // code D
   if ($aksi){
   echo "<script>alert('Berhasil'); window.location = '../controller/table_materi'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../controller/table_materi'</script>";	
}
 
}
?>