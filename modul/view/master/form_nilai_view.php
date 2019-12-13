<section class="content-header">
      <h1>
        Dashboard
        <small>Form Nilai</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="beranda"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Nilai</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <?php
        if($_GET['id']){
          $query=mysqli_query($connect, "SELECT * FROM m_nilai WHERE id='$_GET[id]'");
          $data=mysqli_fetch_array($query);
          $qpelajaran = mysqli_query($connect, "SELECT * FROM m_pelajaran WHERE id = '$data[id_pelajaran]'");
          $tmpilpeljaran = mysqli_fetch_array($qpelajaran);
         $queryss = mysqli_query($connect, "SELECT * FROM m_kelas WHERE id='$tmpilpeljaran[id_kelas]'");
         $tampilkelas = mysqli_fetch_array($queryss);
        
         ?>
      <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">FORM NILAI</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="../fungsi/edit_nilai" method="post" data-parsley-validate>
            <div class="col-md-6">
              <div class="form-group">
                
                <label>Mata Pelajaran</label>
                <select name="id_pelajaran" class="form-control" required>
                  <option value="<?php echo $tmpilpeljaran['id']; ?>"><?php echo $tmpilpeljaran['mata_pelajaran'],'-', $tampilkelas['nama_kelas'],'-',$tampilkelas['jurusan']; ?></option>
                   <?php
                  $qpelajaran = mysqli_query($connect,"SELECT * FROM m_pelajaran ORDER BY id");
                  while($datapelajaran=mysqli_fetch_array($qpelajaran)){
                    $queryss = mysqli_query($connect, "SELECT * FROM m_kelas WHERE id='$datapelajaran[id_kelas]'");
                    $tampilkelas = mysqli_fetch_array($queryss);
                  echo "<option value=\"$datapelajaran[id]\">$datapelajaran[mata_pelajaran] - $tampilkelas[nama_kelas] - $tampilkelas[jurusan]</option>\n";
                  }
                  ?>
                </select>
                <input type="hidden" name="Id" value="<?php echo $data['id']; ?>" class="form-control" placeholder="Mata Pelajaran" required>
                
                <label>Nilai</label>
                <input type="text" name="nilai" value="<?php echo $data['nilai']; ?>" class="form-control" placeholder="Nilai" required>
                 
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket" value="<?php echo $data['ket']; ?>" class="form-control" placeholder="Keterangan" required>
                </div>
              </div>
            
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="table_nilai"><span class="btn btn-primary">Kembali</span></a>
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
          <h3 class="box-title">FORM NILAI</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="../fungsi/save_nilai" method="post" data-parsley-validate>
            <div class="col-md-6">
              <div class="form-group">
                <label>Mata Pelajaran</label>
                <select name="id_pelajaran" class="form-control" required>
                  <option value="">--pilih---</option>
                  <?php
                  $qpelajaran = mysqli_query($connect,"SELECT * FROM m_pelajaran ORDER BY id");
                  while($datapelajaran=mysqli_fetch_array($qpelajaran)){
                    $queryss = mysqli_query($connect, "SELECT * FROM m_kelas WHERE id='$datapelajaran[id_kelas]'");
                    $tampilkelas = mysqli_fetch_array($queryss);
                  echo "<option value=\"$datapelajaran[id]\">$datapelajaran[mata_pelajaran] - $tampilkelas[nama_kelas] - $tampilkelas[jurusan]</option>\n";
                  }
                  ?>
                </select>
                
                <label>Nilai</label>
                <input type="text" name="nilai" class="form-control" placeholder="nilai" required>
                <input type="hidden" name="Id" class="form-control" value="<?php echo $hasil_2; ?>" placeholder="Nilai" required>

              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="ket" id="ket" class="form-control" placeholder="Keterangan" required>
                
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="table_nilai"><span class="btn btn-primary">Kembali</span></a>
            <button class="btn btntn-primary" type="reset">Batal</button>
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