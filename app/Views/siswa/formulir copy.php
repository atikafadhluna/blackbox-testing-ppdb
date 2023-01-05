<?php
$db = \Config\Database::connect();

$cs = $db->table('tbl_siswa')
    ->where('status_pendaftaran', '1')
    ->get()->getRowArray();
?>

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
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Form Penerimaan Peserta Didik Baru</h3>
            </div>
        </div>
        <!--begin::Form-->

        <?php echo form_open_multipart('formulir/updateFormulir/' . $siswa['id_siswa']) ?>
        <div class="form">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-6 mb-3">
                        <label>Tanggal Pendaftaran</label>
                        <input type="text" class="form-control" disabled="disabled" name="tgl_pendaftaran" value="<?= $siswa['tgl_pendaftaran'] ?>" />
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
                        <label>Nama Lengkap <?= ($siswa['nama_siswa'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control" name="nama_siswa" disabled="disabled" value="<?= $siswa['nama_siswa'] ?>" />
                        <p class="text-danger">
                            <?= $validation->hasError('nama_siswa') ? $validation->getError('nama_siswa') : ''; ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6 mb-3">
                        <label>Jenis Kelamin <?= ($siswa['jenis_kelamin'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <select class="form-control mb-3" name="jenis_kelamin" <?= $siswa['jenis_kelamin'] ?>>
                            <option value="">--Pilih--</option>
                            <option value="L" <?= $siswa['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="P" <?= $siswa['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                        <p class="text-danger">
                            <?= $validation->hasError('jenis_kelamin') ? $validation->getError('jenis_kelamin') : ''; ?>
                        </p>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label>Tempat Lahir <?= ($siswa['tempat_lahir'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>" />
                        <p class="text-danger">
                            <?= $validation->hasError('tempat_lahir') ? $validation->getError('tempat_lahir') : ''; ?>
                        </p>
                    </div>


                </div>

                <div class="form-group row">
                    <div class="col-lg-4 mb-3">
                        <label>Tanggal Lahir <span class="text-danger">*</span></label>
                        <select class="form-control" name="tanggal">
                            <option>--tanggal--</option>
                            <?php
                            for ($i = 1; $i <= 31; $i++) { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php } ?>
                        </select>
                        <p class="text-danger">
                            <?= $validation->hasError('tanggal') ? $validation->getError('tanggal') : ''; ?>
                        </p>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label>Bulan Lahir <span class="text-danger">*</span></label>
                        <select class="form-control" name="bulan">
                            <option>--bulan--</option>
                            <?php
                            for ($i = 1; $i <= 12; $i++) { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php } ?>
                        </select>
                        <p class="text-danger">
                            <?= $validation->hasError('bulan') ? $validation->getError('bulan') : ''; ?>
                        </p>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label>Tahun Lahir <span class="text-danger">*</span></label>
                        <select class="form-control" name="tahun">
                            <option>--tahun--</option>
                            <?php $now = date('Y');
                            for ($i = 2008; $i <= $now; $i++) { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php } ?>
                        </select>
                        <p class="text-danger">
                            <?= $validation->hasError('tahun') ? $validation->getError('tahun') : ''; ?>
                        </p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6 mb-3">
                        <label>Alamat Rumah <?= ($siswa['alamat_rumah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control" name="alamat_rumah" value="<?= $siswa['alamat_rumah'] ?>" />
                        <p class="text-danger">
                            <?= $validation->hasError('alamat_rumah') ? $validation->getError('alamat_rumah') : ''; ?>
                        </p>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label>Nomor Telepon (Orang Tua)
                            <?= ($siswa['no_ortu'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control" name="no_ortu" value="<?= $siswa['no_ortu'] ?>" />
                        <p class="text-danger">
                            <?= $validation->hasError('no_ortu') ? $validation->getError('no_ortu') : ''; ?>
                        </p>

                    </div>


                </div>
                <div class="form-group row">
                    <div class="col-lg-6 mb-3">
                        <label>Nama Ayah <?= ($siswa['nama_ayah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control" name="nama_ayah" value="<?= $siswa['nama_ayah'] ?>" />
                        <p class="text-danger">
                            <?= $validation->hasError('nama_ayah') ? $validation->getError('nama_ayah') : ''; ?>
                        </p>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label>Nama Ibu <?= ($siswa['nama_ibu'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control" name="nama_ibu" value="<?= $siswa['nama_ibu'] ?>" />
                        <p class="text-danger">
                            <?= $validation->hasError('nama_ibu') ? $validation->getError('nama_ibu') : ''; ?>
                        </p>

                    </div>


                </div>
                <div class="form-group row">
                    <div class="col-lg-6 mb-5">
                        <label>Nomor Telepon (Peserta Didik)
                            <?= ($siswa['telepon_siswa'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control" name="telepon_siswa" value="<?= $siswa['telepon_siswa'] ?>" />
                        <p class="text-danger">
                            <?= $validation->hasError('telepon_siswa') ? $validation->getError('telepon_siswa') : ''; ?>
                        </p>

                    </div>
                    <div class="col-lg-6 mb-5">
                        <label>MIN / SD Asal <?= ($siswa['sekolah_asal'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control" name="sekolah_asal" value="<?= $siswa['sekolah_asal'] ?>" />
                        <p class="text-danger">
                            <?= $validation->hasError('sekolah_asal') ? $validation->getError('sekolah_asal') : ''; ?>
                        </p>

                    </div>
                </div>
                <div class="form-group row m-3 ml-2 ">
                    <h4><strong>PENTING !</strong></h4>
                    <ul>
                        <li>
                            Hasil scan dokumen harus dari <strong>dokumen asli</strong>, tidak boleh dokumen
                            <strong>fotocopy</strong>
                        </li>
                        <li>Dokumen harus dalam bentuk <strong>image</strong>(foto)</li>
                        <li>Periksa kembali dokumen yang sudah di upload</li>
                        <li>Dokumen tidak boleh lebih dari <strong>1024 KB</strong></li>
                    </ul>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Akte Kelahiran
                            <?= ($siswa['akte_kelahiran'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input required type="file" accept="image/*" class="form-control" name="akte_kelahiran" <?= $siswa['akte_kelahiran'] ?> />
                        <p class="text-danger">
                            <?= $validation->hasError('akte_kelahiran') ? $validation->getError('akte_kelahiran') : ''; ?>
                        </p>
                    </div>
                    <div class="col-lg-6 ">
                        <label>Pas Photo 3x4 (Latar Biru) <span class="text-danger">*</span></label>
                        <input required type="file" class="form-control" name="pas_photo" value="<?= $siswa['pas_photo'] ?>" />
                        <p class="text-danger">
                            <?= $validation->hasError('pas_photo') ? $validation->getError('pas_photo') : ''; ?>
                        </p>
                    </div>
                </div>
                <?php if (isset($cs['status_pendaftaran'])) { ?>
                    <div class="form-group row pl-8 pr-8">
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom nowrap text-dark" mode="datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Berkas</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Akte Kelahiran</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Pas Photo</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <!--end: Datatable-->

                    </div>
                <?php } else { ?>
                    <div class="form-group row pl-8 pr-8">
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom nowrap text-dark" mode="datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Berkas</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Akte Kelahiran</td>
                                    <td><a href="<?= base_url('berkas/akte_kelahiran/' . $siswa['akte_kelahiran']) ?>"><i class="far fa-file-image icon-2x text-success"></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Pas Photo</td>
                                    <td><a href="<?= base_url('berkas/pas_photo/' . $siswa['pas_photo']) ?>"><i class="far fa-file-image icon-2x text-success"></a></i></td>
                                </tr>
                            </tbody>
                        </table>
                        <!--end: Datatable-->

                    </div>
                <?php } ?>

            </div>
        </div>
        <?php if (isset($cs['status_pendaftaran'])) { ?>
            <div class="card-footer">
                <div class="row">
                    <button type="submit" class="btn bc-kemenag btn-shadow-hover font-weight-bolder w-100 py-3 text-white">
                        Daftarkan Sekarang
                    </button>
                </div>
            </div>
        <?php } ?>
        <?php echo form_close()  ?>
        <!--end::Form-->


        <!--begin::Heading-->
    </div>

    <!--end::Card-->

    <?= $this->endSection(''); ?>