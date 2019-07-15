

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">

                <?php echo $this->session->flashdata('message');?>              


                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Data <small>Kelas</small></h3>
                        </div>
                        <div class="block-content block-content-full">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-popin">+Tambah Kelas</button>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Kelas</th>
                                        <th>jurusan</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no=0;
                                foreach($kelas as $k){
                                $no++
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td> 
                                        <td class="font-w600"><?= $k->kelas ?></td>
                                        <td class="font-w600"><?= $k->jurusan ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-success" title="Ubah" data-toggle="modal" data-target="#modal-default<?= $k->id_kelas ?>">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <a href="<?= base_url('p_admin/hapus_kelas/'.$k->id_kelas) ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" onclick="return confirm('Anda yakin ingin menghapus siswa?')" title="Hapus">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                <?php } ?>
                                </tbody>
                            </table>

                            <?php foreach ($kelas as $k): ?>
                            <div class="modal fade" id="modal-default<?= $k->id_kelas ?>">                        
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title">Edit Kelas</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    
                                </div>
                                <div class="modal-body">
                                <form action="<?= base_url('p_admin/ubah_kelas') ?>" method="post" class="" enctype="multipart/form-data">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        <input type="hidden" name="id" class="form-control" value="<?= $k->id_kelas ?>">                     
                                        <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Kelas</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="nama" name="kelas" value="<?= $k->kelas ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Jurusan</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $k->jurusan ?>" required>
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
                            <h3 class="block-title">Tambah Kelas</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                        <form action="<?= base_url('p_admin/tambah_kelas'); ?>" method="post">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Kelas</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="kelas" name="kelas" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama">Jurusan</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" id="jurusan" name="jurusan" required>
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

