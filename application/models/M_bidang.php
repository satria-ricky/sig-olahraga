<?php


class M_bidang extends CI_model {

    public function selectAllbidang(){
        return $this->db->get('tb_bidang')->result_array();
    }

	public function selectBidangBy($id){
        return $this->db->get_where('tb_bidang',['bidang_id' => $id])->row_array();
    }    
}