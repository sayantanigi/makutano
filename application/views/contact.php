<?php $getOptionsSql = "SELECT * FROM `options`";
$optionsList = $this->db->query($getOptionsSql)->result(); ?>
<style>
#form-messages {text-align: center; margin-top: 10px;}
.contact__social ul li {display: inline-block; margin-right: 4px !important;}
.contact__form-agree label a {color: #db3636 !important;}
</style>
<main>
    <section class="signup__area po-rel-z1 pt-100 pb-145">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 mt-50">
                    <div class="section__title-wrapper text-center mb-55">
                        <h2 class="section__title">Contact Us</h2>
                        <nav>
                            <ol class="breadcrumbnav mb-lg-0">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-xxl-7 col-xl-7 col-lg-6">
                        <div class="contact__wrapper">
                            <div class="section__title-wrapper mb-40">
                                <h2 class="section__title">Get in touch</h2>
                            </div>
                            <p class="e_error" style="color: #db3636;">* All fields are mandatory</p>
                            <p class="e_cerror" style="color: #db3636;">* Please check checkbox</p>
                            <div class="contact__form">
                                <form id="contact-form">
                                    <div class="row">
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input">
                                                <input class="from-control" type="text" id="name" name="name" placeholder="Your Name" required="">
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-md-6">
                                            <div class="contact__form-input">
                                                <input class="from-control" type="text" id="email" name="email" placeholder="Your Email" required="">
                                            </div>
                                        </div>
                                        <div class="col-xxl-6">
                                            <div class="contact__form-input">
                                                <input class="from-control" type="text" id="subject" name="subject" placeholder="Subject" required="">
                                            </div>
                                        </div>
                                        <div class="col-xxl-6">
                                            <div class="contact__form-input">
                                                <input class="from-control" type="text" id="phone" name="phone" placeholder="Contact Number" required="" maxlength="10">
                                            </div>
                                        </div>
                                        <div class="col-xxl-12">
                                            <div class="contact__form-input">
                                                <textarea class="from-control" id="message" name="message" placeholder="Enter Your Message" required=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xxl-12">
                                            <div class="contact__form-agree  d-flex align-items-center mb-20">
                                                <input class="e-check-input" type="checkbox" id="e-agree" class="checkAgree" required>
                                                <label class="e-check-label text-white" for="e-agree">I agree to the<a href="<?= base_url('term') ?>">Terms &amp; Conditions</a></label>
                                            </div>
                                        </div>
                                        <div class="col-xxl-12">
                                            <div class="contact__btn">
                                                <button type="button" class="e-btn" onclick="send_message()">Send your message</button>
                                            </div>
                                        </div>
                                        <div class="success_msg" style="color: #db3636; margin-top: 20px;"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 offset-xxl-1 col-xl-4 offset-xl-1 col-lg-5 offset-lg-1">
                        <div class="contact__info white-bg p-relative z-index-1 rounded">
                            <div class="contact__info-inner white-bg">
                                <ul>
                                    <li>
                                        <div class="contact__info-item d-flex align-items-start mb-35">
                                            <div class="contact__info-icon mr-15">
                                                <svg class="map" viewBox="0 0 24 24">
                                                    <path class="st0" d="M21,10c0,7-9,13-9,13s-9-6-9-13c0-5,4-9,9-9S21,5,21,10z"></path>
                                                    <circle class="st0" cx="12" cy="10" r="3"></circle>
                                                </svg>
                                            </div>
                                            <div class="contact__info-text">
                                                <h4 class="text-dark"> Office Address</h4>
                                                <p><?php echo $optionsList[6]->option_value?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact__info-item d-flex align-items-start mb-35">
                                            <div class="contact__info-icon mr-15">
                                                <svg class="mail" viewBox="0 0 24 24">
                                                    <path class="st0" d="M4,4h16c1.1,0,2,0.9,2,2v12c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V6C2,4.9,2.9,4,4,4z"></path>
                                                    <polyline class="st0" points="22,6 12,13 2,6 "></polyline>
                                                </svg>
                                            </div>
                                            <div class="contact__info-text">
                                                <h4 class="text-dark">Email us directly</h4>
                                                <p><a href="mailto:<?php echo $optionsList[8]->option_value?>"><?php echo $optionsList[8]->option_value?></a></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="contact__info-item d-flex align-items-start mb-35">
                                            <div class="contact__info-icon mr-15">
                                                <svg class="call" viewBox="0 0 24 24">
                                                    <path class="st0" d="M22,16.9v3c0,1.1-0.9,2-2,2c-0.1,0-0.1,0-0.2,0c-3.1-0.3-6-1.4-8.6-3.1c-2.4-1.5-4.5-3.6-6-6  c-1.7-2.6-2.7-5.6-3.1-8.7C2,3.1,2.8,2.1,3.9,2C4,2,4.1,2,4.1,2h3c1,0,1.9,0.7,2,1.7c0.1,1,0.4,1.9,0.7,2.8c0.3,0.7,0.1,1.6-0.4,2.1  L8.1,9.9c1.4,2.5,3.5,4.6,6,6l1.3-1.3c0.6-0.5,1.4-0.7,2.1-0.4c0.9,0.3,1.8,0.6,2.8,0.7C21.3,15,22,15.9,22,16.9z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="contact__info-text">
                                                <h4 class="text-dark">Phone</h4>
                                                <p><a href="tel:<?php echo $optionsList[7]->option_value?>"><?php echo $optionsList[7]->option_value?></a></p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="contact__social">
                                    <h4 class="text-dark">Follow Us</h4>
                                    <ul>
                                        <li><a href="#" class="fb"><i class="social_facebook"></i></a></li>
                                        <li><a href="#" class="tw"><i class="social_twitter"></i></a></li>
                                        <li><a href="#" class="fb"><i class="social_linkedin"></i></a></li>
                                        <li><a href="#" class="pin"><i class="social_instagram"></i></a></li>
                                        <li><a href="#" class="pin"><i class="social_youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<style>
    .termsCheckSubmit {display: none;}
    .e_error {display: none;}
    .e_cerror {display: none;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
    checkBox = document.getElementById('upload_option').addEventListener('click', event => {
        if(event.target.checked) {
            return true;
        } else {
            setTimeout(function(){
                $('.termsCheckSubmit').toggle()
            }, 5000);
            return false;
        }
    });
})

