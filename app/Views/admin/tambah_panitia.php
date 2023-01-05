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
                <h3 class="card-label">Tabel Akun Panitia
                    <span class="d-block text-muted pt-2 font-size-sm"> Penerimaan Peserta Didik Baru <?= date('Y'); ?> </span>
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <button type="button" class="btn bc-kemenag text-white font-weight-bolder mr-2" data-toggle="modal" data-target="#tambah">
                    <i class="fas fa-user-plus text-white"></i>
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No.Telepon</th>
                        <th>Foto</th>
                        <th data-autohide-disabled="false" class="datatable-cell datatable-cell-sort"><span style="width: 125px;">Action</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($nama_panitia as $key => $value) { ?>
                        <tr>
                            <td><?= $id++ ?></td>
                            <td><?= $value['nama_panitia'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['telepon_panitia'] ?></td>
                            <td class="symbol symbol-50 symbol-light mr-4">
                                <?php if ($value['foto'] == null) { ?>
                                    <img class=" h-75 align-self-end" src="<?= base_url('foto/blank.png') ?>">
                                <?php } else { ?>
                                    <img src="<?= base_url('foto/' . $value['foto']) ?>" alt="" class=" h-75 align-self-end">
                                <?php } ?>
                            </td>
                            <td data-autohide-disabled="false" aria-label="null" class="datatable-cell">
                                <span style="overflow: visible; position: relative; width: 125px;">
                                    <button type="button" class="btn btn-sm btn-light-warning btn-text-white btn-icon mr-2 " data-toggle="modal" data-target="#edit<?= $value['id_panitia'] ?>">
                                        <i class="fa far fa-edit" mr-2=""></i>
                                    </button>

                                    <a href="javascript:;">
                                        <button type="button" class="btn btn-sm btn-light-danger btn-text-white btn-icon mr-2" data-toggle="modal" data-target="#delete<?= $value['id_panitia'] ?>">
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


    <!-- Modal Tambah Panitia -->

    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Panitia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <?php echo form_open_multipart('Admin/insertPanitia') ?>
                <!--begin::Form-->
                <form class="form-group">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" class="form-control mb-3" name="nama_panitia" required />
                            <label>Email</label>
                            <input type="email" class="form-control mb-3" name="email" required />
                            <label>No.Telepon</label>
                            <input type="text" class="form-control mb-3" name="telepon_panitia" required />
                            <label>Password</label>
                            <input type="password" class="form-control mb-3" name="password" required />
                            <label>Foto</label>
                            <div class="row">
                                <div class="col-3">
                                    <img src="/foto/blank.png" class="pt-10 img-thumbnail">
                                </div>
                                <div class="col-9">
                                    <input type="file" class="form-control mb-3" accept="image/*" name="foto" />
                                </div>
                            </div>

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

    <!-- Modal Tambah Panitia -->

    <!-- Modal Edit Panitia -->
    <?php foreach ($nama_panitia as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value['id_panitia'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Panitia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <?php echo form_open_multipart('Admin/editPanitia/' . $value['id_panitia']) ?>
                    <!--begin::Form-->
                    <form class="form-group">
                        <div class="modal-body">

                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" value="<?= $value['nama_panitia'] ?>" class="form-control mb-3" name="nama_panitia" required />
                                <label>Email</label>
                                <input type="email" value="<?= $value['email'] ?>" class="form-control mb-3" name="email" required />
                                <label>No.Telepon</label>
                                <input type="text" value="<?= $value['telepon_panitia'] ?>" class="form-control mb-3" name="telepon_panitia" required />
                                <label>Ganti Foto</label>
                                <div class="row">
                                    <div class="col-3">
                                        <?php if ($value['foto'] == null) { ?>
                                            <img class="img-thumbnail pt-10" src="<?= base_url('foto/blank.png') ?>">
                                        <?php } else { ?>
                                            <img src="<?= base_url('foto/' . $value['foto']) ?>" alt="" class="img-thumbnail pt-10">
                                        <?php } ?>
                                    </div>
                                    <div class="col-9">
                                        <input type="file" class="form-control mb-3" name="foto" accept="image/*" />
                                    </div>
                                </div>
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

    <!-- Modal Edit Panitia -->

    <!-- Modal delete Panitia -->
    <?php foreach ($nama_panitia as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_panitia'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Panitia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            Apakah Anda Ingin Menghapus <b><?= $value['nama_panitia'] ?></b> ?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Batal</button>
                        <a class="btn btn-danger font-weight-bold" href="<?= base_url('Admin/deletePanitia/' . $value['id_panitia']) ?>">Hapus</a>
                    </div>
                    <!--end::Form-->
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Modal delete Panitia -->

    <?= $this->endSection(''); ?>

    <?= $this->section('script'); ?>
    <script>
        $("[mode='datatable']").DataTable({
            scrollX: true,

        })
    </script>
    <?= $this->endSection('script'); ?>