<?php
session_start();
if (@$_SESSION['staff']) {
  require_once('../../koneksi/+koneksi.php');
  require_once('../../model/database.php');
  $login = $_SESSION['nama'];
  $connection = new Database($host, $user, $pass, $database);
  date_default_timezone_set("ASIA/JAKARTA");
?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jasanet Comp | Pelayanan Servis</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="cache-control" content="no-cache">

    <!-- Favicons -->
    <link href="https://jasanet-online.com/assets/img/logo2.png" rel="icon">
    <link href="https://jasanet-online.com/assets/img/logo2.png" rel="apple-touch-icon">

    <link rel="stylesheet" href="../../tampilan/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../tampilan/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../tampilan/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../tampilan/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../tampilan/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../tampilan/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

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

  <body class="hold-transition skin layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="#" class="navbar-brand d-flex align-items-center"><img src="https://jasanet-online.com/assets/img/logo2.png" alt="logo" width="50"></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars" style="color: #300304;"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="../../login/logout.php" style="color: #300304;"><b><i class="fa fa-sign-out" style="color: #300304;"></i>Keluar</a></li> </b>
              </ul>
            </div>
            <!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <!-- jQuery 3 -->
      <script src="../../tampilan/bower_components/jquery/dist/jquery.min.js"></script>
      <div class="content-wrapper">
        <?php
        if (@$_GET['halaman'] == 'admin') {
          include "admin.php";
        } else if (@$_GET['halaman'] == 'kirim') {
          include ".modal_kirim.php";
        } else if (@$_GET['halaman'] == 'detail') {
          include "detail.php";
        } else if (@$_GET['halaman'] == 'transaksi_selesai') {
          include "transaksi_selesai.php";
        } else if (@$_GET['halaman'] == 'detail_selesai') {
          include "detail_selesai.php";
        } else if (@$_GET['halaman'] == 'data_pelanggan') {
          include "data_pelanggan.php";
        } else if (@$_GET['halaman'] == 'riwayat') {
          include "riwayat.php";
        } else {
          include "transaksi.php";
        }
        ?>
      </div>

      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Jasanet Comp</b>
          </div>
          <strong>Sistem Informasi Pelayanan Servis Komputer Berbasis QR Code</a>.</strong>
        </div>
        <!-- /.container -->
      </footer>
    </div>
    <!-- ./wrapper -->


    <script src="<?= $base_url ?>/tampilan/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= $base_url ?>/tampilan/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= $base_url ?>/tampilan/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= $base_url ?>/tampilan/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= $base_url ?>/tampilan/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?= $base_url ?>/tampilan/dist/js/adminlte.min.js"></script>
    <script src="<?= $base_url ?>/tampilan/dist/js/demo.js"></script>
    <script>
      $(function() {
        $('#example1').DataTable({
          'order': [
            [0, 'desc']
          ]
        })
        $('#data_pelanggan').DataTable({
          'order': [
            [0, 'asc']
          ]
        })
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
  echo "<script>window.location='../../login';</script>";
}
