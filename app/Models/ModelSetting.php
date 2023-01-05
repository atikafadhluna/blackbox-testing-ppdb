<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSetting extends Model
{
    public function detailSetting()
    {
        return $this->db->table('tbl_web')
            ->where('id_setting', '1')
            ->get()->getRowArray();
    }

    public function saveSetting($data)
    {
        $this->db->table('tbl_web')
            ->where('id_setting', '1')
            ->update($data);
    }

    // estimasi home (jml daftar, laki2.perempuan)
    public function jmlPendaftar()
    {
        return $this->db->table('tbl_siswa')
            ->where('status_pendaftaran', '1')
            ->countAllResults();
    }

    public function jmlPendaftarLManual()
    {
        return $this->db->table('tbl_siswa')
            ->where('status_pendaftaran', '1')
            ->where('nilai_ujian >=', '60.00')
            ->countAllResults();
    }

    public function jmlPendaftarTLManual()
    {
        return $this->db->table('tbl_siswa')
            ->where('status_pendaftaran', '1')
            ->where('nilai_ujian <', '60.00')
            ->countAllResults();
    }

    public function jmlPendaftarL()
    {
        return $this->db->table('tbl_hasilujian')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_hasilujian.siswa_id')
            ->where('tbl_siswa.status_pendaftaran', '1')
            ->where('tbl_hasilujian.nilai >=', '60.00')
            ->countAllResults();
    }

    public function jmlPendaftarTL()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_hasilujian', 'tbl_siswa.id_siswa = tbl_hasilujian.siswa_id')
            ->where('tbl_siswa.status_pendaftaran', '1')
            ->where('tbl_hasilujian.nilai <', '60.00')
            ->countAllResults();
    }

    public function jmlLaki()
    {
        return $this->db->table('tbl_siswa')
            ->where('jenis_kelamin', 'Laki-laki')
            ->countAllResults();
    }

    public function jmlPr()
    {
        return $this->db->table('tbl_siswa')
            ->where('jenis_kelamin', 'Perempuan')
            ->countAllResults();
    }
}
