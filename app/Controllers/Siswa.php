<?php

namespace App\Controllers;

use Dompdf\Dompdf;

use App\Models\ModelSoal;
use App\Models\ModelUjian;
use App\Models\ModelFormulir;
use App\Models\ModelPendaftar;
use App\Models\ModelHasilUjian;
use App\Models\ModelSettingFitur;
use App\Models\ModelSetting;
use App\Models\ModelManageBiodata;
use App\Models\ModelTahunAjaran;
use App\Controllers\BaseController;


class Siswa extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelFormulir = new ModelFormulir;
        $this->ModelPendaftar = new ModelPendaftar;
        $this->ModelUjian = new ModelUjian;
        $this->ModelSoal = new ModelSoal;
        $this->ModelHasilUjian = new ModelHasilUjian;
        $this->ModelManageBiodata = new ModelManageBiodata;
        $this->ModelSettingFitur = new ModelSettingFitur;
        $this->ModelSetting = new ModelSetting;
        $this->ModelTahunAjaran = new ModelTahunAjaran;
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'siswa' => $this->ModelFormulir->getFormulir(),
            'status_ujian' => $this->ModelSettingFitur->getAktifUjian(),
            'status_dformulir' => $this->ModelSettingFitur->getAktifDFormulir(),
            'ta' => $this->ModelTahunAjaran->taAktif(),
            'isReadyFormulir' => $this->ModelFormulir->isReadyFormulir(),
            'ujian' => $this->ModelUjian->getAktifUjian(),
        ];
        return view('siswa/index', $data);
    }

    public function Formulir()
    {
        $data = [
            'title' => 'Pengisian Formulir',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'siswa' => $this->ModelFormulir->getFormulir(),
            'ppdb' => $this->ModelPendaftar->getPpdbFormulir(),
            'formulir' => $this->ModelTahunAjaran->getAktifIsiFormulir(),
            'isReadyFormulir' => $this->ModelFormulir->isReadyFormulir(),
        ];
        return view('Siswa/formulir', $data);
    }

    public function updateFormulir($id_siswa)
    {

        $file2 = $this->request->getFile('pas_photo');
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
                'rules' => 'required|max_length[12]|min_length[11]',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                    'max_length' => '*{field} tidak boleh lebih dari 12 angka ',
                    'min_length' => '*{field} tidak boleh kurang dari 11 angka ',
                ],
            ],
            'telepon_siswa' => [
                'label' => 'Nomor Telepon (peserta didik)',
                'rules' => 'required|max_length[12]|min_length[11]',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                    'max_length' => '*{field} tidak boleh lebih dari 12 angka ',
                    'min_length' => '*{field} tidak boleh kurang dari 11 angka ',
                ],
            ],
            'sekolah_asal' => [
                'label' => 'MIN / SD Asal ',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'pas_photo' => [
                'label' => 'Pas Photo',
                'rules' => 'max_size[pas_photo,1024]|is_image[pas_photo]|uploaded[pas_photo]|mime_in[pas_photo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => '*ukuran {field} maksimal 1024 KB',
                    'is_image' => '*{field} harus berupa gambar',
                    'uploaded' => '*{field} harus diisi',
                    'mime_in' => '*{field} harus berupa gambar',

                ]
            ],

        ])) {

            $nama_file2 = $file2->getRandomName();
            $tahun = $this->request->getPost('tahun');
            $bulan = $this->request->getPost('bulan');
            $tanggal = $this->request->getPost('tanggal');
            $data = [
                'id_siswa' => $id_siswa,
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tgl_lahir' => $tahun . '-' . $bulan . '-' . $tanggal,
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'alamat_rumah' => $this->request->getPost('alamat_rumah'),
                'nama_ayah' => $this->request->getPost('nama_ayah'),
                'nama_ibu' => $this->request->getPost('nama_ibu'),
                'sekolah_asal' => $this->request->getPost('sekolah_asal'),
                'no_ortu' => $this->request->getPost('no_ortu'),
                'telepon_siswa' => $this->request->getPost('telepon_siswa'),
                'pas_photo' => $nama_file2,
                'status_pendaftaran' => '1',
            ];
            $file2->move('pas_photo/', $nama_file2);
            $this->ModelFormulir->editData($data);
            session()->setFlashdata('add', 'Data Berhasil Di Simpan');
            return redirect()->to(base_url('Siswa/Biodata'));
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function exportPDF()
    {

        $data = [
            'title' => 'PPDB MTsN 4 ABES',
            'subtitle' => 'Download Formulir',
            'siswa' => $this->ModelPendaftar->getPrint(),
        ];
        $view = view('siswa/print_formulir', $data);

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

    public function kartuPendaftaran()
    {

        $data = [
            'title' => 'Kartu Pendaftaran',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'siswa' => $this->ModelPendaftar->getPrint(),
        ];
        $view = view('siswa/kartu_pendaftaran_pdf', $data);

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

    public function InfoUjian()
    {

        if ($this->ModelUjian->isReadyUjian(session()->get('id_siswa'))) {
            session()->setFlashdata('info', 'Belum ada jadwal ujian');
            return redirect()->to(base_url('Siswa/hasilUjian'));
        }

        $data = [
            'title' => 'Informasi Ujian',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'ujianInfo' => $this->ModelUjian->getAllData1(),
            'ujian' => $this->ModelUjian->getAktifUjian(),
            'siswa' => $this->ModelFormulir->getFormulir(),

        ];

        return view('siswa/info_ujian', $data);
    }

    public function Ujian()
    {
        $ujian = $this->ModelUjian->getAktifUjian();
        $data = [
            'title' => 'Ujian',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'start' => 1,
            'end' => $ujian['jumlah_soal'],
            'ujian' => $ujian,
            'soal' => $this->ModelSoal->getSoalAcak($ujian['jumlah_soal']),
            'siswa' => $this->ModelFormulir->getFormulir(),
        ];
        return view('siswa/ujian', $data);
    }

    public function SaveJawaban()
    {

        // check jawaban
        $jawaban = $this->request->getPost('soaljawaban');
        $kunci = $this->request->getPost('kuncijawaban');
        $benar = 0;
        $salah = 0;
        $kosong = 0;
        $nilai = 0;

        for ($i = 0; $i < count($jawaban); $i++) {
            if ($jawaban[$i] == $kunci[$i]) {
                $benar++;
            } elseif ($jawaban[$i] == "") {
                $kosong++;
            } else {
                $salah++;
            }
        }

        $nilai = $benar * 100 / count($jawaban);

        $data = [
            'siswa_id' => session()->get('id_siswa'),
            'ujian_id' => $this->request->getPost('id_ujian'),
            'list_jawaban' => implode(',', $jawaban),
            'list_soal' => implode(',', $this->request->getPost('id_soal')),
            'nilai' => $nilai,
            'jumlah_benar' => $benar,
            'cek_ujian' => '1',
            'tgl_selesai' => date('Y-m-d'),
        ];
        // echo json_encode($data);
        // exit;
        $this->ModelHasilUjian->insertHasilUjian($data);
        return redirect()->to(base_url('Siswa/hasilUjian'));
    }

    public function hasilUjian()
    {
        $data = [
            'title' => 'Hasil Ujian',
            'subtitle' => 'PPDB MTsN 4 ABES',
        ];
        return view('siswa/hasil_ujian', $data);
    }

    public function Pengumuman()
    {
        $data = [
            'title' => 'Pengumuman',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'siswa' => $this->ModelFormulir->getFormulir(),
            'opsinilai' => $this->ModelHasilUjian->opsiNilai(),
            'nilaimanual' => $this->ModelHasilUjian->pengumumanManual(session()->get('id_siswa')),
            'nilai' => $this->ModelHasilUjian->getPengumuman(session()->get('id_siswa')),
            'ta' => $this->ModelTahunAjaran->taAktif(),
            'pengumuman' => $this->ModelTahunAjaran->getAktifPengumuman(),
        ];
        // echo json_encode($data);
        // exit;
        return view('siswa/pengumuman', $data);
    }

    public function DaftarUlang()
    {
        if ($this->ModelFormulir->isReadyDaftarUlang(session()->get('id_siswa'))) {
            session()->setFlashdata('info', 'Belum ada jadwal ujian');
            return redirect()->to(base_url('Siswa/BerkasDaftarUlang'));
        }
        $data = [
            'title' => 'Daftar Ulang',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'siswa' => $this->ModelFormulir->getFormulir(),
            'pekerjaan' => $this->ModelManageBiodata->getAllPekerjaan(),
            'penghasilan' => $this->ModelManageBiodata->getAllPenghasilan(),
            'pendidikan' => $this->ModelManageBiodata->getAllPendidikan(),
            'agama' => $this->ModelManageBiodata->getAllAgama(),
            'kegemaran' => $this->ModelManageBiodata->getAllKegemaran(),
            'validation' => \Config\Services::validation(),
            'statusdaftarulang' => $this->ModelFormulir->statusDaftarUlang(),
            'opsinilai' => $this->ModelHasilUjian->opsiNilai(),
            'nilaimanual' => $this->ModelHasilUjian->pengumumanManual(session()->get('id_siswa')),
            'nilai' => $this->ModelHasilUjian->getPengumuman(session()->get('id_siswa')),
            'daftarulang' => $this->ModelTahunAjaran->getAktifDaftarUlang(),
            'ta' => $this->ModelTahunAjaran->taAktif(),
        ];
        return view('siswa/daftar_ulang', $data);
    }

    public function BerkasDaftarUlang()
    {
        $data = [
            'title' => 'Berkas Daftar Ulang',
            'subtitle' => 'PPDB MTsN 4 ABES',
        ];
        return view('siswa/berkas_daftar_ulang', $data);
    }

    public function biodata()
    {
        $data = [
            'title' => 'Biodata',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'siswa' => $this->ModelFormulir->getFormulir(),
            'statusdaftarulang' => $this->ModelFormulir->statusDaftarUlang(),
            'validation' => \Config\Services::validation(),
        ];
        return view('siswa/biodata', $data);
    }

    public function editBiodata()
    {
        $data = [
            'title' => 'Edit Biodata',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'siswa' => $this->ModelFormulir->getFormulir(),
            'pekerjaan' => $this->ModelManageBiodata->getAllPekerjaan(),
            'penghasilan' => $this->ModelManageBiodata->getAllPenghasilan(),
            'pendidikan' => $this->ModelManageBiodata->getAllPendidikan(),
            'agama' => $this->ModelManageBiodata->getAllAgama(),
            'kegemaran' => $this->ModelManageBiodata->getAllKegemaran(),

        ];
        return view('siswa/edit_biodata', $data);
    }

    public function insertBiodata($id_siswa)
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
                'label' => 'Status',
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
                'label' => 'Nomor Telepon (peserta didik)',
                'rules' => 'required|max_length[12]|min_length[11]',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                    'max_length' => '*{field} tidak boleh lebih dari 12 angka ',
                    'min_length' => '*{field} tidak boleh kurang dari 11 angka ',
                ],
            ],
            'kelas' => [
                'label' => 'DiTerima Pada Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'hub_keluarga' => [
                'label' => 'Hubungan Keluarga',
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
            'tanggal_ayah' => [
                'label' => 'Tanggal Lahir (Ayah)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'bulan_ayah' => [
                'label' => 'Bulan Lahir (Ayah)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'tahun_ayah' => [
                'label' => 'Tahun Lahir (Ayah)',
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
                'rules' => 'required|max_length[12]|min_length[11]',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                    'max_length' => '*{field} tidak boleh lebih dari 12 angka ',
                    'min_length' => '*{field} tidak boleh kurang dari 11 angka ',
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
            'tanggal_ibu' => [
                'label' => 'Tanggal Lahir (Ibu)',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'bulan_ibu' => [
                'label' => 'Bulan Lahir (Ibu) ',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'tahun_ibu' => [
                'label' => 'Tahun Lahir (Ibu)',
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
                'rules' => 'required|max_length[12]|min_length[11]',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                    'max_length' => '*{field} tidak boleh lebih dari 12 angka ',
                    'min_length' => '*{field} tidak boleh kurang dari 11 angka ',
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


            $tahun_ayah = $this->request->getPost('tahun_ayah');
            $bulan_ayah = $this->request->getPost('bulan_ayah');
            $tanggal_ayah = $this->request->getPost('tanggal_ayah');

            $tahun_ibu = $this->request->getPost('tahun_ibu');
            $bulan_ibu = $this->request->getPost('bulan_ibu');
            $tanggal_ibu = $this->request->getPost('tanggal_ibu');
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
                'kelas' => $this->request->getPost('kelas'),
                'hub_keluarga' => $this->request->getPost('hub_keluarga'),
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
                'tgl_lahir_ayah' => $tahun_ayah . '-' . $bulan_ayah . '-' . $tanggal_ayah,
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
                'tgl_lahir_ibu' => $tahun_ibu . '-' . $bulan_ibu . '-' . $tanggal_ibu,
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
                'daftar_ulang' => '1',
            ];
            $this->ModelFormulir->editData($data);
            session()->setFlashdata('add', 'Data Berhasil Di Simpan');
            return redirect()->to(base_url('Siswa/BerkasDaftarUlang'));
        } else {
            return redirect()->back()->withInput();
        }
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
                'label' => 'Status',
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
                'label' => 'Nomor Telepon (peserta didik)',
                'rules' => 'required|max_length[12]|min_length[11]',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                    'max_length' => '*{field} tidak boleh lebih dari 12 angka ',
                    'min_length' => '*{field} tidak boleh kurang dari 11 angka ',
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
                'rules' => 'required|max_length[12]|min_length[11]',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                    'max_length' => '*{field} tidak boleh lebih dari 12 angka ',
                    'min_length' => '*{field} tidak boleh kurang dari 11 angka ',
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
                'rules' => 'required|max_length[12]|min_length[11]',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                    'max_length' => '*{field} tidak boleh lebih dari 12 angka ',
                    'min_length' => '*{field} tidak boleh kurang dari 11 angka ',
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
            $this->ModelFormulir->editData($data);
            session()->setFlashdata('edit', 'Data Berhasil Di Edit');
            return redirect()->to(base_url('siswa/biodata'));
        } else {

            return redirect()->back()->withInput();
        }
    }

    public function editPhoto($id_siswa)
    {
        $file2 = $this->request->getFile('pas_photo');
        if ($this->validate([
            'pas_photo' => [
                'label' => 'Pas Photo',
                'rules' => 'max_size[pas_photo,1024]|is_image[pas_photo]|uploaded[pas_photo]|mime_in[pas_photo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => '*ukuran {field} maksimal 1024 KB',
                    'is_image' => '*{field} harus berupa gambar',
                    'uploaded' => '*{field} harus diisi',
                    'mime_in' => '*{field} harus berupa gambar',

                ]
            ],
        ])) {
            //hapus foto dalam folder foto
            $siswa = $this->ModelFormulir->detailData($id_siswa);
            if ($siswa['pas_photo'] != "") {
                unlink('./pas_photo/' . $siswa['pas_photo']);
            }

            $nama_file2 = $file2->getRandomName();

            $data = [
                'id_siswa' => $id_siswa,
                'pas_photo' => $nama_file2,
            ];

            $file2->move('pas_photo/', $nama_file2);

            $this->ModelFormulir->editData($data);
            session()->setFlashdata('edit', 'Data Berhasil Di Edit');
            return redirect()->to(base_url('Siswa/Biodata'));
        } else {
            // jika ada validasi 
            $validation = \Config\Services::validation();
            // echo json_encode($validation);
            // exit;
            return redirect()->to('Siswa/Biodata')->withInput()->with('validation', $validation);
        }
    }

    public function cetakSurat()
    {
        $data = [
            'title' => 'Download Surat',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'setting' => $this->ModelSetting->detailSetting(),
            'ta' => $this->ModelTahunAjaran->taAktif(),
            'siswa' => $this->ModelFormulir->getFormulir(),
        ];
        $view = view('siswa/surat', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("Surat Pernyataan.pdf");
    }
}