function send_message() {
    var name = $('#name').val();
    var email = $('#email').val();
    var subject = $('#subject').val();
    var phone = $('#phone').val();
    var message = $('#message').val();
    
    if(name == "" || email == "" || subject == "" || phone == "" || message == "") {
        $('.e_error').fadeIn('slow');
        setTimeout(() => {
            $('.e_error').fadeOut('slow');
        }, 5000);
    } else {
        if($("input[type='checkbox']").is(':checked')) {
            $.ajax({
                url: '<?php echo base_url("home/contactFormSubmit")?>',
                type: 'post',
                data: {name: name, email: email, subject: subject, phone: phone, message: message},
                success: function (response) {
                    //console.log(response);
                    //$(formMessages).removeClass('error');
                    //$(formMessages).addClass('success');
                    $('.success_msg').text(response);
                    $('#contact-form')[0].reset();
                },
                error: function () {
                    if (data.responseText !== '') {
                        $('.success_msg').text(data.responseText);
                    } else {
                        $('.success_msg').text('Oops! An error occured and your message could not be sent.');
                    }
                },
                complete: function () {
                    $('#contact-form')[0].reset();
                    setTimeout(() => {
                        location.reload();
                    }, 5000);
                },
            });
        } else {
            $('.e_cerror').fadeIn('slow');
            setTimeout(() => {
                $('.e_cerror').fadeOut('slow');
            }, 5000);
        }
    }
}

</script>