<!doctype html>
<html lang="en" id="home">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->

  

  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> -->



<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>

  <link rel="stylesheet" href="<?= base_url() ?>leaflet-locatecontrol/dist/L.Control.Locate.min.css" />
<script src="<?= base_url() ?>leaflet-locatecontrol/src/L.Control.Locate.js"></script>

<link rel="stylesheet" href="<?= base_url() ?>leaflet-search/src/leaflet-search.css" />
<script src="<?= base_url() ?>leaflet-search/src/leaflet-search.js"></script>





    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dashboard/'); ?>style.css">

     <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/foto/'); ?>icon_bt.jpg">

     <!-- fonts  -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">


    <title>Bulu Tangkis - Kota Mataram</title>
  </head>
  <body>
        
    <!-- navbar -->
      


    	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container"> 
        <a class="navbar-brand font-weight-bolder page-scroll" href="#home"> BULU TANGKIS - KOTA MATARAM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto" >
            <a class="nav-link page-scroll" href="#data_tempat_ibadah" >Data</a>
            <a class="nav-link page-scroll" href="#peta_tempat_ibadah" >Map</a>
            <a class="nav-link page-scroll" href="#contact_us" >Contact Us</a>
            <a class="nav-link page-scroll" href="<?= base_url(); ?>c_login">Log in</a>
          </div>
        </div>
      </div>
    </nav>

    <!-- end of navbar -->

<!-- jumbotron -->

<div class="jumbotron jumbotron-fluid">
  <!-- <div class="container"> -->
    <h1 class="display-4"> 
    	<img src="<?= base_url('assets/foto/'); ?>bg.jpg" class="img-fluid" alt="Responsive image" style="width:1350px;  height: 300px; align:center;">
    </h1>
    <!-- <p class="lead"></p>
  </div> -->
</div>	

<!-- <div id="result">ppp </div> -->


<!-- end of jumbotron -->

<!-- body -->


	<div class="container-fluid" id="data_tempat_ibadah">

       
          
          <div class="card shadow mb-4 mr-5 ml-5">
            <div class="card-header py-3">
              <h4 class="font-weight-bold"> Daftar Lapangan</h4>  
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered " id="data_tabel" width="100%" cellspacing="0">
                  <thead>
                    <tr>
  		                <th>Jenis</th>
  		                <th>Nama</th>
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
          
        </div>

<!-- end of body -->



	
	<div  style="margin-top: 100px;"></div>

      <div class="container-fluid" id="peta_tempat_ibadah">

          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
  
              <h4 class="font-weight-bold "> Peta Lokasi </h4>  
            </div>


                <div id="mapid" style="height: 450px;"></div>
            

            </div>
          </div>
          
        </div>



<div class="section section-lg text-white" id="contact_us" style="padding-bottom:25px; padding-top: 25px; background-color: #0C6545;">
        <div class="container">
            <div class="text-center">
                &copy; Copyright. Zaenalabidin
            </div>
        </div>
    </div>





</body>


    <!-- Optional JavaScript; choose one of the two! -->

 


  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

  
  
<script src="<?= base_url('assets/dashboard/'); ?>script.js"></script>
  
