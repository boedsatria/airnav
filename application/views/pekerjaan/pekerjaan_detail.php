<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() . 'program' ?>">Program</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() . 'kegiatan/list/' . $pk['id_program'] ?>"><?= $pk['nama_program'] ?></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() . 'sub_kegiatan/list/' . $pk['id_kegiatan'] ?>"><?= $pk['nama_kegiatan'] ?></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url() . 'pekerjaan/list/' . $pk['id_sub_kegiatan'] ?>"><?= $pk['nama_sub_kegiatan'] ?></a></li>
                
                <li class="breadcrumb-item active"><a><?= $pk['nama_pekerjaan'] ?></a></li>


            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="card mt-3">
                    <div class="card-header">
                        <a class="btn btn-xs btn-primary" href="<?= base_url().'pekerjaan/edit/'.$pk['id_pekerjaan'] ?>">Edit</a>
                        <span class="">
                            Progres Fisik : <strong><?= $pk['progres_fisik_pekerjaan'] ?> %</strong> 
                        </span> 
                        <a class="btn btn-xs btn-success float-end" data-bs-toggle="modal" data-bs-target="#addModal">Buat Sub Paket</a>

                        
                        <!-- Modal -->
                        <div class="modal fade" id="addModal">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form action="<?= base_url() ?>pekerjaan/add_sub_action" method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Pekerjaan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <ul class="row no-style">
                                                    <li class="mb-3 col-md-4">
                                                        Kode Paket
                                                        <div class="form-group">
                                                            <input class="form-control" readonly value="<?= $pk['kode_pekerjaan']; ?>">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-8">
                                                        Nama Paket
                                                        <div class="form-group">
                                                            <input class="form-control" readonly value="<?= $pk['nama_pekerjaan']; ?>">
                                                        </div>
                                                    </li>

                                                    <li class="mb-3 col-md-4 mt-3">
                                                        Kode Sub Paket
                                                        <div class="form-group">
                                                            <input class="form-control" name="kode_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-8 mt-3">
                                                        Nama Sub Paket
                                                        <div class="form-group">
                                                            <input class="form-control" name="nama_sub_pekerjaan">
                                                            <input type="hidden" name="parent_sub_pekerjaan" value="<?= $pk['id_pekerjaan']; ?>">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-6 mt-3">
                                                        Kelurahan
                                                        <div class="form-group">
                                                            <input class="form-control" name="kelurahan_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-6 mt-3">
                                                        Kecamatan
                                                        <div class="form-group">
                                                            <input class="form-control" name="kecamatan_sub_pekerjaan" value="<?= $pk['kecamatan_pekerjaan']?>">
                                                        </div>
                                                    </li>

                                                    <li class="mb-3 col-md-3">
                                                        Pagu
                                                        <div class="form-group">
                                                            <input class="form-control inputnumber text-end" name="pagu_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-3">
                                                        Nilai Kontrak
                                                        <div class="form-group">
                                                            <input class="form-control inputnumber text-end" name="nilai_kontrak_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-3">
                                                        Sumber Usulan
                                                        <div class="form-group">
                                                            <input class="form-control" name="sumber_usulan_sub_pekerjaan" value="<?= $pk['sumber_usulan_pekerjaan']?>">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-3">
                                                        Sumber Anggaran
                                                        <div class="form-group">
                                                            <input class="form-control" name="sumber_dana_sub_pekerjaan" value="<?= $pk['sumber_dana_pekerjaan']?>">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-6">
                                                        Jenis Pekerjaan
                                                        <div class="form-group">
                                                            <select name="jenis_sub_pekerjaan" class="default-select form-control wide">
                                                                <option value="LELANG">LELANG</option>
                                                                <option value="PL">PL</option>
                                                            </select>
                                                        </div>
                                                    </li>

                                                    <li class="mb-3 col-md-6">
                                                        PPK
                                                        <div class="form-group">
                                                            <select name="ppk_sub_pekerjaan" class="form-control select2">
                                                                <?php
                                                                foreach ($ppk as $uv) :
                                                                    $selected_ppk = '';
                                                                    if($pk['ppk_pekerjaan'] == $uv['nama_user']) $selected_ppk = 'selected';
                                                                    echo '<option value="' . $uv['nama_user'] . '" ' . $selected_ppk . '>' . $uv['nama_user'] . '</option>';
                                                                endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-6">
                                                        PPTK
                                                        <div class="form-group">
                                                            <select name="pptk_sub_pekerjaan" class="form-control select2">
                                                                <?php
                                                                foreach ($pptk as $uv) :
                                                                    $selected_pptk = '';
                                                                    if($pk['pptk_pekerjaan'] == $uv['nama_user']) $selected_pptk = 'selected';
                                                                    echo '<option value="' . $uv['nama_user'] . '" ' . $selected_pptk . '>' . $uv['nama_user'] . '</option>';
                                                                endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </li>


                                                    <li class="mb-3 col-md-6" hidden>
                                                        Bidang Pekerjaan
                                                        <div class="form-group">
                                                            <input class="form-control" name="bidang_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-3">
                                                        Hari Kalender
                                                        <div class="form-group">
                                                            <input class="form-control text-end" name="waktu_sub_pekerjaan">
                                                        </div>
                                                    </li>

                                                    <li class="mb-3 col-md-12">
                                                        Vendor
                                                        <div class="form-group">
                                                            <select name="vendor_sub_pekerjaan" class="form-control select2">
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
                                                            <input class="form-control" name="no_spk_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-4">
                                                        Tanggal SPK
                                                        <div class="form-group">
                                                            <input class="form-control datepicker" name="tgl_spk_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-4">
                                                        Tanggal Akhir SPK
                                                        <div class="form-group">
                                                            <input class="form-control datepicker" name="tgl_akhir_spk_sub_pekerjaan">
                                                        </div>
                                                    </li>

                                                    <li class="mb-3 col-md-4">
                                                        Panjang Pekerjaan
                                                        <div class="form-group">
                                                            <input class="form-control text-end" name="p_kontrak_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-4">
                                                        Lebar Pekerjaan
                                                        <div class="form-group">
                                                            <input class="form-control text-end" name="l_kontrak_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-4">
                                                        Tinggi Pekerjaan
                                                        <div class="form-group">
                                                            <input class="form-control text-end" name="t_kontrak_sub_pekerjaan">
                                                        </div>
                                                    </li>

                                                    <li class="mb-3 col-md-4">
                                                        Panjang Adendum Pekerjaan
                                                        <div class="form-group">
                                                            <input class="form-control text-end" name="p_adendum_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-4">
                                                        Lebar Adendum Pekerjaan
                                                        <div class="form-group">
                                                            <input class="form-control text-end" name="l_adendum_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-4">
                                                        Tinggi Adendum Pekerjaan
                                                        <div class="form-group">
                                                            <input class="form-control text-end" name="t_adendum_sub_pekerjaan">
                                                        </div>
                                                    </li>

                                                    <li class="mb-3 col-md-4">
                                                        Panjang Pemeriksaan Pekerjaan
                                                        <div class="form-group">
                                                            <input class="form-control text-end" name="p_pemeriksaan_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-4">
                                                        Lebar Pemeriksaan Pekerjaan
                                                        <div class="form-group">
                                                            <input class="form-control text-end" name="l_pemeriksaan_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-4">
                                                        Tinggi Pemeriksaan Pekerjaan
                                                        <div class="form-group">
                                                            <input class="form-control text-end" name="t_pemeriksaan_sub_pekerjaan">
                                                        </div>
                                                    </li>


                                                    <li class="mb-3 col-md-3" hidden>
                                                        Bobot TKDN
                                                        <div class="input-group">
                                                            <input class="form-control text-end" name="tkdn_bobot_sub_pekerjaan">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-3" hidden>
                                                        Nominal TKDN
                                                        <div class="form-group">
                                                            <input class="form-control inputnumber text-end" name="tkdn_jumlah_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-3" hidden>
                                                        Bobot TKLN
                                                        <div class="input-group">
                                                            <input class="form-control text-end" name="tkln_bobot_sub_pekerjaan">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-3" hidden>
                                                        Nominal TKLN
                                                        <div class="form-group">
                                                            <input class="form-control inputnumber text-end" name="tkln_jumlah_sub_pekerjaan">
                                                        </div>
                                                    </li>


                                                    <li class="mb-3 col-md-4">
                                                        Jenis Kontruksi
                                                        <div class="form-group">
                                                            <select name="jenis_kontruksi_sub_pekerjaan" class="form-control select2">
                                                                <?php
                                                                foreach ($jenis_konstruksi as $jk) :
                                                                    $selected_jk = '';
                                                                    if ($jk['nama_jenis_konstruksi'] == $pk['jenis_kontruksi_pekerjaan']) $selected_jk = 'selected';
                                                                    echo '<option value="' . $jk['nama_jenis_konstruksi'] . '" ' . $selected_jk . '>' . $jk['nama_jenis_konstruksi'] . '</option>';
                                                                endforeach;
                                                                ?>
                                                            </select>
                                                            
                                                        </div>
                                                    </li>

                                                    <li class="mb-3 col-md-8 pt-4">
                                                        <div class="form-check form-check-inline">
                                                            <input type="checkbox" name="pho_core_sub_pekerjaan" class="form-check-input" value="1">
                                                            <label class="form-check-label">PHO Coredrill</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="checkbox" name="ba_pptk_sub_pekerjaan" class="form-check-input" value="1">
                                                            <label class="form-check-label">BA PPTK</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="checkbox" name="spm_sub_pekerjaan" class="form-check-input" value="1">
                                                            <label class="form-check-label">SPM</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="checkbox" name="sp2d_sub_pekerjaan" class="form-check-input" value="1">
                                                            <label class="form-check-label">SP2D</label>
                                                        </div>
                                                    </li>


                                                    <li class="mb-3 col-md-6" hidden>
                                                        Longitude
                                                        <div class="form-group">
                                                            <input class="form-control" name="lon_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-6" hidden>
                                                        Latitude
                                                        <div class="form-group">
                                                            <input class="form-control" name="lat_sub_pekerjaan">
                                                        </div>
                                                    </li>

                                                    <li class="mb-3 col-md-6">
                                                        Progress Nilai Keuangan
                                                        <div class="form-group">
                                                            <input class="form-control inputnumber text-end" name="progres_nilai_keuangan_sub_pekerjaan">
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-4" hidden>
                                                        Progress Persentase Keuangan
                                                        <div class="input-group">
                                                            <input class="form-control text-end" name="progres_persen_keuangan_sub_pekerjaan">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </li>
                                                    <li class="mb-3 col-md-6">
                                                        Progress Fisik
                                                        <div class="input-group">
                                                            <input class="form-control text-end" name="progres_fisik_sub_pekerjaan">
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

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 px-0">
                                <img class="w-100" src="<?= base_url().'uploads/qr/'.$pk['id_pekerjaan'].'.png' ?>">
                            </div>
                            <div class="col-md-10 py-2">
                                <div class="pl-1 h4">Program : <strong><?= $pk['nama_program'] ?></strong></div>
                           
                                <div class="pl-1 h4">Kegiatan : <strong><?= $pk['nama_kegiatan'] ?></strong></div>
                            
                                <div class="pl-2 h4">Sub Kegiatan : <strong><?= $pk['nama_sub_kegiatan'] ?></strong></div>

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
                                        <td>Jenis Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['jenis_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Sumber Usulan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['sumber_usulan_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Sumber Anggaran</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['sumber_dana_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Bidang Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['bidang_pekerjaan'] ?></strong></td>
                                    </tr> -->
                                    <tr>
                                        <td>Pelaksana Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['vendor_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>PAGU</td>
                                        <td>:</td>
                                        <td nowrap align="right"><strong><?= rupiah($pk['pagu_pekerjaan']) ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nilai Kontrak</td>
                                        <td>:</td>
                                        <td nowrap align="right"><strong><?= rupiah($pk['nilai_kontrak_pekerjaan']) ?></strong></td>
                                    </tr>
                                    <tr>
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
                                    <!--<tr>
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
                                    </tr>-->
                                    <tr>
                                        <td>Jenis Kontruksi</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['jenis_kontruksi_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['keterangan_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>PHO Core Dril</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= ($pk['pho_core_pekerjaan'] == 1 ? 'Sudah' : 'Belum') ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>BA PPTK</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= ($pk['ba_pptk_pekerjaan'] == 1 ? 'Sudah' : 'Belum') ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>SPM</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= ($pk['spm_pekerjaan'] == 1 ? 'Sudah' : 'Belum') ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>SP2D</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= ($pk['sp2d_pekerjaan'] == 1 ? 'Sudah' : 'Belum') ?></strong></td>
                                    </tr>
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

                        <?php if(has_sub($pk['id_pekerjaan']) > 0): ?>
                        <div class="table-responsive">

                            <table class="table table-striped table-head-mid">
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
                                            <td><?= $pk['id_sub_pekerjaan'] ?></td>
                                            <!-- <td><?= $pk['kode_sub_pekerjaan'] ?></td> -->
                                            <td>
                                                <strong><a href="<?= base_url(); ?>pekerjaan/detail_sub/<?= $pk['id_sub_pekerjaan'] ?>"><?= $pk['nama_sub_pekerjaan'] ?></a></strong>
                                            </td>
                                            <td><strong><?= $pk['ppk_sub_pekerjaan'] ?><hr><?= $pk['pptk_pekerjaan'] ?></strong></td>
                                            <td align="right"><?= rupiah($pk['nilai_kontrak_sub_pekerjaan']) ?></td>
                                            <td align="right"><?= rupiah($pk['progres_nilai_keuangan_sub_pekerjaan']) ?></td>
                                            <td align="center"><?= pmeter($pk['progres_persen_keuangan_sub_pekerjaan']) ?></td>
                                            <td align="center"><?= pmeter($pk['progres_fisik_sub_pekerjaan']) ?></td>

                                            <td nowrap>
                                                <div class="dropdown dropstart">
                                                    <a class="btn-link cursor" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots" style="font-size: 24px;color:#252525;"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="<?= base_url(); ?>pekerjaan/edit_sub/<?= $pk['id_sub_pekerjaan'] ?>">Ubah</a>
                                                        <a class="dropdown-item cursor" data-bs-toggle="modal" data-bs-target="#del<?= $pk['id_sub_pekerjaan'] ?>">Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="del<?= $pk['id_sub_pekerjaan'] ?>">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Sub Paket</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><?= $pk['nama_sub_pekerjaan'] ?> akan dihapus?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a type="button" class="btn btn-warning light" data-bs-dismiss="modal">Batal</button>
                                                        <a href="<?= base_url(); ?>pekerjaan/delete_sub/<?= $pk['id_sub_pekerjaan'].'/'.$pk['parent_sub_pekerjaan'] ?>" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div> 
                        <?php endif; ?>
                        
     
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->