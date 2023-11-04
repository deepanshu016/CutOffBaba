<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'welcome';
$route['404_override'] = 'CustomErrors';
$route['400_override'] = 'CustomErrors';
$route['translate_uri_dashes'] = FALSE;
$route['home'] = 'Site/Home';


$route['why-us'] = 'Site/Home/whyUs';
$route['media-presence'] = 'Site/Home/mediaPresence';
$route['faq'] = 'Site/Home/Faq';
$route['news'] = 'Site/Home/News';
$route['certificate'] = 'Site/Home/certificate';
$route['course'] = 'Site/Home/courseListing';
$route['testimonials'] = 'Site/Home/testimonials';
$route['return-refund'] = 'Site/Home/returnRefund';
$route['portfolio'] = 'Site/Home/portfolio';
$route['contact-us'] = 'Site/Home/contactUs';
$route['login'] = 'Authenticate/login';
$route['register'] = 'Authenticate/register';
$route['newregistration'] = 'Authenticate/userRegistration';
$route['quiz'] = 'Site/Home/Quiz';
$route['quiz-failed'] = 'Site/Home/quizFailed';
$route['quizsubmit'] = 'Site/Home/QuizSubmit';
$route['userdashboard'] = 'Dashboard/index';
$route['forgot-password'] = 'Authenticate/forgotPassword';
$route['profile'] = 'Dashboard/profile';
$route['user-signup'] = 'Authenticate/userRegistration';
$route['save-contact-form'] = 'Authenticate/saveContactForm';
$route['user-login'] = 'Authenticate/userLogin';
$route['resend-email'] = 'Authenticate/Sendemail';

$route['update-user-profile'] = 'Authenticate/updateUserProfile';
$route['education'] = 'Site/Education/index';
$route['experience'] = 'Site/Experience/index';

$route['demo'] = 'Authenticate/demo';
$route['about-us'] = 'Site/Home/about';
$route['privacy-policy'] = 'Site/Home/privacyPolicy';
$route['terms-condition'] = 'Site/Home/termsCondition';
$route['become-associates'] = 'Site/Home/becomeAssociate';
$route['logout'] = 'Authenticate/logout';
$route['request-to-forgot-password'] = 'Authenticate/requestToForgotPassword';
$route['reset-password/(:any)'] = 'Authenticate/resetPassword/$1';
$route['verify-account/(:any)'] = 'Authenticate/verifyAccount/$1';
$route['request-to-reset-password'] = 'Authenticate/requestToResetPassword';
$route['company'] = 'Site/Home/company';
$route['company/(:any)'] = 'Site/Home/company/$1';
$route['blog'] = 'Site/Home/blog';
$route['image-gallery'] = 'Site/Home/imagegallery';
$route['reviews'] = 'Site/Home/allReviews';
$route['blog/(:any)'] = 'Site/Home/blog/$1';
$route['add-course'] = 'Site/Course/addCourse';
$route['get-course-category'] = 'Site/Course/getCourseCategory';
$route['save-new-course'] = 'Site/Course/saveCourse';
$route['blogs/(:any)'] = 'Site/Home/blogFilter/$1';
$route['blog-detail/(:any)/(:any)'] = 'Site/Home/blogDetail/$1/$2';
$route['courses'] = 'Site/Course/CourseCategoryWise';
$route['course'] = 'Site/Course/SearchCourses';
$route['get-review-type-wise'] = 'Site/Home/getTypeWiseReview';
$route['courses/(:any)'] = 'Site/Course/CourseCategoryWise/$1';
$route['courses-filter-list'] = 'Site/Course/CourseFilterList';
$route['courses-filter-grid'] = 'Site/Course/CourseFilterGrid';
$route['course-first-stage-validation'] = 'Site/Course/FirstStageValidationCourse';
$route['course-second-stage-validation'] = 'Site/Course/SecondStageValidationCourse';
$route['course-third-stage-validation'] = 'Site/Course/ThirdStageValidationCourse';
$route['course-fourth-stage-validation'] = 'Site/Course/FourthStageValidationCourse';
$route['course-fifth-stage-validation'] = 'Site/Course/FifthStageValidationCourse';
$route['final-save-course'] = 'Site/Course/finalSaveCourse';
$route['manage-courses'] = 'Site/Course/manageCourses';
$route['course/(:any)'] = 'Site/Course/courseDetail/$1';
$route['delete-course'] = 'Site/Course/deleteCourse';
$route['edit-course/(:any)'] = 'Site/Course/editCourse/$1';
$route['final-update-course'] = 'Site/Course/finalUpdateCourse';
$route['subjects'] = 'Site/Subject/index';
$route['add-subject'] = 'Site/Subject/addSubject';
$route['save-new-subject'] = 'Site/Subject/saveSubject';
$route['edit-subject/(:any)'] = 'Site/Subject/editSubject/$1';
$route['final-update-subject'] = 'Site/Subject/updateSubject';
$route['delete-subject'] = 'Site/Subject/deleteSubject';
$route['update-subject-order'] = 'Site/Subject/updateSubjectOrder';
$route['contents'] = 'Site/Content/index';
$route['add-contents'] = 'Site/Content/addContent';
$route['save-content'] = 'Site/Content/saveContent';
$route['edit-content/(:any)'] = 'Site/Content/editContent/$1';
$route['update-content'] = 'Site/Content/updateContent';
$route['delete-content'] = 'Site/Content/deleteContent';
$route['show-content-data'] = 'Site/Content/ShowContentData';
$route['import-course'] = 'Site/Course/importCourse';
$route['import-course-by-excel'] = 'Site/Course/importCourseByExcel';
$route['course-filter'] = 'Site/Course/getCourseByFilter';

