<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTahunAjaran extends Model
{
    public function taAktif()
    {
        return $this->db->table('tbl_ta')
            ->where('status', '1')
            ->get()->getRowArray();
    }

    public function getAllData()
    {
        return $this->db->table('tbl_ta')
            ->orderBy('id_ta', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getData($tahun)
    {
        return $this->db->table('tbl_ta')
            ->orderBy('id_ta', 'ASC')
            ->where('tahun', $tahun)
            ->get()
            ->getRowArray();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_ta')->insert($data);
    }

    public function editData($data)
    {
        $this->db->table('tbl_ta')
            ->where('id_ta', $data['id_ta'])
            ->update($data);
    }

    public function editDataKKM($data)
    {
        $this->db->table('tbl_ta')
            ->where('status', '1')
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('tbl_ta')
            ->where('id_ta', $data['id_ta'])
            ->delete($data);
    }

    public function resetStatus()
    {
        $this->db->table('tbl_ta')
            ->update(['status' => 0]);
    }

    public function statusTa()
    {
        return $this->db->table('tbl_ta')
            ->where('status', '1')
            ->get()
            ->getResultArray();
    }

    //formulir 
    public function getAktifIsiFormulir()
    {
        $query = "SELECT * FROM tbl_ta WHERE tanggal_mulai_pendaftaran <= CURDATE() AND tanggal_selesai_pendaftaran >= CURDATE()";
        return $this->db->query($query)->getRowArray();
    }

    //daftarulang
    public function getAktifDaftarUlang()
    {
        $query = "SELECT * FROM tbl_ta WHERE tanggal_mulai_daftar_ulang <= CURDATE() AND tanggal_selesai_daftar_ulang >= CURDATE()";
        return $this->db->query($query)->getRowArray();
    }

    //pengumuman
    public function getAktifPengumuman()
    {
        $query = "SELECT * FROM tbl_ta WHERE tanggal_pengumuman <= CURDATE() AND tanggal_selesai_daftar_ulang >= CURDATE()";
        return $this->db->query($query)->getRowArray();
    }
}
