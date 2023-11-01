 <div id="edit" class="modal fade" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times</button>
         <h4 class="modal-title"><b>Edit Transaksi</b></h4>
       </div>
       <form id="form_edit">
         <div class="modal-body" id="modal-edit">

           <div class="form-group">
             <label class="control-label" for="nama_barang">Nama Barang</label>
             <input type="hidden" id="invoice" name="invoice" value="<?= $data->invoice ?>">
             <input type="text" name="nama_barang" class="form-control" id="nama_barang" required>
           </div>

           <div class="form-group">
             <label class="control-label" for="nama_pemilik">Nama Pemilik</label>
             <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik" required>
           </div>

           <div class="form-group">
             <label class="control-label" for="serial_number">SN</label>
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

           <div class="form-group">
             <label class="control-label" for="biaya">Biaya</label>
             <input type="text" name="biaya" class="form-control" id="biaya" required>
           </div>

         </div>
         <div class="modal-footer">
           <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
           <input type="submit" class="btn btn-success" name="submit" value="submit">
         </div>

       </form>
       <script type="text/javascript">
         $(document).on("click", "#edit_transaksi", function() {
           var invoice = $(this).data('invoice');
           var nama_barang = $(this).data('nama_barang');
           var nama_pemilik = $(this).data('nama_pemilik');
           var serial_number = $(this).data('serial_number');
           var kelengkapan_barang = $(this).data('kelengkapan_barang');
           var keluhan = $(this).data('keluhan');
           var keterangan = $(this).data('keterangan');
           var teknisi = $(this).data('teknisi');
           var nama_pengambil = $(this).data('nama_pengambil');
           var biaya = $(this).data('biaya');
           $("#modal-edit #invoice").val(invoice);
           $("#modal-edit #nama_barang").val(nama_barang)
           $("#modal-edit #nama_pemilik").val(nama_pemilik)
           $("#modal-edit #serial_number").val(serial_number)
           $("#modal-edit #kelengkapan_barang").val(kelengkapan_barang)
           $("#modal-edit #keluhan").val(keluhan)
           $("#modal-edit #keterangan").val(keterangan)
           $("#modal-edit #teknisi").val(teknisi)
           $("#modal-edit #nama_pengambil").val(nama_pengambil)
           $("#modal-edit #biaya").val(biaya)
         })

         $(document).ready(function(e) {
           $("#form_edit").on("submit", (function(e) {
             e.preventDefault();
             $.ajax({
               url: '../../model/transaksi_edit.php',
               type: 'POST',
               data: new FormData(this),
               contentType: false,
               cache: false,
               processData: false,
               success: function(msg) {
                 $('.table').html(msg);
               }
             });

           }));
         })
       </script>
     </div>
   </div>


 </div>