<script> 

  function jenis_ibadah() {
        $.ajax({
            url: "<?php echo base_url(); ?>c_dashboard/load_jenis",
            type: "post",
            dataType: "json",
            success: function(data) {
                // console.log(data)
                var jenisBody = "";
                for(var key in data){
                  jenisBody +=`<option value="${data[key]['jenis_id']}">${data[key]['jenis_nama']}</option>`;
                }
                $("#jenis_ibadah").append(jenisBody);
            }
        });
    }
    jenis_ibadah();

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
                $("#kabupaten").append(kabupatenBody);
            }
        });
    }
    kabupaten();


    function getData(jenis, kab){
      $.ajax({
            url: "<?php echo base_url(); ?>c_dashboard/load_data_to_tabel",
            type: "post",
            data: {
                id_jenis: jenis,
                id_kab: kab
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);
                var i = 1;
                 $('#data_tabel').DataTable( {
                  "data": data,
              "columns": [{ 

                    "data": "jenis_nama"
                  },
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
                            return `<a href="${row.ti_id}" class="badge badge-primary" data-toggle="modal" data-target="#modal_detail${row.ti_id}" >Detail</a>`;
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

        
    var id_kab = $("#kabupaten").val();
        var id_jenis = $("#jenis_ibadah").val();
        // console.log("ini jenis="+id_jenis+" dan ini kabupaten="+id_kab);

        if ((id_kab != "") && (id_jenis != "")) {
      // console.log("ini jenis="+id_jenis+" dan ini kabupaten="+id_kab);
       $('#data_tabel').DataTable().destroy();
      getData(id_jenis, id_kab);
    }
    else if((id_kab != "") && (id_jenis == "")){
      // console.log("ini kab ="+id_kab);
       $('#data_tabel').DataTable().destroy();
      getData('', id_kab);  
    }
    else if((id_kab == "") && (id_jenis != "")){
      // console.log("ini jenis ="+id_jenis); 
      $('#data_tabel').DataTable().destroy();
      getData(id_jenis, '');
    }
    else{
      // console.log("ini kosong");
       $('#data_tabel').DataTable().destroy();
      getData();
    }

    });
</script>



<!-- PETA -->

<script> 

  function jenis_ibadah_peta() {
        $.ajax({
            url: "<?php echo base_url(); ?>c_dashboard/load_jenis",
            type: "post",
            dataType: "json",
            success: function(data) {
                // console.log(data)
                var jenisBody = "";
                for(var key in data){
                  jenisBody +=`<option value="${data[key]['jenis_id']}">${data[key]['jenis_nama']}</option>`;
                }
                $("#jenis_ibadah_peta").append(jenisBody);
            }
        });
    }
    jenis_ibadah_peta();

    function kabupaten_peta() {
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
                $("#kabupaten_peta").append(kabupatenBody);
            }
        });
    }
    kabupaten_peta();


    getData_peta();

  $(document).on("click", "#filter_peta", function(e) {
        e.preventDefault();

        
    var id_kab = $("#kabupaten_peta").val();
        var id_jenis = $("#jenis_ibadah_peta").val();
        

        if ((id_kab.length != 0 ) && (id_jenis.length != 0)) {
      // console.log("ini jenis="+id_jenis+" dan ini kabupaten="+id_kab);
      get_kab_by_id(id_kab, id_jenis);
    }
    else if((id_kab.length != 0) && (id_jenis.length == 0)){
      // console.log("ini kab ="+id_kab);
      get_kab_by_id(id_kab, '');
    }
    else if((id_kab.length == 0) && (id_jenis.length != 0)){
      // console.log("ini jenis ="+id_jenis); 
      getData_peta('', id_jenis);
    }
    else{
      getData_peta();
    }

    });


  function get_kab_by_id(kab, jenis){
    
    $.ajax({
          url: "<?php echo base_url(); ?>c_dashboard/load_kab_by",
          type: "post",
          data: {id_kab: kab},
          dataType: "json",
          success: function(data) {
              // console.log(data.kab_latitude);
              getData_peta_kab(data.kab_latitude, data.kab_longitude, kab, jenis);
          }
    });

  }

  
  function getData_peta_kab(lat, long, kab, jenis){

  // console.log("latitude="+lat, " & longitude="+long, " & kabupaten="+kab, " & jenis="+jenis);

            $.ajax({
            url: "<?php echo base_url(); ?>c_dashboard/load_data_to_tabel",
            type: "post",
            data: {
                    id_jenis: jenis,
                    id_kab: kab
                },
            dataType: "json",
            success: function(data) {
                // console.log("latitude="+lat, " & longitude="+long, data);
                
      navigator.geolocation.getCurrentPosition(function(location) {
          var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

          //map view 
          console.log(location.coords.latitude, location.coords.longitude);

          document.getElementById('mapid').innerHTML = "<div id='data_peta' style='height: 450px;'></div>";

          var mymap = L.map('data_peta').setView([lat, long], 14);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
          '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
          'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        }).addTo(mymap);
                             
        for(var i =0;i < data.length; i++){
          if (data[i].latitude != null || data[i].longitude != null) {
            // console.log(no = no +1);
            
            var icon_map = L.icon({
                    iconUrl: '<?= base_url('assets/foto/tempat_ibadah/mapicon/')?>'+data[i].mapicon,
                    iconSize:     [30, 30], // size of the icon
                });
                L.marker([data[i].latitude, data[i].longitude],{icon:icon_map}).addTo(mymap).bindPopup("<b>"+data[i].ti_nama+"</b><br>"+data[i].ti_alamat+"<br> <div class='row ml-1'><h6><a href='"+data[i].ti_id+"' class='btn btn-sm btn-outline-info' data-toggle='modal' data-target='#modal_detail"+data[i].ti_id+"'>Detail</a></h6><h6><a href='https://www.google.com/maps/dir/?api=1&origin="+location.coords.latitude+","+location.coords.longitude+"&destination="+data[i].latitude+","+data[i].longitude+"' class='btn btn-sm btn-outline-success' target='_blank'>Rute</a></h6></div>");
          }
        }


      });

        }
    });

    


}



function getData_peta(kab, jenis){
  $.ajax({
        url: "<?php echo base_url(); ?>c_dashboard/load_data_to_tabel",
        type: "post",
        data: {
            id_jenis: jenis,
            id_kab: kab
        },
        dataType: "json",
        success: function(data) {
            // console.log(data);

//load data

var datasearch = [] ;
for(var i =0;i < data.length; i++){
  if (data[i].latitude != null || data[i].longitude != null) {
    datasearch.push({"titik_koordinat":[data[i].latitude,data[i].longitude], "jenis":data[i].jenis_nama});
  }
}

// console.log(datasearch);

		
		
  
  


  navigator.geolocation.getCurrentPosition(function(location) {
      var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

      //map view 
      console.log(location.coords.latitude, location.coords.longitude);

      document.getElementById('mapid').innerHTML = "<div id='data_peta' style='height: 450px;'></div>";
      
      // var mymap = new L.map('data_peta').setView([-8.58280355011038, 116.13464826731037], 14);

      var mymap = new L.Map('data_peta', {zoom: 14, center: new L.latLng([-8.58280355011038, 116.13464826731037]) });

mymap.addLayer (new L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11',
    }));


  var markersLayer = new L.LayerGroup();	
	mymap.addLayer(markersLayer);

	mymap.addControl( new L.Control.Search({
    position:'topleft',	
		layer: markersLayer,
		initial: false,
    collapsed: true,
    zoom: 17
	}) );


    var mylocation = L.marker(latlng).addTo(mymap).bindPopup('Youre location!');


    for(var i =0;i < data.length; i++){
      if (data[i].latitude != null || data[i].longitude != null) {
        
        var icon_map = L.icon({
                iconUrl: '<?= base_url('assets/foto/tempat_ibadah/mapicon/')?>'+data[i].mapicon,
                iconSize:     [40, 40], // size of the icon
            });

            
            var nama_ti = data[i].ti_nama;
            var titik_koordinat = [data[i].latitude, data[i].longitude];
            
            marker = new L.Marker(new L.latLng(titik_koordinat), {title: nama_ti, icon:icon_map});

            marker.bindPopup("<b>"+data[i].ti_nama+"</b><br>"+data[i].ti_alamat+"<br> <div class='row ml-1'><h6><a href='"+data[i].ti_id+"' class='btn btn-sm btn-outline-info' data-toggle='modal' data-target='#modal_detail"+data[i].ti_id+"'>Detail</a></h6><h6><a href='https://www.google.com/maps/dir/?api=1&origin="+location.coords.latitude+","+location.coords.longitude+"&destination="+data[i].latitude+","+data[i].longitude+"' class='btn btn-sm btn-outline-success' target='_blank'>Rute</a></h6></div>");
            
            markersLayer.addLayer(marker);

      }
    }




  });





        }

    });

}


