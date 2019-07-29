            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
            <div class="content">
                <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Profil Sekolah</h3>                            
                        </div>
                        <div class="block-content">
                            <form action="<?= base_url('admin/ubah_profil') ?>" method="post" class="form-group">
                                    <label for="side-overlay-profile-email">Profil Sekolah</label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="profil" placeholder="" ><?= $profil->profil ?></textarea>
                                    </div><br>
                                    <label for="side-overlay-profile-email">Visi</label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="visi" placeholder="" ><?= $profil->visi ?></textarea>
                                    </div><br>
                                    <label for="side-overlay-profile-email">Misi</label>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <!-- CKEditor Container -->                                      
                                            <textarea id="js-ckeditor" name="misi"><?= $profil->misi ?></textarea>
                                        </div>
                                    </div><br>
                                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-alt-primary">Ubah</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
