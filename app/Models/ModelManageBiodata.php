<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelManageBiodata extends Model
{
    // pekerjaan
    public function getAllPekerjaan()
    {
        return $this->db->table('tbl_pekerjaan')
            ->orderBy('id_pekerjaan', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function insertPekerjaan($data)
    {
        $this->db->table('tbl_pekerjaan')->insert($data);
    }

    public function editPekerjaan($data)
    {
        $this->db->table('tbl_pekerjaan')
            ->where('id_pekerjaan', $data['id_pekerjaan'])
            ->update($data);
    }

    public function deletePekerjaan($data)
    {
        $this->db->table('tbl_pekerjaan')
            ->where('id_pekerjaan', $data['id_pekerjaan'])
            ->delete($data);
    }




    // pendidikan
    public function getAllPendidikan()
    {
        return $this->db->table('tbl_pendidikan')
            ->orderBy('id_pendidikan', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function insertPendidikan($data)
    {
        $this->db->table('tbl_pendidikan')->insert($data);
    }

    public function editPendidikan($data)
    {
        $this->db->table('tbl_pendidikan')
            ->where('id_pendidikan', $data['id_pendidikan'])
            ->update($data);
    }

    public function deletePendidikan($data)
    {
        $this->db->table('tbl_pendidikan')
            ->where('id_pendidikan', $data['id_pendidikan'])
            ->delete($data);
    }



    // Penghasilan
    public function getAllPenghasilan()
    {
        return $this->db->table('tbl_penghasilan')
            ->orderBy('id_penghasilan', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function insertPenghasilan($data)
    {
        $this->db->table('tbl_penghasilan')->insert($data);
    }

    public function editPenghasilan($data)
    {
        $this->db->table('tbl_penghasilan')
            ->where('id_penghasilan', $data['id_penghasilan'])
            ->update($data);
    }

    public function deletePenghasilan($data)
    {
        $this->db->table('tbl_penghasilan')
            ->where('id_penghasilan', $data['id_penghasilan'])
            ->delete($data);
    }


    // Agama
    public function getAllAgama()
    {
        return $this->db->table('tbl_agama')
            ->orderBy('id_agama', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function insertAgama($data)
    {
        $this->db->table('tbl_agama')->insert($data);
    }

    public function editAgama($data)
    {
        $this->db->table('tbl_agama')
            ->where('id_agama', $data['id_agama'])
            ->update($data);
    }

    public function deleteAgama($data)
    {
        $this->db->table('tbl_agama')
            ->where('id_agama', $data['id_agama'])
            ->delete($data);
    }


    // Kegemaran
    public function getAllKegemaran()
    {
        return $this->db->table('tbl_kegemaran')
            ->orderBy('id_kegemaran', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function insertKegemaran($data)
    {
        $this->db->table('tbl_kegemaran')->insert($data);
    }

    public function editKegemaran($data)
    {
        $this->db->table('tbl_kegemaran')
            ->where('id_kegemaran', $data['id_kegemaran'])
            ->update($data);
    }

    public function deleteKegemaran($data)
    {
        $this->db->table('tbl_kegemaran')
            ->where('id_kegemaran', $data['id_kegemaran'])
            ->delete($data);
    }
}
