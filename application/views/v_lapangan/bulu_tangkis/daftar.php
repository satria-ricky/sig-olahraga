

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <a href="<?= base_url('c_bulu_tangkis/tambah'); ?>" class="btn btn-info mb-2"><i class="fa fa-plus"></i> Tambah data</a>


          <?= $this->session->flashdata('pesan'); ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
          <div class="card-header py-3">
              <div class="btn-group ">
                
                <select class="custom-select ml-2 mr-2" id="nama_status">
                      <option value="">--Pilih Status Data Lapangan--</option>
                </select>

                    <button type="button" id="filter_status" class="btn btn-primary btn-sm ml-2 mr-2">Filter</button> 

              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="data_tabel" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Alamat</th>
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

<?php foreach($list as $bt ) : ?>
  <div class="modal fade" id="modal_detail<?= $bt['bt_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">
                <p>Detail Data Lapangan </p>
             </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        
                        <div class="modal-body">
                        <img src="<?= base_url('assets/foto/bt/').$bt['bt_foto']; ?>" alt="" width="100%" class="card-img mb-2" style="width: 100%;">
                              <table class="table table-bordered">
                                <tbody>
                                  <tr>
                                    <td>Nama</td>
                                    <td><?= $bt['bt_nama']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Alamat</td>
                                    <td><?= $bt['bt_alamat']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Jam buka : <?= $bt['bt_jam_buka']; ?> </td>
                                    <td>Jam tutup : <?= $bt['bt_jam_tutup']; ?> </td>
                                  </tr>
                                  <tr>
                                    <td>Kontak</td>
                                    <td><?= $bt['bt_kontak']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Longitude</td>
                                    <td><?= $bt['longitude']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Latitude</td>
                                    <td><?= $bt['latitude']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Status</td>
                                    <td><?= $bt['stts_nama']; ?></td>
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

    function getData(id){
      // console.log(id);
      $.ajax({
            url: "<?php echo base_url(); ?>c_bulu_tangkis/load_data_to_tabel",
            type: "post",
            data: {
                stts_id : id
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);
                 $('#data_tabel').DataTable( {
                    "data": data,
                    "columns": [
                        {
                            "data": "bt_nama"
                        },
                        {
                            "data": "bt_alamat"
                        },
                        {
                            "data": "bt_id",
                            "render": function(data, type, row, meta) {
                            return `
                              <a href="${row.bt_id}" class="badge badge-primary" data-toggle="modal" data-target="#modal_detail${row.bt_id}" >Detail</a> <a href='<?= base_url('c_bulu_tangkis/edit/')?>${row.bt_id}' class="badge badge-success">Edit</a> <a href='<?= base_url('c_bulu_tangkis/hapus/')?>${row.bt_id}' class="badge badge-danger" onclick="return confirm('Yakin dihapus?');">Hapus</a>
                            `;
                            }
                        }
                  ]
          } );
            }
        });
    } 
    getData();


    function getstatus() {
        $.ajax({
            url: "<?php echo base_url(); ?>c_bulu_tangkis/load_status",
            type: "post",
            dataType: "json",
            success: function(data) {
                // console.log(data)
                var statusBody = "";
                for(var key in data){
                  statusBody +=`<option value="${data[key]['stts_id']}">${data[key]['stts_nama']}</option>`;
                }
                $("#nama_status").append(statusBody);
            }
        });
    }
    getstatus();


     $(document).on("click", "#filter_status", function(e) {
        e.preventDefault();

        
        var id_status = $("#nama_status").val();
         
        if(id_status.length != 0){
          // console.log("ini stts ="+id_status);
          $('#data_tabel').DataTable().destroy();
          getData(id_status);
        }
        else{
          $('#data_tabel').DataTable().destroy();
          getData();
          // console.log("gk ada = "+id_status);
        }


         

    });

</script>