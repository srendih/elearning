<section class="content-header">
      <h1>
        Dashboard
        <small>Form Kelas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="beranda"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Kelas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <?php
        if($_GET['id']){
          $query=mysqli_query($connect, "SELECT * FROM m_kelas WHERE id='$_GET[id]'");
          $data=mysqli_fetch_array($query);
         ?>
      <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">FORM KELAS</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="../fungsi/edit_kelas" method="post" data-parsley-validate>
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Kelas</label>
                <input type="text" name="nm_kelas" value="<?php echo $data['nama_kelas']; ?>" class="form-control" placeholder="Nama Kelas" required>
                <input type="hidden" name="Id" value="<?php echo $data['id']; ?>" class="form-control" placeholder="Nama Kelas" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Nama Jurusan</label>
                <input type="text" name="jurusan" value="<?php echo $data['jurusan']; ?>" class="form-control" placeholder="Nama Jurusan" required>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="table_kelas"><span class="btn btn-primary">Kembali</span></a>
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
          <h3 class="box-title">FORM KELAS</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form action="../fungsi/save_kelas" method="post" data-parsley-validate>
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Kelas</label>
                <input type="text" name="nm_kelas" id="nm_kelas" class="form-control" placeholder="Nama Kelas" required>
                <input type="hidden" name="Id" id="Id" class="form-control" value="<?php echo $hasil_2; ?>" placeholder="Nama Kelas" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
                <label>Nama Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Nama Jurusan" required>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="table_kelas"><span class="btn btn-primary">Kembali</span></a>
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