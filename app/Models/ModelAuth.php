<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{

    // public function cek_email($email)
    // {
    //     $builder = $this->db->table('tbl_panitia');
    //     $builder->select('id_panitia, email, password, nama_panitia');
    //     $builder->where('email', $email);
    //     $result = $builder->get();
    //     if (count($result->getResultArray()) == 1) {
    //         return $result->getRowArray();
    //     } else {
    //         return false;
    //     }
    // }

    // public function updateAt($id_panitia)
    // {
    //     $builder = $this->db->table('tbl_panitia');
    //     $builder->where('id_panitia', $id_panitia);
    //     $builder->update(['updated_at' => date('Y-m-d H:i:s')]);
    //     if ($this->db->affectedRows() == 1) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function verifyToken($token)
    // {
    //     $builder = $this->db->table('tbl_panitia');
    //     $builder->select('id_panitia, email, password, nama_panitia', 'updated_at');
    //     $builder->where('id_panitia', $token);
    //     $result = $builder->get();
    //     if (count($result->getResultArray()) == 1) {
    //         return $result->getRowArray();
    //     } else {
    //         return false;
    //     }
    // }

    // public function updatePassword($id_panitia, $npwd)
    // {
    //     $builder = $this->db->table('tbl_panitia');
    //     $builder->where('id_panitia', $id_panitia);
    //     $builder->update(['password' => $npwd]);
    //     if ($this->db->affectedRows() == 1) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // begin admin
    public function login_user($email)
    {
        return $this->db->table('tbl_user')->where(
            [
                'email' => $email,
            ]
        )->get()->getRowArray();
    }
    // end admin

    // begin panitia

    public function login_panitia($email)
    {
        return $this->db->table('tbl_panitia')->where(
            [
                'email' => $email,
            ]
        )->get()->getRowArray();
    }

    // end panitia

    // begin siswa
    public function insertData($data)
    {
        $this->db->table('tbl_siswa')->insert($data);
    }

    public function login_siswa($nisn)
    {
        return $this->db->table('tbl_siswa')->where(
            [
                'nisn' => $nisn,
            ]
        )->get()->getRowArray();
    }

    public function noPendaftaran()
    {
        $kode = $this->db->table('tbl_siswa')
            ->select('RIGHT(no_pendaftaran, 4) as no_pendaftaran', false)
            ->select('LEFT(no_pendaftaran, 8) as tanggal', false)
            ->orderBy('no_pendaftaran', 'DESC')
            ->limit(1)->get()->getRowArray();

        $tanggalSekarang = date('Ymd');
        $no = 1;
        if (isset($kode) == 1) {
            if (($tanggalSekarang == $kode['tanggal']) == 1) {
                $no = intval($kode['no_pendaftaran']) + 1;
            }
        }

        $tgl = date('Ymd');
        $batas = str_pad($no, 4, "0", STR_PAD_LEFT);
        $no_pendaftaran = $tgl . $batas;
        return $no_pendaftaran;
    }
    // end siswa


}
