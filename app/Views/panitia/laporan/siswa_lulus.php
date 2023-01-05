<?= $this->extend('templates/pt_layout'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">

            <div class="card-title">
                <h3 class="card-label">Tabel Siswa Tidak Lulus
                    <span class="d-block text-muted pt-2 font-size-sm"> Penerimaan Peserta Didik Baru <?= date('Y'); ?> </span>
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <button type="button" class="btn btn-info font-weight-bolder mr-2">
                    <i class="flaticon2-printer"></i>
                    Print Data
                </button>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom nowrap" mode="datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pas Photo</th>
                        <th>No. Daftar</th>
                        <th>NISN</th>
                        <th>Nama Lengkap</th>
                        <th>Nilai Ujian</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($ppdb as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td class="symbol symbol-50 symbol-light mr-4">
                                <img src="<?= base_url('berkas/pas photo/' . $value['pas_photo']) ?>" alt="" class=" h-75 align-self-end">
                            </td>
                            <td><?= $value['no_pendaftaran'] ?></td>
                            <td><?= $value['nisn'] ?></td>
                            <td><?= $value['nama_siswa'] ?></td>
                            <td><?= $value['nilai_ujian'] ?></td>
                            <td class="dt-center">
                                <span class="label label-success label-pill label-inline mr-2">Lulus</span>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->

    <?= $this->endSection('content'); ?>