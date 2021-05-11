<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {
    
    public $var;

    public function __construct(){
        parent::__construct();
        cek_login();
    }


    public function load_admin(){
          echo json_encode($this->M_admin->selectAlladmin($this->session->userdata('id_username')));
    }

    public function index(){
        $v_data['judul'] = 'DAFTAR ADMIN';
        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }
        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        $v_data['list_admin'] = $this->M_admin->selectAlladmin($this->session->userdata('id_username'));

        $v_data['tittle'] = 'Daftar admin';
        $this->load->view('templates/header', $v_data);
        $this->load->view('templates/sidebar', $v_data);
        $this->load->view('templates/topbar', $v_data);
        $this->load->view('v_daftar_admin/index', $v_data);
        $this->load->view('templates/footer');
    }

    
    
    function validasi_bidang($v_bidang)
    {
        // 'none' is the first option that is default "-------Choose City-------"
        if($v_bidang == "none"){
            $this->form_validation->set_message('validasi_bidang', 'Pilih Subbag!');
        return false;
        } else{
            return true;
        }

    }



    

    public function tambah()
    {
        $v_data['judul'] = 'TAMBAH DATA ADMIN';
        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }
        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        $this->form_validation->set_rules('bidang','Bidang','required|callback_validasi_bidang');
        
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_admin.admin_username]', [
            'required' => 'Form tidak boleh kosong!',
            'is_unique' => 'Username telah terdaftar!'
        ]); 
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'required' => 'Form tidak boleh kosong!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        $v_data['list_bidang'] = $this->M_bidang->selectAllbidang();

        if($this->form_validation->run() == false){
            $v_data['tittle'] = 'Tambah data admin';
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar', $v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('v_daftar_admin/tambah_data', $v_data);
            $this->load->view('templates/footer');
        }else{
            $v_idbidang = $this->input->post('bidang');
            $v_username = htmlspecialchars($this->input->post('username', true));
            $v_password = $this->input->post('password');
            $v_nama     = htmlspecialchars($this->input->post('nama', true));
            $v_alamat   = $this->input->post('alamat');
            $upload_foto = $_FILES['foto']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5000';
                $config['upload_path'] = './assets/foto/admin/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')){
                    $v_nama_foto = $this->upload->data('file_name');
                                    
                    $v_data = [
                        'admin_username' => $v_username,
                        'admin_password' => $v_password,
                        'admin_nama' => $v_nama,
                        'admin_alamat' => $v_alamat,
                        'admin_bidang' => $v_idbidang,
                        'admin_foto' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                $v_data = [
                    'admin_username' => $v_username,
                    'admin_password' => $v_password,
                    'admin_nama' => $v_nama,
                    'admin_alamat' => $v_alamat,
                    'admin_bidang' => $v_idbidang,
                    'admin_foto' => 'foto.png'
                ];
            }

            $this->M_admin->create_admin($v_data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil ditambah!</div>');
            redirect('c_admin');

        }

    }



    public function edit($v_id) {

        $v_data['judul'] = 'EDIT DATA ADMIN';

        $v_role = $this->session->userdata('role');
        if ($v_role == 1) {
            $v_data['hilangkan'] = '';
        }else{
            $v_data['hilangkan'] = 'd-none';
        }

        $v_id_username = $this->session->userdata('id_username');
        $v_data['data_pengguna'] = $this->M_admin->get_pengguna($v_id_username);


        
        $v_data['list_bidang'] = $this->M_bidang->selectAllbidang();

        $v_data['tittle'] = 'Edit data admin';

        $v_data['admin'] = $this->M_admin->get_pengguna($v_id);
        

        $this->form_validation->set_rules('bidang','Bidang','required|callback_validasi_bidang');

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);


        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'required' => 'Form tidak boleh kosong!',
            'min_length' => 'Password terlalu pendek!'
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Form tidak boleh kosong!',
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $v_data);
            $this->load->view('templates/sidebar', $v_data);
            $this->load->view('templates/topbar', $v_data);
            $this->load->view('v_daftar_admin/edit_data', $v_data);
            $this->load->view('templates/footer');
        }else{
            $id_admin = $this->input->post('id');
            $v_idbidang = $this->input->post('bidang');
            $username_input = htmlspecialchars($this->input->post('username', true));
            $v_nama = htmlspecialchars($this->input->post('nama', true));
            $v_password = $this->input->post('password');
            $v_alamat = htmlspecialchars($this->input->post('alamat', true));
            $upload_foto = $_FILES['foto']['name'];


            if($this->M_admin->cek_username($username_input,$id_admin)){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal mengubah! Username telah terdaftar!</div>');
                redirect('c_admin/edit/'.$id_admin);

            }else{
                
                if($upload_foto){
                
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '5000';
                    $config['upload_path'] = './assets/foto/admin/';
                        
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('foto')){
                        $v_nama_foto = $this->upload->data('file_name');
    
                        $v_foto_lama = $v_data['admin']['admin_foto'];
                        
                        if($v_foto_lama != 'foto.png'){
                            unlink(FCPATH . 'assets/foto/admin/' . $v_foto_lama);
                        }
                        
                        $v_data = [
                            'admin_password' => $v_password,
                            'admin_nama' => $v_nama,
                            'admin_alamat' => $v_alamat,
                            'admin_foto' => $v_nama_foto,
                            'admin_username' => $username_input,
                            'admin_bidang' => $v_idbidang
                        ];
                    }
                    else
                    {
                        echo $this->upload->display_errors();
                    }
    
                }else{
                    $v_data = [
                        'admin_password' => $v_password,
                        'admin_nama' => $v_nama,
                        'admin_alamat' => $v_alamat,
                        'admin_username' => $username_input,
                        'admin_bidang' => $v_idbidang
                    ];
                }
    
                $this->M_admin->edit_admin($id_admin, $v_data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
                redirect('c_admin');

            }
        }
    }


    public function hapus($v_id){

        $hapus_foto = $this->M_admin->get_pengguna($v_id);
        
        if($hapus_foto['ti_foto'] != 'klenteng.png'){
            unlink(FCPATH . 'assets/foto/admin/' . $hapus_foto['admin_foto']);
            
        }

        $this->M_admin->hapus_admin($v_id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('c_admin');
    }

}