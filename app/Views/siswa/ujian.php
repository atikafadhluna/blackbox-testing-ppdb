<?= $this->extend('templates/cs_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div id="form_soal">
        <?php echo form_open('Siswa/SaveJawaban') ?>
        <div class="row">
            <div class="col-8">
                <input type="hidden" name="id_ujian" value="<?= $ujian['id_ujian']; ?>">
                <?php foreach ($soal as $index => $value) : ?>
                    <!--begin::Card-->
                    <div class="card card-custom <?= $index == 0 ? '' : 'd-none'; ?>" soal nomor-soal="<?= $index + 1; ?>">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="p-2 bd-highlight"><strong>SOAL <?= $index + 1; ?></strong></h3>
                            </div>
                            <div class="card-toolbar">
                                <div style="border-radius:10px;border:1px solid #444; padding:8px 10px;" class=" timerBox mb-2">Sisa Waktu : <span></span> </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- make question and option -->
                            <div class="form-group ">
                                <label for="exampleTextarea"><?= $value['text_soal']; ?></label>
                                <input type="hidden" name="kuncijawaban[<?= $index; ?>]" value="<?= $value['kunci_jawaban']; ?>">
                                <input type="radio" class="d-none" name="soaljawaban[<?= $index; ?>]" value="" checked />
                                <input type="hidden" name="id_soal[]" value="<?= $value['id_soal']; ?>">
                                <div class="radio-list ">
                                    <label class="radio">
                                        <input type="radio" onchange="handleNavSuccess(this)" name="soaljawaban[<?= $index; ?>]" value="A" />
                                        <span></span>
                                        a. <?= $value['opsi_a']; ?>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" onchange="handleNavSuccess(this)" name="soaljawaban[<?= $index; ?>]" value="B" />
                                        <span></span>
                                        b. <?= $value['opsi_b']; ?>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" onchange="handleNavSuccess(this)" name="soaljawaban[<?= $index; ?>]" value="C" />
                                        <span></span>
                                        c. <?= $value['opsi_c']; ?>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" onchange="handleNavSuccess(this)" name="soaljawaban[<?= $index; ?>]" value="D" />
                                        <span></span>
                                        d. <?= $value['opsi_d']; ?>
                                    </label>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div class="">
                                    <?php if ($index != 0) : ?>
                                        <button type="button" onclick="changeSoal('<?= $index; ?>')" class="btn btn-secondary font-weight-bold">Sebelumnya</button>
                                    <?php endif; ?>
                                </div>

                                <div class="">
                                    <?php if ($index + 1 != count($soal)) : ?>
                                        <button type="button" onclick="changeSoal('<?= $index + 2; ?>')" class="btn btn-warning font-weight-bold">Selanjutnya</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Card-->
                <?php endforeach; ?>
            </div>
            <div class="col-4">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label"><strong>Navigasi Kuis</strong></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php foreach ($soal as $index => $value) : ?>
                            <button type="button" nav-soal="<?= $index + 1; ?>" onclick="changeSoal('<?= $index + 1; ?>')" class="btn btn-outline-secondary mr-2"><?= $index + 1; ?></button>

                        <?php endforeach; ?>
                    </div>
                    <div class="card-footer text-center">
                        <a class="btn bc-kemenag text-white" data-toggle="modal" data-target="#kumpul<?= session()->get('id_siswa') ?>">
                            Kumpulkan
                        </a>
                        <!-- begin Modal-->
                        <div class="modal fade" id="kumpul<?= session()->get('id_siswa') ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pendaftaran!!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i aria-hidden="true" clazss="ki ki-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Apakah Anda yakin mengumpulkan jawaban? Ujian hanya dapat dilakukan satu kali.
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn bc-kemenag text-white font-weight-bold">Kumpulkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end modal-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
    <!-- </div> -->

    <?= $this->endSection(''); ?>

    <?= $this->section('script'); ?>
    <script>
        function changeSoal(nomor) {
            $('.card[soal]').addClass('d-none');
            $('.card[nomor-soal="' + nomor + '"]').removeClass('d-none');
        }

        function handleNavSuccess(e) {
            let nomor = $(e).closest('.card').attr('nomor-soal');
            let nav = $('[nav-soal="' + nomor + '"]');
            nav.removeClass('btn-outline-secondary');
            nav.addClass('btn-success');
        }
    </script>

    <script>
        // sisawaktu
        $(function() {
            let totaTime = <?= $ujian['waktu_ujian'] ?? 60; ?> * 60;
            let min = 0;
            let sec = 0;
            let counter = 0;

            let timer = setInterval(function() {
                counter++;
                min = Math.floor((totaTime - counter) / 60);
                sec = totaTime - (min * 60) - counter;

                $(".timerBox span").text(min + " : " + sec);

                if (counter == totaTime) {
                    alert("Waktu Habis");
                    const form = document.querySelector('#form_soal form');

                    form.submit();
                    clearInterval(timer);
                }
            }, 1000);
        });
        //sisawaktu
    </script>
    <?= $this->endSection(''); ?>