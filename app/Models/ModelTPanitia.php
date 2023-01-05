<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTPanitia extends Model
{
    protected $table = 'tbl_panitia';

    public function getAllData()
    {
        return $this->db->table('tbl_panitia')
            ->orderBy('id_panitia', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_panitia')->insert($data);
    }

    public function editData($data)
    {
        $this->db->table('tbl_panitia')
            ->where('id_panitia', $data['id_panitia'])
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('tbl_panitia')
            ->where('id_panitia', $data['id_panitia'])
            ->delete($data);
    }

    public function detailData($id_panitia)
    {
        return $this->db->table('tbl_panitia')
            ->where('id_panitia', $id_panitia)
            ->get()
            ->getRowArray();
    }


    public function getProfile()
    {
        return $this->db->table('tbl_panitia')
            ->where('id_panitia', session()->get('id_panitia'))
            ->get()
            ->getRowArray();
    }

    public function ubahPassword($npwd, $id_panitia)
    {
        $builder = $this->db->table('tbl_panitia');
        $builder->where('id_panitia', $id_panitia);
        $builder->update(['password' => $npwd]);
        if ($this->db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
