<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSetting;
use App\Models\ModelTPanitia;
use App\Models\ModelAdmin;
use App\Models\ModelTahunAjaran;
use App\Models\ModelHasilUjian;
use App\Models\ModelLaporan;

use Dompdf\Dompdf;
use Dompdf\Options;


class Admin extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelSetting = new ModelSetting();
        $this->ModelTPanitia = new ModelTPanitia();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelTahunAjaran = new ModelTahunAjaran();
        $this->ModelHasilUjian = new ModelHasilUjian();
        $this->ModelLaporan = new ModelLaporan();
    }

    public function index()
    {

        $data = [
            'title' => 'Dashboard',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'jmlPendaftarLManual' => $this->ModelSetting->jmlPendaftarLManual(),
            'jmlPendaftarTLManual' => $this->ModelSetting->jmlPendaftarTLManual(),
            'jmlPendaftarL' => $this->ModelSetting->jmlPendaftarL(),
            'jmlPendaftarTL' => $this->ModelSetting->jmlPendaftarTL(),
            'jmlPendaftar' => $this->ModelAdmin->jmlPendaftar(),
            'opsiNilai' => $this->ModelHasilUjian->opsiNilai(),
            'user' => $this->ModelAdmin->getProfile(),
            'ta' => $this->ModelTahunAjaran->getAllData(),

        ];
        return view('admin/index', $data);
    }

    public function Profile()
    {
        $data = [
            'title' => 'Profile',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'user' => $this->ModelAdmin->getProfile(),
        ];
        return view('Admin/profile', $data);
    }


    public function editProfile($id_user)
    {
        //edit data tanpa edit foto
        $file = $this->request->getFile('foto');
        if ($file->getError() == 4) {
            $data = [
                'id_user' => $id_user,
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'telepon' => $this->request->getPost('telepon'),
            ];
            $this->ModelAdmin->editData($data);
        } else {

            //hapus foto dalam folder foto
            $panitia = $this->ModelAdmin->detailData($id_user);
            if ($panitia['foto'] != "") {
                unlink('./foto/' . $panitia['foto']);
            }

            //edit data foto
            $nama_file = $file->getRandomName();
            $data = [
                'id_user' => $id_user,
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'telepon' => $this->request->getPost('telepon'),
                'foto' => $nama_file
            ];
            //upload file foto
            $file->move('foto/', $nama_file);
            $this->ModelAdmin->editData($data);
        }
        session()->setFlashdata('edit', 'Data Berhasil Di Edit');
        return redirect()->to(base_url('Admin/profile'));
    }


    public function changePassword()
    {
        $data = [
            'title' => 'Ubah Password',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'user' => $this->ModelAdmin->getProfile(),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/ubah_password', $data);
    }

    public function ubahPassword()
    {

        if ($this->validate([
            'opwd' => [
                'label' => 'Password Lama',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'npwd' => [
                'label' => 'Password Baru',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                    'min_length' => '*{field} Minimal 6 Karakter ',
                ],
            ],
            'cnpwd' => [
                'label' => 'Konfirmasi Password Baru',
                'rules' => 'required|matches[npwd]',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                    'matches' => '*{field} Yang Diisi Harus Sama  ',
                ],
            ],
        ])) {
            $opwd = $this->request->getVar('opwd');
            $npwd = password_hash($this->request->getVar('npwd'), PASSWORD_DEFAULT);

            if (password_verify($opwd, $this->ModelAdmin->getProfile()['password'])) {

                if ($this->ModelAdmin->ubahPassword($npwd, session()->get('id_user'))) {
                    session()->setFlashdata('add', 'Password Berhasil Di Ubah');
                    return redirect()->to(base_url('Admin/changePassword'));
                } else {
                    session()->setFlashdata('delete', 'Password Gagal Di Ubah');
                    return redirect()->to(base_url('Admin/changePassword'));
                }
            } else {
                session()->setFlashdata('error', 'Password Lama Salah');
                return redirect()->to(base_url('Admin/changePassword'));
            }
            return redirect()->to(base_url('Admin/changePassword'));
        } else {
            // jika ada validasi 
            $validation = \Config\Services::validation();
            return redirect()->to('Admin/changePassword')->withInput()->with('validation', $validation);
        }
    }

    public function TambahPanitia()
    {
        $data = [
            'title' => 'Tambah Panitia',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'nama_panitia' => $this->ModelTPanitia->getAllData(),
            'user' => $this->ModelAdmin->getProfile(),
        ];
        return view('admin/tambah_panitia', $data);
    }
    public function insertPanitia()
    {
        //gambar tidak diganti
        $file = $this->request->getFile('foto');
        // echo json_encode($file);
        // exit;
        if ($file->getError() == 4) {
            $data = [
                'nama_panitia' => $this->request->getPost('nama_panitia'),
                'email' => $this->request->getPost('email'),
                'telepon_panitia' => $this->request->getPost('telepon_panitia'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            ];
            $this->ModelTPanitia->insertData($data);
        } else {
            $nama_file = $file->getRandomName();
            //data yang di insert
            $data = [
                'nama_panitia' => $this->request->getPost('nama_panitia'),
                'email' => $this->request->getPost('email'),
                'telepon_panitia' => $this->request->getPost('telepon_panitia'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'foto' => $nama_file,
            ];
            //Upload File
            $file->move('foto/', $nama_file);
            $this->ModelTPanitia->insertData($data);
        }
        session()->setFlashdata('add', 'Data Berhasil Di Tambah');
        return redirect()->to(base_url('Admin/TambahPanitia'));
    }

    public function editPanitia($id_panitia)
    {

        //edit data tanpa edit foto
        $file = $this->request->getFile('foto');
        if ($file->getError() == 4) {
            $data = [
                'id_panitia' => $id_panitia,
                'nama_panitia' => $this->request->getPost('nama_panitia'),
                'email' => $this->request->getPost('email'),
                'telepon_panitia' => $this->request->getPost('telepon_panitia'),
            ];
            $this->ModelTPanitia->editData($data);
        } else {

            //hapus foto dalam folder foto
            $panitia = $this->ModelTPanitia->detailData($id_panitia);
            if ($panitia['foto'] != "") {
                unlink('./foto/' . $panitia['foto']);
            }

            //edit data foto
            $nama_file = $file->getRandomName();
            $data = [
                'id_panitia' => $id_panitia,
                'nama_panitia' => $this->request->getPost('nama_panitia'),
                'email' => $this->request->getPost('email'),
                'telepon_panitia' => $this->request->getPost('telepon_panitia'),
                'foto' => $nama_file
            ];
            //upload file foto
            $file->move('foto/', $nama_file);
            $this->ModelTPanitia->editData($data);
        }
        session()->setFlashdata('edit', 'Data Berhasil Di Edit');
        return redirect()->to(base_url('Admin/TambahPanitia'));
    }

    public function deletePanitia($id_panitia)
    {
        //hapus foto dalam folder foto
        $panitia = $this->ModelTPanitia->detailData($id_panitia);
        if ($panitia['foto'] != "") {
            unlink('./foto/' . $panitia['foto']);
        }

        $data = [
            'id_panitia' => $id_panitia,
        ];

        $this->ModelTPanitia->deleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Di Delete');
        return redirect()->to(base_url('Admin/TambahPanitia'));
    }

    // laporan
    public function laporan()
    {
        $data = [
            'title' => 'PPDB MTsN 4 ABES',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'user' => $this->ModelAdmin->getProfile(),
            'ta' => $this->ModelTahunAjaran->getAllData(),

        ];
        return view('admin/laporan', $data);
    }

    public function cetakLaporan($tahun)
    {
        $data = [
            'title' => 'Download Laporan',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'setting' => $this->ModelSetting->detailSetting(),
            'ta' => $this->ModelTahunAjaran->getAllData(),
            'tahun_ajaran' => $this->ModelTahunAjaran->getData($tahun),
            'nilaimanual' => $this->ModelLaporan->getNilaiManual($tahun),
            'nilai' => $this->ModelLaporan->getNilaiSiswa($tahun),
            'opsinilai' => $this->ModelLaporan->opsiNilai(),
            'kkm' => $this->ModelTahunAjaran->taAktif(),
        ];
        $view = view('admin/template_laporan_pdf', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("Template Penilaian.pdf", array("Attachment" => false));
    }


    // laporan


    public function setting()
    {
        $data = [
            'title' => 'Setting Website',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'setting' => $this->ModelSetting->detailSetting(),
            'user' => $this->ModelAdmin->getProfile(),
        ];
        return view('admin/pengaturan/setting_web', $data);
    }

    //profile
    public function saveSetting()
    {
        //gambar tidak diganti
        $file = $this->request->getFile('logo_sekolah');
        // echo json_encode($file);
        // exit;
        if ($file->getError() == 4) {
            $data = [
                'nsm' => $this->request->getPost('nsm'),
                'npsn' => $this->request->getPost('npsn'),
                'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                'alamat_lengkap' => $this->request->getPost('alamat_lengkap'),
                'provinsi' => $this->request->getPost('provinsi'),
                'kabupaten' => $this->request->getPost('kabupaten'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'telepon_sekolah' => $this->request->getPost('telepon_sekolah'),
                'email' => $this->request->getPost('email'),
                'website' => $this->request->getPost('website'),
            ];
            $this->ModelSetting->saveSetting($data);
        } else {
            //hapus foto lama dalam folder foto
            $setting = $this->ModelSetting->detailSetting();
            if ($setting['logo_sekolah'] != "") {
                unlink('./logo/' . $setting['logo_sekolah']);
            }

            //edit data logo
            $nama_file = $file->getRandomName();
            $data = [
                'nsm' => $this->request->getPost('nsm'),
                'npsn' => $this->request->getPost('npsn'),
                'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                'alamat_lengkap' => $this->request->getPost('alamat_lengkap'),
                'provinsi' => $this->request->getPost('provinsi'),
                'kabupaten' => $this->request->getPost('kabupaten'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'telepon_sekolah' => $this->request->getPost('telepon_sekolah'),
                'email' => $this->request->getPost('email'),
                'website' => $this->request->getPost('website'),
                'logo_sekolah' => $nama_file,
            ];
            //upload file foto
            $file->move('logo/', $nama_file);
            $this->ModelSetting->saveSetting($data);
        }
        session()->setFlashdata('message', 'Data Berhasil di ganti !!');
        return redirect()->to(base_url('Admin/setting'));
    }
    //data ppdb
    public function saveSetting4()
    {

        //gambar tidak diganti
        $file = $this->request->getFile('brosur');
        // echo json_encode($file);
        // exit;
        if ($file->getError() == 4) {
            $data = [
                'syarat_daftar' => $this->request->getPost('syarat_daftar'),
                'syarat_daftar_ulang' => $this->request->getPost('syarat_daftar_ulang'),
                'j_pengisian_formulir' => $this->request->getPost('j_pengisian_formulir'),
                'j_ujian_ppdb' => $this->request->getPost('j_ujian_ppdb'),
                'j_pengumuman_kelulusan' => $this->request->getPost('j_pengumuman_kelulusan'),
                'j_pendaftaran_ulang' => $this->request->getPost('j_pendaftaran_ulang'),
                'j_mos' => $this->request->getPost('j_mos'),
                'keterangan_print' => $this->request->getPost('keterangan_print'),
            ];
            $this->ModelSetting->saveSetting($data);
        } else {
            //hapus foto lama dalam folder foto
            $setting = $this->ModelSetting->detailSetting();
            if ($setting['brosur'] != "") {
                unlink('./brosur/' . $setting['brosur']);
            }

            //edit data foto
            $nama_file = $file->getRandomName();
            $data = [
                'syarat_daftar' => $this->request->getPost('syarat_daftar'),
                'brosur' => $nama_file,
                'syarat_daftar_ulang' => $this->request->getPost('syarat_daftar_ulang'),
                'j_pengisian_formulir' => $this->request->getPost('j_pengisian_formulir'),
                'j_ujian_ppdb' => $this->request->getPost('j_ujian_ppdb'),
                'j_pengumuman_kelulusan' => $this->request->getPost('j_pengumuman_kelulusan'),
                'j_pendaftaran_ulang' => $this->request->getPost('j_pendaftaran_ulang'),
                'j_mos' => $this->request->getPost('j_mos'),
                'keterangan_print' => $this->request->getPost('keterangan_print'),
            ];
            //upload file foto
            $file->move('brosur/', $nama_file);
            $this->ModelSetting->saveSetting($data);
        }
        session()->setFlashdata('message', 'Data Berhasil di ganti !!');
        return redirect()->to(base_url('Admin/setting'));
    }

    //data kepala
    public function saveSetting5()
    {
        //gambar tidak diganti
        $file = $this->request->getFile('foto_kepsek');
        // echo json_encode($file);
        // exit;
        if ($file->getError() == 4) {
            $data = [
                'nama_kepsek' => $this->request->getPost('nama_kepsek'),
                'nip_kepsek' => $this->request->getPost('nip_kepsek'),
            ];
            $this->ModelSetting->saveSetting($data);
        } else {
            //hapus foto lama dalam folder foto
            $setting = $this->ModelSetting->detailSetting();
            if ($setting['foto_kepsek'] != "") {
                unlink('./foto/' . $setting['foto_kepsek']);
            }

            //edit data foto
            $nama_file = $file->getRandomName();
            $data = [
                'nama_kepsek' => $this->request->getPost('nama_kepsek'),
                'nip_kepsek' => $this->request->getPost('nip_kepsek'),
                'foto_kepsek' => $nama_file,
            ];
            //upload file foto
            $file->move('foto/', $nama_file);
            $this->ModelSetting->saveSetting($data);
        }
        session()->setFlashdata('message', 'Data Berhasil di ganti !!');
        return redirect()->to(base_url('Admin/setting'));
    }

    //data ketua
    public function saveSetting6()
    {
        //gambar tidak diganti
        $file = $this->request->getFile('ttd_ketua');
        // echo json_encode($file);
        // exit;
        if ($file->getError() == 4) {
            $data = [
                'nama_ketua' => $this->request->getPost('nama_ketua'),
                'nip_ketua' => $this->request->getPost('nip_ketua'),
            ];
            $this->ModelSetting->saveSetting($data);
        } else {
            //hapus foto lama dalam folder foto
            $setting = $this->ModelSetting->detailSetting();
            if ($setting['ttd_ketua'] != "") {
                unlink('./ttd/' . $setting['ttd_ketua']);
            }

            //edit data ttd
            $nama_file = $file->getRandomName();
            $data = [
                'nama_ketua' => $this->request->getPost('nama_ketua'),
                'nip_ketua' => $this->request->getPost('nip_ketua'),
                'ttd_ketua' => $nama_file,
            ];
            //upload file foto
            $file->move('ttd/', $nama_file);
            $this->ModelSetting->saveSetting($data);
        }

        session()->setFlashdata('message', 'Data Berhasil Di Ganti!!');
        return redirect()->to(base_url('Admin/setting'));
    }
}
