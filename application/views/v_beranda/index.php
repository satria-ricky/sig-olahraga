

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
<div class="container">

 <div class="card ">


            <div class="card-header py-3">
            
           
                   
  
            
                    
              <div class="btn-group">
                
                <select class="custom-select mr-2" id="kabupaten" name="scrollkab" required="">
                      <option value="">--Pilih kabupaten--</option>
                </select>

                    <button type="button" id="filter" class="btn btn-primary btn-sm ml-2 mr-2">Filter</button> 

              </div>

          
              
            
            </div>
         

<div class="row" id="data_beranda">

            
</div>
 </div>

<!-- Earnings (Monthly) Card Example -->
            
          
</div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

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
                $("#kabupaten").append(kabupatenBody);
            }
        });
    }
    kabupaten();

$(document).on("click", "#filter", function(e) {
        e.preventDefault();

        
        var id_kab = $("#kabupaten").val();
         

        if(id_kab.length != 0){
          // console.log("ini kab ="+id_kab);
          getData(id_kab);
        }
        else{
         
          getData();
          // console.log("gk ada");
        }

    });

getData();

function getData(id_kab){
  $.ajax({
      type: "POST",
      url: "<?= base_url('c_tempat_ibadah/load_beranda'); ?>",
      data: {
        id_kab : id_kab
      },
      dataType : "JSON",
      success: function(response){
        // console.log(response);
        $('#data_beranda').html(response);
      }
    
    });
}


function masjid() {
  // console.log("masjid");
  window.location.href="<?= base_url(); ?>c_tempat_ibadah/masjid";
}

function gereja() {
  // console.log("masjid");
  window.location.href="<?= base_url(); ?>c_tempat_ibadah/gereja";
}

function pura() {
  // console.log("masjid");
  window.location.href="<?= base_url(); ?>c_tempat_ibadah/pura";
}

function vihara() {
  // console.log("masjid");
  window.location.href="<?= base_url(); ?>c_tempat_ibadah/vihara";
}

function klenteng() {
  // console.log("masjid");
  window.location.href="<?= base_url(); ?>c_tempat_ibadah/klenteng";
}


</script>