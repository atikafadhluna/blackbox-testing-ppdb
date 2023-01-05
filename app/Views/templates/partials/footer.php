<?php
$db = \Config\Database::connect();

$setting = $db->table('tbl_web')
    ->where('id_setting', '1')
    ->get()->getRowArray();
?>
<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted font-weight-bold mr-2">Copyright © <?= date('Y'); ?> PPDB
            </span>
            <a href="<?= $setting['website'] ?>" target="_blank" class="text-dark-75 text-hover-success"><?= $setting['nama_sekolah'] ?></a>
        </div>

        <!--end::Copyright-->
    </div>

    <!--end::Container-->
</div>