<?php
ob_start();
session_start();
if (@$_SESSION['admin']) {
  require_once('../../koneksi/+koneksi.php');
  require_once('../../model/database.php');
  $login = $_SESSION['nama'];
  $connection = new Database($host, $user, $pass, $database);

?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jasanet Services</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="cache-control" content="no-cache">

    <link rel="stylesheet" href="<?= $base_url ?>/tampilan/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>/tampilan/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>/tampilan/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>/tampilan/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>/tampilan/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= $base_url ?>/tampilan/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header bg-blue">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="index.php?halaman=indexadmin" class="navbar-brand"></i> <b>Home</b></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="<?= $base_url ?>/login/logout.php"><i class="fa fa-sign-out"></i><b>Keluar</b></a></li>
              </ul>
            </div>
            <!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <script src="<?= $base_url ?>/tampilan/bower_components/jquery/dist/jquery.min.js"></script>
      <div class="content-wrapper">
        <?php
        if (@$_GET['halaman'] == 'admin') {
          include "admin.php";
        } else if (@$_GET['halaman'] == 'admin_edit') {
          include "admin_edit.php";
        } else if (@$_GET['halaman'] == 'staff') {
          include "staff.php";
        } else if (@$_GET['halaman'] == 'staff_edit') {
          include "staff_edit.php";
        } else if (@$_GET['halaman'] == 'laporan') {
          include "laporan.php";
        } else if (@$_GET['halaman'] == 'tampilan') {
          include "tampilan.php";
        } else if (@$_GET['halaman'] == 'edit_gambar') {
          include "edit_gambar.php";
        } else if (@$_GET['halaman'] == 'daftar') {
          include "daftar.php";
        } else {
          include "indexadmin.php";
        }
        ?>
      </div>

      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Jasanet Services</b>
          </div>
          <strong>Sistem Informasi Pelayanan Servis Komputer Berbasis QR Code</a>.</strong>
        </div>
        <!-- /.container -->
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- Bootstrap 3.3.7 -->
    <script src="<?= $base_url ?>/tampilan/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= $base_url ?>/tampilan/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- DataTables -->
    <script src="<?= $base_url ?>/tampilan/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= $base_url ?>/tampilan/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?= $base_url ?>/tampilan/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= $base_url ?>/tampilan/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= $base_url ?>/tampilan/dist/js/demo.js"></script>
    <script>
      $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging': true,
          'lengthChange': false,
          'searching': false,
          'ordering': true,
          'info': true,
          'autoWidth': false
        })
      })
    </script>
  </body>

  </html>
<?php
} else {
  echo "<script>window.location='<?= $base_url ?>/login';</script>";
}
