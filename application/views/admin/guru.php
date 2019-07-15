

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">

                <?php echo $this->session->flashdata('message');?>              


                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Data <small>Guru</small></h3>
                        </div>
                        <div class="block-content block-content-full">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-popin">+Tambah Data Guru</button>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Username</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no=0;
                                foreach($guru as $g){
                                $no++
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td class="font-w600"><?= $g->nama ?></td>
                                        <td class="font-w600"><?= $g->nip ?></td>
                                        <td class="font-w600"><?= $g->username ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-success" title="Ubah" data-toggle="modal" data-target="#modal-default<?= $g->id_guru ?>">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <a href="<?= base_url('p_admin/hapus_guru/'.$g->id_guru) ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" onclick="return confirm('Anda yakin ingin menghapus siswa?')" title="Hapus">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                <?php } ?>
                                </tbody>
                            </table>

                            <?php foreach ($guru as $g): ?>
                            <div class="modal fade" id="modal-default<?= $g->id_guru ?>">                        
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title">Edit Guru</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    
                                </div>
                                <div class="modal-body">
                                <form action="<?= base_url('p_admin/ubah_guru') ?>" method="post" class="" enctype="multipart/form-data">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type="hidden" name="id" class="form-control" value="<?= $g->id_guru ?>">                     
                                        <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Nama Siswa</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $g->nama ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">NIP</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="nip" name="nip" value="<?= $g->nip ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Jenis Kelamin</label>
                                    <div class="col-lg-7">
                                    <select class="form-control" name="jk" required="true">
                                        <option value="none" selected="" disabled="">Pilih Salah Satu</option>
                                        <option value="l">Laki-Laki</option>
                                        <option value="p">Perempuan</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Tempat, Tgl Lahir</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="ttl" name="ttl" value="<?= $g->ttl ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Alamat</label>
                                    <div class="col-lg-7">
                                    <textarea class="form-control" name="alamat" placeholder="" ><?= $g->alamat ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Agama</label>
                                    <div class="col-lg-7">
                                    <select class="form-control" name="agama" required="true">
                                        <option value="none" selected="" disabled="">Pilih Salah Satu</option>
                                        <option value="islam" <?php if ($g->agama == "islam"){ echo 'selected'; } ?>>Islam</option>
                                        <option value="kristen" <?php if ($g->agama == "kristen"){ echo 'selected'; } ?>>Kristen</option>
                                        <option value="katolik" <?php if ($g->agama == "katolik"){ echo 'selected'; } ?>>Katolik</option>
                                        <option value="hindu" <?php if ($g->agama == "hindu"){ echo 'selected'; } ?>>Hindu</option>
                                        <option value="budha" <?php if ($g->agama == "budha"){ echo 'selected'; } ?>>Budha</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">No. Telp.</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="telp" name="telp" value="<?= $g->telp ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">E-mail</label>
                                    <div class="col-lg-7">
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $g->email ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Username</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $g->username ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="password">Password</label>
                                    <div class="col-lg-7">
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                                        <br>
                                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-alt-primary">Save</button>
                                        </div>
                                </form>
                                </div>
                                
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                            </div>
                            <?php endforeach ?>
                            <!-- /.modal -->



                        </div>
                    </div>


                    
                </div>
                <!-- END Page Content -->

                <div class="modal fade" id="modal-popin" tabindex="-1" role="dialog" aria-labelledby="modal-popin" aria-hidden="true">
            <div class="modal-dialog modal-dialog-popin" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Tambah Data Guru</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                        <form action="<?= base_url('p_admin/tambah_guru'); ?>" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Nama Guru</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">NIP</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="nip" name="nip" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Jenis Kelamin</label>
                                    <div class="col-lg-7">
                                    <select class="form-control" name="jk" required="true">
                                        <option value="none" selected="" disabled="">Pilih Salah Satu</option>
                                        <option value="l">Laki-Laki</option>
                                        <option value="p">Perempuan</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Tempat, Tgl Lahir</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="ttl" name="ttl" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Alamat</label>
                                    <div class="col-lg-7">
                                    <textarea class="form-control" name="alamat" placeholder="" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Agama</label>
                                    <div class="col-lg-7">
                                    <select class="form-control" name="agama" required="true">
                                        <option value="none" selected="" disabled="">Pilih Salah Satu</option>
                                        <option value="islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="budha">Budha</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">No. Telp.</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="telp" name="telp" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">E-mail</label>
                                    <div class="col-lg-7">
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Username</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="password">Password</label>
                                    <div class="col-lg-7">
                                        <input type="password" class="form-control" id="password" name="password" required>
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
            </div>
        </div>


                
            </main>
            <!-- END Main Container -->

