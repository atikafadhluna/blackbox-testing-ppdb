<?= $this->extend('templates/pt_layout'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <!--begin::Content-->
    <div class="flex-row-fluid ml-sm-8">
        <div class="row">
            <div class="col-xxl-6">
                <!--begin::Mixed Widget 2-->
                <div class="card card-custom bg-gray-100 gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 bg-warning py-5">
                        <h3 class="card-title font-weight-boldest text-white">
                            INFORMASI PPDB MTsN 4 ACEH BESAR
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body p-0 position-relative overflow-hidden">
                        <!--begin::Chart-->
                        <div class="card-rounded-bottom bg-warning" style="height: 100px">
                        </div>
                        <!--end::Chart-->
                        <!--begin::Stats-->
                        <div class="card-spacer mt-n25">
                            <!--begin::Row-->
                            <div class="row m-0">
                                <div class="col bg-white px-6 py-8 rounded-xl mr-7 mb-7 d-flex justify-content-between">
                                    <div>
                                        <span class="fa fas fa-users icon-2x text-info d-block my-2">
                                        </span>
                                        <a href="#" class="text-info font-weight-bold font-size-h6 mt-2">Jumlah Pendaftar</a>
                                    </div>
                                    <div class="d-flex align-items-center text-info font-weight-boldest display-4 mr-10">
                                        <?= $jmlPendaftar ?>
                                    </div>
                                </div>
                                <div class="col bg-white px-6 py-8 rounded-xl mb-7 d-flex justify-content-between">
                                    <div>
                                        <span class="fa fas fa-user-check icon-2x text-success d-block my-2">
                                        </span>
                                        <a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Jumlah Peserta Lulus</a>
                                    </div>
                                    <div class="d-flex align-items-center text-success font-weight-boldest display-4 mr-10">
                                        <?php if ($opsiNilai == null) { ?>
                                            <?= $jmlPendaftarLManual ?>
                                        <?php } else { ?>
                                            <?= $jmlPendaftarL ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row m-0">
                                <div class="col bg-white px-6 py-8 rounded-xl mr-7 d-flex justify-content-between">
                                    <div>
                                        <span class="fa fas fa-user-times icon-2x text-danger d-block my-2">
                                        </span>
                                        <a href="#" class="text-danger font-weight-bold font-size-h6 mt-2">Jumlah Peserta Tidak Lulus</a>
                                    </div>
                                    <div class="d-flex align-items-center text-danger font-weight-boldest display-4 mr-10">
                                        <?php if ($opsiNilai == null) { ?>
                                            <?= $jmlPendaftarTLManual ?>
                                        <?php } else { ?>
                                            <?= $jmlPendaftarTL ?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col bg-white px-6 py-8 rounded-xl">
                                    <span class="fa fas fa-file-pdf icon-2x text-primary d-block my-2">
                                    </span>
                                    <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">Laporan PPDB <?= date('Y'); ?></a>
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Mixed Widget 2-->
            </div>
        </div>
    </div>
    <!--end::Content-->

    <?= $this->endSection(''); ?>