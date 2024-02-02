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
                        <h2 class="section__title">Register Here</h2>
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
                            <?php $this->session->unset_userdata('success');
                        }
                        if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                            <?php $this->session->unset_userdata('error');
                        }
                        $err = validation_errors();
                        if ($err) { ?>
                            <div class="alert alert-warning alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $err; ?>
                            </div>
                        <?php } ?>
                            <form autocomplete="off" name="form1" id="quickFormValidation" method="post" action="<?= base_url('home/studentRegistration') ?>">
                                <div class="sign__input-wrapper mb-25">
                                    <h5>First Name</h5>
                                    <div class="sign__input">
                                        <input type="text" id="fname" name="fname" value="" placeholder="First Name" required="">
                                        <i class="fal fa-user"></i>
                                    </div>
                                </div>
                                <div class="sign__input-wrapper mb-25">
                                    <h5>Last Name</h5>
                                    <div class="sign__input">
                                        <input type="text" id="lname" name="lname" value="" placeholder="Last Name" required="">
                                        <i class="fal fa-user"></i>
                                    </div>
                                </div>
                                <div class="sign__input-wrapper mb-25">
                                    <h5>Email</h5>
                                    <div class="sign__input">
                                        <input type="email" id="email" name="email" value="" placeholder="Email address" required="">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="sign__input-wrapper mb-25">
                                    <h5>Password</h5>
                                    <div class="sign__input">
                                        <input type="password" id="password" name="password" value="" placeholder="******" required="">
                                        <i class="fal fa-lock"></i>
                                    </div>
                                </div>
                                <div class="sign__input-wrapper mb-10">
                                    <h5>Re Enter Password</h5>
                                    <div class="sign__input">
                                        <input type="password" name="confirm_password" id="confirm_password" value="" placeholder="******" required="">
                                        <i class="fal fa-lock"></i>
                                    </div>
                                </div>
                                <div class="sign__input-wrapper mb-10">
                                    <div class="e-btn w-50 reg_cstm_scls" onclick="get_value(1)">
                                        <span class="user-tab cstm_text1" user_type="1">Student</span>
                                    </div>
                                    <div class="e-btn w-50 reg_cstm_icls" onclick="get_value(2)">
                                        <span class="user-tab cstm_text2" user_type="2">Instructor</span>
                                    </div>
                                    <input type="hidden" name="user_type" id="user_type" required>
                                </div>
                                <div class="sign__action d-flex justify-content-between mb-30">
                                    <div class="sign__agree d-flex align-items-center">
                                        <input class="m-check-input" type="checkbox" id="m-agree">
                                        <label class="m-check-label text-dark" for="m-agree">I agree to the <a href="javascript:void(0)" id="exampleModal">Terms & Conditions</a></label>
                                    </div>
                                </div>
                                <button class="e-btn w-100"> <span></span> Sign Up</button>
                                <div class="sign__new text-center mt-20">
                                    <p>Already have account? <a href="<?= base_url() ?>login"> Login</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <?php $about_data = $this->db->query("SELECT * FROM `cms` WHERE `id` = 12")->row();?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?= $about_data->title?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #000;height: 0px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?= $about_data->description; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<style>
.reg_cstm_scls {width: 47% !important; float: left; margin-right: 24px; background: #e6e6e7; color: #000;}
.reg_cstm_icls {width: 47% !important; background: #e6e6e7; color: #000;}
.select {background: #db3636; color: #fff; cursor: pointer;}
.select:hover{color: #fff !important;}
.reg_cstm_scls:hover{color: #000;}
.reg_cstm_icls:hover{color: #000;}
.alert-dismissible {text-align: justify;}
.show{opacity: 1;display: block;background: #0000009e;transition: all 0.3s ease-out 0s;}
.modal-header{align-items: normal !important;}
.modal-title{color: #000;}
.modal-body {height: 250px; overflow: overlay;}
.modal-body *{color: #000; font-size: 10px;line-height: normal;margin: 0;padding: 0;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#user_type').val(1);
})
function get_value(id) {
    $('#user_type').val(id);
    if(id == 1) {
        $('.reg_cstm_scls').addClass('select');
        $('.reg_cstm_icls').removeClass('select');
    } else { 
        $('.reg_cstm_icls').addClass('select');
        $('.reg_cstm_scls').removeClass('select');
    }
}
$('#exampleModal').click(function(){
    $('#exampleModalCenter').addClass('show');
})
$('.close').click(function(){
    $('#exampleModalCenter').removeClass('show');
})
</script>