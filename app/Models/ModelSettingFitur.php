<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSettingFitur extends Model
{
    public function detailSetting()
    {
        return $this->db->table('tbl_web')
            ->where('id_setting', '1')
            ->get()->getRowArray();
    }
    public function editData($data)
    {
        $this->db->table('tbl_web')
            ->where('id_setting', $data['id_setting'])
            ->update($data);
    }

    public function resetStatus()
    {
        $this->db->table('tbl_web')
            ->update(['status_ujian' => 0]);
    }

    public function resetStatusFormulir()
    {
        $this->db->table('tbl_web')
            ->update(['status_dformulir' => 0]);
    }

    public function getAktifUjian()
    {
        return $this->db->table('tbl_web')
            ->where('status_ujian', 1)
            ->get()->getRowArray();
    }

    public function getAktifDFormulir()
    {
        return $this->db->table('tbl_web')
            ->where('status_dformulir', 1)
            ->get()->getRowArray();
    }
}
