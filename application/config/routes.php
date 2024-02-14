<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
| example.com/class/method/id/
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
| Please see the user guide for complete details:
| https://codeigniter.com/user_guide/general/routing.html
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
| There are three reserved routes:
| $route['default_controller'] = 'welcome';
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'Override';
$route['translate_uri_dashes'] = TRUE;
/*------------FrontEnd Routes----------*/
$route['home'] = "Home/index";
$route['about'] = 'Home/about';
$route['term'] = 'Home/term_conditions';
$route['privacy'] = 'Home/privacy_policy';
$route['refund'] = 'Home/refund_policy';
$route['page/faqs'] = 'Home/faqs';
$route['youth'] = 'Home/youth';
$route['blog'] = 'Home/blog';
$route['blog/blog_details'] = 'Home/blog_details';
$route['store'] = 'Home/store';
$route['event'] = 'Home/event';
$route['event/(:any)'] = "home/event_details/$1";
$route['product_list'] = 'Home/product_list';
$route['product_details/(:any)'] = 'Home/product_details/$1';
$route['portfolio9'] = 'Home/portfolio9';
$route['portfolio8'] = 'Home/portfolio8';
$route['portfolio7'] = 'Home/portfolio7';
$route['cart'] = 'Home/cart';
$route['checkout'] = "home/checkout";
$route['email_unsubscribe/(:any)'] = 'Home/email_unsubscribe';
$route['course-list'] = 'home/courseList';
$route['consulting'] = 'home/consulting';
$route['course-detail/(:any)'] = "home/courseDetail/$1";
$route['course-enrollment/(:any)'] = "home/courseEnrollment/$1";
$route['success/(:any)'] = "home/success/$1";
$route['contact'] = 'home/contact';
$route['register'] = 'home/register';
$route['email-verification/(:any)'] = "home/emailVerification/$1";
$route['login'] = 'home/login';
$route['login/(:any)'] = 'home/login/$1';
$route['forgot-password'] = "home/forgotPassword";
$route['otp-verification/(:any)'] = "home/verifyOtp/$1";
$route['student-dashboard'] = 'Users/index';
$route['profile'] = 'Users/profile';
$route['edit-profile'] = 'Users/editProfile';
$route['enrolled-courses'] = 'Users/enrolledCourse';
$route['event-booked'] = 'Users/eventBooked';
$route['purchase-list'] = 'Users/purchaseList';
$route['product-order-list'] = 'Users/productOrderList';
$route['reviews'] = 'Users/reviews';
$route['logout'] = 'Users/logout';
$route['consultant-dashboard'] = 'supercontrol/home';
$route['search-query'] = 'Home/search_query';
$route['unsubscribe/(:any)'] = 'Home/unsubscribe/$1';
/*------------Admin Routes------------*/
$route['admin'] = 'admin/users';
$route['dashboard'] = 'admin/dashboard/index';
//$route['powerspeech'] = 'admin/homecourse/powerspeech';