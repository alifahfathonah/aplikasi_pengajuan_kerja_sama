<?php
class M_evaluasi extends CI_Model
{
    function get_evaluasi(){
        $hasil=$this->db->query("SELECT * FROM evaluasi");
        return $hasil->result_array();
    }

    public function tambah_evaluasi($evaluasi){
        $this->db->trans_start();
        $this->db->query("INSERT INTO evaluasi(evaluasi) 
        VALUES ('$evaluasi')");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    public function update_evaluasi($evaluasi, $id_evaluasi){
        $hsl = $this->db->query("UPDATE evaluasi SET evaluasi='$evaluasi' WHERE id_evaluasi='$id_evaluasi'");
         return $hsl;
     }

}