$route['instructors'] = 'Site/Instructor/getAllInstructor';
$route['instructors/(:num)'] = 'Site/Instructor/getAllInstructor/$1';
$route['students'] = 'Site/Student/getAllStudent';
$route['students/(:num)'] = 'Site/Student/getAllStudent/$1';
$route['institute'] = 'Site/Institute/getAllInstitute';
$route['institute/(:num)'] = 'Site/Institute/getAllInstitute/$1';


$route['add-education-details'] = 'Site/Education/addEducationDetails';
$route['edit-education/(:any)/(:any)'] = 'Site/Education/editEducationDetails/$1/$2';
$route['delete-education'] = 'Site/Education/deleteEducation';

$route['add-work-experience'] = 'Site/Experience/addExperienceDetails';
$route['edit-experience/(:any)/(:any)'] = 'Site/Experience/editExperienceDetails/$1/$2';
$route['delete-experience'] = 'Site/Experience/deleteExperience';





$route['admin/dashboard'] = 'Admin/Authenticate/index';
$route['admin'] = 'Admin/Authenticate/login';
$route['admin/admin-login'] = 'Admin/Authenticate/adminLogin';
$route['admin/student'] = 'Admin/Student/index';
$route['admin/institute'] = 'Admin/Institute/index';
$route['admin/add-institute'] = 'Admin/Institute/addInstitute';
$route['admin/save-institute'] = 'Admin/Institute/saveInstitute';
$route['admin/update-institute'] = 'Admin/Institute/updateInstitute';
$route['admin/edit-institute/(:any)/(:any)'] = 'Admin/Institute/editInstitute/$1/$2';
$route['admin/delete-institute'] = 'Admin/Institute/deleteInstitute';
$route['admin/instructor'] = 'Admin/Instructor/index';
$route['admin/student-review'] = 'Admin/Student/reviewList';
$route['admin/contact-form'] = 'Admin/Messages/contactForm';
$route['admin/view-contact-details'] = 'Admin/Messages/viewContactDetails';
$route['admin/add-student'] = 'Admin/Student/addStudent';
$route['admin/save-student'] = 'Admin/Student/saveStudent';
$route['admin/update-student'] = 'Admin/Student/updateStudent';
$route['admin/edit-student/(:any)'] = 'Admin/Student/editStudent/$1';
$route['admin/delete-student'] = 'Admin/Student/deleteStudent';
$route['admin/import-student'] = 'Admin/Student/exportStudent';
$route['admin/export-student-by-excel'] = 'Admin/Student/exportStudentByExcel';

$route['admin/import-instructor'] = 'Admin/Instructor/exportInstructor';
$route['admin/export-instructor-by-excel'] = 'Admin/Instructor/exportInstructorByExcel';
$route['admin/import-language'] = 'Admin/Language/importLanguage';
$route['admin/import-language-by-excel'] = 'Admin/Language/importLanguageByExcel';


