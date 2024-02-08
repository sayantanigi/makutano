<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Apimodel');
		$this->load->model('Commonmodel');
        $this->load->model('User_model');
        $this->load->library('session');
		require 'vendor/autoload.php';
	}
	public function index() {
		$data = array('title' => 'Home','page' => 'home');
        $getBannerSql = "SELECT * FROM `banner` WHERE `status` = '1' ORDER BY `id` DESC";
        $data['banners'] = $this->db->query($getBannerSql)->result();
        $getHomeCourseListSql = "SELECT * from `homecourse` WHERE `status` = '1' ORDER BY `id` DESC limit 3";
        $data['home_list'] = $this->db->query($getHomeCourseListSql);
        $getPowerSpeechSql = "SELECT * from `powerspeech` WHERE `id` = '1'";
        $data['power_speech'] = $this->db->query($getPowerSpeechSql)->row();
        $getcourselistsql = "SELECT * from `courses` WHERE `status` = '1' ORDER BY `id` DESC limit 6";
        $data['list'] = $this->Commonmodel->fetch_all_join($getcourselistsql);
        $getReviewSql = "SELECT `courses`.`id`, `courses`.`title`, `users`.`id`,`users`.`fname`, `users`.`lname`, `users`.`email`, `users`.`image`, `course_reviews`.`review_id`, `course_reviews`.`review_message` FROM `course_reviews` JOIN `courses` ON `courses`.`id` = `course_reviews`.`course_id` JOIN `users` ON `users`.`id` = `course_reviews`.`user_id` GROUP BY `users`.`id` ORDER BY `course_reviews`.`review_date` DESC";
        $data['student_review'] = $this->db->query($getReviewSql)->result();
        $getPartnerListSql = "SELECT * from `gallery` WHERE `status` = '1' ORDER BY `id` DESC";
        $data['partners'] = $this->Commonmodel->fetch_all_join($getPartnerListSql);
		$this->load->view('header', $data);
		$this->load->view('home');
		$this->load->view('footer');
	}
	public function about() {
		$data = array('title' => 'About Us','page' => 'about');
        $getAboutDataSql = "SELECT * FROM `cms` WHERE `id` = 1";
        $about_data = $this->db->query($getAboutDataSql);
        $data['aboutData'] = $about_data->result_array();
        /*$getReviewSql = "SELECT `courses`.`id`, `courses`.`title`, `users`.`id`,`users`.`fname`, `users`.`lname`, `users`.`email`, `users`.`image`, `course_reviews`.`review_id`, `course_reviews`.`review_message` FROM `course_reviews` JOIN `courses` ON `courses`.`id` = `course_reviews`.`course_id` JOIN `users` ON `users`.`id` = `course_reviews`.`user_id` GROUP BY `users`.`id` ORDER BY `course_reviews`.`review_date` DESC";
        $data['student_review'] = $this->db->query($getReviewSql)->result();*/
		$this->load->view('header', $data);
		$this->load->view('about');
		$this->load->view('footer');
	}
    public function term_conditions() {
		$data = array('title' => 'Terms & Condition','page' => 'terms');
        $getAboutDataSql = "SELECT * FROM `cms` WHERE `id` = 12";
        $about_data = $this->db->query($getAboutDataSql);
        $data['termsData'] = $about_data->result_array();
		$this->load->view('header', $data);
		$this->load->view('terms');
		$this->load->view('footer');
	}
    public function consulting() {
		$data = array('title' => 'Consulting','page' => 'consulting');
        $getConsultDataSql = "SELECT * FROM `cms` WHERE `id` = 21";
        $consult_data = $this->db->query($getConsultDataSql);
        $data['consultData'] = $consult_data->result_array();
		$this->load->view('header', $data);
		$this->load->view('consulting');
		$this->load->view('footer');
	}
    public function privacy_policy() {
		$data = array('title' => 'Privacy Policy','page' => 'terms');
        $getAboutDataSql = "SELECT * FROM `cms` WHERE `id` = 2";
        $about_data = $this->db->query($getAboutDataSql);
        $data['privacyData'] = $about_data->result_array();
		$this->load->view('header', $data);
		$this->load->view('privacy');
		$this->load->view('footer');
	}
    public function refund_policy() {
		$data = array('title' => 'Refund Policy','page' => 'terms');
        $getAboutDataSql = "SELECT * FROM `cms` WHERE `id` = 22";
        $about_data = $this->db->query($getAboutDataSql);
        $data['refundData'] = $about_data->result_array();
		$this->load->view('header', $data);
		$this->load->view('refund');
		$this->load->view('footer');
	}
	public function courseList() {
		$data = array('title' => 'Course List', 'page' => 'course');
        $getCourseListSql = "SELECT * from `courses` WHERE `status` = '1' ORDER BY `id` DESC";
        $data['list'] = $this->Commonmodel->fetch_all_join($getCourseListSql);
        $data['course_cat'] = $this->db->get('sm_category')->result_array();
		$this->load->view('header', $data);
		$this->load->view('course-list');
		$this->load->view('footer');
	}
    public function searchByInputValue() {
        $input_data = $this->input->post('input_data');
        $getfilteredCourseListSql = "SELECT * from `courses` WHERE `title` like '%".$input_data."%'";
        $filteredCourseList = $this->Commonmodel->fetch_all_join($getfilteredCourseListSql);
        $html = '';
        if(!empty($filteredCourseList)){
            foreach ($filteredCourseList as $row) {
                if (@$row->image && file_exists('./assets/images/courses/' . @$row->image)) {
                    $image = base_url('assets/images/courses/' . @$row->image);
                } else {
                    $image = base_url('./images/noimage.jpg');
                }
                $getAverageRatingSql = "SELECT ROUND(AVG(rating),1) as averageRating FROM `course_reviews` where `course_id` = '" . @$row->id . "'";
                $ratingRow = $this->db->query($getAverageRatingSql)->row();
                $averageRating = @$ratingRow->averageRating;
                $rating = @$ratingRow->averageRating;
                $totalEnrolledSql = "SELECT * FROM `course_enrollment` WHERE `course_id` = '" . @$row->id . "' AND `payment_status` = 'COMPLETED'";
                $totalEnrolledUsr = $this->db->query($totalEnrolledSql)->num_rows();
                $html .= '<div class="col-lg-6 col-md-6 col-sm-6 mb-40"><div class="courses-item"><div class="img-part">';
                $html .= '<img src="'.@$image.'" alt="Course Image..."></div><div class="content-part"><h3 class="title truncate2 m-0">';
                $html .= '<a href="'.base_url('course-detail/'.@$row->id).'">'.strip_tags($row->title).'</a></h3>';
                $html .= '<ul class="meta-part m-0"><li class="user"><img src="'.base_url('user_assets/images/C2C_Home/Tag_Blue.png').'"></li><li><span class="price">$'.number_format($row->price, 2).'</span></li></ul>';
                $html .= '<div class="bottom-part"><div class="info-meta"><ul><li class="ratings"><span class="stars">';
                for ( $i = 1; $i <= 5; $i++ ) {
                    if ( round( $rating - .25 ) >= $i ) {
                        $html .= '<i class="fa fa-star"></i>';
                    } elseif ( round( $rating + .25 ) >= $i ) {
                        $html .= '<i class="fa fa-star-half-o"></i>';
                    } else {
                        $html .= '<i class="fa fa-star-o"></i>';
                    }
                }
                $html .='</span>('.@$averageRating.')</li></ul></div><div class="btn-part"><a href="'.base_url('course-detail/'.@$row->id).'"><span>View Details</span></a></div></div></div></div></div>';
            }
        } else {
            $html = '<div class="col-lg-12 col-md-12 col-sm-12 mb-40" style="text-align : center;"><div class="courses-item">No Data found!</div></div>';
        }
        echo $html;
	}
    public function searchUsingSortBy() {
        if ($this->input->post('sortBy_data') == 'new_first') {
            $getfilteredCourseListSql = "SELECT * FROM `courses` where status = 1 ORDER BY `id` DESC";
            $filteredCourseList = $this->Commonmodel->fetch_all_join($getfilteredCourseListSql);
        } elseif ($this->input->post('sortBy_data') == 'old_first') {
            $getfilteredCourseListSql = "SELECT * FROM `courses` where status = 1 ORDER BY `id` ASC";
            $filteredCourseList = $this->Commonmodel->fetch_all_join($getfilteredCourseListSql);
        } elseif ($this->input->post('sortBy_data') == 'most_relevant') {
            $getfilteredCourseListSql = "SELECT COUNT(courses.id) AS total, courses.*, course_enrollment.enrollment_date FROM course_enrollment RIGHT JOIN courses ON course_enrollment.course_id = courses.id WHERE courses.status = 1 GROUP BY courses.id ORDER BY `course_enrollment`.`enrollment_date` ASC";
            $filteredCourseList = $this->Commonmodel->fetch_all_join($getfilteredCourseListSql);
        } elseif ($this->input->post('sortBy_data') == 'most_popular') {
            $getfilteredCourseListSql = "SELECT COUNT(courses.id) AS total, courses.* FROM course_enrollment JOIN courses ON course_enrollment.course_id = courses.id JOIN course_enrollment_status ON course_enrollment_status.course_id = courses.id WHERE courses.status = 1 GROUP BY courses.id ORDER BY total DESC";
            $filteredCourseList = $this->Commonmodel->fetch_all_join($getfilteredCourseListSql);
        } elseif ($this->input->post('sortBy_data') == 'top_rated_first') {
            $getfilteredCourseListSql = "SELECT COUNT(courses.id) AS total, SUM(course_reviews.rating), courses.* FROM course_reviews JOIN courses ON course_reviews.course_id = courses.id WHERE courses.status = 1 GROUP BY courses.id ORDER BY `SUM(course_reviews.rating)` DESC";
            $filteredCourseList = $this->Commonmodel->fetch_all_join($getfilteredCourseListSql);
        } elseif ($this->input->post('sortBy_data') == 'price_high_to_low') {
            $getfilteredCourseListSql = "SELECT * FROM `courses` where status = 1 ORDER BY `price` DeSC";
            $filteredCourseList = $this->Commonmodel->fetch_all_join($getfilteredCourseListSql);
        } elseif ($this->input->post('sortBy_data') == 'price_low_to_high') {
            $getfilteredCourseListSql = "SELECT * FROM `courses` where status = 1 ORDER BY `price` ASC";
            $filteredCourseList = $this->Commonmodel->fetch_all_join($getfilteredCourseListSql);
        } else {
            $getfilteredCourseListSql = "SELECT * FROM `courses` where status = 1";
            $filteredCourseList = $this->Commonmodel->fetch_all_join($getfilteredCourseListSql);
        }
        $html = '';
        if(!empty($filteredCourseList)){
            foreach ($filteredCourseList as $row) {
                if (@$row->image && file_exists('./assets/images/courses/' . @$row->image)) {
                    $image = base_url('assets/images/courses/' . @$row->image);
                } else {
                    $image = base_url('./images/noimage.jpg');
                }
                $getAverageRatingSql = "SELECT ROUND(AVG(rating),1) as averageRating FROM `course_reviews` where `course_id` = '" . @$row->id . "'";
                $ratingRow = $this->db->query($getAverageRatingSql)->row();
                $averageRating = @$ratingRow->averageRating;
                $rating = @$ratingRow->averageRating;
                $totalEnrolledSql = "SELECT * FROM `course_enrollment` WHERE `course_id` = '" . @$row->id . "' AND `payment_status` = 'COMPLETED'";
                $totalEnrolledUsr = $this->db->query($totalEnrolledSql)->num_rows();
                $html .= '<div class="col-lg-6 col-md-6 col-sm-6 mb-40"><div class="courses-item"><div class="img-part">';
                $html .= '<img src="'.@$image.'" alt="Course Image..."></div><div class="content-part"><h3 class="title truncate2 m-0">';
                $html .= '<a href="'.base_url('course-detail/'.@$row->id).'">'.strip_tags($row->title).'</a></h3>';
                $html .= '<ul class="meta-part m-0"><li class="user"><img src="'.base_url('user_assets/images/C2C_Home/Tag_Blue.png').'"></li><li><span class="price">$'.number_format($row->price, 2).'</span></li></ul>';
                $html .= '<div class="bottom-part"><div class="info-meta"><ul><li class="ratings"><span class="stars">';
                for ( $i = 1; $i <= 5; $i++ ) {
                    if ( round( $rating - .25 ) >= $i ) {
                        $html .= '<i class="fa fa-star"></i>';
                    } elseif ( round( $rating + .25 ) >= $i ) {
                        $html .= '<i class="fa fa-star-half-o"></i>';
                    } else {
                        $html .= '<i class="fa fa-star-o"></i>';
                    }
                }
                $html .='</span>('.@$averageRating.')</li></ul></div><div class="btn-part"><a href="'.base_url('course-detail/'.@$row->id).'"><span>View Details</span></a></div></div></div></div></div>';
            }
        } else {
            $html = '<div class="col-lg-12 col-md-12 col-sm-12 mb-40" style="text-align : center;"><div class="courses-item">No Data found!</div></div>';
        }
        echo $html;
    }
    public function searchUsingFilterBy() {
        $cat_id = $this->input->post('filterBy_data');
        $getfilteredCourseListSql = "SELECT * FROM `courses` where `cat_id`= $cat_id AND status = 1 ORDER BY `price` ASC";
        $filteredCourseList = $this->Commonmodel->fetch_all_join($getfilteredCourseListSql);
        $html = '';
        if(!empty($filteredCourseList)){
            foreach ($filteredCourseList as $row) {
                if (@$row->image && file_exists('./assets/images/courses/' . @$row->image)) {
                    $image = base_url('assets/images/courses/' . @$row->image);
                } else {
                    $image = base_url('./images/noimage.jpg');
                }
                $getAverageRatingSql = "SELECT ROUND(AVG(rating),1) as averageRating FROM `course_reviews` where `course_id` = '" . @$row->id . "'";
                $ratingRow = $this->db->query($getAverageRatingSql)->row();
                $averageRating = @$ratingRow->averageRating;
                $rating = @$ratingRow->averageRating;
                $totalEnrolledSql = "SELECT * FROM `course_enrollment` WHERE `course_id` = '" . @$row->id . "' AND `payment_status` = 'COMPLETED'";
                $totalEnrolledUsr = $this->db->query($totalEnrolledSql)->num_rows();
                $html .= '<div class="col-lg-6 col-md-6 col-sm-6 mb-40"><div class="courses-item"><div class="img-part">';
                $html .= '<img src="'.@$image.'" alt="Course Image..."></div><div class="content-part"><h3 class="title truncate2 m-0">';
                $html .= '<a href="'.base_url('course-detail/'.@$row->id).'">'.strip_tags($row->title).'</a></h3>';
                $html .= '<ul class="meta-part m-0"><li class="user"><img src="'.base_url('user_assets/images/C2C_Home/Tag_Blue.png').'"></li><li><span class="price">$'.number_format($row->price, 2).'</span></li></ul>';
                $html .= '<div class="bottom-part"><div class="info-meta"><ul><li class="ratings"><span class="stars">';
                for ( $i = 1; $i <= 5; $i++ ) {
                    if ( round( $rating - .25 ) >= $i ) {
                        $html .= '<i class="fa fa-star"></i>';
                    } elseif ( round( $rating + .25 ) >= $i ) {
                        $html .= '<i class="fa fa-star-half-o"></i>';
                    } else {
                        $html .= '<i class="fa fa-star-o"></i>';
                    }
                }
                $html .='</span>('.@$averageRating.')</li></ul></div><div class="btn-part"><a href="'.base_url('course-detail/'.@$row->id).'"><span>View Details</span></a></div></div></div></div></div>';
            }
        } else {
            $html = '<div class="col-lg-12 col-md-12 col-sm-12 mb-40" style="text-align : center;"><div class="courses-item">No Data found!</div></div>';
        }
        echo $html;
    }
	public function courseDetail($id) {
		$data = array('title' => 'Course Details', 'page' => 'course');
        $where = array('id'=> $id);
		$data['detail'] = $this->Commonmodel->fetch_row('courses', $where);
		$data['course_id'] = $id;
		$this->load->view('header', $data);
		$this->load->view('course-detail');
		$this->load->view('footer');
	}
    public function courseEnrollment($course_id = null){
        $user_id = $this->session->userdata('user_id');
        $isLoggedIn = $this->session->userdata('isLoggedIn');
		$data = array(
			'title' => 'Course Enrollment',
			'page' => 'course',
		);
        $where = array(
			'id'=> $course_id
		);
        $getUserSql = "SELECT * FROM `users` WHERE `id` = '".$user_id."'";
        $count = $this->db->query($getUserSql)->num_rows();
        $data['usr'] = $this->db->query($getUserSql)->row();
		$data['course'] = $this->Commonmodel->fetch_row('courses', $where);
        $data['course_id'] = @$course_id;
		$this->load->view('header', $data);
		$this->load->view('payment');
		$this->load->view('footer');
	}
    public function checkout() {
        $data['user_id'] = $this->input->post('user_id');
        $data['price_key'] = $this->input->post('enrollment');
        $this->session->set_userdata('course_id', $this->input->post('course_id'));
        $this->load->view('header', $data);
		$this->load->view('checkout');
		$this->load->view('footer');
    }
    public function success($id) {
        $data['p_id'] = $id;
        $this->load->view('header');
        $this->load->view('success', $data);
        $this->load->view('footer');
    }
    public function reviewSave() {
		$user_id = $this->session->userdata('user_id');
		$course_id = $this->input->post('course_id');
		$rating = $this->input->post('rating');
        $message = $this->input->post('message');
		$isExitMaterialSql = "SELECT * FROM `course_reviews` WHERE `user_id` = '" . $user_id . "' AND `course_id` = '" . $course_id . "'";
		$isExist = $this->db->query($isExitMaterialSql)->num_rows();
        if($isExist==0) {
            $reviewData = array('course_id' => @$course_id, 'user_id' => @$user_id, 'rating' => @$rating, 'review_message' => @$message, 'review_status' => 1);
            $this->Commonmodel->add_details('course_reviews', $reviewData);
            $getAllReviewSql = "SELECT rev.*, usr.fname, usr.lname from `course_reviews` as rev LEFT JOIN `users` as usr ON usr.id = rev.user_id WHERE `course_id` = '".$course_id."' ORDER BY `review_date` DESC";
            echo $this->db->query($getAllReviewSql)->num_rows();
        } else {
            echo"0";
        }
	}
    public function getAllReviews() {
		$user_id = $this->session->userdata('user_id');
		$course_id = $this->input->post('course_id');
		$getAllReviewSql = "SELECT rev.*, usr.fname, usr.lname from `course_reviews` as rev LEFT JOIN `users` as usr ON usr.id = rev.user_id WHERE `course_id` = '".$course_id."' ORDER BY `review_date` DESC";
        $data['reviewList'] = $this->db->query($getAllReviewSql)->result();
        $this->load->view('ajax-reviews', $data);
	}
	public function contact() {
		$data = array(
			'title' => 'Contact Us',
			'page' => 'contact',
		);
		$this->load->view('header', $data);
		$this->load->view('contact');
		$this->load->view('footer');
	}
    public function email_unsubscribe(){
        $id = $this->uri->segment(2);
        $data = array(
			'title' => 'Email Unsubscribe Page',
			'page' => 'Email Unsubscribe',
            'id' =>$id
        );
		$this->load->view('header', $data);
		$this->load->view('email_unsubscibe');
		$this->load->view('footer');
    }
    public function contactFormSubmit() {
		$fname = $this->input->post("name");
        $email = $this->input->post("email");
        $phone = $this->input->post("phone");
        $sub = $this->input->post("subject");
        $msg = $this->input->post("message");
        $contactFormData = array (
            'fname' => $fname, 
            'email' => $email, 
            'phone' => $phone, 
            'subject' => $sub, 
            'message' => $msg
        );
        $result = $this->Commonmodel->add_details('contacts', $contactFormData);
        $insert_id = $this->db->insert_id();
        if(!empty($insert_id)) {
            $subject = $sub;
            $getOptionsSql = "SELECT * FROM `options`";
            $optionsList = $this->db->query($getOptionsSql)->result();
            $imagePath = base_url().'uploads/logo/'.$optionsList[0]->option_value;
            $message = "<table style='width=100%;border=0;align=center;cellpadding=0;cellspacing=0'> <tbody> <tr> <td> <table class='col-600' style='margin-left:20px;margin-right:20px;border-left:1px solid #dbd9d9;border-right:1px solid #dbd9d9;border-top:2px solid #232323;width=600px;border=0;align=center;cellpadding=0;cellspacing=0'> <tbody> <tr> <td align='left' style='padding:5px 10px;font-family:Raleway,sans-serif;font-size:16px;font-weight:700;color:#2a3a4b'><img src='".$imagePath."' style='max-height: 40px;'></td> </tr> <tr> <td align='left' style='padding:5px 10px;font-family:Raleway,sans-serif;font-size:16px;font-weight:700;color:#2a3a4b'>Dear Team,</td> </tr> </tbody> </table> </td> </tr> <tr> <td align='center'> <table class='col-600' width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='margin-left:20px;margin-right:20px;border-left:1px solid #dbd9d9;border-right:1px solid #dbd9d9;border-bottom:2px solid #232323'> <tbody> <tr> <td align='left' style='padding:5px 10px;font-family:Lato,sans-serif;font-size:16px;color:#444;line-height:24px;font-weight:400'></td> </tr> <tr> <td align='left' style='padding:5px 10px;font-family:Lato,sans-serif;font-size:16px;color:#444;line-height:24px;font-weight:400'> <p style='background:#232323;color:#fff;padding:10px;text-decoration:none;line-height:24px'>Name : ".$fname."</p> </td> </tr> <tr> <td align='left' style='padding:5px 10px;font-family:Lato,sans-serif;font-size:16px;color:#444;line-height:24px;font-weight:400'> <p style='background:#232323;color:#fff;padding:10px;text-decoration:none;line-height:24px'>Email: ".$email."</p> </td> </tr> <tr> <td align='left' style='padding:5px 10px;font-family:Lato,sans-serif;font-size:16px;color:#444;line-height:24px;font-weight:400'> <p style='background:#232323;color:#fff;padding:10px;text-decoration:none;line-height:24px'>Phone: ".$phone."</p> </td> </tr> <tr> <td align='left' style='padding:5px 10px;font-family:Lato,sans-serif;font-size:16px;color:#444;line-height:24px;font-weight:400'> <p style='background:#232323;color:#fff;padding:10px;text-decoration:none;line-height:24px'>Message: ".nl2br($msg)."</p></td></tr></tbody></table></td></tr></tbody></table>";
            $mail = new PHPMailer(true);
            try {
                $mail->CharSet = 'UTF-8';
                $mail->SetFrom($email);
                $mail->AddAddress('sayantan@goigi.in', 'Makutano');
                $mail->IsHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $message;
                $mail->IsSMTP();
                //Send mail using GMAIL server
                /*$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                                   // Enable SMTP authentication
                $mail->Username = 'no-reply@goigi.com';                     // SMTP username
                $mail->Password = 'wj8jeml3eu0z';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                 // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;*/
                $mail->send();
            } catch (Exception $e) {
                $this->session->set_flashdata('error_message', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            }
            echo $msg = "Thank You for Contacting Us";
        } else {
            echo $msg = "Oops, Try again!";
        }
	}
    public function EmailUnsubcribeSubmit() {
        $email = $this->input->post("email");
        $date=date('Y-m-d h:i:s');

        $isExitSql = "SELECT * FROM `email_unsubscribe_list` WHERE `email_id` = '" . $email . "'";
		$isExist = $this->db->query($isExitSql)->num_rows();
        if($isExist==0) {
            $contactFormData = array ('email_id' => $email, 'status' => '0','created_at' =>$date);
            $result = $this->Commonmodel->add_details('email_unsubscribe_list', $contactFormData);
            $insert_id = $this->db->insert_id();
            if(!empty($insert_id)) {
                
                echo $msg = "Email unsubscribe successfully done";
            } else {
                echo $msg = "Opps, Try again!";
            }
        } else {
            echo $msg ="0";
        }
	}
    public function consultFormSubmit() {
		$fname = $this->input->post("name");
        $email = $this->input->post("email");
        $phone = $this->input->post("phone");
        $msg = $this->input->post("message");
        $consultFormData = array ('fname' => $fname, 'email' => $email, 'phone' => $phone, 'msg' => $msg);
        $result = $this->Commonmodel->add_details('consulting_form', $consultFormData);
        $insert_id = $this->db->insert_id();
        if(!empty($insert_id)) {
            $subject = "Consult With Us";
            $getOptionsSql = "SELECT * FROM `options`";
            $optionsList = $this->db->query($getOptionsSql)->result();
            $imagePath = base_url().'uploads/logo/'.$optionsList[0]->option_value;
            //$imagePath = base_url() . 'user_assets/images/C2C_Home/Header_Logo.png';
            $message = "<table style='width=100%;border=0;align=center;cellpadding=0;cellspacing=0'><tbody><tr><td><table class='col-600' style='margin-left:20px;margin-right:20px;border-left:1px solid #dbd9d9;border-right:1px solid #dbd9d9;border-top:2px solid #232323;width=600px;border=0;align=center;cellpadding=0;cellspacing=0'><tbody><tr><td align='left' style='padding:5px 10px;font-family:Raleway,sans-serif;font-size:16px;font-weight:700;color:#2a3a4b'><img src='".$imagePath."' style='max-height: 40px;'></td></tr><tr><td align='left' style='padding:5px 10px;font-family:Raleway,sans-serif;font-size:16px;font-weight:700;color:#2a3a4b'>Dear Team,</td></tr></tbody></table></td></tr><tr><td align='center'><table class='col-600' width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='margin-left:20px;margin-right:20px;border-left:1px solid #dbd9d9;border-right:1px solid #dbd9d9;border-bottom:2px solid #232323'><tbody><tr><td align='left' style='padding:5px 10px;font-family:Lato,sans-serif;font-size:16px;color:#444;line-height:24px;font-weight:400'></td></tr><tr><td align='left' style='padding:5px 10px;font-family:Lato,sans-serif;font-size:16px;color:#444;line-height:24px;font-weight:400'><p style='background:#232323;color:#fff;padding:10px;text-decoration:none;line-height:24px'>Name : ".$fname."</p></td></tr><tr><td align='left' style='padding:5px 10px;font-family:Lato,sans-serif;font-size:16px;color:#444;line-height:24px;font-weight:400'><p style='background:#232323;color:#fff;padding:10px;text-decoration:none;line-height:24px'>Email: ".$email."</p></td></tr><tr><td align='left' style='padding:5px 10px;font-family:Lato,sans-serif;font-size:16px;color:#444;line-height:24px;font-weight:400'><p style='background:#232323;color:#fff;padding:10px;text-decoration:none;line-height:24px'>Phone: ".$phone."</p></td></tr><tr><td align='left' style='padding:5px 10px;font-family:Lato,sans-serif;font-size:16px;color:#444;line-height:24px;font-weight:400'><p style='background:#232323;color:#fff;padding:10px;text-decoration:none;line-height:24px'>Message: ".nl2br($msg)."</p></td></tr></tbody></table></td></tr></tbody></table>";
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->CharSet = 'UTF-8';
                $mail->SetFrom($email);
                $mail->AddAddress('support@makutano.com', 'makutano');
                $mail->IsHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $message;
                //Send email via SMTP
                $mail->IsSMTP();
                $mail->send();
                // echo 'Message has been sent';
            } catch (Exception $e) {
                $this->session->set_flashdata('error_message', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            }
            echo $msg = "Thank You for Contacting Us";
        } else {
            echo $msg = "Opps, Try again!";
        }
	}
	public function register() {
		$data = array(
			'title' => 'Student Registration',
			'page' => 'register',
		);
		$this->load->view('header', $data);
		$this->load->view('register');
		$this->load->view('footer');
	}
	public function login($course_id = null) {
        if ($this->session->has_userdata('isLoggedIn') && $this->session->has_userdata('user_id')):
			redirect(base_url('student-dashboard'),'refresh');
		endif;
        $data = array(
            'title' => 'Sign In',
            'page' => 'Login',
            'course_id' => @$course_id,
        );
		$this->load->view('header', $data);
		$this->load->view('login');
		$this->load->view('footer');
    }
	public function forgotPassword() {
        $data = array(
            'title' => 'Forgot Password',
            'page' => 'forgotpassword',
        );
		$this->load->view('header', $data);
		$this->load->view('forgot-password');
		$this->load->view('footer');
    }
	public function studentRegistration() {
        $email = $this->input->post('email');
        $first_name = $this->testInput($this->input->post('fname'));
		$last_name = $this->testInput($this->input->post('lname'));
        $phone_full = $this->input->post('phone_full');
        $phone_code = $this->input->post('phone_code');
        $phone_country = $this->input->post('phone_country');
        $phone_st_country = $this->input->post('phone_st_country');
        $userType = $this->input->post('user_type');
        $check_email = $this->db->get_where('users', array('email' => $email))->num_rows();
        $check_phone = $this->db->get_where('users', array('phone_full' => $phone_full, 'status' => 1))->num_rows();
        if ($check_email > 0) {
            $this->session->set_flashdata('error', 'The email id you are trying to use is already registered. Please login, or create a new account using a unique email address!');
            redirect(base_url('register'), 'refresh');
        }
        $otp = $this->generate_otp(6);
        if ($check_email == 0) {
            $data = array(
				'currency' => 'USD',
				'currency_symbol' => '$',
                'fname' => $first_name,
				'lname' => $last_name,
                'email' => $email,
                'password' => md5($this->input->post('password')),
                'phone' => $this->input->post('phone'),
                'phone_full' => $phone_full,
                'phone_code' => $phone_code,
                'phone_country' => $phone_country,
                'phone_st_country' => $phone_st_country,
                'otp' => $otp,
				'email_verified' => '0',
				'status' => '0',
                'userType' => $userType,
                'created_at' => date('Y-m-d H:i:s')
            );
            //insert code
            $lastId = $this->db->insert('users', $data);
            $userid = $this->db->insert_id();
			if($userid) {
				$subject = 'Verify Your Email Address From Makutano';
				$activationURL = base_url() . "email-verification/" . urlencode(base64_encode($otp));
                $getOptionsSql = "SELECT * FROM `options`";
                $optionsList = $this->db->query($getOptionsSql)->result();
                //$imagePath = base_url().'uploads/logo/'.$optionsList[0]->option_value;
				$message = "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'> <tbody> <tr> <td align='center'> <table class='col-600' width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='margin-left:20px; margin-right:20px; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9; border-top:2px solid #232323'> <tbody> <tr> <td height='35'></td> </tr> <tr> <td align='left' style='padding:5px 10px;font-family: Raleway, sans-serif; font-size:16px; font-weight: bold; color:#2a3a4b;'><img  src='cid:Logo'/></td> </tr> <tr> <td height='35'></td> </tr> <tr> <td align='left' style='padding:5px 10px;font-family: Raleway, sans-serif; font-size:16px; font-weight: bold; color:#2a3a4b;'>Hello ".$first_name.",</td> </tr> <tr> <td height='10'></td> </tr> <tr> <td align='left' style='padding:5px 10px;font-family: Lato, sans-serif; font-size:16px; color:#444; line-height:24px; font-weight: 400;'>Thank you for registration on <strong style='font-weight:bold;'>Makutano</strong>.</td> </tr> <tr> <td height='10'></td> </tr> <tr> <td align='left' style='padding:5px 10px;font-family: Lato, sans-serif; font-size:16px; color:#444; line-height:24px; font-weight: 400;'>Please click on the below activation link to verify your email address.</td> </tr> <tr> <td height='10'></td> </tr> <tr> <td align='left' style='text-align:center;padding:5px 10px;font-family: Lato, sans-serif; font-size:16px; color:#444; line-height:24px; font-weight: bold;'> <a href=" . $activationURL . " target='_blank' style='background:#232323;color:#fff;padding:10px;text-decoration:none;line-height:24px;'>click here</a> </td> </tr> <tr> <td height='10'></td> </tr> <tr> <td align='left' style='padding:5px 10px;font-family: Lato, sans-serif; font-size:16px; color:#444; line-height:24px; font-weight: bold;'>Email: " . $email . "<br/></td> </tr> <tr> <td height='30'></td> </tr> <tr> <td align='left' style='padding:0 10px;font-family: Lato, sans-serif; font-size:16px; color:#232323; line-height:24px; font-weight: 700;'>Thank you!</td> </tr> <tr> <td align='left' style='padding:0 10px;font-family: Lato, sans-serif; font-size:14px; color:#232323; line-height:24px; font-weight: 700;'>Sincerely</td> </tr> <tr> <td align='left' style='padding:0 10px;font-family: Lato, sans-serif; font-size:14px; color:#232323; line-height:24px; font-weight: 700;'>Makutano</td> </tr> </tbody> </table> </td> </tr> </tbody> </table>";
				require 'vendor/autoload.php';
                $mail = new PHPMailer(true);
                try {
                    $mail->CharSet = 'UTF-8';
                    $mail->SetFrom('no-reply@goigi.com', 'Makutano');
                    $mail->AddAddress($email);
                    $mail->IsHTML(true);
                    $mail->Subject = $subject;
                    $mail->AddEmbeddedImage('uploads/logo/'.$optionsList[0]->option_value, 'Logo');
                    $mail->Body = $message;
                    $mail->IsSMTP();
                    $mail->SMTPAuth   = true;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Host       = "smtp.gmail.com";
                    $mail->Port       = 587; //587 465
                    $mail->Username   = "no-reply@goigi.com";
                    $mail->Password   = "wj8jeml3eu0z";
                    //$mail->send();
                    if(!$mail->send()) {
                        $msg = "Error sending: " . $mail->ErrorInfo;
                    } else {
                        $msg = "An email has been sent to your email address containing an activation link. Please click on the link to activate your account. If you do not click the link your account will remain inactive and you will not receive further emails. If you do not receive the email within a few minutes, please check your spam folder.";
                    }
                    $this->session->set_flashdata('success', $msg);
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
                    //$this->session->set_flashdata('message', "Your message could not be sent. Please, try again later.");
                }
			} else {
				$this->session->set_flashdata('error', 'Opps, Try again!');
			}
            redirect(base_url('register'), 'refresh');
        }
    }
	public function emailVerification($otp=null) {
		if(empty($otp)) {
			$this->session->set_flashdata('error', 'You have not permission to access this page!');
			redirect(base_url('register'), 'refresh');
		}
        $otp = $this->uri->segment(2);
        $givenotp = base64_decode(urldecode($otp));
        $sql = "SELECT * FROM `users` WHERE otp = '".$givenotp."' AND status = '0' AND `email_verified` = '0'";
        $check = $this->db->query($sql)->num_rows();
        $data = array(
            'title' => 'Account Activation',
        );
        if ($check > 0) {
            $usr = $this->db->query($sql)->row();
            $field_data = array(
                'email_verified' => '1',
                'otp' => '',
                'status' => '1'
            );
            $where = array(
                'id'=>$usr->id
            );
            $result = $this->Commonmodel->update_row('users', $field_data, $where);
            if ($result) {
                $this->session->set_flashdata('success', 'Your Email Address is successfully verified! Your account has been activated successfully. You can now login.');
                // $this->load->view('email-activation', $data);
				redirect(base_url('login'), 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Sorry! There is error verifying your Email Address!');
                redirect(base_url('login'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', 'Sorry! Activation link is expired!');
            redirect(base_url('login'), 'refresh');
        }
    }
	public function studentLoginCheck() {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $course_id = $this->input->post('course_id');
        $userValid = $this->User_model->usrLoginCheck($email, $password);
        if ($userValid) {
            $user = $this->User_model->getUsrDetails($email);
			$this->session->set_userdata('isLoggedIn', TRUE);
            $this->session->set_userdata('user_id', @$user->id);
            $this->session->set_userdata('first_name', @$user->fname);
            $this->session->set_userdata('userType', @$user->userType);
            if(@$user->userType == '1') {
                if(@$course_id) {
                    $this->session->set_flashdata('success', 'Logged in successfully.');
                    redirect(base_url('course-enrollment/'.@$course_id), 'refresh');
                } else {
                    $this->session->set_flashdata('success', 'Great! You have logged in successfully.');
                    redirect(base_url('student-dashboard'), 'refresh');
                }
            } else {
                $this->session->set_flashdata('success', 'Great! You have logged in successfully.');
                redirect(base_url('consultant-dashboard'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid email/password, Please try again!');
            $data = array(
				'title' => 'Sign In',
				'page' => 'login',
                'course_id' => @$course_id,
			);
			$this->load->view('header', $data);
			$this->load->view('login');
			$this->load->view('footer');
        }
    }
	public function studentPasswordReset() {
        $email = $this->input->post('email');
        $check_email = $this->db->get_where('users', array('email' => $email, 'status' => 1))->num_rows();
        if ($check_email==0) {
            $this->session->set_flashdata('error', 'Email not exist!');
            redirect(base_url('home/forgotPassword'), 'refresh');
        }
        $otp = $this->generate_otp(6);
        if ($check_email>0) {
            $usr = $this->User_model->getUsrDetails($email);
            $name = $usr->fname;
            $user_id = $usr->id;
            $data = array(
                'otp' => $otp
            );
            $where = array(
                'id' => $user_id
            );
            $this->Commonmodel->update_row('users', $data, $where);
            $subject = 'Password reset from Makutano';
            $url = base_url() . "otp-verification/" . urlencode(base64_encode($otp));
            $getOptionsSql = "SELECT * FROM `options`";
            $optionsList = $this->db->query($getOptionsSql)->result();
            $imagePath = base_url().'uploads/logo/'.$optionsList[0]->option_value;
            //$imagePath = base_url() . 'assets/images/logo.png';
            $message = "<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'><tbody><tr><td align='center'><table class='col-600' width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='margin-left:20px; margin-right:20px; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9; border-top:2px solid #232323'><tbody><tr><td height='35'></td></tr><tr><td align='left' style='padding:5px 10px;font-family: Raleway, sans-serif; font-size:16px; font-weight: bold; color:#2a3a4b;'><img src='" . $imagePath . "'/></td></tr><tr><td height='35'></td></tr><tr><td align='left' style='padding:5px 10px;font-family: Raleway, sans-serif; font-size:16px; font-weight: bold; color:#2a3a4b;'>Hello ".$name.",</td></tr><tr><td height='10'></td></tr></tbody></table></td></tr><tr><td align='center'><table class='col-600' width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='margin-left:20px; margin-right:20px; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9; border-bottom:2px solid #232323'><tbody><tr><td height='10'></td></tr><tr><td align='left' style='padding:5px 10px;font-family: Lato, sans-serif; font-size:16px; color:#444; line-height:24px; font-weight: 400;'>Please click on below link to reset your password.</td></tr><tr><td height='10'></td></tr><tr><td align='left' style='text-align:center;padding:5px 10px;font-family: Lato, sans-serif; font-size:16px; color:#444; line-height:24px; font-weight: bold;'><a href=" . $url . " target='_blank' style='background:#232323;color:#fff;padding:10px;text-decoration:none;line-height:24px;'>click here</a></td></tr><tr><td height='10'></td></tr><tr><td height='30'></td></tr><tr><td align='left' style='padding:0 10px;font-family: Lato, sans-serif; font-size:16px; color:#232323; line-height:24px; font-weight: 700;'>Thank you!</td></tr><tr><td align='left' style='padding:0 10px;font-family: Lato, sans-serif; font-size:14px; color:#232323; line-height:24px; font-weight: 700;'>Sincerely</td></tr><tr><td align='left' style='padding:0 10px;font-family: Lato, sans-serif; font-size:14px; color:#232323; line-height:24px; font-weight: 700;'>Makutano </td></tr></tbody></table></td></tr></tbody></table>";
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->CharSet = 'UTF-8';
                $mail->SetFrom('support@makutano.com', 'Makutano');
                $mail->AddAddress($email);
                $mail->IsHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $message;
                //Send email via SMTP
                $mail->IsSMTP();
                $mail->send();
            } catch (Exception $e) {
                $this->session->set_flashdata('error_message', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            }
            $msg = "An email has been sent to your email address containing an password reset link. Please click on the link to reset your password.";
            $this->session->set_flashdata('success', $msg);
            redirect(base_url('home/forgotPassword'), 'refresh');
        }
    }
    public function verifyOtp($otp=null) {
        if(empty($otp)) {
			$this->session->set_flashdata('error', 'You have not permission to access this page!');
			redirect(base_url('reset-password'), 'refresh');
		}
        // $otp = $this->uri->segment(3);
        $givenotp = base64_decode(urldecode($otp));
        $sql = "SELECT * FROM `users` WHERE `otp` = '".$givenotp."'";
        $check = $this->db->query($sql)->num_rows();
        $data = array(
            'title' => 'Password reset ',
            'otp' => $givenotp,
        );
        if ($check > 0) {
            $usr = $this->db->query($sql)->row();
            $data['user_id'] = $usr->id;
            $this->load->view('header', $data);
            $this->load->view('reset-password');
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('error', 'Sorry! Password reset link is expired!');
            $this->load->view('header', $data);
            $this->load->view('reset-password');
            $this->load->view('footer');
        }
    }
    public function resetPwdCust() {
        $user_id = $this->input->post('user_id');
        $otp = $this->input->post('otp');
        $password = $this->input->post('password');
        $sql = "SELECT * FROM `users` WHERE `otp` = '".$otp."' AND `id` = '".$user_id."'";
        $check = $this->db->query($sql)->num_rows();
        $data = array(
            'title' => 'Password reset',
            'otp' => $otp,
        );
        if ($check > 0) {
            $usr = $this->db->query($sql)->row();
            $field_data = array(
                'password' => md5($password),
                'otp' => ''
            );
            $where = array(
                'id'=>$user_id
            );
            $result = $this->Commonmodel->update_row('users', $field_data, $where);
            if ($result) {
                $this->session->set_flashdata('success', 'Your Password is successfully Updated. You can now login.');
                $this->load->view('header', $data);
                $this->load->view('reset-password');
                $this->load->view('footer');
            } else {
                $this->session->set_flashdata('error', 'Sorry! There is error verifying!');
                $this->load->view('header', $data);
                $this->load->view('reset-password');
                $this->load->view('footer');
            }
        } else {
            $this->session->set_flashdata('error', 'Sorry! Password reset link is expired!');
            $this->load->view('header', $data);
            $this->load->view('reset-password');
            $this->load->view('footer');
        }
    }
	public function generate_otp($length) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
	public function testInput($data) {
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	public function passwordReset($email) {
        $data = array(
            'title' => 'Password Reset Page',
        );
        $deCodeEmail = base64_decode($email);
        $sql = "SELECT * FROM `users` WHERE email = '$deCodeEmail'";
        $check = $this->db->query($sql)->num_rows();
        if ($check > 0) {
            $udetail = $this->db->get_where('users', array('email' => $deCodeEmail))->row();
            $userId = @$udetail->userId;
            $data['userId'] = @$udetail->userId;
            // $this->session->set_flashdata('suscess', 'Reset your password!');
        } else {
            $this->session->set_flashdata('error', 'Sorry! There is error verifying your details!');
        }
        $this->load->view('header', $data);
        $this->load->view('password-reset');
        $this->load->view('footer');
    }
    public function savereSetPassword() {
        $this->form_validation->set_rules('userId', 'user Id', 'trim|required');
        if ($this->form_validation->run() == false) {
            echo validation_errors();
        } else {
            $userId = $this->input->post('userId');
            $password = $this->input->post('gpassword');
            $sql = "SELECT * FROM `users` WHERE (userId = '$userId') AND status = '1'";
            $check = $this->db->query($sql)->num_rows();
            if ($check > 0) {
                $udetail = $this->db->get_where('users', array('userId' => $userId))->row();
                if (@$udetail->token == "") {
                    echo "4";
                } else {
                    if ($password != '') {
                        $where = "userId = '$userId'";
                        $updatedata = array(
                            'password' => md5($password),
                            'token' => '',
                        );
                        $this->Apimodel->update_cond("users", $where, $updatedata);
                        echo 1;
                    } else {
                        echo 3;
                    }
                }
            } else {
                echo 2;
            }
        }
    }
    public function purchaseCourse() {
        $user_id = $this->input->post('user_id');
        $course_id = $this->input->post('course_id');
        $enrollment_price = '0';
        $price_cents = '0.00';
        $currency = 'USD';
        $currency_symbol = '$';
        $transaction_id	= 'txn_'.rand();
        $this->db->query("INSERT INTO course_enrollment (`course_id`, `user_id`, `enrollment_price`, `price_cents`, `currency`, `currency_symbol`, `payment_status`, `transaction_id`) VALUES ('$course_id', '$user_id', '$enrollment_price', '$price_cents', '$currency', '$currency_symbol', 'COMPLETED', '$transaction_id')");
        if($this->db->insert_id()) {
            echo '1';
        }                        
    }
    public function faqs() {
        $data['faqs'] = $this->db->query("SELECT * FROM faqs")->result_array();
        $this->load->view('header');
        $this->load->view('faqs', $data);
        $this->load->view('footer');
    }
    public function search_query() {
        $search_input = $this->input->post('search_input');
        $data['searchData'] = $this->db->query("SELECT * FROM courses WHERE (title LIKE '%$search_input%' OR heading_1 LIKE '%$search_input%' OR heading_2 LIKE '%$search_input%' OR description LIKE '%$search_input%' OR program_overview LIKE '%$search_input%' OR objectives LIKE '%$search_input%' OR curriculam LIKE '%$search_input%' OR career_paths LIKE '%$search_input%' OR course_type LIKE '%$search_input%' OR course_certificate LIKE '%$search_input%' OR requirement LIKE '%$search_input%') AND status = '1'")->result();
        $this->load->view('header');
		$this->load->view('search-data', $data);
		$this->load->view('footer');
    }
    public function deleteReview($id) {
        $this->db->query("DELETE FROM course_reviews WHERE review_id = '".$id."'");
        redirect(base_url('reviews'), 'refresh');
    }
    public function event() {
        $data['eventList'] = $this->db->query("SELECT * FROM event WHERE status = '1' AND is_delete = '1'")->result_array();
        $data['admineventList'] = $this->db->query("SELECT COUNT(id) AS count FROM event WHERE (user_id IS NULL OR user_id = '') AND status = '1' AND is_delete = '1'")->row();
        $data['instruatoreventList'] = $this->db->query("SELECT COUNT(id) AS count FROM event WHERE (user_id IS NOT NULL OR user_id != '') AND status = '1' AND is_delete = '1' GROUP BY user_id")->row();
        $this->load->view('header');
        $this->load->view('event', $data);
        $this->load->view('footer');
    }
    public function event_details($slug) {
        $data['eventDetails'] = $this->db->query("SELECT * FROM event WHERE event_slug = '".$slug."' AND status = '1' AND is_delete = '1'")->row();
        $this->load->view('header');
        $this->load->view('event_details', $data);
        $this->load->view('footer');
    }
    public function search_event() {
        $keyword = $_POST['keyword'];
        $course = $_POST['course'];
        $user = $_POST['user'];
        if(!empty($keyword) && !empty($course) && !empty($user)){
            $searchData = $this->db->query("SELECT * FROM event WHERE (event_name LIKE '%".$keyword."%' OR event_desc LIKE '%".$keyword."%') AND course_id IN ('".$course."') AND user_id IN ('".$user."') AND status = '1' AND is_delete = '1'")->result_array();
        } else if(!empty($keyword) || !empty($course) || !empty($user)){{
            if(!empty($keyword)) {
                $kid = explode(',', $keyword);
                if(count($kid) > 1) {
                    $searchData = $this->db->query("SELECT * FROM event WHERE status = '1' AND is_delete = '1'")->result_array();
                } else {
                    if($kid[0] == '1') {
                        $searchData = $this->db->query("SELECT * FROM event WHERE (user_id IS NULL OR user_id = '') AND status = '1' AND is_delete = '1'")->result_array();
                    } else if($kid[0] == '2') {
                        $searchData = $this->db->query("SELECT * FROM event WHERE (user_id IS NOT NULL OR user_id != '') AND status = '1' AND is_delete = '1'")->result_array();
                    } else {
                        $searchData = $this->db->query("SELECT * FROM event WHERE (event_name LIKE '%".$keyword."%' OR event_desc LIKE '%".$keyword."%') AND status = '1' AND is_delete = '1'")->result_array();
                    }
                }
            } else if(!empty($course)) {
                $searchData = $this->db->query("SELECT * FROM event WHERE course_id IN ('".$course."') AND status = '1' AND is_delete = '1'")->result_array();
            } else if(!empty($user)) {
                $searchData = $this->db->query("SELECT * FROM event WHERE user_id IN ('".$user."') AND status = '1' AND is_delete = '1'")->result_array();
            } else 
                $searchData = $this->db->query("SELECT * FROM event WHERE status = '1' AND is_delete = '1'")->result_array();
            }
        } else {
            $searchData = $this->db->query("SELECT * FROM event WHERE status = '1' AND is_delete = '1'")->result_array();
        }
        $html = "";
        if(!empty($searchData)) {
            foreach ($searchData as $sData) {
                if(!empty($sData['user_id'])){
                    $userdetails = $this->db->query("SELECT * FROM users WHERE id = '".$sData['user_id']."'")->row();
                    $name = $userdetails->fname." ".$userdetails->lname;
                } else {
                    $name = "Admin";
                }
                $html .= '<div class="card eventlist mb-2 bg-dark shadow-lg rounded-lg"><div class="card-body p-4"><span class="page__title-pre">Posted By: '.$name.'</span><h3><a href="'.base_url().'event/'.$sData['event_slug'].'">'.$sData['event_name'].'</a></h3><span class="evntdate">'.date('d M Y', strtotime($sData['event_dt'])).'</span><span class="evnttime">'.date('h:i A', strtotime($sData['from_time']))." - ".date('h:i A', strtotime($sData['to_time'])).'</span><p>'.$sData['event_desc'].'</p><a href="'.base_url().'event/'.$sData['event_slug'].'">More info <i class="fas fa-arrow-right"></i></a></div></div>';
            }
        } else {
            $html = "<div class='card eventlist mb-2 bg-dark shadow-lg rounded-lg' style='text-align: center;padding: 40px;'>No data found</div>";
        }
        echo $html;
    }
    public function purchaseEvent() {
        $event_id = $this->input->post('event_id');
        $user_id = $this->input->post('user_id');
        $price = $this->input->post('price');
        //$enrollment_price = '0';
        $price_cents = '0.00';
        $currency = 'USD';
        $currency_symbol = '$';
        $transaction_id	= 'txn_'.rand();
        $this->db->query("INSERT INTO event_booked (`event_id`, `user_id`, `event_price`, `price_cents`, `currency`, `currency_symbol`, `payment_status`, `transaction_id`) 
        VALUES ('$event_id', '$user_id', '$price', '$price_cents', '$currency', '$currency_symbol', 'COMPLETED', '$transaction_id')");
        if($this->db->insert_id()) {
            echo '1';
        }                        
    }
    public function checkCompletedEvent() {
        $nowdate = date('m/d/Y');
        $countEvent = $this->db->query("SELECT * FROM event WHERE status = '1' AND is_delete = '1'")->num_rows();
        if($countEvent > 0) {
            $this->db->query("UPDATE event SET event_level = 'Complete' WHERE event_dt < '".$nowdate."'");
            echo "Data updated";
        } else {
            echo "No data to update";
        }
    }
    public function youth() {
        $this->load->view('header');
        $this->load->view('youth');
        $this->load->view('footer');
    }
    public function blog() {
        $this->load->view('header');
        $this->load->view('blog');
        $this->load->view('footer');
    }
    public function blog_details() {
        $this->load->view('header');
        $this->load->view('blog_details');
        $this->load->view('footer');
    }
    public function store() {
        $data = array('title' => 'Store','page' => 'product');
        $data['bestSale'] = $this->db->query("SELECT * FROM product WHERE categori_id = '1' AND `status` = '1' ORDER BY id DESC LIMIT 4")->result_array();
        $data['premiumBag'] = $this->db->query("SELECT * FROM product WHERE categori_id = '3' AND `status` = '1' ORDER BY id DESC LIMIT 2")->result_array();
        $data['hat'] = $this->db->query("SELECT * FROM product WHERE categori_id = '2' AND `status` = '1' ORDER BY id DESC LIMIT 5")->result_array();
        $data['product'] = $this->db->query("SELECT * FROM product WHERE `status` = '1' ORDER BY RAND() LIMIT 2")->result_array();
		$this->load->view('header', $data);
        $this->load->view('store', $data);
        $this->load->view('footer');
    }
    public function product_list() {
        $data = array('title' => 'Store','page' => 'product');
        $data['productData'] = $this->db->query("SELECT * FROM product WHERE `status` = '1' ORDER BY id DESC")->result_array();
		$this->load->view('header', $data);
        $this->load->view('product_list', $data);
        $this->load->view('footer');
    }
    public function product_details($id) {
        $data = array('title' => 'Product Details','page' => 'product');
        $data['productDetails'] = $this->db->query("SELECT * FROM product WHERE id = '".$id."' AND status = '1'")->result_array();
		$this->load->view('header', $data);
        $this->load->view('product_details', $data);
        $this->load->view('footer');
    }
    public function portfolio9() {
        $this->load->view('header');
        $this->load->view('portfolio9');
        $this->load->view('footer');
    }
    public function portfolio8() {
        $this->load->view('header');
        $this->load->view('portfolio8');
        $this->load->view('footer');
    }
    public function portfolio7() {
        $this->load->view('header');
        $this->load->view('portfolio7');
        $this->load->view('footer');
    }
}
