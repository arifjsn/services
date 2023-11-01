<?php
session_start();
require_once('../koneksi/+koneksi.php');
require_once('../model/database.php');
include "../model/m_login.php";
$connection = new Database($host, $user, $pass, $database);
$login = new Login($connection);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jasanet Comp | Log in</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta http-equiv="cache-control" content="no-cache">

  <link rel="stylesheet" href="<?= $base_url ?>/tampilan/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $base_url ?>/tampilan/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= $base_url ?>/tampilan/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= $base_url ?>/tampilan/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= $base_url ?>/tampilan/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Silahkan Login</p>

      <form action="" method="post">
        <div class="form-group has-feedback">
          <input name="username" type="text" class="form-control" placeholder="Username">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <!-- <div class="form-group has-feedback">
          <select name="level" class="form-control" required>
            <option value="admin">Admin</option>
            <option value="staff">Staff</option>
          </select>
        </div> -->

        <div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" value="admin" name="level" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              Admin
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" value="staff" name="level" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
              Staff
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" value="pelanggan" name="level" id="flexRadioDefault3">
            <label class="form-check-label" for="flexRadioDefault3">
              Pelanggan
            </label>
          </div>
        </div>

        <div class="row justify-content-center">
          <!-- /.col -->
          <div class="col-xs-4" align="center">
            <button type="submit" name="login" value="login" class="btn btn-block btn-flat" style="background: #300104;color:#fff;">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php
      if (@$_POST['login']) {
        $username = $connection->conn->real_escape_string($_POST['username']);
        $password = $connection->conn->real_escape_string($_POST['password']);
        $level = $connection->conn->real_escape_string($_POST['level']);

        if ($level == 'admin') {
          $tampil = $login->admin($username, $password);
          $data = $tampil->fetch_array();
          if (isset($data)) {
          } else {
            echo "<script>alert('Password atau Username Salah');</script>";
            die;
          }
          $_SESSION['nama'] = $data['nama'];
          $id = $data[0];
          $cek = mysqli_num_rows($tampil);
          if ($cek > 0) {
            $_SESSION['admin'] = $id;
            echo "<script>window.location='../halaman/admin';</script>";
          } else {
            echo "<script>alert('Password atau Username Salah;');</script>";
          }
        } else if ($level == 'staff') {
          $tampil = $login->staff($username, $password);
          $data = $tampil->fetch_array();
          if (isset($data)) {
          } else {
            echo "<script>alert('Password atau Username Salah');</script>";
            die;
          }
          $_SESSION['nama'] = $data['nama'];
          $id = $data[0];
          $cek = mysqli_num_rows($tampil);
          if ($cek > 0) {
            $_SESSION['staff'] = $id;
            echo "<script>window.location='../halaman/transaksi';</script>";
          } else {
            echo "<script>alert('Password atau Username Salah;');</script>";
          }
        } else if ($level == 'pelanggan') {
          $tampil = $login->pelanggan($username, $password);
          $data = $tampil->fetch_array();
          if (isset($data)) {
          } else {
            echo "<script>alert('Password atau Username Salah');</script>";
            die;
          }
          $_SESSION['nama'] = $data['nama'];
          $_SESSION['no_identitas'] = $data['no_identitas'];
          $id = $data[0];
          $cek = mysqli_num_rows($tampil);
          if ($cek > 0) {
            $_SESSION['pelanggan'] = $id;
            echo "<script>window.location='../halaman/customer';</script>";
          } else {
            echo "<script>alert('Password atau Username Salah;');</script>";
          }
        }
      }

      ?>

      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <script src="<?= $base_url ?>/tampilan/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?= $base_url ?>/tampilan/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= $base_url ?>/tampilan/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
</body>

</html>