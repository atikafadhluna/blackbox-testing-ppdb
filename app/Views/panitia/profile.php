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
    <div class="card card-custom card-stretch">

        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">Hi <?= session()->get('nama_panitia') ?></h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">PPDB MTsN 4 Aceh Besar</span>
            </div>
            <div class="card-toolbar">
                <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#edit<?= $panitia['id_panitia'] ?>">
                    Edit Profile
                </button>
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
                                    <?php if ($panitia['foto'] == null) { ?>
                                        <img class="img-fluid pad" width="200px" height="200px" src="<?= base_url('foto/blank.png') ?>" id="gambar_load">
                                    <?php } else { ?>
                                        <img class="img-fluid pad" width="200px" height="200px" src="<?= base_url('foto/' . $panitia['foto']) ?>" id="gambar_load">
                                    <?php } ?>
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
                                        <small class="text-dark font-weight-bolder font-size-h6">Identitas</small>
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="font-weight-bolder">Nama Lengkap</label>
                                        <p class="text-dark-50"><?= $panitia['nama_panitia'] ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="font-weight-bolder">Email</label>
                                        <p class="text-dark-50"><?= $panitia['email'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="font-weight-bolder">No.Telepon</label>
                                        <p class="text-dark-50"><?= $panitia['telepon_panitia'] ?></p>
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

    <!-- Modal Edit Profile -->

    <div class="modal fade" id="edit<?= $panitia['id_panitia'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <?php echo form_open_multipart('Panitia/editProfile/' . $panitia['id_panitia']) ?>
                <!--begin::Form-->
                <form class="form-group">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" class="form-control mb-3" name="nama_panitia" value="<?= $panitia['nama_panitia'] ?>" required />
                            <label>Email</label>
                            <input type="email" class="form-control mb-3" name="email" value="<?= $panitia['email'] ?>" required />
                            <label>No.Telepon</label>
                            <input type="text" class="form-control mb-3" name="telepon_panitia" value="<?= $panitia['telepon_panitia'] ?>" required />
                            <label>Ganti Foto</label>
                            <div class="row">
                                <div class="col-3">
                                    <?php if ($panitia['foto'] == null) { ?>
                                        <img class="img-thumbnail pt-10" src="<?= base_url('foto/blank.png') ?>">
                                    <?php } else { ?>
                                        <img src="<?= base_url('foto/' . $panitia['foto']) ?>" alt="" class="img-thumbnail pt-10">
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

    <!-- Modal Edit Profile -->


    <?= $this->endSection('content'); ?>

    <?= $this->section('script'); ?>


    <?= $this->endSection('script'); ?>