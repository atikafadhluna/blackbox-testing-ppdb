<?php

namespace App\Controllers;

use App\Models\ModelPendaftar;
use App\Models\ModelAdmin;

use Dompdf\Dompdf;

class DataPPDB extends BaseController
{
    public function __construct()
    {
        $this->ModelPendaftar = new ModelPendaftar();
        $this->ModelAdmin = new ModelAdmin();
        helper('form');
    }

    // bagian pendaftar
    public function pendaftar()
    {
        $data = [
            'title' => 'Daftar Pendaftar',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'siswa' => $this->ModelPendaftar->getAllData(),
            'validation' => \Config\Services::validation(),
            'user' => $this->ModelAdmin->getProfile(),

        ];
        return view('admin/datappdb/pendaftar', $data);
    }

    public function exportFormulirPDF($id_siswa)
    {

        $data = [
            'title' => 'Download Formulir',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'siswa' => $this->ModelPendaftar->getData($id_siswa),
        ];
        $view = view('admin/datappdb/pendaftar/print_formulir', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Nama file
        $dompdf->stream("Formulir Pendaftaran.pdf");
    }

    public function kartuPendaftaran($id_siswa)
    {

        $data = [
            'title' => 'Kartu Pendaftaran',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'siswa' => $this->ModelPendaftar->getData($id_siswa),
        ];
        $view = view('admin/datappdb/pendaftar/print_kartu_pendaftaran', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Nama file
        $dompdf->stream("Kartu Pendaftaran.pdf");
    }


    public function editData($id_siswa)
    {
        if ($this->validate([
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
            'tgl_lahir' => [
                'label' => 'Tanggal Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],

            'agama' => [
                'label' => 'Agama',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'no_ktp_siswa' => [
                'label' => 'No. KTP/NIK',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'anak_ke' => [
                'label' => 'Anak Ke',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'jml_saudara' => [
                'label' => 'Jumlah Saudara Kandung',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'status' => [
                'label' => 'Status Yatim/Piatu/Yatim Piatu',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'gol_darah' => [
                'label' => 'Golongan Darah',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'kegemaran' => [
                'label' => 'Kegemaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'telepon_siswa' => [
                'label' => 'Nomor Telepon (Peserta Didik)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'desa' => [
                'label' => 'Desa/Gampong',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'kecamatan' => [
                'label' => 'Kecamatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'kabupaten' => [
                'label' => 'Kabupaten',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'provinsi' => [
                'label' => 'Provinsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'tinggal_dgn' => [
                'label' => 'Tinggal Dengan',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'jarak' => [
                'label' => 'Jarak Tempat Tinggal Ke Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'sekolah_asal' => [
                'label' => 'Lulus Dari / Nama Sekolah',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'no_sttb' => [
                'label' => 'Nomor STTB',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'lama_belajar' => [
                'label' => 'Lama Belajar',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'no_un' => [
                'label' => 'Nomor Ujian Nasional',
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
            'tempat_lahir_ayah' => [
                'label' => 'Tempat Lahir (Ayah)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'tgl_lahir_ayah' => [
                'label' => 'Tanggal Lahir (Ayah)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'pendidikan_ayah' => [
                'label' => 'Pendidikan (Ayah)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'pekerjaan_ayah' => [
                'label' => 'Pekerjaan (Ayah)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'penghasilan_ayah' => [
                'label' => 'Penghasilan Perbulan (Ayah)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'alamat_ayah' => [
                'label' => 'Alamat Rumah (Ayah)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'no_kk_ayah' => [
                'label' => 'No. KK (Ayah)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'no_ktp_ayah' => [
                'label' => 'No. KTP/NIK (Ayah)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'no_hp_ayah' => [
                'label' => 'Nomor Telepon/HP (Ayah)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'status_ayah' => [
                'label' => 'Masih Hidup/Meninggal Dunia (Ayah)',
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
            'tempat_lahir_ibu' => [
                'label' => 'Tempat Lahir (Ibu)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'tgl_lahir_ibu' => [
                'label' => 'Tanggal Lahir (Ibu)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'pendidikan_ibu' => [
                'label' => 'Pendidikan (Ibu)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'pekerjaan_ibu' => [
                'label' => 'Pekerjaan (Ibu)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'penghasilan_ibu' => [
                'label' => 'Penghasilan Perbulan (Ibu)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'alamat_ibu' => [
                'label' => 'Alamat Rumah (Ibu)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'no_kk_ibu' => [
                'label' => 'No. KK (Ibu)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'no_ktp_ibu' => [
                'label' => 'No. KTP/NIK (Ibu)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'no_hp_ibu' => [
                'label' => 'Nomor Telepon/HP (Ibu)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'status_ibu' => [
                'label' => 'Masih Hidup/Meninggal Dunia (Ibu)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'kartu_sosial' => [
                'label' => 'Kartu yang dimiliki',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'no_kartu_sosial' => [
                'label' => 'Nomor Kartu',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],

        ])) {

            $data = [
                'id_siswa' => $id_siswa,
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'agama' => $this->request->getPost('agama'),
                'no_ktp_siswa' => $this->request->getPost('no_ktp_siswa'),
                'anak_ke' => $this->request->getPost('anak_ke'),
                'jml_saudara' => $this->request->getPost('jml_saudara'),
                'status' => $this->request->getPost('status'),
                'gol_darah' => $this->request->getPost('gol_darah'),
                'kegemaran' => $this->request->getPost('kegemaran'),
                'telepon_siswa' => $this->request->getPost('telepon_siswa'),
                'desa' => $this->request->getPost('desa'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kabupaten' => $this->request->getPost('kabupaten'),
                'provinsi' => $this->request->getPost('provinsi'),
                'tinggal_dgn' => $this->request->getPost('tinggal_dgn'),
                'jarak' => $this->request->getPost('jarak'),
                'sekolah_asal' => $this->request->getPost('sekolah_asal'),
                'no_sttb' => $this->request->getPost('no_sttb'),
                'lama_belajar' => $this->request->getPost('lama_belajar'),
                'no_un' => $this->request->getPost('no_un'),
                'nama_ayah' => $this->request->getPost('nama_ayah'),
                'tempat_lahir_ayah' => $this->request->getPost('tempat_lahir_ayah'),
                'tgl_lahir_ayah' => $this->request->getPost('tgl_lahir_ayah'),
                'pendidikan_ayah' => $this->request->getPost('pendidikan_ayah'),
                'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
                'penghasilan_ayah' => $this->request->getPost('penghasilan_ayah'),
                'alamat_ayah' => $this->request->getPost('alamat_ayah'),
                'no_kk_ayah' => $this->request->getPost('no_kk_ayah'),
                'no_ktp_ayah' => $this->request->getPost('no_ktp_ayah'),
                'no_hp_ayah' => $this->request->getPost('no_hp_ayah'),
                'status_ayah' => $this->request->getPost('status_ayah'),
                'nama_ibu' => $this->request->getPost('nama_ibu'),
                'tempat_lahir_ibu' => $this->request->getPost('tempat_lahir_ibu'),
                'tgl_lahir_ibu' => $this->request->getPost('tgl_lahir_ibu'),
                'pendidikan_ibu' => $this->request->getPost('pendidikan_ibu'),
                'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
                'penghasilan_ibu' => $this->request->getPost('penghasilan_ibu'),
                'alamat_ibu' => $this->request->getPost('alamat_ibu'),
                'no_kk_ibu' => $this->request->getPost('no_kk_ibu'),
                'no_ktp_ibu' => $this->request->getPost('no_ktp_ibu'),
                'no_hp_ibu' => $this->request->getPost('no_hp_ibu'),
                'status_ibu' => $this->request->getPost('status_ibu'),
                'kartu_sosial' => $this->request->getPost('kartu_sosial'),
                'no_kartu_sosial' => $this->request->getPost('no_kartu_sosial'),
            ];
            $this->ModelPendaftar->editData($data);
            return redirect()->to(base_url('DataPPDB/editData'));
        } else {
            // jika ada validasi 
            $validation = \Config\Services::validation();
            // echo json_encode($validation);
            // exit;
            return redirect()->to('DataPPDB/editData')->withInput()->with('validation', $validation);
        }
    }

    public function deleteData($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
        ];

        $this->ModelPendaftar->deleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Di Delete');
        return redirect()->to(base_url('DataPPDB/pendaftar'));
    }

    // bagian pendaftar
}
