        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
          <!-- <h3 class="ml-2 mb-3 font-weight-bold ">Daftar admin</h3> -->
          
          <?= $this->session->flashdata('pesan'); ?>
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                 
                  <div class="d-sm-block"></div>
                  <ul class="navbar-nav ml-2">
                    <a href="<?= base_url('c_admin/tambah'); ?>" class="btn btn-primary mr-auto mr-lg-0"><i class="fa fa-plus"></i> Tambah data</a>

                  </ul>

                
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered display" id="data_tabel" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Nama </th>
                      <th>Bidang</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->





<?php foreach($list_admin as $admin ) : ?>
  <div class="modal fade" id="modal_detail<?= $admin['admin_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>Username </td>
                        <td><?= $admin['admin_username']; ?></td>
                      </tr>
                      <tr>
                        <td>Password</td>
                        <td><?= $admin['admin_password']; ?></td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td><?= $admin['admin_nama']; ?></td>
                      </tr>
                      <tr>
                        <td>Bidang</td>
                        <td><?= $admin['bidang_nama']; ?></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td><?= $admin['admin_alamat']; ?></td>
                      </tr>
                      <tr>
                        <td>Foto</td>
                        <td><img src="<?= base_url('assets/foto/admin/').$admin['admin_foto']; ?>" width="100" class="card-img" style="width: 15rem;"> </td>
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
  function getData(kab){
      $.ajax({
            url: "<?php echo base_url(); ?>c_admin/load_admin",
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
                            "data": "admin_username"
                        },
                        {
                            "data": "admin_password"
                        },
                        {
                            "data": "admin_nama",
                        },
                        {
                            "data": "bidang_nama"
                        },
                        {
                            "data": "admin_id",
                            "render": function(data, type, row, meta) {
                            return `
                              <a href="${row.admin_id}" class="badge badge-primary" data-toggle="modal" data-target="#modal_detail${row.admin_id}" >Detail</a> <a href='<?= base_url('c_admin/edit/')?>${row.admin_id}' class="badge badge-success">Edit</a> <a href='<?= base_url('c_admin/hapus/')?>${row.admin_id}' class="badge badge-danger" onclick="return confirm('Yakin dihapus?');">Hapus</a>
                            `;
                            }
                        }
              ]
          } );
            }
        });
    } 
    getData();



</script>