<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php if($_SESSION['level'] == 'admin') { ?>
        <ul class="sidebar-menu" data-widget="tree">
        <li class="active">
          <a href="beranda">
            <i class="fa fa-home"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="table_siswa"><i class="fa fa-circle-o"></i> Master Siswa</a></li>
            <li><a href="table_guru"><i class="fa fa-circle-o"></i> Master Guru</a></li>
            <li class=""><a href="table_kelas"><i class="fa fa-circle-o"></i> Master Kelas</a></li>
            <li><a href="table_pelajaran"><i class="fa fa-circle-o"></i> Master Pelajaran</a></li>
            <li><a href="table_materi"><i class="fa fa-circle-o"></i> Materi</a></li>
            <li class=""><a href="table_nilai"><i class="fa fa-circle-o"></i> Master Nilai</a></li>
            <li><a href="table_user"><i class="fa fa-circle-o"></i> Master User</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Menu Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="materi_pelajaran"><i class="fa fa-circle-o"></i>Materi Pelajaran</a></li>
            <li><a href="menu_kuis"><i class="fa fa-circle-o"></i>Kuis</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder-open"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="hasil_kuis"><i class="fa fa-circle-o"></i>laporan Nilai Siswa aja</a></li>
          </ul>
        </li>
      </ul>
      <?php } ?>
      <?php if($_SESSION['level'] == 'siswa') { ?>
        <ul class="sidebar-menu" data-widget="tree">
        <li class="active">
          <a href="beranda">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder-open"></i> <span>Menu Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="materi_pelajaran"><i class="fa fa-circle-o"></i>Materi Pelajaran</a></li>
            <li><a href="menu_kuis"><i class="fa fa-circle-o"></i>Kuis</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder-open"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="hasil_kuis"><i class="fa fa-circle-o"></i>laporan Nilai Siswa aja</a></li>
          </ul>
        </li>
      </ul>
      <?php } ?>
      <?php if($_SESSION['level'] == 'guru') { ?>
        <ul class="sidebar-menu" data-widget="tree">
        <li class="active">
          <a href="beranda">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder-open"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="table_siswa"><i class="fa fa-circle-o"></i> Master Siswa</a></li>
            <li><a href="table_pelajaran"><i class="fa fa-circle-o"></i> Master Pelajaran</a></li>
            <li><a href="table_materi"><i class="fa fa-circle-o"></i> Materi</a></li>
            <li class=""><a href="table_nilai"><i class="fa fa-circle-o"></i> Master Nilai</a></li>
            <li class=""><a href="grid_jadwal_kuis"><i class="fa fa-circle-o"></i> Jadwal Kuis</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder-open"></i> <span>Menu Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="materi_pelajaran"><i class="fa fa-circle-o"></i>Materi Pelajaran</a></li>
            <li><a href="menu_kuis"><i class="fa fa-circle-o"></i>Kuis</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder-open"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="hasil_kuis"><i class="fa fa-circle-o"></i>laporan Nilai Siswa aja</a></li>
          </ul>
        </li>
      </ul>
      <?php } ?>
    </section>
    <!-- /.sidebar -->
  </aside>
