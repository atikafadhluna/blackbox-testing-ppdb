<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelFormulir extends Model
{
    public function getFormulir()
    {
        return $this->db->table('tbl_siswa')
            ->where('id_siswa', session()->get('id_siswa'))
            ->get()
            ->getRowArray();
    }

    public function isReadyFormulir()
    {
        return $this->db->table('tbl_siswa')
            ->where('id_siswa', session()->get('id_siswa'))
            ->where('status_pendaftaran', '0')
            ->get()
            ->getRowArray();
    }

    public function isReadyDaftarUlang()
    {
        return $this->db->table('tbl_siswa')
            ->where('id_siswa', session()->get('id_siswa'))
            ->where('daftar_ulang', '1')
            ->get()
            ->getRowArray();
    }

    public function detailData($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->where('id_siswa', $id_siswa)
            ->get()
            ->getRowArray();
    }

    public function editData($data)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $data['id_siswa'])
            ->update($data);
    }

    public function statusDaftarUlang()
    {
        return $this->db->table('tbl_siswa')
            ->where('daftar_ulang', '0')
            ->get()
            ->getResultArray();
    }
}
