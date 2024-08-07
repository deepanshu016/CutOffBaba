<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Home';
$route['translate_uri_dashes'] = FALSE;
$route['contact'] = 'Home/contactUs';
$route['about-us'] = 'Home/aboutUs';
$route['courses/(:any)/(:any)'] = 'Home/coursesByStream/$1/$2';
$route['course/(:any)'] = 'Home/getcoursedetail/$1';
$route['course-with-state-wise-college/(:any)/(:any)'] = 'Home/getcoursedetail/$1/$2';
$route['college-info/(:any)/(:any)'] = 'Home/collegeInfo/$1/$2';
$route['get-college-data/(:any)/(:any)'] = 'Home/loadCollegesRecord/$1/$2';
$route['get-college-data-by-stream/(:any)/(:any)'] = 'Home/loadCollegesRecordByStream/$1/$2';
$route['college-detail/(:any)/(:any)'] = 'Home/collegeDetail/$1/$2';
$route['college-details/(:any)/(:any)/(:any)'] = 'Home/collegeDetails/$1/$2/$3';
$route['post-review-for-college'] = 'Home/postReviewForCollege';
$route['states'] = 'Home/stateList';
$route['states/(:any)'] = 'Home/stateList/$1';
$route['loginchk'] = 'Authenticate/login';
$route['signup'] = 'Home/signup';
$route['forget'] = 'Home/forgotPassword';
$route['register'] = 'Authenticate/register';
$route['user_dashboard'] = 'Dashboard';
$route['user/send-otp'] = 'Authenticate/forgot_password';
$route['user/resend-otp'] = 'Authenticate/resend_otp';
$route['user/verify-otp/(:any)'] = 'Authenticate/verify_otp/$1';
$route['user/reset-password/(:any)'] = 'Authenticate/reset_password/$1';
$route['user/otp-verification'] = 'Authenticate/OtpVerification';
$route['user/verify-done/(:any)'] = 'Authenticate/verify_done/$1';
$route['user/reset-password'] = 'Authenticate/requestToResetPassword';
$route['save-enquiry'] = 'Authenticate/saveEnquiry';
$route['get-search-filter'] = 'Home/getSearchFilterData';
$route['logout'] = 'Authenticate/logout';
$route['user-profile'] = 'Authenticate/userProfile';
$route['payment/pay-success'] = 'Home/successPayment';
$route['payments'] = 'Dashboard/payments';
$route['get-cutoff-matrix'] = 'Home/get_cutoff_matrix';
$route['get-cutoff-state-matrix'] = 'Home/get_cutoff_state_matrix';
$route['update-profile'] = 'ExamController/updateUserProfile';
$route['get-exam-courses'] = 'ExamController/getExamCourses';
$route['get-sub-category'] = 'ExamController/getSubCategory';
$route['get-domicile-sub-category'] = 'ExamController/getDomicileSubCategory';
$route['get-domicile-main-category'] = 'ExamController/getDomicileMainCategories';
$route['states/(:any)'] = 'Home/stateList/$1';
$route['state-wise-colleges/(:any)/(:any)'] = 'Home/state_wise_colleges/$1/$2';
$route['course-details/(:any)/(:any)'] = 'Home/selectedCourse/$1/$2';
$route['post-enquiry'] = 'Home/submitEnquiry';






// $route['forgot-password'] = 'Home/forgot_password';
// $route['streams'] = 'Home/streams';
// $route['our-success-story'] = 'Home/browseSuccessStories';

// $route['about-course/(:any)'] = 'Home/aboutCourse/$1';

// $route['post-enquiry'] = 'Enquiry/submitEnquiry';
// $route['all-colleges'] = 'Home/allColleges';
// $route['college-info/(:any)/(:any)'] = 'Home/collegeInfo/$1/$2';
// $route['college-detail/(:any)/(:any)/(:any)'] = 'Home/collegeDetail/$1/$2/$3';
// $route['terms-condition'] = 'Home/termsConditions';
// $route['privacy-policy'] = 'Home/privacyPolicy';
// $route['news'] = 'Home/news';
// $route['news-detail/(:any)/(:any)'] = 'Home/newsDetail/$1/$2';
// $route['edit-profile'] = 'Authenticate/EditUserProfile';
// 
// $route['search'] = 'Home/searchPage';
// $route['payments'] = 'Home/paymentList';
// $route['search-content'] = 'Home/searchContent';
// $route['update-profile'] = 'ExamController/updateUserProfile';
// $route['get-exam-courses'] = 'ExamController/getExamCourses';
// $route['get-sub-category'] = 'ExamController/getSubCategory';
// $route['get-domicile-sub-category'] = 'ExamController/getDomicileSubCategory';

// $route['state-wise-colleges/(:any)/(:any)'] = 'Home/state_wise_colleges/$1/$2';
// $route['course-details/(:any)/(:any)'] = 'Home/selectedCourse/$1/$2';
// $route['send-otp'] = 'Authenticate/forgot_password';
// $route['update-password'] = 'Authenticate/requestToResetPassword';
// $route['verify-otp/(:any)'] = 'Authenticate/verify_otp/$1';
// $route['reset-password/(:any)'] = 'Authenticate/reset_password/$1';
// $route['otp-verification'] = 'Authenticate/OtpVerification';
// $route['otp-verification'] = 'Authenticate/OtpVerification';
// $route['resend-otp'] = 'Authenticate/resend_otp';
// $route['verify-done'] = 'Authenticate/verify_done';
// $route['filter-college'] = 'Home/filterCollegeData';
// $route['plan'] = 'Home/plan';
// $route['college-predictor'] = 'Home/collegePredictor';
// $route['get-domicile-main-category'] = 'ExamController/getDomicileMainCategories';
// $route['logout'] = 'Authenticate/logout';
// $route['payment/pay-success'] = 'Payment/successPayment';
// $route['small/about-us'] = 'SmallScreen/Home/about_us';
// $route['testimonials'] = 'Home/testimonials';
// $route['testimonial-explore'] = 'Home/testimonials_explore';
// 