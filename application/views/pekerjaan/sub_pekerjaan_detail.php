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
                    <li class="breadcrumb-item"><a href="<?= base_url() . 'pekerjaan/detail/' . $pk['id_pekerjaan'] ?>"><?= $pk['nama_pekerjaan'] ?></a></li>
                    
                    <li class="breadcrumb-item active"><a><?= $pk['nama_sub_pekerjaan'] ?></a></li>


            </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="card mt-3">
                    <div class="card-header">
                        <a class="btn btn-xs btn-primary" href="<?= base_url().'pekerjaan/edit_sub/'.$pk['id_sub_pekerjaan'] ?>">Edit</a>
                        <span class="">
                            Progres Fisik : <strong><?= $pk['progres_fisik_sub_pekerjaan'] ?> %</strong> 
                        </span> 

                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 px-0">
                                <img class="w-100" src="<?= base_url().'uploads/qr/sub_'.$pk['id_sub_pekerjaan'].'.png' ?>">
                            </div>
                            <div class="col-md-10 py-2">
                                <div class="pl-1 h4">Program : <strong><?= $pk['nama_program'] ?></strong></div>
                           
                                <div class="pl-1 h4">Kegiatan : <strong><?= $pk['nama_kegiatan'] ?></strong></div>
                            
                                <div class="pl-2 h4">Sub Kegiatan : <strong><?= $pk['nama_sub_kegiatan'] ?></strong></div>

                                <div class="pl-2 h4">Paket : <strong><?= $pk['nama_pekerjaan'] ?></strong></div>
                                <div class="pl-2 h4">Sub Paket : <strong><?= $pk['nama_sub_pekerjaan'] ?></strong></div>
                            </div>

                            <div class="col-md-6 col-sm-12 mt-4">
                                <table class="table table-borderless table-no-padding">
                                    <tr>
                                        <td>Kelurahan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['kelurahan_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['kecamatan_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['jenis_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Sumber Usulan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['sumber_usulan_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Sumber Anggaran</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['sumber_dana_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <!-- <tr>
                                        <td>Bidang Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['bidang_sub_pekerjaan'] ?></strong></td>
                                    </tr> -->
                                    <tr>
                                        <td>Pelaksana Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['vendor_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>PAGU</td>
                                        <td>:</td>
                                        <td nowrap align="right"><strong><?= rupiah($pk['pagu_sub_pekerjaan']) ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nilai Kontrak</td>
                                        <td>:</td>
                                        <td nowrap align="right"><strong><?= rupiah($pk['nilai_kontrak_sub_pekerjaan']) ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Waktu Pelaksanaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['waktu_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>No. SPK</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['no_spk_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal SPK</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= tgl_indo_lengkap($pk['tgl_spk_sub_pekerjaan']) ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Akhir SPK</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= tgl_indo_lengkap($pk['tgl_akhir_spk_sub_pekerjaan']) ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Panjang Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['p_kontrak_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Lebar Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['l_kontrak_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tinggi Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['t_kontrak_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Panjang Adendum Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['p_adendum_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Lebar Adendum Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['l_adendum_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tinggi Adendum Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['t_adendum_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Panjang Hasil Pemeriksaan Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['p_pemeriksaan_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Lebar Hasil Pemeriksaan Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['l_pemeriksaan_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tinggi Hasil Pemeriksaan Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['t_pemeriksaan_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <!--<tr>
                                        <td>Bobot TKDN</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['tkdn_bobot_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nominal TKDN</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= rupiah($pk['tkdn_jumlah_sub_pekerjaan']) ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Bobot TKLN</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['tkln_bobot_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nominal TKLN</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= rupiah($pk['tkln_jumlah_sub_pekerjaan']) ?></strong></td>
                                    </tr>-->
                                    <tr>
                                        <td>Jenis Kontruksi</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= $pk['jenis_kontruksi_sub_pekerjaan'] ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>PHO Core Dril</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= ($pk['pho_core_sub_pekerjaan'] == 1 ? 'Sudah' : 'Belum') ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>BA PPTK</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= ($pk['ba_pptk_sub_pekerjaan'] == 1 ? 'Sudah' : 'Belum') ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>SPM</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= ($pk['spm_sub_pekerjaan'] == 1 ? 'Sudah' : 'Belum') ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>SP2D</td>
                                        <td>:</td>
                                        <td nowrap><strong><?= ($pk['sp2d_sub_pekerjaan'] == 1 ? 'Sudah' : 'Belum') ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Progres Nilai Keuangan</td>
                                        <td>:</td>
                                        <td nowrap align="right"><strong><?= rupiah($pk['progres_nilai_keuangan_sub_pekerjaan']) ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Progres Presentase Keuangan</td>
                                        <td>:</td>
                                        <td nowrap align="right"><strong><?= $pk['progres_persen_keuangan_sub_pekerjaan'] ?>%</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Progres Fisik Pekerjaan</td>
                                        <td>:</td>
                                        <td nowrap align="right"><strong><?= $pk['progres_fisik_sub_pekerjaan'] ?>%</strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="mt-4 col-md-6 col-sm-12">
                                <h6>Pejabat Pembuat Komitmen:</h6>
                                <div><strong><?= $pk['ppk_sub_pekerjaan'] ?></strong></div>
                                <div><?= nip($pk['ppk_sub_pekerjaan']) ?></div>
                            </div>
                            <div class="mt-4 col-md-6 col-sm-12">
                                <h6>Pejabat Pelaksana Teknis Pekerjaan:</h6>
                                <div><strong><?= $pk['pptk_sub_pekerjaan'] ?></strong></div>
                                <div><?= nip($pk['pptk_sub_pekerjaan']) ?></div>
                            </div>
                        </div>

                        <div id="map" style="width: 100%; height: 400px">
                            <!-- Popup -->
                            <div id="popup" title="Pekerjaan Konstruksi"></div>
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