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
                <h3 class="card-label">Daftar Pendidikan
                    <span class="d-block text-muted pt-2 font-size-sm">Penginputan Pendidikan </span>
                </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <button type="button" class="btn bc-kemenag text-white font-weight-bolder mr-2" data-toggle="modal" data-target="#tambah_pendidikan">
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
                        <th>Pendidikan</th>
                        <th data-autohide-disabled="false" class="datatable-cell datatable-cell-sort"><span style="width: 125px;">Action</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pendidikan as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['pendidikan'] ?></td>
                            <td data-autohide-disabled="false" aria-label="null" class="datatable-cell">
                                <span style="overflow: visible; position: relative; width: 125px;">
                                    <button type="button" class="btn btn-sm btn-light-warning btn-text-white btn-icon mr-2 " data-toggle="modal" data-target="#edit<?= $value['id_pendidikan'] ?>">
                                        <i class="fa far fa-edit" mr-2=""></i>
                                    </button>

                                    <a href="javascript:;">
                                        <button type="button" class="btn btn-sm btn-light-danger btn-text-white btn-icon mr-2" data-toggle="modal" data-target="#delete<?= $value['id_pendidikan'] ?>">
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


    <!-- Modal Tambah pendidikan -->

    <div class="modal fade" id="tambah_pendidikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah pendidikan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <?php echo form_open('ManageBiodata/insertPendidikan') ?>
                <!--begin::Form-->
                <form class="form-group">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label>pendidikan</label>
                            <input type="text" class="form-control" name="pendidikan" required />
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

    <!-- Modal Tambah pendidikan -->

    <!-- Modal Edit pendidikan -->
    <?php foreach ($pendidikan as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value['id_pendidikan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit pendidikan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <?php echo form_open('ManageBiodata/editPendidikan/' . $value['id_pendidikan']) ?>
                    <!--begin::Form-->
                    <form class="form-group">
                        <div class="modal-body">

                            <div class="mb-3">
                                <label>pendidikan</label>
                                <input type="text" value="<?= $value['pendidikan'] ?>" class="form-control" name="pendidikan" required />
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

    <!-- Modal Edit pendidikan -->

    <!-- Modal delete pendidikan -->
    <?php foreach ($pendidikan as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_pendidikan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus pendidikan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            Apakah Anda Ingin Menghapus <b><?= $value['pendidikan'] ?></b> ?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Tutup</button>
                        <a class="btn btn-danger font-weight-bold" href="<?= base_url('ManageBiodata/deletePendidikan/' . $value['id_pendidikan']) ?>">Hapus</a>
                    </div>
                    <!--end::Form-->


                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Modal delete pendidikan -->

    <?= $this->endSection(''); ?>

    <?= $this->section('script'); ?>
    <script>
        $("[mode='datatable']").DataTable({
            scrollX: true,

        })
    </script>
    <?= $this->endSection('script'); ?>