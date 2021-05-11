<?php
class M_bulu_tangkis extends CI_model {

    public function select_bulu_tangkis(){
        $sql='SELECT * FROM tb_bt';
        return $query=$this->db->query($sql)->result_array(); 
    }


}