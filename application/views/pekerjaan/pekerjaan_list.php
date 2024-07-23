<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'program' ?>">Program</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() . 'kegiatan/list/' . $pekerjaan[0]['id_program'] ?>"><?= $pekerjaan[0]['nama_program'] ?></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() . 'sub_kegiatan/list/' . $pekerjaan[0]['id_kegiatan'] ?>"><?= $pekerjaan[0]['nama_kegiatan'] ?></a></li>
                <?php if($this->uri->segment(2) == 'sub_pekerjaan'): ?>
                    <li class="breadcrumb-item"><a href="<?= base_url() . 'pekerjaan/list/' . $pekerjaan[0]['id_sub_kegiatan'] ?>"><?= $pekerjaan[0]['nama_sub_kegiatan'] ?></a></li>
                    <li class="breadcrumb-item active"><a><?= get_nama_pekerjaan($pekerjaan[0]['sub_pekerjaan']) ?></a></li>
                <?php else : ?>
                    <li class="breadcrumb-item active"><a><?= $pekerjaan[0]['nama_sub_kegiatan'] ?></a></li>
                <?php endif; ?>
            </ol>
        </div>

        <div class="row">
            <div class="mb-3 col-xl-12">
                <div class="float-end text-end col-md-3">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-rounded btn-primary"><span class="btn-icon-start text-primary"><i class="fa fa-plus color-primary"></i></span>Tambah Pekerjaan</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addModal">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form action="<?= base_url() ?>pekerjaan/add_action" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Pekerjaan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <ul class="row no-style">
                                            <li class="mb-3 col-md-4">
                                                Kode Sub Kegiatan
                                                <div class="form-group">
                                                    <input class="form-control" readonly value="<?= $pekerjaan[0]['kode_sub_kegiatan']; ?>">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-8">
                                                Nama Sub Kegiatan
                                                <div class="form-group">
                                                    <input class="form-control" readonly value="<?= $pekerjaan[0]['nama_sub_kegiatan']; ?>">
                                                </div>
                                            </li>

                                            

                                            <li class="mb-3 col-md-4 mt-3">
                                                Kode Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control" name="kode_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-8 mt-3">
                                                Nama Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control" name="nama_pekerjaan">
                                                    <input type="hidden" name="parent_pekerjaan" value="<?= $pekerjaan[0]['id_sub_kegiatan']; ?>">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-6 mt-3">
                                                Kelurahan
                                                <div class="form-group">
                                                    <input class="form-control" name="kelurahan_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-6 mt-3">
                                                Kecamatan
                                                <div class="form-group">
                                                    <input class="form-control" name="kecamatan_pekerjaan">
                                                </div>
                                            </li>

                                            <li class="mb-3 col-md-3">
                                                Pagu
                                                <div class="form-group">
                                                    <input class="form-control inputnumber text-end" name="pagu_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-3">
                                                Nilai Kontrak
                                                <div class="form-group">
                                                    <input class="form-control inputnumber text-end" name="nilai_kontrak_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-3" hidden>
                                                Sumber Dana
                                                <div class="form-group">
                                                    <input class="form-control" name="sumber_dana_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-6">
                                                Jenis Pekerjaan
                                                <div class="form-group">
                                                    <select name="jenis_pekerjaan" class="default-select form-control wide">
                                                        <option value="LELANG">LELANG</option>
                                                        <option value="PL">PL</option>
                                                    </select>
                                                </div>
                                            </li>

                                            <li class="mb-3 col-md-6">
                                                PPK
                                                <div class="form-group">
                                                    <select name="ppk_pekerjaan" class="form-control select2">
                                                        <?php
                                                        foreach ($ppk as $uv) :
                                                            $selected_ppk = '';
                                                            echo '<option value="' . $uv['nama_user'] . '" ' . $selected_ppk . '>' . $uv['nama_user'] . '</option>';
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-6">
                                                PPTK
                                                <div class="form-group">
                                                    <select name="pptk_pekerjaan" class="form-control select2">
                                                        <?php
                                                        foreach ($pptk as $uv) :
                                                            $selected_pptk = '';
                                                            echo '<option value="' . $uv['nama_user'] . '" ' . $selected_pptk . '>' . $uv['nama_user'] . '</option>';
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </li>


                                            <li class="mb-3 col-md-6" hidden>
                                                Bidang Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control" name="bidang_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-3">
                                                Hari Kalender
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="waktu_pekerjaan">
                                                </div>
                                            </li>

                                            <li class="mb-3 col-md-12">
                                                Vendor
                                                <div class="form-group">
                                                    <select name="vendor_pekerjaan" class="form-control select2">
                                                        <?php
                                                        foreach ($vendor as $ven) :
                                                            $selected_ven = '';
                                                            echo '<option value="' . $ven['nama_perusahaan'] . '" ' . $selected_ven . '>' . $ven['nama_perusahaan'] . '</option>';
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </li>

                                            <li class="mb-3 col-md-4">
                                                No SPK
                                                <div class="form-group">
                                                    <input class="form-control" name="no_spk_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4">
                                                Tanggal SPK
                                                <div class="form-group">
                                                    <input class="form-control datepicker" name="tgl_spk_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4">
                                                Tanggal Akhir SPK
                                                <div class="form-group">
                                                    <input class="form-control datepicker" name="tgl_akhir_spk_pekerjaan">
                                                </div>
                                            </li>

                                            <li class="mb-3 col-md-4">
                                                Panjang Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="p_kontrak_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4">
                                                Lebar Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="l_kontrak_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4">
                                                Tinggi Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="t_kontrak_pekerjaan">
                                                </div>
                                            </li>

                                            <li class="mb-3 col-md-4">
                                                Panjang Adendum Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="p_adendum_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4">
                                                Lebar Adendum Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="l_adendum_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4">
                                                Tinggi Adendum Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="t_adendum_pekerjaan">
                                                </div>
                                            </li>

                                            <li class="mb-3 col-md-4">
                                                Panjang Pemeriksaan Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="p_pemeriksaan_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4">
                                                Lebar Pemeriksaan Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="l_pemeriksaan_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4">
                                                Tinggi Pemeriksaan Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="t_pemeriksaan_pekerjaan">
                                                </div>
                                            </li>


                                            <li class="mb-3 col-md-3" hidden>
                                                Bobot TKDN
                                                <div class="input-group">
                                                    <input class="form-control text-end" name="tkdn_bobot_pekerjaan">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-3" hidden>
                                                Nominal TKDN
                                                <div class="form-group">
                                                    <input class="form-control inputnumber text-end" name="tkdn_jumlah_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-3" hidden>
                                                Bobot TKLN
                                                <div class="input-group">
                                                    <input class="form-control text-end" name="tkln_bobot_pekerjaan">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-3" hidden>
                                                Nominal TKLN
                                                <div class="form-group">
                                                    <input class="form-control inputnumber text-end" name="tkln_jumlah_pekerjaan">
                                                </div>
                                            </li>


                                            <li class="mb-3 col-md-6" hidden>
                                                Jenis Kontruksi
                                                <div class="form-group">
                                                    <input class="form-control" name="jenis_kontruksi_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-6">
                                                PHO Coredrill
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="pho_core_pekerjaan">
                                                </div>
                                            </li>


                                            <li class="mb-3 col-md-4">
                                                BA PPTK
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="ba_pptk_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4">
                                                SPM
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="spm_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4">
                                                SP2D
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="sp2d_pekerjaan">
                                                </div>
                                            </li>


                                            <li class="mb-3 col-md-6" hidden>
                                                Longitude
                                                <div class="form-group">
                                                    <input class="form-control" name="lon_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-6" hidden>
                                                Latitude
                                                <div class="form-group">
                                                    <input class="form-control" name="lat_pekerjaan">
                                                </div>
                                            </li>

                                            <li class="mb-3 col-md-6">
                                                Progress Nilai Keuangan
                                                <div class="form-group">
                                                    <input class="form-control inputnumber text-end" name="progres_nilai_keuangan_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4" hidden>
                                                Progress Persentase Keuangan
                                                <div class="input-group">
                                                    <input class="form-control text-end" name="progres_persen_keuangan_pekerjaan">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-6">
                                                Progress Fisik
                                                <div class="input-group">
                                                    <input class="form-control text-end" name="progres_fisik_pekerjaan">
                                                    <span class="input-group-text">%</span>
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
                <div class="card">
                    <div class="card-body pb-2">
                        <div class="table-responsive">
                            <table class="data-table table-head-mid display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Kode</th> -->
                                        <th>Nama Paket</th>
                                        <th>Nama PPK / PPTK</th>
                                        <!-- <th>Nama PPTK</th> -->
                                        <th>Nilai kontrak</th>
                                        <th>PROGRESS <br>KEUANGAN <br> (Rp)</th>
                                        <th>PROGRESS <br>KEUANGAN <br> (%)</th>
                                        <th>PROGRESS <br>FISIK</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pekerjaan as $i => $pk) : ?>
                                        <tr>
                                            <td><?= $pk['id_pekerjaan'] ?></td>
                                            <!-- <td><?= $pk['kode_pekerjaan'] ?></td> -->
                                            <td>
                                                <strong><a href="<?= base_url(); ?>pekerjaan/detail/<?= $pk['id_pekerjaan'] ?>"><?= $pk['nama_pekerjaan'] ?></a></strong>
                                                <?php if(has_sub($pk['id_pekerjaan']) > 0): ?>
                                                    <br>(memiliki <?= has_sub($pk['id_pekerjaan']) ?> sub paket Pekerjaan)
                                                <?php endif; ?>
                                            </td>
                                            <td><strong><?= $pk['ppk_pekerjaan'] ?><hr><?= $pk['pptk_pekerjaan'] ?></strong></td>
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