<?php
include "../../fungsi/koneksi.php";
$pelajaran =$_POST['mata_pelajaran'];
$kelas = $_POST['kelas'];
$session = $_POST['session'];
$id = $_POST['Id'];


if(isset($_POST['ubah_file'])){
$namafile = $_FILES['file']['name'];
$lokasi = $_FILES['file']['tmp_name'];
$uploadd = "../hasil_file/";
$gmbar_file = $pelajaran.'-'.$namafile;
move_uploaded_file($lokasi, $uploadd.$pelajaran.'-'.$namafile);

$quermateri = mysqli_query($connect,"SELECT * FROM materi WHERE id='$id'");
$tmpilmateri = mysqli_fetch_array($quermateri);
unlink("../hasil_file/".$tmpilmateri['materi_file']);

$query = "UPDATE materi SET mata_pelajaran='$pelajaran', id_kelas='$kelas', materi_file='$gmbar_file', id_guru='$session'
  WHERE id = '$id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../controller/table_materi'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../controller/table_materi'</script>";	
}

}else{

$query = "UPDATE materi SET mata_pelajaran='$pelajaran', id_kelas='$kelas', id_guru='$session'
  WHERE id = '$id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../controller/table_materi'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../controller/table_materi'</script>";	
}

}

?>