<?php
$db = \Config\Database::connect();

$setting = $db->table('tbl_web')
    ->where('id_setting', '1')
    ->get()->getRowArray();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();
?>
<!DOCTYPE html>
<html>

<head>
    <base href="">
    <meta charset="utf-8" />
    <title><?= $title ?> | <?= $subtitle ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="<?= base_url(); ?>/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Page Vendors Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="<?= base_url(); ?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <link href="<?= base_url(); ?>/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/themes/layout/brand/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>/assets/css/themes/layout/aside/light.css" rel="stylesheet" type="text/css" />

    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/media/logos/kemenag.ico" />

</head>

<body>
    <div class="container">
        <table>
            <tr>
                <td rowspan="3" width="100">
                    <img src="<?= base_url('logo/' . $setting['logo_sekolah']) ?>" height="70px">
                </td>
                <td>
                    <b style="font-size:18px;">PENERIAMAAN PESERTA DIDIK BARU (PPDB)</b>
                </td>
            </tr>
            <tr>
                <b style="font-size:22px; text-uppercase"><?= $setting['nama_sekolah'] ?></b>
                <br>
            </tr>
            <tr>
                <td style="font-size:10px;">
                    <?= $setting['alamat_lengkap'] ?>
                </td>
            </tr>
        </table>
        <hr>
        <h4>
            <center>
                NAMA-NAMA PENDAFTAR PENERIMAAN PESERTA DIDIK BARU <br>
                TAHUN PELAJARAN <?= $ta['ta'] ?>
            </center>
        </h4>
        <table style="width: 100%;border-collapse: collapse;">
            <tr>
                <th style="border: 1px solid;padding: 12px;">No</th>
                <th style="border: 1px solid;padding: 12px;">No. Pendaftaran</th>
                <th style="border: 1px solid;padding: 12px;">NISN</th>
                <th style="border: 1px solid;padding: 12px;">Nama Lengkap</th>
                <th style="border: 1px solid;padding: 12px;">Nilai</th>
                <th style="border: 1px solid;padding: 12px;">Keterangan</th>
            </tr>
            <?php
            $no = 1;
            foreach ($siswa as $key => $value) { ?>
                <tr>
                    <td style="border: 1px solid; text-align:center; padding: 8px;"> <?= $no++ ?></td>
                    <td style="border: 1px solid; padding: 8px;"><?= $value['no_pendaftaran'] ?></td>
                    <td style="border: 1px solid; padding: 8px;"><?= $value['nisn'] ?></td>
                    <td style="border: 1px solid; padding: 8px;"><?= $value['nama_siswa'] ?></td>
                    <td style="border: 1px solid; padding: 8px; text-align:center;"></td>
                    <td style="border: 1px solid; padding: 8px; text-align:center;"></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>