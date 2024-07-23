
    <div class="sign-in-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <div class="section-title text-center">
                                <span class="sp-color">Sign In</span>
                                <h2>Sign In to Your MORETECH Account!</h2>
                            </div>
                            <form method="POST" action="<?= base_url().'login/login_action?'.$_SERVER['QUERY_STRING'] ?>">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="form-group">
                                            <input type="text" name="email_user" id="name" class="form-control" required data-error="Please enter your Username or Email" placeholder="Username or Email">
                                            <input type="hidden" name="ref" value="<?= (isset($_GET['ref']) ? str_replace("||", "&", $_GET['ref']) : "") ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" type="password" name="password_user" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 form-condition">
                                        <div class="agree-label">
                                            <input type="checkbox" id="chb1">
                                            <label for="chb1">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <a class="forget" href="<?= base_url() ?>forgot">Forgot My Password?</a>
                                    </div>
                                    <div class="col-lg-12 col-md-12 text-center">
                                        <button type="submit" class="default-btn btn btn-warning">
                                            Sign In Now
                                        </button>
                                    </div>

                                    <?= ($this->session->flashdata('error_login') ? "<div class='help-block with-errors py-2 px-2 text-center'>".$this->session->flashdata('error_login')."</div>" : "") ?>

                                    <div class="col-12">
                                        <p class="account-desc">
                                            Not a Member?
                                            <a href="<?= base_url() ?>signup">Sign Up</a>
                                            or
                                            <a href="<?= base_url() ?>">Explore more about MORETECH</a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

