

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-4 text-gray-800">Daftar tempat ibadah</h1> -->
          <!-- <h3 class="ml-2 mb-3 font-weight-bold ">Daftar Vihara</h3> -->

          <?= $this->session->flashdata('pesan'); ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            

            <div class="row">


               <div class="btn-group ">

                <select class="custom-select ml-2 mr-2" id="kabupaten_filter" name="scrollkab" required="">
                      <option value="">--Pilih kabupaten--</option>
                </select>

                    <button type="button" id="filter" class="btn btn-primary btn-sm ml-2 mr-2">Filter</button> 

              </div>

              
              <div class="btn-group ml-auto">

                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                  Aksi
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="<?= base_url('c_tempat_ibadah/format_vihara'); ?>">Unduh format excel</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_import"><p class="fa fa-upload"></p> Import Excel</a>
                  <a class="dropdown-item" href="<?= base_url('c_tempat_ibadah/tambahVihara'); ?>"> <p class="fa fa-plus"></p> Tambah data</a>
                </div>
              </div>

              <div class="btn-group ml-2">
                
                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                  Export
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="<?= base_url('c_tempat_ibadah/export_vihara'); ?>">Export Excel</a>
                </div>
              </div>

            </div>
              
            
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="data_tabel" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Vihara</th>
                      <th>Alamat</th>
                      <th>Kabupaten</th>
                      <th>Kecamatan</th>
                      <th>Aksi</th> 
                    </tr>
                  </thead>
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
        <h5 class="modal-title" id="exampleModalLabel">Import Data Vihara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= form_open_multipart('c_tempat_ibadah/import_vihara'); ?>
          <label for="basic-url">Kabupaten</label>
           <div class="form-group mb-3">

                    <select class="custom-select " id="kabupaten" name="scrollkab" required="">
                      <option value="">--Pilih kabupaten--</option>

                      <?php foreach($list_kabupaten as $kabupaten ) : ?>
                        <option value="<?= $kabupaten['kab_id']; ?>"><?= $kabupaten['kab_nama']; ?></option>
                      <?php endforeach; ?>

                    </select>
                    <?= form_error('scrollkab', '<small class="text-danger">', '</small>'); ?>
          </div>

            <div class="custom-file">
              <input type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="custom-file-input" name="file_import" id="file_import" required>
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
          <h5 class="modal-title" id="exampleModalLabel">Detail Data Vihara</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                  <table class="table table-bordered">
                    <tbody>
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
                        <td><?= $ti['kab_nama']; ?></td>
                      </tr>
                      <tr>
                        <td>Kecamatan</td>
                        <td><?= $ti['kec_nama']; ?></td>
                      </tr>
                      <tr>
                        <td>Di bawah binaan majelis</td>
                        <td><?= $ti['ti_binaan_majelis']; ?></td>
                      </tr>
                      <tr>
                        <td>Ketua</td>
                        <td><?= $ti['ti_ketua']; ?></td>
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
                        <td><img src="<?= base_url('assets/foto/tempat_ibadah/').$ti['ti_foto']; ?>" alt="" width="100" class="card-img" style="width: 5rem;"> </td>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  

    function kabupaten() {
        $.ajax({
            url: "<?php echo base_url(); ?>c_dashboard/load_kabupaten",
            type: "post",
            dataType: "json",
            success: function(data) {
                // console.log(data)
                var kabupatenBody = "";
                for(var key in data){
                  kabupatenBody +=`<option value="${data[key]['kab_id']}">${data[key]['kab_nama']}</option>`;
                }
                $("#kabupaten_filter").append(kabupatenBody);
            }
        });
    }
    kabupaten();


    function getData(kab){
      $.ajax({
            url: "<?php echo base_url(); ?>c_tempat_ibadah/load_vihara",
            type: "post",
            data: {
                id_kab: kab
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);
                 $('#data_tabel').DataTable( {
                    "data": data,
                    "columns": [
                        {
                            "data": "ti_nama"
                        },
                        {
                            "data": "ti_alamat"
                        },
                        {
                            "data": "kab_nama",
                        },
                        {
                            "data": "kec_nama"
                        },
                        {
                            "data": "ti_id",
                            "render": function(data, type, row, meta) {
                            return `
                              <a href="${row.ti_id}" class="badge badge-primary" data-toggle="modal" data-target="#modal_detail${row.ti_id}" >Detail</a> <a href='<?= base_url('c_tempat_ibadah/edit_vihara/')?>${row.ti_id}' class="badge badge-success">Edit</a> <a href='<?= base_url('c_tempat_ibadah/hapus_vihara/')?>${row.ti_id}' class="badge badge-danger" onclick="return confirm('Yakin dihapus?');">Hapus</a>
                            `;
                            }
                        }
                    ]
                } );
            }
        });
    } 
    getData();


    
    $(document).on("click", "#filter", function(e) {
        e.preventDefault();

        
        var id_kab = $("#kabupaten_filter").val();
         

        if(id_kab.length != 0){
          // console.log("ini kab ="+id_kab);
          $('#data_tabel').DataTable().destroy();
          getData(id_kab);
        }
        else{
          $('#data_tabel').DataTable().destroy();
          getData();
          // console.log("gk ada");
        }

    });


    
    
</script>

