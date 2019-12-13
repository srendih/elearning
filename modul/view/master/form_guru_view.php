<section class="content-header">
      <h1>
        Dashboard
        <small>Form Guru</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="beranda"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Guru</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <?php
        if($_GET['id']){
          $query=mysqli_query($connect, "SELECT * FROM m_guru WHERE id='$_GET[id]'");
          $data=mysqli_fetch_array($query);
          $qpelajaran = mysqli_query($connect, "SELECT * FROM m_pelajaran WHERE id = '$data[id_pelajaran]'");
          $tmpilpeljaran = mysqli_fetch_array($qpelajaran);
          $qkelas = mysqli_query($connect, "SELECT * FROM m_kelas WHERE id = '$tmpilpeljaran[id_kelas]'");
          $tmpilkelas = mysqli_fetch_array($qkelas);
          $quser = mysqli_query($connect, "SELECT * FROM user WHERE id= '$data[id_user]'");
          $tmpiluser =mysqli_fetch_array($quser);
         ?>
      <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">FORM GURU</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="../fungsi/edit_guru" method="post" data-parsley-validate>
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Guru</label>
                <input type="text" name="nm_guru" value="<?php echo $data['nm_guru']; ?>" class="form-control" placeholder="Nama Guru" required>
                <label>Mata Pelajaran</label>
                <select name="id_pelajaran" class="form-control" required>
                  <option value="<?php echo $data['id_pelajaran']; ?>"><?php echo $data['id_pelajaran']; ?></option>
                  <?php
                  $qpelajaran = mysqli_query($connect,"SELECT * FROM m_pelajaran GROUP BY mata_pelajaran ORDER BY id");
                  while($datapelajaran=mysqli_fetch_array($qpelajaran)){
                  echo "<option value=\"$datapelajaran[mata_pelajaran]\">$datapelajaran[mata_pelajaran]</option>\n";
                  }
                  ?>
                </select>
                <input type="hidden" name="Id" class="form-control" value="<?php echo $data['id']; ?>" placeholder="Nama Pelajaran" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
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
                <label>Pilih Kelas</label>
                <select name="kelas" class="form-control" required="">
                  <option value="<?php echo $tmpilkelas['id']; ?>"><?php echo $tmpilkelas['nama_kelas'],'-', $tmpilkelas['jurusan']; ?></option>
                  <?php
                  $qukelas = mysqli_query($connect, "SELECT * FROM m_kelas ORDER BY id");
                  while ($datakelas = mysqli_fetch_array($qukelas)) {
                    echo "<option value=\"$datakelas[id]\"> $datakelas[nama_kelas]- $datakelas[jurusan]</option>\n";
                  }

                   ?>
                </select>
                </div>
              </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="table_guru"><span class="btn btn-primary">Kembali</span></a>
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
          $query=mysqli_query($connect, "SELECT * FROM m_guru WHERE id='$_GET[idlihat]'");
          $data=mysqli_fetch_array($query);
          $qpelajaran = mysqli_query($connect, "SELECT * FROM m_pelajaran WHERE id = '$data[id_pelajaran]'");
          $tmpilpeljaran = mysqli_fetch_array($qpelajaran);
          $qkelas = mysqli_query($connect, "SELECT * FROM m_kelas WHERE id = '$tmpilpeljaran[id_kelas]'");
          $tmpilkelas = mysqli_fetch_array($qkelas);
          $quser = mysqli_query($connect, "SELECT * FROM user WHERE id= '$data[id_user]'");
          $tmpiluser =mysqli_fetch_array($quser);
         ?>
      <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">FORM GURU</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="../fungsi/edit_guru" method="post" data-parsley-validate>
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Guru</label>
                <input type="text" name="nm_guru" value="<?php echo $data['nm_guru']; ?>" class="form-control" placeholder="Nama Guru" readonly>
                <label>Mata Pelajaran</label>
                <input type="text" name="Pelajaran" value="<?php echo $tmpilpeljaran['mata_pelajaran'],'-', $tmpilkelas['nama_kelas'],'-', $tmpilkelas['jurusan']; ?>" class="form-control" readonly>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Nama User</label>
                <input type="text" name="Id" class="form-control" value="<?php echo $tmpiluser['username']; ?>" placeholder="Nama Pelajaran" readonly>
                </div>
              </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
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
          <h3 class="box-title">FORM GURU</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="../fungsi/save_guru" method="post" data-parsley-validate>
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Guru</label>
                <input type="text" name="nm_guru" class="form-control" placeholder="Nama Guru" required>
                <label>Mata Pelajaran</label>
                <select name="id_pelajaran" class="form-control" required>
                  <option value="">--pilih---</option>
                  <?php
                  $qpelajaran = mysqli_query($connect,"SELECT * FROM m_pelajaran GROUP BY mata_pelajaran ORDER BY id");
                  while($datapelajaran=mysqli_fetch_array($qpelajaran)){
                  echo "<option value=\"$datapelajaran[mata_pelajaran]\">$datapelajaran[mata_pelajaran]</option>\n";
                  }
                  ?>
                </select>
                <input type="hidden" name="Id" class="form-control" value="<?php echo $hasil_2; ?>" placeholder="Nama Kelas" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
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
                <label>Pilih Kelas</label>
                <select name="kelas" class="form-control" required="">
                  <option value="">--pilih--</option>
                  <?php
                  $qukelas = mysqli_query($connect, "SELECT * FROM m_kelas ORDER BY id");
                  while ($datakelas = mysqli_fetch_array($qukelas)) {
                    echo "<option value=\"$datakelas[id]\"> $datakelas[nama_kelas]- $datakelas[jurusan]</option>\n";
                  }

                   ?>
                </select>
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="table_guru"><span class="btn btn-primary">Kembali</span></a>
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