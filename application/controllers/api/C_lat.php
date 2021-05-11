<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

// use namespace
use Restserver\Libraries\REST_Controller;  


class C_lat extends REST_Controller 
{
    public function __construct ()
    {
        parent::__construct();
        
    }


    public function index_get()
    {
        $vlat = $this->get('latitude');
        $id = $this->get('jenis_id');
        
        if ($vlat == null && $id != null) {
            $v_tempat_ibadah  = $this->M_tempat_ibadah->selectByLat($vlat, $id);
        }else if ($vlat == null && $id == null) {
            $v_tempat_ibadah  = $this->M_tempat_ibadah->selectByIdLat($vlat);
        }

       

        if  ($v_tempat_ibadah)  {
            $this->response([
                'status' => true,
                'data' => $v_tempat_ibadah
            ], REST_Controller::HTTP_OK); 
        }else {
            $this->response([
                'status' => false,
                'respone' => 'id is not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function load_masjid(){

        $v_kab = $this->get('kab_id');


       if( strlen($v_kab) != 0 ){
            $v_tempat_ibadah['list_tempat_ibadah'] = $this->M_tempat_ibadah->selectMasjidByKab($v_kab);  

        }else{
           
            $v_tempat_ibadah['list_tempat_ibadah'] = $this->M_tempat_ibadah->selectMasjid();
        }

        if  ($v_tempat_ibadah)  {
        $this->response([
            'status' => true,
            'data' => $v_tempat_ibadah
        ], REST_Controller::HTTP_OK); 
        }else {
            $this->response([
                'status' => false,
                'respone' => 'id is not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }

    }
    


    public function index_delete()
    {
        $v_id = $this->delete('ti_id');

        if ($v_id === null){
            $this->response([
                'status' => false,
                'message' => 'Gk ada id'
            ], REST_Controller::HTTP_BAD_REQUEST);        
        }else {
            if ($this->M_tempat_ibadah->delete_tempat_ibadah($v_id) > 0){
                //ok
                $this->response([
                    'status' => true,
                    'ti_id' => $v_id,
                    'message' => 'data Terhapus!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }else{
                $this->response([
                    'status' => false,
                    'message' => 'id kelebihan'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
    

    





    public function index_post()
    {
        
        $v_data = [
            'ti_jenis' => $this->post('ti_jenis'),
            'ti_nama' => $this->post('ti_nama'),
            'ti_alamat' => $this->post('ti_alamat'),
            'ti_foto' => $this->post('ti_foto')
        ];

        if ($this->M_tempat_ibadah->create_tempat_ibadah($v_data) > 0){
            $this->response([
                'status' => true,
                'message' => 'data berhasil ditambah!'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'gagal menambah data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $v_id = $this->put('ti_id');

        $v_data = [
            'ti_jenis' => $this->put('ti_jenis'),
            'ti_nama' => $this->put('ti_nama'),
            'ti_alamat' => $this->put('ti_alamat'),
            'ti_foto' => $this->put('ti_foto')
        ];

        if ($this->M_tempat_ibadah->update_tempat_ibadah($v_data, $v_id) > 0){
            $this->response([
                'status' => true,
                'message' => 'data berhasil diubah!'
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'gagal mmengubah data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}