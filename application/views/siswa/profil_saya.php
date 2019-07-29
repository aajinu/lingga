

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">

                <?php echo $this->session->flashdata('message');?>


                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Pengaturan <small>Profil</small></h3>
                        </div>
                        <div class="block-content">
                            <p>Lengkapi data di bawah ini untuk menambahkan informasi ke Profil anda.</p>
                            <hr>
                            <form action="<?= base_url('siswa/edit_profil_saya'); ?>" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <input type="hidden" name="id" class="form-control" value="<?= $admin->id_siswa ?>">                     
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="nama">Nama Siswa</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $admin->nama ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="nama">NIS</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="nis" name="nis" value="<?= $admin->nis ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="nama">Jenis Kelamin</label>
                                    <div class="col-lg-7">
                                    <select class="form-control" name="jk" required="true">
                                        <option value="none" selected="" disabled="">Pilih Salah Satu</option>
                                        <option value="l" <?php if ($admin->jk == "l"){ echo 'selected'; } ?>>Laki-Laki</option>
                                        <option value="p" <?php if ($admin->jk == "p"){ echo 'selected'; } ?>>Perempuan</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="username">Tempat, Tgl Lahir</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="ttl" name="ttl" value="<?= $admin->ttl ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="username">Alamat</label>
                                    <div class="col-lg-7">
                                    <textarea class="form-control" name="alamat" placeholder="" ><?= $admin->alamat ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="username">Agama</label>
                                    <div class="col-lg-7">
                                    <select class="form-control" name="agama" required="true">
                                        <option value="none" selected="" disabled="">Pilih Salah Satu</option>
                                        <option value="islam" <?php if ($admin->agama == "islam"){ echo 'selected'; } ?>>Islam</option>
                                        <option value="kristen" <?php if ($admin->agama == "kristen"){ echo 'selected'; } ?>>Kristen</option>
                                        <option value="katolik" <?php if ($admin->agama == "katolik"){ echo 'selected'; } ?>>Katolik</option>
                                        <option value="hindu" <?php if ($admin->agama == "hindu"){ echo 'selected'; } ?>>Hindu</option>
                                        <option value="budha" <?php if ($admin->agama == "budha"){ echo 'selected'; } ?>>Budha</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="username">No. Telp.</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="telp" name="telp" value="<?= $admin->telp ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="username">E-mail</label>
                                    <div class="col-lg-7">
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $admin->email ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="username">Username</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $admin->username ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="password">Password</label>
                                    <div class="col-lg-7">
                                        <input type="password" class="form-control" id="password" name="password" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9 ml-auto">
                                        <button type="submit" class="btn btn-alt-primary">Ubah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    


                    
                </div>
                <!-- END Page Content -->




                
            </main>
            <!-- END Main Container -->

