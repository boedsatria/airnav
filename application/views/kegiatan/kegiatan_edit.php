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
                            <form action="<?= base_url() ?>kegiatan/edit_action" method="POST">

                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Nama Program</label>
                                        <select name="parent_kegiatan" class="default-select form-control wide">
                                            <?php
                                            foreach ($program as $p) :
                                                $selected = '';
                                                if ($k['parent_kegiatan'] == $p['id_program']) $selected = 'selected';
                                                echo '<option value="' . $p['id_program'] . '" ' . $selected . '>' . $p['nama_program'] . '</option>';
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Kode Kegiatan</label>
                                        <input type="hidden" name="id_kegiatan" value="<?= $k['id_kegiatan'] ?>">
                                        <input type="text" class="form-control" name="kode_kegiatan" value="<?= $k['kode_kegiatan'] ?>" placeholder="Kode Kegiatan">
                                    </div>
                                    <div class="mb-3 col-md-8">
                                        <label class="form-label">Nama Kegiatan</label>
                                        <input type="text" class="form-control" name="nama_kegiatan" value="<?= $k['nama_kegiatan'] ?>" placeholder="Nama Kegiatan">
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