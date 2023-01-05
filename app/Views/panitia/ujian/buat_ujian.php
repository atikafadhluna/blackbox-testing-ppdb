<?= $this->extend('templates/pt_layout'); ?>

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
                <h3 class="card-label">Ujian
                    <span class="d-block text-muted pt-2 font-size-sm"> Penerimaan Peserta Didik Baru <?= date('Y'); ?> </span>
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <button type="button" class="btn bc-kemenag text-white font-weight-bolder mr-2" data-toggle="modal" data-target="#tambah">
                    <i class="fa fas fa-plus text-white icon-md"></i>
                    Ujian Baru
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
                        <th>Nama Ujian</th>
                        <th>Jumlah Soal</th>
                        <th>Waktu</th>
                        <th>Acak Soal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($ujian as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_ujian'] ?></td>
                            <td><?= $value['jumlah_soal'] ?> Soal</td>
                            <td><?= $value['waktu_ujian'] ?> Menit</td>
                            <td><?= $value['acak_soal'] ?></td>
                            <td class="dt-center">
                                <button type="button" class="btn btn-sm btn-light-warning btn-text-white btn-icon mr-2 " data-toggle="modal" data-target="#edit<?= $value['id_ujian'] ?>">
                                    <i class="fa far fa-edit" mr-2=""></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-light-danger btn-text-white btn-icon mr-2" data-toggle="modal" data-target="#delete<?= $value['id_ujian'] ?>">
                                    <i class="fa fas fa-trash" mr-2=""></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->

    <!-- Modal Tambah Ujian -->

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Ujian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <?php echo form_open_multipart('Panitia/tambahUjian') ?>
                <!--begin::Form-->
                <form class="form-group">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label>Nama Ujian</label>
                            <input type="text" class="form-control mb-3" name="nama_ujian" required />
                            <label>Jumlah Soal</label>
                            <input type="text" class="form-control mb-3" name="jumlah_soal" required />
                            <label>Tanggal Mulai</label>
                            <input type="date" class="form-control text-dark-50" name="tgl_mulai" required />
                            <label>Tanggal Selesai</label>
                            <input type="date" class="form-control text-dark-50" name="tgl_selesai" required />
                            <label>Waktu</label>
                            <input type="number" class="form-control mb-3" name="waktu_ujian" placeholder="menit" required />
                            <label>Acak Soal</label>
                            <select name="acak_soal" class="form-control">
                                <option value="" disabled selected>--- Pilih ---</option>
                                <option value="acak">Acak Soal</option>
                                <option value="urut">Urut Soal</option>
                            </select>
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

    <!-- Modal Tambah Ujian -->

    <!-- Modal Edit Ujian -->
    <?php foreach ($ujian as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value['id_ujian'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Ujian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <?php echo form_open_multipart('Panitia/editUjian/' . $value['id_ujian']) ?>
                    <!--begin::Form-->
                    <form class="form-group">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Nama Ujian</label>
                                <input type="text" class="form-control mb-3" name="nama_ujian" value="<?= $value['nama_ujian'] ?>" required />
                                <label>Jumlah Soal</label>
                                <input type="text" class="form-control mb-3" name="jumlah_soal" value="<?= $value['jumlah_soal'] ?>" required />
                                <label>Tanggal Mulai</label>
                                <input type="date" class="form-control text-dark-50" name="tgl_mulai" value="<?= $value['tgl_mulai'] ?>" required />
                                <label>Tanggal Selesai</label>
                                <input type="date" class="form-control text-dark-50" name="tgl_selesai" value="<?= $value['tgl_selesai'] ?>" required />
                                <label>Waktu</label>
                                <input type="number" class="form-control mb-3" name="waktu_ujian" value="<?= $value['waktu_ujian'] ?>" required />
                                <label>Acak Soal</label>
                                <select name="acak_soal" class="form-control" <?= $value['acak_soal'] ?>>
                                    <option value="" disabled selected>--- Pilih ---</option>
                                    <option value="acak" <?= $value['acak_soal'] == 'acak' ? 'selected' : '' ?>>Acak Soal</option>
                                    <option value="urut" <?= $value['acak_soal'] == 'urut' ? 'selected' : '' ?>>Urut Soal</option>
                                </select>
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
    <?php } ?>

    <!-- Modal Edit Ujian -->

    <!-- Modal delete Ujian -->
    <?php foreach ($ujian as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_ujian'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Ujian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            Apakah Anda Ingin Menghapus <b><?= $value['nama_ujian'] ?></b> ?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Batal</button>
                        <a class="btn btn-danger font-weight-bold" href="<?= base_url('Panitia/deleteData/' . $value['id_ujian']) ?>">Hapus</a>
                    </div>
                    <!--end::Form-->
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Modal delete Ujian -->

    <?= $this->endSection('content'); ?>

    <?= $this->section('script'); ?>
    <script>
        $("[mode='datatable']").DataTable({
            scrollX: true,

        })
    </script>
    <?= $this->endSection('script'); ?>