<section class="content-header">
      <h1>
        MENU SISWA
        <small>Kuis</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kuis</li>
      </ol>
    </section>

  <?php
    $iduser = $_SESSION['id'];
    $leveluser = $_SESSION['level'];
    $querisiswa = mysqli_query($connect, "SELECT * FROM m_siswa WHERE id_user = '$iduser'");
    $tmpsiswa = mysqli_fetch_array($querisiswa);
    $nisnsiswa = $tmpsiswa['nisn'];
    if($leveluser == 'siswa'){
      if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
//        jika ada kata kunci pencarian (artinya form pencarian disubmit dan tidak kosong)
//        pakai ini
        $keyword=$_REQUEST['keyword'];
        $reload = "../controller/table_pelajaran?pagination=true&keyword=$keyword";
        $sql =  "SELECT * FROM kuis WHERE nisn LIKE '%$keyword%' AND nisn='$nisnsiswa' ORDER BY id_kuis";
        $result = mysqli_query($connect,$sql);
    }
    else{
//            jika tidak ada pencarian pakai ini
        $reload = "../controller/table_pelajaran?pagination=true";
        $sql =  "SELECT * FROM kuis WHERE nisn='$nisnsiswa'  ORDER BY id_kuis";
        $result = mysqli_query($connect,$sql);
    }
  }
  else {
    if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
//        jika ada kata kunci pencarian (artinya form pencarian disubmit dan tidak kosong)
//        pakai ini
        $keyword=$_REQUEST['keyword'];
        $reload = "../controller/table_pelajaran?pagination=true&keyword=$keyword";
        $sql =  "SELECT * FROM kuis WHERE nisn LIKE '%$keyword%' ORDER BY id_kuis";
        $result = mysqli_query($connect,$sql);
    }
    else{
//            jika tidak ada pencarian pakai ini
        $reload = "../controller/table_pelajaran?pagination=true";
        $sql =  "SELECT * FROM kuis ORDER BY id_kuis";
        $result = mysqli_query($connect,$sql);
    }
  }
    
    //pagination config start
    $rpp = 5; // jumlah record per halaman
    $page = intval($_GET["page"]);
     if($page<=0) $page = 1;  
    $tcount = mysqli_num_rows($result);
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
              <h3 class="box-title">HASIL KUIS</h3>

              <div class="box-tools">
                <form method="post" action="">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="keyword" class="form-control pull-right" value="<?php echo $_REQUEST['keyword']; ?>" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Mata Pelajaran</th>
                  <th>NIS Siswa</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Nilai</th>
                  <th>Hasil</th>
                  <th>Tanggal Kuis</th>
                  <th>Action</th>
                </tr>
                <?php
                 while(($count<$rpp) && ($i<$tcount)) {
                mysqli_data_seek($result,$i);
                $data = mysqli_fetch_array($result);
                $qusiswa = mysqli_query($connect, "SELECT * FROM m_siswa WHERE nisn = '$data[nisn]'");
                $tmpilsiswa = mysqli_fetch_array($qusiswa);
                $qukelas = mysqli_query($connect, "SELECT * FROM m_kelas WHERE id = '$tmpilsiswa[id_kelas]'");
                $tmpilkelas = mysqli_fetch_array($qukelas);
               ?>
                <tbody>
                  <td><?php echo ++$no_urut; ?></td>
                  <td><?php echo $data['id_pelajaran']; ?></td>
                  <td><?php echo $data['nisn']; ?></td>
                  <td><?php echo $tmpilsiswa['nm_siswa']; ?></td>
                  <td><?php echo $tmpilkelas['nama_kelas'],'-',$tmpilkelas['jurusan']; ?></td>
                  <td><?php echo $data['nilai']; ?></td>
                  <td><?php echo $data['hasil']; ?></td>
                  <td><?php echo $data['tanggal']; ?></td>
                  <td>
                   <a class="btn btn-info btn-xs" data-placement="bottom" data-toggle="tooltip" title="Lihat"
                    href="../controller/form_lihat_kuis?id=<?php echo $data['id_kuis'];?>"><span class="fa fa-eye"></span>Lihat</a>
                  </td>
                  <?php  
                  $i++; 
                 $count++;
                  }
                  ?>
                </tbody>
              </table>
              <ul class="pagination">
              <li><?php echo paginate_one($reload, $page, $tpages); ?></li>
            </ul>
            <div class="text-right">
              <a href="menu_kuis" class="btn btn-sm btn-info">Refresh<i class="fa fa-refresh"></i></a> 
              <a href="form_pilih_kuis" class="btn btn-sm btn-warning">IKUT KUIS<i class="fa fa-arrow-circle-right"></i></a>
              </div>
              <br>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row (main row) -->

    </section>