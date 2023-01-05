<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;
use App\Models\ModelTahunAjaran;
use App\Models\ModelSetting;

class Auth extends BaseController
{
    public $email;

    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
        $this->ModelTahunAjaran = new ModelTahunAjaran();
        $this->ModelSetting = new ModelSetting();
        $this->email = \Config\Services::email();
        helper('form');
    }

    // public function forgotpassword()
    // {
    //     session();
    //     $data = [
    //         'title' => 'PPDB MTsN 4 ABES',
    //         'subtitle' => 'Forgot Password',
    //         'setting' => $this->ModelSetting->detailSetting(),
    //         'validation' => \Config\Services::validation(),
    //     ];
    //     return view('auth/forgot_password', $data);
    // }

    // public function cek_forgotpassword()
    // {
    //     if ($this->validate([
    //         'email' => [
    //             'label' => 'Email',
    //             'rules' => 'required|valid_email',
    //             'errors' => [
    //                 'required' => '*Isikan {field} Anda',
    //                 'valid_email' => '*{field} tidak valid',
    //             ]
    //         ],
    //     ])) {
    //         $email = $this->request->getPost('email', FILTER_SANITIZE_EMAIL);
    //         $cek_email = $this->ModelAuth->cek_email($email);
    //         if (!empty($cek_email)) {
    //             if ($this->ModelAuth->updateAt($cek_email['id_panitia'])) {
    //                 $to = $email;
    //                 $subject = "Reset Password PPDB MTsN 4 Aceh Besar";
    //                 $token = $cek_email['id_panitia'];
    //                 $message = 'Halo ' . $cek_email['nama_panitia'] . ',<br><br>
    //                 Kami menerima permintaan untuk mengatur ulang kata sandi Anda. Silakan klik tautan di bawah ini untuk mengatur ulang kata sandi Anda.<br><br>
    //                 <a href="' . base_url() . '/auth/resetpassword/' . $token . '">Reset Password</a><br><br>
    //                 Jika Anda tidak meminta untuk mengatur ulang kata sandi Anda, Anda dapat mengabaikan email ini.<br><br>
    //                 Terima kasih,<br>
    //                 PPDB MTsN 4 Aceh Besar';

    //                 $this->email->setTo($to);
    //                 $this->email->setFrom('atikaafadhluna@gmail.com', 'PPDB MTsN 4 ABES');
    //                 $this->email->setMessage($message);
    //                 $this->email->setSubject($subject);

    //                 if ($this->email->send()) {
    //                     session()->setFlashdata('edit', 'Silahkan cek email Anda untuk mengatur ulang kata sandi Anda. Harap periksa folder spam jika Anda tidak dapat menemukan email.');
    //                     return redirect()->to(base_url('auth/forgotpassword'));
    //                 } else {
    //                     $data = $this->email->printDebugger(['headers']);
    //                     print_r($data);
    //                 }
    //             } else {
    //                 session()->setFlashdata('error', 'Gagal mengirim email');
    //                 return redirect()->to(base_url('auth/forgotpassword'));
    //             }
    //         } else {
    //             session()->setFlashdata('error', 'Email tidak terdaftar');
    //             return redirect()->to(base_url('auth/forgotpassword'));
    //         }
    //     } else {
    //         $validation = \Config\Services::validation();
    //         return redirect()->to(base_url('auth/forgotpassword'))->withInput()->with('validation', $validation);
    //     }
    // }

    // public function resetpassword()
    // {
    //     session();
    //     $data = [
    //         'title' => 'PPDB MTsN 4 ABES',
    //         'subtitle' => 'Reset Password',
    //         'setting' => $this->ModelSetting->detailSetting(),
    //         'validation' => \Config\Services::validation(),
    //     ];
    //     return view('auth/reset_password', $data);
    // }

    // public function reset_password($token = null)
    // {
    //     if (!empty($token)) {
    //         $userdata = $this->ModelAuth->verifyToken($token);
    //         if (!empty($userdata)) {
    //             if ($this->checkExpiryDate($userdata['updated_at'])) {
    //                 if ($this->validate([
    //                     'npwd' => [
    //                         'label' => 'Password Baru',
    //                         'rules' => 'required|min_length[6]',
    //                         'errors' => [
    //                             'required' => '*Isikan {field} Anda ',
    //                             'min_length' => '*{field} Minimal 6 Karakter ',
    //                         ],
    //                     ],
    //                     'cnpwd' => [
    //                         'label' => 'Konfirmasi Password Baru',
    //                         'rules' => 'required|matches[npwd]',
    //                         'errors' => [
    //                             'required' => '*Isikan {field} Anda ',
    //                             'matches' => '*{field} Yang Diisi Harus Sama  ',
    //                         ],
    //                     ],
    //                 ])) {
    //                     $npwd = password_hash($this->request->getPost('npwd'), PASSWORD_DEFAULT);
    //                     if ($this->ModelAuth->updatePassword($npwd, $token)) {
    //                         session()->setFlashdata('edit', 'Password Berhasil Di Reset');
    //                         return redirect()->to(base_url('auth/loginpanitia'));
    //                     } else {
    //                         session()->setFlashdata('error', 'Password Gagal Di Reset');
    //                         return redirect()->to(base_url('auth/resetpassword'));
    //                     }
    //                 } else {
    //                     $validation = \Config\Services::validation();
    //                     return redirect()->to(base_url('auth/resetpassword'))->withInput()->with('validation', $validation);
    //                 }
    //             } else {
    //                 session()->setFlashdata('error', 'Token Expired');
    //                 return redirect()->to(base_url('auth/resetpassword'));
    //             }
    //         } else {
    //             session()->setFlashdata('error', 'Tautan atur ulang password telah kedaluwarsa');
    //             return redirect()->to(base_url('auth/resetpassword'));
    //         }
    //     } else {
    //         session()->setFlashdata('error', 'Tidak dapat menemukan akun pengguna');
    //         return redirect()->to(base_url('auth/resetpassword'));
    //     }
    // }

    // public function checkExpiryDate($time)
    // {
    //     $update_time = strtotime($time);
    //     $current_time = time();
    //     $timeDiff = ($current_time - $update_time) / 60;
    //     if ($timeDiff < 900) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }


    // begin :: register dan login Siswa

    public function register()
    {
        session();
        $data = [
            'title' => 'PPDB MTsN 4 ABES',
            'subtitle' => 'Daftar Akun',
            'ta' => $this->ModelTahunAjaran->statusTa(),
            'getAktifIsiFormulir' => $this->ModelTahunAjaran->getAktifIsiFormulir(),
            'setting' => $this->ModelSetting->detailSetting(),
            'validation' => \Config\Services::validation(),
        ];
        return view('auth/register', $data);
    }

    public function saveregister()
    {
        if ($this->validate([
            'nama_siswa' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'nisn' => [
                'label' => 'NISN',
                'rules' => 'required|is_unique[tbl_siswa.nisn]',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                    'is_unique' => '*{field} Sudah Terdaftar ',
                ],
            ],
            'telepon_siswa' => [
                'label' => 'No. Telepon (Wa)',
                'rules' => 'required|max_length[12]|min_length[11]',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                    'max_length' => '*{field} tidak boleh lebih dari 12 angka ',
                    'min_length' => '*{field} tidak boleh kurang dari 11 angka ',
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                    'min_length' => '*{field} Minimal 6 Karakter ',
                ],
            ],
            'cpassword' => [
                'label' => 'Konfirmasi Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                    'matches' => '*{field} Yang Diisi Harus Sama  ',
                ],
            ],
        ])) {
            // jika tidak ada validasi simpan data
            $no_pendaftaran = $this->ModelAuth->noPendaftaran();
            $data = [
                'no_pendaftaran' => $no_pendaftaran,
                'tahun' => date('Y'),
                'tgl_pendaftaran' => date('Y-m-d'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'telepon_siswa' => $this->request->getPost('telepon_siswa'),
                'nisn' => $this->request->getPost('nisn'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            ];
            $this->ModelAuth->insertData($data);
            session()->setFlashdata('pesan', 'Pendaftaran Berhasil, Silahkan Login Untuk Melengkapi Data');
            return redirect()->to(base_url('auth/loginsiswa'));
        } else {
            // jika ada validasi 
            $validation = \Config\Services::validation();
            return redirect()->to('auth/register')->withInput()->with('validation', $validation);
        }
    }

    public function loginsiswa()
    {
        $data = [
            'title' => 'PPDB MTsN 4 ABES',
            'subtitle' => 'Login Siswa',
            'ta' => $this->ModelTahunAjaran->statusTa(),
            'setting' => $this->ModelSetting->detailSetting(),
            'validation' => \Config\Services::validation(),
        ];
        return view('auth/login_siswa', $data);
    }

    public function cek_login_siswa()
    {
        if ($this->validate([
            'nisn' => [
                'label' => 'NISN',
                'rules' => 'required',
                'errors' => [
                    'required' => '*Isikan {field} Anda ',
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isikan {field} Anda',
                ],
            ]
        ])) {
            // Data Valid
            $nisn = $this->request->getPost('nisn');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->login_siswa($nisn);
            if ($cek_login) {
                if (password_verify($password, $cek_login['password'])) {
                    session()->set('id_siswa', $cek_login['id_siswa']);
                    session()->set('nama_siswa', $cek_login['nama_siswa']);
                    session()->set('nisn', $cek_login['nisn']);
                    session()->set('level', 'siswa');
                    return redirect()->to(base_url('siswa/index'));
                } else {
                    session()->setFlashdata('message', 'Password Salah !');
                    return redirect()->to(base_url('auth/loginsiswa'));
                }
                return redirect()->to(base_url('Siswa/index'));
            } else {
                session()->setFlashdata('message', 'NISN Atau Password Salah !');
                return redirect()->to(base_url('Auth/loginsiswa'));
            }
        } else {
            //Data tidak Valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            $validation = \Config\Services::validation();
            return redirect()->to('Auth/logincoba')->withInput()->with('validation', $validation);
        }
    }
    public function logoutSiswa()
    {
        session()->remove('nisn');
        session()->remove('nama_siswa');
        session()->remove('telepon_siswa');
        session()->remove('level');
        session()->setFlashdata('keluar', 'Logout Success !');
        return redirect()->to(base_url('auth/loginSiswa'));
    }

    // end :: register dan login siswa



    // begin :: login logout admin

    public function login()
    {
        session();
        $data = [
            'title' => 'PPDB MTsN 4 ABES',
            'subtitle' => 'Login Admin',
            'setting' => $this->ModelSetting->detailSetting(),
            'validation' => \Config\Services::validation(),
        ];
        return view('auth/login', $data);
    }

    public function cek_login_user()
    {
        if ($this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Isikan {field} Anda ',
                    'valid_email' => 'Harus Sesuai Dengan Format Email !'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isikan {field} Anda',
                ],
            ]
        ])) {
            // Data Valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->login_user($email);
            if ($cek_login) {
                if (password_verify($password, $cek_login['password'])) {
                    session()->set('id_user', $cek_login['id_user']);
                    session()->set('nama_user', $cek_login['nama_user']);
                    session()->set('email', $cek_login['email']);
                    session()->set('telepon', $cek_login['telepon']);
                    session()->set('level', 'kepsek');
                    return redirect()->to(base_url('Admin/index'));
                } else {
                    session()->setFlashdata('message', 'Password Salah !');
                    return redirect()->to(base_url('auth/login'));
                }
                return redirect()->to(base_url('Siswa/index'));
            } else {
                session()->setFlashdata('message', 'Email Atau Password Salah !');
                return redirect()->to(base_url('auth/login'));
            }
        } else {
            //Data tidak Valid
            $validation = \Config\Services::validation();
            return redirect()->to('Auth/login')->withInput()->with('validation', $validation);
        }
    }

    public function logout()
    {
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('foto');
        session()->remove('level');
        session()->setFlashdata('keluar', 'Logout Success !');
        return redirect()->to(base_url('auth/login'));
    }
    // end :: login logout admin

    // begin :: login panitia
    public function loginPanitia()
    {
        session();
        $data = [
            'title' => 'PPDB MTsN 4 ABES',
            'subtitle' => 'Login Panitia',
            'setting' => $this->ModelSetting->detailSetting(),
            'validation' => \Config\Services::validation(),
        ];
        return view('auth/login_panitia', $data);
    }

    public function cek_login_panitia()
    {
        if ($this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Isikan {field} Anda ',
                    'valid_email' => 'Harus Sesuai Dengan Format Email !'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isikan {field} Anda',
                ],
            ]
        ])) {
            // Data Valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelAuth->login_panitia($email);
            if ($cek_login) {
                if (password_verify($password, $cek_login['password'])) {
                    session()->set('id_panitia', $cek_login['id_panitia']);
                    session()->set('nama_panitia', $cek_login['nama_panitia']);
                    session()->set('email', $cek_login['email']);
                    session()->set('level', 'panitia');
                    return redirect()->to(base_url('panitia/index'));
                } else {
                    session()->setFlashdata('message', 'Password Salah !');
                    return redirect()->to(base_url('auth/loginPanitia'));
                }
                return redirect()->to(base_url('panitia/index'));
            } else {
                session()->setFlashdata('message', 'Email Atau Password Salah !');
                return redirect()->to(base_url('auth/loginpanitia'));
            }
        } else {
            //Data tidak Valid
            $validation = \Config\Services::validation();
            return redirect()->to('Auth/loginpanitia')->withInput()->with('validation', $validation);
        }
    }

    public function logoutPanitia()
    {
        session()->remove('nama_panitia');
        session()->remove('email');
        session()->remove('foto');
        session()->remove('level');
        session()->setFlashdata('keluar', 'Logout Success !');
        return redirect()->to(base_url('auth/loginpanitia'));
    }
    // end :: login panitia

}
