  <header class="main-header">
    <!-- Logo -->
    <?php 
    $iduser = $_SESSION['id'];
    $querisiswa = mysqli_query($connect, "SELECT * FROM m_siswa WHERE id_user = '$iduser'");
    $tmpsiswa = mysqli_fetch_array($querisiswa);
    $idsiswa = $tmpsiswa['id'];
    $queriguru = mysqli_query($connect, "SELECT * FROM m_guru WHERE id_user = '$iduser'");
    $tmpguru = mysqli_fetch_array($queriguru);
    $idguru = $tmpguru['id'];
     ?>
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../../images/logo.jpg" style="width: 50px; height: 50px;"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">e<b>Learning</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?php if($_SESSION['level'] == 'siswa') { ?>
                  <a href="form_siswa?idlihat=<?php echo $idsiswa;?>" class="btn btn-default btn-flat">Profile</a>
                <?php } else { ?>
                  <a href="form_guru?idlihat=<?php echo $idguru;?>" class="btn btn-default btn-flat">Profile</a>
                <?php } ?>
                </div>
                <div class="pull-right">
                  <a href="../../fungsi/authout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->