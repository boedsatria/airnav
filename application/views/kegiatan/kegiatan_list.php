<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url().'program' ?>">Program</a></li>
                <li class="breadcrumb-item active"><a><?= $kegiatan[0]['nama_program']?></a></li>
            </ol>
        </div>

        <div class="row">
            <div class="mb-3 col-xl-12">
                <div class="float-end text-end col-md-3">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-rounded btn-primary"><span class="btn-icon-start text-primary"><i class="fa fa-plus color-primary"></i></span>Tambah Kegiatan</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addModal">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="<?= base_url() ?>kegiatan/add_action" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Kegiatan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="mb-3 col-md-8">
                                            <label class="form-label">Kode Kegiatan</label>
                                            <input type="text" class="form-control" name="kode_kegiatan" placeholder="Kode Kegiatan">
                                        </div>
                                        
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Nama Kegiatan</label>
                                            <input type="text" class="form-control" name="nama_kegiatan" placeholder="Nama Kegiatan">
                                            <input type="hidden" name="parent_kegiatan" value="<?= $kegiatan[0]['id_program'] ?>">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning light" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Tambah</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pb-2">
                        <div class="table-responsive">
                            <table class="table table-head-mid table-list i-table style-1 mb-4 border-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Kode</th> -->
                                        <th>Nama Kegiatan</th>
                                        <!-- <th>Jumlah <br>Sub Kegiatan</th> -->
                                        <!-- <th>PAGU</th> -->

                                        <th>Total <br>Nilai <br> Kontrak</th>
                                        <th>PROGRESS <br>KEUANGAN <br> (Rp)</th>
                                        <th>PROGRESS <br>KEUANGAN <br> (%)</th>
                                        <th>PROGRESS <br>FISIK</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($kegiatan as $i => $k) : 
                                    
                                    $pfp = progres_fisik_kegiatan($k['id_kegiatan']);    
                                    $ppkp = progres_persen_keuangan_kegiatan($k['id_kegiatan']);    
                                    $pnkp = progres_nilai_keuangan_kegiatan($k['id_kegiatan']);    
                                    $tnk = total_nilai_kontrak_kegiatan($k['id_kegiatan']);    
                                        
                                    ?>
                                        <tr>
                                            <td><?= $i + 1 ?></td>
                                            <!-- <td><?= $k['kode_kegiatan'] ?></td> -->
                                            <td><strong><a href="<?= base_url(); ?>sub_kegiatan/list/<?= $k['id_kegiatan'] ?>"><?= $k['nama_kegiatan'] ?></a></strong></td>
                                            <!-- <td><?= count_data($k['id_kegiatan'], 'sub_kegiatan') ?></td> -->
                                            <!-- <td align="right"><?= rupiah($k['pagu_kegiatan']) ?></td> -->

                                            <td align="right"><?= rupiah($tnk) ?></td>
                                            <td align="right"><?= rupiah($pnkp) ?></td>
                                            <td align="center"><?= pmeter($ppkp) ?></td>
                                            <td align="center"><?= pmeter($pfp) ?></td>
                                            
                                            <td nowrap>
                                                <div class="dropdown dropstart">
                                                    <a class="btn-link cursor" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots" style="font-size: 24px;color:#252525;"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="<?= base_url(); ?>kegiatan/edit/<?= $k['id_kegiatan'].'/'.$k['tahun_program'] ?>">Ubah</a>
                                                        <a class="dropdown-item cursor" data-bs-toggle="modal" data-bs-target="#del<?= $k['id_kegiatan'] ?>">Hapus</a>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="del<?= $k['id_kegiatan'] ?>">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Kegiatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><?= $k['nama_kegiatan'] ?> akan dihapus?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning light" data-bs-dismiss="modal">Batal</button>
                                                        <a href="<?= base_url(); ?>kegiatan/delete/<?= $k['id_kegiatan'].'/'.$k['parent_kegiatan'] ?>" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->