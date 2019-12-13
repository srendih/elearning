<?php

$iduser = $_SESSION['id'];
$querisiswa = mysqli_query($connect, "SELECT * FROM m_siswa WHERE id_user = '$iduser'");
$tmpsiswa = mysqli_fetch_array($querisiswa);
$qsiswa = mysqli_query($connect, "SELECT COUNT(id) AS total FROM m_siswa ORDER BY id");
$tsiswa = mysqli_fetch_array($qsiswa);
$qguru = mysqli_query($connect, "SELECT COUNT(id) AS total FROM m_guru ORDER BY id");
$tguru = mysqli_fetch_array($qguru);
$qkelas = mysqli_query($connect, "SELECT COUNT(id) AS total FROM m_kelas ORDER BY id");
$tkelas = mysqli_fetch_array($qkelas);
$quser = mysqli_query($connect, "SELECT COUNT(id) AS total FROM user ORDER BY id");
$tuser = mysqli_fetch_array($quser);
$qmateri = mysqli_query($connect, "SELECT COUNT(id) AS total FROM materi ORDER BY id");
$tmateri = mysqli_fetch_array($qmateri);
$qkuis = mysqli_query($connect, "SELECT COUNT(id_kuis) AS total FROM kuis WHERE nisn='$tmpsiswa[nisn]' ORDER BY id_kuis");
$tkuis = mysqli_fetch_array($qkuis);

$sql =  "SELECT * FROM kuis ORDER BY id_kuis DESC";
$resultkuis = mysqli_query($connect,$sql);

$sqlmateri =  "SELECT * FROM materi ORDER BY id DESC";
$resultmateri = mysqli_query($connect, $sqlmateri);

 ?>
<section class="content-header">
      <h1>
        Dashboard 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <?php if($_SESSION['level'] == 'siswa') { ?>
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $tmateri['total']; ?></h3>

              <p>Total Materi Pelajaran</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $tguru['total']; ?></h3>

              <p>Total Guru</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-secret"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $tkelas['total']; ?></h3>

              <p>Total Kelas</p>
            </div>
            <div class="icon">
              <i class="fa fa-building"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $tkuis['total']; ?></h3>

              <p>Total Kuis Dikerjakan</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
          </div>
        </div>
        <?php } else { ?>
          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $tsiswa['total']; ?></h3>

              <p>Total Siswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $tguru['total']; ?></h3>

              <p>Total Guru</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-secret"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $tkelas['total']; ?></h3>

              <p>Total Kelas</p>
            </div>
            <div class="icon">
              <i class="fa fa-building"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $tuser['total']; ?></h3>

              <p>Total Pengguna</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
          </div>
        </div>
        <?php } ?>
        <!-- ./col -->
        <section class="content">
      <!-- Small boxes (Stat box) -->
      <?php if($_SESSION['level'] == 'siswa') { ?>
        <div class="row">
        <div class="col-md-12">
        <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Materi Update</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php
                while ($datamateri=mysqli_fetch_array($resultmateri)) {
                  $qguru = mysqli_query($connect, "SELECT * FROM m_guru WHERE id='$datamateri[id_guru]'");
                  $tmplguru = mysqli_fetch_array($qguru);
                  $qkelas = mysqli_query($connect, "SELECT * FROM m_kelas WHERE id='$datamateri[id_kelas]'");
                  $tmplkelas = mysqli_fetch_array($qkelas);
                 ?>
                <li class="item">
                  <div class="product-img">
                    <img src="../dist/img/avatar5.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Nama Guru : <?php echo $tmplguru['nm_guru']; ?>
                      <span class="label label-warning pull-right">Kelas : <?php echo $tmplkelas['nama_kelas'],'-', $tmplkelas['jurusan']; ?></span></a>
                    <span class="product-description">
                          Baru Saja Upload Materi Mata Pelajaran : <?php echo $datamateri['mata_pelajaran']; ?>
                        </span>
                  </div>
                </li>
              <?php } ?>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-footer -->
          </div>
        
      </div>
      </div>
      <?php } else { ?>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
        <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Materi Update</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php
                while ($datamateri=mysqli_fetch_array($resultmateri)) {
                  $qguru = mysqli_query($connect, "SELECT * FROM m_guru WHERE id='$datamateri[id_guru]'");
                  $tmplguru = mysqli_fetch_array($qguru);
                  $qkelas = mysqli_query($connect, "SELECT * FROM m_kelas WHERE id='$datamateri[id_kelas]'");
                  $tmplkelas = mysqli_fetch_array($qkelas);
                 ?>
                <li class="item">
                  <div class="product-img">
                    <img src="../dist/img/avatar5.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Nama Guru : <?php echo $tmplguru['nm_guru']; ?>
                      <span class="label label-warning pull-right">Kelas : <?php echo $tmplkelas['nama_kelas'],'-', $tmplkelas['jurusan']; ?></span></a>
                    <span class="product-description">
                          Baru Saja Upload Materi Mata Pelajaran : <?php echo $datamateri['mata_pelajaran']; ?>
                        </span>
                  </div>
                </li>
              <?php } ?>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-footer -->
          </div>
        
      </div>
      </div>
      <div class="row">
        <div class="col-md-12">
        <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kuis Update Siswa</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php
                while ($data=mysqli_fetch_array($resultkuis)) {
                  $qsiswa = mysqli_query($connect, "SELECT * FROM m_siswa WHERE nisn='$data[nisn]'");
                  $tmplsiswa = mysqli_fetch_array($qsiswa);
                 ?>
                <li class="item">
                  <div class="product-img">
                    <img src="../dist/img/avatar5.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Nama Siswa : <?php echo $tmplsiswa['nm_siswa']; ?>
                      <span class="label label-warning pull-right">Nilai : <?php echo $data['hasil']; ?></span></a>
                    <span class="product-description product-title"> Nis : <?php echo $data['nisn']; ?> </span>
                    <span class="product-description">
                          Baru Saja Menyelesaikan Kuis Mata Pelajaran : <?php echo $data['id_pelajaran']; ?>
                        </span>
                  </div>
                </li>
              <?php } ?>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-footer -->
          </div>
        
      </div>
    </div>
    <?php } ?>
      <!-- Main row -->
      <!-- /.row (main row) -->

    </section>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row (main row) -->

    </section>