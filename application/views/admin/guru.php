

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">

                <?php echo $this->session->flashdata('message');?>


                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Pengaturan <small>Profil Guru</small></h3>
                        </div>
                        <div class="block-content">
                            <p>Lengkapi data di bawah ini untuk merubah informasi guru.</p>
                            <hr>
                            <form action="<?= base_url('p_admin/edit_guru'); ?>" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="nama">Nama</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $guru->guru; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="username">Username</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $guru->username; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="email">E-mail</label>
                                    <div class="col-lg-7">
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $guru->email; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="nohp">Nomor Hanphone</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $guru->nohp; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9 ml-auto">
                                        <button type="submit" class="btn btn-alt-primary">Simpan</button>
                                        <button type="reset" class="btn btn-alt-default">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Pengaturan <small>Password</small></h3>
                        </div>
                        <div class="block-content">
                            <p>Ganti keamanan akun guru</p>
                            <hr>
                            <form action="<?= base_url('p_admin/edit_password_guru'); ?>" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="password_baru">Password Baru</label>
                                    <div class="col-lg-7">
                                        <input type="password" class="form-control" id="password_baru" name="password_baru" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="konfirmasi_password">Konfirmasi Password</label>
                                    <div class="col-lg-7">
                                        <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9 ml-auto">
                                        <button type="submit" class="btn btn-alt-primary">Simpan</button>
                                        <button type="reset" class="btn btn-alt-default">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    
                </div>
                <!-- END Page Content -->




                
            </main>
            <!-- END Main Container -->

