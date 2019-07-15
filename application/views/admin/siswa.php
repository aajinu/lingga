

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">

                <?php echo $this->session->flashdata('message');?>              


                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Data <small>Siswa</small></h3>
                        </div>
                        <div class="block-content block-content-full">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-popin">+Tambah Data Siswa</button>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Nama</th>
                                        <th>NIS</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <!-- <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th> -->
                                        <th class="text-center" style="width: 15%;">Profile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no=0;
                                foreach($siswa as $s){
                                $no++
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td class="font-w600"><?= $s->nama ?></td>
                                        <td class="font-w600"><?= $s->nis ?></td>
                                        <td class="font-w600"><?= $s->kelas ?></td>
                                        <td class="font-w600"><?= $s->jurusan ?></td>
                                        <!-- <td class="d-none d-sm-table-cell">
                                            <span class="badge badge-danger">Disabled</span>
                                        </td> -->
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-success" title="Ubah" data-toggle="modal" data-target="#modal-default<?= $s->id_siswa ?>">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <a href="<?= base_url('p_admin/hapus_siswa/'.$s->id_siswa) ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" onclick="return confirm('Anda yakin ingin menghapus siswa?')" title="Hapus">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                <?php } ?>
                                </tbody>
                            </table>

                            <?php foreach ($siswa as $a): ?>
                            <div class="modal fade" id="modal-default<?= $a->id_siswa ?>">                        
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title">Edit Siswa</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    
                                </div>
                                <div class="modal-body">
                                <form action="<?= base_url('p_admin/ubah_siswa') ?>" method="post" class="" enctype="multipart/form-data">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type="hidden" name="id" class="form-control" value="<?= $a->id_siswa ?>">                     
                                        <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Nama Siswa</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $a->nama ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">NIS</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="nis" name="nis" value="<?= $a->nis ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Jenis Kelamin</label>
                                    <div class="col-lg-7">
                                    <select class="form-control" name="jk" required="true">
                                        <option value="none" selected="" disabled="">Pilih Salah Satu</option>
                                        <option value="l" <?php if ($a->jk == "l"){ echo 'selected'; } ?>>Laki-Laki</option>
                                        <option value="p" <?php if ($a->jk == "p"){ echo 'selected'; } ?>>Perempuan</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Tempat, Tgl Lahir</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="ttl" name="ttl" value="<?= $a->ttl ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Alamat</label>
                                    <div class="col-lg-7">
                                    <textarea class="form-control" name="alamat" placeholder="" ><?= $a->alamat ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Agama</label>
                                    <div class="col-lg-7">
                                    <select class="form-control" name="agama" required="true">
                                        <option value="none" selected="" disabled="">Pilih Salah Satu</option>
                                        <option value="islam" <?php if ($a->agama == "islam"){ echo 'selected'; } ?>>Islam</option>
                                        <option value="kristen" <?php if ($a->agama == "kristen"){ echo 'selected'; } ?>>Kristen</option>
                                        <option value="katolik" <?php if ($a->agama == "katolik"){ echo 'selected'; } ?>>Katolik</option>
                                        <option value="hindu" <?php if ($a->agama == "hindu"){ echo 'selected'; } ?>>Hindu</option>
                                        <option value="budha" <?php if ($a->agama == "budha"){ echo 'selected'; } ?>>Budha</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">No. Telp.</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="telp" name="telp" value="<?= $a->telp ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">E-mail</label>
                                    <div class="col-lg-7">
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $a->email ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Username</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $a->username ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="password">Password</label>
                                    <div class="col-lg-7">
                                        <input type="password" class="form-control" id="password" name="password" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Kelas</label>
                                    <div class="col-lg-7">
                                    <select class="form-control" name="kelas" required="true">
                                        <option value="none" selected="" disabled="">Pilih Salah Satu</option>
                                        <?php foreach ($kelas as $k): ?>   
                                        <option value="<?= $k->kelas ?>"><?= $k->kelas ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Jurusan</label>
                                    <div class="col-lg-7">
                                    <select class="form-control" name="jurusan" required="true">
                                        <option value="none" selected="" disabled="">Pilih Salah Satu</option>
                                        <?php foreach ($kelas as $k): ?>                                       
                                        <option value="<?= $k->jurusan ?>"><?= $k->jurusan ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="password">Tahun Ajaran</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $a->tahun ?>" required>
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
                            <h3 class="block-title">Tambah Data Siswa</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                        <form action="<?= base_url('p_admin/tambah_siswa'); ?>" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Nama Siswa</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">NIS</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="nis" name="nis" required>
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
                                    <label class="col-lg-4 col-form-label" for="username">Kelas</label>
                                    <div class="col-lg-7">
                                    <select class="form-control" name="kelas" required="true">
                                        <option value="none" selected="" disabled="">Pilih Salah Satu</option>
                                        <?php foreach ($kelas as $k): ?>
                                        <option value="<?= $k->kelas ?>"><?= $k->kelas ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="username">Jurusan</label>
                                    <div class="col-lg-7">
                                    <select class="form-control" name="jurusan" required="true">
                                        <option value="none" selected="" disabled="">Pilih Salah Satu</option>
                                        <?php foreach ($kelas as $k): ?>
                                        <option value="<?= $k->jurusan ?>"><?= $k->jurusan ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="password">Tahun Ajaran</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="tahun" name="tahun" required>
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

