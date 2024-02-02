<main>
    <section class="signup__area po-rel-z1 pt-100 pb-145">
        <div class="sign__shape">
            <img class="man-1" src="assets/img/icon/sign/man-3.png" alt="">
            <img class="man-2 man-22" src="assets/img/icon/sign/man-2.png" alt="">
            <img class="circle" src="assets/img/icon/sign/circle.png" alt="">
            <img class="zigzag" src="assets/img/icon/sign/zigzag.png" alt="">
            <img class="dot" src="assets/img/icon/sign/dot.png" alt="">
            <img class="bg" src="assets/img/icon/sign/sign-up.png" alt="">
            <img class="flower" src="assets/img/icon/sign/flower.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 mt-50">
                    <div class="section__title-wrapper text-center mb-55">
                        <h2 class="section__title">Login Here</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="sign__wrapper white-bg">
                        <div class="sign__form">
                            <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                            <?php $this->session->unset_userdata('success'); }
                            if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                            <?php $this->session->unset_userdata('error'); }
                                $err = validation_errors();
                                if ($err) {
                            ?>
                            <div class="alert alert-warning alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $err; ?>
                            </div>
                            <?php } ?>
                            <form name="form1" id="quickFormValidation" autocomplete="off" method="post" action="<?= base_url('home/studentLoginCheck') ?>">
                                <div class="sign__input-wrapper mb-25">
                                    <h5>Email</h5>
                                    <div class="sign__input">
                                        <input type="email" name="email" placeholder="Enter Email" autofocus required="" autocomplete="off">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="sign__input-wrapper mb-25">
                                    <h5>Password</h5>
                                    <div class="sign__input">
                                        <input type="password" name="password" placeholder="******" required="" autocomplete="off">
                                        <i class="fal fa-lock"></i>
                                    </div>
                                </div>
                                <button class="e-btn w-100"> <span></span> Sign In</button>
                                <div class="sign__new text-center mt-20">
                                    <p>Don't have account? <a href="<?php echo base_url('register') ?>"> Register</a></p>
                                </div>
                                <div class="sign__new text-center mt-20">
                                    <p><a id="forgot" href="<?php echo base_url('forgot-password') ?>">Forgot Password?</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>