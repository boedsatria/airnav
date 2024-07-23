<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
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
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?= base_url() ?>pekerjaan/edit_action" method="POST">

                                <ul class="row no-style">
                                    <li class="mb-3 col-md-4">
                                        Kode Program
                                        <div class="form-group">
                                            <input class="form-control" readonly value="<?= $pk['kode_program']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-8">
                                        Nama Program
                                        <div class="form-group">
                                            <input class="form-control" readonly value="<?= $pk['nama_program']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-4">
                                        Kode Kegiatan
                                        <div class="form-group">
                                            <input class="form-control" readonly value="<?= $pk['kode_kegiatan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-8">
                                        Nama Kegiatan
                                        <div class="form-group">
                                            <input class="form-control" readonly value="<?= $pk['nama_kegiatan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-4">
                                        Kode Sub Kegiatan
                                        <div class="form-group">
                                            <input class="form-control" readonly value="<?= $pk['kode_sub_kegiatan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-8">
                                        Nama Sub Kegiatan
                                        <div class="form-group">
                                            <input class="form-control" readonly value="<?= $pk['nama_sub_kegiatan']; ?>">
                                        </div>
                                    </li>

                                    <li class="mb-3 col-md-4 mt-5">
                                        Kode Pekerjaan
                                        <div class="form-group">
                                            <input class="form-control" name="kode_pekerjaan" value="<?= $pk['kode_pekerjaan']; ?>">
                                            <input type="hidden" name="id_pekerjaan" value="<?= $pk['id_pekerjaan']; ?>">
                                            <input type="hidden" name="parent_pekerjaan" value="<?= $pk['parent_pekerjaan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-8 mt-5">
                                        Nama Pekerjaan
                                        <div class="form-group">
                                            <input class="form-control" name="nama_pekerjaan" value="<?= $pk['nama_pekerjaan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-6 mt-5">
                                        Kelurahan
                                        <div class="form-group">
                                            <input class="form-control" name="kelurahan_pekerjaan" value="<?= $pk['kelurahan_pekerjaan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-6 mt-5">
                                        Kecamatan
                                        <div class="form-group">
                                            <input class="form-control" name="kecamatan_pekerjaan" value="<?= $pk['kecamatan_pekerjaan']; ?>">
                                        </div>
                                    </li>

                                    <li class="mb-3 col-md-3">
                                        Pagu
                                        <div class="form-group">
                                            <input class="form-control inputnumber text-end" name="pagu_pekerjaan" value="<?= number_format($pk['pagu_pekerjaan'], 0, ',', '.'); ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-3">
                                        Nilai Kontrak
                                        <div class="form-group">
                                            <input class="form-control inputnumber text-end" name="nilai_kontrak_pekerjaan" value="<?= number_format($pk['nilai_kontrak_pekerjaan'], 0, ',', '.'); ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-3">
                                        Sumber Usulan
                                        <div class="form-group">
                                            <input class="form-control" name="sumber_usulan_pekerjaan" value="<?= $pk['sumber_usulan_pekerjaan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-3">
                                        Sumber Anggaran
                                        <div class="form-group">
                                            <input class="form-control" name="sumber_dana_pekerjaan" value="<?= $pk['sumber_dana_pekerjaan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-6">
                                        Jenis Pekerjaan
                                        <div class="form-group">
                                            <select name="jenis_pekerjaan" class="default-select form-control wide">
                                                <option value="LELANG" <?= ($pk['jenis_pekerjaan'] == "LELANG" ? "selected" : ""); ?>>LELANG</option>
                                                <option value="PL" <?= ($pk['jenis_pekerjaan'] == "PL" ? "selected" : ""); ?>>PL</option>
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
                                                    if ($uv['nama_user'] == $pk['ppk_pekerjaan']) $selected_ppk = 'selected';
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
                                                    if ($uv['nama_user'] == $pk['pptk_pekerjaan']) $selected_pptk = 'selected';
                                                    echo '<option value="' . $uv['nama_user'] . '" ' . $selected_pptk . '>' . $uv['nama_user'] . '</option>';
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </li>


                                    <li class="mb-3 col-md-6" hidden>
                                        Bidang Pekerjaan
                                        <div class="form-group">
                                            <input class="form-control" name="bidang_pekerjaan" value="<?= $pk['bidang_pekerjaan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-4">
                                        Hari Kalendar
                                        <div class="form-group">
                                            <input class="form-control text-end" name="waktu_pekerjaan" value="<?= $pk['waktu_pekerjaan']; ?>">
                                        </div>
                                    </li>

                                    <li class="mb-3 col-md-12">
                                        Vendor
                                        <div class="form-group">
                                            <select name="vendor_pekerjaan" class="form-control select2">
                                                <?php
                                                foreach ($vendor as $ven) :
                                                    $selected_ven = '';
                                                    if ($ven['nama_perusahaan'] == $pk['vendor_pekerjaan']) $selected_ven = 'selected';
                                                    echo '<option value="' . $ven['nama_perusahaan'] . '" ' . $selected_ven . '>' . $ven['nama_perusahaan'] . '</option>';
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </li>

                                    <li class="mb-3 col-md-4">
                                        No SPK
                                        <div class="form-group">
                                            <input class="form-control" name="no_spk_pekerjaan" value="<?= $pk['no_spk_pekerjaan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-4">
                                        Tanggal SPK
                                        <div class="form-group">
                                            <input class="form-control datepicker" name="tgl_spk_pekerjaan" value="<?= ($pk['tgl_spk_pekerjaan'] == '0000-00-00' ? '' : $pk['tgl_spk_pekerjaan']); ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-4">
                                        Tanggal Akhir SPK
                                        <div class="form-group">
                                            <input class="form-control datepicker" name="tgl_akhir_spk_pekerjaan" value="<?= ($pk['tgl_akhir_spk_pekerjaan'] == '0000-00-00' ? '' : $pk['tgl_akhir_spk_pekerjaan']); ?>">
                                        </div>
                                    </li>

                                    <li class="mb-3 col-md-4">
                                        Panjang Pekerjaan
                                        <div class="form-group">
                                            <input class="form-control text-end" name="p_kontrak_pekerjaan" value="<?= $pk['p_kontrak_pekerjaan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-4">
                                        Lebar Pekerjaan
                                        <div class="form-group">
                                            <input class="form-control text-end" name="l_kontrak_pekerjaan" value="<?= $pk['l_kontrak_pekerjaan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-4">
                                        Tinggi Pekerjaan
                                        <div class="form-group">
                                            <input class="form-control text-end" name="t_kontrak_pekerjaan" value="<?= $pk['t_kontrak_pekerjaan']; ?>">
                                        </div>
                                    </li>

                                    <li class="mb-3 col-md-4">
                                        Panjang Adendum Pekerjaan
                                        <div class="form-group">
                                            <input class="form-control text-end" name="p_adendum_pekerjaan" value="<?= $pk['p_adendum_pekerjaan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-4">
                                        Lebar Adendum Pekerjaan
                                        <div class="form-group">
                                            <input class="form-control text-end" name="l_adendum_pekerjaan" value="<?= $pk['l_adendum_pekerjaan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-4">
                                        Tinggi Adendum Pekerjaan
                                        <div class="form-group">
                                            <input class="form-control text-end" name="t_adendum_pekerjaan" value="<?= $pk['t_adendum_pekerjaan']; ?>">
                                        </div>
                                    </li>

                                    <li class="mb-3 col-md-4">
                                        Panjang Pemeriksaan Pekerjaan
                                        <div class="form-group">
                                            <input class="form-control text-end" name="p_pemeriksaan_pekerjaan" value="<?= $pk['p_pemeriksaan_pekerjaan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-4">
                                        Lebar Pemeriksaan Pekerjaan
                                        <div class="form-group">
                                            <input class="form-control text-end" name="l_pemeriksaan_pekerjaan" value="<?= $pk['l_pemeriksaan_pekerjaan']; ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-4">
                                        Tinggi Pemeriksaan Pekerjaan
                                        <div class="form-group">
                                            <input class="form-control text-end" name="t_pemeriksaan_pekerjaan" value="<?= $pk['t_pemeriksaan_pekerjaan']; ?>">
                                        </div>
                                    </li>


                                    <li class="mb-3 col-md-3" hidden>
                                        Bobot TKDN
                                        <div class="input-group">
                                            <input class="form-control text-end" name="tkdn_bobot_pekerjaan" value="<?= $pk['tkdn_bobot_pekerjaan']; ?>">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-3" hidden>
                                        Nominal TKDN
                                        <div class="form-group">
                                            <input class="form-control inputnumber text-end" name="tkdn_jumlah_pekerjaan" value="<?= number_format($pk['tkdn_jumlah_pekerjaan'], 0, ',', '.'); ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-3" hidden>
                                        Bobot TKLN
                                        <div class="input-group">
                                            <input class="form-control text-end" name="tkln_bobot_pekerjaan" value="<?= $pk['tkln_bobot_pekerjaan']; ?>">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-3" hidden>
                                        Nominal TKLN
                                        <div class="form-group">
                                            <input class="form-control inputnumber text-end" name="tkln_jumlah_pekerjaan" value="<?= number_format($pk['tkln_jumlah_pekerjaan'], 0, ',', '.'); ?>">
                                        </div>
                                    </li>


                                    <li class="mb-3 col-md-4">
                                        Jenis Kontruksi
                                        <div class="form-group">
                                            <select name="jenis_kontruksi_pekerjaan" class="form-control select2">
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
                                    
                                    <li class="mb-3 col-md-4">
                                        Keterangan
                                        <div class="form-group">
                                            <select name="keterangan_pekerjaan" class="default-select form-control wide">
                                                <option value="" <?= ($pk['keterangan_pekerjaan'] == '' ? 'selected' : '') ?>>-Pilih Keterangan-</option>
                                                <option value="POKIR" <?= ($pk['keterangan_pekerjaan'] == 'POKIR' ? 'selected' : '') ?>>POKIR</option>
                                                <option value="drop" <?= ($pk['keterangan_pekerjaan'] == 'drop' ? 'selected' : '') ?>>drop</option>
                                            
                                            </select>
                                            
                                        </div>
                                    </li>


                                    <li class="mb-3 col-md-12 pt-4">
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="pho_core_pekerjaan" class="form-check-input" value="1" <?= ($pk['pho_core_pekerjaan'] == 1 ? 'checked' : ''); ?>>
                                            <label class="form-check-label">PHO Coredrill</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="ba_pptk_pekerjaan" class="form-check-input" value="1" <?= ($pk['ba_pptk_pekerjaan'] == 1 ? 'checked' : ''); ?>>
                                            <label class="form-check-label">BA PPTK</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="spm_pekerjaan" class="form-check-input" value="1" <?= ($pk['spm_pekerjaan'] == 1 ? 'checked' : ''); ?>>
                                            <label class="form-check-label">SPM</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="sp2d_pekerjaan" class="form-check-input" value="1" <?= ($pk['sp2d_pekerjaan'] == 1 ? 'checked' : ''); ?>>
                                            <label class="form-check-label">SP2D</label>
                                        </div>
                                    </li>


                                    <li class="mb-3 col-md-6">
                                        Longitude
                                        <div class="form-group">
                                            <input class="form-control" name="lon_pekerjaan" value="<?= $pk['lon_pekerjaan'] ?>">
                                            <small>contoh : 106.96017867382682</small>
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-6">
                                        Latitude
                                        <div class="form-group">
                                            <input class="form-control" name="lat_pekerjaan" value="<?= $pk['lat_pekerjaan']; ?>">
                                            <small>contoh : -6.249426392272669</small>
                                        </div>
                                    </li>

                                    <li class="mb-3 col-md-6">
                                        Progress Nilai Keuangan
                                        <div class="form-group">
                                            <input class="form-control inputnumber text-end" name="progres_nilai_keuangan_pekerjaan" value="<?= number_format($pk['progres_nilai_keuangan_pekerjaan'], 0, ',', '.'); ?>">
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-4" hidden>
                                        Progress Persentase Keuangan
                                        <div class="input-group">
                                            <input class="form-control text-end" name="progres_persen_keuangan_pekerjaan" value="<?= $pk['progres_persen_keuangan_pekerjaan']; ?>">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </li>
                                    <li class="mb-3 col-md-6">
                                        Progress Fisik
                                        <div class="input-group">
                                            <input class="form-control text-end" name="progres_fisik_pekerjaan" value="<?= $pk['progres_fisik_pekerjaan']; ?>">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </li>


                                </ul>


                                <div class="my-5 text-end">
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