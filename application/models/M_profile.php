<?php


class M_profile extends CI_model {

    public function edit_profile($id, $data){     
        $this->db->update('tb_admin', $data, array('admin_id' => $id));
    }

    public function get_nama_bidang($id){
        return $this->db->get_where('tb_bidang',  ['bidang_id' => $id])->row_array();
    }

    public function cek_username($username, $id){
        $sql='SELECT * FROM tb_admin where admin_username = ? AND admin_id != ?';
         return $query=$this->db->query($sql, array($username,$id))->row_array();
    }
}