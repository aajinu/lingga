

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Selamat Datang <small><?= $admin->username; ?></small></h3>
                        </div>
                        <div class="block-content">
                            <?php
                                if($jumlah == 0) {
                            ?>
                            <form action="<?= base_url('siswa/jawaban_angket')?>" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" name="jumlah_soal" value="<?= $jumlah_soal ?>">
                            
                            
                            <table class="table table-vcenter">
                                <tr>
                                    <th>No</th>
                                    <th>soal</th>
                                    <th>Jawaban</th>
                                </tr>
                                <?php
                                $no=0;
                                foreach ($pribadi as $p) {
                                $no++;
                                ?>
                                <input type="hidden" name="id_angket<?= $no ?>" value="<?= $p->id_angket ?>">
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $p->soal ?></td>
                                    <td>
                                        <input type="radio" name="jawaban<?= $no ?>" value="1"> Ya &nbsp;
                                        <input type="radio" name="jawaban<?= $no ?>" value="0" checked> Tidak<br>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                            <input type="hidden" name="id_bidang" value="<?= $p->bidang ?>">
                            <button type="submit" class="btn btn-success" data-wizard="next">
                                Selanjutnya <i class="fa fa-angle-right ml-5"></i>
                            </button>
                            </form>
                            <?php } else { ?>
                            Selesai
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

