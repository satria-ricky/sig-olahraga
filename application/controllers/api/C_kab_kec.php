<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

// use namespace
use Restserver\Libraries\REST_Controller;  


class C_kab_kec extends REST_Controller {
    

    public function __construct(){
        parent::__construct();
    }


    public function index_get()
    {
        $v_id = $this->get('kab_id');

        if ($v_id === null) {
            $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();
        }else {
            $v_data['list_kabupaten_by']  = $this->M_kab_kec->kabId($v_id);
        }
        

        if  ($v_data)  {
            $this->response([
                'status' => true,
                'data' => $v_data
            ], REST_Controller::HTTP_OK); 
        }else {
            $this->response([
                'status' => false,
                'respone' => 'id is not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


 //    public function index(){

 //    	// if ($this->session->userdata('id_username')) {
 //     //        redirect('c_profile');
 //     //    }

    	
 //    	$v_data['list_jenis'] = $this->M_tempat_ibadah->selectAlljenis();
 //        $v_data['list_kabupaten'] = $this->M_kab_kec->selectAllkabupaten();
 //    	$v_data['list'] = $this->M_tempat_ibadah->selectAlltempatIbadah();

 //    	// $v_data['tittle'] = 'Data tempat ibadah';

 //    	// $this->load->view('templates/header', $v_data);

 //        $this->load->view('v_dashboard/index', $v_data);
 //        // $this->load->view('templates/footer');

	
		 

	// }

	public function load_jenis(){
		// $this->M_kab_kec->selectAllkabupaten();

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
			
			
			// echo "ini dua2nya = ".$v_jenis." ".$v_kab;
			$data = $this->M_tempat_ibadah->selectByKabJenis($v_kab,$v_jenis);

		}elseif((strlen($v_kab) == 0) && (strlen($v_jenis) != 0)){
			
			$data = $this->M_tempat_ibadah->selectByJenis($v_jenis);
			// echo "ini jenis = ".$v_jenis;

		}elseif((strlen($v_kab) != 0) && (strlen($v_jenis) == 0)){
			// echo "ini kabupaten = ".$v_kab;
			
			$data = $this->M_tempat_ibadah->selectByKabupaten($v_kab);	

		}else{
			// echo "ini kosong ";
			$data = $this->M_tempat_ibadah->selectAlltempatIbadah();
		}

			echo json_encode($data);
		
	}



}
