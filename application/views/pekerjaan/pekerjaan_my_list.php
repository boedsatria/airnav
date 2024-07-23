<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pb-2">
                        <div class="table-responsive">
                            <table class="data-table table-head-mid display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Kode</th> -->
                                        <th>Nama Paket</th>
                                        <th>Nilai kontrak</th>
                                        <th>PROGRESS <br>KEUANGAN <br> (Rp)</th>
                                        <th>PROGRESS <br>KEUANGAN <br> (%)</th>
                                        <th>PROGRESS <br>FISIK</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $nk = 0;
                                    $pkr = 0;
                                    $pkp = 0;
                                    $pf = 0;
                                    $jml = count($pekerjaan);
                                    foreach ($pekerjaan as $i => $pk) : ?>
                                        <tr>
                                            <td><?= $pk['id_pekerjaan'] ?></td>
                                            <!-- <td><?= $pk['kode_pekerjaan'] ?></td> -->
                                            <td>
                                                <strong><a href="<?= base_url(); ?>pekerjaan/detail/<?= $pk['id_pekerjaan'] ?>"><?= $pk['nama_pekerjaan'] ?></a></strong>
                                                <?php if(has_sub($pk['id_pekerjaan']) > 0): ?>
                                                    <br>(memiliki <?= has_sub($pk['id_pekerjaan']) ?> sub paket Pekerjaan)
                                                <?php endif; ?>
                                            </td>
                                            <td align="right"><?= rupiah($pk['nilai_kontrak_pekerjaan']) ?></td>
                                            <td align="right"><?= rupiah($pk['progres_nilai_keuangan_pekerjaan']) ?></td>
                                            <td align="center"><?= pmeter($pk['progres_persen_keuangan_pekerjaan']) ?></td>
                                            <td align="center"><?= pmeter($pk['progres_fisik_pekerjaan']) ?></td>

                                            <td nowrap>
                                                <div class="dropdown dropstart">
                                                    <a class="btn-link cursor" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots" style="font-size: 24px;color:#252525;"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="<?= base_url(); ?>pekerjaan/edit/<?= $pk['id_pekerjaan'] ?>">Ubah</a>
                                                        <a class="dropdown-item cursor" data-bs-toggle="modal" data-bs-target="#del<?= $pk['id_pekerjaan'] ?>">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="del<?= $pk['id_pekerjaan'] ?>">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Pekerjaan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><?= $pk['nama_pekerjaan'] ?> akan dihapus?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a type="button" class="btn btn-warning light" data-bs-dismiss="modal">Batal</button>
                                                        <a href="<?= base_url(); ?>pekerjaan/delete/<?= $pk['id_pekerjaan'].'/'.$pk['parent_pekerjaan'] ?>" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php 
                                    $nk += $pk['nilai_kontrak_pekerjaan'];
                                    $pkr += $pk['progres_nilai_keuangan_pekerjaan'];
                                    $pkp += $pk['progres_persen_keuangan_pekerjaan'];
                                    $pf += $pk['progres_fisik_pekerjaan'];
                                    endforeach; 
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th align="right">TOTAL</th>
                                        <th align="right"><?= rupiah($nk) ?></th>
                                        <th align="right"><?= rupiah($pkr) ?></th>
                                        <th align="center"><?= floatval(number_format($pkr/$nk*100,2)) ?>%</th>
                                        <th align="center"><?= floatval(number_format($pf/$jml,2)) ?>%</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
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