<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row">

            <div class="mb-3 col-xl-12">
                <form method="POST" class="row">
                    <div class="col-md-3">
                        <select class="default-select form-control wide" name="year">
                            <?php 
                            $year = (isset($_POST['year']) ? $_POST['year'] : date('Y'));
                            for($i = 2021; $i <= date('Y'); $i++): 
                            ?>
                                <option value="<?= $i ?>" <?= ($year == $i ? 'selected' : '') ?>> <?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select class="default-select form-control wide" name="pptk">
                            <?php 
                            $sp = (isset($_POST['pptk']) ? $_POST['pptk'] : '');
                            foreach($pptk as $pv): 
                            ?>
                                <option value="<?= $pv['nama_user'] ?>" <?= ($sp == $pv['nama_user'] ? 'selected' : '') ?>> <?= $pv['nama_user'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Pilih</button>
                    </div>
                </form>
            </div>


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pb-2">
                        <div class="table-responsive">
                            <table class="table-head-mid table table-bordered table-responsive-sm cfs-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NAMA</th>
                                        <th>UNIT KERJA</th>
                                        <th>JUMLAH PAKET</th>
                                        <th>FISIK SELESAI</th>
                                        <th>PHO</th>
                                        <th>BA</th>
                                        <th>SPM</th>
                                        <th>SP2D</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pekerjaan as $i => $pk) : ?>
                                        <tr>
                                            <td><?= $i+1 ?></td>
                                            <td><?= $pk['pptk_pekerjaan'] ?></td>
                                            <td><?= $pk['jabatan_user'] ?></td>
                                            <td align="right"><?= $pk['jml_paket'] ?></td>
                                            <td align="right"><?= $pk['selesai_fisik'] ?></td>

                                            <td align="right"><?= $pk['jml_pho'] ?></td>
                                            <td align="right"><?= $pk['jml_ba'] ?></td>
                                            <td align="right"><?= $pk['jml_spm'] ?></td>
                                            <td align="right"><?= $pk['jml_sp2d'] ?></td>
                                        
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
<!--**********************************
            Content body end
        ***********************************-->