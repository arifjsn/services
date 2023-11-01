<?php
include "../../model/m_pelayanan.php";

$pelayanan = new Pelayanan($connection);
if (@$_GET['act'] == '') {
?>
  <!-- /.pembatas  -->
  <div class="container-flud">
    <!-- /.mulai Section atas  -->

    <!-- /.akhir section atas  -->

    <!-- /.awal content  -->
    <section class="content">

      <h1 style="text-align: center;">
        <b style="color:#300304">Halaman Transaksi</b>
      </h1>

      <div class="row">
        <div class="col-lg-12">
          <!-- /.button tambah  -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah" style="margin-bottom :5px"><i class="fa fa-plus"></i> Transaksi</button>
          <!-- /.button tambah  -->
          <a class="btn btn-success" href="index.php?halaman=transaksi_selesai" style="margin-bottom :5px">
            <i class="fa fa-check"></i> Data Transaksi Selesai
          </a>
          <a class="btn btn-primary" href="index.php?halaman=data_pelanggan" style="margin-bottom :5px">
            <i class="fa fa-users"></i> Data Pelanggan
          </a>

          <br>
          <br>
          <!-- /.awal table  -->
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <!-- <th>No.</th> -->
                  <th>No Invoice</th>
                  <th>Tanggal Masuk</th>
                  <th>Nama Customer</th>
                  <th>Nama Barang</th>
                  <th>Pemilik</th>
                  <th>SN</th>
                  <th>Keluhan</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <!-- /.php menampilkan data  -->
              <tbody>
                <?php
                $no = 1;
                $tampil = $pelayanan->tampil_transaksi();
                while ($data = $tampil->fetch_object()) {
                  $getcustomer = $pelayanan->nama_customer($data->nama_customer);
                  $namaCustomer = "";
                  foreach ($getcustomer as $getcustomers) {
                    $namaCustomer = $getcustomers['nama'];
                  }
                ?>

                  <tr>
                    <!-- <td><?= $no++; ?></td> -->
                    <td>
                      <a href="?halaman=detail&invoice=<?= $data->invoice; ?>">
                        <?= $data->invoice; ?>
                      </a>
                    </td>
                    <td><?= date('d-m-Y', strtotime($data->tanggal_masuk)); ?></td>
                    <td><?= $namaCustomer; ?></td>
                    <td><?= $data->nama_barang; ?></td>
                    <td><?= $data->nama_pemilik; ?></td>
                    <td><?= $data->serial_number; ?></td>
                    <td><?= $data->keluhan; ?></td>
                    <td>
                      <a id="update_transaksi" data-toggle="modal" data-target="#update" data-invoice="<?= $data->invoice; ?>" data-keterangan="<?= $data->keterangan; ?>">
                        <?= $data->keterangan; ?></i>
                      </a>
                    </td>
                    <td>
                      <a id="update_transaksi" data-toggle="modal" data-target="#update" data-invoice="<?= $data->invoice; ?>" data-status="<?= $data->status; ?>">
                        <?= $data->status; ?></i>
                      </a>
                    </td>
                    <td>
                      <!-- /.tombol edit data  -->
                      <a class="btn btn-default btn-xs" href="../../report/cetak_invoice.php?invoice=<?= $data->invoice; ?>" target="_blank">
                        <i class="fa fa-print"></i>
                      </a>
                      <a class="btn btn-success btn-xs" id="kirim_barang" data-toggle="modal" data-target="#kirim" data-invoice="<?= $data->invoice; ?>" data-nama_pengirim="<?= $data->nama_pengirim; ?>"><i class="fa fa-paper-plane"></i>
                      </a>
                      <!-- /.tombol edit data  -->
                      </a>
                    </td>
                  </tr>

                <?php } ?>
              </tbody>

              <!-- /.php menampilkan data  -->
            </table>
          </div>

          <?php
          include '.modal_update.php';
          include '.modal_tambah.php';
          include '.modal_cetak.php';
          include '.modal_kirim.php';
          include '.modal_edit.php';

          ?>

        </div>
      </div>

      <!-- /.akhir table  -->

    </section>
    <!-- /. akhir untuk section  -->
  </div>
<?php
} else if (@$_GET['act'] == 'del') {
  $pelayanan->hapus_transaksi($_GET['invoice']);
  header("location: ?halaman=transaksi");
}
