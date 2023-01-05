<!DOCTYPE html>
<html>

<body>

    <!-- surat pernyataan wali -->
    <div class="container">
        <center>
            <font size="3"> <b>SURAT PERNYATAAN ORANG TUA/WALI</B></font>
        </center>

        <center>
            <font size="3"> <b>TAHUN AJARAN <?= $ta['ta'] ?></b></font>
        </center>


        <br>



        <table width="100%" border="0">
            <tr>
                <td>
                    Saya yang bertandatangan di bawah ini :
                </td>
            </tr>
        </table>

        <table width="100%" border="0">
            <tr>
                <td width="30%">Nama Orang Tua / Wali</td>
                <td width="1%">:</td>
                <td width="69%"><?= $siswa['nama_ayah'] ?></td>
            </tr>

            <tr>
                <td>Pekerjaan Orang Tua / Wali</td>
                <td>:</td>
                <td><?= $siswa['pekerjaan_ayah'] ?></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td><?= $siswa['agama'] ?></td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td>:</td>
                <td><?= $siswa['nama_siswa'] ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $siswa['jenis_kelamin'] ?></td>
            </tr>
            <tr>
                <td>Diterima di Kelas</td>
                <td>:</td>
                <td><?= $siswa['kelas'] ?></td>
            </tr>
            <tr>
                <td>Hubungan Keluarga</td>
                <td>:</td>
                <td><?= $siswa['hub_keluarga'] ?>.</td>
            </tr>
            <tr>
                <td>Alamat Orang Tua / Wali</td>
                <td>:</td>
                <td><?= $siswa['alamat_ayah'] ?></td>
            </tr>
        </table>
        <br>

        <table width="100%" border="0" style="margin-bottom: 10px">
            <center>
                <font size="3"> <b>MENYATAKAN</b></font>
            </center>
        </table>

        <table width="100%" border="0" style="margin-bottom: 5px">
            <tr class="text2"></tr>

            <tr>
                <td>
                    <font size="3">Bahwa saya selaku Orang tua / Wali dari siswa bernama <?= $siswa['nama_siswa'] ?> Kelas <?= $siswa['kelas'] ?> <?= $setting['nama_sekolah'] ?> bersedia :
                    </font>
                </td>
            </tr>
        </table>
        <ol>
            <li>
                Membimbing dan mengawasi siswa tersebut diatas untuk mentaati dan mematuhi tata tertib <?= $setting['nama_sekolah'] ?>, termasuk pakaian seragam Madrasah dan kegiatan hari-hari masuk Madrasah.
            </li>
            <li>
                Membimbing dan mengawasi siswa tersebut diatas untuk selalu berakhlakul karimah dan melaksanakan janji siswa warga OSIM <?= $setting['nama_sekolah'] ?>.
            </li>
            <li>
                Mengawasi Siswa tersebut di atas untuk mengikuti semua kegiatan di Madrasah baik pagi maupun sore hari.
            </li>
            <li>
                Apabila saya tidak membimbing dan mengawasi sehingga siswa tersebut tidak mentaati semua ketentuan yang ditetapkan oleh Madrasah, saya tidak berkeberatan siswa tersebut di atas menerima sanksi antara lain:
                <ul style="list-style-type: lower-alpha;">
                    <li>Tidak diperkenankan mengikuti pelajaran selama jangka waktu tertentu.</li>
                    <li>Dikembalikan kepada saya atau dikeluarkan dari Madrasah ini.</li>
                </ul>
            </li>
            <li>Tidak akan menuntut pihak Madrasah ataS segala tindakan, sanksi maupun bimbingan yang diberikan kepada siswa tersebut jika yang bersangkutan melanggar tata tertib Madrasah, tidak disiplin dan meresahkan lingkungan Madrasah / Murid / Guru dalam proses belajar mengajar.</li>
        </ol>
        <table width="100%" border="0" style="margin-bottom: 5px">
            <tr>
                <td>
                    <font size="3">Surat pernyataan ini saya buat dengan sebenar-benarnya dan penuh tanggung jawab sebagai upaya menciptakan generasi muda yang mandiri, berakhlak mulia dan penuh rasa hormat, baik terhadap orang tua, guru maupun Madrasah.</font>
                </td>
            </tr>
        </table>
        <table width="100%" border="0" style="margin-bottom: 10px">
            <tr>
                <td width="350"><br><br><br></td>
                <td class="text" align="center"><?= $setting['kabupaten'] ?>, <?= date('d F Y') ?> </td>
            </tr>
            <tr>
                <td width="350"><br></td>
                <td style="color:#cad2c5; font-size:xx-small;"> materai Rp. 10.000</td>
            </tr>
            <tr>
                <td width="350"><br><br><br><br></td>
                <td class="text" align="center"><?= $siswa['nama_ayah'] ?><br>(..............................................)</td>
            </tr>
        </table>
    </div>
    <!-- surat pernyataan wali -->

    <br><br><br><br><br><br><br>


    <!-- surat pernyataan siswa -->
    <div class="container">
        <center>
            <font size="3"> <b>SURAT PERNYATAAN SISWA <?= $setting['nama_sekolah'] ?></B></font>
        </center>

        <center>
            <font size="3"> <b>TAHUN AJARAN <?= $ta['ta'] ?></b></font>
        </center>
        <br>
        <table width="100%" border="0">
            <tr>
                <td>
                    Saya yang bertandatangan di bawah ini :
                </td>
            </tr>
        </table>

        <table width="100%" border="0">
            <tr>
                <td width="30%">Nama Lengkap</td>
                <td width="1%">:</td>
                <td width="69%"><?= $siswa['nama_siswa'] ?></td>
            </tr>
            <tr>
                <td>Tempat dan Tanggal Lahir</td>
                <td>:</td>
                <td><?= $siswa['tempat_lahir'] ?> , <?= date('d F Y', strtotime($siswa['tgl_lahir'])) ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $siswa['jenis_kelamin'] ?></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td><?= $siswa['agama'] ?></td>
            </tr>
            <tr>
                <td>Nomor Pendaftaran</td>
                <td>:</td>
                <td><?= $siswa['no_pendaftaran'] ?></td>
            </tr>
            <tr>
                <td>Diterima di Kelas</td>
                <td>:</td>
                <td><?= $siswa['kelas'] ?></td>
            </tr>
            <tr>
                <td>Nama Orang Tua</td>
                <td>:</td>
                <td><?= $siswa['nama_ayah'] ?></td>
            </tr>
            <tr>
                <td>Pekerjaan Orang Tua</td>
                <td>:</td>
                <td><?= $siswa['pekerjaan_ayah'] ?></td>
            </tr>
            <tr>
                <td>Agama Orang Tua</td>
                <td>:</td>
                <td><?= $siswa['agama'] ?></td>
            </tr>
            <tr>
                <td>Nama wali</td>
                <td>:</td>
                <td>......</td>
            </tr>
            <tr>
                <td>Pekerjaan Wali</td>
                <td>:</td>
                <td>......</td>
            </tr>
            <tr>
                <td>Hubungan Keluarga Dengan Wali</td>
                <td>:</td>
                <td>......</td>
            </tr>
            <tr>
                <td>Alamat Orang Tua / Wali</td>
                <td>:</td>
                <td><?= $siswa['alamat_ayah'] ?></td>
            </tr>
        </table>

        <table width="100%" border="0" style="margin-bottom: 10px">
            <tr>
                <td width="30%">Dengan sungguh - sungguh dan penuh kesadaran :</td>
            </tr>
        </table>
        <table width="100%" border="0" style="margin-bottom: 10px">
            <center>
                <font size="3"> <b>MENYATAKAN</b></font>
            </center>
        </table>

        <table width="100%" border="0" style="margin-bottom: 5px">
            <tr class="text2"></tr>

            <tr>
                <td>
                    <font size="3">Bahwa Saya selama menjadi Siswa <?= $setting['nama_sekolah'] ?>, Saya yang bernama : <b><u><?= $siswa['nama_siswa'] ?></u></b>
                    </font>
                </td>
            </tr>
        </table>
        <ol>
            <li>
                Akan belajar dengan tekun dan penuh semangat.
            </li>
            <li>
                Akan menjaga nama baik diri sendiri, keluarga dan Madrasah.
            </li>
            <li>
                Sanggup mentaati dan mematuhi pelaksanaan Wiyatamandala termasuk pakaian seragam Madrasah, OSIM dan kegiatan hari-hari masuk Madrasah serta peraturan dan tata tertib Madrasah.
            </li>
            <li>Akan mengikuti pelaksanaan / Kegiatan sore hari baik tambahan belajar ( Les ), Pengajian maupun kegiatan lainnya yang diadakao Madrasah.</li>
            <li>
                Apabila saya tidak mentaati ketentuan yang ditetapkan oleh Madrasah, saya sanggup menerima sanksi, Yaitu :
                <ul style="list-style-type: lower-alpha;">
                    <li>Tidak diperkenankan mengikuti pelajaran selama jangka waktu tertentu.</li>
                    <li>Dikembalikan kepada orang tua / wali saya.</li>
                </ul>
            </li>
            <li>Tidak akan menuntut pihak Madrasah ataS segala tindakan, sanksi maupun bimbingan yang diberikan kepada siswa tersebut jika yang bersangkutan melanggar tata tertib Madrasah, tidak disiplin dan meresahkan lingkungan Madrasah / Murid / Guru dalam proses belajar mengajar.</li>
        </ol>
        <table width="100%" border="0" style="margin-bottom: 5px">
            <tr>
                <td>
                    <font size="3">Demikian surat pernyataan ini saya buat dengan sebenarnya - benarnya dan penuh tanggung jawab serta diketahui Oleh orang tua / wali saya.</font>
                </td>
            </tr>
        </table>
        <br>
        <table width="100%" border="0">
            <tr>
                <td width="30%">Mengetahui / Menyetujui <br> Orang tua / Wali</td>
                <td width="40%"></td>
                <td width="30%"><?= $setting['kabupaten'] ?>, <?= date('d F Y') ?> <br> Yang Membuat Pernyataan</td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td align="center"><?= $siswa['nama_ayah'] ?><br>(..............................................)</td>
                <td></td>
                <td align="center"><?= $siswa['nama_siswa'] ?><br>(..............................................)</td>
            </tr>
        </table>
    </div>
    <!-- surat pernyataan siswa -->
    <br><br><br>
    <!-- surat pernyataan janji siswa -->
    <div class="container">
        <center>
            <font size="3"> <b>JANJI SISWA WARGA OSIM</B></font>
        </center>

        <center>
            <font size="3"> <b>MADRASAH TSANAWIYAH NEGERI (MTsN) 4 ACEH BESAR</b></font>
        </center>
        <br>
        <table width="100%" border="0">
            <tr>
                <td>
                    Demi kehormatan kami, kami Siswa OSIM <?= $setting['nama_sekolah'] ?> berjanji :
                </td>
            </tr>
        </table>

        <ol>
            <li>
                Taqwa terhadap Tuhan Yang Maha Esa.
            </li>
            <li>
                Abdi terhadap Tanah air dan bangsa serta kepada Pancasila dan Undang-undang Dasar 1945.
            </li>
            <li>
                Adab terhadap orang tua, hormat kepada guru serta senantiasa menjunjung tinggi derajat dan martabat Madrasah kami.
            </li>
            <li>Belajar adalah tugas pokOk kami untuk mendalami pengetahuan / tehnologi sebagai bekal pengabdian demi tercapainya perjuangan bangsa.</li>
            <li>Aktif dan kreatif dengan cara belajar keras dalam memperoleh bekal sebagai generasi penerus demi kelestarian Negara, bangsa dan agama, serta dengan penuh kesadaran sanggup menjalankan semua ketentuan yang tertulis dalam Anggaran Dasar dan Anggaran rumah tangga yang berlaku di Madrasah kami.</li>
            <li>Selalu menjaga nama baik madrasah serta berakhlakul karimah dimanapun kami berada.</li>
        </ol>
        <ul>
            <li>
                Peraturan Tata Tertib Madrasah dan Janji bagi siswa telah diterima, dibaca, dipelajari dan disetujui oleh siswa sepenuhnya berikut dengan sanksi - sanksinya.
            </li>
            <li>Disetujuinya Peraturan Tata Tertib Madrasah dan janji oleh siswa sebagai syarat untuk diterima di Madrasah Tsanawiyah ( MTsN ) 4 Aceh Besar.</li>
        </ul>
        <table width="100%" border="0" style="margin-bottom: 10px">

            <tr>
                <td width="30%"></td>
                <td width="40%"></td>
                <td width="30%"><?= $setting['kabupaten'] ?>, <?= date('d F Y') ?> <br> Yang Membuat Pernyataan</td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td align="center"></td>
                <td></td>
                <td align="center"><?= $siswa['nama_siswa'] ?><br>(..............................................)</td>
            </tr>
        </table>
    </div>
    <!-- surat pernyataan janji siswa -->
</body>

</html>