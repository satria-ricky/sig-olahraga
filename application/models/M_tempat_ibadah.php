<?php
class M_tempat_ibadah extends CI_model {

    public function get_tempat_ibadah($v_id = null)
    {
        if ($v_id === null){
            return $this->db->get('tb_ti')->result_array();
        }else {
            return $this->db->get_where('tb_ti', ['ti_id' => $v_id])->result_array();
        }
    }



    public function selectKecamatan($id){
        $sql='SELECT * FROM tb_kecamatan WHERE id_kab=?';
        return $this->db->query($sql, $id)->result_array();
    }



    public function selectByLat($lat, $id){
      $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE latitude !=? AND jenis_id = ?' ;
      return $this->db->query($sql,[$lat, $id])->result_array();
    }

    public function selectByIdLat($lat){
        $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE latitude !=?';
        return $query=$this->db->query($sql, $lat)->result_array(); 
    }


    public function selectById($id){
      $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE ti_id =?';
      return $query=$this->db->query($sql,$id)->row_array(); 
  }


    public function selectAlltempatIbadah(){
        $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id';
        return $query=$this->db->query($sql)->result_array(); 
    }


// DASHBOARD



    public function selectByKabupaten($kab){
        $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE ti_kabupaten =?' ;
        return $this->db->query($sql,$kab)->result_array();
    }

    public function selectByJenis($jenis){
        $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE ti_jenis =?' ;
        return $this->db->query($sql,$jenis)->result_array();
    }

    public function selectByKabJenis($kab, $jenis){
        $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE ti_kabupaten =? AND ti_jenis=?' ;
        return $this->db->query($sql, [$kab, $jenis])->result_array();
    }

// MASJID

    public function total_masjid_by_kab($id_kab){
        $sql='SELECT * FROM tb_ti WHERE ti_jenis =1 AND ti_kabupaten = ?';
        $query=$this->db->query($sql,$id_kab);

        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }

    public function total_masjid(){
        $sql='SELECT * FROM tb_ti WHERE ti_jenis =1';
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
        
    }
    

    public function selectMasjid(){
        $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE ti_jenis = 1';
        return $this->db->query($sql)->result_array();   
    }

    public function selectMasjidByKab($id_kab){
        $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE ti_jenis = 1 AND ti_kabupaten=?';
        return $this->db->query($sql,$id_kab)->result_array();   
    }


   



// PURA

    public function total_pura_by_kab($id_kab){
        $sql='SELECT * FROM tb_ti WHERE ti_jenis =2 AND ti_kabupaten =?';
        $query=$this->db->query($sql,$id_kab);

        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }


    public function total_pura(){
        $sql='SELECT * FROM tb_ti WHERE ti_jenis =2';
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }

    public function selectPura(){
        $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE ti_jenis = 2';
        return $this->db->query($sql)->result_array();
        // return $this->db->get('tb_ti')->result_array();
        
    }

    public function selectPuraByKab($id_kab){
        $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE ti_jenis = 2 AND ti_kabupaten = ?';
        return $this->db->query($sql,$id_kab)->result_array();
        // return $this->db->get('tb_ti')->result_array();
        
    }
    

// GEREJA

    public function total_gereja_by_kab($id_kab){
        $sql='SELECT * FROM tb_ti WHERE ti_jenis =3 AND ti_kabupaten=?';
        $query=$this->db->query($sql,$id_kab);

        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }


    public function total_gereja(){
        $sql='SELECT * FROM tb_ti WHERE ti_jenis =3';
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }

     public function selectGereja(){
        $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE ti_jenis = 3';
        return $this->db->query($sql)->result_array();
        // return $this->db->get('tb_ti')->result_array();
        
    }


    public function selectGerejaByKab($id_kab){
        $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE ti_jenis = 3 AND ti_kabupaten=?';
        return $this->db->query($sql,$id_kab)->result_array();   
    }



    
// VIHARA

    public function total_vihara_by_kab($id_kab){
        $sql='SELECT * FROM tb_ti WHERE ti_jenis =4 AND ti_kabupaten=?';
        $query=$this->db->query($sql,$id_kab);

        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }


    public function total_vihara(){
        $sql='SELECT * FROM tb_ti WHERE ti_jenis =4';
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }


    public function selectVihara(){
        $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE ti_jenis = 4';
        return $this->db->query($sql)->result_array();
    }

    public function selectViharaByKab($id_kab){
        $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE ti_jenis = 4 AND ti_kabupaten = ?';
        return $this->db->query($sql,$id_kab)->result_array();
    }
    
// KLENTENG
    
    public function total_klenteng_by_kab($id_kab){
       $sql='SELECT * FROM tb_ti WHERE ti_jenis =5 AND ti_kabupaten=?';
        $query=$this->db->query($sql,$id_kab);

        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }

    
   public function total_klenteng(){
       $sql='SELECT * FROM tb_ti WHERE ti_jenis =5';
        $query=$this->db->query($sql);

        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }
    
    public function selectKlenteng(){
        $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE ti_jenis = 5';
        return $this->db->query($sql)->result_array();        
    }


    public function selectKlentengByKab($id_kab){
        $sql='SELECT * FROM tb_ti LEFT JOIN tb_kabupaten ON tb_ti.ti_kabupaten = tb_kabupaten.kab_id LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kab = tb_kabupaten.kab_id AND tb_kecamatan.kec_id = tb_ti.ti_kecamatan JOIN tb_jenis ON tb_ti.ti_jenis = tb_jenis.jenis_id WHERE ti_jenis = 5 AND ti_kabupaten = ?';
        return $this->db->query($sql,$id_kab)->result_array();        
    }




    public function selectAlljenis(){
        return $this->db->get('tb_jenis')->result_array();
        
    }



    public function create_ti($v_data)
    {
        $this->db->insert('tb_ti', $v_data);
        return $this->db->affected_rows();
    }

    public function hapus_ti($v_id) {
        $this->db->where('ti_id', $v_id);
        $this->db->delete('tb_ti');
    }

    public function edit_ti($id, $data){     
        $this->db->update('tb_ti', $data, array('ti_id' => $id));
    }
    
}