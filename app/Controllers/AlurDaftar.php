<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelTahunAjaran;
use App\Models\ModelAdmin;

class AlurDaftar extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelSetting = new ModelSetting();
        $this->ModelTahunAjaran = new ModelTahunAjaran();
        $this->ModelAdmin = new ModelAdmin();
    }
    public function index()
    {
        $data = [
            'title' => 'Setting Alur Pendaftaran',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'setting' => $this->ModelSetting->detailSetting(),
            'user' => $this->ModelAdmin->getProfile(),
        ];
        return view('admin/pengaturan/setting_alur', $data);
    }

    public function DaftarAkun()
    {

        //gambar tidak diganti
        $file = $this->request->getFile('gambar_daftar');
        // echo json_encode($file);
        // exit;
        if ($file->getError() == 4) {
            $data = [
                'desc_daftar' => $this->request->getPost('desc_daftar'),
            ];
            $this->ModelSetting->saveSetting($data);
        } else {
            //hapus foto lama dalam folder foto
            $setting = $this->ModelSetting->detailSetting();
            if ($setting['gambar_daftar'] != "") {
                unlink('./alur/' . $setting['gambar_daftar']);
            }

            //edit data foto
            $nama_file = $file->getRandomName();
            $data = [
                'desc_daftar' => $this->request->getPost('desc_daftar'),
                'gambar_daftar' => $nama_file,
            ];
            //upload file foto
            $file->move('alur/', $nama_file);
            $this->ModelSetting->saveSetting($data);
        }
        session()->setFlashdata('message', 'Data Berhasil di ganti !!');
        return redirect()->to(base_url('AlurDaftar/index'));
    }

    public function LoginAkun()
    {
        //gambar tidak diganti
        $file = $this->request->getFile('gambar_login');
        // echo json_encode($file);
        // exit;
        if ($file->getError() == 4) {
            $data = [
                'desc_login' => $this->request->getPost('desc_login'),
            ];
            $this->ModelSetting->saveSetting($data);
        } else {
            //hapus foto lama dalam folder foto
            $setting = $this->ModelSetting->detailSetting();
            if ($setting['gambar_login'] != "") {
                unlink('./alur/' . $setting['gambar_login']);
            }

            //edit data foto
            $nama_file = $file->getRandomName();
            $data = [
                'desc_login' => $this->request->getPost('desc_login'),
                'gambar_login' => $nama_file,
            ];
            //upload file foto
            $file->move('alur/', $nama_file);
            $this->ModelSetting->saveSetting($data);
        }
        session()->setFlashdata('message', 'Data Berhasil di ganti !!');
        return redirect()->to(base_url('AlurDaftar/index'));
    }

    public function pengisianFormulir()
    {
        //gambar tidak diganti
        $file = $this->request->getFile('gambar_formulir');
        // echo json_encode($file);
        // exit;
        if ($file->getError() == 4) {
            $data = [
                'desc_formulir' => $this->request->getPost('desc_formulir'),
            ];
            $this->ModelSetting->saveSetting($data);
        } else {
            //hapus foto lama dalam folder foto
            $setting = $this->ModelSetting->detailSetting();
            if ($setting['gambar_formulir'] != "") {
                unlink('./alur/' . $setting['gambar_formulir']);
            }

            //edit data foto
            $nama_file = $file->getRandomName();
            $data = [
                'desc_formulir' => $this->request->getPost('desc_formulir'),
                'gambar_formulir' => $nama_file,
            ];
            //upload file foto
            $file->move('alur/', $nama_file);
            $this->ModelSetting->saveSetting($data);
        }
        session()->setFlashdata('message', 'Data Berhasil di ganti !!');
        return redirect()->to(base_url('AlurDaftar/index'));
    }
    public function downloadFormulir()
    {
        //gambar tidak diganti
        $file = $this->request->getFile('gambar_download');
        // echo json_encode($file);
        // exit;
        if ($file->getError() == 4) {
            $data = [
                'desc_download' => $this->request->getPost('desc_download'),
            ];
            $this->ModelSetting->saveSetting($data);
        } else {
            //hapus foto lama dalam folder foto
            $setting = $this->ModelSetting->detailSetting();
            if ($setting['gambar_download'] != "") {
                unlink('./alur/' . $setting['gambar_download']);
            }

            //edit data foto
            $nama_file = $file->getRandomName();
            $data = [
                'desc_download' => $this->request->getPost('desc_download'),
                'gambar_download' => $nama_file,
            ];
            //upload file foto
            $file->move('alur/', $nama_file);
            $this->ModelSetting->saveSetting($data);
        }
        session()->setFlashdata('message', 'Data Berhasil di ganti !!');
        return redirect()->to(base_url('AlurDaftar/index'));
    }

    public function mengikutiUjian()
    {
        //gambar tidak diganti
        $file = $this->request->getFile('gambar_ujian');
        // echo json_encode($file);
        // exit;
        if ($file->getError() == 4) {
            $data = [
                'desc_ujian' => $this->request->getPost('desc_ujian'),
            ];
            $this->ModelSetting->saveSetting($data);
        } else {
            //hapus foto lama dalam folder foto
            $setting = $this->ModelSetting->detailSetting();
            if ($setting['gambar_ujian'] != "") {
                unlink('./alur/' . $setting['gambar_ujian']);
            }

            //edit data foto
            $nama_file = $file->getRandomName();
            $data = [
                'desc_ujian' => $this->request->getPost('desc_ujian'),
                'gambar_ujian' => $nama_file,
            ];
            //upload file foto
            $file->move('alur/', $nama_file);
            $this->ModelSetting->saveSetting($data);
        }
        session()->setFlashdata('message', 'Data Berhasil di ganti !!');
        return redirect()->to(base_url('AlurDaftar/index'));
    }

    public function pengumuman()
    {
        //gambar tidak diganti
        $file = $this->request->getFile('gambar_pengumuman');
        // echo json_encode($file);
        // exit;
        if ($file->getError() == 4) {
            $data = [
                'desc_pengumuman' => $this->request->getPost('desc_pengumuman'),
            ];
            $this->ModelSetting->saveSetting($data);
        } else {
            //hapus foto lama dalam folder foto
            $setting = $this->ModelSetting->detailSetting();
            if ($setting['gambar_pengumuman'] != "") {
                unlink('./alur/' . $setting['gambar_pengumuman']);
            }

            //edit data foto
            $nama_file = $file->getRandomName();
            $data = [
                'desc_pengumuman' => $this->request->getPost('desc_pengumuman'),
                'gambar_pengumuman' => $nama_file,
            ];
            //upload file foto
            $file->move('alur/', $nama_file);
            $this->ModelSetting->saveSetting($data);
        }
        session()->setFlashdata('message', 'Data Berhasil di ganti !!');
        return redirect()->to(base_url('AlurDaftar/index'));
    }

    public function daftarUlang()
    {
        //gambar tidak diganti
        $file = $this->request->getFile('gambar_daftar_ulang');
        // echo json_encode($file);
        // exit;
        if ($file->getError() == 4) {
            $data = [
                'desc_daftar_ulang' => $this->request->getPost('desc_daftar_ulang'),
            ];
            $this->ModelSetting->saveSetting($data);
        } else {
            //hapus foto lama dalam folder foto
            $setting = $this->ModelSetting->detailSetting();
            if ($setting['gambar_daftar_ulang'] != "") {
                unlink('./alur/' . $setting['gambar_daftar_ulang']);
            }

            //edit data foto
            $nama_file = $file->getRandomName();
            $data = [
                'desc_daftar_ulang' => $this->request->getPost('desc_daftar_ulang'),
                'gambar_daftar_ulang' => $nama_file,
            ];
            //upload file foto
            $file->move('alur/', $nama_file);
            $this->ModelSetting->saveSetting($data);
        }
        session()->setFlashdata('message', 'Data Berhasil di ganti !!');
        return redirect()->to(base_url('AlurDaftar/index'));
    }

    public function MelengkapiBerkas()
    {
        //gambar tidak diganti
        $file = $this->request->getFile('gambar_berkas');
        // echo json_encode($file);
        // exit;
        if ($file->getError() == 4) {
            $data = [
                'desc_berkas' => $this->request->getPost('desc_berkas'),
            ];
            $this->ModelSetting->saveSetting($data);
        } else {
            //hapus foto lama dalam folder foto
            $setting = $this->ModelSetting->detailSetting();
            if ($setting['gambar_berkas'] != "") {
                unlink('./alur/' . $setting['gambar_berkas']);
            }

            //edit data foto
            $nama_file = $file->getRandomName();
            $data = [
                'desc_berkas' => $this->request->getPost('desc_berkas'),
                'gambar_berkas' => $nama_file,
            ];
            //upload file foto
            $file->move('alur/', $nama_file);
            $this->ModelSetting->saveSetting($data);
        }
        session()->setFlashdata('message', 'Data Berhasil di ganti !!');
        return redirect()->to(base_url('AlurDaftar/index'));
    }
}