</script>




  
  

<?php foreach($list as $ti ) : ?>

  <div class="modal fade" id="modal_detail<?= $ti['ti_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel mb-2">

              <?php if ($ti['ti_jenis'] == '1'){ ?>
                <p>Detail Data Masjid</p>
              <?php } elseif ($ti['ti_jenis'] == '2') { ?>
                <p>Detail Data Pura</p>
              <?php } elseif ($ti['ti_jenis'] == '3') { ?>
                <p>Detail Data Gereja</p>
              <?php } elseif ($ti['ti_jenis'] == '4') { ?>
                <p>Detail Data Vihara</p>
              <?php } elseif ($ti['ti_jenis'] == '5') { ?>
                <p>Detail Data Klenteng</p>
              <?php } ?>

             </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                          <?php if ($ti['ti_jenis'] == '1') { ?>
                              <table class="table table-bordered">
                                <tbody>
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
                                    <td><?= $ti['kab_nama']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Kecamatan</td>
                                    <td><?= $ti['kec_nama']; ?></td>
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
                                    <td>No. Telepon</td>
                                    <td><?= $ti['ti_telepon']; ?></td>
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
                          <?php } elseif ($ti['ti_jenis'] == '2') { ?>
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
                                        <td>Kondisi</td>
                                        <td><?= $ti['ti_kondisi']; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Luas tanah</td>
                                        <td><?= $ti['ti_luas_tanah']; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Luas bangunan</td>
                                        <td><?= $ti['ti_luas_bangunan']; ?></td>
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
                          <?php } elseif ($ti['ti_jenis'] == '3') { ?>

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
                                  <td>Ketua</td>
                                  <td><?= $ti['ti_ketua']; ?></td>
                                </tr>
                                <tr>
                                  <td>Keterangan</td>
                                  <td><?= $ti['ti_keterangan']; ?></td>
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
                          <?php } elseif ($ti['ti_jenis'] == '4') { ?>
                            
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


                          <?php } elseif ($ti['ti_jenis'] == '5') { ?>

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
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
          
<?php endforeach; ?>


