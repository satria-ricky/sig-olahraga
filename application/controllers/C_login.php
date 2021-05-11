<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        // $this->load->model(['M_admin','M_bidang']);
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

    public function index(){

        if ($this->session->userdata('id_username')) {
            redirect('c_profile');
        }
        
        $this->form_validation->set_rules('bidang','Bidang','required|callback_validasi_bidang');
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Form tidak boleh kosong!'
        ]); 
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Form tidak boleh kosong!'
        ]);

        $v_data['tittle'] = 'Login page!';
        $v_data['list_bidang'] = $this->M_bidang->selectAllbidang();


        if($this->form_validation->run() == false){
            $this->load->view('templates/header_login', $v_data);
            $this->load->view('v_login/index', $v_data);
            $this->load->view('templates/footer_login');
        }else{

            $v_username = $this->input->post('username');
            $v_password = $this->input->post('password');
            $v_idbidang = $this->input->post('bidang');
            $v_admin = $this->M_admin->auth($v_username, $v_password, $v_idbidang);

            if ($v_admin){
                $bidang_role = $this->M_bidang->selectBidangBy($v_admin['admin_bidang']);
                $v_id_admin = $this->M_admin->selectIdAdmin($v_username);
                $v_data = [
                    'id_username' => $v_admin['admin_id'],
                    'role' => $bidang_role['bidang_role']
                ];

                $this->session->set_userdata($v_data);
                redirect('c_profile');

            }else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username dan password salah!</div>');
                redirect('c_login');
            }

        }  
    }


    public function logout(){
        $this->session->unset_userdata('id_username');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil logout!</div>');
        redirect('c_login');
    }

    public function blocked(){
        $this->load->view('v_blocked/index.php');
    }

}