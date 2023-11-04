<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'welcome';
$route['404_override'] = 'CustomErrors';
$route['400_override'] = 'CustomErrors';
$route['translate_uri_dashes'] = FALSE;
$route['home'] = 'Site/Home';

$route['admin/dashboard'] = 'Admin/Authenticate/index';
$route['admin'] = 'Admin/Authenticate/login';
$route['admin/admin-login'] = 'Admin/Authenticate/adminLogin';







$route['admin/location'] = 'Admin/Location/index';
$route['admin/add-location'] = 'Admin/Location/add';
$route['admin/save-location'] = 'Admin/Location/saveLocation';
$route['admin/update-location'] = 'Admin/Location/updateLocation';
$route['admin/edit-location/(:any)/(:any)'] = 'Admin/Location/editLocation/$1/$2';
$route['admin/delete-location'] = 'Admin/Location/deleteLocation';

$route['admin/country'] = 'Admin/Country/index';
$route['admin/add-country'] = 'Admin/Country/add';
$route['admin/save-country'] = 'Admin/Country/saveCountry';
$route['admin/update-country'] = 'Admin/Country/updateCountry';
$route['admin/edit-country/(:any)'] = 'Admin/Country/editCountry/$1';
$route['admin/delete-country'] = 'Admin/Country/deleteCountry';


$route['admin/state'] = 'Admin/State/index';
$route['admin/add-state'] = 'Admin/State/add';
$route['admin/save-state'] = 'Admin/State/saveState';
$route['admin/update-state'] = 'Admin/State/updateState';
$route['admin/edit-state/(:any)'] = 'Admin/State/editState/$1';
$route['admin/delete-state'] = 'Admin/State/deleteState';

$route['admin/approval'] = 'Admin/Approval/index';
$route['admin/add-approval'] = 'Admin/Approval/add';
$route['admin/save-approval'] = 'Admin/Approval/saveApproval';
$route['admin/update-approval'] = 'Admin/Approval/updateApproval';
$route['admin/edit-approval/(:any)'] = 'Admin/Approval/editApproval/$1';
$route['admin/delete-approval'] = 'Admin/Approval/deleteApproval';

$route['admin/recognition'] = 'Admin/Recognition/index';
$route['admin/add-recognition'] = 'Admin/Recognition/add';
$route['admin/save-recognition'] = 'Admin/Recognition/saveRecognition';
$route['admin/update-recognition'] = 'Admin/Recognition/updateRecognition';
$route['admin/edit-recognition/(:any)'] = 'Admin/Recognition/editRecognition/$1';
$route['admin/delete-recognition'] = 'Admin/Recognition/deleteRecognition';



$route['admin/gender'] = 'Admin/Gender/index';
$route['admin/add-gender'] = 'Admin/Gender/add';
$route['admin/save-gender'] = 'Admin/Gender/saveGender';
$route['admin/update-gender'] = 'Admin/Gender/updateGender';
$route['admin/edit-gender/(:any)'] = 'Admin/Gender/editGender/$1';
$route['admin/delete-gender'] = 'Admin/Gender/deleteGender';

$route['admin/stream'] = 'Admin/Stream/index';
$route['admin/add-stream'] = 'Admin/Stream/add';
$route['admin/save-stream'] = 'Admin/Stream/saveStream';
$route['admin/update-stream'] = 'Admin/Stream/updateStream';
$route['admin/edit-stream/(:any)'] = 'Admin/Stream/editStream/$1';
$route['admin/delete-stream'] = 'Admin/Stream/deleteStream';


$route['admin/degreetype'] = 'Admin/DegreeType/index';
$route['admin/add-degreetype'] = 'Admin/DegreeType/add';
$route['admin/save-degreetype'] = 'Admin/DegreeType/saveDegreeType';
$route['admin/update-stream'] = 'Admin/DegreeType/updateDegreeType';
$route['admin/edit-degreetype/(:any)'] = 'Admin/DegreeType/editDegreeType/$1';
$route['admin/delete-degreetype'] = 'Admin/DegreeType/deleteDegreeType';


$route['admin/exams'] = 'Admin/Exams/index';
$route['admin/add-exams'] = 'Admin/Exams/add';
$route['admin/save-exams'] = 'Admin/Exams/saveExams';
$route['admin/update-exams'] = 'Admin/Exams/updateExams';
$route['admin/edit-exams/(:any)'] = 'Admin/Exams/editExams/$1';
$route['admin/delete-exams'] = 'Admin/Exams/deleteExams';


$route['admin/city'] = 'Admin/City/index';
$route['admin/add-city'] = 'Admin/City/add';
$route['admin/save-city'] = 'Admin/City/saveCity';
$route['admin/update-city'] = 'Admin/City/updateCity';
$route['admin/edit-city/(:any)'] = 'Admin/City/editCity/$1';
$route['admin/delete-city'] = 'Admin/City/deleteCity';
$route['admin/get-state'] = 'Admin/Common/getStateByCountry';

$route['admin/ownership'] = 'Admin/Ownership/index';
$route['admin/add-ownership'] = 'Admin/Ownership/add';
$route['admin/save-ownership'] = 'Admin/Ownership/saveOwnership';
$route['admin/update-ownership'] = 'Admin/Ownership/updateOwnership';
$route['admin/edit-ownership/(:any)/(:any)'] = 'Admin/Ownership/editOwnership/$1/$2';
$route['admin/delete-ownership'] = 'Admin/Ownership/deleteOwnership';

