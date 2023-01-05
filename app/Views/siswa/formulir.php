<?= $this->extend('templates/cs_layout'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <!--begin::Card-->
    <?php
    session()->getFlashdata('errors');
    if (session()->getFlashdata('message')) {
        echo '<div class="alert alert-custom alert-light-success fade show" role="alert">';
        echo '<div class="alert-text text-dark">';
        echo session()->getFlashdata('message');
        echo '</div>';
        echo '<div class="alert-close icon-dark">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true"><i class="ki ki-close"></i>';
        echo '</span>';
        echo '</button>';
        echo '</div>';
        echo '</div>';
    }

    ?>
    <div class="card card-custom">
        <div class="card-header" style=" background-color: #307F44;">
            <div class="card-title">
                <h3 class="card-label text-white">Formulir Penerimaan Peserta Didik Baru <?= date('Y'); ?></h3>
            </div>

        </div>
        <!--begin::Form-->
        <?php $validation = \Config\Services::validation(); ?>
        <?php echo form_open_multipart('Siswa/updateFormulir/' . $siswa['id_siswa']) ?>
        <div class="form">
            <?php if ($formulir) : ?>
                <?php if ($isReadyFormulir) : ?>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6 mb-3">
                                <label>Tanggal Pendaftaran</label>
                                <input type="text" class="form-control" disabled="disabled" name="no_pendaftaran" value="<?= $siswa['tgl_pendaftaran'] ?>" />
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Nomor Pendaftaran</label>
                                <input type="text" class="form-control" disabled="disabled" name="no_pendaftaran" value="<?= $siswa['no_pendaftaran'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-3">
                                <label>NISN</label>
                                <input type="text" class="form-control " disabled="disabled" name="nisn" value="<?= $siswa['nisn'] ?>" />
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_siswa" disabled="disabled" value="<?= $siswa['nama_siswa'] ?>" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-3">
                                <label>Jenis Kelamin<?= ($siswa['jenis_kelamin'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                                <select class="form-control mb-3 <?= $validation->hasError('jenis_kelamin') ? 'is-invalid' : null ?>" name="jenis_kelamin">
                                    <option value="" disabled selected>--Pilih--</option>
                                    <option value="laki-laki" <?= old('jenis_kelamin', $siswa['jenis_kelamin']) == 'laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="perempuan" <?= old('jenis_kelamin', $siswa['jenis_kelamin']) == 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                                <p class="invalid-feedback">
                                    <?= $validation->getError('jenis_kelamin') ?>
                                </p>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Tempat Lahir <?= ($siswa['tempat_lahir'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                                <input type="text" class="form-control <?= $validation->hasError('tempat_lahir') ? 'is-invalid' : null ?>" name="tempat_lahir" value="<?= old('tempat_lahir', $siswa['tempat_lahir']) ?>" />
                                <p class="invalid-feedback">
                                    <?= $validation->getError('tempat_lahir') ?>
                                </p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4 mb-3">
                                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                <select class="form-control <?= $validation->hasError('tanggal') ? 'is-invalid' : null ?>" name="tanggal">
                                    <option value="" disabled selected>--tanggal--</option>
                                    <?php
                                    for ($i = 1; $i <= 31; $i++) { ?>
                                        <option value="<?= $i ?>" <?= old('tanggal') == $i ? 'selected' : '' ?>><?= $i ?></option>
                                    <?php } ?>
                                </select>
                                <p class="invalid-feedback">
                                    <?= $validation->getError('tanggal') ?>
                                </p>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label>Bulan Lahir <span class="text-danger">*</span></label>
                                <select class="form-control <?= $validation->hasError('bulan') ? 'is-invalid' : null ?>" name="bulan">
                                    <option value="" disabled selected>--bulan--</option>
                                    <?php
                                    for ($i = 1; $i <= 12; $i++) { ?>
                                        <option value="<?= $i ?>" <?= old('bulan') == $i ? 'selected' : '' ?>><?= $i ?></option>
                                    <?php } ?>
                                </select>
                                <p class="invalid-feedback">
                                    <?= $validation->getError('bulan') ?>
                                </p>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label>Tahun Lahir <span class="text-danger">*</span></label>
                                <select class="form-control <?= $validation->hasError('tahun') ? 'is-invalid' : null ?>" name="tahun">
                                    <option value="" disabled selected>--tahun--</option>
                                    <?php $now = date('Y');
                                    for ($i = 2008; $i <= $now; $i++) { ?>
                                        <option value="<?= $i ?>" <?= old('tahun') == $i ? 'selected' : '' ?>><?= $i ?></option>
                                    <?php } ?>
                                </select>
                                <p class="invalid-feedback">
                                    <?= $validation->getError('tahun') ?>
                                </p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 mb-3">
                                <label>Alamat Rumah <?= ($siswa['alamat_rumah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                                <input type="text" class="form-control <?= $validation->hasError('alamat_rumah') ? 'is-invalid' : null ?>" name="alamat_rumah" value="<?= old('alamat_rumah', $siswa['alamat_rumah']) ?>" />
                                <p class="invalid-feedback">
                                    <?= $validation->getError('alamat_rumah') ?>
                                </p>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Nomor Telepon (Orang Tua)
                                    <?= ($siswa['no_ortu'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                                <input type="text" class="form-control <?= $validation->hasError('no_ortu') ? 'is-invalid' : null ?>" name="no_ortu" value="<?= old('no_ortu', $siswa['no_ortu']) ?>" />
                                <p class="invalid-feedback">
                                    <?= $validation->getError('no_ortu') ?>
                                </p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-3">
                                <label>Nama Ayah <?= ($siswa['nama_ayah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                                <input type="text" class="form-control <?= $validation->hasError('nama_ayah') ? 'is-invalid' : null ?>" name="nama_ayah" value="<?= old('nama_ayah', $siswa['nama_ayah']) ?>" />
                                <p class="invalid-feedback">
                                    <?= $validation->getError('nama_ayah') ?>
                                </p>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Nama Ibu <?= ($siswa['nama_ibu'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                                <input type="text" class="form-control <?= $validation->hasError('nama_ibu') ? 'is-invalid' : null ?>" value="<?= old('nama_ibu', $siswa['nama_ibu']) ?>" name="nama_ibu" />
                                <p class="invalid-feedback">
                                    <?= $validation->getError('nama_ibu') ?>
                                </p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6 mb-5">
                                <label>Nomor Telepon (Peserta Didik)
                                    <?= ($siswa['telepon_siswa'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                                <input type="text" class="form-control <?= $validation->hasError('telepon_siswa') ? 'is-invalid' : null ?>" name="telepon_siswa" value="<?= old('telepon_siswa', $siswa['telepon_siswa']) ?>" />
                                <p class="invalid-feedback">
                                    <?= $validation->getError('telepon_siswa') ?>
                                </p>

                            </div>
                            <div class="col-lg-6 mb-5">
                                <label>MIN / SD Asal <?= ($siswa['sekolah_asal'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                                <input type="text" class="form-control <?= $validation->hasError('sekolah_asal') ? 'is-invalid' : null ?>" name="sekolah_asal" value="<?= old('sekolah_asal', $siswa['sekolah_asal']) ?>" />
                                <p class="invalid-feedback">
                                    <?= $validation->getError('sekolah_asal') ?>
                                </p>

                            </div>
                        </div>
                        <div class="form-group row m-3 ml-2 ">
                            <h4><strong>PENTING !</strong></h4>
                        </div>
                        <ul class="m-3 ml-2">
                            <li>Pas Photo harus dalam bentuk <strong>image</strong>(foto)</li>
                            <li>Pas Photo tidak boleh lebih dari <strong>1024 KB</strong></li>
                        </ul>
                        <div class="form-group row">
                            <div class="col-lg-12 ">
                                <label>Pas Photo
                                    <?= ($siswa['pas_photo'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                                <input type="file" accept="image/*" class="form-control <?= $validation->hasError('pas_photo') ? 'is-invalid' : null ?>" name="pas_photo" />
                                <p class="invalid-feedback">
                                    <?= $validation->getError('pas_photo') ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <a class="btn bc-kemenag btn-shadow-hover font-weight-bolder w-100 py-3 text-white" data-toggle="modal" data-target="#daftar<?= session()->get('id_siswa') ?>">
                                Daftarkan Sekarang
                            </a>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="card-body">
                        <a class="btn btn-info btn-md font-weight-bold" style="display: block; pointer-events: none;">
                            Terimakasih telah melakukan pengisian formulir.
                        </a>
                    </div>
                    <div class="card-footer text-center">
                        <a href="<?= base_url('Siswa/index'); ?>" class="btn btn-secondary  font-weight-bold">Kembali ke halaman utama</a>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <div class="card-body">
                    <a class="btn btn-light-danger btn-md font-weight-bold" style="display: block; pointer-events: none;">
                        Anda tidak dapat melakukan pengisian formulir. Waktu pengisian formulir telah berakhir/belum dimulai. Silahkan hubungi Panitia PPDB
                    </a>
                </div>
                <div class="card-footer text-center">
                    <a href="<?= base_url('Siswa/index'); ?>" class="btn btn-secondary  font-weight-bold">Kembali ke halaman utama</a>
                </div>
            <?php endif; ?>
        </div>

        <!-- Konfirmasi Modal-->
        <div class="modal fade" id="daftar<?= session()->get('id_siswa') ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pendaftaran!!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            Data yang sudah didaftarkan tidak dapat diubah lagi. pastikan kembali data yang Anda isi sudah benar.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn bc-kemenag text-white font-weight-bold">Daftarkan</button>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close()  ?>
    </div>
    <!--end::Card-->



    <!--end::Form-->

    <?= $this->endSection(''); ?>