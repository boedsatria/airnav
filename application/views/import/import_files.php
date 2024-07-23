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
                            <form action="<?= base_url() ?>import/import_action" method="POST" enctype="multipart/form-data">

                                <ul class="row no-style">

                                    <li class="mb-3 col-md-6">
                                        Tahun
                                        <div class="form-group">
                                            <select class="default-select form-control wide" name="year" onchange="this.form.submit()">
                                                <?php
                                                $year = (isset($_POST['year']) ? $_POST['year'] : date('Y'));
                                                for ($i = 2021; $i <= date('Y') + 1; $i++) :
                                                ?>
                                                    <option value="<?= $i ?>" <?= ($year == $i ? 'selected' : '') ?>> <?= $i ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-6">
                                        Import File
                                        <div class="form-group">
                                            <input class="form-control" name="files" type="file">
                                        </div>
                                    </li>

                                </ul>


                                <div class="my-5 text-end">
                                    <button type="submit" class="btn btn-primary">Import</button>
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