<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function jmlPendaftar()
    {
        return $this->db->table('tbl_siswa')
            ->where('status_pendaftaran', '1')
            ->countAllResults();
    }

    public function getProfile()
    {
        return $this->db->table('tbl_user')
            ->where('id_user', session()->get('id_user'))
            ->get()
            ->getRowArray();
    }

    public function editData($data)
    {
        $this->db->table('tbl_user')
            ->where('id_user', $data['id_user'])
            ->update($data);
    }

    public function detailData($id_user)
    {
        return $this->db->table('tbl_user')
            ->where('id_user', $id_user)
            ->get()
            ->getRowArray();
    }

    public function ubahPassword($npwd, $id_user)
    {
        $builder = $this->db->table('tbl_user');
        $builder->where('id_user', $id_user);
        $builder->update(['password' => $npwd]);
        if ($this->db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
