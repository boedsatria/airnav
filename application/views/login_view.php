<div class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="<?= base_url() ?>">
                                            <img width="30%" class="img-fluid" src="<?= base_url() ?>images/airnav-logo.png">
                                        </a>
                                    </div>
                                    <h1 class="text-center">AIRNAV</h1>
                                    <h4 class="text-center mb-4">SMART OFFICE</h4>
                                    <form action="<?= base_url('login/login_action') ?>" method="POST">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>NIK</strong></label>
                                            <input type="text" name="nik_user" class="form-control" placeholder="NIK Anda">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" name="password_user" class="form-control" placeholder="Isi Password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                                <div class="form-check custom-checkbox ms-0">
                                                    <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
                                                </div>
                                            </div>
                                            <div class="mb-3 mt-1">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <a href="<?= base_url() ?>dashboard" type="submit" class="btn btn-primary btn-block">Masuk</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>