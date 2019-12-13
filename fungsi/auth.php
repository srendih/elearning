<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND password='$password'");
$row=mysqli_fetch_array($sql);
if ($row['username'] == $username AND $row['password'] == $password)
{

  $_SESSION['username'] = $row['username'];
  $_SESSION['level'] = $row['level'];
  $_SESSION['id'] = $row['id'];
  echo "<script>alert('Selamat datang $username'); window.location ='../modul/controller/beranda'</script>";

}else{

	?>
    <script language="javascript">
	alert("Email atau Password tidak sesuai. Silahkan ulang kembali!");
	document.location='../';
	</script>
    <?php
	}
?>
