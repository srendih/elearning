<section class="content-header">
      <h1>
        Materi
        <small>Materi Pelajaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="beranda"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Materi Pelajaran</li>
      </ol>
    </section>

  <?php
          

    if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
//        jika ada kata kunci pencarian (artinya form pencarian disubmit dan tidak kosong)
//        pakai ini
        $keyword=$_REQUEST['keyword'];
        $reload = "../controller/jadwal_kuis?pagination=true&keyword=$keyword";
        $sql =  "SELECT * FROM jadwal_kuis WHERE tanggal_mulai LIKE '%$keyword%' ORDER BY id_kuis";
        $result = $connect->query($sql);
    }else{
//            jika tidak ada pencarian pakai ini
        $reload = "../controller/jadwal_kuis?pagination=true";
        $sql =  "SELECT * FROM jadwal_kuis ORDER BY id_kuis";
        $result = $connect->query($sql);
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
              <h3 class="box-title">MATERI PELAJARAN</h3>

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
                  <th>Tanggal Jadwal Mulai</th>
                  <th>Waktu Jadwal Mulai</th>
                  <th>Tanggal Jadwal akhir</th>
                  <th>Waktu Jadwal akhir</th>
                  <th>Action</th>
                </tr>
                <?php
                 while(($count<$rpp) && ($i<$tcount)) {
                mysqli_data_seek($result,$i);
                $data = $result->fetch_assoc();
                // $data = mysqli_fetch_array($result);
               ?>
                <tbody>
                  <td><?php echo ++$no_urut; ?></td>
                  <td><?php echo $tmpilkelas['tanggal_mulai']; ?></td>
                  <td><?php echo $tmpilkelas['Waktu_mulai']; ?></td>
                  <td><?php echo $tmpilkelas['tanggal_akhir']; ?></td>
                  <td><?php echo $tmpilkelas['waktu_akhir']; ?></td>
                  <td>
                   <a class="btn btn-info btn-xs" target="_blank" data-placement="bottom" data-toggle="tooltip" title="Download"
                    href="../hasil_file/<?php echo $data['materi_file'];?>"><span class="fa fa-download"></span></a>
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
              <a href="jadwal_kuis" class="btn btn-sm btn-info">Refresh<i class="fa fa-refresh"></i></a> 
              <a href="form_jadwal_kuis" class="btn btn-sm btn-warning">Tambah<i class="fa fa-arrow-circle-right"></i></a>
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