

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800">Daftar tempat ibadah</h1> -->
          <h3 class="ml-2 mb-3 font-weight-bold ">Daftar tempat ibadah</h3>

          <?= $this->session->flashdata('pesan'); ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <div class="row">
                   
                  <a href="<?= base_url('c_tempat_ibadah/tambah'); ?>" class="btn btn-primary  ml-2"><i class="fa fa-plus"></i> Tambah data</a>
                  
                  <a href="#" class="btn btn-success  ml-2" data-toggle="modal" data-target="#modal_import"><i class="fa fa-upload"></i> Import Excel</a>
                  <a href="<?= base_url('c_tempat_ibadah/export_excel'); ?>" class="btn btn-success  ml-2"><i class="fa fa-download"></i> Export Excel</a>
            </div>
              
            
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Kabupaten</th>
                      <th>Kecamatan</th>
                      <th>Tahun berdiri</th>
                      <th>Aksi</th> 
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($list_tempat_ibadah as $ti ) : ?>
                    <tr>
                      <td><?= $ti['ti_nama']; ?></td>
                      <td><?= $ti['ti_alamat']; ?></td>
                      <td><?= $ti['ti_kabupaten']; ?></td>
                      <td><?= $ti['ti_kecamatan']; ?></td>
                      <td><?= $ti['longitude']; ?></td>
                      <td >
                        <a href="<?= $ti['ti_id']; ?>" class="badge badge-primary" data-toggle="modal" data-target="#modal_detail<?= $ti['ti_id']; ?>">Detail</a>
                        <a href="<?= base_url('c_tempat_ibadah/edit/') . $ti['ti_id']; ?>" class="badge badge-success">Edit</a>
                        <a href="<?= base_url('c_tempat_ibadah/hapus/') . $ti['ti_id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin dihapus?');">Hapus</a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->




<!-- Modal -->
<div class="modal fade" id="modal_import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data Tempat Ibadah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= form_open_multipart('c_tempat_ibadah/import_excel'); ?>
            
            <div class="custom-file">
              <input type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="custom-file-input" name="fileImport" id="fileImport" required>
              <label class="custom-file-label" for="customFile" >Pilih file excel</label>
            </div>
        <hr>
        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Import</button>   
      <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->

<?php foreach($list_tempat_ibadah as $ti ) : ?>
  <div class="modal fade" id="modal_detail<?= $ti['ti_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Tempat Ibadah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>Jenis tempat ibadah </td>
                        <td><?= $ti['ti_jenis']; ?></td>
                      </tr>
                      <tr>
                        <td>Tipologi</td>
                        <td><?= $ti['ti_tipologi']; ?></td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td><?= $ti['ti_nama']; ?></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td><?= $ti['ti_alamat']; ?></td>
                      </tr>
                      <tr>
                        <td>Kabupaten</td>
                        <td><?= $ti['ti_kabupaten']; ?></td>
                      </tr>
                      <tr>
                        <td>Kecamatan</td>
                        <td><?= $ti['ti_kecamatan']; ?></td>
                      </tr>
                      <tr>
                        <td>Luas tanah</td>
                        <td><?= $ti['ti_luas_tanah']; ?></td>
                      </tr>
                      <tr>
                        <td>Status tanah</td>
                        <td><?= $ti['ti_status_tanah']; ?></td>
                      </tr>
                      <tr>
                        <td>Luas bangunan</td>
                        <td><?= $ti['ti_luas_bangunan']; ?></td>
                      </tr>
                      <tr>
                        <td>Tahun berdiri</td>
                        <td><?= $ti['ti_tahun_berdiri']; ?></td>
                      </tr>
                      <tr>
                        <td>Jamaah</td>
                        <td><?= $ti['ti_jamaah']; ?></td>
                      </tr>
                      <tr>
                        <td>Imam</td>
                        <td><?= $ti['ti_imam']; ?></td>
                      </tr>
                      <tr>
                        <td>Khatib</td>
                        <td><?= $ti['ti_khatib']; ?></td>
                      </tr>
                      <tr>
                        <td>Remaja</td>
                        <td><?= $ti['ti_remaja']; ?></td>
                      </tr>
                      <tr>
                        <td>Ketua</td>
                        <td><?= $ti['ti_ketua']; ?></td>
                      </tr>
                      <tr>
                        <td>Keterangan</td>
                        <td><?= $ti['ti_keterangan']; ?></td>
                      </tr>
                      <tr>
                        <td>Di bawah binaan majelis</td>
                        <td><?= $ti['ti_binaan_majelis']; ?></td>
                      </tr>
                      <tr>
                        <td>Kondisi</td>
                        <td><?= $ti['ti_kondisi']; ?></td>
                      </tr>
                      <tr>
                        <td>Longitude</td>
                        <td><?= $ti['longitude']; ?></td>
                      </tr>
                      <tr>
                        <td>Latitude</td>
                        <td><?= $ti['latitude']; ?></td>
                      </tr>
                      <tr>
                        <td>Foto</td>
                        <td><img src="<?= $ti['ti_foto']; ?>" alt=""> </td>
                      </tr>
                    </tbody>
                  </table>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>









      </div>
      <!-- End of Main Content -->

