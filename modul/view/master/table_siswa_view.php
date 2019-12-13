<section class="content-header">
      <h1>
        MASTER
        <small>Tabel Siswa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tabel Siswa</li>
      </ol>
    </section>

  <?php
          

    if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
//        jika ada kata kunci pencarian (artinya form pencarian disubmit dan tidak kosong)
//        pakai ini
        $keyword=$_REQUEST['keyword'];
        $reload = "../controller/table_siswa?pagination=true&keyword=$keyword";
        $sql =  "SELECT * FROM m_siswa WHERE nm_siswa LIKE '%$keyword%' ORDER BY id";
        $result = mysqli_query($connect,$sql);
    }else{
//            jika tidak ada pencarian pakai ini
        $reload = "../controller/table_siswa?pagination=true";
        $sql =  "SELECT * FROM m_siswa ORDER BY id";
        $result = mysqli_query($connect,$sql);
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
              <h3 class="box-title">DATA TABEL SISWA</h3>

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
                  <th>Nama Siswa</th>
                  <th>Jenkel</th>
                  <th>NISN</th>
                  <th>Nama Kelas</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>User Name</th>
                  <th>Action</th>
                </tr>
                <?php
                 while(($count<$rpp) && ($i<$tcount)) {
                        mysqli_data_seek($result,$i);
                        $data = mysqli_fetch_array($result);
                        $qkelas = mysqli_query ($connect, " SELECT * FROM m_kelas WHERE id='$data[id_kelas]'");
                        $tmpilkelas = mysqli_fetch_array ($qkelas);
                        $quser = mysqli_query ($connect, " SELECT * FROM user WHERE id='$data[id_user]'");
                        $tmpiluser = mysqli_fetch_array ($quser);
               ?>
                <tbody>
                  <td><?php echo ++$no_urut; ?></td>
                  <td><?php echo $data['nm_siswa']; ?></td>
                  <td><?php echo $data['jenkel']; ?></td>
                  <td><?php echo $data['nisn']; ?></td>
                  <td><?php echo $tmpilkelas['nama_kelas']; ?></td>
                  <td><?php echo $data['tempat_lahir']; ?></td>
                  <td><?php echo $data['tgl_lahir']; ?></td>
                  <td><?php echo $tmpiluser['username']; ?></td>

                  <td>
                   <a class="btn btn-info btn-xs" data-placement="bottom" data-toggle="tooltip" title="Edit"
                    href="../controller/form_siswa?id=<?php echo $data['id'];?>"><span class="fa fa-pencil"></span> Ubah</a>
                    <a onclick="return confirm ('Yakin hapus kd siswa <?php echo $data['nm_siswa'];?>.?');" class="btn btn-danger btn-xs" data-placement="bottom" data-toggle="tooltip" title="Hapus" href="../fungsi/hapus_siswa?id=<?php echo $data['id'];?>"><span class="fa fa-trash-o"> Hapus</a>
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
              <a href="table_siswa" class="btn btn-sm btn-info">Refresh<i class="fa fa-refresh"></i></a> <a href="form_siswa" class="btn btn-sm btn-warning">Tambah<i class="fa fa-arrow-circle-right"></i></a>
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