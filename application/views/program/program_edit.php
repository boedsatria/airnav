<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?= base_url() ?>program/edit_action" method="POST">

                                <div class="row">
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">Kode Program</label>
                                        <input type="hidden" name="id_program" value="<?= $p['id_program'] ?>">
                                        <input type="text" class="form-control" name="kode_program" value="<?= $p['kode_program'] ?>" placeholder="Kode Program">
                                    </div>
                                    <div class="mb-3 col-md-7">
                                        <label class="form-label">Nama Program</label>
                                        <input type="text" class="form-control" name="nama_program" value="<?= $p['nama_program'] ?>" placeholder="Nama Program">
                                    </div>
                                    
                                    <div class="mb-3 col-md-2">
                                        <label class="form-label">Tahun</label>
                                        <select class="default-select form-control wide" name="tahun_program">
                                            <?php for($i = 2022; $i <= 2022; $i++): ?>
                                            <option value="<?= $i ?>" <?= ($p['tahun_program'] == $i ? 'selected' : '') ?>> <?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
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