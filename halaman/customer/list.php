<?php
include "../../model/m_transaksi.php";
$transaksi = new Transaksi($connection);

?>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Default box -->
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detail Barang</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" onclick="history.back(-1)"><i class="fa fa-times"></i></button>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-hover table-striped">
                                <thead>

                                    <tr>
                                        <th>RMA</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Nama Barang</th>
                                        <th>Keluhan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <!-- /.php menampilkan data  -->
                                <tbody>
                                    <?php
                                    $tampil = $transaksi->tampil_pelanggan(@$_SESSION['no_identitas']);
                                    while ($data = $tampil->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?= $data->invoice; ?></td>
                                            <td><?= $data->tanggal_masuk; ?></td>
                                            <td><?= $data->nama_barang; ?></td>
                                            <td><?= $data->keluhan; ?></td>
                                            <td><?php if ($data->nama_pengirim != "") {
                                                    echo "<p class='btn btn-success btn-xs'>done</p> ";
                                                } else {
                                                    echo "<p class='btn btn-warning btn-xs'>pending</p>";
                                                } ?></td>
                                            <td>
                                                <a class="btn btn-info btn-xs" href="?halaman=detail&invoice=<?= $data->invoice; ?>">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                                <!-- /.php menampilkan data  -->
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <!-- /.box-footer-->
                </div>


            </div>
        </div>
</section>