$route['admin/import-company'] = 'Admin/Company/importCompany';
$route['admin/import-company-by-excel'] = 'Admin/Company/importCompanyByExcel';



$route['admin/import-blog'] = 'Admin/Blog/importBlog';
$route['admin/import-blog-by-excel'] = 'Admin/Blog/importBlogByExcel';

$route['admin/import-institute'] = 'Admin/Institute/importInstitute';
$route['admin/import-institute-by-excel'] = 'Admin/Institute/importInstituteByExcel';

$route['admin/company'] = 'Admin/Company/index';
$route['admin/add-company'] = 'Admin/Company/addCompany';
$route['admin/save-company'] = 'Admin/Company/saveCompany';
$route['admin/update-company'] = 'Admin/Company/updateCompany';
$route['admin/edit-company/(:any)/(:any)'] = 'Admin/Company/editCompany/$1/$2';
$route['admin/delete-company'] = 'Admin/Company/deleteCompany';
$route['admin/save-blog-type'] = 'Admin/Blog/saveBlogType';

$route['admin/blog'] = 'Admin/Blog/index';
$route['admin/add-blog'] = 'Admin/Blog/addBlog';
$route['admin/save-blog'] = 'Admin/Blog/saveBlog';
$route['admin/update-blog'] = 'Admin/Blog/updateBlog';
$route['admin/edit-blog/(:any)/(:any)'] = 'Admin/Blog/editBlog/$1/$2';
$route['admin/delete-blog'] = 'Admin/Blog/deleteBlog';
$route['admin/courses'] = 'Admin/Course/courseList';
$route['admin/make-course-verified'] = 'Admin/Course/makeCourseVerified';

$route['admin/language'] = 'Admin/Language/index';
$route['admin/add-language'] = 'Admin/Language/addLanguage';
$route['admin/save-language'] = 'Admin/Language/saveLanguage';
$route['admin/update-language'] = 'Admin/Language/updateLanguage';
$route['admin/edit-language/(:any)/(:any)'] = 'Admin/Language/editLanguage/$1/$2';
$route['admin/delete-language'] = 'Admin/Language/deleteLanguage';



$route['admin/testimonial'] = 'Admin/Testimonials/index';
$route['admin/add-testimonial'] = 'Admin/Testimonials/add';
$route['admin/save-testimonial'] = 'Admin/Testimonials/saveTestimonial';
$route['admin/update-testimonial'] = 'Admin/Testimonials/updateTestimonial';
$route['admin/edit-testimonial/(:any)/(:any)'] = 'Admin/Testimonials/editTestimonial/$1/$2';
$route['admin/delete-testimonial'] = 'Admin/Testimonials/deleteTestimonial';

$route['admin/group'] = 'Admin/Groups/index';
$route['admin/add-group'] = 'Admin/Groups/addGroup';
$route['admin/save-group'] = 'Admin/Groups/saveGroup';
$route['admin/update-group'] = 'Admin/Groups/updateGroup';
$route['admin/edit-group/(:any)/(:any)'] = 'Admin/Groups/editGroup/$1/$2';
$route['admin/delete-group'] = 'Admin/Groups/deleteGroup';

$route['admin/team'] = 'Admin/Team/index';
$route['admin/add-team'] = 'Admin/Team/add';
$route['admin/save-team'] = 'Admin/Team/saveTeam';
$route['admin/update-team'] = 'Admin/Team/updateTeam';
$route['admin/edit-team/(:any)/(:any)'] = 'Admin/Team/editTeam/$1/$2';
$route['admin/delete-team'] = 'Admin/Team/deleteTeam';


$route['admin/banner'] = 'Admin/Banner/index';
$route['admin/add-banner'] = 'Admin/Banner/add';
$route['admin/save-banner'] = 'Admin/Banner/saveBanner';
$route['admin/update-banner'] = 'Admin/Banner/updateBanner';
$route['admin/edit-banner/(:any)/(:any)'] = 'Admin/Banner/editBanner/$1/$2';
$route['admin/delete-banner'] = 'Admin/Banner/deleteBanner';


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