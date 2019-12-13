<section class="content-header">
      <h1>
        Dashboard
        <small>Form Pelajaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="beranda"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Pelajaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <?php
        if($_GET['id']){
          $query=mysqli_query($connect, "SELECT * FROM m_pelajaran WHERE id='$_GET[id]'");
          $data=mysqli_fetch_array($query);
          $querkelas = mysqli_query($connect, "SELECT * FROM m_kelas WHERE id='$data[id_kelas]'");
          $tampilkelas = mysqli_fetch_array($querkelas);
         ?>
      <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">FORM Pelajaran</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="../fungsi/edit_pelajaran" method="post" data-parsley-validate>
            <div class="col-md-6">
              <div class="form-group">
                <label>Mata Pelajaran</label>
                <input type="text" name="mata_pelajaran" value="<?php echo $data['mata_pelajaran']; ?>" class="form-control" placeholder="Nama Kelas" required>
                <input type="hidden" name="Id" class="form-control" value="<?php echo $data['id']; ?>" placeholder="Nama Kelas" required>
                <label>Kelas</label>
                <select name="kelas" class="form-control">
                <option value="<?php echo $tampilkelas['id']; ?>"><?php echo $tampilkelas['nama_kelas'],'-',$tampilkelas['jurusan']; ?></option>
                <?php
                $queri = mysqli_query($connect,"SELECT * FROM m_kelas ORDER BY id");
                while($row=mysqli_fetch_array($queri)){
                echo '<option value="' . $row['id'] . '">' . $row['nama_kelas'],'-',$row['jurusan']. '</option>'; 
               } ?>
              </select>   
              <label>Jawaban A</label>
                <input type="text" name="a" class="form-control" value="<?php echo $data['a']; ?>" placeholder="Jawaban A" required>
                <label>Jawaban B</label>
                <input type="text" name="b" class="form-control" value="<?php echo $data['b']; ?>" placeholder="Jawaban B" required>
              </div>
              <label>Sesi Pelajaran</label>
                <select class="form-control" name="sesi" required="">
                  <option value="<?php echo $data['sesi']; ?>"><?php echo $data['sesi']; ?></option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Soal Materi</label>
                <textarea name="materi" class="form-control" placeholder="Materi" required><?php echo $data['materi']; ?></textarea>
                <label>Jawaban</label>
                <input type="text" name="jawaban" value="<?php echo $data['jawaban']; ?>" class="form-control" placeholder="Jawaban" required>
                <label>Jawaban C</label>
                <input type="text" name="c" class="form-control" value="<?php echo $data['c']; ?>" placeholder="Jawaban C" required>
                <label>Jawaban D</label>
                <input type="text" name="d" class="form-control" value="<?php echo $data['d']; ?>" placeholder="Jawaban D" required>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="table_pelajaran"><span class="btn btn-primary">Kembali</span></a>
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
          <h3 class="box-title">FORM Pelajaran</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="../fungsi/save_pelajaran" method="post" data-parsley-validate>
            <div class="col-md-6">
              <div class="form-group">
                <label>Mata Pelajaran</label>
                <input type="text" name="mata_pelajaran" class="form-control" placeholder="Nama Kelas" required>
                <input type="hidden" name="Id" class="form-control" value="<?php echo $hasil_2; ?>" placeholder="Nama Kelas" required>
                <label>Kelas</label>
                <select name="kelas" class="form-control" required="">
                <option value="">--pilih--</option>
                <?php
                $queri = mysqli_query($connect,"SELECT * FROM m_kelas ORDER BY id");
                while($row=mysqli_fetch_array($queri)){
                echo '<option value="' . $row['id'] . '">' . $row['nama_kelas'],'-',$row['jurusan']. '</option>'; 
               } ?>
              </select>  
              <label>Jawaban A</label>
                <input type="text" name="a" class="form-control" placeholder="Jawaban A" required>
                <label>Jawaban B</label>
                <input type="text" name="b" class="form-control" placeholder="Jawaban B" required>
                <label>Sesi Pelajaran</label>
                <select class="form-control" name="sesi" required="">
                  <option value="">--pilih--</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Soal Materi</label>
                <textarea name="materi" class="form-control" placeholder="Materi" required></textarea>
                <label>Jawaban</label>
                <input type="text" name="jawaban" class="form-control" placeholder="Jawaban" required>
                <label>Jawaban C</label>
                <input type="text" name="c" class="form-control" placeholder="Jawaban C" required>
                <label>Jawaban D</label>
                <input type="text" name="d" class="form-control" placeholder="Jawaban D" required>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="table_pelajaran"><span class="btn btn-primary">Kembali</span></a>
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