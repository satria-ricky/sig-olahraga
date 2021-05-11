<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
    	$v_data['list_jenis'] = $this->M_tempat_ibadah->selectAlljenis();
        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();
    	$v_data['list'] = $this->M_tempat_ibadah->selectAlltempatIbadah();
        $this->load->view('v_dashboard/index', $v_data);		 
	}

	public function load_jenis(){
		echo json_encode($this->M_tempat_ibadah->selectAlljenis());
	}

	public function load_kabupaten(){
		echo json_encode($this->M_kab_kec->selectAllkabupaten());
	}

	public function load_kab_by(){
		echo json_encode($this->M_kab_kec->kabId($this->input->post('id_kab')));
	}

	public function load_data_to_tabel(){
		$v_jenis = $this->input->post('id_jenis');
		$v_kab = $this->input->post('id_kab');
		if ( (strlen($v_kab) != 0) && (strlen($v_jenis)  != 0) ) {
			$data = $this->M_tempat_ibadah->selectByKabJenis($v_kab,$v_jenis);
		}elseif((strlen($v_kab) == 0) && (strlen($v_jenis) != 0)){
			$data = $this->M_tempat_ibadah->selectByJenis($v_jenis);
		}elseif((strlen($v_kab) != 0) && (strlen($v_jenis) == 0)){
			$data = $this->M_tempat_ibadah->selectByKabupaten($v_kab);	
		}else{
			$data = $this->M_tempat_ibadah->selectAlltempatIbadah();
		}
			echo json_encode($data);	
	}

}