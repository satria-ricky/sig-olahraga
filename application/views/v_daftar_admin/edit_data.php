        <div class="container-fluid">

          <!-- Page Heading -->
          
          <a href="<?= base_url('c_admin'); ?>" class="btn btn-info mb-2"><i class="fa fa-arrow-left"></i> Kembali</a> 

            <!-- <h3 class="font-weight-bold mt-3">Edit data admin</h3> -->

            <?= $this->session->flashdata('pesan'); ?>
            <div class="card mb-3">
            <div class="card-body">
            
        <?= form_open_multipart(); ?>
        <input type="hidden" id="id" name="id" value="<?= $admin['admin_id']; ?>">
          <label for="basic-url">Username</label>
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="username" value="<?= $admin['admin_username']; ?>">
            
            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
          </div>
          

          <label for="basic-url">Password</label>
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="password" value="<?= $admin['admin_password']; ?>">
            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
          </div>

          <label for="basic-url">Sub bidang</label>
           <div class="form-group mb-3">
           
                    <select class="custom-select " id="inputGroupSelect01" name="bidang">
                      <option value="none" selected="selected">Pilih sub.bag ...</option>

                      <?php foreach($list_bidang as $bidang ) : ?>
                        <?php if($bidang['bidang_id'] == $admin['admin_bidang']) : ?>
                          <option value="<?= $bidang['bidang_id']; ?>" selected><?= $bidang['bidang_nama']; ?></option>
                        <?php else : ?>
                          <option value="<?= $bidang['bidang_id']; ?>"><?= $bidang['bidang_nama']; ?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>


                    <?= form_error('bidang', '<small class="text-danger">', '</small>'); ?>
          </div>

          <label for="basic-url">Nama</label>
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="nama" value="<?= $admin['admin_nama']; ?>">
            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
          </div>
          
          <label for="basic-url">Alamat</label>
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="alamat" value="<?= $admin['admin_alamat']; ?>">
          </div>

          <label for="basic-url">Foto</label>
          <div class="mb-2">
          <img src="<?= base_url('assets/foto/admin/').$admin['admin_foto']; ?>" width="100" class="card-img" style="width: 15rem;">  
          </div>
          <div class="custom-file">
          
            <input type="file" accept="image/*" class="custom-file-input" name="foto">
            <label class="custom-file-label" for="customFile">Ganti foto</label>
          </div>
        <hr>
        <div class="row float-right mr-1"> 
            <button type="submit" class="btn btn-primary">Simpan</button>   
        </div>
        <?= form_close(); ?>
      </div>
</div> 
      
      

          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

