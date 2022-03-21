<?php
class M_implementasi_kerja_sama extends CI_Model
{
    public function tambah_implementasi_kerja_sama($masa_berlaku, $id_lembaga_mitra,  $keterangan, $id_bentuk_perjanjian, $file_implementasi_kerja_sama, $id_kategori_kerja_sama,  $id_masa_berlaku){
        $this->db->trans_start();
        $this->db->query("INSERT INTO implementasi_kerja_sama(masa_berlaku, id_lembaga_mitra, keterangan, id_bentuk_perjanjian, file_implementasi_kerja_sama, id_kategori_kerja_sama, id_masa_berlaku) 
        VALUES ('$masa_berlaku', '$id_lembaga_mitra','$keterangan','$id_bentuk_perjanjian','$file_implementasi_kerja_sama','$id_kategori_kerja_sama' ,' $id_masa_berlaku')");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
            return true;
        else
            return false;
    }

    function get_implementasi_kerja_sama(){
        $hasil=$this->db->query("SELECT * FROM implementasi_kerja_sama 
        JOIN user ON implementasi_kerja_sama.id_lembaga_mitra = user.id
        JOIN bentuk_perjanjian ON implementasi_kerja_sama.id_bentuk_perjanjian = bentuk_perjanjian.id_bentuk_perjanjian
        JOIN kategori_kerja_sama ON implementasi_kerja_sama.id_kategori_kerja_sama = kategori_kerja_sama.id_kategori_kerja_sama
        JOIN masa_berlaku ON implementasi_kerja_sama.id_masa_berlaku = masa_berlaku.id_masa_berlaku
        JOIN evaluasi ON implementasi_kerja_sama.id_evaluasi = evaluasi.id_evaluasi");
        return $hasil;
    }

    function get_implementasi_kerja_sama_by_id($id_lembaga_mitra){
        $hasil=$this->db->query("SELECT * FROM implementasi_kerja_sama 
        JOIN user ON implementasi_kerja_sama.id_lembaga_mitra = user.id
        JOIN bentuk_perjanjian ON implementasi_kerja_sama.id_bentuk_perjanjian = bentuk_perjanjian.id_bentuk_perjanjian
        JOIN kategori_kerja_sama ON implementasi_kerja_sama.id_kategori_kerja_sama = kategori_kerja_sama.id_kategori_kerja_sama
        JOIN masa_berlaku ON implementasi_kerja_sama.id_masa_berlaku = masa_berlaku.id_masa_berlaku
        JOIN evaluasi ON implementasi_kerja_sama.id_evaluasi = evaluasi.id_evaluasi
        WHERE implementasi_kerja_sama.id_lembaga_mitra='$id_lembaga_mitra'");
        return $hasil;
    }

    function get_implementasi_kerja_sama_by_kategori($id_kategori_kerja_sama){
        $hasil=$this->db->query("SELECT * FROM implementasi_kerja_sama 
        JOIN user ON implementasi_kerja_sama.id_lembaga_mitra = user.id
        JOIN bentuk_perjanjian ON implementasi_kerja_sama.id_bentuk_perjanjian = bentuk_perjanjian.id_bentuk_perjanjian
        JOIN kategori_kerja_sama ON implementasi_kerja_sama.id_kategori_kerja_sama = kategori_kerja_sama.id_kategori_kerja_sama
        JOIN masa_berlaku ON implementasi_kerja_sama.id_masa_berlaku = masa_berlaku.id_masa_berlaku
        JOIN evaluasi ON implementasi_kerja_sama.id_evaluasi = evaluasi.id_evaluasi
        WHERE implementasi_kerja_sama.id_kategori_kerja_sama='$id_kategori_kerja_sama'");
        return $hasil;
    }

    function jumlah_implementasi_kerja_sama(){
        $hsl = $this->db->query("SELECT COUNT(id_implementasi_kerja_sama) as total_implementasi_kerja_sama FROM implementasi_kerja_sama ");
         return $hsl;
    }

    function jumlah_implementasi_kerja_sama_by_id($id_lembaga_mitra){
        $hsl = $this->db->query("SELECT COUNT(id_implementasi_kerja_sama) as total_implementasi_kerja_sama FROM implementasi_kerja_sama WHERE implementasi_kerja_sama.id_lembaga_mitra='$id_lembaga_mitra'");
         return $hsl;
    }

    function update_implementasi_kerja_sama($masa_berlaku, $id_lembaga_mitra,  $keterangan, $id_bentuk_perjanjian, $file_implementasi_kerja_sama, $id_kategori_kerja_sama, $id_masa_berlaku, $id_implementasi_kerja_sama){
        $hsl = $this->db->query("UPDATE implementasi_kerja_sama SET masa_berlaku='$masa_berlaku',  id_lembaga_mitra='$id_lembaga_mitra',  keterangan='$keterangan',  id_bentuk_perjanjian='$id_bentuk_perjanjian',  file_implementasi_kerja_sama='$file_implementasi_kerja_sama',  id_kategori_kerja_sama='$id_kategori_kerja_sama',  id_masa_berlaku='$id_masa_berlaku'  WHERE id_implementasi_kerja_sama='$id_implementasi_kerja_sama'");
         return $hsl;
     }

    function hapus_implementasi_kerja_sama($id_implementasi_kerja_sama){
        $this->db->trans_start();
        $this->db->query("DELETE FROM implementasi_kerja_sama WHERE id_implementasi_kerja_sama='$id_implementasi_kerja_sama'");
         
        $this->db->trans_complete();
       if($this->db->trans_status()==true)
       return true;
       else
       return false;
    }
}