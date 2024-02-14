<section class="cta__area mb--100">
    <div class="container">
        <div class="cta__inner cta__inner-2 blue-bg fix">
            <div class="cta__shape">
                <img src="<?= base_url() ?>assets/img/cta/cta-shape.png" alt="">
            </div>
            <div class="row align-items-center">
                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-6">
                    <div class="cta__content">
                        <h3 class="cta__title">Start learning by Downloading Apps.</h3>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-6">
                    <div class="cta__apps d-lg-flex justify-content-end p-relative z-index-1">
                        <a target="_blank" href="https://www.apple.com/app-store/" class="mr-10"><i class="fab fa-apple"></i> Apple Store</a>
                        <a target="_blank" href="https://play.google.com/store/apps" class="active"><i class="fab fa-google-play"></i> Play Store</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<hr />
<footer>
    <div class="footer__area ">
        <div class="footer__top pt-140 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <div class="footer__logo">
                                    <a href="<?= base_url() ?>">
                                        <img src="<?= base_url() ?>assets/img/logo/logo.svg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="footer__widget-body footer__widget-body-2">
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                <div class="footer__social">
                                    <ul>
                                        <li><a href="#"><i class="social_facebook"></i></a></li>
                                        <li><a href="#" class="tw"><i class="social_twitter"></i></a></li>
                                        <li><a href="#" class="link"><i class="social_linkedin"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="social_instagram"></i></a></li>
                                        <li><a href="#" class="youtube"><i class="social_youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-xxl-2 offset-xxl-1 col-xl-2 offset-xl-1 col-lg-3 offset-lg-0 col-md-2 offset-md-1 col-sm-5 offset-sm-1">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <h3 class="footer__widget-title footer__widget-title-2 text-white">Quick Links</h3>
                            </div>
                            <div class="footer__widget-body">
                                <div class="footer__link footer__link-2">
                                    <ul>
                                        <li><a href="#">#Makutano9</a></li>
                                        <li><a href="#">Forum</a></li>
                                        <li><a href="#">Institute</a></li>
                                        <li><a href="#">Network</a></li>
                                        <li><a href="#">Foundation</a></li>
                                        <li><a href="<?= base_url()?>youth">Youth</a></li>
                                        <li><a href="<?= base_url()?>contact">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-2 offset-lg-0 col-md-3 offset-md-1 col-sm-6">
                        <div class="footer__widget mb-50">
                            <div class="footer__widget-head mb-22">
                                <h3 class="footer__widget-title footer__widget-title-2 text-white">Information</h3>
                            </div>
                            <div class="footer__widget-body">
                                <div class="footer__link footer__link-2">
                                    <ul>
                                        <li><a href="<?= base_url()?>about">About Us</a></li>
                                        <li><a href="<?= base_url() ?>blog">News & Blogs</a></li>
                                        <li><a href="<?= base_url()?>page/faqs">FAQs</a></li>
                                        <li><a href="<?= base_url()?>privacy">Privacy Policy</a></li>
                                        <li><a href="<?= base_url()?>term">Terms & Condition</a></li>
                                        <li><a href="<?= base_url()?>refund">Refund Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-sm-6">
                        <div class="footer__widget footer__pl-70 mb-50">
                            <div class="footer__widget-head mb-22">
                                <h3 class="footer__widget-title footer__widget-title-2 text-white">Subscribe Our Newsletter</h3>
                            </div>
                            <div class="footer__widget-body">
                                <div class="footer__subscribe footer__subscribe-2">
                                    <form action="#">
                                        <div class="footer__subscribe-input mb-15">
                                            <input type="email" placeholder="Your email address" id="user_email" required>
                                            <button type="button" onclick="subscribe()">
                                                <i class="far fa-arrow-right"></i>
                                                <i class="far fa-arrow-right"></i>
                                            </button>
                                            <div id="success" style="margin-top: 10px;"></div>
                                        </div>
                                    </form>
                                    <p>Get the latest news and updates right at your inbox.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom footer__bottom-2">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="footer__copyright footer__copyright-2 text-center">
                            <p>© 2024 Makutano. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<script src="<?= base_url() ?>assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/vendor/waypoints.min.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.meanmenu.js"></script>
<script src="<?= base_url() ?>assets/js/swiper-bundle.min.js"></script>
<script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.fancybox.min.js"></script>
<script src="<?= base_url() ?>assets/js/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/js/parallax.min.js"></script>
<script src="<?= base_url() ?>assets/js/backToTop.js"></script>
<script src="<?= base_url() ?>assets/js/purecounter.js"></script>
<script src="<?= base_url() ?>assets/js/ajax-form.js"></script>
<script src="<?= base_url() ?>assets/js/wow.min.js"></script>
<script src="<?= base_url() ?>assets/js/imagesloaded.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>
<link href="<?= base_url('assets/sweetalert/sweetalert.css') ?>" rel="stylesheet" type="text/css">
<script src="<?= base_url('assets/sweetalert/sweetalert.min.js') ?>"></script>
<script src="<?= base_url('assets/sweetalert/jquery.sweet-alert.custom.js') ?>"></script>
<script>
function deleteReview(id) {
    swal({
        title: 'Are you sure want to delete this review?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#36A1EA',
        cancelButtonColor: '#e50914',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        closeOnConfirm: true,
        closeOnCancel: true
    }, function(isConfirm) {
        if (isConfirm) {
            window.location.href = '<?= base_url('home/deleteReview/') ?>' + id
        }
    });
}
function subscribe() {
    var email = $('#user_email').val();
    if(email.length == 0) {
        $("#success").show().html("<p style='color: red; margin:0;'>Please enter your email address</p>").fadeIn(2000);
        setTimeout(function() {
            $("#success").hide();
        }, 2000);
    } else {
        $.ajax({
        url: "<?php echo site_url('Home/user_subscribe');?>",
        dataType: "JSON",
        method: "POST",
        data: { user_email: email },
        success: function(data) {
            console.log(data);
            if (data == 1) {
                $("#success").show().html("<p style='color: red; margin:0;'>This email is already exists.</p>").fadeIn(2000);
                setTimeout(function() {
                    location.reload();
                    $("#success").hide();
                }, 4000);
            } else if (data == 2) {
                $("#success").show().html("<p style='color: green; margin:0;'>Your subscription is successful.</p>").fadeIn(2000);
                setTimeout(function() {
                    $("#success").hide();
                }, 4000);
                setTimeout(function() {
                    location.reload();
                }, 5500);
            } else {
                $("#error").show().html("<p style='color: green; margin:0;'>Something went wrong. Please try again.</p>").fadeIn(2000);
                setTimeout(function() {
                    $("#error").hide();
                }, 4000);
            }
        }
    })
    }
}
</script>
</body>
</html>