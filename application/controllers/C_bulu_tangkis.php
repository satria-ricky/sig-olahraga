<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH.'third_party/PHPExcel/PHPExcel.php';

class C_bulu_tangkis extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_login();
        $this->load->library('googlemaps');
    }

//BERANDA
    public function load_beranda(){
    
            $output = '
            
            <div class="col-xl-3 col-md-6 mb-3 mt-2 ml-2" onclick="lapangan()" style="cursor: pointer;">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-large font-weight-bold text-primary text-uppercase mb-1">Bulu tangkis</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> 

                        '.$this->M_bulu_tangkis->total_bt().'

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-gear fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div> 
            </div>';

            echo json_encode($output);

    }

    public function beranda(){  
        
        $v_data['judul'] = 'BERANDA';
    
        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username); 
        $v_data['tittle'] = 'Beranda';
        $this->load->view('templates/header', $v_data);
        $this->load->view('templates/sidebar', $v_data);
        $this->load->view('templates/topbar', $v_data);
        $this->load->view('v_beranda/index',$v_data);
        $this->load->view('templates/footer');
        
    }

//DAFTAR LAPANGAN
    public function load_data_to_tabel(){
        $data = $this->M_bulu_tangkis->select_bulu_tangkis();
        echo json_encode($data);	
    }

    public function daftar(){
        $v_data['judul'] = 'DAFTAR LAPANGAN';

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        $v_data['list'] = $this->M_bulu_tangkis->select_bulu_tangkis();

        $v_data['tittle'] = 'Daftar lapangan';
        $this->load->view('templates/header', $v_data);
        $this->load->view('templates/sidebar', $v_data);
        $this->load->view('templates/topbar',$v_data);
        $this->load->view('v_lapangan/bulu_tangkis/daftar', $v_data);
        $this->load->view('templates/footer');
    }


    
    public function edit($v_id)
    {
        $v_data['judul'] = 'EDIT DATA lapangan';

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


//TAMBAH DATA LAPANGAN
    function validasi_status_data($id)
    {
        if($id == ""){
            $this->form_validation->set_message('validasi_status_data', 'Pilih status data lapangan!');
            return false;
        } else{
            return true;
        }

    }


    public function tambah(){
        $v_data['judul'] = 'TAMBAH DATA LAPANGAN';

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);

        $v_data['list_status'] = $this->M_bulu_tangkis->select_status();

        $v_data['tittle'] = 'Tambah data lapangan';

        
        $this->form_validation->set_rules('nama_lapangan', 'Nama_lapangan', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('jam_buka','Jam_buka','required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('status_lapangan','Status_lapangan','required|callback_validasi_status_data');


        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('v_lapangan/bulu_tangkis/tambah', $v_data);
            $this->load->view('templates/footer');

        }else{
            $v_nama     = $this->input->post('nama_lapangan');
            $v_alamat = $this->input->post('alamat');
            $v_longitude = $this->input->post('longitude');
            $v_latitude = $this->input->post('latitude');
            $v_jam_buka = $this->input->post('jam_buka');
            $v_jam_tutup = $this->input->post('jam_tutup');
            $v_status = $this->input->post('status_lapangan');
            $v_kontak = $this->input->post('kontak');
            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '15000';
                $config['upload_path'] = './assets/foto/bt/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){
                    $v_nama_foto = $this->upload->data('file_name');             
                    $v_data = [
                        'bt_nama' => $v_nama,
                        'bt_alamat' => $v_alamat,
                        'longitude' => $v_longitude,
                        'latitude' => $v_latitude,
                        'bt_jam_buka' => $v_jam_buka,
                        'bt_jam_tutup' => $v_jam_tutup,
                        'bt_status' => $v_status,
                        'bt_kontak' => $v_kontak,
                        'bt_foto' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                $v_data = [
                    'bt_nama' => $v_nama,
                    'bt_alamat' => $v_alamat,
                    'longitude' => $v_longitude,
                    'latitude' => $v_latitude,
                    'bt_jam_buka' => $v_jam_buka,
                    'bt_jam_tutup' => $v_jam_tutup,
                    'bt_status' => $v_status,
                    'bt_kontak' => $v_kontak,
                    'bt_foto' => 'bt_default.jpg'
                ];
            }

            $this->M_bulu_tangkis->create_bt($v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
            redirect('c_bulu_tangkis/daftar');

        }
    }



   




    public function import(){

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


    public function format(){    

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


    public function export(){    

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



    public function hapus($v_id){
        $hapus_foto = $this->M_tempat_ibadah->selectById($v_id);
        
        if($hapus_foto['ti_foto'] != 'masjid.png'){
            unlink(FCPATH . 'assets/foto/tempat_ibadah/' . $hapus_foto['ti_foto']);
           
        }
        
        $this->M_tempat_ibadah->hapus_ti($v_id);
        
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('c_tempat_ibadah/masjid');
    }







}