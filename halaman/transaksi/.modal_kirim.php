<div id="kirim" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times</button>
        <h4 class="modal-title"><b>Pengiriman Barang</b></h4>
      </div>
      <form id="form_kirim">
        <div class="modal-body" id="modal-kirim_barang">
          <div class="form-group">
            <label class="control-label" for="nama_pengirim">Nama Pengirim</label>
            <input type="hidden" id="invoice" name="invoice">
            <input type="text" name="nama_pengirim" class="form-control" id="nama_pengirim" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" name="kirim" value="kirim">
        </div>

      </form>
      <script type="text/javascript">
        $(document).on("click", "#kirim_barang", function() {
          var invoice = $(this).data('invoice');
          var nama_pengirim = $(this).data('nama_pengirim');
          $("#modal-kirim_barang #invoice").val(invoice);
          $("#modal-kirim_barang #nama_pengirim").val(nama_pengirim)
        })

        $(document).ready(function(e) {
          $("#form_kirim").on("submit", (function(e) {
            e.preventDefault();
            $.ajax({
              url: '../../model/transaksi_selesai.php',
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