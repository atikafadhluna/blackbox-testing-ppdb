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
                    <h3 class="card-label">Edit Nilai
                        <span class="d-block text-muted pt-2 font-size-sm"> Penerimaan Peserta Didik Baru <?= date('Y'); ?> </span>
                    </h3>
                </div>
            </div>
            <form method="post" action="<?= site_url('Panitia/insertNilaiManual'); ?>" class="form-group">
                <div class="card-body">
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($nilaimanual as $key => $value) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['no_pendaftaran'] ?></td>
                                    <td><?= $value['nama_siswa'] ?></td>
                                    <td>
                                        <input type="hidden" name="id_siswa[]" value="<?= $value['id_siswa']; ?>">
                                        <input type="text" class="form-control" name="nilai_ujian[]" value="<?= $value['nilai_ujian'] ?>" />
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="nilai_praktik[]" value="<?= $value['nilai_praktik'] ?>" />
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="nilai_wawancara[]" value="<?= $value['nilai_wawancara'] ?>" />
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn bc-kemenag text-white font-weight-bold">Selesai</button>
                </div>
            </form>
        </div>
        <!--end::Card-->
    <?php } else { ?>

        <!--begin::Card-->

        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">Edit Nilai
                        <span class="d-block text-muted pt-2 font-size-sm"> Penerimaan Peserta Didik Baru <?= date('Y'); ?> </span>
                    </h3>
                </div>
            </div>
            <form method="post" action="<?= site_url('Panitia/insertNilai'); ?>" class="form-group">
                <div class="card-body">
                    <table class="table table-separate table-head-custom nowrap" mode="datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>No. Daftar</th>
                                <th>Nama Lengkap</th>
                                <th>Nilai Ujian</th>
                                <th>Nilai Praktik</th>
                                <th>Nilai Wawancara</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($ppdb as $key => $value) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['no_pendaftaran'] ?></td>
                                    <td><?= $value['nama_siswa'] ?></td>
                                    <td>
                                        <input type="hidden" name="siswa_id[]" value="<?= $value['siswa_id']; ?>">
                                        <input type="text" class="form-control" name="nilai[]" value="<?= $value['nilai'] ?>" />
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="nilai_praktik[]" value="<?= $value['nilai_praktik'] ?>" />
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="nilai_wawancara[]" value="<?= $value['nilai_wawancara'] ?>" />
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn bc-kemenag text-white font-weight-bold">Selesai</button>
                </div>
            </form>
        </div>
        <!--end::Card-->

    <?php } ?>

    <?= $this->endSection('content'); ?>

    <?= $this->section('script'); ?>
    <script>
        $("[mode='datatable']").DataTable({
            scrollX: true,

        })
    </script>
    <?= $this->endSection('script'); ?>