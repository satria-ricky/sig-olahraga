        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
          <a href="<?= base_url('c_admin'); ?>" class="btn btn-info mb-2"><i class="fa fa-arrow-left"></i> Kembali</a>
            <!-- <h3 class="font-weight-bold mt-3">Tambah data admin</h3> -->
          

<div class="card mb-3">
            <div class="card-body">
            
        <?= form_open_multipart('c_admin/tambah'); ?>
            
          <label for="basic-url">Username</label>
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="username" value="<?= set_value('username'); ?>">
            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
          </div>
          

          <label for="basic-url">Password</label>
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="password" value="<?= set_value('password'); ?>">
            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
          </div>

          <label for="basic-url">Sub bidang</label>
           <div class="form-group mb-3">
           
                    <select class="custom-select " id="inputGroupSelect01" name="bidang">
                      <option value="none" selected="selected">Pilih sub.bag ...</option>

                      <?php foreach($list_bidang as $bidang ) : ?>
                        <option value="<?= $bidang['bidang_id']; ?>"><?= $bidang['bidang_nama']; ?></option>
                      <?php endforeach; ?>

                    </select>
                    <?= form_error('bidang', '<small class="text-danger">', '</small>'); ?>
          </div>

          <label for="basic-url">Nama</label>
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="nama" value="<?= set_value('nama'); ?>">
            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
          </div>
          
          <label for="basic-url">Alamat</label>
          <div class="form-group mb-3">
            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="alamat" value="<?= set_value('nama'); ?>">
          </div>

          <label for="basic-url">Foto</label>
          <div class="custom-file">
            <input type="file" accept="image/*" class="custom-file-input" name="foto">
            <label class="custom-file-label" for="customFile">Pilih foto</label>
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

