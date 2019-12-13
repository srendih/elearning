<?php
include "../../fungsi/koneksi.php";
$user =$_POST['username'];
$pass = $_POST['password'];
$level = $_POST['level'];
$id = $_POST['id'];

$query = "UPDATE user SET username='$user', password='$pass', level='$level'
  WHERE id = '$id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../controller/table_user'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../controller/table_user'</script>";	
}

?>