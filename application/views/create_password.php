
<section class="checkout-area pb-5">
    <div class="container">
        <form action="<?= base_url() ?>check_order/action_password" method="POST">

            <input name="cico" value="<?= $_GET['checkin-out'] ?>" type="hidden">
            <input name="room" value="<?= $_GET['room'] ?>" type="hidden">
            <input name="vip" value="<?= (isset($_GET['vip']) ? 1 : 0) ?>" type="hidden">
            <input name="price" value="<?= $price ?>" type="hidden">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="billing-details">
                        <h3 class="title">Create Password</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>First Name <span class="required">*</span></label>
                                    <input type="text" name="first-name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input type="text" name="last-name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<section class="related-room pb-5" hidden>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="more-services">
                    <h2>Related Room</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="services-item">
                                <i class="flaticon-resort"></i>
                                <h3><a href="service-details.html">Resort Reservation Into a Suitable Place</a></h3>
                                <p>One can easily reserve a resort room in a suitable place as you want. This will be able to make good feelings.</p>
                                <a href="service-details.html" class="get-btn">Get Service</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-item">
                                <i class="flaticon-calendar"></i>
                                <h3><a href="service-details.html">Book Now to Secure Availability Time Now</a></h3>
                                <p>You can easily reserve a hotel room in a suitable place as you want. This will be able to make good feelings.</p>
                                <a href="service-details.html" class="get-btn">Get Service</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>