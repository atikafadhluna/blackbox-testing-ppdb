<?= $this->extend('templates/pt_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <?php

    if (session()->getFlashdata('lulus')) {
        echo '<div class="alert alert-custom alert-light-success fade show" role="alert">';
        echo '<div class="alert-text text-dark">';
        echo session()->getFlashdata('lulus');
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
    if (session()->getFlashdata('tlulus')) {
        echo '<div class="alert alert-custom alert-light-danger fade show" role="alert">';
        echo '<div class="alert-text text-dark">';
        echo session()->getFlashdata('tlulus');
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

    <?php if ($opsinilai == null) { ?>

        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Tabel Input Nilai Ujian
                        <span class="d-block text-muted pt-2 font-size-sm"> Penerimaan Peserta Didik Baru <?= date('Y'); ?> </span>
                    </h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="<?= base_url('Panitia/EditNilai'); ?>">
                        <button type="button" class="btn btn-warning btn-sm font-weight-bolder mr-2">
                            <i class=" fa far fa-edit"></i>
                            Edit
                        </button>
                    </a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-download text-white icon-md"></i>Unduh</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?= base_url('Panitia/cetaktemplate') ?>">
                                <i class="far fa-file-pdf text-danger icon-md pr-5"></i>
                                Template
                            </a>
                            <a class="dropdown-item" href="<?= base_url('Panitia/cetaknilai') ?>" target="_blank">
                                <i class="far fa-file-pdf text-danger icon-md pr-5"></i>
                                Hasil Ujian
                            </a>
                        </div>
                    </div>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('Panitia/KkmKelulusan') ?>
                <form>
                    <p>Kriteria Ketuntasan Minimal (KKM)</p>
                    <!-- form kkm -->
                    <div class="form-group row">
                        <div class="col-lg-8 mb-3">
                            <input type="number" class="form-control" name="kkm_kelulusan" value="<?= old('kkm_kelulusan', $kkm['kkm_kelulusan']) ?>" />
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label></label>
                            <button type="submit" class="btn bc-kemenag btn-md font-weight-bolder mr-2 text-white">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
                <?php echo form_close() ?>
                <!-- form kkm -->
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom nowrap" mode="datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>No. Daftar</th>
                            <th>Nama Lengkap</th>
                            <th>Nilai Ujian</th>
                            <th>Nilai Praktik</th>
                            <th>Nilai Wawancara</th>
                            <th>Nilai Akhir</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($nilaimanual as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['no_pendaftaran'] ?></td>
                                <td><?= $value['nama_siswa'] ?></td>
                                <td><?= $value['nilai_ujian'] ?></td>
                                <td><?= $value['nilai_praktik'] ?></td>
                                <td><?= $value['nilai_wawancara'] ?></td>
                                <td><?= $value['nilai_akhir'] ?></td>
                                <td class="dt-center">
                                    <?php if ($value['nilai_akhir'] >= $kkm['kkm_kelulusan']) { ?>
                                        <span class="label font-weight-bold label-lg label-light-success label-inline">lulus</span>
                                    <?php } else { ?>
                                        <span class="label font-weight-bold label-lg label-light-danger label-inline">tidak lulus</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    <?php } else { ?>
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Nilai Ujian
                        <span class="d-block text-muted pt-2 font-size-sm"> Penerimaan Peserta Didik Baru <?= date('Y'); ?> </span>
                    </h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="<?= base_url('Panitia/EditNilai'); ?>">
                        <button type="button" class="btn btn-warning btn-sm font-weight-bolder mr-2">
                            <i class=" fa far fa-edit"></i>
                            Edit
                        </button>
                    </a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <div class="btn-group">
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-download text-white icon-md"></i>Unduh</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?= base_url('Panitia/cetaktemplate') ?>">
                                <i class="far fa-file-pdf text-danger icon-md pr-5"></i>
                                Template
                            </a>
                            <a class="dropdown-item" href="<?= base_url('Panitia/cetaknilai') ?>" target="_blank">
                                <i class="far fa-file-pdf text-danger icon-md pr-5"></i>
                                Hasil Ujian
                            </a>
                        </div>
                    </div>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('Panitia/KkmKelulusan') ?>
                <form>
                    <p>Kriteria Ketuntasan Minimal (KKM)</p>
                    <!-- form kkm -->
                    <div class="form-group row">
                        <div class="col-lg-8 mb-3">
                            <input type="number" class="form-control" name="kkm_kelulusan" value="<?= old('kkm_kelulusan', $kkm['kkm_kelulusan']) ?>" />
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label></label>
                            <button type="submit" class="btn bc-kemenag btn-md font-weight-bolder mr-2 text-white">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
                <?php echo form_close() ?>
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom nowrap" mode="datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>No. Daftar</th>
                            <th>Nama Lengkap</th>
                            <th>Nilai Ujian</th>
                            <th>Nilai Praktik</th>
                            <th>Nilai Wawancara</th>
                            <th>Nilai Akhir</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($ppdb as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['no_pendaftaran'] ?></td>
                                <td><?= $value['nama_siswa'] ?></td>
                                <td><?= $value['nilai'] ?></td>
                                <td><?= $value['nilai_praktik'] ?></td>
                                <td><?= $value['nilai_wawancara'] ?></td>
                                <td><?= $value['nilai_akhir'] ?></td>
                                <td class="">
                                    <?php if ($value['nilai_akhir'] >= $kkm['kkm_kelulusan']) { ?>
                                        <span class="label font-weight-bold label-lg label-light-success label-inline">lulus</span>
                                    <?php } else { ?>
                                        <span class="label font-weight-bold label-lg label-light-danger label-inline">tidak lulus</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    <?php } ?>


    <!-- Modal input nilai ujian -->



    <!-- Modal input nilai ujian -->

    <?= $this->endSection('content'); ?>

    <?= $this->section('script'); ?>
    <script>
        $("[mode='datatable']").DataTable({
            scrollX: true,

        })
    </script>
    <?= $this->endSection('script'); ?>