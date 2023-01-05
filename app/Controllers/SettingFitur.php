<?php

namespace App\Controllers;

use App\Models\ModelSettingFitur;
use App\Models\ModelAdmin;

class SettingFitur extends BaseController

{
    public function __construct()
    {
        helper('form');
        $this->ModelSettingFitur = new ModelSettingFitur();
        $this->ModelAdmin = new ModelAdmin();
    }
    public function index()
    {
        $data = [
            'title' => 'Setting Ujian',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'setting' => $this->ModelSettingFitur->detailSetting(),
            'user' => $this->ModelAdmin->getProfile(),
        ];
        return view('admin/pengaturan/setting_fitur', $data);
    }

    public function statusAktif($id_setting)
    {
        $data = [
            'id_setting' => $id_setting,
            'status_ujian' => 1
        ];
        $this->ModelSettingFitur->resetStatus();
        $this->ModelSettingFitur->editData($data);
        session()->setFlashdata('add', 'Fitur Ujian Berhasil Di Aktifkan !!');
        return redirect()->to(base_url('SettingFitur/index'));
    }

    public function statusNonaktif($id_setting)
    {
        $data = [
            'id_setting' => $id_setting,
            'status_ujian' => 0
        ];

        $this->ModelSettingFitur->editData($data);
        session()->setFlashdata('add', 'Fitur Ujian Berhasil Di Non Aktifkan !!');
        return redirect()->to(base_url('SettingFitur/index'));
    }

    public function statusAktifFormulir($id_setting)
    {
        $data = [
            'id_setting' => $id_setting,
            'status_dformulir' => 1
        ];
        $this->ModelSettingFitur->resetStatusFormulir();
        $this->ModelSettingFitur->editData($data);
        session()->setFlashdata('add', 'Fitur Ujian Berhasil Di Aktifkan !!');
        return redirect()->to(base_url('SettingFitur/index'));
    }

    public function statusNonaktifFormulir($id_setting)
    {
        $data = [
            'id_setting' => $id_setting,
            'status_dformulir' => 0
        ];

        $this->ModelSettingFitur->editData($data);
        session()->setFlashdata('add', 'Fitur Ujian Berhasil Di Non Aktifkan !!');
        return redirect()->to(base_url('SettingFitur/index'));
    }
}
