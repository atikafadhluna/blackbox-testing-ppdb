<?= $this->extend('templates/auth'); ?>

<?= $this->section('content'); ?>
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(/assets/media/bg/bg-auth.png);">
            <div class="login-form text-center text-dark p-7 position-relative overflow-hidden">
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <!--begin::Login Header-->
                        <div class="d-flex flex-center mb-10">
                            <a href="#">
                                <img class="max-h-75px" src="<?= base_url('logo/' . $setting['logo_sekolah']) ?>" id="gambar_load">
                            </a>
                        </div>
                        <!--end::Login Header-->
                        <!--begin::Login Sign in form-->
                        <div class="login-signin">
                            <div class="mb-15">
                                <h3 class=" font-weight-bold text-dark"><?= $subtitle; ?></h3>
                                <p class="text-dark-75 font-weight-normal">PPDB ONLINE | MTsN 4 ACEH BESAR</p>

                                <!-- begin :: Flash data Error -->
                                <div class="container">
                                </div>
                                <!-- end :: Flash data Error -->

                                <!-- Begin :: Flash Data Message -->

                                <div class="container">
                                    <?php if (session()->getFlashdata('error')) {
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
                                    } ?>
                                </div>
                                <!-- End :: Flash Data Message -->

                                <!-- Begin :: Flash Data Message -->

                                <div class="container">
                                    <?php if (session()->getFlashdata('edit')) {
                                        echo '<div class="alert alert-custom alert-light-success fade show" role="alert">';
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
                                    } ?>
                                </div>
                                <!-- End :: Flash Data Message -->

                            </div>
                            <?php $validation = \Config\Services::validation(); ?>
                            <?php echo form_open('auth/reset_password') ?>
                            <div class=" form-group" id="kt_login_signin_form">
                                <label>Password</label>
                                <input type="password" class="form-control <?= $validation->hasError('npwd') ? 'is-invalid' : null ?> mb-3" name="npwd" />
                                <p class="invalid-feedback">
                                    <?= $validation->getError('npwd') ?>
                                </p>
                                <label>Konfirmasi Password</label>
                                <input type="password" class="form-control <?= $validation->hasError('cnpwd') ? 'is-invalid' : null ?> mb-3" name="cnpwd" />
                                <p class="invalid-feedback">
                                    <?= $validation->getError('cnpwd') ?>
                                </p>
                            </div>
                            <div class="form-group text-center mt-10">
                                <button class="btn btn-pill btn-warning opacity-90 px-15 py-3" type="submit">Masuk</button>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                        <!--end::Login Sign in form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->
<?= $this->endSection(''); ?>