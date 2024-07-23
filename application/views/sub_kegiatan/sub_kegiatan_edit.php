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
                            <form action="<?= base_url() ?>sub_kegiatan/edit_action" method="POST">

                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Kode Sub Kegiatan</label>
                                        <input type="hidden" name="id_sub_kegiatan" value="<?= $sk['id_sub_kegiatan'] ?>">
                                        <input type="hidden" name="parent_sub_kegiatan" value="<?= $sk['parent_sub_kegiatan'] ?>">
                                        <input type="text" class="form-control" name="kode_sub_kegiatan" value="<?= $sk['kode_sub_kegiatan'] ?>" placeholder="Kode Sub Kegiatan">
                                    </div>
                                    <div class="mb-3 col-md-8">
                                        <label class="form-label">Nama Sub Kegiatan</label>
                                        <textarea class="form-control" name="nama_sub_kegiatan"><?= $sk['nama_sub_kegiatan'] ?></textarea>
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