<!--**********************************
    Sidebar start
***********************************-->
<?php
$role = "1";
$fs = "noavatar.png";
$file = base_url() . 'uploads/users/' . $fs;
$file_headers = @get_headers($file);

if ($file_headers[0] == 'HTTP/1.1 404 Not Found' || $fs == '') {
    $foto =  base_url() . 'images/no_avatar.jpg';
} else {
    $foto = $file;
}
?>

<div class="deznav">
    <div class="deznav-scroll">
        <div class=" dropdown header-bx">
            <a class="nav-link header-profile2 position-relative text-center" role="button" data-bs-toggle="dropdown">
                <div class="header-img position-relative">
                    <img class="img-fluid" src="<?= $foto; ?>" alt="header-img">
                    <svg class="header-circle" width="150" height="150" viewBox="0 0 130 130" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M130 65C130 100.899 100.899 130 65 130C29.1015 130 0 100.899 0 65C0 29.1015 29.1015 0 65 0C100.899 0 130 29.1015 130 65ZM4.99306 65C4.99306 98.1409 31.8591 125.007 65 125.007C98.1409 125.007 125.007 98.1409 125.007 65C125.007 31.8591 98.1409 4.99306 65 4.99306C31.8591 4.99306 4.99306 31.8591 4.99306 65Z" fill="#FFD482" />
                        <path d="M65 2.49653C65 1.11774 66.1182 -0.00500592 67.496 0.0479365C76.3746 0.389105 85.0984 2.54751 93.1247 6.39966C101.902 10.6123 109.621 16.7428 115.711 24.3385C121.802 31.9341 126.108 40.8009 128.312 50.284C130.516 59.7671 130.562 69.6242 128.446 79.1274C126.33 88.6305 122.106 97.5369 116.087 105.189C110.067 112.841 102.406 119.043 93.6677 123.337C84.9299 127.631 75.3391 129.907 65.6037 129.997C56.7012 130.08 47.8858 128.333 39.7012 124.875C38.4312 124.338 37.895 122.847 38.48 121.598C39.065 120.35 40.5495 119.817 41.8213 120.35C49.3273 123.493 57.4027 125.08 65.5573 125.004C74.5449 124.921 83.399 122.819 91.4656 118.855C99.5322 114.891 106.605 109.166 112.162 102.102C117.72 95.0375 121.619 86.8153 123.572 78.0421C125.526 69.269 125.484 60.1691 123.449 51.4145C121.414 42.6598 117.438 34.4741 111.816 27.4619C106.193 20.4497 99.0674 14.7901 90.9643 10.9011C83.6123 7.3726 75.6263 5.38343 67.4958 5.04499C66.1182 4.98764 65 3.87533 65 2.49653Z" fill="var(--primary)" />
                    </svg>
                </div>
                <div class="header-content">
                    <h2 class="font-w500">Admin</h2>
                    <span class="font-w400">admin@airnav.id</span>
                </div>
            </a>
        </div>
        <ul class="metismenu" id="menu">
            <li><a href="<?= base_url(); ?>dashboard">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>

            </li>

            <li><a href="<?= base_url() ?>landscape">
                    <i class="bi-aspect-ratio-fill"></i>
                    <span class="nav-text">Landscape</span>
                </a>
            </li>
            <li><a href="<?= base_url() ?>environment">
                    <i class="bi-brightness-alt-high-fill"></i>
                    <span class="nav-text">Environment</span>
                </a>
            </li>
            <li><a href="<?= base_url() ?>parking">
                    <i class="bi-truck"></i>
                    <span class="nav-text">Parkir</span>
                </a>
            </li>

            <li hidden>
                <a class="has-arrow cursor" aria-expanded="false">
                    <i class="flaticon-050-info"></i>
                    <span class="nav-text">Rekapitulasi</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="<?= base_url() ?>rekap" aria-expanded="false">Semua Kegiatan</a>
                        <a href="<?= base_url() ?>rekap/pokir" aria-expanded="false">Pokir</a>
                        <a href="<?= base_url() ?>rekap/pptk" aria-expanded="false">PPTK</a>
                    </li>
                </ul>
            </li>

            <?php if ($role <= 3) : ?>
                <li hidden><a href="<?= base_url('program') ?>">
                        <i class="bi bi-card-checklist"></i>
                        <span class="nav-text">Program</span>
                    </a>
                </li>
                <li hidden><a href="<?= base_url('import') ?>">
                        <i class="flaticon-090-upload"></i>
                        <span class="nav-text">Import Data</span>
                    </a>
                </li>
                <li hidden><a href="<?= base_url('import/hasil') ?>">
                        <i class="flaticon-065-pin"></i>
                        <span class="nav-text">Data Import</span>
                    </a>
                </li>
            <?php else : ?>
                <li hidden><a href="<?= base_url() . 'pekerjaan/user/' . $this->session->userdata('userlogin')['id_user'] ?>">
                        <i class="bi bi-card-checklist"></i>
                        <span class="nav-text">Pekerjaan Saya</span>
                    </a>
                </li>
            <?php endif; ?>

            <li hidden><a href="<?= base_url() ?>user">
                    <i class="bi-aspect-ratio-fill"></i>
                    <span class="nav-text">User</span>
                </a>
            </li>



            <li><a href="<?= base_url('login/remove') ?>">
                    <i class="bi-unlock-fill"></i>
                    <span class="nav-text">Logout</span>
                </a>
            </li>

        </ul>
        <div class="copyright">
            <h6>Smart Office Airnav <span class="fs-14 font-w400">© 2024 All Rights Reserved</span></h6>
        </div>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->