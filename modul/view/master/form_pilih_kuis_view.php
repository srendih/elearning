<section class="content-header">
      <h1>
        <small>Form Kuis</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="beranda"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Kuis</li>
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
          <h3 class="box-title">Pilih Kuis</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="form_kuis" method="post" data-parsley-validate>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                <label>Pilih Kelas</label>
                <select name="idkelas" class="form-control" required>
                  <option value="">--pilih---</option>
                  <?php
                  $qpelajaran = mysqli_query($connect,"SELECT * FROM m_kelas ORDER BY id");
                  while($datakelas=mysqli_fetch_array($qpelajaran)){
                  echo "<option value=\"$datakelas[id]\">$datakelas[nama_kelas] - $datakelas[jurusan]</option>\n";
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-6">
                <label>Pilih Sesi</label>
                <select name="sesi" class="form-control" required>
                  <option value="">--pilih---</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>
            </div>
              <!-- /. -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /. -->
              <input type="hidden" name="nisn" value="<?php echo $tmpsiswa['nisn']; ?>">
              <div class="">
                <label>Pilih Mata Pelajaran</label>
                <select name="idpelajaran" class="form-control" required>
                  <option value="">--pilih---</option>
                  <?php
                  $qpelajaran = mysqli_query($connect,"SELECT * FROM m_pelajaran GROUP BY mata_pelajaran ORDER BY id");
                  while($datapelajaran=mysqli_fetch_array($qpelajaran)){
                  echo "<option value=\"$datapelajaran[mata_pelajaran]\">$datapelajaran[mata_pelajaran]</option>\n";
                  }
                  ?>
                </select>
                </div>
              </div>
              <!-- /. -->
            </div>
            <br>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="menu_kuis"><span class="btn btn-primary">Kembali</span></a>
            <button type="submit" class="btn btn-success">MULAI</button>
            </div>
          </form>
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