<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH.'third_party/PHPExcel/PHPExcel.php';

class C_tempat_ibadah extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_login();
        
        
        
        $this->load->library('googlemaps');
    }


    public function load_beranda(){
        $v_kab = $this->input->post('id_kab');


       if( strlen($v_kab) != 0 ){
            $v_data['total_masjid'] = $this->M_tempat_ibadah->total_masjid_by_kab($v_kab);
            $v_data['total_pura'] = $this->M_tempat_ibadah->total_pura_by_kab($v_kab);
            $v_data['total_gereja'] = $this->M_tempat_ibadah->total_gereja_by_kab($v_kab);
            $v_data['total_vihara'] = $this->M_tempat_ibadah->total_vihara_by_kab($v_kab);
            $v_data['total_klenteng'] = $this->M_tempat_ibadah->total_klenteng_by_kab($v_kab);

        }else{
            $v_data['total_masjid'] = $this->M_tempat_ibadah->total_masjid();
            $v_data['total_pura'] = $this->M_tempat_ibadah->total_pura();
            $v_data['total_gereja'] = $this->M_tempat_ibadah->total_gereja();
            $v_data['total_vihara'] = $this->M_tempat_ibadah->total_vihara();
            $v_data['total_klenteng'] = $this->M_tempat_ibadah->total_klenteng();

            
        }

        
            $output = '
            
            <div class="col-xl-3 col-md-6 mb-4" onclick="masjid()" style="cursor: pointer;">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-large font-weight-bold text-primary text-uppercase mb-1">Masjid</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> 

                        '.$v_data['total_masjid'].'

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-mosque fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
            
            


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4" onclick="gereja()" style="cursor: pointer;">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-large font-weight-bold text-success text-uppercase mb-1">Gereja</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                        '.$v_data['total_gereja'].'

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-church fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4" onclick="pura()" style="cursor: pointer;">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-large font-weight-bold text-primary text-uppercase mb-1">Pura</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                        '.$v_data['total_pura'].'

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-gopuram fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4" onclick="vihara()" style="cursor: pointer;">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-large font-weight-bold text-success text-uppercase mb-1">Vihara</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        
                        '.$v_data['total_vihara'].'

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-vihara fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4" onclick="klenteng()" style="cursor: pointer;">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-large font-weight-bold text-success text-uppercase mb-1">Klenteng</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                          
                          '.$v_data['total_klenteng'].'

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-gopuram fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>';

            echo json_encode($output);

    }

    public function beranda(){  
        
        $v_data['judul'] = 'BERANDA';
        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        $v_data['total_masjid'] = $this->M_tempat_ibadah->total_masjid();
        $v_data['total_pura'] = $this->M_tempat_ibadah->total_pura();
        $v_data['total_gereja'] = $this->M_tempat_ibadah->total_gereja();
        $v_data['total_vihara'] = $this->M_tempat_ibadah->total_vihara();
        $v_data['total_klenteng'] = $this->M_tempat_ibadah->total_klenteng();
        
        $v_data['tittle'] = 'Beranda';
        $this->load->view('templates/header', $v_data);
        $this->load->view('templates/sidebar', $v_data);
        $this->load->view('templates/topbar', $v_data);
        $this->load->view('v_beranda/index',$v_data);
        $this->load->view('templates/footer');
        
    }



    function validasi_kabupaten($id_kab)
    {
        // 'none' is the first option that is default "-------Choose City-------"
        if($id_kab == ""){
            $this->form_validation->set_message('validasi_kabupaten', 'Pilih kabupaten!');
            return false;
        } else{
            return true;
        }

    }

    function validasi_kecamatan($id_kec)
    {
        // 'none' is the first option that is default "-------Choose City-------"
        if($id_kec == ""){
            $this->form_validation->set_message('validasi_kecamatan', 'Pilih kecamatan!');
            return false;
        } else{
            return true;
        }

    }

    function validasi_tipologi($id)
    {
        // 'none' is the first option that is default "-------Choose City-------"
        if($id == ""){
            $this->form_validation->set_message('validasi_tipologi', 'Pilih tipologi!');
            return false;
        } else{
            return true;
        }

    }

    public function getKecamatan(){
        $idkec = $this->input->post('id');
        $v_data = $this->M_tempat_ibadah->selectKecamatan($idkec);
        $output = '<option value="">--Pilih kecamatan--</option>';
        foreach ($v_data as $row){
            $output .= '<option value="'.$row['kec_id'].'">'.$row['kec_nama'].'</option>';
        }
        echo json_encode($output);
    }



    //PETA


    public function peta (){
        
        $v_data['judul'] = 'PETA';
        $v_data['tittle'] = 'Peta tempat ibadah';

        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);

        $v_data['list_jenis'] = $this->M_tempat_ibadah->selectAlljenis();
        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();
        
        $v_data['list'] = $this->M_tempat_ibadah->selectAlltempatIbadah();

        $this->load->view('templates/header',  $v_data);
        $this->load->view('templates/sidebar', $v_data);
        $this->load->view('templates/topbar', $v_data);
        $this->load->view('v_maps/maps',$v_data);
        $this->load->view('templates/footer'); 
    }

    public function kelola_peta (){
        
        $v_data['judul'] = 'KELOLA PETA';
        $v_data['tittle'] = 'Peta tempat ibadah';

        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);

        $v_data['list_jenis'] = $this->M_tempat_ibadah->selectAlljenis();
        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();
        
        $v_data['list'] = $this->M_tempat_ibadah->selectAlltempatIbadah();

        $this->load->view('templates/header',  $v_data);
        $this->load->view('templates/sidebar', $v_data);
        $this->load->view('templates/topbar', $v_data);
        $this->load->view('v_maps/kelola_maps',$v_data);
        $this->load->view('templates/footer'); 
    }




