<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'program' ?>">Program</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() . 'kegiatan/list/' . $sk['id_program'] ?>"><?= $sk['nama_program'] ?></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() . 'sub_kegiatan/list/' . $sk['id_kegiatan'] ?>"><?= $sk['nama_kegiatan'] ?></a></li>
                
                    <li class="breadcrumb-item"><a href="<?= base_url() . 'pekerjaan/list/' . $sk['id_sub_kegiatan'] ?>"><?= $sk['nama_sub_kegiatan'] ?></a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() . 'pekerjaan/detail/' . $sk['id_pekerjaan'] ?>"><?= $sk['nama_pekerjaan'] ?></a></li>
                    
                    <li class="breadcrumb-item active"><a><?= $sp['nama_sub_pekerjaan'] ?></a></li>
                    
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
                                                    <input type="hidden" name="parent_sub_pekerjaan" value="<?= $sk['id_pekerjaan']; ?>">
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
                                                        foreach ($user as $uv) :
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
                                                        foreach ($user as $uv) :
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
                                            <li class="mb-3 col-md-3" hidden>
                                                Waktu Pekerjaan
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

                                            <li class="mb-3 col-md-4" hidden>
                                                No SPK
                                                <div class="form-group">
                                                    <input class="form-control" name="no_spk_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4" hidden>
                                                Tanggal SPK
                                                <div class="form-group">
                                                    <input class="form-control datepicker" name="tgl_spk_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4" hidden>
                                                Tanggal Akhir SPK
                                                <div class="form-group">
                                                    <input class="form-control datepicker" name="tgl_akhir_spk_pekerjaan">
                                                </div>
                                            </li>

                                            <li class="mb-3 col-md-4" hidden>
                                                Panjang Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="p_kontrak_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4" hidden>
                                                Lebar Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="l_kontrak_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4" hidden>
                                                Tinggi Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="t_kontrak_pekerjaan">
                                                </div>
                                            </li>

                                            <li class="mb-3 col-md-4" hidden>
                                                Panjang Adendum Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="p_adendum_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4" hidden>
                                                Lebar Adendum Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="l_adendum_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4" hidden>
                                                Tinggi Adendum Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="t_adendum_pekerjaan">
                                                </div>
                                            </li>

                                            <li class="mb-3 col-md-4" hidden>
                                                Panjang Pemeriksaan Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="p_pemeriksaan_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4" hidden>
                                                Lebar Pemeriksaan Pekerjaan
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="l_pemeriksaan_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4" hidden>
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
                                            <li class="mb-3 col-md-6" hidden>
                                                PHO Coredrill
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="pho_core_pekerjaan">
                                                </div>
                                            </li>


                                            <li class="mb-3 col-md-4" hidden>
                                                BA PPTK
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="ba_pptk_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4" hidden>
                                                SPM
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="spm_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-4" hidden>
                                                SP2D
                                                <div class="form-group">
                                                    <input class="form-control text-end" name="sp2d_pekerjaan">
                                                </div>
                                            </li>


                                            <li class="mb-3 col-md-6">
                                                Longitude
                                                <div class="form-group">
                                                    <input class="form-control" name="lon_pekerjaan">
                                                </div>
                                            </li>
                                            <li class="mb-3 col-md-6">
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

            <div class="col-lg-12">

                <div class="card mt-3">
                    <div class="card-header">
                        <a class="btn btn-xs btn-primary" href="<?= base_url().'pekerjaan/edit/'.$pk['id_pekerjaan'] ?>">Edit</a>
                        <span class="float-end">
                            Progres Fisik : <strong><?= $pk['progres_fisik_pekerjaan'] ?> %</strong> 
                        </span> 
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 px-0">
                                <img class="w-100" src="<?= base_url().'uploads/qr/'.$pk['id_pekerjaan'].'.png' ?>">
                            </div>
                            <div class="col-md-10 py-2">
                                <div class="pl-1 h4">Program : <strong><?= $pk['nama_program'] ?></strong></div>
                           
                                <div class="pl-1 h4">Kegiatan : <strong><?= $pk['nama_kegiatan'] ?></strong></div>
                            
                                <div class="pl-2 h4">Sub Kegiatan : <strong><?= $pk['nama_sub_kegiatan'] ?></strong></div>

                                <?php if($pk['sub_pekerjaan'] > 0): ?>
                                    <div class="pl-2 h4">Pekerjaan : <strong><?= get_nama_pekerjaan($pk['sub_pekerjaan']) ?></strong></div>
                                <?php endif; ?>

                                <div class="pl-2 h4">Pekerjaan : <strong><?= $pk['nama_pekerjaan'] ?></strong></div>
                            </div>

                            <div class="col-md-6 col-sm-12 mt-4">
                                <table class="table table-borderless table-no-padding">
                                    <tr>
                                        <td>Kelurahan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['kelurahan_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['kecamatan_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>PAGU</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= rupiah($pk['pagu_pekerjaan']) ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['jenis_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Sumber Dana</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['sumber_dana_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Bidang Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['bidang_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Pelaksana Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['vendor_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nilai Kontrak</td>
                                        <td>:</td>
                                        <td nowrap align="right"><strong><?= rupiah($pk['nilai_kontrak_pekerjaan']) ?></strong></td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Waktu Pelaksanaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['waktu_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>No. SPK</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['no_spk_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal SPK</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= tgl_indo_lengkap($pk['tgl_spk_pekerjaan']) ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Akhir SPK</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= tgl_indo_lengkap($pk['tgl_akhir_spk_pekerjaan']) ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Panjang Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['p_kontrak_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Lebar Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['l_kontrak_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tinggi Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['t_kontrak_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Panjang Adendum Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['p_adendum_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Lebar Adendum Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['l_adendum_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tinggi Adendum Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['t_adendum_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Panjang Hasil Pemeriksaan Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['p_pemeriksaan_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Lebar Hasil Pemeriksaan Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['l_pemeriksaan_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tinggi Hasil Pemeriksaan Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['t_pemeriksaan_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Bobot TKDN</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['tkdn_bobot_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nominal TKDN</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= rupiah($pk['tkdn_jumlah_pekerjaan']) ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Bobot TKLN</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['tkln_bobot_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nominal TKLN</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= rupiah($pk['tkln_jumlah_pekerjaan']) ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kontruksi</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['jenis_kontruksi_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>PHO Core Dril</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['pho_core_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>BA PPTK</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['ba_pptk_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>SPM</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['spm_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>SP2D</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['sp2d_pekerjaan'] ?></strong></td>
                                    </tr> -->
                                    <tr>
                                        <td>Progres Nilai Keuangan</td>
                                        <td>:</td>
                                        <td nowrap align="right"><strong><?= rupiah($pk['progres_nilai_keuangan_pekerjaan']) ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Progres Presentase Keuangan</td>
                                        <td>:</td>
                                        <td nowrap align="right"><strong><?= $pk['progres_persen_keuangan_pekerjaan'] ?>%</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Progres Fisik Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap align="right"><strong><?= $pk['progres_fisik_pekerjaan'] ?>%</strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="mt-4 col-md-6 col-sm-12">
                                <h6>Pejabat Pembuat Komitmen:</h6>
                                <div><strong><?= $pk['ppk_pekerjaan'] ?></strong></div>
                                <div><?= nip($pk['ppk_pekerjaan']) ?></div>
                            </div>
                            <div class="mt-4 col-md-6 col-sm-12">
                                <h6>Pejabat Pelaksana Teknis Pekerjaan:</h6>
                                <div><strong><?= $pk['pptk_pekerjaan'] ?></strong></div>
                                <div><?= nip($pk['pptk_pekerjaan']) ?></div>
                            </div>
                        </div>

                        <div id="map" style="width: 100%; height: 400px">
                            <!-- Popup -->
                            <div id="popup" title="Pekerjaan Konstruksi"></div>
                        </div>
<!--                         
                        <div class="table-responsive">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tim = explode(',',$pk['tim_pekerjaan']);
                                    foreach($tim as $tk => $tv):
                                    ?>
                                    <tr>
                                        <td class="center"><?= $tk+1 ?></td>
                                        <td class="left strong"><?= get_tim($tv, 'nama_user') ?></td>
                                        <td class="left"><?= get_tim($tv, 'jabatan_user') ?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div> -->
                        
                    </div>
                </div>
            </div>


            
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->