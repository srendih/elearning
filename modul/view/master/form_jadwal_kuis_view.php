<section class="content-header">
      <h1>
        Dashboard
        <small>Form Jadwal Kuis</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="beranda"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Jadwal Kuis</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <?php
        if($_GET['id']){
          $query=mysqli_query($connect, "SELECT * FROM materi WHERE id='$_GET[id]'");
          $data=mysqli_fetch_array($query);
          $qkelas = mysqli_query($connect, "SELECT * FROM m_kelas WHERE id = '$data[id_kelas]'");
          $tmpilkelas = mysqli_fetch_array($qkelas);
          $fload=($_FILES['FileUpLoad']['name']);
         ?>
      <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">FORM JADWAL KUIS</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="../fungsi/edit_materi" method="post" enctype="multipart/form-data">

            <div class="col-md-6">
              <div class="form-group">
                <label>Mata Pelajaran</label>
                <input type="text" name="mata_pelajaran" value="<?php echo $data['mata_pelajaran']; ?>" class="form-control" placeholder="Mata Pelajaran" required>
                <label>Kelas</label>
                <select name="kelas" class="form-control" required>
                <option value="<?php echo $data['id_kelas']; ?>"><?php echo $tmpilkelas['nama_kelas'],'-', $tmpilkelas['jurusan']; ?></option>
                 <?php
                $queri = mysqli_query($connect,"SELECT * FROM m_kelas ORDER BY id");
                while($row=mysqli_fetch_array($queri)){
                echo '<option value="' . $row['id'] . '">' . $row['nama_kelas'],'-',$row['jurusan']. '</option>'; 
               } ?>
                </select>
                <input type="hidden" name="Id" id="Id" class="form-control" value="<?php echo $data['id']; ?>" placeholder="Nama Kelas" required>
                <input type="hidden" name="session" value="<?php echo $data['id_guru']; ?>">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
                <label>File Materi</label> <br>
                <input type="checkbox" name="ubah_file" class="" value="true"> Ceklis jika ingin mengubah file<br>
                <input type="file" name="file" class="form-control" placeholder="Materi File">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="table_materi"><span class="btn btn-primary">Kembali</span></a>
            <button class="btn btn-primary" type="reset">Batal</button>
            <button type="submit" class="btn btn-success">SIMPAN</button>
            </div>
          </form>
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.box -->
    </div>
    <?php
  } else {
     ?>
     <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">FORM JADWAL KUIS</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="../fungsi/save_jadwal" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
              <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="tgl_mulai" class="form-control" required="">
                <label>Waktu Mulai</label>
                <input type="time" name="waktu_mulai" class="form-control" placeholder="Waktu Mulai" required="">
                <input type="hidden" name="Id" id="Id" class="form-control" value="<?php echo $hasil_2; ?>" placeholder="Nama Kelas" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Tanggal Akhir</label>
                <input type="date" name="tgl_akhir" class="form-control" required>
                <label>Waktu Akhir</label>
                <input type="time" name="waktu_akhir" class="form-control" placeholder="Waktu Akhir" required>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="grid_jadwal_kuis"><span class="btn btn-primary">Kembali</span></a>
            <button class="btn btn-primary" type="reset">Batal</button>
            <button type="submit" class="btn btn-success">SIMPAN</button>
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