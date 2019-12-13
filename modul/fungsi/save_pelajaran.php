<?php
include "../../fungsi/koneksi.php";
$pelajaran =$_POST['mata_pelajaran'];
$kelas = $_POST['kelas'];
$materi = $_POST['materi'];
$jawaban = $_POST['jawaban'];
$sesi = $_POST['sesi'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
// $id = $_POST['Id'];

$carikode = mysqli_query($connect, "SELECT id from m_pelajaran") or die (mysqli_error());
// menjadikannya array
$datakode = mysqli_fetch_array($carikode);
$jumlah_data = mysqli_num_rows($carikode);
// jika $datakode
if ($datakode) {
// membuat variabel baru untuk mengambil kode barang mulai dari 1
$nilaikode = substr($jumlah_data[0], 1);
// menjadikan $nilaikode ( int )
$kode = (int) $nilaikode;
// setiap $kode di tambah 1
$kode = $jumlah_data + 1;
// hasil untuk menambahkan kode 
// angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
// atau angka sebelum $kode
$idpelajaran = "B1351".str_pad($kode, 4, "0", STR_PAD_LEFT);
} else {
$idpelajaran = "B13510001";
}

$q = "INSERT INTO m_pelajaran (
	   
	   id,
	   mata_pelajaran,
	   materi,
	   jawaban,
	   a,
	   b,
	   c,
	   d,
	   sesi,
	   id_kelas
	  ) VALUES(
	  '".$idpelajaran."',
	  '".$pelajaran."',
	  '".$materi."',
	  '".$jawaban."',
	  '".$a."', 
	  '".$b."', 
	  '".$c."', 
	  '".$d."', 
	  '".$sesi."', 
	  '".$kelas."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../controller/table_pelajaran'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../controller/table_pelajaran'</script>";	
}

?>