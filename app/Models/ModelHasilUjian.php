<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHasilUjian extends Model
{
    protected $table = 'tbl_hasilujian';

    public function opsiNilai()
    {
        return $this->db->table('tbl_hasilujian')
            ->orderBy('id_hasilujian', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function insertHasilUjian($data)
    {
        $this->db->table('tbl_hasilujian')->insert($data);
    }

    public function getHasil()
    {
        return $this->db->table('tbl_hasilujian')
            ->where('siswa_id', session()->get('siswa_id'))
            ->get()
            ->getRowArray();
    }

    public function getPengumuman($id)
    {
        $query = "SELECT * FROM tbl_hasilujian WHERE siswa_id = $id AND ujian_id = " . $this->getLastUjian()['id_ujian'];

        return $this->db->query($query)->getRowArray();
    }

    public function getLastUjian()
    {
        $query = "SELECT * FROM tbl_ujian ORDER BY id_ujian DESC LIMIT 1";
        return $this->db->query($query)->getRowArray();
    }


    public function getNilaiSiswa()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_hasilujian', 'tbl_hasilujian.siswa_id = tbl_siswa.id_siswa', 'left')
            ->orderBy('tbl_hasilujian.nilai_akhir', 'DESC')
            ->where('status_pendaftaran', '1')
            ->where('cek_ujian', '1')
            ->get()
            ->getResultArray();
    }

    public function updateNilai($data)
    {
        $this->db->table('tbl_hasilujian')->updateBatch($data, 'siswa_id');
    }


    //nilai manual
    public function pengumumanManual()
    {
        return $this->db->table('tbl_siswa')
            ->where('status_pendaftaran', '1')
            ->get()
            ->getRowArray();
    }
    public function getNilaiManual()
    {
        return $this->db->table('tbl_siswa')
            ->orderBy('nilai_akhir', 'DESC')
            ->where('status_pendaftaran', '1')
            ->get()
            ->getResultArray();
    }

    public function updateNilaiManual($data)
    {
        $this->db->table('tbl_siswa')->updateBatch($data, 'id_siswa');
    }
    //nilai manual
}
