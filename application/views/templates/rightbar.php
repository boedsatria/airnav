        <div class="sidebar-group d-print-none">
            <!-- Sidebar - Storage -->
            <div class="sidebar primary-sidebar show" id="storage">
                <div class="sidebar-header">
                    <h4>Storage Overview</h4>
                </div>
                <div class="sidebar-content">
                    <div id="justgage_five" class="mb-3" data-value="<?= ($storage['size'] == 0 ? 0 : $storage['size']/$storage['quota_company']*100) ?>" data-min="0" data-max="100"></div>
                    <div>
                        <div class="list-group list-group-flush mb-3">
                            <?php if($this->session->userlogin['company_user'] > 1) : ?>
                            <a href="<?= base_url() ?>files" class="list-group-item px-0 d-flex align-items-center">
                                <div class="mr-3">
                                    <figure class="avatar">
                                        <span class="avatar-title bg-primary-bright text-primary rounded">
                                            <i class="ti-file"></i>
                                        </span>
                                    </figure>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0">Your Files</p>
                                    <span class="small text-muted"><?= $storage['pages']?> Pages</span>
                                </div>
                                <div>
                                    <h5 class="text-primary"><?= number_format($storage['size']/1000000,2) ?> GB</h5>
                                </div>
                            </a>

                            <div class="card border shadow-none">
                                <div class="card-body text-center">
                                    <img class="img-fluid mb-3" src="<?php echo base_url(); ?>assets/media/svg/upgrade.svg" alt="upgrade">
                                    <h5>Get an Upgrade</h5>
                                    <p class="text-muted">Get additional space for your documents and files. Unlock now
                                        for more space.</p>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#upgradeModal">Upgrade</button>

                                </div>
                            </div>
                            <?php else : ?>
                            <?php 
                            foreach($company as $c): 
                            $file = base_url().'uploads/company/'.$c['logo_company'];
                            $file_headers = @get_headers($file);
                            
                            if($file_headers[0] == 'HTTP/1.0 404 Not Found' || $c['logo_company'] == '') {
                                $logo =  base_url().'assets/media/image/no-images.png';
                            }
                            else {
                                $logo = $file;
                            }    
                            ?>
                            <a href="#" class="list-group-item px-0 d-flex align-items-center">
                                <div class="mr-3">
                                    <figure class="logo-list">
                                        <span class="text-primary rounded">
                                            <img src="<?= $logo ?>">
                                        </span>
                                    </figure>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0"><?= substr($c['nama_company'], 0, 10).(strlen($c['nama_company']) > 10 ? '...' : '') ?></p>
                                    <span class="small text-muted"><?= count($c['files']) ?> Files</span>
                                </div>
                                <div>
                                    <h5 class="text-primary">
                                    <?php 
                                    $total_size = 0;
                                    foreach ($c['files'] as $f):
                                    $total_size += $f['size_files'];
                                    endforeach; 
                                    echo number_format($total_size/10240, 2).' GB';
                                    ?>
                                    </h5>
                                </div>
                            </a>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                </div>
                <?php if($this->session->userlogin['company_user'] == 1) : ?>
                <div class="sidebar-footer">
                    <a href="<?= base_url() ?>files/add" class="btn btn-lg btn-block btn-outline-primary">
                        <i class="fa fa-cloud-upload mr-3"></i> Upload
                    </a>
                </div>
                <?php endif; ?>
            </div>
            <!-- ./ Sidebar - Storage -->

        </div>