<!--**********************************
            Content body start
        ***********************************-->
<?php
$file = base_url() . 'uploads/users/' . $u['foto_user'];
$file_headers = @get_headers($file);

if ($file_headers[0] == 'HTTP/1.1 404 Not Found' || $u['foto_user'] == '') {
    $foto =  base_url() . 'images/no_avatar.jpg';
} else {
    $foto = $file;
}
?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card h-auto">
                            <div class="card-body profile-bx">
                                <div class="profile-media">
                                    <div class="d-flex align-items-center align-items-sm-start">
                                        <img src="<?= $foto ?>" alt="">
                                        <div class="media-content">
                                            <h3 class="fs-21"><?= $u['nama_user'] ?></h3>
                                            <p class="fs-16 mb-0"><?= $u['nik_user'] ?></p>
                                        </div>
                                    </div>
                                    <div class="dropdown dropstart">
                                        <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots" style="font-size: 24px;color:#252525;"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?= base_url() . 'user/edit/' . $u['id_user'] ?>">Edit</a>
                                            <a class="dropdown-item" href="<?= base_url() . 'user/delete/' . $u['id_user'] ?>">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card h-auto">
                            <div class="card-header border-0 pb-0">
                                <h4 class="fs-24 font-w800"><?= $u['nama_unitpengelola'] ?></h4>
                            </div>
                            <div class="card-body pt-0">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h5 class="fs-24 font-w500"><?= $u['nama_atasan'] ?></h5>
                                    <p class="m-0"><?= $u['nik_atasan'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event-Card-Start -->

            <div class="col-xl-12">
                <div class="card h-auto">
                    <div class="card-body profile-bx">
                        <table class="table data-table table-list i-table style-1 mb-4 border-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Pagu</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($program as $i => $p) : ?>
                                    <tr>
                                        <td><?= $i + 1 ?></td>
                                        <td><?= $p['kode_pekerjaan'] ?></td>
                                        <td><strong><?= $p['nama_pekerjaan'] ?></strong></td>
                                        <td align="right"><?= rupiah($p['pagu_pekerjaan']) ?></td>
                                        <td><a class="btn btn-sm btn-success" href="<?= base_url(); ?>pekerjaan/detail/<?= $p['id_pekerjaan'] ?>">Detail</a></td>
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
<!--**********************************
            Content body end
        ***********************************-->