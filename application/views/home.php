<main>
    <section class="hero__area hero__height hero__height-2 d-flex align-items-center black-bg p-relative fix">
        <div class="hero__shape">
            <img class="hero-1-circle" src="<?= base_url() ?>assets/img/shape/hero/hero-1-circle.png" alt="">
            <img class="hero-1-circle-2" src="<?= base_url() ?>assets/img/shape/hero/hero-1-circle-2.png" alt="">
            <img class="hero-1-dot-2" src="<?= base_url() ?>assets/img/shape/hero/hero-1-dot-2.png" alt="">
        </div>
        <div class="container">
            <div class="hero__content-wrapper mt-90">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="hero__content hero__content-2 p-relative z-index-1 text-white">
                            <h3 class="hero__title hero__title-2 text-white">
                                Makutano places African leadership
                            </h3>
                            <h4>at the centre of the development equation and asks local & regional champions to honour their roles in society. </h4>
                            <div class="hero__search mt-50">
                                <form method="post" action="<?php echo base_url()?>search-query">
                                    <div class="hero__search-input mb-10 ">
                                        <input type="text" placeholder="What do you want to learn?" id="search_input" name="search_input">
                                        <button type="submit"><i class="fad fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="hero__thumb-wrapper mb--120">
                            <div class="hero__thumb-2 scene">
                                <img class="hero-big" src="<?= base_url() ?>assets/img/hero/hero-2/hero.png" alt="">
                                <img class="hero-shape-purple" src="<?= base_url() ?>assets/img/hero/hero-2/hero-shape-purple.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services__area pt-115 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3">
                    <div class="section__title-wrapper section-padding mb-60 text-center">
                        <h2 class="section__title">3 Fields of action.</h2>
                        <p>The actions of Makutano are organised around 3 key pillars: <strong>Business, Collective Economic Intelligence </strong> and <strong>Influence.</strong></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if(!empty($home_list->result_array())) {
                $i = 1;
                foreach ($home_list->result_array() as $row) { 
                if(!empty($row['course_url'])) {
                    $url = $row['course_url'];
                } else {
                    $url = 'javascript:void(0)';
                } ?>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6  mb-30">
                    <div class="services__item <?php if ($i == 1) {echo "blue-bg-4";} else if($i == 2) {echo "pink-bg";} else {echo "purple-bg";}?> h-100">
                        <div class="services__icon">
                            <img src="<?= base_url('uploads/homecourse/' . @$row['course_icon']) ?>" alt="" style="width: 57px;">
                        </div>
                        <div class="services__content">
                            <h3 class="services__title"><a href="<?= $url?>"><?php if (@$row['heading']) { echo @$row['heading']; } else { echo "&#8212;"; } ?></a></h3>
                            <p><?php if(@$row['sub_heading']) { echo strip_tags(@$row['sub_heading']); } ?></p>
                        </div>
                    </div>
                </div>
                <?php $i++; } } ?>
            </div>
        </div>
    </section>
    <section class="about__area pt-90 pb-150">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-5 col-xl-6 col-lg-6">
                    <div class="about__thumb-wrapper">
                        <div class="about__thumb ml-100">
                            <?php if(!empty($power_speech)) { ?>
                            <img src="<?= base_url() ?>uploads/powerspeech/<?= $power_speech->icon?>" alt="">
                            <?php } else { ?>
                            <img src="<?= base_url() ?>images/no-user.jpg" alt="">
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="about__content pl-70 pr-60 pt-25">
                        <div class="section__title-wrapper mb-25">
                            <h2 class="section__title"><?= $power_speech->heading?></h2>
                            <h4><?= $power_speech->sub_heading?></h4>
                            <p><?= $power_speech->message?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="course__area  pb-120 black-bg">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xxl-5 col-xl-6 col-lg-6">
                    <div class="section__title-wrapper mb-60">
                        <h2 class="section__title">Find the Right<br>Online Course for you</h2>
                        <p>You don't have to struggle alone, you've got our assistance and help.</p>
                    </div>
                </div>
                <!-- <div class="col-xxl-7 col-xl-6 col-lg-6">
                    <div class="course__menu d-flex justify-content-lg-end mb-60">
                        <div class="masonary-menu filter-button-group">
                            <button class="active" data-filter="*">See All <span class="tag">new</span></button>
                            <button data-filter=".cat1">Trending</button>
                            <button data-filter=".cat2">Popularity</button>
                            <button data-filter=".cat3">Featured</button>
                            <button data-filter=".cat4">Art & Design</button>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="row grid">
                <?php if(!empty($list)) { 
                foreach ($list as $value) {
                $catname = $this->db->query("SELECT * FROM sm_category WHERE id = '".$value->cat_id."'")->row(); ?>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 grid-item cat1 cat2 cat4">
                    <div class="course__item white-bg mb-30 fix">
                        <div class="course__thumb w-img p-relative fix">
                            <a href="<?=base_url('course-detail/'.@$value->id)?>">
                                <img src="<?= base_url() ?>assets/images/courses/<?= $value->image?>" alt="" style="height: 257px">
                            </a>
                            <div class="course__tag">
                                <a href="javascript:void(0)"><?= $catname->category_name?></a>
                            </div>
                        </div>
                        <div class="course__content">
                            <div class="course__meta d-flex align-items-center justify-content-between">
                                <div class="course__lesson">
                                    <?php 
                                    $module = $this->db->query("SELECT count(id) as total_module FROM course_modules WHERE course_id = '".$value->id."'")->row();
                                    if(!empty($module)) {
                                        $count = $module->total_module;
                                    } else {
                                        $count = '0';
                                    }
                                    ?>
                                    <span><i class="far fa-book-alt"></i><?= $count;?> Lesson</span>
                                </div>
                                <div class="productListRate">
                                <?php 
                                $rating = $this->db->query("SELECT * FROM course_reviews WHERE course_id = '".$value->id."'")->result_array();
                                $totalrate = $this->db->query("SELECT SUM(rating) as total FROM course_reviews WHERE course_id = '".$value->id."'")->row();
                                if(!empty($rating)) {
                                $rate = round($totalrate->total/count($rating), 0); 
                                foreach (range(1,5) as $i) { 
                                if($rate > 0) { ?>
                                <span class="active"><i class="fas fa-star"></i></span>
                                <?php } else { ?>
                                <span><i class="fas fa-star"></i></span>
                                <?php } $rate--; } ?>
                                <?php } else { ?>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <?php } echo "(".round($totalrate->total/count($rating), 0).")";
                                ?>
                                </div>
                            </div>
                            <h3 class="course__title" style="font-size: 18px"><a href="<?=base_url('course-detail/'.@$value->id)?>"><?= $value->title?></a>
                            </h3>
                            <?php if(!empty($value->user_id)) { 
                            $user_details = $this->db->query("SELECT id, fname, lname, image FROM users WHERE id = '".$value->user_id."' AND email_verified = '1' AND status = '1'")->row();?>
                            <div class="course__teacher d-flex align-items-center">
                                <div class="course__teacher-thumb mr-15">
                                    <?php if(!empty($user_details->image)) { ?>
                                    <img src="<?= base_url() ?>uploads/users/<?= $user_details->image?>" alt="">
                                    <?php } else { ?>
                                    <img src="<?= base_url() ?>images/no-user.png" alt="">
                                    <?php } ?>
                                </div>
                                <h6><a href="javascript:void(0)"><?= $user_details->fname." ".$user_details->lname?></a></h6>
                            </div>
                            <?php } else { ?>
                            <div class="course__teacher d-flex align-items-center">
                                <div class="course__teacher-thumb mr-15">
                                    <img src="<?= base_url() ?>assets/img/favicon.png" alt="">
                                </div>
                                <h6><a href="javascript:void(0)">Admin</a></h6>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="course__more d-flex justify-content-between align-items-center">
                            <div class="course__status">
                                <?php if($value->course_fees == 'free') { ?>
                                <span><?= ucwords($value->course_fees)?></span>
                                <?php } else { ?>
                                <span><?= "$". ucwords($value->price)?></span>
                                <?php } ?>
                            </div>
                            <div class="course__btn">
                                <a href="<?=base_url('course-detail/'.@$value->id)?>" class="link-btn">
                                    Know Details
                                    <i class="far fa-arrow-right"></i>
                                    <i class="far fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } } else { ?>
                <p style="font-size: larger; color: #d3e0d4; text-align: center;">No course added yet</p>
                <?php } ?>
            </div>
            <?php 
            $countCourse = $this->db->query("SELECT COUNT(id) as id FROM courses WHERE status = '1'")->row();
            if($countCourse->id > 6) { ?>
            <div style="text-align: center;"><a href="<?php echo base_url()?>course-list" class="e-btn e-btn-border-2">View All Course</a></div>
            <?php } ?>
        </div>
    </section>
    <section class="what__area pb-110">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="section__title-wrapper mb-60 text-center">
                        <h2 class="section__title">Register yourself </h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-5 offset-xl-1 col-xl-5 offset-xl-1 col-lg-6">
                    <div class="what__item transition-3 mb-30 p-relative fix">
                        <div class="what__thumb w-img">
                            <img src="<?= base_url() ?>assets/img/what/what-1.jpg" alt="">
                        </div>
                        <div class="what__content p-absolute text-center">
                            <h3 class="what__title white-color">Mostly <br> Online Learning</h3>
                            <a href="<?= base_url()?>register" class="e-btn e-btn-border-2">Start a class today</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-6">
                    <div class="what__item transition-3 mb-30 p-relative fix">
                        <div class="what__thumb w-img">
                            <img src="<?= base_url() ?>assets/img/what/what-2.jpg" alt="">
                        </div>
                        <div class="what__content p-absolute text-center">
                            <h3 class="what__title white-color">Become <br> an Instructor</h3>
                            <a href="<?= base_url()?>register" class="e-btn e-btn-border-2">Start teaching</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial__area testimonial__overlay pt-110 pb-110"
        data-background="<?= base_url() ?>assets/img/testimonial/testimonial-bg.jpg">
        <div class="container">
            <div class="col-xxl-12">
                <div class="testimonial__slider swiper-container">
                    <div class="testimonial__slider-inner swiper-wrapper">
                        <div class="testimonial__item text-center swiper-slide">
                            <div class="testimonial__thumb">
                                <img src="<?= base_url() ?>assets/img/testimonial/testi-1.jpg" alt="">
                            </div>
                            <div class="testimonial__content">
                                <p>“ Barmy loo sloshed porkiesdo with me down the pub say bubble and squeak. ”</p>
                                <div class="testimonial__info">
                                    <h4>Jason Response</h4>
                                    <span>UX Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial__item text-center swiper-slide">
                            <div class="testimonial__thumb">
                                <img src="<?= base_url() ?>assets/img/testimonial/testi-1.jpg" alt="">
                            </div>
                            <div class="testimonial__content">
                                <p>“ Barmy loo sloshed porkiesdo with me down the pub say bubble and squeak. ”</p>
                                <div class="testimonial__info">
                                    <h4>Jason Response</h4>
                                    <span>UX Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial__item text-center swiper-slide">
                            <div class="testimonial__thumb">
                                <img src="<?= base_url() ?>assets/img/testimonial/testi-1.jpg" alt="">
                            </div>
                            <div class="testimonial__content">
                                <p>“ Barmy loo sloshed porkiesdo with me down the pub say bubble and squeak. ”</p>
                                <div class="testimonial__info">
                                    <h4>Jason Response</h4>
                                    <span>UX Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next swiper-nav"><i class="far fa-arrow-right"></i></div>
                    <div class="swiper-button-prev swiper-nav"><i class="far fa-arrow-left"></i></div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog__area pt-115 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 offset-xxl-3">
                    <div class="section__title-wrapper text-center mb-60">
                        <h2 class="section__title">Latest Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="blog__item white-bg mb-30 transition-3 fix">
                        <div class="blog__thumb w-img fix">
                            <a href="<?= base_url() ?>blog/blog_details">
                                <img src="<?= base_url() ?>assets/img/blog/blog-1.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog__content">
                            <h3 class="blog__title"><a href="<?= base_url() ?>blog/blog_details">The Challenge Of Global Learning In Public Education</a></h3>
                            <div class="blog__meta d-flex align-items-center justify-content-between">
                                <div class="blog__author d-flex align-items-center">
                                    <div class="blog__author-thumb mr-10">
                                        <img src="<?= base_url() ?>assets/img/blog/author/author-1.jpg" alt="">
                                    </div>
                                    <div class="blog__author-info">
                                        <h5>Jim Séchen</h5>
                                    </div>
                                </div>
                                <div class="blog__date d-flex align-items-center">
                                    <i class="fal fa-clock"></i>
                                    <span>April 02, 2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="blog__item white-bg mb-30 transition-3 fix">
                        <div class="blog__thumb w-img fix">
                            <a href="<?= base_url() ?>blog/blog_details">
                                <img src="<?= base_url() ?>assets/img/blog/blog-2.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog__content">
                            <h3 class="blog__title"><a href="<?= base_url() ?>blog/blog_details">Exactly How Technology Can Make Reading Better</a></h3>
                            <div class="blog__meta d-flex align-items-center justify-content-between">
                                <div class="blog__author d-flex align-items-center">
                                    <div class="blog__author-thumb mr-10">
                                        <img src="<?= base_url() ?>assets/img/blog/author/author-2.jpg" alt="">
                                    </div>
                                    <div class="blog__author-info">
                                        <h5>Barry Tone</h5>
                                    </div>
                                </div>
                                <div class="blog__date d-flex align-items-center">
                                    <i class="fal fa-clock"></i>
                                    <span>July 02, 2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="blog__item white-bg mb-30 transition-3 fix">
                        <div class="blog__thumb w-img fix">
                            <a href="<?= base_url() ?>blog/blog_details">
                                <img src="<?= base_url() ?>assets/img/blog/blog-3.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog__content">
                            <h3 class="blog__title"><a href="<?= base_url() ?>blog/blog_details">New Chicago school budget relies on state pension</a></h3>
                            <div class="blog__meta d-flex align-items-center justify-content-between">
                                <div class="blog__author d-flex align-items-center">
                                    <div class="blog__author-thumb mr-10">
                                        <img src="<?= base_url() ?>assets/img/blog/author/author-3.jpg" alt="">
                                    </div>
                                    <div class="blog__author-info">
                                        <h5>Barry Tone</h5>
                                    </div>
                                </div>
                                <div class="blog__date d-flex align-items-center">
                                    <i class="fal fa-clock"></i>
                                    <span>July 02, 2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>