$route['admin/slider'] = 'Admin/Slider/index';
$route['admin/add-slider'] = 'Admin/Slider/add';
$route['admin/save-slider'] = 'Admin/Slider/saveSlider';
$route['admin/update-slider'] = 'Admin/Slider/updateSlider';
$route['admin/edit-slider/(:any)/(:any)'] = 'Admin/Slider/editSlider/$1/$2';
$route['admin/delete-slider'] = 'Admin/Slider/deleteSlider';


$route['admin/media'] = 'Admin/Media/index';
$route['admin/add-media'] = 'Admin/Media/add';
$route['admin/save-media'] = 'Admin/Media/saveMedia';
$route['admin/update-media'] = 'Admin/Media/updateMedia';
$route['admin/edit-media/(:any)/(:any)'] = 'Admin/Media/editMedia/$1/$2';
$route['admin/delete-media'] = 'Admin/Media/deleteMedia';
$route['admin/delete-media-image'] = 'Admin/Media/deleteMediaImages';


$route['admin/image-gallery'] = 'Admin/ImageGallery/index';
$route['admin/add-image-gallery'] = 'Admin/ImageGallery/add';
$route['admin/save-image-gallery'] = 'Admin/ImageGallery/saveGallery';
$route['admin/update-image-gallery'] = 'Admin/ImageGallery/updateGallery';
$route['admin/edit-image-gallery/(:any)/(:any)'] = 'Admin/ImageGallery/editGallery/$1/$2';
$route['admin/delete-image-gallery'] = 'Admin/ImageGallery/deleteGallery';
$route['admin/delete-image-gallery-image'] = 'Admin/ImageGallery/deleteGalleryImages';


$route['admin/video-gallery'] = 'Admin/VideoGallery/index';
$route['admin/add-video-gallery'] = 'Admin/VideoGallery/add';
$route['admin/save-video-gallery'] = 'Admin/VideoGallery/saveGallery';
$route['admin/update-video-gallery'] = 'Admin/VideoGallery/updateGallery';
$route['admin/edit-video-gallery/(:any)/(:any)'] = 'Admin/VideoGallery/editGallery/$1/$2';
$route['admin/delete-video-gallery'] = 'Admin/VideoGallery/deleteGallery';
$route['admin/delete-video-gallery-image'] = 'Admin/VideoGallery/deleteGalleryImages';

$route['admin/certificate'] = 'Admin/Certificate/index';
$route['admin/add-certificate'] = 'Admin/Certificate/add';
$route['admin/save-certificate'] = 'Admin/Certificate/saveCertificate';
$route['admin/update-certificate'] = 'Admin/Certificate/updateCertificate';
$route['admin/edit-certificate/(:any)/(:any)'] = 'Admin/Certificate/editCertificate/$1/$2';
$route['admin/delete-certificate'] = 'Admin/Certificate/deleteCertificate';


$route['admin/faq'] = 'Admin/Faq/index';
$route['admin/add-faq'] = 'Admin/Faq/add';
$route['admin/save-faq'] = 'Admin/Faq/saveFaq';
$route['admin/update-faq'] = 'Admin/Faq/updateFaq';
$route['admin/edit-faq/(:any)/(:any)'] = 'Admin/Faq/editFaq/$1/$2';
$route['admin/delete-faq'] = 'Admin/Faq/deleteFaq';

$route['admin/course'] = 'Admin/Course/index';
$route['admin/add-course'] = 'Admin/Course/add';
$route['admin/save-course'] = 'Admin/Course/saveCourse';
$route['admin/update-course'] = 'Admin/Course/updateCourse';
$route['admin/edit-course/(:any)/(:any)'] = 'Admin/Course/editCourse/$1/$2';
$route['admin/delete-course'] = 'Admin/Course/deleteCourse';

$route['admin/add-student-review'] = 'Admin/Student/addStudentReview';
$route['admin/save-student-review'] = 'Admin/Student/saveStudentReviews';
$route['admin/update-student-review'] = 'Admin/Student/updateStudentReviews';
$route['admin/edit-student-review/(:any)'] = 'Admin/Student/editStudentReviews/$1';
$route['admin/delete-student-review'] = 'Admin/Student/deleteStudentReview';
$route['admin/signin-as-guest-user/(:any)'] = 'Admin/Authenticate/signInGuestUser/$1';
$route['admin/category'] = 'Admin/Category/index';
$route['admin/add-category'] = 'Admin/Category/add';
$route['admin/save-category'] = 'Admin/Category/saveCategory';
$route['admin/make-it-featured'] = 'Admin/Category/makeItFeatured';
$route['admin/delete-category'] = 'Admin/Category/deleteCategory';
$route['admin/edit-category/(:any)/(:any)'] = 'Admin/Category/editCategory/$1/$2';
$route['admin/update-category'] = 'Admin/Category/updateCategory';
$route['admin/logout'] = 'Admin/Authenticate/logout';
$route['admin/settings'] = 'Admin/Settings/index';
$route['admin/update-site-settings'] = 'Admin/Settings/updateSiteSettings';