<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times</button>
                <h4 class="modal-title"><b>Edit Pelanggan</b></h4>
            </div>
            <form id="form_edit">
                <div class="modal-body" id="modal-edit-pelanggan">
                    <div class="form-group">
                        <label class="control-label" for="nama">Nama</label>
                        <input type="hidden" id="no_identitas" name="no_identitas">
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="no_hp">No Hp</label>
                        <input type="text" name="no_hp" class="form-control" id="no_hp" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="submit" value="Perbarui">
                </div>

            </form>
            <script type="text/javascript">
                $(document).on("click", "#edit_pelanggan", function() {
                    var no_identitas = $(this).data('no_identitas')
                    var nama = $(this).data('nama')
                    var username = $(this).data('username')
                    var password = $(this).data('password')
                    var alamat = $(this).data('alamat')
                    var no_hp = $(this).data('no_hp')
                    $("#modal-edit-pelanggan #no_identitas").val(no_identitas);
                    $("#modal-edit-pelanggan #nama").val(nama);
                    $("#modal-edit-pelanggan #username").val(username);
                    $("#modal-edit-pelanggan #password").val(password);
                    $("#modal-edit-pelanggan #alamat").val(alamat);
                    $("#modal-edit-pelanggan #no_hp").val(no_hp);
                })

                $(document).ready(function(e) {
                    $("#form_edit").on("submit", (function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: '../../model/pelanggan_edit.php',
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