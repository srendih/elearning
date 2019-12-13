<?php
include "../../fungsi/koneksi.php";
include "../controller/page.php";

$idsiswa = $_POST['idsiswa'];
$semester = $_POST['semester'];
$tgl1=$_POST['tgl_awal'];
$tgl2=$_POST['tgl_akhir'];    
$mata_pelajaran = $_POST['mata_pelajaran'];   
function tanggal_indo($tanggal, $cetak_hari = false)
{
  $hari = array ( 1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
      );
      
  $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
  $split    = explode('-', $tanggal);
  $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
  
  if ($cetak_hari) {
    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ' ' . $tgl_indo;
  }
  return $tgl_indo;
}


$result = mysqli_query($connect, "SELECT * FROM kuis WHERE nisn='$idsiswa' AND id_pelajaran='$mata_pelajaran' AND tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY id_kuis");
$resultnama = mysqli_query($connect, "SELECT * FROM kuis WHERE nisn='$idsiswa' AND id_pelajaran='$mata_pelajaran' AND tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY id_kuis");
$tmplnama = mysqli_fetch_array($resultnama);
$resultsiswa = mysqli_query($connect, "SELECT * FROM m_siswa WHERE nisn='$tmplnama[nisn]' ORDER BY id");
$tmplsiswa = mysqli_fetch_array($resultsiswa);
$resultkelas = mysqli_query($connect, "SELECT * FROM m_kelas WHERE id='$tmplsiswa[id_kelas]' ORDER BY id");
$tmplkelas = mysqli_fetch_array($resultkelas);
 
// $query=mysqli_query($connect,"SELECT * FROM m_siswa WHERE nis='$_GET[id]'");
$no_urut=1;
$pertemuan=1;

 ?>
<html>
<head>
    <title></title>
  <link rel="shortcut icon" href="../../images/logo.jpg" />
</head>
<body>
    <table align="center" border="0" cellpadding="1" cellspacing="1" style="width: 100%;">
    <tbody>
        <tr>
            <td colspan="3" style="text-align: center;"><b>LAPORAN NILAI KUIS</b></td>
        </tr>
    </tbody>
</table>

<hr style="margin-top:0; margin-bottom:2px; border:1px solid #000000;" />
<hr style="margin-top:0; border:2px solid #000000;" />

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width: 100%;">
    <tbody>
        <tr>
            <td colspan="3" rowspan="1" style="text-align: center; font-size: 15px;"><b>Nama Siswa : <?php echo $tmplsiswa['nm_siswa']; ?></b></td>
         </tr>
        <tr>
            <td colspan="3" rowspan="1" style="text-align: center; font-size: 15px;"><b>NISN : <?php echo $tmplnama['nisn']; ?></b></td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center; font-size: 15px;"><b>KELAS : <?php echo $tmplkelas['nama_kelas'],'-', $tmplkelas['jurusan']; ?></b></td>
        </tr>
        <tr>
            <td colspan="3" rowspan="1" style="text-align: center; font-size: 15px;"><b>SEMESTER : <?php echo $semester; ?></b></td>
        </tr>
        <tr>
            <td colspan="3" rowspan="1" style="text-align: center; font-size: 15px;"><b>Mata Pelajaran : <?php echo $tmplnama['id_pelajaran']; ?></b></td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center;">&nbsp;</td>
        </tr>
    </tbody>
</table>

<table align="center" border="1" cellpadding="0" cellspacing="0" style="width:100%;">
    <thead>
        <tr class="headings">
        <th class="column-title">No </th>
        <th class="column-title">Mata Pelajaran</th>
        <th class="column-title">Nama Guru</th>
        <th class="column-title">Pertemuan Kuis</th>
        <th class="column-title">Nilai</th>
    </tr>
    </thead>
    <tr>
    <?php
    while($data = mysqli_fetch_array($result)) {
    $tcount = mysqli_num_rows($result);
    $resultsiswa = mysqli_query($connect, "SELECT * FROM m_siswa WHERE nisn='$data[nisn]' ORDER BY id");
    $tmplsiswa = mysqli_fetch_array($resultsiswa);
    $resulguru = mysqli_query($connect, "SELECT * FROM m_guru WHERE id_kelas='$tmplsiswa[id_kelas]' AND id_pelajaran='$data[id_pelajaran]' ORDER BY id");
    $tmplguru = mysqli_fetch_array($resulguru);
        
    ?>
    <tbody>
        <td style="text-align: center;"><?php echo $no_urut++; ?></td>
        <td style="text-align: center;"><?php echo $data['id_pelajaran']; ?></td>
        <td style="text-align: center;"><?php echo $tmplguru['nm_guru']; ?></td>
        <td style="text-align: center;"><?php echo $pertemuan++; ?></td>
        <td style="text-align: center;"><?php echo $data['hasil']; ?></td>
    </tr>
        <?php  
        }
        ?>
    </tbody>
<br>
  <table style="margin-left: 900px;">
    <td>Jakarta, <?php echo tanggal_indo(date('Y-m-d'),true); ?></td><tr></tr><tr></tr><br>
    <td align="center">TTD</td><tr></tr><tr></tr><tr></tr><tr></tr><br>
    <td align="center">Kepala Sekolah</td>
  </table>
    </table>
</body>
</html>
