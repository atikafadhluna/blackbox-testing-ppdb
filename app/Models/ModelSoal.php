<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSoal extends Model
{

    protected $table = 'tbl_soal';

    public function getAllData()
    {
        return $this->db->table('tbl_soal')
            ->orderBy('id_soal', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function insertSoal($data)
    {
        $this->db->table('tbl_soal')->insert($data);
    }

    public function editSoal($data)
    {
        $this->db->table('tbl_soal')
            ->where('id_soal', $data['id_soal'])
            ->update($data);
    }

    public function deleteSoal($data)
    {
        $this->db->table('tbl_soal')
            ->where('id_soal', $data['id_soal'])
            ->delete($data);
    }

    public function getSoalAcak($jumlah)
    {
        $query = "SELECT * FROM tbl_soal ORDER BY RAND() LIMIT $jumlah";
        return $this->db->query($query)->getResultArray();
    }
}
