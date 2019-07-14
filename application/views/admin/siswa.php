

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">

                <?php echo $this->session->flashdata('message');?>


                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Tambah <small>Data Siswa</small></h3>
                        </div>
                        <div class="block-content">
                            <form action="<?= base_url('p_admin/tambah_siswa'); ?>" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="nama">Nama Siswa</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="username">Username</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="password">Password</label>
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



                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Data <small>Siswa</small></h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Name</th>
                                        <th class="d-none d-sm-table-cell">Username</th>
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
                                        <td class="d-none d-sm-table-cell"><?= $s->username ?></td>
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
                                        <label for="side-overlay-profile-email">Nama</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="nama" placeholder="" value="<?= $a->nama ?>">
                                        </div>
                                        <label for="side-overlay-profile-email">username</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="username" placeholder="" value="<?= $a->username ?>">
                                        </div>
                                        <label for="side-overlay-profile-email">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" placeholder="" value="">
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




                
            </main>
            <!-- END Main Container -->

