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

    if (session()->getFlashdata('error')) {
        echo '<div class="alert alert-custom alert-light-danger fade show" role="alert">';
        echo '<div class="alert-text text-dark">';
        echo session()->getFlashdata('error');
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
                <h3 class="card-label font-weight-bolder text-dark">Hi <?= session()->get('nama_user') ?></h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">PPDB MTsN 4 Aceh Besar</span>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <?php $validation = \Config\Services::validation(); ?>
        <?php echo form_open('Admin/ubahPassword/' . $user['id_user']) ?>
        <form class="form">
            <!--begin::Body-->
            <div class="card-body">
                <div class="mb-3">
                    <label>Password Lama</label>
                    <input type="password" class="form-control <?= $validation->hasError('opwd') ? 'is-invalid' : null ?> mb-3" name="opwd" />
                    <p class="invalid-feedback">
                        <?= $validation->getError('opwd') ?>
                    </p>
                    <label>Password Baru</label>
                    <input type="password" class="form-control <?= $validation->hasError('npwd') ? 'is-invalid' : null ?> mb-3" name="npwd" />
                    <p class="invalid-feedback">
                        <?= $validation->getError('npwd') ?>
                    </p>
                    <label>Konfirmasi Password Baru</label>
                    <input type="password" class="form-control <?= $validation->hasError('cnpwd') ? 'is-invalid' : null ?> mb-3" name="cnpwd" />
                    <p class="invalid-feedback">
                        <?= $validation->getError('cnpwd') ?>
                    </p>
                </div>
            </div>
            <div class="card-footer">

                <button type="submit" class="btn bc-kemenag text-white font-weight-bold">Simpan</button>
            </div>
            <!--end::Body-->
        </form>
        <?php echo form_close() ?>
        <!--end::Form-->
    </div>

    <?= $this->endSection('content'); ?>

    <?= $this->section('script'); ?>


    <?= $this->endSection('script'); ?>