<section class="content-header">
      <h1>
        MENU
        <small>Menu Kuis</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Menu Kuis</li>
      </ol>
    </section>

  <?php
  $idkelas = $_POST['idkelas'];
  $idpelajaran = $_POST['idpelajaran'];
  $nisn = $_POST['nisn'];
  $sesi = $_POST['sesi'];
//            jika tidak ada pencarian pakai ini
    $hasil=mysqli_query($connect, "SELECT * FROM m_pelajaran WHERE id_kelas='$idkelas' AND mata_pelajaran='$idpelajaran' AND sesi='$sesi' ORDER BY RAND ()");
    $jumlah=mysqli_num_rows($hasil);
    
    //pagination config start
    $rpp = 20; // jumlah record per halaman
    $page = intval($_GET["page"]);
     if($page<=0) $page = 1;  
    $tcount = mysqli_num_rows($hasil);
    $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
    $count = 0;
    $i = ($page-1)*$rpp;
    $no_urut = ($page-1)*$rpp;
    //pagination config end
  ?>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Mata Pelajaran <?php echo $idpelajaran; ?> Sesi <?php echo $sesi; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                
                <?php
                 while(($count<$rpp) && ($i<$tcount)) {
                        mysqli_data_seek($hasil,$i);
                        $data = mysqli_fetch_array($hasil);
                        $id=$data["id"];
                        $pertanyaan=$data["materi"];
                        $pilihan_a=$data["a"];
                        $pilihan_b=$data["b"];
                        $pilihan_c=$data["c"];
                        $pilihan_d=$data["d"];   
               ?>
            <form action="../fungsi/save_kuis" method="post" data-parsley-validate>
              <input type="hidden" name="id[]" value=<?php echo $id; ?>>
                <input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
                <input type="hidden" name="idpelajaran" value="<?php echo $idpelajaran; ?>">
                <input type="hidden" name="idkelas" value="<?php echo $idkelas; ?>">
                <input type="hidden" name="nisn" value="<?php echo $nisn; ?>">
                <input type="hidden" name="sesi" value="<?php echo $sesi; ?>">
                <tbody>
                  <td style="width: 2%;"><?php echo ++$no_urut; ?></td>
                   <td><?php echo "$pertanyaan"; ?></td>
                   <tr>
                    <td>A.</td>
                    <td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="A"> 
                <?php echo "$pilihan_a";?></td>
                  </tr>
                  <tr>
                  <td>B.</td>
                  <td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="B"> 
                <?php echo "$pilihan_b";?></td>
                </tr>
                <tr>
                  <td>C.</td>
                  <td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="C"> 
                <?php echo "$pilihan_c";?></td>
                </tr>
                <tr>
                  <td>D.</td>
                  <td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="D"> 
                <?php echo "$pilihan_d";?></td>
                </tr>
                  <?php  
                  $i++; 
                 $count++;
                  }
                  ?>
                </tbody>
              </table>
            <div class="text-right">
              <a href="form_pilih_kuis" class="btn btn-sm btn-info">Kembali<i class="fa fa-arrow-circle-left"></i></a>
              <button name="submit" class="btn btn-sm btn-warning">SELESAI<i class="fa fa-arrow-circle-right"></i></button>
              </div>
            </form>
              <br>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->

    </section>