//---------MASJID

    public function load_masjid(){

        $v_kab = $this->input->post('id_kab');


       if( strlen($v_kab) != 0 ){
            $data = $this->M_tempat_ibadah->selectMasjidByKab($v_kab);  

        }else{
           
            $data = $this->M_tempat_ibadah->selectMasjid();
        }

            echo json_encode($data);

    }



    public function masjid(){
        $v_data['judul'] = 'DAFTAR MASJID';
        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        $v_data['list_tempat_ibadah'] = $this->M_tempat_ibadah->selectMasjid();
        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();

        $v_data['tittle'] = 'Daftar masjid';
        $this->load->view('templates/header', $v_data);
        $this->load->view('templates/sidebar', $v_data);
        $this->load->view('templates/topbar',$v_data);
        $this->load->view('v_daftar_tempat_ibadah/masjid/masjid', $v_data);
        $this->load->view('templates/footer');
    }


    public function tambahMasjid(){
        $v_data['judul'] = 'TAMBAH DATA MASJID';

        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();
        $v_data['tittle'] = 'Tambah data masjid';

        $this->form_validation->set_rules('scrollkab','Scrollkab','required|callback_validasi_kabupaten');
        $this->form_validation->set_rules('scrollkec','Scrollkec','required|callback_validasi_kecamatan');
        $this->form_validation->set_rules('scrolltip','Scrolltip','required|callback_validasi_tipologi');


        $this->form_validation->set_rules('nama_masjid', 'Nama_masjid', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        


        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('v_daftar_tempat_ibadah/masjid/tambah_masjid', $v_data);
            $this->load->view('templates/footer');

        }else{
            $v_kabupaten = $this->input->post('scrollkab');
            $v_kecamatan = $this->input->post('scrollkec');
            $v_tipologi = $this->input->post('scrolltip');
            $v_nama     = $this->input->post('nama_masjid');
            $v_alamat = $this->input->post('alamat');
            $v_luas_tanah = $this->input->post('luas_tanah');
            $v_status_tanah = $this->input->post('status_tanah');
            $v_luas_bangunan = $this->input->post('luas_bangunan');
            $v_tahun_berdiri = $this->input->post('tahun_berdiri');
            $v_jamaah = $this->input->post('jamaah');
            $v_imam = $this->input->post('imam');
            $v_khatib = $this->input->post('khatib');
            $v_remaja = $this->input->post('remaja');
            $v_telepon = $this->input->post('telepon');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');

            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/tempat_ibadah/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){
                    $v_nama_foto = $this->upload->data('file_name');
                                    
                    $v_data = [
                        'ti_jenis' => '1',
                        'ti_tipologi' => $v_tipologi,
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_luas_tanah' => $v_luas_tanah,
                        'ti_status_tanah' => $v_status_tanah,
                        'ti_luas_bangunan' => $v_luas_bangunan,
                        'ti_tahun_berdiri' => $v_tahun_berdiri,
                        'ti_jamaah' => $v_jamaah,
                        'ti_imam' => $v_imam,
                        'ti_khatib' => $v_khatib,
                        'ti_remaja' => $v_remaja,
                        'ti_telepon' => $v_telepon,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'ti_foto' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                $v_data = [
                        'ti_jenis' => '1',
                        'ti_tipologi' => $v_tipologi,
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_luas_tanah' => $v_luas_tanah,
                        'ti_status_tanah' => $v_status_tanah,
                        'ti_luas_bangunan' => $v_luas_bangunan,
                        'ti_tahun_berdiri' => $v_tahun_berdiri,
                        'ti_jamaah' => $v_jamaah,
                        'ti_imam' => $v_imam,
                        'ti_khatib' => $v_khatib,
                        'ti_remaja' => $v_remaja,
                        'ti_telepon' => $v_telepon,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'ti_foto' => 'masjid.png'
                    ];
            }

            $this->M_tempat_ibadah->create_ti($v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
            redirect('c_tempat_ibadah/masjid');

        }
    }



    public function edit_masjid($v_id)
    {
        $v_data['judul'] = 'EDIT DATA MASJID';

        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        $v_data['tempat_ibadah'] = $this->M_tempat_ibadah->selectById($v_id);

        $v_data['list_tipologi'] = ['Masjid Jami', 'Masjid Raya'];
        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();
        $v_data['list_kecamatan'] = $this->M_tempat_ibadah->selectKecamatan($v_data['tempat_ibadah']['ti_kabupaten']);
        
        $v_data['tittle'] = 'Edit data tempat ibadah';
        

        $this->form_validation->set_rules('scrollkec','Scrollkec','required|callback_validasi_kecamatan');

        $this->form_validation->set_rules('nama_masjid', 'Nama_masjid', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);



        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar', $v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('v_daftar_tempat_ibadah/masjid/edit_masjid', $v_data);
            $this->load->view('templates/footer');

        }else{
            $v_id = $this->input->post('id_tempat_ibadah');
            $v_kabupaten = $this->input->post('scrollkab');
            $v_kecamatan = $this->input->post('scrollkec');
            $v_tipologi = $this->input->post('scrolltip');
            $v_nama     = $this->input->post('nama_masjid');
            $v_alamat = $this->input->post('alamat');
            $v_luas_tanah = $this->input->post('luas_tanah');
            $v_status_tanah = $this->input->post('status_tanah');
            $v_luas_bangunan = $this->input->post('luas_bangunan');
            $v_tahun_berdiri = $this->input->post('tahun_berdiri');
            $v_jamaah = $this->input->post('jamaah');
            $v_imam = $this->input->post('imam');
            $v_khatib = $this->input->post('khatib');
            $v_remaja = $this->input->post('remaja');
            $v_telepon = $this->input->post('telepon');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');

            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/tempat_ibadah/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){
                    $v_nama_foto = $this->upload->data('file_name');
                    
                    $v_foto_lama = $v_data['tempat_ibadah']['ti_foto'];

                    if($v_foto_lama != 'masjid.png'){
                            unlink(FCPATH . 'assets/foto/tempat_ibadah/' . $v_foto_lama);
                    }

                    $v_data = [
                        'ti_tipologi' => $v_tipologi,
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_luas_tanah' => $v_luas_tanah,
                        'ti_status_tanah' => $v_status_tanah,
                        'ti_luas_bangunan' => $v_luas_bangunan,
                        'ti_tahun_berdiri' => $v_tahun_berdiri,
                        'ti_jamaah' => $v_jamaah,
                        'ti_imam' => $v_imam,
                        'ti_khatib' => $v_khatib,
                        'ti_remaja' => $v_remaja,
                        'ti_telepon' => $v_telepon,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'ti_foto' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                $v_data = [
                        'ti_tipologi' => $v_tipologi,
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_luas_tanah' => $v_luas_tanah,
                        'ti_status_tanah' => $v_status_tanah,
                        'ti_luas_bangunan' => $v_luas_bangunan,
                        'ti_tahun_berdiri' => $v_tahun_berdiri,
                        'ti_jamaah' => $v_jamaah,
                        'ti_imam' => $v_imam,
                        'ti_khatib' => $v_khatib,
                        'ti_remaja' => $v_remaja,
                        'ti_telepon' => $v_telepon,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude
                    ];
            }

            $this->M_tempat_ibadah->edit_ti($v_id, $v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
            redirect('c_tempat_ibadah/masjid');

        }


    }




    public function import_masjid(){

        $v_kabupaten = $this->input->post('scrollkab');
        $list_kecamatan = $this->M_kab_kec->selectAllkecamatan();
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'xls|xlsx|csv';
        $v_nama_file = $_FILES['filemasjid']['name'];
        $config['file_name'] = $v_nama_file;
        
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('filemasjid')){

            $obj = PHPExcel_IOFactory::load(FCPATH.'./assets/uploads/'.$v_nama_file);
            $all_data = $obj -> getActiveSheet() -> toArray(null, true, true, true);
            
            $v_kecamatan = '';
            
            for ($i = 3; $i <= count($all_data); $i++){
                
                if ($all_data[$i]['A'] != "") { //$all_data[$i]['A'] = baris $i dan kolom A yang ada di excel 
                    
                    $data_kecamatan = ucwords(strtolower($all_data[$i]['B']));

                    foreach($list_kecamatan as $k ){
                        if($k['kec_nama'] == $data_kecamatan){
                          $v_kecamatan = $k['kec_id'];
                        }
                    }

                    $v_data = [
                        'ti_jenis' => '1',
                        'ti_tipologi' => $all_data[$i]['D'],
                        'ti_nama' => $all_data[$i]['C'],
                        'ti_alamat' => $all_data[$i]['E'],
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_luas_tanah' => $all_data[$i]['F'],
                        'ti_status_tanah' => $all_data[$i]['G'],
                        'ti_luas_bangunan' => $all_data[$i]['H'],
                        'ti_tahun_berdiri' => $all_data[$i]['I'],
                        'ti_jamaah' => $all_data[$i]['J'],
                        'ti_imam' => $all_data[$i]['K'],
                        'ti_khatib' => $all_data[$i]['L'],
                        'ti_remaja' => $all_data[$i]['M'],
                        'ti_telepon' => $all_data[$i]['N'],
                        'latitude' => $all_data[$i]['O'],
                        'longitude' => $all_data[$i]['P'],
                        'ti_foto' => 'masjid.png'
                    ];


                    $this->M_tempat_ibadah->create_ti($v_data); 
                }
            }

            unlink(FCPATH.'./assets/uploads/'.$v_nama_file);
        }
        else{
            echo $this->upload->display_errors();
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
            redirect('c_tempat_ibadah/masjid');

    }


    public function format_masjid(){    

        $obj = new PHPExcel();
        
        $obj->getProperties()->setCreator("creator Macan");
        $obj->getProperties()->setLastModifiedBy("last modify Macan");
        $obj->getProperties()->setTitle("Title Macan");

        $obj->setActiveSheetIndex(0);

        $obj->getActiveSheet()->setCellValue('A1', 'Format Data Masjid');
        $obj->getActiveSheet()->setCellValue('A2', 'No');
        $obj->getActiveSheet()->setCellValue('B2', 'Kecamatan');
        $obj->getActiveSheet()->setCellValue('C2', 'Nama Masjid');
        $obj->getActiveSheet()->setCellValue('D2', 'Tipologi');
        $obj->getActiveSheet()->setCellValue('E2', 'Alamat');
        $obj->getActiveSheet()->setCellValue('F2', 'Luas Tanah');
        $obj->getActiveSheet()->setCellValue('G2', 'Status Tanah');
        $obj->getActiveSheet()->setCellValue('H2', 'Luas bangunan');
        $obj->getActiveSheet()->setCellValue('I2', 'Tahun berdiri');
        $obj->getActiveSheet()->setCellValue('J2', 'Jamaah');
        $obj->getActiveSheet()->setCellValue('K2', 'Imam');
        $obj->getActiveSheet()->setCellValue('L2', 'Khatib');
        $obj->getActiveSheet()->setCellValue('M2', 'Remaja');
        $obj->getActiveSheet()->setCellValue('N2', 'No. Telp/HP');
        $obj->getActiveSheet()->setCellValue('O2', 'Latitude');
        $obj->getActiveSheet()->setCellValue('P2', 'Longitude');




        $namafile = "Data_Masjid" .time(). '.xlsx';
        $obj->getActiveSheet()->setTitle("Format Masjid");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreedsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$namafile.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($obj, 'Excel2007');
        $writer->save('php://output');
        exit;

    }


    public function export_masjid(){    

        $data_ti = $this->M_tempat_ibadah->selectMasjid();
        
        $obj = new PHPExcel();
        
        $obj->getProperties()->setCreator("creator Macan");
        $obj->getProperties()->setLastModifiedBy("last modify Macan");
        $obj->getProperties()->setTitle("Title Macan");

        $obj->setActiveSheetIndex(0);

        $obj->getActiveSheet()->setCellValue('A1', 'Data Masjid');
        $obj->getActiveSheet()->setCellValue('A2', 'No');
        $obj->getActiveSheet()->setCellValue('B2', 'Kabupaten');
        $obj->getActiveSheet()->setCellValue('C2', 'Kecamatan');
        $obj->getActiveSheet()->setCellValue('D2', 'Nama Masjid');
        $obj->getActiveSheet()->setCellValue('E2', 'Tipologi');
        $obj->getActiveSheet()->setCellValue('F2', 'Alamat');
        $obj->getActiveSheet()->setCellValue('G2', 'Luas Tanah');
        $obj->getActiveSheet()->setCellValue('H2', 'Status Tanah');
        $obj->getActiveSheet()->setCellValue('I2', 'Luas bangunan');
        $obj->getActiveSheet()->setCellValue('J2', 'Tahun berdiri');
        $obj->getActiveSheet()->setCellValue('K2', 'Jamaah');
        $obj->getActiveSheet()->setCellValue('L2', 'Imam');
        $obj->getActiveSheet()->setCellValue('M2', 'Khatib');
        $obj->getActiveSheet()->setCellValue('N2', 'Remaja');
        $obj->getActiveSheet()->setCellValue('O2', 'No. Telp/HP');
        $obj->getActiveSheet()->setCellValue('P2', 'Latitude');
        $obj->getActiveSheet()->setCellValue('Q2', 'Longitude');

        $no = 1;
        $baris = 3;
        foreach ($data_ti as $v_data) {
            $obj->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $obj->getActiveSheet()->setCellValue('B'.$baris, $v_data['kab_nama']);
            $obj->getActiveSheet()->setCellValue('C'.$baris, $v_data['kec_nama']);
            $obj->getActiveSheet()->setCellValue('D'.$baris, $v_data['ti_nama']);
            $obj->getActiveSheet()->setCellValue('E'.$baris, $v_data['ti_tipologi']);
            $obj->getActiveSheet()->setCellValue('F'.$baris, $v_data['ti_alamat']);
            $obj->getActiveSheet()->setCellValue('G'.$baris, $v_data['ti_luas_tanah']);
            $obj->getActiveSheet()->setCellValue('H'.$baris, $v_data['ti_status_tanah']);
            $obj->getActiveSheet()->setCellValue('I'.$baris, $v_data['ti_luas_bangunan']);
            $obj->getActiveSheet()->setCellValue('J'.$baris, $v_data['ti_tahun_berdiri']);
            $obj->getActiveSheet()->setCellValue('K'.$baris, $v_data['ti_jamaah']);
            $obj->getActiveSheet()->setCellValue('L'.$baris, $v_data['ti_imam']);
            $obj->getActiveSheet()->setCellValue('M'.$baris, $v_data['ti_khatib']);
            $obj->getActiveSheet()->setCellValue('N'.$baris, $v_data['ti_remaja']);
            $obj->getActiveSheet()->setCellValue('O'.$baris, $v_data['ti_telepon']);
            $obj->getActiveSheet()->setCellValue('P'.$baris, $v_data['latitude']);
            $obj->getActiveSheet()->setCellValue('Q'.$baris, $v_data['longitude']);
            $baris++;
        }


        $namafile = "Data_Masjid".time().'.xlsx';
        $obj->getActiveSheet()->setTitle("Data Masjid");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreedsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$namafile.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($obj, 'Excel2007');
        $writer->save('php://output');
        exit;

    }



    public function hapus_masjid($v_id){
        $hapus_foto = $this->M_tempat_ibadah->selectById($v_id);
        
        if($hapus_foto['ti_foto'] != 'masjid.png'){
            unlink(FCPATH . 'assets/foto/tempat_ibadah/' . $hapus_foto['ti_foto']);
           
        }
        
        $this->M_tempat_ibadah->hapus_ti($v_id);
        
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('c_tempat_ibadah/masjid');
    }



//---------GEREJA

    public function load_gereja(){

        $v_kab = $this->input->post('id_kab');


       if( strlen($v_kab) != 0 ){

            $data = $this->M_tempat_ibadah->selectGerejaByKab($v_kab);  

        }else{
           
            $data = $this->M_tempat_ibadah->selectGereja();
        }

            echo json_encode($data);

    }


    public function gereja(){
        $v_data['judul'] = 'DAFTAR GEREJA';
        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }
        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        $v_data['list_tempat_ibadah'] = $this->M_tempat_ibadah->selectGereja();
        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();

        $v_data['tittle'] = 'Daftar gereja';
        $this->load->view('templates/header', $v_data);
        $this->load->view('templates/sidebar', $v_data);
        $this->load->view('templates/topbar',$v_data);
        $this->load->view('v_daftar_tempat_ibadah/gereja/gereja', $v_data);
        $this->load->view('templates/footer');
    }


    public function tambahGereja(){
        $v_data['judul'] = 'TAMBAH DATA GEREJA';
        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();
        $v_data['tittle'] = 'Tambah data gereja';

        $this->form_validation->set_rules('scrollkab','Scrollkab','required|callback_validasi_kabupaten');
        $this->form_validation->set_rules('scrollkec','Scrollkec','required|callback_validasi_kecamatan');


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        
        $this->form_validation->set_rules('ketua', 'Ketua', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        


        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('v_daftar_tempat_ibadah/gereja/tambah_gereja', $v_data);
            $this->load->view('templates/footer');

        }else{
            $v_kabupaten = $this->input->post('scrollkab');
            $v_kecamatan = $this->input->post('scrollkec');
            $v_nama     = $this->input->post('nama');
            $v_alamat = $this->input->post('alamat');
            $v_ketua = $this->input->post('ketua');
            $v_keterangan = $this->input->post('keterangan');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');

            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/tempat_ibadah/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){

                    $v_nama_foto = $this->upload->data('file_name');
                                    
                    $v_data = [
                        'ti_jenis' => '3',
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_ketua' => $v_ketua,
                        'ti_keterangan' => $v_keterangan,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'ti_foto' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                    $v_data = [
                        'ti_jenis' => '3',
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_ketua' => $v_ketua,
                        'ti_keterangan' => $v_keterangan,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'ti_foto' => 'gereja.jpg'
                    ];
            }

            $this->M_tempat_ibadah->create_ti($v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
            redirect('c_tempat_ibadah/gereja');

        }
    }



    public function edit_gereja($v_id)
    {
        $v_data['judul'] = 'EDIT DATA GEREJA';
        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }


        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        $v_data['tempat_ibadah'] = $this->M_tempat_ibadah->selectById($v_id);

        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();
        $v_data['list_kecamatan'] = $this->M_tempat_ibadah->selectKecamatan($v_data['tempat_ibadah']['ti_kabupaten']);
        
        $v_data['tittle'] = 'Edit data gereja';
        

        $this->form_validation->set_rules('scrollkec','Scrollkec','required|callback_validasi_kecamatan');

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('ketua', 'Ketua', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);



        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar', $v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('v_daftar_tempat_ibadah/gereja/edit_gereja', $v_data);
            $this->load->view('templates/footer');

        }else{
            $v_id = $this->input->post('id_tempat_ibadah');
            $v_kabupaten = $this->input->post('scrollkab');
            $v_kecamatan = $this->input->post('scrollkec');
            $v_nama     = $this->input->post('nama');
            $v_alamat = $this->input->post('alamat');
            $v_ketua = $this->input->post('ketua');
            $v_keterangan = $this->input->post('keterangan');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');

            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/tempat_ibadah/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){
                    $v_nama_foto = $this->upload->data('file_name');
                    
                    $v_foto_lama = $v_data['tempat_ibadah']['ti_foto'];

                    if($v_foto_lama != 'gereja.jpg'){
                            unlink(FCPATH . 'assets/foto/tempat_ibadah/' . $v_foto_lama);
                    }

                    $v_data = [
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_ketua' => $v_ketua,
                        'ti_keterangan' => $v_keterangan,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'ti_foto' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                $v_data = [
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_ketua' => $v_ketua,
                        'ti_keterangan' => $v_keterangan,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude
                    ];
            }

            $this->M_tempat_ibadah->edit_ti($v_id, $v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
            redirect('c_tempat_ibadah/gereja');

        }


    }




    public function import_gereja(){

        $v_kabupaten = $this->input->post('scrollkab');
        $list_kecamatan = $this->M_kab_kec->selectAllkecamatan();

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'xls|xlsx|csv';
        $v_nama_file = $_FILES['file_import']['name'];
        $config['file_name'] = $v_nama_file;
        
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_import')){

            $obj = PHPExcel_IOFactory::load(FCPATH.'./assets/uploads/'.$v_nama_file);
            $all_data = $obj -> getActiveSheet() -> toArray(null, true, true, true);
            
            $v_kecamatan = '';
            
            for ($i = 3; $i <= count($all_data); $i++){
                
                if ($all_data[$i]['A'] != "") { //$all_data[$i]['A'] = baris $i dan kolom A yang ada di excel 
                    
                    $data_kecamatan = ucwords(strtolower($all_data[$i]['B']));

                    foreach($list_kecamatan as $k ){
                        if($k['kec_nama'] == $data_kecamatan){
                          $v_kecamatan = $k['kec_id'];
                        }
                    }

                    $v_data = [
                        'ti_jenis' => '3',
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_nama' => $all_data[$i]['C'],
                        'ti_ketua' => $all_data[$i]['D'],
                        'ti_alamat' => $all_data[$i]['E'],
                        'ti_keterangan' => $all_data[$i]['F'],
                        'latitude' => $all_data[$i]['G'],
                        'longitude' => $all_data[$i]['H'],
                        'ti_foto' => 'gereja.jpg'
                    ];


                    $this->M_tempat_ibadah->create_ti($v_data); 
                }
            }

            unlink(FCPATH.'./assets/uploads/'.$v_nama_file);
        }
        else{
            echo $this->upload->display_errors();
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
            redirect('c_tempat_ibadah/gereja');


    }


    public function format_gereja(){    

        $obj = new PHPExcel();
        
        $obj->getProperties()->setCreator("creator Macan");
        $obj->getProperties()->setLastModifiedBy("last modify Macan");
        $obj->getProperties()->setTitle("Title Macan");

        $obj->setActiveSheetIndex(0);

        $obj->getActiveSheet()->setCellValue('A1', 'Format Data Gereja');
        $obj->getActiveSheet()->setCellValue('A2', 'No');
        $obj->getActiveSheet()->setCellValue('B2', 'Kecamatan');
        $obj->getActiveSheet()->setCellValue('C2', 'Nama Gereja');
        $obj->getActiveSheet()->setCellValue('D2', 'Pimpinan/Ketua');
        $obj->getActiveSheet()->setCellValue('E2', 'Alamat');
        $obj->getActiveSheet()->setCellValue('F2', 'Keterangan');
        $obj->getActiveSheet()->setCellValue('G2', 'Latitude');
        $obj->getActiveSheet()->setCellValue('H2', 'Longitude');

        $namafile = "Data_Gereja" .time().'.xlsx';
        $obj->getActiveSheet()->setTitle("Format Gereja");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreedsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$namafile.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($obj, 'Excel2007');
        $writer->save('php://output');
        exit;

    }


    public function export_gereja(){    

        $data_ti = $this->M_tempat_ibadah->selectGereja();
        
        $obj = new PHPExcel();
        
        $obj->getProperties()->setCreator("creator Macan");
        $obj->getProperties()->setLastModifiedBy("last modify Macan");
        $obj->getProperties()->setTitle("Title Macan");

        $obj->setActiveSheetIndex(0);

        $obj->getActiveSheet()->setCellValue('A1', 'Data Gereja');
        $obj->getActiveSheet()->setCellValue('A2', 'No');
        $obj->getActiveSheet()->setCellValue('B2', 'Kabupaten');
        $obj->getActiveSheet()->setCellValue('C2', 'Kecamatan');
        $obj->getActiveSheet()->setCellValue('D2', 'Nama Gereja');
        $obj->getActiveSheet()->setCellValue('E2', 'Pimpinan/Ketua');
        $obj->getActiveSheet()->setCellValue('F2', 'Alamat');
        $obj->getActiveSheet()->setCellValue('G2', 'Keterangan');
        $obj->getActiveSheet()->setCellValue('H2', 'Latitude');
        $obj->getActiveSheet()->setCellValue('I2', 'Longitude');

        $no = 1;
        $baris = 3;
        foreach ($data_ti as $v_data) {
            $obj->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $obj->getActiveSheet()->setCellValue('B'.$baris, $v_data['kab_nama']);
            $obj->getActiveSheet()->setCellValue('C'.$baris, $v_data['kec_nama']);
            $obj->getActiveSheet()->setCellValue('D'.$baris, $v_data['ti_nama']);
            $obj->getActiveSheet()->setCellValue('E'.$baris, $v_data['ti_ketua']);
            $obj->getActiveSheet()->setCellValue('F'.$baris, $v_data['ti_alamat']);
            $obj->getActiveSheet()->setCellValue('G'.$baris, $v_data['ti_keterangan']);
            $obj->getActiveSheet()->setCellValue('H'.$baris, $v_data['latitude']);
            $obj->getActiveSheet()->setCellValue('I'.$baris, $v_data['longitude']);
            $baris++;
        }


        $namafile = "Data_Gereja" . time() .'.xlsx';
        $obj->getActiveSheet()->setTitle("Data Gereja");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreedsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$namafile.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($obj, 'Excel2007');
        $writer->save('php://output');
        exit;

    }


    public function hapus_gereja($v_id){
        $hapus_foto = $this->M_tempat_ibadah->selectById($v_id);
        
        if($hapus_foto['ti_foto'] != 'gereja.jpg'){
            unlink(FCPATH . 'assets/foto/tempat_ibadah/' . $hapus_foto['ti_foto']);
            
        }

        $this->M_tempat_ibadah->hapus_ti($v_id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('c_tempat_ibadah/gereja');
    }




//---------PURA

    public function load_pura(){

        $v_kab = $this->input->post('id_kab');


       if( strlen($v_kab) != 0 ){
        
            $data = $this->M_tempat_ibadah->selectPuraByKab($v_kab);  

        }else{
           
            $data = $this->M_tempat_ibadah->selectPura();
        }

            echo json_encode($data);

    }



public function pura(){
    $v_data['judul'] = 'DAFTAR PURA';
        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);

        $v_data['list_tempat_ibadah'] = $this->M_tempat_ibadah->selectPura();
        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();

        $v_data['tittle'] = 'Daftar pura';
        $this->load->view('templates/header', $v_data);
        $this->load->view('templates/sidebar', $v_data);
        $this->load->view('templates/topbar', $v_data);
        $this->load->view('v_daftar_tempat_ibadah/pura/pura', $v_data);
        $this->load->view('templates/footer');
    }


    public function tambahPura(){
        $v_data['judul'] = 'DAFTAR DATA PURA';
        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();
        $v_data['tittle'] = 'Tambah data pura';

        $this->form_validation->set_rules('scrollkab','Scrollkab','required|callback_validasi_kabupaten');
        $this->form_validation->set_rules('scrollkec','Scrollkec','required|callback_validasi_kecamatan');


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        


        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('v_daftar_tempat_ibadah/pura/tambah_pura', $v_data);
            $this->load->view('templates/footer');

        }else{
            $v_kabupaten = $this->input->post('scrollkab');
            $v_kecamatan = $this->input->post('scrollkec');
            $v_nama     = $this->input->post('nama');
            $v_alamat = $this->input->post('alamat');
            $v_kondisi = $this->input->post('kondisi');
            $v_luas_bangunan = $this->input->post('luas_bangunan');
            $v_luas_tanah = $this->input->post('luas_tanah');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');

            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/tempat_ibadah/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){

                    $v_nama_foto = $this->upload->data('file_name');
                                    
                    $v_data = [
                        'ti_jenis' => '2',
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_kondisi' => $v_kondisi,
                        'ti_luas_bangunan' => $v_luas_bangunan,
                        'ti_luas_tanah' => $v_luas_tanah,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'ti_foto' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                    $v_data = [
                        'ti_jenis' => '2',
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_kondisi' => $v_kondisi,
                        'ti_luas_bangunan' => $v_luas_bangunan,
                        'ti_luas_tanah' => $v_luas_tanah,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'ti_foto' => 'pura.jpg'
                    ];
            }

            $this->M_tempat_ibadah->create_ti($v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
            redirect('c_tempat_ibadah/pura');

        }
    }



    public function edit_pura($v_id)
    {
        $v_data['judul'] = 'EDIT DATA PURA';
        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);

        $v_data['tempat_ibadah'] = $this->M_tempat_ibadah->selectById($v_id);

        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();
        $v_data['list_kecamatan'] = $this->M_tempat_ibadah->selectKecamatan($v_data['tempat_ibadah']['ti_kabupaten']);
        
        $v_data['tittle'] = 'Edit data pura';
        

        $this->form_validation->set_rules('scrollkec','Scrollkec','required|callback_validasi_kecamatan');

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);




        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar', $v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('v_daftar_tempat_ibadah/pura/edit_pura', $v_data);
            $this->load->view('templates/footer');

        }else{
            $v_id = $this->input->post('id_tempat_ibadah');
            $v_kabupaten = $this->input->post('scrollkab');
            $v_kecamatan = $this->input->post('scrollkec');
            $v_nama     = $this->input->post('nama');
            $v_alamat = $this->input->post('alamat');
            $v_kondisi = $this->input->post('kondisi');
            $v_luas_bangunan = $this->input->post('luas_bangunan');
            $v_luas_tanah = $this->input->post('luas_tanah');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');

            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/tempat_ibadah/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){
                    $v_nama_foto = $this->upload->data('file_name');
                    
                    $v_foto_lama = $v_data['tempat_ibadah']['ti_foto'];

                    if($v_foto_lama != 'pura.jpg'){
                            unlink(FCPATH . 'assets/foto/tempat_ibadah/' . $v_foto_lama);
                    }

                    $v_data = [
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_kondisi' => $v_kondisi,
                        'ti_luas_bangunan' => $v_luas_bangunan,
                        'ti_luas_tanah' => $v_luas_tanah,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'ti_foto' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                $v_data = [
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_kondisi' => $v_kondisi,
                        'ti_luas_bangunan' => $v_luas_bangunan,
                        'ti_luas_tanah' => $v_luas_tanah,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude
                    ];
            }

            $this->M_tempat_ibadah->edit_ti($v_id, $v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
            redirect('c_tempat_ibadah/pura');

        }


    }




    public function import_pura(){

        $v_kabupaten = $this->input->post('scrollkab');
        $list_kecamatan = $this->M_kab_kec->selectAllkecamatan();

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'xls|xlsx|csv';
        $v_nama_file = $_FILES['file_import']['name'];
        $config['file_name'] = $v_nama_file;
        
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_import')){

            $obj = PHPExcel_IOFactory::load(FCPATH.'./assets/uploads/'.$v_nama_file);
            $all_data = $obj -> getActiveSheet() -> toArray(null, true, true, true);
            
            $v_kecamatan = '';
            
            for ($i = 3; $i <= count($all_data); $i++){
                
                if ($all_data[$i]['A'] != "") { //$all_data[$i]['A'] = baris $i dan kolom A yang ada di excel 
                    
                    $data_kecamatan = ucwords(strtolower($all_data[$i]['B']));

                    foreach($list_kecamatan as $k ){
                        if($k['kec_nama'] == $data_kecamatan){
                          $v_kecamatan = $k['kec_id'];
                        }
                    }

                    $v_data = [
                        'ti_jenis' => '2',
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_nama' => $all_data[$i]['C'],
                        'ti_alamat' => $all_data[$i]['D'],
                        'ti_kondisi' => $all_data[$i]['E'],
                        'ti_luas_tanah' => $all_data[$i]['F'],
                        'ti_luas_bangunan' => $all_data[$i]['G'],
                        'latitude' => $all_data[$i]['H'],
                        'longitude' => $all_data[$i]['I'],
                        'ti_foto' => 'pura.jpg'
                    ];


                    $this->M_tempat_ibadah->create_ti($v_data); 
                }
            }

            unlink(FCPATH.'./assets/uploads/'.$v_nama_file);
        }
        else{
            echo $this->upload->display_errors();
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
            redirect('c_tempat_ibadah/pura');

    }


    public function format_pura(){    

        $obj = new PHPExcel();
        
        $obj->getProperties()->setCreator("creator Macan");
        $obj->getProperties()->setLastModifiedBy("last modify Macan");
        $obj->getProperties()->setTitle("Title Macan");

        $obj->setActiveSheetIndex(0);

        $obj->getActiveSheet()->setCellValue('A1', 'Format Data Pura');
        $obj->getActiveSheet()->setCellValue('A2', 'No');
        $obj->getActiveSheet()->setCellValue('B2', 'Kecamatan');
        $obj->getActiveSheet()->setCellValue('C2', 'Nama Pura');
        $obj->getActiveSheet()->setCellValue('D2', 'Alamat');
        $obj->getActiveSheet()->setCellValue('E2', 'Kondisi');
        $obj->getActiveSheet()->setCellValue('F2', 'Luas Tanah');
        $obj->getActiveSheet()->setCellValue('G2', 'Luas Bangunan');
        $obj->getActiveSheet()->setCellValue('H2', 'latitude');
        $obj->getActiveSheet()->setCellValue('I2', 'longitude');




        $namafile = "Data_Pura" . time() .'.xlsx';
        $obj->getActiveSheet()->setTitle("Format Pura");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreedsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$namafile.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($obj, 'Excel2007');
        $writer->save('php://output');
        exit;

    }


    public function export_pura(){    

        $data_ti = $this->M_tempat_ibadah->selectPura();
        
        $obj = new PHPExcel();
        
        $obj->getProperties()->setCreator("creator Macan");
        $obj->getProperties()->setLastModifiedBy("last modify Macan");
        $obj->getProperties()->setTitle("Title Macan");

        $obj->setActiveSheetIndex(0);

        $obj->getActiveSheet()->setCellValue('A1', 'Data Pura');
        $obj->getActiveSheet()->setCellValue('A2', 'No');
        $obj->getActiveSheet()->setCellValue('B2', 'Kabupaten');
        $obj->getActiveSheet()->setCellValue('C2', 'Kecamatan');
        $obj->getActiveSheet()->setCellValue('D2', 'Nama Pura');
        $obj->getActiveSheet()->setCellValue('E2', 'Alamat');
        $obj->getActiveSheet()->setCellValue('F2', 'Kondisi');
        $obj->getActiveSheet()->setCellValue('G2', 'Luas Tanah');
        $obj->getActiveSheet()->setCellValue('H2', 'Luas Bangunan');
        $obj->getActiveSheet()->setCellValue('I2', 'Latitude');
        $obj->getActiveSheet()->setCellValue('J2', 'Longitude');

        $no = 1;
        $baris = 3;
        foreach ($data_ti as $v_data) {
            $obj->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $obj->getActiveSheet()->setCellValue('B'.$baris, $v_data['kab_nama']);
            $obj->getActiveSheet()->setCellValue('C'.$baris, $v_data['kec_nama']);
            $obj->getActiveSheet()->setCellValue('D'.$baris, $v_data['ti_nama']);
            $obj->getActiveSheet()->setCellValue('E'.$baris, $v_data['ti_alamat']);
            $obj->getActiveSheet()->setCellValue('F'.$baris, $v_data['ti_kondisi']);
            $obj->getActiveSheet()->setCellValue('G'.$baris, $v_data['ti_luas_tanah']);
            $obj->getActiveSheet()->setCellValue('H'.$baris, $v_data['ti_luas_bangunan']);
            $obj->getActiveSheet()->setCellValue('I'.$baris, $v_data['latitude']);
            $obj->getActiveSheet()->setCellValue('J'.$baris, $v_data['longitude']);
            $baris++;
        }


        $namafile = "Data_Pura" .time() . '.xlsx';
        $obj->getActiveSheet()->setTitle("Format Pura");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreedsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$namafile.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($obj, 'Excel2007');
        $writer->save('php://output');
        exit;

    }



    public function hapus_pura($v_id){
        $hapus_foto = $this->M_tempat_ibadah->selectById($v_id);
        
        if($hapus_foto['ti_foto'] != 'pura.jpg'){
            unlink(FCPATH . 'assets/foto/tempat_ibadah/' . $hapus_foto['ti_foto']);
            
        }

        $this->M_tempat_ibadah->hapus_ti($v_id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('c_tempat_ibadah/pura');
    }

//---------VIHARA

    public function load_vihara(){

        $v_kab = $this->input->post('id_kab');


       if( strlen($v_kab) != 0 ){
        
            $data = $this->M_tempat_ibadah->selectViharaByKab($v_kab);  

        }else{
           
            $data = $this->M_tempat_ibadah->selectVihara();
        }

            echo json_encode($data);

    }

    public function vihara(){
        $v_data['judul'] = 'DAFTAR VIHARA';
        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);

        $v_data['list_tempat_ibadah'] = $this->M_tempat_ibadah->selectVihara();
        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();

        $v_data['tittle'] = 'Daftar vihara';
        $this->load->view('templates/header', $v_data);
        $this->load->view('templates/sidebar', $v_data);
        $this->load->view('templates/topbar', $v_data);
        $this->load->view('v_daftar_tempat_ibadah/vihara/vihara', $v_data);
        $this->load->view('templates/footer');
    }


    public function tambahVihara(){
        $v_data['judul'] = 'TAMBAH DATA VIHARA';
        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }


        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);

        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();
        $v_data['tittle'] = 'Tambah data vihara';

        $this->form_validation->set_rules('scrollkab','Scrollkab','required|callback_validasi_kabupaten');
        $this->form_validation->set_rules('scrollkec','Scrollkec','required|callback_validasi_kecamatan');


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('binaan_majelis', 'Binaan_majelis', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('ketua', 'Ketua', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        


        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar',$v_data);
            $this->load->view('v_daftar_tempat_ibadah/vihara/tambah_vihara', $v_data);
            $this->load->view('templates/footer');

        }else{
            $v_kabupaten = $this->input->post('scrollkab');
            $v_kecamatan = $this->input->post('scrollkec');
            $v_nama     = $this->input->post('nama');
            $v_alamat = $this->input->post('alamat');
            $v_ketua = $this->input->post('ketua');
            $v_binaan_majelis = $this->input->post('binaan_majelis');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');

            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/tempat_ibadah/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){

                    $v_nama_foto = $this->upload->data('file_name');
                                    
                    $v_data = [
                        'ti_jenis' => '4',
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_ketua' => $v_ketua,
                        'ti_binaan_majelis' => $v_binaan_majelis,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'ti_foto' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                    $v_data = [
                        'ti_jenis' => '4',
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_ketua' => $v_ketua,
                        'ti_binaan_majelis' => $v_binaan_majelis,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'ti_foto' => 'vihara.png'
                    ];
            }

            $this->M_tempat_ibadah->create_ti($v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
            redirect('c_tempat_ibadah/vihara');

        }
    }



    public function edit_vihara($v_id)
    {
        $v_data['judul'] = 'EDIT DATA VIHARA';
        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        $v_data['tempat_ibadah'] = $this->M_tempat_ibadah->selectById($v_id);

        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();
        $v_data['list_kecamatan'] = $this->M_tempat_ibadah->selectKecamatan($v_data['tempat_ibadah']['ti_kabupaten']);
        
        $v_data['tittle'] = 'Edit data vihara';
        

        $this->form_validation->set_rules('scrollkec','Scrollkec','required|callback_validasi_kecamatan');

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('binaan_majelis', 'Binaan_majelis', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('ketua', 'Ketua', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);




        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar', $v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('v_daftar_tempat_ibadah/vihara/edit_vihara', $v_data);
            $this->load->view('templates/footer');

        }else{
            $v_id = $this->input->post('id_tempat_ibadah');
            $v_kabupaten = $this->input->post('scrollkab');
            $v_kecamatan = $this->input->post('scrollkec');
            $v_nama     = $this->input->post('nama');
            $v_alamat = $this->input->post('alamat');
            $v_ketua = $this->input->post('ketua');
            $v_binaan_majelis = $this->input->post('binaan_majelis');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');

            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/tempat_ibadah/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){
                    $v_nama_foto = $this->upload->data('file_name');
                    
                    $v_foto_lama = $v_data['tempat_ibadah']['ti_foto'];

                    if($v_foto_lama != 'vihara.png'){
                            unlink(FCPATH . 'assets/foto/tempat_ibadah/' . $v_foto_lama);
                    }

                    $v_data = [
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_ketua' => $v_ketua,
                        'ti_binaan_majelis' => $v_binaan_majelis,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'ti_foto' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                $v_data = [
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_ketua' => $v_ketua,
                        'ti_binaan_majelis' => $v_binaan_majelis,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude
                    ];
            }

            $this->M_tempat_ibadah->edit_ti($v_id, $v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
            redirect('c_tempat_ibadah/vihara');

        }


    }

    
    public function format_vihara(){    

        $obj = new PHPExcel();
        
        $obj->getProperties()->setCreator("creator Macan");
        $obj->getProperties()->setLastModifiedBy("last modify Macan");
        $obj->getProperties()->setTitle("Title Macan");

        $obj->setActiveSheetIndex(0);

        $obj->getActiveSheet()->setCellValue('A1', 'Format Data Vihara');
        $obj->getActiveSheet()->setCellValue('A2', 'No');
        $obj->getActiveSheet()->setCellValue('B2', 'Kecamatan');
        $obj->getActiveSheet()->setCellValue('C2', 'Nama Vihara');
        $obj->getActiveSheet()->setCellValue('D2', 'Di Bawah Binaan Majelis');
        $obj->getActiveSheet()->setCellValue('E2', 'Nama Ketua');
        $obj->getActiveSheet()->setCellValue('F2', 'Alamat');
        $obj->getActiveSheet()->setCellValue('G2', 'Latitude');
        $obj->getActiveSheet()->setCellValue('H2', 'Longitude');




        $namafile = "Data_Vihara" .time(). '.xlsx';
        $obj->getActiveSheet()->setTitle("Format Vihara");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreedsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$namafile.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($obj, 'Excel2007');
        $writer->save('php://output');
        exit;

    }


    public function export_vihara(){    

        $data_ti = $this->M_tempat_ibadah->selectVihara();
        
        $obj = new PHPExcel();
        
        $obj->getProperties()->setCreator("creator Macan");
        $obj->getProperties()->setLastModifiedBy("last modify Macan");
        $obj->getProperties()->setTitle("Title Macan");

        $obj->setActiveSheetIndex(0);

        $obj->getActiveSheet()->setCellValue('A1', 'Data Vihara');
        $obj->getActiveSheet()->setCellValue('A2', 'No');
        $obj->getActiveSheet()->setCellValue('B2', 'Kabupaten');
        $obj->getActiveSheet()->setCellValue('C2', 'Kecamatan');
        $obj->getActiveSheet()->setCellValue('D2', 'Nama Vihara');
        $obj->getActiveSheet()->setCellValue('E2', 'Di Bawah Binaan Majelis');
        $obj->getActiveSheet()->setCellValue('F2', 'Nama Ketua');
        $obj->getActiveSheet()->setCellValue('G2', 'Alamat');
        $obj->getActiveSheet()->setCellValue('H2', 'Latitude');
        $obj->getActiveSheet()->setCellValue('I2', 'Longitude');

        $no = 1;
        $baris = 3;
        foreach ($data_ti as $v_data) {
            $obj->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $obj->getActiveSheet()->setCellValue('B'.$baris, $v_data['kab_nama']);
            $obj->getActiveSheet()->setCellValue('C'.$baris, $v_data['kec_nama']);
            $obj->getActiveSheet()->setCellValue('D'.$baris, $v_data['ti_nama']);
            $obj->getActiveSheet()->setCellValue('E'.$baris, $v_data['ti_binaan_majelis']);
            $obj->getActiveSheet()->setCellValue('F'.$baris, $v_data['ti_ketua']);
            $obj->getActiveSheet()->setCellValue('G'.$baris, $v_data['ti_alamat']);
            $obj->getActiveSheet()->setCellValue('H'.$baris, $v_data['latitude']);
            $obj->getActiveSheet()->setCellValue('I'.$baris, $v_data['longitude']);
            $baris++;
        }


        $namafile = "Data_Vihara" .time() . '.xlsx';
        $obj->getActiveSheet()->setTitle("Data Vihara");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreedsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$namafile.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($obj, 'Excel2007');
        $writer->save('php://output');
        exit;

    }



    public function import_vihara(){

        $v_kabupaten = $this->input->post('scrollkab');
        $list_kecamatan = $this->M_kab_kec->selectAllkecamatan();

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'xls|xlsx|csv';
        $v_nama_file = $_FILES['file_import']['name'];
        $config['file_name'] = $v_nama_file;
        
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_import')){

            $obj = PHPExcel_IOFactory::load(FCPATH.'./assets/uploads/'.$v_nama_file);
            $all_data = $obj -> getActiveSheet() -> toArray(null, true, true, true);
            
            $v_kecamatan = '';
            
            for ($i = 3; $i <= count($all_data); $i++){
                
                if ($all_data[$i]['A'] != "") { //$all_data[$i]['A'] = baris $i dan kolom A yang ada di excel 
                    
                    $data_kecamatan = ucwords(strtolower($all_data[$i]['B']));

                    foreach($list_kecamatan as $k ){
                        if($k['kec_nama'] == $data_kecamatan){
                          $v_kecamatan = $k['kec_id'];
                        }
                    }

                    $v_data = [
                        'ti_jenis' => '4',
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_nama' => $all_data[$i]['C'],
                        'ti_binaan_majelis' => $all_data[$i]['D'],
                        'ti_ketua' => $all_data[$i]['E'],
                        'ti_alamat' => $all_data[$i]['F'],
                        'latitude' => $all_data[$i]['G'],
                        'longitude' => $all_data[$i]['H'],
                        'ti_foto' => 'vihara.png'
                    ];


                    $this->M_tempat_ibadah->create_ti($v_data); 
                }
            }

            unlink(FCPATH.'./assets/uploads/'.$v_nama_file);
        }
        else{
            echo $this->upload->display_errors();
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
            redirect('c_tempat_ibadah/vihara');


    }

    public function hapus_vihara($v_id){
        $hapus_foto = $this->M_tempat_ibadah->selectById($v_id);
        
        if($hapus_foto['ti_foto'] != 'vihara.png'){
            unlink(FCPATH . 'assets/foto/tempat_ibadah/' . $hapus_foto['ti_foto']);
            
        }

        $this->M_tempat_ibadah->hapus_ti($v_id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('c_tempat_ibadah/vihara');
    }




//---------KLENTENG

    public function load_klenteng(){

        $v_kab = $this->input->post('id_kab');


       if( strlen($v_kab) != 0 ){
        
            $data = $this->M_tempat_ibadah->selectKlentengByKab($v_kab);  

        }else{
           
            $data = $this->M_tempat_ibadah->selectKlenteng();
        }

            echo json_encode($data);

    }

    
public function klenteng(){
    $v_data['judul'] = 'DAFTAR KLENTENG';
        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        $v_data['list_tempat_ibadah'] = $this->M_tempat_ibadah->selectKlenteng();
        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();

        $v_data['tittle'] = 'Daftar klenteng';
        $this->load->view('templates/header', $v_data);
        $this->load->view('templates/sidebar', $v_data);
        $this->load->view('templates/topbar', $v_data);
        $this->load->view('v_daftar_tempat_ibadah/klenteng/klenteng', $v_data);
        $this->load->view('templates/footer');
    }


    public function tambahKlenteng(){
        $v_data['judul'] = 'TAMBAH DATA KLENTENG';
       $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);

        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();
        $v_data['tittle'] = 'Tambah data klenteng';

        $this->form_validation->set_rules('scrollkab','Scrollkab','required|callback_validasi_kabupaten');
        $this->form_validation->set_rules('scrollkec','Scrollkec','required|callback_validasi_kecamatan');


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('binaan_majelis', 'Binaan_majelis', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('ketua', 'Ketua', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        


        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('v_daftar_tempat_ibadah/klenteng/tambah_klenteng', $v_data);
            $this->load->view('templates/footer');

        }else{
            $v_kabupaten = $this->input->post('scrollkab');
            $v_kecamatan = $this->input->post('scrollkec');
            $v_nama     = $this->input->post('nama');
            $v_alamat = $this->input->post('alamat');
            $v_ketua = $this->input->post('ketua');
            $v_binaan_majelis = $this->input->post('binaan_majelis');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');

            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/tempat_ibadah/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){

                    $v_nama_foto = $this->upload->data('file_name');
                                    
                    $v_data = [
                        'ti_jenis' => '5',
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_ketua' => $v_ketua,
                        'ti_binaan_majelis' => $v_binaan_majelis,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'ti_foto' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                    $v_data = [
                        'ti_jenis' => '5',
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_ketua' => $v_ketua,
                        'ti_binaan_majelis' => $v_binaan_majelis,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'ti_foto' => 'klenteng.png'
                    ];
            }

            $this->M_tempat_ibadah->create_ti($v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
            redirect('c_tempat_ibadah/klenteng');

        }


    }


    public function edit_klenteng($v_id)
    {
        $v_data['judul'] = 'EDIT DATA KLENTENG';
        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);

        $v_data['tempat_ibadah'] = $this->M_tempat_ibadah->selectById($v_id);

        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();
        $v_data['list_kecamatan'] = $this->M_tempat_ibadah->selectKecamatan($v_data['tempat_ibadah']['ti_kabupaten']);
        
        $v_data['tittle'] = 'Edit data klenteng';
        

        $this->form_validation->set_rules('scrollkec','Scrollkec','required|callback_validasi_kecamatan');

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('binaan_majelis', 'Binaan_majelis', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('ketua', 'Ketua', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);




        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar', $v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('v_daftar_tempat_ibadah/klenteng/edit_klenteng', $v_data);
            $this->load->view('templates/footer');

        }else{
            $v_id = $this->input->post('id_tempat_ibadah');
            $v_kabupaten = $this->input->post('scrollkab');
            $v_kecamatan = $this->input->post('scrollkec');
            $v_nama     = $this->input->post('nama');
            $v_alamat = $this->input->post('alamat');
            $v_ketua = $this->input->post('ketua');
            $v_binaan_majelis = $this->input->post('binaan_majelis');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');

            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/tempat_ibadah/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){
                    $v_nama_foto = $this->upload->data('file_name');
                    
                    $v_foto_lama = $v_data['tempat_ibadah']['ti_foto'];

                    if($v_foto_lama != 'klenteng.png'){
                            unlink(FCPATH . 'assets/foto/tempat_ibadah/' . $v_foto_lama);
                    }

                    $v_data = [
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_ketua' => $v_ketua,
                        'ti_binaan_majelis' => $v_binaan_majelis,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'ti_foto' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                $v_data = [
                        'ti_nama' => $v_nama,
                        'ti_alamat' => $v_alamat,
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_ketua' => $v_ketua,
                        'ti_binaan_majelis' => $v_binaan_majelis,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude
                    ];
            }

            $this->M_tempat_ibadah->edit_ti($v_id, $v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
            redirect('c_tempat_ibadah/klenteng');

        }


    }


    public function import_klenteng(){

        
       $v_kabupaten = $this->input->post('scrollkab');
        $list_kecamatan = $this->M_kab_kec->selectAllkecamatan();

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'xls|xlsx|csv';
        $v_nama_file = $_FILES['file_import']['name'];
        $config['file_name'] = $v_nama_file;
        
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_import')){

            $obj = PHPExcel_IOFactory::load(FCPATH.'./assets/uploads/'.$v_nama_file);
            $all_data = $obj -> getActiveSheet() -> toArray(null, true, true, true);
            
            $v_kecamatan = '';
            
            for ($i = 3; $i <= count($all_data); $i++){
                
                if ($all_data[$i]['A'] != "") { //$all_data[$i]['A'] = baris $i dan kolom A yang ada di excel 
                    
                    $data_kecamatan = ucwords(strtolower($all_data[$i]['B']));

                    foreach($list_kecamatan as $k ){
                        if($k['kec_nama'] == $data_kecamatan){
                          $v_kecamatan = $k['kec_id'];
                        }
                    }

                    $v_data = [
                        'ti_jenis' => '5',
                        'ti_kabupaten' => $v_kabupaten,
                        'ti_kecamatan' => $v_kecamatan,
                        'ti_nama' => $all_data[$i]['C'],
                        'ti_binaan_majelis' => $all_data[$i]['D'],
                        'ti_ketua' => $all_data[$i]['E'],
                        'ti_alamat' => $all_data[$i]['F'],
                        'latitude' => $all_data[$i]['G'],
                        'longitude' => $all_data[$i]['H'],
                        'ti_foto' => 'klenteng.png'
                    ];


                    $this->M_tempat_ibadah->create_ti($v_data); 
                }
            }

            unlink(FCPATH.'./assets/uploads/'.$v_nama_file);
        }
        else{
            echo $this->upload->display_errors();
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
            redirect('c_tempat_ibadah/klenteng');

    }

     public function format_klenteng(){    

         $obj = new PHPExcel();
        
        $obj->getProperties()->setCreator("creator Macan");
        $obj->getProperties()->setLastModifiedBy("last modify Macan");
        $obj->getProperties()->setTitle("Title Macan");

        $obj->setActiveSheetIndex(0);

        $obj->getActiveSheet()->setCellValue('A1', 'Format Data Klenteng');
        $obj->getActiveSheet()->setCellValue('A2', 'No');
        $obj->getActiveSheet()->setCellValue('B2', 'Kecamatan');
        $obj->getActiveSheet()->setCellValue('C2', 'Nama Klenteng');
        $obj->getActiveSheet()->setCellValue('D2', 'Di Bawah Binaan Majelis');
        $obj->getActiveSheet()->setCellValue('E2', 'Nama Ketua');
        $obj->getActiveSheet()->setCellValue('F2', 'Alamat');
        $obj->getActiveSheet()->setCellValue('G2', 'Latitude');
        $obj->getActiveSheet()->setCellValue('H2', 'Longitude');




        $namafile = "Data_Klenteng" .time(). '.xlsx';
        $obj->getActiveSheet()->setTitle("Format Klenteng");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreedsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$namafile.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($obj, 'Excel2007');
        $writer->save('php://output');
        exit;
    }


    public function export_klenteng(){    

        $data_ti = $this->M_tempat_ibadah->selectKlenteng();
        
        $obj = new PHPExcel();
        
        $obj->getProperties()->setCreator("creator Macan");
        $obj->getProperties()->setLastModifiedBy("last modify Macan");
        $obj->getProperties()->setTitle("Title Macan");

        $obj->setActiveSheetIndex(0);

        $obj->getActiveSheet()->setCellValue('A1', 'Format Data Klenteng');
        $obj->getActiveSheet()->setCellValue('A2', 'No');
        $obj->getActiveSheet()->setCellValue('B2', 'Nama Klenteng');
        $obj->getActiveSheet()->setCellValue('C2', 'Di Bawah Binaan Majelis');
        $obj->getActiveSheet()->setCellValue('D2', 'Nama Ketua');
        $obj->getActiveSheet()->setCellValue('E2', 'Alamat');
        $obj->getActiveSheet()->setCellValue('F2', 'Kabupaten');
        $obj->getActiveSheet()->setCellValue('G2', 'Kecamatan');
        $obj->getActiveSheet()->setCellValue('H2', 'Latitude');
        $obj->getActiveSheet()->setCellValue('I2', 'Longitude');

        $no = 1;
        $baris = 3;
        foreach ($data_ti as $v_data) {
            $obj->getActiveSheet()->setCellValue('A'.$baris, $no++);
            $obj->getActiveSheet()->setCellValue('B'.$baris, $v_data['ti_nama']);
            $obj->getActiveSheet()->setCellValue('C'.$baris, $v_data['ti_binaan_majelis']);
            $obj->getActiveSheet()->setCellValue('D'.$baris, $v_data['ti_ketua']);
            $obj->getActiveSheet()->setCellValue('E'.$baris, $v_data['ti_alamat']);
            $obj->getActiveSheet()->setCellValue('F'.$baris, $v_data['kab_nama']);
            $obj->getActiveSheet()->setCellValue('G'.$baris, $v_data['kec_nama']);
            $obj->getActiveSheet()->setCellValue('H'.$baris, $v_data['latitude']);
            $obj->getActiveSheet()->setCellValue('I'.$baris, $v_data['longitude']);
            $baris++;
        }


        $namafile = "Data_Klenteng" .time() . '.xlsx';
        $obj->getActiveSheet()->setTitle("Format Klenteng");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreedsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$namafile.'"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createwriter($obj, 'Excel2007');
        $writer->save('php://output');
        exit;

    }


    public function hapus_klenteng($v_id){
        $hapus_foto = $this->M_tempat_ibadah->selectById($v_id);
        
        if($hapus_foto['ti_foto'] != 'klenteng.png'){
            unlink(FCPATH . 'assets/foto/tempat_ibadah/' . $hapus_foto['ti_foto']);
            
        }
        
        $this->M_tempat_ibadah->hapus_ti($v_id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('c_tempat_ibadah/klenteng');
    }
    
    

}