<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
    	$v_data['list'] = $this->M_bulu_tangkis->select_bulu_tangkis();
        $this->load->view('v_dashboard/index', $v_data);		 
	}

	public function load_data_to_tabel(){
		$data = $this->M_bulu_tangkis->select_bulu_tangkis();
		echo json_encode($data);	
	}

}