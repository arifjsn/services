<div id="update" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times</button>
        <h4 class="modal-title"><b>Update Transaksi</b></h4>
      </div>
      <form id="form_update">
        <div class="modal-body" id="modal-update">
          <div class="form-group">
            <label class="control-label" for="keterangan">Keterangan</label>
            <input type="hidden" id="invoice" name="invoice">
            <input type="text" name="keterangan" class="form-control" id="keterangan" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" name="update" value="Perbaharui">
        </div>

      </form>
      <script type="text/javascript">
        $(document).on("click", "#update_transaksi", function() {
          var invoice = $(this).data('invoice');
          var keterangan = $(this).data('keterangan');
          $("#modal-update #invoice").val(invoice);
          $("#modal-update #keterangan").val(keterangan)
        })

        $(document).ready(function(e) {
          $("#form_update").on("submit", (function(e) {
            e.preventDefault();
            $.ajax({
              url: '../../model/transaksi_update.php',
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