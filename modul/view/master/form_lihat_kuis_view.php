<section class="content-header">
      <h1>
        MENU KUIS
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="beranda"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form kuis</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <?php
        if($_GET['id']){
          $query=mysqli_query($connect, "SELECT * FROM kuis WHERE id_kuis='$_GET[id]'");
          $data=mysqli_fetch_array($query);
          $qusiswa = mysqli_query($connect, "SELECT * FROM m_siswa WHERE nisn = '$data[nisn]'");
          $tmpilsiswa = mysqli_fetch_array($qusiswa);
          $qukelas = mysqli_query($connect, "SELECT * FROM m_kelas WHERE id = '$tmpilsiswa[id_kelas]'");
          $tmpilkelas = mysqli_fetch_array($qukelas);
         ?>
      <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">FORM KUIS</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="../fungsi/edit_pelajaran" method="post" data-parsley-validate>
            <div class="col-md-6">
              <div class="form-group">
                <label>Mata Pelajaran</label>
                <input type="text" name="mata_pelajaran" value="<?php echo $data['id_pelajaran']; ?>" class="form-control" readonly>
                <label>NIS Siswa</label>
                <input type="text" name="a" class="form-control" value="<?php echo $data['nisn']; ?>" placeholder="Jawaban A" readonly>
                <label>Nama Siswa</label>
                <input type="text" name="b" class="form-control" value="<?php echo $tmpilsiswa['nm_siswa']; ?>" placeholder="Jawaban B" readonly>
                <label>Hasil Kuis</label>
                <input type="text" name="b" class="form-control" value="<?php echo $data['hasil']; ?>" placeholder="Jawaban B" readonly>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="jawaban" value="<?php echo $tmpilkelas['nama_kelas']; ?>" class="form-control" readonly>
                <label>Jurusan</label>
                <input type="text" name="jawaban" value="<?php echo $tmpilkelas['jurusan']; ?>" class="form-control" readonly>
                <label>Nilai Kuis</label>
                <input type="text" name="c" class="form-control" value="<?php echo $data['nilai']; ?>" readonly>
                <label>Tanggal Kuis</label>
                <input type="text" name="d" class="form-control" value="<?php echo $data['tanggal']; ?>" readonly>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="menu_kuis"><span class="btn btn-primary">Kembali</span></a>
            </div>
          </form>
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.box -->
    </div>
    <?php } ?>
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row (main row) -->

    </section>