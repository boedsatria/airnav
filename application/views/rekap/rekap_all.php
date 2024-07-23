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
            </div>


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pb-2">
                        <div class="table-responsive">
                            <table class="table-head-mid table table-bordered table-responsive-sm cfs-sm">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <!-- <th>Kode</th> -->
                                        <th rowspan="2">Bidang</th>
                                        <th colspan="2">PAGU ANGGARAN (Rp)</th>
                                        <th colspan="2">JUMLAH PAKET</th>
                                        <th colspan="2">SPK TERBIT</th>
                                        <th colspan="2">RENCANA LELANG</th>
                                        <th colspan="4">REALISASI FISIK SELESAI</th>
                                    </tr>
                                    <tr>
                                        <th>PL</th>
                                        <th>L</th>
                                        <th>PL</th>
                                        <th>L</th>
                                        <th>PL</th>
                                        <th>L</th>
                                        <th>PL</th>
                                        <th>L</th>
                                        <th>PL</th>
                                        <th>%</th>
                                        <th>L</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $total_papl = 0;
                                    $total_pal = 0;
                                    $total_jppl = 0;
                                    $total_jpl = 0;
                                    $total_spkpl = 0;
                                    $total_spkl = 0;
                                    $total_stpl = 0;
                                    $total_rpl = 0;
                                    $total_rl = 0;
                                    $total_stl = 0;
                                    foreach ($pekerjaan as $i => $pk) : 
                                        $persen_pls = ($pk['jml_pl'] == 0 ? 0 : $pk['selesai_pl']/$pk['jml_pl'] *100);
                                        $persen_ls = ($pk['jml_lelang'] == 0 ? 0 : $pk['selesai_lelang']/$pk['jml_lelang'] *100);
                                        $ren_pl = $pk['jml_pl']-$pk['spk_pl'];
                                        $ren_l = $pk['jml_lelang']-$pk['spk_lelang'];
                                    ?>
                                        <tr>
                                            <td><?= $i+1 ?></td>
                                            <td><?= nama_bidang($pk['bidang_pekerjaan']) ?></td>
                                            <td align="right"><?= rupiah($pk['pagu_pl']) ?></td>
                                            <td align="right"><?= rupiah($pk['pagu_lelang']) ?></td>
                                            <td align="right"><?= $pk['jml_pl'] ?></td>
                                            <td align="right"><?= $pk['jml_lelang'] ?></td>

                                            <td align="right"><?= $pk['spk_pl'] ?></td>
                                            <td align="right"><?= $pk['spk_lelang'] ?></td>

                                            <td align="right"><?= $ren_pl ?></td>
                                            <td align="right"><?= $ren_l ?></td>

                                            <td align="right"><?= $pk['selesai_pl'] ?></td>
                                            <td align="right"><?= pmeter($persen_pls) ?></td>
                                            <td align="right"><?= $pk['selesai_lelang'] ?></td>
                                            <td align="right"><?= pmeter($persen_ls) ?></td>
                                        
                                        </tr>
                                        
                                    <?php 
                                    $total_papl += $pk['pagu_pl'];
                                    $total_pal += $pk['pagu_lelang'];
                                    $total_jppl += $pk['jml_pl'];
                                    $total_jpl += $pk['jml_lelang'];
                                    $total_spkpl += $pk['spk_pl'];
                                    $total_spkl += $pk['spk_lelang'];
                                    $total_stpl += $pk['selesai_pl'];
                                    $total_stl += $pk['selesai_lelang'];
                                    $total_rpl += $ren_pl;
                                    $total_rl += $ren_l;
                                    endforeach; 
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th align="right"><?= rupiah($total_papl) ?></th>
                                        <th align="right"><?= rupiah($total_pal) ?></th>
                                        <th align="right"><?= $total_jppl ?></th>
                                        <th align="right"><?= $total_jpl ?></th>
                                        <th align="right"><?= $total_spkpl ?></th>
                                        <th align="right"><?= $total_spkl ?></th>
                                        <th align="right"><?= $total_rpl ?></th>
                                        <th align="right"><?= $total_rl ?></th>
                                        <th align="right"><?= $total_stpl ?></th>
                                        <th></th>
                                        <th align="right"><?= $total_stl ?></th>
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