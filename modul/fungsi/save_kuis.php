<?php
include "../../fungsi/koneksi.php";

$idkelas = $_POST['idkelas'];
$idpelajaran = $_POST['idpelajaran'];
$nisn = $_POST['nisn'];
$sesi = $_POST['sesi'];
$tgl = date("Y-m-d");

function acak($panjang)
{
$karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
$string = '';
for ($i = 0; $i < $panjang; $i++) {
$pos = rand(0, strlen($karakter)-1);
$string .= $karakter{$pos};
}
return $string;
}
//cara memanggilnya
$hasil_1= acak(5);
$hasil_2= acak(20);


$score=0;
$benar=0;
$salah=0;
$kosong=0;

if(isset($_POST['submit'])){
            $pilihan=$_POST["pilihan"];
            $id_soal=$_POST["id"];
            $jumlah=$_POST['jumlah'];
            
            $score=0;
            $benar=0;
            $salah=0;
            $kosong=0;
            
            for ($i=0;$i<$jumlah;$i++){
                //id nomor soal
                $nomor=$id_soal[$i];
                
                //jika user tidak memilih jawaban
                if (empty($pilihan[$nomor])){
                    $kosong++;
                }else{
                    //jawaban dari user
                    $jawaban=$pilihan[$nomor];
                    
                    //cocokan jawaban user dengan jawaban di database
                    $query=mysqli_query($connect, "SELECT * FROM m_pelajaran WHERE id='$nomor' AND jawaban='$jawaban'");
                    
                    $cek=mysqli_num_rows($query);
                    
                    if($cek){
                        //jika jawaban cocok (benar)
                        $benar++;
                    }else{
                        //jika salah
                        $salah++;
                    }
                    
                } 
                /*RUMUS
                Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
                hasil= 100 / jumlah soal * jawaban yang benar
                */
                
                $result=mysqli_query($connect, "SELECT * FROM m_pelajaran WHERE mata_pelajaran='$idpelajaran' AND id_kelas='$idkelas' AND sesi='$sesi'");
                $jumlah_soal=mysqli_num_rows($result);
                $score = $benar/$jumlah_soal*100;
                $hasil = number_format($score,1);
            }
        }

        //Lakukan Penyimpanan Kedalam Database
      // echo "
      //    <tr><td>Jumlah Jawaban Benar</td><td> : $benar </td></tr>
      //    <tr><td>Jumlah Jawaban Salah</td><td> : $salah</td></tr>
      //    <tr><td>Jumlah Jawaban Kosong</td><td>: $kosong</td></tr>
      //   </table></div>";

      //   echo $hasil;


// echo $id_soal;

if($hasil > 45){
$hasilnilai = "B";
} elseif ($hasil > 86) {
	$hasilnilai = "A";
} elseif ($hasil < 45) {
	$hasilnilai = "C";
} else {
	$hasilnilai = "";
}


$q = "INSERT INTO kuis (
	   id_kuis,
	   id_pelajaran,
	   nilai,
	   jawaban,
	   tanggal,
	   hasil,
	   nisn
	  ) VALUES(
	  '".$hasil_2."',
	  '".$idpelajaran."',
	  '".$hasil."',
	  '".$benar."',
	  '".$tgl."',
	  '".$hasilnilai."',
      '".$nisn."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../controller/menu_kuis'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../controller/menu_kuis'</script>";	
}

?>