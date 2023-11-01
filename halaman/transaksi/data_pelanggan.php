<?php
include "../../model/m_pelanggan.php";

$pelanggan = new Pelanggan($connection);
if (@$_GET['act'] == '') {
?>
  <!-- /.pembatas  -->
  <div class="container-flud">

    <!-- /.awal content  -->
    <section class="content">

      <h1 style="text-align: center;">
        <b style="color:#300304">Halaman Data Pelanggan </b>
      </h1>

      <div class="row">
        <div class="col-lg-12">
          <!-- /.button tambah  -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah" style="margin-bottom :5px"><i class="fa fa-plus"></i> Tambah Pelanggan</button>
          <!-- /.button tambah  -->
          <a class="btn btn-primary" href="index.php" style="margin-bottom :5px">
            Data Transaksi
          </a>

          <br>
          <br>
          <!-- /.awal table  -->
          <div class="table-responsive">
            <table id="data_pelanggan" class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>No.Identitas</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Pilihan</th>
                </tr>
              </thead>
              <!-- /.php menampilkan data  -->
              <tbody>
                <?php
                $tampil = $pelanggan->tampil();
                while ($data = $tampil->fetch_object()) {
                ?>
                  <tr>
                    <td><?= $data->no_identitas; ?></td>
                    <td><?= $data->nama; ?></td>
                    <td><?= $data->username; ?></td>
                    <td>
                      <a class="btn btn-success btn-xs" href="?halaman=riwayat&no_identitas=<?= $data->no_identitas; ?>">Cek Riwayat
                      </a>
                      <!-- /.tombol edit data  -->
                      <a class="btn btn-warning btn-xs" id="edit_pelanggan" data-toggle="modal" data-target="#edit" data-no_identitas="<?= $data->no_identitas; ?>" data-nama="<?= $data->nama ?>" data-username="<?= $data->username ?>" data-password="<?= $data->password ?>" data-alamat="<?= $data->alamat ?>" data-no_hp="<?= $data->no_hp ?>">Edit
                      </a>
                      <!-- /.tombol edit data  -->
                      <a class="btn btn-danger btn-xs" href="?halaman=data_pelanggan&act=del&no_identitas=<?= $data->no_identitas; ?>" onclick="return confirm('Apakah anda yakin ?')">
                        Hapus
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>

              <!-- /.php menampilkan data  -->
            </table>
          </div>
          <?php
          include '.modal_tambah_pelanggan.php';
          include '.modal_edit_pelanggan.php';
          ?>
        </div>
      </div>

      <!-- /.akhir table  -->

    </section>
    <!-- /. akhir untuk section  -->
  </div>
<?php
} else if (@$_GET['act'] == 'del') {
  $pelanggan->hapus($_GET['no_identitas']);
  header("location: ?halaman=data_pelanggan");
}
