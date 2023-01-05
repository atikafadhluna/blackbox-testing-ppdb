<?php
$db = \Config\Database::connect();

$cs = $db->table('tbl_siswa')
    ->where('status_pendaftaran', '1')
    ->get()->getRowArray();
?>

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
    <?php if ($statusdaftarulang) : ?>
        <!--begin::Card-->
        <div class="card card-custom card-stretch">

            <!--begin::Header-->
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">Hi <?= session()->get('nama_siswa') ?></h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">Edit Biodata Anda Disini</span>
                </div>
                <?php if (isset($cs['status_pendaftaran'])) { ?>
                    <div class="card-toolbar">
                        <a href="<?= base_url('Siswa/kartuPendaftaran'); ?>">
                            <button type="button" class="btn bc-kemenag text-white mr-2">
                                Download Kartu Pendaftaran
                            </button>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form class="form">
                <!--begin::Body-->
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <!--begin::Card-->
                            <div class="card card-custom card-stretch card-border">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            <small class="text-dark font-weight-bolder font-size-h6">Pas Photo</small>
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <?php if ($siswa['pas_photo'] == null) { ?>
                                            <img class="img-fluid pad" src="<?= base_url('pas_photo/blank.png') ?>" width="200px" height="200px" id="gambar_load">
                                        <?php } else { ?>
                                            <img class="img-fluid pad" src="<?= base_url('pas_photo/' . $siswa['pas_photo']) ?>" width="200px" height="200px" id="gambar_load">
                                        <?php } ?>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-warning mr-2 text-center mt-10" data-toggle="modal" data-target="#editphoto<?= $siswa['id_siswa'] ?>">
                                            Edit Pas Photo
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>

                        <div class="col-lg-8">
                            <!--begin::Card-->
                            <div class="card card-custom card-stretch card-border">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            <small class="text-dark font-weight-bolder font-size-h6">Formulir</small>
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Tanggal Pendaftaran</label>
                                            <p class="text-dark-50"><?= date('d F Y', strtotime($siswa['tgl_pendaftaran'])) ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Nomor Pendaftaran</label>
                                            <p class="text-dark-50"><?= $siswa['no_pendaftaran'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">NISN</label>
                                            <p class="text-dark-50"><?= $siswa['nisn'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Nama Lengkap</label>
                                            <p class="text-dark-50"><?= $siswa['nama_siswa'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Jenis Kelamin</label>
                                            <?= ($siswa['jenis_kelamin'] == null) ? '<p class="text-danger">belum diisi</p>' : '<p class="text-dark-50">' . $siswa['jenis_kelamin'] . '</p>' ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Tempat Lahir</label>
                                            <?= ($siswa['tempat_lahir'] == null) ? '<p class="text-danger">belum diisi</p>' : '<p class="text-dark-50">' . $siswa['tempat_lahir'] . '</p>' ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Tanggal Lahir</label>
                                            <?= ($siswa['tgl_lahir'] == null) ? '<p class="text-danger">belum diisi</p>' : '<p class="text-dark-50">' . date('d F Y', strtotime($siswa['tgl_lahir'])) . '</p>' ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Alamat Rumah</label>
                                            <?= ($siswa['alamat_rumah'] == null) ? '<p class="text-danger">belum diisi</p>' : '<p class="text-dark-50">' . $siswa['alamat_rumah'] . '</p>' ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Nomor Telepon (Orang Tua)</label>
                                            <?= ($siswa['no_ortu'] == null) ? '<p class="text-danger">belum diisi</p>' : '<p class="text-dark-50">' . $siswa['no_ortu'] . '</p>' ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Nama Ayah</label>
                                            <?= ($siswa['nama_ayah'] == null) ? '<p class="text-danger">belum diisi</p>' : '<p class="text-dark-50">' . $siswa['nama_ayah'] . '</p>' ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Nama Ibu</label>
                                            <?= ($siswa['nama_ibu'] == null) ? '<p class="text-danger">belum diisi</p>' : '<p class="text-dark-50">' . $siswa['nama_ibu'] . '</p>' ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Nomor Telepon (Peserta Didik)</label>
                                            <?= ($siswa['telepon_siswa'] == null) ? '<p class="text-danger">belum diisi</p>' : '<p class="text-dark-50">' . $siswa['telepon_siswa'] . '</p>' ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">MIN / SD Asal</label>
                                            <?= ($siswa['sekolah_asal'] == null) ? '<p class="text-danger">belum diisi</p>' : '<p class="text-dark-50">' . $siswa['sekolah_asal'] . '</p>' ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </form>
            <!--end::Form-->
        </div>
    <?php else : ?>
        <div class="card card-custom card-stretch">

            <!--begin::Header-->
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">Hi <?= session()->get('nama_siswa') ?></h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">Edit Biodata Anda Disini</span>
                </div>
                <div class="card-toolbar">
                    <a href="<?= base_url('Siswa/editBiodata') ?>">
                        <button type="button" class="btn btn-warning mr-2">
                            Edit Biodata
                        </button>
                    </a>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form class="form">
                <!--begin::Body-->
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <!--begin::Card-->
                            <div class="card card-custom card-stretch card-border">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            <small class="text-dark font-weight-bolder font-size-h6">Pas Photo</small>
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <?php if ($siswa['pas_photo'] == null) { ?>
                                            <img class="img-fluid pad" src="<?= base_url('pas_photo/blank.png') ?>" width="200px" height="200px" id="gambar_load">
                                        <?php } else { ?>
                                            <img class="img-fluid pad" src="<?= base_url('pas_photo/' . $siswa['pas_photo']) ?>" width="200px" height="200px" id="gambar_load">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="pb-5 text-center">
                                    <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#editphoto<?= $siswa['id_siswa'] ?>">
                                        Edit Pas Photo
                                    </button>
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>

                        <div class="col-lg-8">
                            <!--begin::Card-->
                            <div class="card card-custom card-stretch card-border">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            <small class="text-dark font-weight-bolder font-size-h6">Pendaftaran</small>
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="font-weight-bolder">Tanggal Pendaftaran</label>
                                            <p class="text-dark-50"><?= date('d F Y', strtotime($siswa['tgl_pendaftaran'])) ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="font-weight-bolder">Nomor Pendaftaran</label>
                                            <p class="text-dark-50"><?= $siswa['no_pendaftaran'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <!--begin::Card-->
                            <div class="card card-custom card-stretch card-border">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            <small class="text-dark font-weight-bolder font-size-h6">Identitas Siswa</small>
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Nama Lengkap</label>
                                            <p class="text-dark-50"><?= $siswa['nama_siswa'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">NISN</label>
                                            <p class="text-dark-50"><?= $siswa['nisn'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Jenis Kelamin</label>
                                            <p class="text-dark-50"><?= $siswa['jenis_kelamin'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Tempat Lahir</label>
                                            <p class="text-dark-50"><?= $siswa['tempat_lahir'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Tanggal Lahir</label>
                                            <p class="text-dark-50"><?= date('d F Y', strtotime($siswa['tgl_lahir'])) ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Agama</label>
                                            <p class="text-dark-50"><?= $siswa['agama'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">No. KTP/NIK</label>
                                            <p class="text-dark-50"><?= $siswa['no_ktp_siswa'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Anak Ke</label>
                                            <p class="text-dark-50"><?= $siswa['anak_ke'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Jumlah Saudara Kandung</label>
                                            <p class="text-dark-50"><?= $siswa['jml_saudara'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Status Yatim/Piatu/Yatim Piatu</label>
                                            <p class="text-dark-50"><?= $siswa['status'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Golongan Darah</label>
                                            <p class="text-dark-50"><?= $siswa['gol_darah'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Kegemaran</label>
                                            <p class="text-dark-50"><?= $siswa['kegemaran'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder"> Nomor Telepon (Peserta Didik)</label>
                                            <p class="text-dark-50"><?= $siswa['telepon_siswa'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <!--begin::Card-->
                            <div class="card card-custom card-stretch card-border">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            <small class="text-dark font-weight-bolder font-size-h6">Keterangan Tempat Tinggal</small>
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Desa/Gampong</label>
                                            <p class="text-dark-50"><?= $siswa['desa'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Kecamatan</label>
                                            <p class="text-dark-50"><?= $siswa['kecamatan'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Kabupaten</label>
                                            <p class="text-dark-50"><?= $siswa['kabupaten'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Provinsi</label>
                                            <p class="text-dark-50"><?= $siswa['provinsi'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Tinggal Dengan</label>
                                            <p class="text-dark-50"><?= $siswa['tinggal_dgn'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Jarak Tempat Tinggal Ke Sekolah</label>
                                            <p class="text-dark-50"><?= $siswa['jarak'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <!--begin::Card-->
                            <div class="card card-custom card-stretch card-border">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            <small class="text-dark font-weight-bolder font-size-h6">Riwayat Pendidikan Siswa</small>
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <label class="font-weight-bolder">Lulus Dari / Nama Sekolah</label>
                                            <p class="text-dark-50"><?= $siswa['sekolah_asal'] ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="font-weight-bolder">Nomor STTB</label>
                                            <p class="text-dark-50"><?= $siswa['no_sttb'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <label class="font-weight-bolder">Lama Belajar</label>
                                            <p class="text-dark-50"><?= $siswa['lama_belajar'] ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="font-weight-bolder">Nomor Ujian Nasional</label>
                                            <p class="text-dark-50"><?= $siswa['no_un'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <!--begin::Card-->
                            <div class="card card-custom card-stretch card-border">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            <small class="text-dark font-weight-bolder font-size-h6">Identitas Orang Tua/Wali</small>
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Nama (Ayah)</label>
                                            <p class="text-dark-50"><?= $siswa['nama_ayah'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Tempat Lahir (Ayah)</label>
                                            <p class="text-dark-50"><?= $siswa['tempat_lahir_ayah'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Tanggal Lahir (Ayah)</label>
                                            <p class="text-dark-50"><?= date('d F Y', strtotime($siswa['tgl_lahir_ayah'])) ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Pendidikan (Ayah)</label>
                                            <p class="text-dark-50"><?= $siswa['pendidikan_ayah'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Pekerjaan (Ayah)</label>
                                            <p class="text-dark-50"><?= $siswa['pekerjaan_ayah'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Penghasilan Perbulan (Ayah)</label>
                                            <p class="text-dark-50"><?= $siswa['penghasilan_ayah'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Alamat Rumah (Ayah)</label>
                                            <p class="text-dark-50"><?= $siswa['alamat_ayah'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">No. KK (Ayah)</label>
                                            <p class="text-dark-50"><?= $siswa['no_kk_ayah'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">No. KTP/NIK (Ayah)</label>
                                            <p class="text-dark-50"><?= $siswa['no_ktp_ayah'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Nomor Telepon/HP (Ayah)</label>
                                            <p class="text-dark-50"><?= $siswa['no_hp_ayah'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Masih Hidup/Meninggal Dunia (Ayah)</label>
                                            <p class="text-dark-50"><?= $siswa['status_ayah'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Nama (Ibu)</label>
                                            <p class="text-dark-50"><?= $siswa['nama_ibu'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">
                                                Tempat Lahir (Ibu)</label>
                                            <p class="text-dark-50"><?= $siswa['tempat_lahir_ibu'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">
                                                Tanggal Lahir (Ibu)</label>
                                            <p class="text-dark-50"><?= date('d F Y', strtotime($siswa['tgl_lahir_ibu'])) ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Pendidikan (Ibu)</label>
                                            <p class="text-dark-50"><?= $siswa['pendidikan_ibu'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Pekerjaan (Ibu)
                                            </label>
                                            <p class="text-dark-50"><?= $siswa['pekerjaan_ibu'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Penghasilan Perbulan (Ibu)
                                            </label>
                                            <p class="text-dark-50"><?= $siswa['penghasilan_ibu'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Alamat Rumah (Ibu)</label>
                                            <p class="text-dark-50"><?= $siswa['alamat_ibu'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">No. KK (Ibu)
                                            </label>
                                            <p class="text-dark-50"><?= $siswa['no_kk_ibu'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">No. KTP/NIK (Ibu)
                                            </label>
                                            <p class="text-dark-50"><?= $siswa['no_ktp_ibu'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Nomor Telepon/HP (Ibu)</label>
                                            <p class="text-dark-50"><?= $siswa['no_hp_ibu'] ?></p>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="font-weight-bolder">Masih Hidup/Meninggal Dunia (Ibu)
                                            </label>
                                            <p class="text-dark-50"><?= $siswa['status_ibu'] ?></p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <!--begin::Card-->
                            <div class="card card-custom card-stretch card-border">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">
                                            <small class="text-dark font-weight-bolder font-size-h6">Keterangan Bantuan Sosial</small>
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <label class="font-weight-bolder">Kartu yang dimiliki</label>
                                            <p class="text-dark-50"><?= $siswa['kartu_sosial'] ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="font-weight-bolder">Nomor Kartu
                                            </label>
                                            <p class="text-dark-50"><?= $siswa['no_kartu_sosial'] ?></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </form>
            <!--end::Form-->
        </div>
    <?php endif; ?>

    <!-- Modal edit photo -->

    <div class="modal fade" id="editphoto<?= $siswa['id_siswa'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pas Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <?php echo form_open_multipart('Siswa/editphoto/' . $siswa['id_siswa']) ?>
                <!--begin::Form-->
                <form class="form-group">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="font-weight-bolder">Pas Photo(3X4) Latar Biru (png, jpeg, jpg)</label>
                            <?php if ($siswa['pas_photo'] == null) { ?>
                                <img class="img-thumbnail pt-10" src="<?= base_url('pas_photo/blank.png') ?>">
                            <?php } else { ?>
                                <img src="<?= base_url('pas_photo/' . $siswa['pas_photo']) ?>" alt="" class="img-thumbnail pt-10">
                            <?php } ?>
                            <input type="file" class="form-control mt-5" name="pas_photo" accept="image/*" />
                            <p class="text-danger">
                                <?= $validation->hasError('pas_photo') ? $validation->getError('pas_photo') : ''; ?>
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn bc-kemenag text-white font-weight-bold">Simpan</button>
                    </div>
                </form>
                <!--end::Form-->
                <?php echo form_close() ?>
            </div>
        </div>
    </div>

    <!-- Modal edit photo -->

    <?= $this->endSection(''); ?>