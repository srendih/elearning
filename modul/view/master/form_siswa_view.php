<section class="content-header">
      <h1>
        Dashboard
        <small>Form Siswa</small>
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="beranda"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <?php
        if($_GET['id']){
          $query=mysqli_query($connect, "SELECT * FROM m_siswa WHERE id='$_GET[id]'");
          $data=mysqli_fetch_array($query);
          $qkelas = mysqli_query($connect, "SELECT * FROM m_kelas WHERE id = '$data[id_kelas]'");
          $tmpilkelas = mysqli_fetch_array($qkelas);
          $quser = mysqli_query($connect, "SELECT * FROM user WHERE id= '$data[id_user]'");
          $tmpiluser =mysqli_fetch_array($quser);
         ?>
      <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">FORM SISWA</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="../fungsi/edit_siswa" method="post" data-parsley-validate>
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" name="nm_siswa" value="<?php echo $data['nm_siswa']; ?>" class="form-control" placeholder="Nama Siswa" required>
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>" class="form-control" placeholder="Nama Siswa" required>
              
                  <label>Jenis Kelamin</label>
                  <select name='jenkel' class="form-control" required="">
                    <option value="<?php echo $data['jenkel']; ?>"><?php echo $data['jenkel']; ?></option>
                    <option>Laki-Laki</option>
                    <option>Perempuan</option>
                  </select>
                  
                <label>NISN</label>
                <input type="text" name="nisn" value="<?php echo $data['nisn']; ?>" class="form-control" placeholder="NISN" required>

                <label>Nama Kelas</label>
                <select name="id_kelas" class="form-control" required="">
                  <option value="<?php echo $tmpilkelas['id']; ?>"><?php echo $tmpilkelas['nama_kelas']; ?></option>
                  <?php
                  $qkelas = mysqli_query($connect, "SELECT * FROM m_kelas ORDER BY id");
                  while ($datakelas = mysqli_fetch_array($qkelas)) {
                    echo "<option value=\"$datakelas[id]\"> $datakelas[nama_kelas] - $datakelas[jurusan]</option>\n";
                  }

                   ?>
                </select>

              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" class="form-control" placeholder="Tempat Lahir" required>

                <label>Tanggal Lahir</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name='tgl_lahir' value="<?php echo $data['tgl_lahir']; ?>" class="form-control pull-right" id="datepicker" placaholder='Tanggal Lahir' required>
                </div>
              
                <label>Nama User</label>
                <select name="id_user" class="form-control" required="">
                  <option value="<?php echo $tmpiluser['id']; ?>"><?php echo $tmpiluser['username']; ?></option>
                  <?php
                  $quser = mysqli_query($connect, "SELECT * FROM user ORDER BY id");
                  while ($datauser = mysqli_fetch_array($quser)) {
                    echo "<option value=\"$datauser[id]\"> $datauser[username]</option>\n";
                  }

                   ?>
                </select>
                </div>
              </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="table_siswa"><span class="btn btn-primary">Kembali</span></a>
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
  <?php }
        elseif($_GET['idlihat']){
          $query=mysqli_query($connect, "SELECT * FROM m_siswa WHERE id='$_GET[idlihat]'");
          $data=mysqli_fetch_array($query);
          $qkelas = mysqli_query($connect, "SELECT * FROM m_kelas WHERE id = '$data[id_kelas]'");
          $tmpilkelas = mysqli_fetch_array($qkelas);
          $quser = mysqli_query($connect, "SELECT * FROM user WHERE id= '$data[id_user]'");
          $tmpiluser =mysqli_fetch_array($quser);
         ?>
      <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">FORM SISWA</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="../fungsi/edit_siswa" method="post" data-parsley-validate>
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" name="nm_siswa" value="<?php echo $data['nm_siswa']; ?>" class="form-control" placeholder="Nama Siswa" readonly>
                  <label>Jenis Kelamin</label>
                <input type="text" name="nisn" value="<?php echo $data['jenkel']; ?>" class="form-control" placeholder="NISN" readonly>
                <label>NISN</label>
                <input type="text" name="nisn" value="<?php echo $data['nisn']; ?>" class="form-control" placeholder="NISN" readonly>

                <label>Nama Kelas</label>
                <input type="text" name="nisn" value="<?php echo $tmpilkelas['nama_kelas']; ?>" class="form-control" placeholder="NISN" readonly>

              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" class="form-control" readonly>

                <label>Tanggal Lahir</label>
                  <input type="text" name='tgl_lahir' value="<?php echo $data['tgl_lahir']; ?>" class="form-control pull-right" readonly>
                </div>
              
                <label>Nama User</label>
                  <input type="text" name='nm_user' value="<?php echo $tmpiluser['username']; ?>" class="form-control pull-right" readonly>
                </div>
              </div>
            <div class="pull-right">
            <a href="beranda"><span class="btn btn-primary">Kembali</span></a>
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
          <h3 class="box-title">FORM SISWA</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="../fungsi/save_siswa" method="post" data-parsley-validate>
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" name="nm_siswa" class="form-control" placeholder="Nama Siswa" required>
                <input type="hidden" name="Id" class="form-control" value="<?php echo $hasil_2; ?>" placeholder="Nama Siswa" required>

                <label>Jenis Kelamin</label>
                  <select name='jenkel' class="form-control" required="">
                    <option value="">--pilih---</option>
                    <option>Laki-Laki</option>
                    <option>Perempuan</option>
                  </select>

                <label>NISN</label>
                <input type="text" name="nisn" value="<?php echo $data['nisn']; ?>" class="form-control" placeholder="NISN" required>

                <label>Nama Kelas</label>
                <select name="id_kelas" class="form-control" required="">
                  <option value="">--pilih--</option>
                  <?php
                  $qkelas = mysqli_query($connect, "SELECT * FROM m_kelas ORDER BY id");
                  while ($datakelas = mysqli_fetch_array($qkelas)) {
                    echo "<option value=\"$datakelas[id]\"> $datakelas[nama_kelas] - $datakelas[jurusan]</option>\n";
                  }

                   ?>
                </select>                
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->

                <div class="col-md-6">
              <!-- /.form-group -->

              <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" class="form-control" placeholder="Tempat Lahir" required>

                <label>Tanggal Lahir</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal" required>
                  
                </div>
              
                <label>Nama User</label>
                <select name="id_user" class="form-control" required="">
                  <option value="">--pilih--</option>
                  <?php
                  $quser = mysqli_query($connect, "SELECT * FROM user ORDER BY id");
                  while ($datauser = mysqli_fetch_array($quser)) {
                    echo "<option value=\"$datauser[id]\"> $datauser[username]</option>\n";
                  }

                   ?>
                </select>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="table_siswa"><span class="btn btn-primary">Kembali</span></a>
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