<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLaporan extends Model
{
    protected $table = 'tbl_hasilujian';

    public function opsiNilai()
    {
        return $this->db->table('tbl_hasilujian')
            ->orderBy('id_hasilujian', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getNilaiSiswa($tahun)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_hasilujian', 'tbl_hasilujian.siswa_id = tbl_siswa.id_siswa', 'left')
            ->where('tahun', $tahun)
            ->where('status_pendaftaran', '1')
            ->where('cek_ujian', '1')
            ->get()
            ->getResultArray();
    }

    //nilai manual
    public function getNilaiManual($tahun)
    {
        return $this->db->table('tbl_siswa')
            ->where('tahun', $tahun)
            ->where('status_pendaftaran', '1')
            ->get()
            ->getResultArray();
    }

    //nilai manual
}
