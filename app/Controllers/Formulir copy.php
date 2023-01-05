<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelFormulir;

class Formulir extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelFormulir = new ModelFormulir;
    }

    public function index()
    {
        $data = [
            'title' => 'PPDB MTsN 4 ABES',
            'subtitle' => 'Halaman Pengisian Formulir',
            'siswa' => $this->ModelFormulir->getFormulir(),
            'validation' => \Config\Services::validation(),
        ];
        return view('csiswa/formulir', $data);
    }
    public function updateFormulir($id_siswa)
    {
        if ($this->validate([
            'nama_siswa' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'jenis_kelamin' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'tempat_lahir' => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'tanggal' => [
                'label' => 'Tanggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'bulan' => [
                'label' => 'Bulan',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'tahun' => [
                'label' => 'Tahun',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'alamat_rumah' => [
                'label' => 'Alamat Rumah',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'nama_ayah' => [
                'label' => 'Nama Ayah',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'nama_ibu' => [
                'label' => 'Nama Ibu',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'no_ortu' => [
                'label' => 'Nomor Telepon (Orang Tua)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'telepon_siswa' => [
                'label' => 'Nomor Telepon (peserta didik)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'sekolah_asal' => [
                'label' => 'MIN / SD Asal ',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'akte_kelahiran' => [
                'label' => 'Akte Kelahiran',
                'rules' => 'max_size[akte_kelahiran,1024]',
                'errors' => [

                    'max_size' => '*ukuran {field} maksimal 1024 KB',
                ]
            ],
            'pas_photo' => [
                'label' => 'Pas Photo',
                'rules' => 'max_size[pas_photo,1024]',
                'errors' => [
                    // 'required' => '*{field} wajib diisi',
                    'max_size' => '*ukuran {field} maksimal 1024 KB',
                ]
            ],
        ])) {

            $file1 = $this->request->getFile('akte_kelahiran');
            $file2 = $this->request->getFile('pas_photo');

            // echo json_encode($file1);
            // echo json_encode($file2);
            // exit;
            $nama_file1 = $file1->getRandomName();
            $nama_file2 = $file2->getRandomName();
            $tahun = $this->request->getPost('tahun');
            $bulan = $this->request->getPost('bulan');
            $tanggal = $this->request->getPost('tanggal');
            $data = [
                'id_siswa' => $id_siswa,
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tgl_lahir' => $tahun . '-' . $bulan . '-' . $tanggal,
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'alamat_rumah' => $this->request->getPost('alamat_rumah'),
                'nama_ayah' => $this->request->getPost('nama_ayah'),
                'nama_ibu' => $this->request->getPost('nama_ibu'),
                'sekolah_asal' => $this->request->getPost('sekolah_asal'),
                'no_ortu' => $this->request->getPost('no_ortu'),
                'telepon_siswa' => $this->request->getPost('telepon_siswa'),
                'akte_kelahiran' => $nama_file1,
                'status_pendaftaran' => '1',

                'pas_photo' => $nama_file2,
            ];
            $file1->move('berkas/akte kelahiran/', $nama_file1);
            $file2->move('berkas/pas photo/', $nama_file2);
            $this->ModelFormulir->editData($data);
            session()->setFlashdata('message', 'Data Berhasil Di Simpan');
            return redirect()->to(base_url('formulir/index'));
        } else {
            // jika ada validasi 
            $validation = \Config\Services::validation();
            // echo json_encode($validation);
            // exit;
            return redirect()->to('formulir/index')->withInput()->with('validation', $validation);
        }
    }
}
