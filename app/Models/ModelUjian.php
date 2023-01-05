<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUjian extends Model
{

    protected $table = 'tbl_ujian';



    public function getAllData()
    {
        return $this->db->table('tbl_ujian')
            ->orderBy('id_ujian', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getAllData1()
    {
        return $this->db->table('tbl_ujian')
            ->orderBy('id_ujian', 'ASC')
            ->get()
            ->getRowArray();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_ujian')->insert($data);
    }

    public function editData($data)
    {
        $this->db->table('tbl_ujian')
            ->where('id_ujian', $data['id_ujian'])
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('tbl_ujian')
            ->where('id_ujian', $data['id_ujian'])
            ->delete($data);
    }

    public function getAktifUjian()
    {
        $query = "SELECT * FROM tbl_ujian WHERE tgl_mulai <= CURDATE() AND tgl_selesai >= CURDATE()";
        return $this->db->query($query)->getRowArray();
    }

    public function isReadyUjian($siswa_id)
    {
        if($this->getAktifUjian() == null)
            return false;
        $query = "SELECT *FROM tbl_hasilujian WHERE siswa_id = $siswa_id AND ujian_id = " . $this->getAktifUjian()['id_ujian'];
        return $this->db->query($query)->getRowArray() ? true : false;
    }
}
