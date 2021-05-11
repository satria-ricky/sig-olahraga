

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
          <a href="<?= base_url('c_tempat_ibadah/pura'); ?>" class="btn btn-info mb-2"><i class="fa fa-arrow-left"></i> Lihat data pura</a>
            <!-- <h3 class="font-weight-bold mt-3">Tambah data pura</h3> -->
          
 

<div class="row">
  <div class="col-sm-7">
    

    <div class="card">

            <div class="card-header">
            
            <div class="row ">
                <h4 class="ml-2">Pilih lokasi:</h4>      
                <button type="button" class="btn btn-outline-info btn-sm ml-auto mr-2" onclick="getLocation()">Get my location</button>

              </div>      
              
            </div>


                <div id="mapid" style="height: 450px;"></div>
            
    </div>


  </div>

  <div class="col-sm-5">
    

    <div class="card">
            <div class="card-header">
            
                <h4>Isi data:</h4>      
              
            </div>

            <div class="card-body">
            
            <?= form_open_multipart('c_tempat_ibadah/tambahPura'); ?>
              
              <label for="basic-url">Nama Pura</label>
              <div class="form-group ">
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="nama" value="<?= set_value('nama'); ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
              </div>

              <label for="basic-url">Alamat</label>
              <div class="form-group ">
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="alamat" value="<?= set_value('alamat'); ?>">
                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
              </div>

              
               <div class="btn-group">
                  

                   <div class="form-group mr-1">
                    <label for="basic-url">Kabupaten</label>
                      <select class="custom-select " id="kabupaten" name="scrollkab" onchange="get_peta_by_kab()">
                        <option value="">--Pilih kabupaten--</option>

                        <?php foreach($list_kabupaten as $kabupaten ) : ?>
                          <option value="<?= $kabupaten['kab_id']; ?>"><?= $kabupaten['kab_nama']; ?></option>
                        <?php endforeach; ?>

                      </select>
                      <?= form_error('scrollkab', '<small class="text-danger">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="basic-url">Kecamatan</label>
                    <select class="custom-select " id="kecamatan" name="scrollkec">
                      <option value="" >--Pilih kecamatan--</option>
                    </select>
                    <?= form_error('scrollkec', '<small class="text-danger">', '</small>'); ?>
                  </div>


                </div>

                <div class="btn-group ">

                  
                  <div class="form-group mr-1 ">
                    <label for="basic-url">Latitude</label>
                    <input type="text" class="form-control" id="Latitude" name="latitude" aria-describedby="basic-addon3"  readonly="">
                  </div>
                  
                  
                  <div class="form-group ">
                    <label for="basic-url">Longitude</label>
                    <input type="text" class="form-control" id="Longitude" name="longitude" aria-describedby="basic-addon3" readonly="">
                  </div>

                </div>

              <label for="basic-url">Kondisi</label>
              <div class="form-group ">
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="kondisi" value="<?= set_value('ketua'); ?>">
                <?= form_error('kondisi', '<small class="text-danger">', '</small>'); ?>
              </div>
            </div>
  

    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
      <label for="basic-url">Luas Tanah</label>
      <div class="form-group ">
        <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="luas_tanah" value="<?= set_value('luas_tanah'); ?>">
      </div>
      <label for="basic-url">Luas Bangunan</label>
      <div class="form-group ">
        <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="luas_bangunan" value="<?= set_value('luas_bangunan'); ?>">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
<script> 



    


    function get_peta_by_kab() {

      var id_kab = $("#kabupaten").val();
        

      if(id_kab.length != 0){
        // console.log("ini kab ="+id_kab);
        get_kab_by_id(id_kab);
      }
      else{
        // console.log("kosong");
        getData_peta();
      }

    }

 getData_peta();

  function get_kab_by_id(kab){
    
    $.ajax({
          url: "<?php echo base_url(); ?>c_dashboard/load_kab_by",
          type: "post",
          data: {id_kab: kab},
          dataType: "json",
          success: function(data) {
              // console.log(data.kab_latitude);
              getData_peta_kab(data.kab_latitude, data.kab_longitude);
          }
    });

  }

  
  function getData_peta_kab(lat, long){

    document.getElementById('mapid').innerHTML = "<div id='data_peta' style='height: 450px;'></div>";

    var curLocation=[0,0];
    if (curLocation[0]==0 && curLocation[1]==0) {
      curLocation =[lat, long]; 
    }

    var mymap = L.map('data_peta').setView([lat, long], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
          '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
          'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
          id: 'mapbox/streets-v11'
    }).addTo(mymap);

    mymap.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation, {
      draggable:'true'
    });

    marker.on('dragend', function(event) {
    var position = marker.getLatLng();
    marker.setLatLng(position,{
      draggable : 'true'
      }).bindPopup(position).update();
      $("#Latitude").val(position.lat);
      $("#Longitude").val(position.lng).keyup();
      console.log(position.lat, position.lng)

    });

    $("#Latitude, #Longitude").change(function(){
      var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
      marker.setLatLng(position, {
      draggable : 'true'
      }).bindPopup(position).update();
      mymap.panTo(position);
    });
    mymap.addLayer(marker);

                               
         
            



}


function getData_peta(){
  $.ajax({
        url: "<?php echo base_url(); ?>c_dashboard/load_data_to_tabel",
        type: "post",
        
        dataType: "json",
        success: function(data) {
            // console.log(data);
  
          document.getElementById('mapid').innerHTML = "<div id='data_peta' style='height: 450px;'></div>";
        
          var curLocation=[0,0];
          if (curLocation[0]==0 && curLocation[1]==0) {
            curLocation =[-8.58280355011038, 116.13464826731037]; 
          }

          var mymap = L.map('data_peta').setView([-8.58280355011038, 116.13464826731037], 13);
          L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
              attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
          }).addTo(mymap);

          mymap.attributionControl.setPrefix(false);
          var marker = new L.marker(curLocation, {
            draggable:'true'
          });

          marker.on('dragend', function(event) {
          var position = marker.getLatLng();
          marker.setLatLng(position,{
            draggable : 'true'
            }).bindPopup(position).update();
            $("#Latitude").val(position.lat);
            $("#Longitude").val(position.lng).keyup();
            console.log(position.lat, position.lng)

          });

          $("#Latitude, #Longitude").change(function(){
            var position =[parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
            marker.setLatLng(position, {
            draggable : 'true'
            }).bindPopup(position).update();
            mymap.panTo(position);
          });
          mymap.addLayer(marker);


        }

  });


}


function getLocation() {

navigator.geolocation.getCurrentPosition(function(location) {
        var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

        //map view 
        console.log(location.coords.latitude, location.coords.longitude);

        document.getElementById("Latitude").value = location.coords.latitude;
        document.getElementById("Longitude").value = location.coords.longitude;

      });
      alert('Titik koordinat berhasil di set!');
}




</script>

<script> 
  $(document).ready(function(){
            $('#kabupaten').change(function(){
                //Selected value
                var id = $(this).val();
                // console.log(id); 
                $.ajax({
                  type: "POST",
                  url: "<?= base_url('c_tempat_ibadah/getKecamatan'); ?>",
                  data: {
                    id : id
                  },
                  dataType : "JSON",
                  success: function(response){
                    $('#kecamatan').html(response);
                  }
                
                });
            });
        });

</script>