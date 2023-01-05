<?= $this->extend('templates/adm_layout'); ?>

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

    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Tabel Tahun Ajaran
                    <span class="d-block text-muted pt-2 font-size-sm"> Penerimaan Peserta Didik Baru MTsN 4 Aceh Besar </span>
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <button type="button" class="btn bc-kemenag text-white font-weight-bolder mr-2" data-toggle="modal" data-target="#tambah">
                    <i class="fa fas fa-plus text-white"></i>
                    Tambah
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
                        <th>Tahun</th>
                        <th>Tahun Ajaran</th>
                        <th>Kuota</th>
                        <th>Status</th>
                        <th>Aktif/Non Aktif</th>
                        <th data-autohide-disabled="false" class="datatable-cell datatable-cell-sort"><span style="width: 125px;">Action</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($ta as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['tahun'] ?></td>
                            <td><?= $value['ta'] ?></td>
                            <td><?= $value['kuota'] ?></td>
                            <td><?= ($value['status'] == 1) ? '<span class="label font-weight-bold label-lg label-light-success label-inline">Aktif</span>' : '<span class="label font-weight-bold label-lg label-light-danger label-inline">Tidak Aktif</span>' ?></td>
                            <td>
                                <?php if ($value['status'] == 1) { ?>
                                    <a href="<?= base_url('tahunajaran/statusNonaktif/' . $value['id_ta']) ?>" class="btn btn-danger btn-sm">
                                        Nonaktifkan
                                    </a>
                                <?php } else { ?>
                                    <a href="<?= base_url('tahunajaran/statusAktif/' . $value['id_ta']) ?>" class="btn btn-success btn-sm">
                                        Aktifkan
                                    </a>
                                <?php } ?>
                            </td>
                            <td data-autohide-disabled="false" aria-label="null" class="datatable-cell">
                                <span style="overflow: visible; position: relative; width: 125px;">
                                    <button type="button" class="btn btn-sm btn-light-warning btn-text-white btn-icon mr-2 " data-toggle="modal" data-target="#edit<?= $value['id_ta'] ?>">
                                        <i class="fa far fa-edit" mr-2=""></i>
                                    </button>

                                    <a href="javascript:;">
                                        <button type="button" class="btn btn-sm btn-light-danger btn-text-white btn-icon mr-2" data-toggle="modal" data-target="#delete<?= $value['id_ta'] ?>">
                                            <i class="fa fas fa-trash" mr-2=""></i>
                                        </button>
                                    </a>
                                </span>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->


    <!-- Modal Tambah ta -->

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Tahun Ajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <?php echo form_open('tahunajaran/insertData') ?>
                <!--begin::Form-->
                <form class="form-group">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="mb-3">
                                <label>Tahun</label>
                                <select class="form-control" name="tahun">
                                    <?php $now = date('Y');
                                    for ($i = 2019; $i <= $now; $i++) { ?>
                                        <option value="<?= $i ?>" <?= ($now == $i) ? 'selected' : '' ?>><?= $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3 row">
                                <div class="col">
                                    <label>Tahun Ajaran</label>
                                    <input type="text" class="form-control" name="ta" required />
                                </div>
                                <div class="col">
                                    <label>Kuota Peserta</label>
                                    <input type="text" class="form-control" name="kuota" required />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col">
                                    <label>Tanggal Selesai Pendaftaran</label>
                                    <div class="input-group date">
                                        <input type="date" class="form-control text-dark-50" name="tanggal_mulai_pendaftaran" required />

                                    </div>
                                </div>
                                <div class="col">
                                    <label>Tanggal Selesai Pendaftaran</label>
                                    <div class="input-group date">
                                        <input type="date" class="form-control text-dark-50" name="tanggal_selesai_pendaftaran" required />

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label>Tanggal Pengumuman</label>
                                    <div class="input-group date">
                                        <input type="date" class="form-control text-dark-50" name="tanggal_pengumuman" required />

                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col">
                                    <label>Tanggal Mulai Daftar Ulang</label>
                                    <div class="input-group date">
                                        <input type="date" class="form-control text-dark-50" name="tanggal_mulai_daftar_ulang" required />

                                    </div>
                                </div>
                                <div class="col">
                                    <label>Tanggal Selesai Daftar Ulang</label>
                                    <div class="input-group date">
                                        <input type="date" class="form-control text-dark-50" name="tanggal_selesai_daftar_ulang" required />

                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn bc-kemenag text-white font-weight-bold">Simpan</button>
                    </div>
                </form>
                <!--end::Form-->


                <?php echo form_close() ?>
            </div>
        </div>
    </div>

    <!-- Modal Tambah ta -->

    <!-- Modal Edit ta -->
    <?php foreach ($ta as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value['id_ta'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Tahun Ajaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <?php echo form_open('tahunajaran/editData/' . $value['id_ta']) ?>
                    <!--begin::Form-->
                    <form class="form-group">
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label>Tahun</label>
                                    <select class="form-control" name="tahun">
                                        <?php $now = date('Y');
                                        for ($i = 2022; $i <= $now; $i++) { ?>
                                            <option value="<?= $i ?>" <?= ($i == $value['tahun']) ? 'selected' : '' ?>><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col">
                                        <label>Tahun Ajaran</label>
                                        <input type="text" class="form-control" value="<?= $value['ta'] ?>" name="ta" required />
                                    </div>
                                    <div class="col">
                                        <label>Kuota Peserta</label>
                                        <input type="text" class="form-control" name="kuota" value="<?= $value['kuota'] ?>" required />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col">
                                        <label>Tanggal Mulai Pendaftaran</label>
                                        <div class="input-group date">
                                            <input type="date" class="form-control" value="<?= $value['tanggal_mulai_pendaftaran'] ?>" name="tanggal_mulai_pendaftaran" required />

                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Tanggal Selesai Pendaftaran</label>
                                        <div class="input-group date">
                                            <input type="date" class="form-control" name="tanggal_selesai_pendaftaran" value="<?= $value['tanggal_selesai_pendaftaran'] ?>" required />

                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label>Tanggal Pengumuman</label>
                                        <div class="input-group date">
                                            <input type="date" class="form-control" name="tanggal_pengumuman" value="<?= $value['tanggal_pengumuman'] ?>" required />

                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col">
                                        <label>Tanggal Mulai Daftar Ulang</label>
                                        <div class="input-group date">
                                            <input type="date" class="form-control" name="tanggal_mulai_daftar_ulang" value="<?= $value['tanggal_mulai_daftar_ulang'] ?>" required />

                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Tanggal Selesai Daftar Ulang</label>
                                        <div class="input-group date">
                                            <input type="date" class="form-control" name="tanggal_selesai_daftar_ulang" value="<?= $value['tanggal_selesai_daftar_ulang'] ?>" required />

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn bc-kemenag text-white font-weight-bold">Simpan</button>
                        </div>
                    </form>
                    <!--end::Form-->
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Modal Edit ta -->

    <!-- Modal delete ta -->
    <?php foreach ($ta as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_ta'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Tahun Ajaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            Apakah Anda Ingin Menghapus <b><?= $value['ta'] ?></b> ?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Tutup</button>
                        <a class="btn btn-danger font-weight-bold" href="<?= base_url('tahunajaran/deleteData/' . $value['id_ta']) ?>">Hapus</a>
                    </div>
                    <!--end::Form-->


                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Modal delete ta -->

    <?= $this->endSection('content'); ?>

    <?= $this->section('script'); ?>
    <script>
        $("[mode='datatable']").DataTable({
            scrollX: true,

        })
    </script>
    <?= $this->endSection('script'); ?>