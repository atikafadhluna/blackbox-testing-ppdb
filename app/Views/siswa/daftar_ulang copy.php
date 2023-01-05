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
                <h3 class="card-label text-white">FORM DAFTAR ULANG PPDB <?= date('Y'); ?></h3>
            </div>
        </div>
        <!--begin::Form-->


        <div class="form">
            <div class="card-body" style=" background-color: #f3f6f9;">
                <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="true">
                    <!--begin: Wizard Nav-->
                    <div class="wizard-nav">
                        <div class="wizard-steps">
                            <!--begin::Wizard Step 1 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number">1</div>
                                    <div class="wizard-label">
                                        <div class="wizard-title">Identitas Siswa</div>
                                        <div class="wizard-desc text-dark-50">data diisi sesuai KK</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 1 Nav-->
                            <!--begin::Wizard Step 2 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number">2</div>
                                    <div class="wizard-label">
                                        <div class="wizard-title">Keterangan Tempat Tinggal</div>
                                        <div class="wizard-desc text-dark-50">data diisi sesuai KK</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 2 Nav-->
                            <!--begin::Wizard Step 3 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number">3</div>
                                    <div class="wizard-label">
                                        <div class="wizard-title">Riwayat Pendidikan Siswa</div>
                                        <div class="wizard-desc text-dark-50">data diisi sesuai ijazah MIN/SD</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 3 Nav-->
                            <!--begin::Wizard Step 4 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number">4</div>
                                    <div class="wizard-label">
                                        <div class="wizard-title">Identitas Orang Tua/Wali</div>
                                        <div class="wizard-desc text-dark-50">data diisi sesuai ijazah dan KK</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 4 Nav-->
                            <!--begin::Wizard Step 5 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number">5</div>
                                    <div class="wizard-label">
                                        <div class="wizard-title">Keterangan Bantuan Sosial</div>
                                        <div class="wizard-desc text-dark-50">data diisi sesuai kartu sosial</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 5 Nav-->
                            <!--begin::Wizard Step 6 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-number">6</div>
                                    <div class="wizard-label">
                                        <div class="wizard-title">Konfirmasi</div>
                                        <div class="wizard-desc">Periksa kembali data Anda</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 6 Nav-->
                        </div>
                    </div>
                    <!--end: Wizard Nav-->
                    <!--begin: Wizard Body-->
                    <div class="card card-custom card-shadowless rounded-top-0">
                        <div class="card-body p-0">
                            <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                <div class="col-xl-12 col-xxl-7">
                                    <!--begin: Wizard Form-->
                                    <?php echo form_open_multipart('daftarUlang/insertBiodata/' . $siswa['id_siswa']) ?>
                                    <form class="form mt-0 fv-plugins-bootstrap fv-plugins-framework" id="kt_form">
                                        <!--begin: Wizard Step 1-->
                                        <div data-wizard-type="step-content" data-wizard-state="current">
                                            <!--begin::Input-->
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Nama Lengkap</label>
                                                        <input type="text" class="form-control" name="nama_siswa" disabled="disabled" value="<?= $siswa['nama_siswa'] ?>" />
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>NISN</label>
                                                        <input type="text" class="form-control " disabled="disabled" name="nisn" value="<?= $siswa['nisn'] ?>" />
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Jenis Kelamin<?= ($siswa['jenis_kelamin'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                                                        <select class="form-control mb-3" name="jenis_kelamin" <?= $siswa['jenis_kelamin'] ?>>
                                                            <option value="">--Pilih--</option>
                                                            <option value="L" <?= $siswa['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                                            <option value="P" <?= $siswa['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                                        </select>
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('jenis_kelamin') ? $validation->getError('jenis_kelamin') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Tempat Lahir<?= ($siswa['tempat_lahir'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                                                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('tempat_lahir') ? $validation->getError('tempat_lahir') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
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
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-4">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
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
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-4">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
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
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <!--end::Input-->
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Agama </label>
                                                        <input type="text" class="form-control" name="agama" value="<?= $siswa['agama'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('agama') ? $validation->getError('agama') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>No. KTP/NIK</label>
                                                        <input type="text" class="form-control" name="no_ktp_siswa" value="<?= $siswa['no_ktp_siswa'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('no_ktp_siswa') ? $validation->getError('no_ktp_siswa') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Anak Ke</label>
                                                        <input type="text" class="form-control" name="anak_ke" value="<?= $siswa['anak_ke'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('anak_ke') ? $validation->getError('anak_ke') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Jumlah Saudara Kandung</label>
                                                        <input type="text" class="form-control" name="jml_saudara" value="<?= $siswa['jml_saudara'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('jml_saudara') ? $validation->getError('jml_saudara') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Status Yatim/Piatu/Yatim Piatu</label>
                                                        <input type="text" class="form-control" name="status" value="<?= $siswa['status'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('status') ? $validation->getError('status') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Golongan Darah</label>
                                                        <input type="text" class="form-control" name="gol_darah" value="<?= $siswa['gol_darah'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('gol_darah') ? $validation->getError('gol_darah') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Kegemaran</label>
                                                        <input type="text" class="form-control" name="kegemaran" value="<?= $siswa['kegemaran'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('kegemaran') ? $validation->getError('kegemaran') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Nomor Telepon (Peserta Didik)</label>
                                                        <input type="text" class="form-control" name="telepon_siswa" value="<?= $siswa['telepon_siswa'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('telepon_siswa') ? $validation->getError('telepon_siswa') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end: Wizard Step 1-->
                                        <!--begin: Wizard Step 2-->
                                        <div data-wizard-type="step-content">
                                            <!--begin::Input-->
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Desa/Gampong</label>
                                                        <input type="text" class="form-control" name="desa" value="<?= $siswa['desa'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('desa') ? $validation->getError('desa') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Kecamatan</label>
                                                        <input type="text" class="form-control " name="kecamatan" value="<?= $siswa['kecamatan'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('kecamatan') ? $validation->getError('kecamatan') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Kabupaten</label>
                                                        <input type="text" class="form-control" name="kabupaten" value="<?= $siswa['kabupaten'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('kabupaten') ? $validation->getError('kabupaten') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Provinsi</label>
                                                        <input type="text" class="form-control " name="provinsi" value="<?= $siswa['provinsi'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('provinsi') ? $validation->getError('provinsi') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Tinggal Dengan</label>
                                                        <input type="text" class="form-control" name="tinggal_dgn" value="<?= $siswa['tinggal_dgn'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('tinggal_dgn') ? $validation->getError('tinggal_dgn') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Jarak Tempat Tinggal Ke Sekolah</label>
                                                        <input type="text" class="form-control " name="jarak" value="<?= $siswa['jarak'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('jarak') ? $validation->getError('jarak') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end: Wizard Step 2-->
                                        <!--begin: Wizard Step 3-->
                                        <div data-wizard-type="step-content">
                                            <!--begin::Input-->
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Lulus Dari / Nama Sekolah</label>
                                                        <input type="text" class="form-control" name="sekolah_asal" value="<?= $siswa['sekolah_asal'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('sekolah_asal') ? $validation->getError('sekolah_asal') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Nomor STTB</label>
                                                        <input type="text" class="form-control " name="no_sttb" value="<?= $siswa['no_sttb'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('no_sttb') ? $validation->getError('no_sttb') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Lama Belajar</label>
                                                        <input type="text" class="form-control" name="lama_belajar" value="<?= $siswa['lama_belajar'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('lama_belajar') ? $validation->getError('lama_belajar') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Nomor Ujian Nasional</label>
                                                        <input type="text" class="form-control " name="no_un" value="<?= $siswa['no_un'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('no_un') ? $validation->getError('no_un') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end: Wizard Step 3-->
                                        <!--begin: Wizard Step 4-->
                                        <div data-wizard-type="step-content">
                                            <!--begin::Input-->
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Nama (Ayah)</label>
                                                        <input type="text" class="form-control" name="nama_ayah" value="<?= $siswa['nama_ayah'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('nama_ayah') ? $validation->getError('nama_ayah') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Tempat Lahir (Ayah)</label>
                                                        <input type="text" class="form-control" name="tempat_lahir_ayah" value="<?= $siswa['tempat_lahir_ayah'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('tempat_lahir_ayah') ? $validation->getError('tempat_lahir_ayah') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Tanggal Lahir (Ayah) <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="tanggal_ayah">
                                                            <option>--tanggal--</option>
                                                            <?php
                                                            for ($i = 1; $i <= 31; $i++) { ?>
                                                                <option value="<?= $i ?>"><?= $i ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('tanggal_ayah') ? $validation->getError('tanggal_ayah') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-4">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Bulan Lahir (Ayah) <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="bulan_ayah">
                                                            <option>--bulan--</option>
                                                            <?php
                                                            for ($i = 1; $i <= 12; $i++) { ?>
                                                                <option value="<?= $i ?>"><?= $i ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('bulan_ayah') ? $validation->getError('bulan_ayah') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-4">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Tahun Lahir (Ayah) <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="tahun_ayah">
                                                            <option>--tahun--</option>
                                                            <?php $now = date('Y');
                                                            for ($i = 2008; $i <= $now; $i++) { ?>
                                                                <option value="<?= $i ?>"><?= $i ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('tahun_ayah') ? $validation->getError('tahun_ayah') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Pendidikan (Ayah)</label>
                                                        <input type="text" class="form-control" name="pendidikan_ayah" value="<?= $siswa['pendidikan_ayah'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('pendidikan_ayah') ? $validation->getError('pendidikan_ayah') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Pekerjaan (Ayah)</label>
                                                        <input type="text" class="form-control" name="pekerjaan_ayah" value="<?= $siswa['pekerjaan_ayah'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('pekerjaan_ayah') ? $validation->getError('pekerjaan_ayah') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Penghasilan Perbulan (Ayah)</label>
                                                        <input type="text" class="form-control" name="penghasilan_ayah" value="<?= $siswa['penghasilan_ayah'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('penghasilan_ayah') ? $validation->getError('penghasilan_ayah') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Alamat Rumah (Ayah)</label>
                                                        <input type="text" class="form-control" name="alamat_ayah" value="<?= $siswa['alamat_ayah'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('alamat_ayah') ? $validation->getError('alamat_ayah') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>No. KK (Ayah)</label>
                                                        <input type="text" class="form-control" name="no_kk_ayah" value="<?= $siswa['no_kk_ayah'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('no_kk_ayah') ? $validation->getError('no_kk_ayah') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>No. KTP/NIK (Ayah)</label>
                                                        <input type="text" class="form-control" name="no_ktp_ayah" value="<?= $siswa['no_ktp_ayah'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('no_ktp_ayah') ? $validation->getError('no_ktp_ayah') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Nomor Telepon/HP (Ayah)</label>
                                                        <input type="text" class="form-control" name="no_hp_ayah" value="<?= $siswa['no_hp_ayah'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('no_hp_ayah') ? $validation->getError('no_hp_ayah') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Masih Hidup/Meninggal Dunia (Ayah)</label>
                                                        <input type="text" class="form-control" name="status_ayah" value="<?= $siswa['status_ayah'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('status_ayah') ? $validation->getError('status_ayah') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="separator separator-dashed my-5"></div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Nama (Ibu)</label>
                                                        <input type="text" class="form-control" name="nama_ibu" value="<?= $siswa['nama_ibu'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('nama_ibu') ? $validation->getError('nama_ibu') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Tempat Lahir (Ibu)</label>
                                                        <input type="text" class="form-control" name="tempat_lahir_ibu" value="<?= $siswa['tempat_lahir_ibu'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('tempat_lahir_ibu') ? $validation->getError('tempat_lahir_ibu') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Tanggal Lahir (Ibu) <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="tanggal_ibu">
                                                            <option>--tanggal--</option>
                                                            <?php
                                                            for ($i = 1; $i <= 31; $i++) { ?>
                                                                <option value="<?= $i ?>"><?= $i ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('tanggal_ibu') ? $validation->getError('tanggal_ibu') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-4">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Bulan Lahir (Ibu) <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="bulan_ibu">
                                                            <option>--bulan--</option>
                                                            <?php
                                                            for ($i = 1; $i <= 12; $i++) { ?>
                                                                <option value="<?= $i ?>"><?= $i ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('bulan_ibu') ? $validation->getError('bulan_ibu') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-4">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Tahun Lahir (Ibu) <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="tahun_ibu">
                                                            <option>--tahun--</option>
                                                            <?php $now = date('Y');
                                                            for ($i = 2008; $i <= $now; $i++) { ?>
                                                                <option value="<?= $i ?>"><?= $i ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('tahun_ibu') ? $validation->getError('tahun_ibu') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Pendidikan (Ibu)</label>
                                                        <input type="text" class="form-control" name="pendidikan_ibu" value="<?= $siswa['pendidikan_ibu'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('pendidikan_ibu') ? $validation->getError('pendidikan_ibu') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Pekerjaan (Ibu)</label>
                                                        <input type="text" class="form-control" name="pekerjaan_ibu" value="<?= $siswa['pekerjaan_ibu'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('pekerjaan_ibu') ? $validation->getError('pekerjaan_ibu') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Penghasilan Perbulan (Ibu)</label>
                                                        <input type="text" class="form-control" name="penghasilan_ibu" value="<?= $siswa['penghasilan_ibu'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('penghasilan_ibu') ? $validation->getError('penghasilan_ibu') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Alamat Rumah (Ibu)</label>
                                                        <input type="text" class="form-control" name="alamat_ibu" value="<?= $siswa['alamat_ibu'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('alamat_ibu') ? $validation->getError('alamat_ibu') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>No. KK (Ibu)</label>
                                                        <input type="text" class="form-control" name="no_kk_ibu" value="<?= $siswa['no_kk_ibu'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('no_kk_ibu') ? $validation->getError('no_kk_ibu') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>No. KTP/NIK (Ibu)</label>
                                                        <input type="text" class="form-control" name="no_ktp_ibu" value="<?= $siswa['no_ktp_ibu'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('no_ktp_ibu') ? $validation->getError('no_ktp_ibu') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Nomor Telepon/HP (Ibu)</label>
                                                        <input type="text" class="form-control" name="no_hp_ibu" value="<?= $siswa['no_hp_ibu'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('no_hp_ibu') ? $validation->getError('no_hp_ibu') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Masih Hidup/Meninggal Dunia (Ibu)</label>
                                                        <input type="text" class="form-control" name="status_ibu" value="<?= $siswa['status_ibu'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('status_ibu') ? $validation->getError('status_ibu') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end: Wizard Step 4-->
                                        <!--begin: Wizard Step 5-->
                                        <div data-wizard-type="step-content">
                                            <!--begin::Input-->
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Kartu yang dimiliki</label>
                                                        <input type="text" class="form-control" name="kartu_sosial" value="<?= $siswa['kartu_sosial'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('kartu_sosial') ? $validation->getError('kartu_sosial') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container has-success">
                                                        <label>Nomor Kartu</label>
                                                        <input type="text" class="form-control " name="no_kartu_sosial" value="<?= $siswa['no_kartu_sosial'] ?>" />
                                                        <p class="text-danger">
                                                            <?= $validation->hasError('no_kartu_sosial') ? $validation->getError('no_kartu_sosial') : ''; ?>
                                                        </p>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end: Wizard Step 5-->
                                        <!--begin: Wizard Step 6-->
                                        <div data-wizard-type="step-content">
                                            <!--begin::Section-->
                                            <h4 class="mb-10 font-weight-bold text-dark">Review your Details and Submit</h4>
                                            <h6 class="font-weight-bolder mb-3">Current Address:</h6>
                                            <div class="text-dark-50 line-height-lg">
                                                <div>Address Line 1</div>
                                                <div>Address Line 2</div>
                                                <div>Melbourne 3000, VIC, Australia</div>
                                            </div>
                                            <div class="separator separator-dashed my-5"></div>
                                            <!--end::Section-->
                                            <!--begin::Section-->
                                            <h6 class="font-weight-bolder mb-3">Delivery Details:</h6>
                                            <div class="text-dark-50 line-height-lg">
                                                <div>Package: Complete Workstation (Monitor, Computer, Keyboard &amp; Mouse)</div>
                                                <div>Weight: 25kg</div>
                                                <div>Dimensions: 110cm (w) x 90cm (h) x 150cm (L)</div>
                                            </div>
                                            <div class="separator separator-dashed my-5"></div>
                                            <!--end::Section-->
                                            <!--begin::Section-->
                                            <h6 class="font-weight-bolder mb-3">Delivery Service Type:</h6>
                                            <div class="text-dark-50 line-height-lg">
                                                <div>Overnight Delivery with Regular Packaging</div>
                                                <div>Preferred Morning (8:00AM - 11:00AM) Delivery</div>
                                            </div>
                                            <div class="separator separator-dashed my-5"></div>
                                            <!--end::Section-->
                                            <!--begin::Section-->
                                            <h6 class="font-weight-bolder mb-3">Delivery Address:</h6>
                                            <div class="text-dark-50 line-height-lg">
                                                <div>Address Line 1</div>
                                                <div>Address Line 2</div>
                                                <div>Preston 3072, VIC, Australia</div>
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end: Wizard Step 6-->
                                        <!--begin: Wizard Actions-->
                                        <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                            <div class="mr-2">
                                                <button type="button" class="btn btn-secondary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Sebelumnya</button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn bc-kemenag text-white font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Daftarkan</button>
                                                <button type="button" class="btn bc-kemenag text-white font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Selanjutnya</button>
                                            </div>
                                        </div>
                                        <!--end: Wizard Actions-->
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </form>
                                    <?php echo form_close() ?>
                                    <!--end: Wizard Form-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end: Wizard Bpdy-->
                </div>
            </div>
        </div>

        <!--end::Form-->


        <!--begin::Heading-->
    </div>


    <!--end::Card-->

    <?= $this->endSection(''); ?>