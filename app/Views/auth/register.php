<?php
$db = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();
?>

<?= $this->extend('templates/auth'); ?>

<?= $this->section('content'); ?>
<?php if (isset($ta['status'])) { ?>
    <?php if ($getAktifIsiFormulir) : ?>
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
                <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(/assets/media/bg/bg-auth.png);">
                    <div class="login-form text-center text-dark p-7 position-relative overflow-hidden">

                        <div class="card card-custom gutter-b">
                            <div class="card-body">
                                <!--begin::Login Header-->
                                <div class="d-flex flex-center mb-10">
                                    <a href="#">
                                        <img class="max-h-75px" src="<?= base_url('logo/' . $setting['logo_sekolah']) ?>" id="gambar_load">
                                    </a>
                                </div>
                                <!--end::Login Header-->
                                <!--begin::Login Sign in form-->
                                <div class="login-signin">
                                    <div class="mb-15">
                                        <h3 class=" font-weight-bold text-dark"><?= $subtitle; ?></h3>
                                        <p class="text-dark-75 font-weight-normal">PPDB ONLINE | MTsN 4 ACEH BESAR</p>

                                    </div>
                                    <?php session()->getFlashdata('errors') ?>
                                    <?php echo form_open('auth/saveregister') ?>
                                    <div class="form" id="kt_login_signin_form">
                                        <div style="text-align: left;"><label class="ml-2">Nama Lengkap</label></div>
                                        <div class="form-group">
                                            <input class="form-control h-auto text-dark bg-dark-o-10 rounded-pill border-0 py-4 px-8 <?= $validation->hasError('nama_siswa') ? 'is-invalid' : ''; ?>" type="text" placeholder="Nama Lengkap" name="nama_siswa" value="<?= old('nama_siswa'); ?>" />
                                            <div class="invalid-feedback text-left pl-2">
                                                <?= $validation->getError('nama_siswa'); ?>
                                            </div>
                                        </div>
                                        <div style="text-align: left;"><label class="ml-2">No Telepon (Wa)</label></div>
                                        <div class="form-group">
                                            <input class="form-control h-auto text-dark bg-dark-o-10 rounded-pill border-0 py-4 px-8 <?= $validation->hasError('telepon_siswa') ? 'is-invalid' : ''; ?>" type="text" placeholder="No. Telepon (Wa)" name="telepon_siswa" value="<?= old('telepon_siswa'); ?>" />
                                            <div class="invalid-feedback text-left pl-2">
                                                <?= $validation->getError('telepon_siswa'); ?>
                                            </div>
                                        </div>
                                        <div style="text-align: left;"><label class="ml-2">NISN</label></div>
                                        <div class="form-group">
                                            <input class="form-control h-auto text-dark bg-dark-o-10 rounded-pill border-0 py-4 px-8 <?= $validation->hasError('nisn') ? 'is-invalid' : ''; ?>" type="text" placeholder="NISN" name="nisn" value="<?= old('nisn'); ?>" />
                                            <div class="invalid-feedback text-left pl-2">
                                                <?= $validation->getError('nisn'); ?>
                                            </div>
                                        </div>
                                        <div style="text-align: left;"><label class="ml-2">Password</label></div>
                                        <div class="form-group">
                                            <input class="form-control h-auto text-dark bg-dark-o-10 rounded-pill border-0 py-4 px-8 <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>" type="password" placeholder="Password" name="password" value="<?= old('password'); ?>" />
                                            <div class="invalid-feedback text-left pl-2">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                        <div style="text-align: left;"><label class="ml-2">Konfirmasi Password</label></div>
                                        <div class="form-group">
                                            <input class="form-control h-auto text-dark bg-dark-o-10 rounded-pill border-0 py-4 px-8 <?= $validation->hasError('cpassword') ? 'is-invalid' : ''; ?>" type="password" placeholder="Konfirmasi Password" name="cpassword" />
                                            <div class="invalid-feedback text-left pl-2">
                                                <?= $validation->getError('cpassword'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group text-center mt-5">
                                            <button type="submit" class="btn btn-pill btn-warning opacity-90 px-15 py-3">Daftar Akun</button>
                                        </div>
                                        <div class="mt-5 mb-5">
                                            <span class="opacity-40">Sudah Mempunyai Akun?</span>
                                            <a href="<?= base_url('auth/loginSiswa') ?>" class="text-primary  font-weight-normal">Login disini</a>
                                        </div>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                                <!--end::Login Sign in form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->
    <?php else : ?>
        <!--begin::Body-->

        <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
            <!--begin::Main-->
            <div class="d-flex flex-column flex-root">
                <!--begin::Error-->
                <div class="error error-5 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url(assets/media/error/bg5.jpg);">
                    <!--begin::Content-->
                    <div class="container d-flex flex-row-fluid flex-column justify-content-md-center p-12">
                        <h1 class="error-title font-weight-boldest text-danger mt-10 mt-md-0 mb-8">Maaf!</h1>
                        <p class="font-weight-boldest display-4">Batas pendaftaran Akun
                        <p>
                        <p class="font-weight-boldest display-4 ">Sudah berakhir/belum dimulai</p>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Error-->
            </div>
            <!--end::Main-->
        </body>
        <!--end::Body-->
    <?php endif; ?>

<?php } else { ?>
    <!--begin::Body-->

    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Error-->
            <div class="error error-5 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url(assets/media/error/bg5.jpg);">
                <!--begin::Content-->
                <div class="container d-flex flex-row-fluid flex-column justify-content-md-center p-12">
                    <h1 class="error-title font-weight-boldest text-danger mt-10 mt-md-0 mb-8">Maaf!</h1>
                    <p class="font-weight-boldest display-4">Penerimaan Peserta Didik Baru
                    <p>
                    <p class="font-weight-boldest display-4 ">Sudah Di Tutup.</p>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Error-->
        </div>
        <!--end::Main-->
    </body>
    <!--end::Body-->
<?php } ?>

<?= $this->endSection(''); ?>