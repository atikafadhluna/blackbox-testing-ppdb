<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSetting;
use App\Models\ModelUjian;
use App\Models\ModelHasilUjian;
use App\Models\ModelSoal;
use App\Models\ModelPendaftar;
use App\Models\ModelTPanitia;
use App\Models\ModelTahunAjaran;

use Dompdf\Dompdf;
use Dompdf\Options;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Panitia extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelSetting = new ModelSetting();
        $this->ModelSoal = new ModelSoal();
        $this->ModelUjian = new ModelUjian();
        $this->ModelPendaftar = new ModelPendaftar();
        $this->ModelTPanitia = new ModelTPanitia();
        $this->ModelHasilUjian = new ModelHasilUjian();
        $this->ModelTahunAjaran = new ModelTahunAjaran();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'jmlPendaftar' => $this->ModelSetting->jmlPendaftar(),
            'jmlPendaftarLManual' => $this->ModelSetting->jmlPendaftarLManual(),
            'jmlPendaftarTLManual' => $this->ModelSetting->jmlPendaftarTLManual(),
            'jmlPendaftarL' => $this->ModelSetting->jmlPendaftarL(),
            'jmlPendaftarTL' => $this->ModelSetting->jmlPendaftarTL(),
            'opsiNilai' => $this->ModelHasilUjian->opsiNilai(),
            'panitia' => $this->ModelTPanitia->getProfile(),
        ];
        return view('panitia/index', $data);
    }

    public function jmlPendaftar()
    {
        $data = [
            'title' => 'Jumlah Pendaftar',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'siswa' => $this->ModelPendaftar->getPpdbFormulir(),
            'panitia' => $this->ModelTPanitia->getProfile(),
        ];
        return view('jumlahpendaftar/v_jumlahPendaftar', $data);
    }

    public function cetakjmlPendaftar()
    {
        $data = [
            'title' => 'Download Jumlah Pendaftar',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'siswa' => $this->ModelPendaftar->getPpdbFormulir(),
        ];
        $view = view('jumlahpendaftar/pdf_jumlahPendaftar', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("Jumlah Pendaftar PPDB <?= date('Y'); ?>.pdf", array("Attachment" => false));
    }

    public function Profile()
    {
        $data = [
            'title' => 'Profile',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'panitia' => $this->ModelTPanitia->getProfile(),
        ];
        return view('panitia/profile', $data);
    }

    public function editProfile($id_panitia)
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
        return redirect()->to(base_url('Panitia/profile'));
    }

    public function changePassword()
    {
        $data = [
            'title' => 'Ubah Password',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'panitia' => $this->ModelTPanitia->getProfile(),
            'validation' => \Config\Services::validation(),
        ];

        return view('panitia/ubah_password', $data);
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

            if (password_verify($opwd, $this->ModelTPanitia->getProfile()['password'])) {

                if ($this->ModelTPanitia->ubahPassword($npwd, session()->get('id_panitia'))) {
                    session()->setFlashdata('add', 'Password Berhasil Di Ubah');
                    return redirect()->to(base_url('Panitia/changePassword'));
                } else {
                    session()->setFlashdata('delete', 'Password Gagal Di Ubah');
                    return redirect()->to(base_url('Panitia/changePassword'));
                }
            } else {
                session()->setFlashdata('error', 'Password Lama Salah');
                return redirect()->to(base_url('Panitia/changePassword'));
            }
            return redirect()->to(base_url('panitia/changePassword'));
        } else {
            // jika ada validasi 
            $validation = \Config\Services::validation();
            return redirect()->to('panitia/changePassword')->withInput()->with('validation', $validation);
        }
    }

    public function soal()
    {
        $data = [
            'title' => 'Bank Soal',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'soal' => $this->ModelSoal->getAllData(),
            'panitia' => $this->ModelTPanitia->getProfile(),
        ];
        return view('panitia/soal/soal', $data);
    }

    public function tambahSoal()
    {
        $data = [
            'title' => 'Tambah Soal',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'panitia' => $this->ModelTPanitia->getProfile(),
        ];
        return view('panitia/soal/tambah_soal', $data);
    }

    public function cetakexcel()
    {
        $soal = $this->ModelSoal->getAllData();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Soal');
        $sheet->setCellValue('C1', 'Opsi A');
        $sheet->setCellValue('D1', 'Opsi B');
        $sheet->setCellValue('E1', 'Opsi C');
        $sheet->setCellValue('F1', 'Opsi D');
        $sheet->setCellValue('G1', 'Kunci Jawaban');

        $column = 2; //kolom start
        foreach ($soal as $s) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, strip_tags($s['text_soal']));
            $sheet->setCellValue('C' . $column, strip_tags($s['opsi_a']));
            $sheet->setCellValue('D' . $column, strip_tags($s['opsi_b']));
            $sheet->setCellValue('E' . $column, strip_tags($s['opsi_c']));
            $sheet->setCellValue('F' . $column, strip_tags($s['opsi_d']));
            $sheet->setCellValue('G' . $column, strip_tags($s['kunci_jawaban']));
            $column++;
        }
        $sheet->getStyle('A1:G1')->getFont()->setBold(true);
        $sheet->getStyle('A1:G1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFA500');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $sheet->getStyle('A1:G' . ($column - 1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Bank Soal.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function cetakpdf()
    {
        $data = [
            'title' => 'Download PDF',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'soal' => $this->ModelSoal->getAllData(),
        ];
        $view = view('panitia/soal/bank_soal_pdf', $data);
        // return $view;

        $options = new Options();
        // $options->setChroot(FCPATH);
        // $options->set('isRemoteEnabled', 'true');
        $dompdf = new Dompdf($options);

        // instantiate and use the dompdf class

        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("Bank Soal PPDB.pdf", array("Attachment" => false));
    }

    public function import()
    {
        $file = $this->request->getFile('file_excel');
        $extension = $file->getClientExtension();
        if ($extension == 'xlsx' || $extension == 'xls') {
            if ($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }
            $spreadsheet = $reader->load($file);
            $sheet = $spreadsheet->getActiveSheet()->toArray();
            foreach ($sheet as $key => $value) {
                if ($key == 0) {
                    continue;
                }
                $data = [
                    'text_soal' => $value[1],
                    'opsi_a' => $value[2],
                    'opsi_b' => $value[3],
                    'opsi_c' => $value[4],
                    'opsi_d' => $value[5],
                    'kunci_jawaban' => $value[6],
                    'tgl_dibuat' => date('Y-m-d'),
                ];
                $this->ModelSoal->insertSoal($data);
            }
            session()->setFlashdata('add', 'Soal berhasil di import');
            return redirect()->to(base_url('Panitia/soal'));
        } else {
            session()->setFlashdata('delete', 'Format file tidak sesuai');
            return redirect()->to(base_url('Panitia/soal'));
        }
    }

    public function insertSoal()
    {
        //data yang di insert
        $data = [
            'text_soal' => $this->request->getPost('text_soal'),
            'opsi_a' => $this->request->getPost('opsi_a'),
            'opsi_b' => $this->request->getPost('opsi_b'),
            'opsi_c' => $this->request->getPost('opsi_c'),
            'opsi_d' => $this->request->getPost('opsi_d'),
            'kunci_jawaban' => $this->request->getPost('kunci_jawaban'),
            'tgl_dibuat' => date('Y-m-d'),
        ];

        $this->ModelSoal->insertSoal($data);
        session()->setFlashdata('add', 'Soal Berhasil Di Tambah');
        return redirect()->to(base_url('Panitia/soal'));
    }


    public function editSoal($id_soal)
    {

        $data = [
            'id_soal' => $id_soal,
            'text_soal' => $this->request->getPost('text_soal'),
            'opsi_a' => $this->request->getPost('opsi_a'),
            'opsi_b' => $this->request->getPost('opsi_b'),
            'opsi_c' => $this->request->getPost('opsi_c'),
            'opsi_d' => $this->request->getPost('opsi_d'),
            'kunci_jawaban' => $this->request->getPost('kunci_jawaban'),
            'tgl_edit' => date('Y-m-d'),
        ];

        $this->ModelSoal->editSoal($data);
        session()->setFlashdata('edit', 'Data Berhasil Di Edit');
        return redirect()->to(base_url('Panitia/soal'));
    }

    public function deleteSoal($id_soal)
    {

        $data = [
            'id_soal' => $id_soal,
        ];

        $this->ModelSoal->deleteSoal($data);
        session()->setFlashdata('delete', 'Data Berhasil Di Delete');
        return redirect()->to(base_url('Panitia/soal'));
    }








    public function Ujian()
    {
        $data = [
            'title' => 'Ujian',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'ujian' => $this->ModelUjian->getAllData(),
            'panitia' => $this->ModelTPanitia->getProfile(),
        ];
        return view('panitia/ujian/buat_ujian', $data);
    }

    public function editUjian($id_ujian)
    {
        $data = [
            'id_ujian' => $id_ujian,
            'nama_ujian' => $this->request->getPost('nama_ujian'),
            'jumlah_soal' => $this->request->getPost('jumlah_soal'),
            'tgl_mulai' => $this->request->getPost('tgl_mulai'),
            'tgl_selesai' => $this->request->getPost('tgl_selesai'),
            'waktu_ujian' => $this->request->getPost('waktu_ujian'),
            'acak_soal' => $this->request->getPost('acak_soal'),
        ];
        $this->ModelUjian->editData($data);
        session()->setFlashdata('edit', 'Data Berhasil Di Edit');
        return redirect()->to(base_url('Panitia/Ujian'));
    }

    public function deleteData($id_ujian)
    {
        $data = [
            'id_ujian' => $id_ujian,
        ];

        $this->ModelUjian->deleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Di Delete');
        return redirect()->to(base_url('Panitia/Ujian'));
    }

    public function tambahUjian()
    {
        $data = [
            'nama_ujian' => $this->request->getPost('nama_ujian'),
            'jumlah_soal' => $this->request->getPost('jumlah_soal'),
            'tgl_mulai' => $this->request->getPost('tgl_mulai'),
            'tgl_selesai' => $this->request->getPost('tgl_selesai'),
            'waktu_ujian' => $this->request->getPost('waktu_ujian'),
            'acak_soal' => $this->request->getPost('acak_soal'),
        ];
        $this->ModelUjian->insertData($data);
        session()->setFlashdata('add', 'Data Berhasil Di Tambah');
        return redirect()->to(base_url('Panitia/Ujian'));
    }

    public function Nilai()
    {
        $data = [
            'title' => 'Nilai Ujian',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'ppdb' => $this->ModelHasilUjian->getNilaiSiswa(),
            'opsinilai' => $this->ModelHasilUjian->opsiNilai(),
            'nilaimanual' => $this->ModelHasilUjian->getNilaiManual(),
            'kkm' => $this->ModelTahunAjaran->taAktif(),
            'panitia' => $this->ModelTPanitia->getProfile(),
        ];
        return view('panitia/nilai/nilai', $data);
    }
    public function KkmKelulusan()
    {
        $data = [
            'kkm_kelulusan' => $this->request->getPost('kkm_kelulusan'),
        ];
        $this->ModelTahunAjaran->editDataKKM($data);
        session()->setFlashdata('add', 'KKM berhasil diubah');
        return redirect()->to(base_url('Panitia/Nilai'));
    }

    public function EditNilai()
    {
        $data = [
            'title' => 'Edit Nilai Ujian',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'ppdb' => $this->ModelHasilUjian->getNilaiSiswa(),
            'opsinilai' => $this->ModelHasilUjian->opsiNilai(),
            'nilaimanual' => $this->ModelHasilUjian->getNilaiManual(),
            'panitia' => $this->ModelTPanitia->getProfile(),
        ];
        return view('panitia/nilai/edit_nilai', $data);
    }

    // nilai manual

    public function insertNilaiManual()
    {

        $nilaiUjian = $this->request->getPost('nilai_ujian');
        $nilai_praktik = $this->request->getPost('nilai_praktik');
        $nilai_wawancara = $this->request->getPost('nilai_wawancara');
        $data = [];
        for ($i = 0; $i < count(
            $this->request->getPost('nilai_ujian')
        ); $i++) {
            $uji = $nilaiUjian[$i] * 0.4;
            $praktik = $nilai_praktik[$i] * 0.4;
            $wawancara = $nilai_wawancara[$i] * 0.2;
            $akhir = $uji + $praktik + $wawancara;
            $data[] = [
                'nilai_ujian' => $nilaiUjian[$i],
                'nilai_praktik' => $nilai_praktik[$i],
                'nilai_wawancara' => $nilai_wawancara[$i],
                'nilai_akhir' => $akhir,
                'id_siswa' => $this->request->getPost('id_siswa')[$i],
            ];
        }
        // echo json_encode($data);
        // exit;

        $this->ModelHasilUjian->updateNilaiManual($data);
        session()->setFlashdata('edit', 'Data Berhasil Di Edit');
        return redirect()->to(base_url('Panitia/Nilai'));
    }
    // nilai manual



    public function insertNilai()
    {

        $nilai = $this->request->getPost('nilai');
        $nilai_praktik = $this->request->getPost('nilai_praktik');
        $nilai_wawancara = $this->request->getPost('nilai_wawancara');
        $data = [];

        for ($i = 0; $i < count(
            $this->request->getPost('nilai')
        ); $i++) {
            $uji = $nilai[$i] * 0.4;
            $praktik = $nilai_praktik[$i] * 0.4;
            $wawancara = $nilai_wawancara[$i] * 0.2;
            $akhir = $uji + $praktik + $wawancara;
            // $NilaiAkhir = $akhir / 3;
            $data[] = [
                'nilai' => $nilai[$i],
                'nilai_praktik' => $nilai_praktik[$i],
                'nilai_wawancara' => $nilai_wawancara[$i],
                'nilai_akhir' => $akhir,
                'siswa_id' => $this->request->getPost('siswa_id')[$i],
            ];
        }

        $this->ModelHasilUjian->updateNilai($data);
        session()->setFlashdata('edit', 'Data Berhasil Di Edit');
        return redirect()->to(base_url('Panitia/Nilai'));
    }
    public function cetaknilai()
    {
        $data = [
            'title' => 'Download Form Nilai',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'ppdb' => $this->ModelHasilUjian->getNilaiSiswa(),
            'opsinilai' => $this->ModelHasilUjian->opsiNilai(),
            'kkm' => $this->ModelTahunAjaran->taAktif(),
            'nilai' => $this->ModelPendaftar->getPpdbFormulir(),
            'nilaimanual' => $this->ModelHasilUjian->getNilaiManual(),
        ];
        $view = view('panitia/nilai/nilai_ujian_pdf', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("Hasil Ujian PPDB <?= date('Y'); ?>.pdf", array("Attachment" => false));
    }

    public function cetaktemplate()
    {
        $data = [
            'title' => 'Download Template',
            'subtitle' => 'PPDB MTsN 4 ABES',
            'nilai' => $this->ModelPendaftar->getPpdbFormulir(),

        ];
        $view = view('panitia/nilai/template_nilai_pdf', $data);

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
}
