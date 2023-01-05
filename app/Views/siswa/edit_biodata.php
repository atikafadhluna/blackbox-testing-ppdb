<?= $this->extend('templates/cs_layout'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <?php
    if (session()->getFlashdata('add')) {
        echo '<div class="alert alert-custom alert-light-success fade show" role="alert">';
        echo '<div class="alert-text text-dark">';
        echo session()->getFlashdata('add');
        echo '</div>';
        echo '<div class="alert-close icon-dark">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true"><i class="ki ki-close"></i>';
        echo '</span>';
        echo '</button>';
        echo '</div>';
        echo '</div>';
    }

    if (session()->getFlashdata('edit')) {
        echo '<div class="alert alert-custom alert-light-warning fade show" role="alert">';
        echo '<div class="alert-text text-dark">';
        echo session()->getFlashdata('edit');
        echo '</div>';
        echo '<div class="alert-close icon-dark">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true"><i class="ki ki-close"></i>';
        echo '</span>';
        echo '</button>';
        echo '</div>';
        echo '</div>';
    }

    if (session()->getFlashdata('delete')) {
        echo '<div class="alert alert-custom alert-light-danger fade show" role="alert">';
        echo '<div class="alert-text text-dark">';
        echo session()->getFlashdata('delete');
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
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header" style=" background-color: #307F44;">
            <h3 class="card-title text-white">Edit Biodata</h3>
        </div>
        <!--begin::Form-->
        <div class="card-body">
            <?php $validation = \Config\Services::validation(); ?>
            <?php echo form_open('Siswa/editData/' . $siswa['id_siswa']) ?>
            <form class="form-grup p-3">
                <div class="form-group row">
                    <div class="col-6">
                        <span class="label font-weight-bold label-lg label-info label-inline">Pendaftaran</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6 mb-2">
                        <label>Tanggal Pendaftaran</label>
                        <input type="text" class="form-control" disabled name="tgl_pendaftaran" value="<?= $siswa['tgl_pendaftaran'] ?>" />
                    </div>
                    <div class="col-lg-6 mb-2">
                        <label>Nomor Pendaftaran</label>
                        <input type="text" class="form-control" disabled name="no_pendaftaran" value="<?= $siswa['no_pendaftaran'] ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <span class="label font-weight-bold label-lg label-info label-inline">Identitas Siswa</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6 mb-2">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_siswa" disabled="disabled" value="<?= $siswa['nama_siswa'] ?>" />
                    </div>
                    <div class="col-lg-6 mb-2">
                        <label>NISN</label>
                        <input type="text" class="form-control " disabled="disabled" name="nisn" value="<?= $siswa['nisn'] ?>" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6 mb-2">
                        <label>Jenis Kelamin<?= ($siswa['jenis_kelamin'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <select class="form-control mb-3" name="jenis_kelamin" <?= $siswa['jenis_kelamin'] ?>>
                            <option value="" disabled selected>--Pilih--</option>
                            <option value="laki-laki" <?= $siswa['jenis_kelamin'] == 'laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="perempuan" <?= $siswa['jenis_kelamin'] == 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                        <p class="text-danger">
                            <?= $validation->hasError('jenis_kelamin') ? $validation->getError('jenis_kelamin') : ''; ?>
                        </p>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <label>Tempat Lahir<?= ($siswa['tempat_lahir'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>" />
                        <p class="text-danger">
                            <?= $validation->hasError('tempat_lahir') ? $validation->getError('tempat_lahir') : ''; ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Tanggal Lahir<?= ($siswa['tgl_lahir'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="date" class="form-control <?= $validation->hasError('tgl_lahir') ? 'is-invalid' : null ?> input-group date" name="tgl_lahir" value="<?= old('tgl_lahir', $siswa['tgl_lahir']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('tgl_lahir') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Agama<?= ($siswa['agama'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <select class="form-control <?= $validation->hasError('agama') ? 'is-invalid' : null ?> mb-3" name="agama">
                            <option value="" disabled selected>--Pilih--</option>
                            <?php foreach ($agama as $key => $value) { ?>
                                <option value="<?= $value['agama'] ?>" <?= old('agama', $siswa['agama']) == $value['agama'] ? 'selected' : '' ?>><?= $value['agama'] ?></option>
                            <?php } ?>
                        </select>
                        <p class="invalid-feedback">
                            <?= $validation->getError('agama') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>No. KTP/NIK<?= ($siswa['no_ktp_siswa'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('no_ktp_siswa') ? 'is-invalid' : null ?>" name="no_ktp_siswa" value="<?= old('no_ktp_siswa', $siswa['no_ktp_siswa']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('no_ktp_siswa') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Anak Ke<?= ($siswa['anak_ke'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('anak_ke') ? 'is-invalid' : null ?>" name="anak_ke" value="<?= old('anak_ke', $siswa['anak_ke']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('anak_ke') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Jumlah Saudara Kandung<?= ($siswa['jml_saudara'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('jml_saudara') ? 'is-invalid' : null ?>" name="jml_saudara" value="<?= old('jml_saudara', $siswa['jml_saudara']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('jml_saudara') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Status<?= ($siswa['status'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <select class="form-control <?= $validation->hasError('status') ? 'is-invalid' : null ?> mb-3" name="status">
                            <option value="" disabled selected>--Pilih--</option>
                            <option value="Yatim" <?= old('status', $siswa['status']) == 'Yatim' ? 'selected' : '' ?>>Yatim</option>
                            <option value="Piatu" <?= old('status', $siswa['status']) == 'Piatu' ? 'selected' : '' ?>>Piatu</option>
                            <option value="Yatim Piatu" <?= old('status', $siswa['status']) == 'Yatim Piatu' ? 'selected' : '' ?>>Yatim Piatu</option>
                        </select>
                        <p class="invalid-feedback">
                            <?= $validation->getError('status') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Golongan Darah<?= ($siswa['gol_darah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <select class="form-control <?= $validation->hasError('gol_darah') ? 'is-invalid' : null ?> mb-3" name="gol_darah">
                            <option value="" disabled selected>--Pilih--</option>
                            <option value=" A" <?= old('gol_darah', $siswa['gol_darah']) == 'A' ? 'selected' : '' ?>>A</option>
                            <option value="AB" <?= old('gol_darah', $siswa['gol_darah']) == 'AB' ? 'selected' : '' ?>>AB</option>
                            <option value="B" <?= old('gol_darah', $siswa['gol_darah']) == 'B' ? 'selected' : '' ?>>B</option>
                            <option value="O" <?= old('gol_darah', $siswa['gol_darah']) == 'O' ? 'selected' : '' ?>>O</option>
                        </select>
                        <p class="invalid-feedback">
                            <?= $validation->getError('gol_darah') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Kegemaran<?= ($siswa['kegemaran'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <select class="form-control <?= $validation->hasError('kegemaran') ? 'is-invalid' : null ?> mb-3" name="kegemaran">
                            <option value="" disabled selected>--Pilih--</option>
                            <?php foreach ($kegemaran as $key => $value) { ?>
                                <option value="<?= $value['kegemaran'] ?>" <?= old('kegemaran', $siswa['kegemaran']) == $value['kegemaran'] ? 'selected' : '' ?>><?= $value['kegemaran'] ?></option>
                            <?php } ?>
                        </select>
                        <p class="invalid-feedback">
                            <?= $validation->getError('kegemaran') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>Nomor Telepon (Peserta Didik)<?= ($siswa['telepon_siswa'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('telepon_siswa') ? 'is-invalid' : null ?>" name="telepon_siswa" value="<?= old('telepon_siswa', $siswa['telepon_siswa']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('telepon_siswa') ?>
                        </p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-6">
                        <span class="label font-weight-bold label-lg label-info label-inline">Keterangan Tempat Tinggal</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Desa/Gampong<?= ($siswa['desa'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('desa') ? 'is-invalid' : null ?> " name="desa" value="<?= old('desa', $siswa['desa']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('desa') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Kecamatan<?= ($siswa['kecamatan'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('kecamatan') ? 'is-invalid' : null ?> " name="kecamatan" value="<?= old('kecamatan', $siswa['kecamatan']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('kecamatan') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Kabupaten<?= ($siswa['kabupaten'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('kabupaten') ? 'is-invalid' : null ?>" name="kabupaten" value="<?= old('kabupaten', $siswa['kabupaten']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('kabupaten') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Provinsi<?= ($siswa['provinsi'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('provinsi') ? 'is-invalid' : null ?> " name="provinsi" value="<?= old('provinsi', $siswa['provinsi']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('provinsi') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Tinggal Dengan<?= ($siswa['tinggal_dgn'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('tinggal_dgn') ? 'is-invalid' : null ?>" name="tinggal_dgn" value="<?= old('tinggal_dgn', $siswa['tinggal_dgn']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('tinggal_dgn') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Jarak Tempat Tinggal Ke Sekolah<?= ($siswa['jarak'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('jarak') ? 'is-invalid' : null ?> " name="jarak" value="<?= old('jarak', $siswa['jarak']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('jarak') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <span class="label font-weight-bold label-lg label-info label-inline">Riwayat Pendidikan Siswa</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Lulus Dari / Nama Sekolah<?= ($siswa['sekolah_asal'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('sekolah_asal') ? 'is-invalid' : null ?>" name="sekolah_asal" value="<?= old('sekolah_asal', $siswa['sekolah_asal']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('sekolah_asal') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Nomor STTB<?= ($siswa['no_sttb'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('no_sttb') ? 'is-invalid' : null ?> " name="no_sttb" value="<?= old('no_sttb', $siswa['no_sttb']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('no_sttb') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Lama Belajar<?= ($siswa['lama_belajar'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('lama_belajar') ? 'is-invalid' : null ?>" name="lama_belajar" value="<?= old('lama_belajar', $siswa['lama_belajar']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('lama_belajar') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Nomor Ujian Nasional<?= ($siswa['no_un'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('no_un') ? 'is-invalid' : null ?> " name="no_un" value="<?= old('no_un', $siswa['no_un']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('no_un') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <span class="label font-weight-bold label-lg label-info label-inline">Identitas (Ayah)</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Nama (Ayah)<?= ($siswa['nama_ayah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('nama_ayah') ? 'is-invalid' : null ?>" name="nama_ayah" value="<?= old('nama_ayah', $siswa['nama_ayah']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('nama_ayah') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Tempat Lahir (Ayah)<?= ($siswa['tempat_lahir_ayah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('tempat_lahir_ayah') ? 'is-invalid' : null ?>" name="tempat_lahir_ayah" value="<?= old('tempat_lahir_ayah', $siswa['tempat_lahir_ayah']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('tempat_lahir_ayah') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Tanggal Lahir<?= ($siswa['tgl_lahir_ayah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="date" class="form-control <?= $validation->hasError('tgl_lahir_ayah') ? 'is-invalid' : null ?> input-group date" name="tgl_lahir_ayah" value="<?= old('tgl_lahir_ayah', $siswa['tgl_lahir_ayah']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('tgl_lahir_ayah') ?>
                        </p>
                    </div>
                    <div class="col-lg-6 mb-2">
                        <label>Pendidikan (Ayah)<?= ($siswa['pendidikan_ayah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <select class="form-control <?= $validation->hasError('pendidikan_ayah') ? 'is-invalid' : null ?> mb-3" name="pendidikan_ayah">
                            <option value="" disabled selected>--Pilih--</option>
                            <?php foreach ($pendidikan as $key => $value) { ?>
                                <option value="<?= $value['pendidikan'] ?>" <?= old('pendidikan_ayah', $siswa['pendidikan_ayah']) == $value['pendidikan'] ? 'selected' : '' ?>><?= $value['pendidikan'] ?></option>
                            <?php } ?>
                        </select>
                        <p class="invalid-feedback">
                            <?= $validation->getError('pendidikan_ayah') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Pekerjaan (Ayah)<?= ($siswa['pekerjaan_ayah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <select class="form-control <?= $validation->hasError('pekerjaan_ayah') ? 'is-invalid' : null ?> mb-3" name="pekerjaan_ayah">
                            <option value="" disabled selected>--Pilih--</option>
                            <?php foreach ($pekerjaan as $key => $value) { ?>
                                <option value="<?= $value['pekerjaan'] ?>" <?= old('pekerjaan_ayah', $siswa['pekerjaan_ayah']) == $value['pekerjaan'] ? 'selected' : '' ?>><?= $value['pekerjaan'] ?></option>
                            <?php } ?>
                        </select>
                        <p class="invalid-feedback">
                            <?= $validation->getError('pekerjaan_ayah') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Penghasilan Perbulan (Ayah)<?= ($siswa['penghasilan_ayah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <select class="form-control <?= $validation->hasError('penghasilan_ayah') ? 'is-invalid' : null ?> mb-3" name="penghasilan_ayah">
                            <option value="" disabled selected>--Pilih--</option>
                            <?php foreach ($penghasilan as $key => $value) { ?>
                                <option value="<?= $value['penghasilan'] ?>" <?= old('penghasilan_ayah', $siswa['penghasilan_ayah']) == $value['penghasilan'] ? 'selected' : '' ?>><?= $value['penghasilan'] ?></option>
                            <?php } ?>
                        </select>
                        <p class="invalid-feedback">
                            <?= $validation->getError('penghasilan_ayah') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Alamat Rumah (Ayah)<?= ($siswa['alamat_ayah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('alamat_ayah') ? 'is-invalid' : null ?>" name="alamat_ayah" value="<?= old('alamat_ayah', $siswa['alamat_ayah']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('alamat_ayah') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>No. KK (Ayah)<?= ($siswa['no_kk_ayah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('no_kk_ayah') ? 'is-invalid' : null ?>" name="no_kk_ayah" value="<?= old('no_kk_ayah', $siswa['no_kk_ayah']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('no_kk_ayah') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>No. KTP/NIK (Ayah)<?= ($siswa['no_ktp_ayah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('no_ktp_ayah') ? 'is-invalid' : null ?>" name="no_ktp_ayah" value="<?= old('no_ktp_ayah', $siswa['no_ktp_ayah']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('no_ktp_ayah') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Nomor Telepon/HP (Ayah)<?= ($siswa['no_hp_ayah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('no_hp_ayah') ? 'is-invalid' : null ?>" name="no_hp_ayah" value="<?= old('no_hp_ayah', $siswa['no_hp_ayah']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('no_hp_ayah') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>Status (Ayah)<?= ($siswa['status_ayah'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <select class="form-control <?= $validation->hasError('status_ayah') ? 'is-invalid' : null ?> mb-3" name="status_ayah">
                            <option value="" disabled selected>--Pilih--</option>
                            <option value="Masih Hidup" <?= old('status_ayah', $siswa['status_ayah']) == 'Masih Hidup' ? 'selected' : '' ?>>Masih Hidup</option>
                            <option value="Sudah Meninggal" <?= old('status_ayah', $siswa['status_ayah']) == 'Sudah Meninggal' ? 'selected' : '' ?>>Sudah Meninggal</option>
                            <option value="Tidak Diketahui" <?= old('status_ayah', $siswa['status_ayah']) == 'Tidak Diketahui' ? 'selected' : '' ?>>Tidak Diketahui</option>
                        </select>
                        <p class="invalid-feedback">
                            <?= $validation->getError('status_ayah') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <span class="label font-weight-bold label-lg label-info label-inline">Identitas (Ayah)</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Nama (Ibu)<?= ($siswa['nama_ibu'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('nama_ibu') ? 'is-invalid' : null ?>" name="nama_ibu" value="<?= old('nama_ibu', $siswa['nama_ibu']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('nama_ibu') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Tempat Lahir (Ibu)<?= ($siswa['tempat_lahir_ibu'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('tempat_lahir_ibu') ? 'is-invalid' : null ?>" name="tempat_lahir_ibu" value="<?= old('tempat_lahir_ibu', $siswa['tempat_lahir_ibu']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('tempat_lahir_ibu') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Tanggal Lahir<?= ($siswa['tgl_lahir_ibu'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="date" class="form-control <?= $validation->hasError('tgl_lahir_ibu') ? 'is-invalid' : null ?> input-group date" name="tgl_lahir_ibu" value="<?= old('tgl_lahir_ibu', $siswa['tgl_lahir_ibu']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('tgl_lahir_ibu') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Pendidikan (Ibu)<?= ($siswa['pendidikan_ibu'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <select class="form-control <?= $validation->hasError('pendidikan_ibu') ? 'is-invalid' : null ?> mb-3" name="pendidikan_ibu">
                            <option value="" disabled selected>--Pilih--</option>
                            <?php foreach ($pendidikan as $key => $value) { ?>
                                <option value="<?= $value['pendidikan'] ?>" <?= old('pendidikan_ibu', $siswa['pendidikan_ibu']) == $value['pendidikan'] ? 'selected' : '' ?>><?= $value['pendidikan'] ?></option>
                            <?php } ?>
                        </select>
                        <p class="invalid-feedback">
                            <?= $validation->getError('pendidikan_ibu') ?>
                        </p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Pekerjaan (Ibu)<?= ($siswa['pekerjaan_ibu'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <select class="form-control <?= $validation->hasError('pekerjaan_ibu') ? 'is-invalid' : null ?> mb-3" name="pekerjaan_ibu">
                            <option value="" disabled selected>--Pilih--</option>
                            <?php foreach ($pekerjaan as $key => $value) { ?>
                                <option value="<?= $value['pekerjaan'] ?>" <?= old('pekerjaan_ibu', $siswa['pekerjaan_ibu']) == $value['pekerjaan'] ? 'selected' : '' ?>><?= $value['pekerjaan'] ?></option>
                            <?php } ?>
                        </select>
                        <p class="invalid-feedback">
                            <?= $validation->getError('pekerjaan_ibu') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Penghasilan Perbulan (Ibu)<?= ($siswa['penghasilan_ibu'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <select class="form-control <?= $validation->hasError('penghasilan_ibu') ? 'is-invalid' : null ?> mb-3" name="penghasilan_ibu">
                            <option value="" disabled selected>--Pilih--</option>
                            <?php foreach ($penghasilan as $key => $value) { ?>
                                <option value="<?= $value['penghasilan'] ?>" <?= old('penghasilan_ibu', $siswa['penghasilan_ibu']) == $value['penghasilan'] ? 'selected' : '' ?>><?= $value['penghasilan'] ?></option>
                            <?php } ?>
                        </select>
                        <p class="invalid-feedback">
                            <?= $validation->getError('penghasilan_ibu') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Alamat Rumah (Ibu)<?= ($siswa['alamat_ibu'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('alamat_ibu') ? 'is-invalid' : null ?>" name="alamat_ibu" value="<?= old('alamat_ibu', $siswa['alamat_ibu']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('alamat_ibu') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>No. KK (Ibu)<?= ($siswa['no_kk_ibu'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('no_kk_ibu') ? 'is-invalid' : null ?>" name="no_kk_ibu" value="<?= old('no_kk_ibu', $siswa['no_kk_ibu']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('no_kk_ibu') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>No. KTP/NIK (Ibu)<?= ($siswa['no_ktp_ibu'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('no_ktp_ibu') ? 'is-invalid' : null ?>" name="no_ktp_ibu" value="<?= old('no_ktp_ibu', $siswa['no_ktp_ibu']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('no_ktp_ibu') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Nomor Telepon/HP (Ibu)<?= ($siswa['no_hp_ibu'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('no_hp_ibu') ? 'is-invalid' : null ?>" name="no_hp_ibu" value="<?= old('no_hp_ibu', $siswa['no_hp_ibu']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('no_hp_ibu') ?>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>Status (Ibu)<?= ($siswa['status_ibu'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <select class="form-control <?= $validation->hasError('status_ibu') ? 'is-invalid' : null ?> mb-3" name="status_ibu">
                            <option value="" disabled selected>--Pilih--</option>
                            <option value="Masih Hidup" <?= old('status_ibu', $siswa['status_ibu']) == 'Masih Hidup' ? 'selected' : '' ?>>Masih Hidup</option>
                            <option value="Sudah Meninggal" <?= old('status_ibu', $siswa['status_ibu']) == 'Sudah Meninggal' ? 'selected' : '' ?>>Sudah Meninggal</option>
                            <option value="Tidak Diketahui" <?= old('status_ibu', $siswa['status_ibu']) == 'Tidak Diketahui' ? 'selected' : '' ?>>Tidak Diketahui</option>
                        </select>
                        <p class="invalid-feedback">
                            <?= $validation->getError('status_ibu') ?>
                        </p>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <span class="label font-weight-bold label-lg label-info label-inline">Keterangan Bantuan Sosial</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Kartu yang dimiliki<?= ($siswa['kartu_sosial'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('kartu_sosial') ? 'is-invalid' : null ?>" name="kartu_sosial" value="<?= old('kartu_sosial', $siswa['kartu_sosial']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('kartu_sosial') ?>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <label>Nomor Kartu<?= ($siswa['no_kartu_sosial'] == null) ? '<span class="text-danger">*</span>' : '' ?></label>
                        <input type="text" class="form-control <?= $validation->hasError('no_kartu_sosial') ? 'is-invalid' : null ?> " name="no_kartu_sosial" value="<?= old('no_kartu_sosial', $siswa['no_kartu_sosial']) ?>" />
                        <p class="invalid-feedback">
                            <?= $validation->getError('no_kartu_sosial') ?>
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('Siswa/biodata') ?>">
                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Kembali</button>
                    </a>
                    <button type="submit" class="btn bc-kemenag text-white font-weight-bold">Simpan</button>
                </div>
            </form>
            <?php echo form_close() ?>
        </div>

        <!--end::Form-->
    </div>

    <div class="modal fade" id="edit<?= $siswa['id_siswa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data <strong><?= $siswa['nama_siswa'] ?></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <!--Begin::Body-->

                    <!--end::Body-->
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(''); ?>