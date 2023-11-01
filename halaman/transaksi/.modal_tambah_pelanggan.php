 <div id="tambah" class="modal fade" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times</button>
         <h4 class="modal-title"><b>Tambah Pelanggan</b></h4>
       </div>
       <form action="" method="post">
         <div class="modal-body">
           <div class="form-group">
             <label class="control-label" for="no_identitas">No Identitas</label>
             <input type="text" name="no_identitas" class="form-control" id="no_identitas" value="<?= $pelanggan->total() + 1 ?>" required>
           </div>
           <div class="form-group">
             <label class="control-label" for="nama">Nama / PT</label>
             <input type="text" name="nama" class="form-control" id="nama" required>
           </div>
           <div class="form-group">
             <label class="control-label" for="username">Username</label>
             <input type="text" name="username" class="form-control" id="username" required>
           </div>
           <div class="form-group">
             <label class="control-label" for="password">password</label>
             <input type="text" name="password" class="form-control" id="password" value="123456" required>
           </div>
           <div class="form-group">
             <label class="control-label" for="alamat">Alamat</label>
             <input type="text" name="alamat" class="form-control" id="alamat" required>
           </div>
           <div class="form-group">
             <label class="control-label" for="no_hp">No_HP</label>
             <input type="text" name="no_hp" class="form-control" id="no_hp" required>
           </div>
         </div>
         <div class="modal-footer">
           <button type="reset" class="btn btn-danger">Reset</button>
           <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
         </div>

       </form>
       <?php
        if (@$_POST['tambah']) {
          $no_identitas = $connection->conn->real_escape_string($_POST['no_identitas']);
          $nama = $connection->conn->real_escape_string($_POST['nama']);
          $username = $connection->conn->real_escape_string($_POST['username']);
          $password = $connection->conn->real_escape_string($_POST['password']);
          $alamat = $connection->conn->real_escape_string($_POST['alamat']);
          $no_hp = $connection->conn->real_escape_string($_POST['no_hp']);

          $pelanggan->tambah($no_identitas, $nama, $username, $password, $alamat, $no_hp);
          echo "<script>window.location='?halaman=data_pelanggan';</script>";
        }
        ?>
     </div>
   </div>
 </div>