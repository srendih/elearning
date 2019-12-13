<section class="content-header">
      <h1>
        <small>Laporan KUIS</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="beranda"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Laporan Kuis</li>
      </ol>
    </section>
    <?php
    $iduser = $_SESSION['id'];
    $quersiswa = mysqli_query($connect, "SELECT * FROM m_siswa WHERE id_user='$iduser'");
    $tmpsiswa = mysqli_fetch_array($quersiswa);
     ?>
  
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
     <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Laporan Hasil kuis Siswa</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <?php if($_SESSION['level'] == 'siswa') {
              ?>
              <form action="../laporan/print_hasil_kuis" target="_blank" method="post" data-parsley-validate>
            <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                    <label>NIS Siswa</label>
                  <input type="text" name="idsiswa" value="<?php echo $tmpsiswa['nisn']; ?>" class="form-control" readonly >
                    </div>
                  <div class="col-md-6">
                    <label>Pilih Semester</label>
                <select name="semester" class="form-control" required>
                  <option value="">--pilih---</option>
                  <option value="01">01</option>
                  <option value="02">02</option>
                </select>
                  </div>
                  
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
                <div class="row">
                  <div class="col-md-6">
                    <label>Pilih Tanggal Awal Semester</label>
                    <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="tgl_awal" class="form-control" required>
                  
                </div>
                  </div>
                  <div class="col-md-6">
                    <label>Pilih Tanggal Akhir Semester</label>
                    <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="tgl_akhir" class="form-control" required>
                  
                </div>
                  </div>
                  
                </div>
              </div>
              <div class="col-md-6">
                    <label>Pilih Mata Pelajaran</label>
                <select name="mata_pelajaran" class="form-control" required>
                  <option value="">--pilih---</option>
                  <?php
                  $qpelajaran = mysqli_query($connect,"SELECT * FROM m_pelajaran GROUP BY mata_pelajaran ORDER BY id");
                  while($datapelajaran=mysqli_fetch_array($qpelajaran)){
                  echo "<option value=\"$datapelajaran[mata_pelajaran]\">$datapelajaran[mata_pelajaran]</option>\n";
                  }
                  ?>
                </select>
                  </div>
              <!-- /.form-group -->
            </div>
            <br>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <button type="submit" class="btn btn-success"><i class="fa fa-print"> PRINT</i></button>
            </div>
          </form>
            <?php } else { ?>
              <form action="../laporan/print_hasil_kuis" target="_blank" method="post" data-parsley-validate>
            <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                    <label>Pilih Siswa</label>
                <select name="idsiswa" class="form-control" required>
                  <option value="">--pilih---</option>
                  <?php
                  $qsiswa = mysqli_query($connect,"SELECT * FROM m_siswa ORDER BY id");
                  while($datasiswa=mysqli_fetch_array($qsiswa)){
                  echo "<option value=\"$datasiswa[nisn]\">$datasiswa[nisn] - $datasiswa[nm_siswa]</option>\n";
                  }
                  ?>
                </select>
                  </div>
                  <div class="col-md-6">
                    <label>Pilih Semester</label>
                <select name="semester" class="form-control" required>
                  <option value="">--pilih---</option>
                  <option value="01">01</option>
                  <option value="02">02</option>
                </select>
                  </div>
                  
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
                <div class="row">
                  <div class="col-md-6">
                    <label>Pilih Tanggal Awal Semester</label>
                    <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="tgl_awal" class="form-control" required>
                  
                </div>
                  </div>
                  <div class="col-md-6">
                    <label>Pilih Tanggal Akhir Semester</label>
                    <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="tgl_akhir" class="form-control" required>
                  
                </div>
                  </div>
                  
                </div>
              </div>
              <div class="col-md-6">
                    <label>Pilih Mata Pelajaran</label>
                <select name="mata_pelajaran" class="form-control" required>
                  <option value="">--pilih---</option>
                  <?php
                  $qpelajaran = mysqli_query($connect,"SELECT * FROM m_pelajaran GROUP BY mata_pelajaran ORDER BY id");
                  while($datapelajaran=mysqli_fetch_array($qpelajaran)){
                  echo "<option value=\"$datapelajaran[mata_pelajaran]\">$datapelajaran[mata_pelajaran]</option>\n";
                  }
                  ?>
                </select>
                  </div>
              <!-- /.form-group -->
            </div>
            <br>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <button type="submit" class="btn btn-success"><i class="fa fa-print"> PRINT</i></button>
            </div>
          </form>
            <?php } ?>
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.box -->
    </div>
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row (main row) -->

    </section>