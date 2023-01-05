<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelTahunAjaran;
use App\Models\ModelAdmin;





class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelSetting = new ModelSetting();
        $this->ModelTahunAjaran = new ModelTahunAjaran();
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'setting' => $this->ModelSetting->detailSetting(),
            'ta' => $this->ModelTahunAjaran->taAktif(),
            'jmlPendaftar' => $this->ModelAdmin->jmlPendaftar(),
            'jmlLaki' => $this->ModelSetting->jmlLaki(),
            'jmlPr' => $this->ModelSetting->jmlPr(),
        ];
        return view('home', $data);
    }

    public function alurPendaftaran()
    {
        $data = [
            'title' => 'Alur Pendaftaran',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'setting' => $this->ModelSetting->detailSetting(),
            'ta' => $this->ModelTahunAjaran->taAktif(),
        ];
        return view('alur_pendaftaran', $data);
    }
    public function kontak()
    {
        $data = [
            'title' => 'Kontak Panitia',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'setting' => $this->ModelSetting->detailSetting(),
            'ta' => $this->ModelTahunAjaran->taAktif(),
        ];
        return view('kontak', $data);
    }
}
