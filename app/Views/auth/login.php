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
                                    <?php if (session()->getFlashdata('message')) {
                                        echo '<div class="alert alert-custom alert-light-danger fade show" role="alert">';
                                        echo '<div class="alert-text text-dark">';
                                        echo session()->getFlashdata('message');
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
                                    <?php if (session()->getFlashdata('keluar')) {
                                        echo '<div class="alert alert-custom alert-light-success fade show" role="alert">';
                                        echo '<div class="alert-text text-dark">';
                                        echo session()->getFlashdata('keluar');
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
                            <?php session()->getFlashdata('errors') ?>
                            <?php echo form_open('auth/cek_login_user') ?>
                            <div style="text-align: left;"><label class="ml-2">Email</label></div>
                            <div class=" form-group" id="kt_login_signin_form">
                                <input class="form-control h-auto text-dark bg-dark-o-10 rounded-pill border-0 py-4 px-8 <?= $validation->hasError('email') ? 'is-invalid' : ''; ?>" type="email" placeholder="Email" name="email" value="<?= old('email'); ?>" />
                                <div class="invalid-feedback text-left pl-2">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                            <div style="text-align: left;"><label class="ml-2">Password</label></div>
                            <div class="form-group">
                                <input class="form-control h-auto text-dark bg-dark-o-10 rounded-pill border-0 py-4 px-8 <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>" type="password" placeholder="Password" name="password" value="<?= old('password'); ?>" />
                                <div class="invalid-feedback text-left pl-2">
                                    <?= $validation->getError('password'); ?>
                                </div>
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