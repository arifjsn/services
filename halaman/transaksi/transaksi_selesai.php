<?php
include "../../model/m_transaksi.php";

$transaksi = new Transaksi($connection);
if (@$_GET['act'] == '') {
?>
  <!-- /.pembatas  -->
  <div class="container-flud">
    <!-- /.mulai Section atas  -->

    <!-- /.akhir section atas  -->

    <!-- /.awal content  -->
    <section class="content">

      <h1 align="center">
        <b style="color:#300304">Halaman Transaksi Selesai</b>
      </h1>

      <div class="row">
        <div class="col-lg-12">
          <a class="btn btn-danger btn-xs" href="index.php" style="margin-bottom :5px">
            <i class="fa fa-arrow-left"></i>
          </a>
          <br>
          <br>
          <!-- /.awal table  -->
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>No Invoice</th>
                  <th>Tanggal Masuk</th>
                  <th>Tanggal Keluar</th>
                  <th>Nama Customer</th>
                  <th>Nama Barang</th>
                  <th>Pemilik</th>
                  <th>SN</th>
                  <th>Keluhan</th>
                  <th>Keterangan</th>
                  <th>Nama Pengirim</th>
                  <th>Pilihan</th>
                </tr>
              </thead>
              <!-- /.php menampilkan data  -->
              <tbody>
                <?php
                $no = 1;
                $tampil = $transaksi->tampil_selesai();
                while ($data = $tampil->fetch_object()) {
                  $getcustomer = $transaksi->nama_customer($data->nama_customer);
                  $namaCustomer = "";
                  foreach ($getcustomer as $getcustomers) {
                    $namaCustomer = $getcustomers['nama'];
                  }
                ?>

                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data->invoice; ?>
                      <a class="btn btn-success btn-xs" href="?halaman=detail&invoice=<?= $data->invoice; ?>">
                        Detail
                      </a>
                    </td>
                    <td><?= date('d-m-Y', strtotime($data->tanggal_masuk)); ?></td>
                    <td><?= date('d-m-Y', strtotime($data->tanggal_selesai)); ?></td>
                    <td><?= $namaCustomer; ?></td>
                    <td><?= $data->nama_barang; ?></td>
                    <td><?= $data->nama_pemilik; ?></td>
                    <td><?= $data->serial_number; ?></td>
                    <td><?= $data->keluhan; ?></td>
                    <td><?= $data->keterangan; ?> </td>
                    <td><?= $data->nama_pengirim; ?> </td>
                    <td>
                      <!-- /.tombol edit data  -->
                      <a class="btn btn-default btn-xs" href="../../report/cetak_invoice_selesai.php?invoice=<?= $data->invoice; ?>" target="_blank">
                        <i class="fa fa-print"></i>
                      </a>
                      <a class="btn btn-primary btn-xs" id="edit_transaksi" data-toggle="modal" data-target="#edit" data-invoice="<?= $data->invoice; ?>" data-nama_barang="<?= $data->nama_barang ?>" data-nama_pemilik="<?= $data->nama_pemilik ?>" data-serial_number="<?= $data->serial_number ?>" data-kelengkapan_barang="<?= $data->kelengkapan_barang ?>" data-keluhan="<?= $data->keluhan ?>" data-keterangan="<?= $data->keterangan ?>" data-teknisi="<?= $data->teknisi ?>" data-nama_pengambil="<?= $data->nama_pengambil ?>" data-biaya="<?= $data->biaya ?>"><i class="fa fa-pencil"></i>
                      </a>
                      <!-- /.tombol edit data  -->
                      <!-- <a class="btn btn-danger btn-xs disabled" href="?halaman=transaksi&act=del&invoice=<?= $data->invoice; ?>" onclick="return confirm('Apakah Anda yakin ?')" alt="hapus">
                        <i class="fa fa-trash"></i>
                      </a> -->
                    </td>
                  </tr>

                <?php } ?>
              </tbody>

              <!-- /.php menampilkan data  -->
            </table>
          </div>

          <?php
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
  $transaksi->hapus($_GET['invoice']);
  header("location: ?halaman=transaksi");
}
