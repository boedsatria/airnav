<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">

            <div class="mb-3 col-xl-12">
                <div class="col-md-3">
                    <form method="POST">
                        <select class="default-select form-control wide" name="year" onchange="this.form.submit()">
                            <?php 
                            $year = (isset($_POST['year']) ? $_POST['year'] : date('Y'));
                            for($i = 2021; $i <= date('Y'); $i++): 
                            ?>
                                <option value="<?= $i ?>" <?= ($year == $i ? 'selected' : '') ?>> <?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </form>
                </div>
                <div class="float-end text-end col-md-3">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-rounded btn-primary"><span class="btn-icon-start text-primary"><i class="fa fa-plus color-primary"></i></span>Tambah Program</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addModal">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="<?= base_url() ?>program/add_action" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Program</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="mb-3 col-md-8">
                                            <label class="form-label">Kode Program</label>
                                            <input type="text" class="form-control" name="kode_program" placeholder="Kode Program">
                                        </div>
                                        
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Tahun</label>
                                            <select class="default-select form-control wide" name="tahun_program">
                                                <?php for($i = 2021; $i <= 2022; $i++): ?>
                                                <option value="<?= $i ?>" <?= (date('Y') == $i ? 'selected' : '') ?>> <?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Nama Program</label>
                                            <input type="text" class="form-control" name="nama_program" placeholder="Nama Program">
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
                                        <th>Nama Program</th>
                                        <!-- <th>Jumlah <br>Kegiatan</th> -->
                                        <!-- <th>Pagu</th> -->

                                        <th>Total <br>Nilai <br> Kontrak</th>
                                        <th>PROGRESS <br>KEUANGAN <br> (Rp)</th>
                                        <th>PROGRESS <br>KEUANGAN <br> (%)</th>
                                        <th>PROGRESS <br>FISIK</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(count($program) > 0):
                                        foreach($program as $i => $p): 
                                        
                                        $pfp = progres_fisik_program($p['id_program']);    
                                        $ppkp = progres_persen_keuangan_program($p['id_program']);    
                                        $pnkp = progres_nilai_keuangan_program($p['id_program']);    
                                        $tnk = total_nilai_kontrak_program($p['id_program']);    

                                        ?>
                                        <tr>
                                            <td><?= $i+1 ?></td>
                                            <td><strong><a href="<?= base_url(); ?>kegiatan/list/<?= $p['id_program'] ?>"><?= $p['nama_program'] ?></a></strong></td>
                                            <!-- <td><?= count_data($p['id_program'], 'kegiatan') ?></td> -->
                                            <!-- <td align="right"><?= rupiah($p['pagu_program']) ?></td> -->

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
                                                        <a class="dropdown-item" href="<?= base_url(); ?>program/edit/<?= $p['id_program'] ?>">Ubah</a>
                                                        <a class="dropdown-item cursor" data-bs-toggle="modal" data-bs-target="#del<?= $p['id_program'] ?>">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="del<?= $p['id_program'] ?>">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Program</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><?= $p['nama_program'] ?> akan dihapus?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning light" data-bs-dismiss="modal">Batal</button>
                                                        <a href="<?= base_url(); ?>program/delete/<?= $p['id_program'] ?>" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                        
                                        endforeach; 
                                    else:
                                        echo '<tr><td colspan="8" align="center">Tidak ada Data</td></tr>';
                                    endif;
                                    ?>
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