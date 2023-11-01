 <div id="tambah" class="modal fade" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times</button>
         <h4 class="modal-title"><b>Tambah Transaksi</b></h4>
       </div>
       <form action="" method="post">
         <div class="modal-body">
           <div class="form-group">
             <label class="control-label" for="pilih_pelanggan">Pilih Customer</label>
             <select class="form-control select2" name="pilih_pelanggan" id="pilih_pelanggan" style="width: 100%;">
               <?php $tampil = $pelayanan->tampil_pelanggan();
                while ($data = $tampil->fetch_object()) {
                  $no_pelanggan = $data->no_identitas; ?>
                 <option value="<?= $data->no_identitas; ?>"><?= $data->no_identitas . ' ' . $data->nama ?></option>
               <?php } ?>

             </select>
           </div>

           <div class="form-group">
             <label class="control-label" for="nama_barang">Nama Barang</label>
             <input type="text" name="nama_barang" class="form-control" id="nama_barang" required>
           </div>

           <div class="form-group">
             <label class="control-label" for="nama_pemilik">Nama Pemilik</label>
             <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik" required>
           </div>

           <div class="form-group">
             <label class="control-label" for="serial_number">Serial Number</label>
             <input type="text" name="serial_number" class="form-control" id="serial_number" required>
           </div>

           <div class="form-group">
             <label class="control-label" for="kelengkapan_barang">Kelengkapan Barang</label>
             <input type="text" name="kelengkapan_barang" class="form-control" id="kelengkapan_barang" required>
           </div>

           <div class="form-group">
             <label class="control-label" for="keluhan">Keluhan</label>
             <input type="text" name="keluhan" class="form-control" id="keluhan" required>
           </div>

           <div class="form-group">
             <label class="control-label" for="keterangan">Keterangan</label>
             <input type="text" name="keterangan" class="form-control" id="keterangan" required>
           </div>

           <div class="form-group">
             <label class="control-label" for="teknisi">Teknisi</label>
             <input type="text" name="teknisi" class="form-control" id="teknisi" required>
           </div>

           <div class="form-group">
             <label class="control-label" for="nama_pengambil">Nama Pengambil</label>
             <input type="text" name="nama_pengambil" class="form-control" id="nama_pengambil" required>
           </div>

         </div>
         <div class="modal-footer">
           <button type="reset" class="btn btn-danger">Reset</button>
           <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
         </div>

       </form>
       <?php
        if (@$_POST['tambah']) {
          $invoice = date("YmdHis");
          $no_transaksi = date("YmdHis");
          $nama_customer = $connection->conn->real_escape_string($_POST['pilih_pelanggan']);
          $nama_barang = $connection->conn->real_escape_string($_POST['nama_barang']);
          $nama_pemilik = $connection->conn->real_escape_string($_POST['nama_pemilik']);
          $serial_number = $connection->conn->real_escape_string($_POST['serial_number']);
          $kelengkapan_barang = $connection->conn->real_escape_string($_POST['kelengkapan_barang']);
          $keluhan = $connection->conn->real_escape_string($_POST['keluhan']);
          $keterangan = $connection->conn->real_escape_string($_POST['keterangan']);
          $teknisi = $connection->conn->real_escape_string($_POST['teknisi']);
          $nama_pengambil = $connection->conn->real_escape_string($_POST['nama_pengambil']);

          $pelayanan->tambah_transaksi($invoice, $nama_customer, $nama_barang, $nama_pemilik, $serial_number, $kelengkapan_barang, $keluhan, $keterangan, $teknisi, $nama_pengambil, '',  '');

          $pelayanan->tambah_riwayat($no_pelanggan, $invoice);
          echo "<script>window.location='?halaman=transaksi';</script>";
        }
        ?>
     </div>
   </div>

 </div>