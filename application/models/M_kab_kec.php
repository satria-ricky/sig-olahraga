<?php


class M_kab_kec extends CI_model {

    public function selectAllkabupaten(){
        return $this->db->get('tb_kabupaten')->result_array();
    }

     public function selectAllkecamatan(){
        return $this->db->get('tb_kecamatan')->result_array();
    }

    public function kabId($v_username){
        return $this->db->get_where('tb_kabupaten',  ['kab_id' => $v_username])->row_array();
    }

    public function selectKecByKab($id){
        $sql='SELECT * FROM tb_kecamatan WHERE id_kab=?';
        return $this->db->query($sql, $id)->result_array();
    }



}