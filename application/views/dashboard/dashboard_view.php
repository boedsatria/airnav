<!--**********************************
            Content body start
***********************************-->
<?php 
    $year = (isset($_POST['year']) ? $_POST['year'] : date('Y'));
?>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-12">
                <div class="card h-auto">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-xl-4 col-lg-12">
                                <div class="income-data d-flex align-items-center justify-content-xl-start justify-content-between mb-3">
                                    <span class=" income-icon style-1 me-4">
                                        <i class="bi-arrow-down-up" style="font-size: 22px;color: #FFF;"></i>
                                    </span>
                                    <div>
                                        <h2 class="font-w600 mb-0 income-value"><?= rupiah(get_anggaran($year)/1000000000) ?>M</h2>
                                        <span class=" fs-6 font-w500">Total Anggaran</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-6">
                                <div class="card trading mb-3">
                                    <div class="card-body">
                                        <div class="income-data d-flex justify-content-between align-items-center mb-sm-0 mb-2 ps-lg-0">
                                            <div>
                                                <h3 class="font-w600 fs-2 mb-0 text-white"><?= get_pekerjaan($year)?></h3>
                                                <span class="fs-6 font-w500 text-white">Total Kegiatan</span>
                                            </div>
                                            <span class="income-icon style-2">
                                                <i class="bi bi-building" style="font-size: 22px;color: #FFF;"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="card booking mb-3">
                                    <div class="card-body">
                                        <div class="income-data d-flex justify-content-between align-items-center mb-sm-0 mb-2  mb-sm-0 mb-2 ps-lg-0 ">
                                            <div>
                                                <h3 class="font-w600 fs-2 mb-0"><?= get_selesai($year)?></h3>
                                                <span class="fs-6 font-w500">Kegiatan Selesai</span>
                                            </div>
                                            <span class="income-icon style-3">
                                                <i class="bi bi-clipboard-check" style="font-size: 22px;"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h3 class="mb-0">Data Pekerjaan</h3>
                            </div>
                            <div class="card-body pb-2">
                                <!-- <div id="pieChart1" data-chart="[]"></div> -->
                                <div class="d-flex justify-content-between pt-3 pt-sm-5 flex-wrap">
                                    <span><span class="pills-lable bg-dark me-2"></span>Pekerjaan</span>
                                    <h4><?= get_pekerjaan($year) ?></h4>
                                </div>
                                <div class="d-flex justify-content-between flex-wrap">
                                    <span><span class="pills-lable bg-dark me-2"></span>Sub Kegiatan</span>
                                    <h4><?= get_sub_kegiatan($year) ?></h4>
                                </div>
                                <div class="d-flex justify-content-between flex-wrap">
                                    <span><span class="pills-lable me-2"></span>Kegiatan</span>
                                    <h4><?= get_kegiatan($year) ?></h4>
                                </div>
                                <div class="d-flex justify-content-between flex-wrap">
                                    <span><span class="pills-lable me-2"></span>Program</span>
                                    <h4><?= get_program($year) ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card availability line">
                            <div class="card-header border-0">
                                <h3>Peta Pekerjaan Fisik</h3>
                            </div>
                            <div class="card-body pt-2">

                                <div id="map" style="width: 100%; height: 400px">
                                    <!-- Popup -->
                                    <div id="popup" title="Pekerjaan Konstruksi"></div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>



                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h3 class="mb-0 w-100">
                                    Progres Kegiatan
                                    <div class="float-end text-end">
                                        <form method="POST">
                                            <select class="default-select form-control wide" name="year" onchange="this.form.submit()">
                                                <?php 
                                                for($i = 2021; $i <= date('Y'); $i++): 
                                                ?>
                                                    <option value="<?= $i ?>" <?= ($year == $i ? 'selected' : '') ?>> <?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </form>
                                    </div>

                                </h3>
                            </div>
                            <div class="card-body pb-2">
                                <div class="table-responsive">
                                    <table class="table table-list table-head-mid i-table style-1 mb-4 border-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Program</th>

                                                <th>Total <br>Nilai <br> Kontrak</th>
                                                <th>PROGRESS <br>KEUANGAN <br> (Rp)</th>
                                                <th>PROGRESS <br>KEUANGAN <br> (%)</th>
                                                <th>PROGRESS <br>FISIK</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($program as $i => $p) : 
                                            
                                            $pfp = progres_fisik_program($p['id_program']);    
                                            $ppkp = progres_persen_keuangan_program($p['id_program']);    
                                            $pnkp = progres_nilai_keuangan_program($p['id_program']);    
                                            $tnk = total_nilai_kontrak_program($p['id_program']);    
                                                
                                            ?>
                                                <tr>
                                                    <td><?= $i + 1 ?></td>
                                                    <td><strong><a href="<?= base_url(); ?>kegiatan/list/<?= $p['id_program'] ?>"><?= $p['nama_program'] ?></strong></a></td>

                                                    <td align="right"><?= rupiah($tnk) ?></td>
                                                    <td align="right"><?= rupiah($pnkp) ?></td>
                                                    <td align="center"><?= pmeter($ppkp) ?></td>
                                                    <td align="center"><?= pmeter($pfp) ?></td>

                                                </tr>
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
    </div>
</div>

<!--**********************************
            Content body end
        ***********************************-->