<?php
include "../../model/m_transaksi.php";
$transaksi = new Transaksi($connection);

$tampil = $transaksi->tampil(@$_GET['invoice']);
while ($data = $tampil->fetch_object()) {
  $getcustomer = $transaksi->nama_customer($data->nama_customer);
  $nama = "";
  foreach ($getcustomer as $getcustomers) {
    $nama = $getcustomers['nama'];
  }
?>
  <section class="content">
    <div class="container">

      <div class="row">
        <div class="col">

          <!-- Tombol edit & hapus data -->
          <div style="margin-bottom: 10px;">
            <a class="btn btn-primary btn-xs" id="edit_transaksi" data-toggle="modal" data-target="#edit" data-invoice="<?= $data->invoice; ?>" data-nama_barang="<?= $data->nama_barang ?>" data-nama_pemilik="<?= $data->nama_pemilik ?>" data-serial_number="<?= $data->serial_number ?>" data-kelengkapan_barang="<?= $data->kelengkapan_barang ?>" data-keluhan="<?= $data->keluhan ?>" data-keterangan="<?= $data->keterangan ?>" data-teknisi="<?= $data->teknisi ?>" data-nama_pengambil="<?= $data->nama_pengambil ?>" data-biaya="<?= $data->biaya ?>"><i class="fa fa-pencil"></i>
            </a>
            <a class="btn btn-danger btn-xs" href="?halaman=transaksi&act=del&invoice=<?= $data->invoice; ?>" onclick="return confirm('Apakah anda yakin ?')" alt="hapus">
              <i class="fa fa-trash"></i></a>
          </div>
          <!-- Default box -->
          <?php if ($data->nama_pengirim == '') {
            echo '<div class="box box-solid box-warning">';
          } else {
            echo '<div class="box box-solid box-success">';
          } ?>
          <div class="box-header with-border">
            <h3 class="box-title">Detail Barang</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" onclick="history.back(-1)"><i class="fa fa-times"></i></button>
            </div>
          </div>

          <div class="box-body">
            <div class="table-responsive">
              <table>
                <tr>
                  <td>
                    <h4><b>No Invoice &nbsp;</b></h4>
                  </td>
                  <td>
                    <h4> : <?= $data->invoice; ?></h4>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4><b>Tanggal Masuk &nbsp;</b></h4>
                  </td>
                  <td>
                    <h4> : <?= date('d/m/Y', strtotime($data->tanggal_masuk)); ?></h4>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4><b>Nama Customer &nbsp;</b></h4>
                  </td>
                  <td>
                    <h4> : <?= $nama ?></h4>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4><b>Nama Barang &nbsp;</b></h4>
                  </td>
                  <td>
                    <h4> : <?= $data->nama_barang; ?></h4>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4><b>Nama Pemilik &nbsp;</b></h4>
                  </td>
                  <td>
                    <h4> : <?= $data->nama_pemilik; ?></h4>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4><b>SN &nbsp;</b></h4>
                  </td>
                  <td>
                    <h4> : <?= $data->serial_number; ?></h4>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4><b>Kelengkapan Barang &nbsp;</b></h4>
                  </td>
                  <td>
                    <h4> : <?= $data->kelengkapan_barang; ?></h4>
                  </td>
                </tr>

                <tr>
                  <td>
                    <h4><b>Keluhan &nbsp;</b></h4>
                  </td>
                  <td>
                    <h4> : <?= $data->keluhan; ?></h4>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4><b>Keterangan &nbsp;</b></h4>
                  </td>
                  <td>
                    <h4> : <?= $data->keterangan; ?></h4>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4><b>Teknisi &nbsp;</b></h4>
                  </td>
                  <td>
                    <h4> : <?= $data->teknisi; ?></h4>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4><b>Nama Pengambil &nbsp;</b></h4>
                  </td>
                  <td>
                    <h4> : <?= $data->nama_pengambil; ?></h4>
                  </td>
                </tr>
                <?php if ($data->nama_pengirim != '') {
                  echo '
                <tr>
                  <td>
                    <h4><b>Nama Pengirim &nbsp;</b></h4>
                  </td>
                  <td>
                    <h4> : ' . $data->nama_pengirim . '</h4>
                  </td>
                </tr>
                <tr>
                  <td>
                    <h4><b>Tanggal Selesai &nbsp;</b></h4>
                  </td>
                  <td>
                    <h4> : ' . $data->tanggal_selesai . '</h4>
                  </td>
                </tr>';
                } else {
                  echo '';
                } ?>
                <tr>
                  <td>
                    <h4><b>Biaya &nbsp;</b></h4>
                  </td>
                  <td>
                    <h4> : Rp. <?= number_format($data->biaya, 0, ".", "."); ?></h4>
                  </td>
                </tr>
              </table>
            <?php } ?>
            </div>
          </div>
          <!-- /.box-body -->

          <!-- /.box-footer-->
        </div>

      </div>
    </div>
  </section>


  <?php
  include '.modal_edit.php';
  ?>