<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="mb-3 col-xl-12">
                <div class="float-end text-end col-md-3">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-rounded btn-primary"><span class="btn-icon-start text-primary"><i class="fa fa-plus color-primary"></i></span>Tambah Pegawai</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addModal">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form action="<?= base_url() ?>user/add_action" method="POST" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h3 class="modal-title">Tambah Pegawai</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <ul class="row no-style">
                                            
                                            <li class="mb-3 col-md-4">
                                                NIP/NIK
                                                <div class="form-group">
                                                    <input class="form-control" name="nik_user">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-8">
                                                Nama Pegawai
                                                <div class="form-group">
                                                    <input class="form-control" name="nama_user">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-12">
                                                Password
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="password_user" autocomplete="new-password">
                                                </div>
                                            </li>

                                            <li class="mb-3 col-md-6">
                                                Unit Kerja
                                                <div class="form-group">
                                                    <select name="unit_user" class="default-select form-control wide">
                                                        <?php
                                                        foreach ($unit as $uv) :
                                                            $selected_sub = '';
                                                            echo '<option value="' . $uv['id_unitpengelola'] . '" ' . $selected_sub . '>' . $uv['nama_unitpengelola'] . '</option>';
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-6">
                                                Atasan
                                                <div class="form-group">
                                                    <select name="chief_user" class="default-select form-control wide">
                                                        <?php
                                                        foreach ($atasan as $a) :
                                                            echo '<option value="' . $a['id_user'] . '">' . $a['nama_user'] . '</option>';
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </li>

                                            <li class="mb-3 col-md-6">
                                                Photo
                                                <div class="form-group">
                                                    <input type="file" name="file" class="form-control">
                                                </div>
                                            </li>

                                            <li class="mb-3 col-md-6">
                                                Role
                                                <div class="form-group">
                                                    <select name="role_user" class="default-select form-control wide">
                                                        <?php
                                                        foreach ($role as $r) :
                                                            echo '<option value="' . $r['id_role'] . '">' . $r['nama_role'] . '</option>';
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </li>
                                                
                                            <li class="mb-3 col-md-12">
                                                Jabatan
                                                <div class="form-group">
                                                    <input class="form-control" name="jabatan_user">
                                                </div>
                                            </li>


                                        </ul>
                                        
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
                <div class="card h-auto">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table data-table table-list i-table style-1 mb-4 border-0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user as $i => $u) : 
                                    $file = base_url().'uploads/users/'.$u['foto_user'];
                                    $file_headers = @get_headers($file);
                                    
                                    if($file_headers[0] == 'HTTP/1.1 404 Not Found' || $u['foto_user'] == '') {
                                        $foto =  base_url().'images/no_avatar.jpg';
                                    }
                                    else {
                                        $foto = $file;
                                    }   
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="media-bx d-flex">
                                                <img class="me-3 rounded-circle" src="<?= $foto ?>" alt="images">
                                                <div>
                                                    <h4 class="mb-0 mt-1 fs-15 font-w500 text-nowrap text-nowrap"><a class="text-black" href="<?= base_url(); ?>user/detail/<?= $u['id_user'] ?>"><?= $u['nama_user'] ?></a></h4>
                                                    <span class="text-primary fs-16 font-w400 text-nowrap"><?= $u['nik_user'] ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $u['jabatan_user'] ?></td>
                                        <td><a class="btn btn-sm btn-success" href="<?= base_url(); ?>user/detail/<?= $u['id_user'] ?>">Detail</a></td>
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