<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//$route['default_controller'] = 'Home';
// $route['404_override'] = 'CustomErrors';
// $route['400_override'] = 'CustomErrors';
$route['translate_uri_dashes'] = FALSE;
// $route['home'] = 'Home/splash_screen';
// $route['app-info'] = 'Home/appInfo';

$route['default_controller'] = 'home/login';
$route['loginchk'] = 'Authenticate/login';
$route['signup'] = 'Home/signup';
$route['register'] = 'Authenticate/register';
$route['forgot-password'] = 'Home/forgot_password';
$route['streams'] = 'Home/streams';
$route['our-success-story'] = 'Home/browseSuccessStories';
$route['courses/(:any)'] = 'Home/coursesByStream/$1';
$route['about-course/(:any)'] = 'Home/aboutCourse/$1';
$route['about-us'] = 'Home/aboutUs';
$route['contact-us'] = 'Home/contactUs';
$route['post-enquiry'] = 'Enquiry/submitEnquiry';
$route['all-colleges'] = 'Home/allColleges';
$route['college-info/(:any)/(:any)'] = 'Home/collegeInfo/$1/$2';
$route['college-detail/(:any)/(:any)/(:any)'] = 'Home/collegeDetail/$1/$2/$3';
$route['terms-condition'] = 'Home/termsConditions';
$route['privacy-policy'] = 'Home/privacyPolicy';
$route['news'] = 'Home/news';
$route['news-detail/(:any)/(:any)'] = 'Home/newsDetail/$1/$2';
$route['edit-profile'] = 'Authenticate/EditUserProfile';
$route['profile'] = 'Authenticate/userProfile';
$route['search'] = 'Home/searchPage';
$route['payments'] = 'Home/paymentList';
$route['search-content'] = 'Home/searchContent';
$route['update-profile'] = 'ExamController/updateUserProfile';
$route['get-exam-courses'] = 'ExamController/getExamCourses';
$route['get-sub-category'] = 'ExamController/getSubCategory';
$route['get-domicile-sub-category'] = 'ExamController/getDomicileSubCategory';
$route['states/(:any)'] = 'Home/stateList/$1';
$route['state-wise-colleges/(:any)/(:any)'] = 'Home/state_wise_colleges/$1/$2';
$route['course-details/(:any)/(:any)'] = 'Home/selectedCourse/$1/$2';
$route['send-otp'] = 'Authenticate/forgot_password';
$route['update-password'] = 'Authenticate/requestToResetPassword';
$route['verify-otp/(:any)'] = 'Authenticate/verify_otp/$1';
$route['reset-password/(:any)'] = 'Authenticate/reset_password/$1';
$route['otp-verification'] = 'Authenticate/OtpVerification';
$route['otp-verification'] = 'Authenticate/OtpVerification';
$route['resend-otp'] = 'Authenticate/resend_otp';
$route['verify-done'] = 'Authenticate/verify_done';
$route['filter-college'] = 'Home/filterCollegeData';
$route['plan'] = 'Home/plan';
$route['college-predictor'] = 'Home/collegePredictor';
$route['get-domicile-main-category'] = 'ExamController/getDomicileMainCategories';
$route['logout'] = 'Authenticate/logout';
$route['payment/pay-success'] = 'Payment/successPayment';
// $route['state-wise-colleges'] = 'SmallScreen/Home/state_wise_colleges';
$route['small/about-us'] = 'SmallScreen/Home/about_us';
$route['testimonials'] = 'Home/testimonials';
$route['testimonial-explore'] = 'Home/testimonials_explore';
$route['small/home'] = 'SmallScreen/Home/splash_screen';
$route['large/home'] = 'Home/index';






$route['user/logout'] = 'SmallScreen/Authenticate/logout';

$route['admin/dashboard'] = 'Admin/Authenticate/index';
$route['admin'] = 'Admin/Authenticate/login';
$route['admin/admin-login'] = 'Admin/Authenticate/adminLogin';
//$route['api/get'] = 'API/MasterApi/index';

// API Routes

$route['api/categories'] = 'API/MasterApi/getCategoryList';
$route['api/countries'] = 'API/MasterApi/getCountryList';
$route['api/states'] = 'API/MasterApi/getStateList';
$route['api/districts'] = 'API/MasterApi/getDistrictList';
$route['api/sub-districts'] = 'API/MasterApi/getSubDistrictList';
$route['api/ownerships'] = 'API/MasterApi/getOwnerShipList';
$route['api/approval'] = 'API/MasterApi/getApprovalList';
$route['api/recognition'] = 'API/MasterApi/getRecognitionList';
$route['api/gender'] = 'API/MasterApi/getGenderList';
$route['api/degree-type'] = 'API/MasterApi/getDegreeTypeList';
$route['api/stream'] = 'API/MasterApi/getStreamsList';
$route['api/open'] = 'API/MasterApi/getOpensList';
$route['api/visibility'] = 'API/MasterApi/getVisibilityList';
$route['api/clinic-details'] = 'API/MasterApi/getClinicDetailsList';
$route['api/facility'] = 'API/MasterApi/getClinicFacilityList';
$route['api/exams'] = 'API/MasterApi/getExamsList';
$route['api/nature'] = 'API/MasterApi/getNatureList';
$route['api/course'] = 'API/MasterApi/getCourseList';
$route['api/branch'] = 'API/MasterApi/getBranchList';
$route['api/colleges'] = 'API/MasterApi/getCollegeList';
$route['api/counselling-levels'] = 'API/MasterApi/getCounsellingLevelList';
$route['api/counselling-heads'] = 'API/MasterApi/getCounsellingHead';
$route['api/sub-categories'] = 'API/MasterApi/getSubCategoryList';
$route['api/special-categories'] = 'API/MasterApi/getSpecialCategoryList';
$route['api/special-sub-categories'] = 'API/MasterApi/getSpecialSubCategoryList';
$route['api/fees-head'] = 'API/MasterApi/getFeesHeadList';
$route['api/service-bond'] = 'API/MasterApi/getServiceBondRulesList';
$route['api/gallery-head'] = 'API/MasterApi/getGalleryHeadList';
$route['api/clinical-details'] = 'API/MasterApi/getClinicalDataList';
$route['api/counselling-plan'] = 'API/MasterApi/getCounsellingPlanList';
$route['api/news'] = 'API/MasterApi/getNewsList';




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
$route['admin/import-country'] = 'Admin/Country/importCountry';
$route['admin/import-country-by-excel'] = 'Admin/Country/importCountryByExcel';


$route['admin/state'] = 'Admin/State/index';
$route['admin/add-state'] = 'Admin/State/add';
$route['admin/save-state'] = 'Admin/State/saveState';
$route['admin/update-state'] = 'Admin/State/updateState';
$route['admin/edit-state/(:any)'] = 'Admin/State/editState/$1';
$route['admin/delete-state'] = 'Admin/State/deleteState';
$route['admin/import-state'] = 'Admin/State/importState';
$route['admin/import-state-by-excel'] = 'Admin/State/importStateByExcel';
$route['admin/export-state'] = 'Admin/Export/state';

$route['admin/approval'] = 'Admin/Approval/index';
$route['admin/add-approval'] = 'Admin/Approval/add';
$route['admin/save-approval'] = 'Admin/Approval/saveApproval';
$route['admin/update-approval'] = 'Admin/Approval/updateApproval';
$route['admin/edit-approval/(:any)'] = 'Admin/Approval/editApproval/$1';
$route['admin/delete-approval'] = 'Admin/Approval/deleteApproval';
$route['admin/import-approval'] = 'Admin/Approval/importApproval';
$route['admin/import-approval-by-excel'] = 'Admin/Approval/importApprovalByExcel';
$route['admin/export-approval'] = 'Admin/Export/approval';

$route['admin/recognition'] = 'Admin/Recognition/index';
$route['admin/add-recognition'] = 'Admin/Recognition/add';
$route['admin/save-recognition'] = 'Admin/Recognition/saveRecognition';
$route['admin/update-recognition'] = 'Admin/Recognition/updateRecognition';
$route['admin/edit-recognition/(:any)'] = 'Admin/Recognition/editRecognition/$1';
$route['admin/delete-recognition'] = 'Admin/Recognition/deleteRecognition';
$route['admin/import-recognition'] = 'Admin/Recognition/importRecognition';
$route['admin/import-recognition-by-excel'] = 'Admin/Recognition/importRecognitionByExcel';
$route['admin/export-recognition'] = 'Admin/Export/recognition';


$route['admin/gender'] = 'Admin/Gender/index';
$route['admin/add-gender'] = 'Admin/Gender/add';
$route['admin/save-gender'] = 'Admin/Gender/saveGender';
$route['admin/update-gender'] = 'Admin/Gender/updateGender';
$route['admin/edit-gender/(:any)'] = 'Admin/Gender/editGender/$1';
$route['admin/delete-gender'] = 'Admin/Gender/deleteGender';
$route['admin/import-gender'] = 'Admin/Gender/importGender';
$route['admin/import-gender-by-excel'] = 'Admin/Gender/importGenderByExcel';
$route['admin/export-gender'] = 'Admin/Export/gender';


$route['admin/stream'] = 'Admin/Stream/index';
$route['admin/add-stream'] = 'Admin/Stream/add';
$route['admin/save-stream'] = 'Admin/Stream/saveStream';
$route['admin/update-stream'] = 'Admin/Stream/updateStream';
$route['admin/edit-stream/(:any)'] = 'Admin/Stream/editStream/$1';
$route['admin/delete-stream'] = 'Admin/Stream/deleteStream';
$route['admin/import-stream'] = 'Admin/Stream/importStream';
$route['admin/import-stream-by-excel'] = 'Admin/Stream/importStreamByExcel';
$route['admin/export-stream'] = 'Admin/Export/stream';

$route['admin/degreetype'] = 'Admin/DegreeType/index';
$route['admin/add-degreetype'] = 'Admin/DegreeType/add';
$route['admin/save-degreetype'] = 'Admin/DegreeType/saveDegreeType';
$route['admin/update-degreetype'] = 'Admin/DegreeType/updateDegreeType';
$route['admin/edit-degreetype/(:any)'] = 'Admin/DegreeType/editDegreeType/$1';
$route['admin/delete-degreetype'] = 'Admin/DegreeType/deleteDegreeType';
$route['admin/import-degreetype'] = 'Admin/DegreeType/importDegreeType';
$route['admin/import-degreetype-by-excel'] = 'Admin/DegreeType/importDegreeTypeByExcel';
$route['admin/export-degreetype'] = 'Admin/Export/degreetype';


$route['admin/nature'] = 'Admin/Nature/index';
$route['admin/add-nature'] = 'Admin/Nature/add';
$route['admin/save-nature'] = 'Admin/Nature/saveNature';
$route['admin/update-nature'] = 'Admin/Nature/updateNature';
$route['admin/edit-nature/(:any)'] = 'Admin/Nature/editNature/$1';
$route['admin/delete-nature'] = 'Admin/Nature/deleteNature';
$route['admin/import-nature'] = 'Admin/Nature/importNature';
$route['admin/import-nature-by-excel'] = 'Admin/Nature/importNatureByExcel';
$route['admin/export-nature'] = 'Admin/Export/nature';

$route['admin/course'] = 'Admin/Course/index';
$route['admin/add-course'] = 'Admin/Course/add';
$route['admin/save-course'] = 'Admin/Course/saveCourse';
$route['admin/update-course'] = 'Admin/Course/updateCourse';
$route['admin/edit-course/(:any)'] = 'Admin/Course/editCourse/$1';
$route['admin/delete-course'] = 'Admin/Course/deleteCourse';
$route['admin/import-course'] = 'Admin/Course/importCourse';
$route['admin/import-course-by-excel'] = 'Admin/Course/importCourseByExcel';
$route['admin/export-course'] = 'Admin/Export/courses';




$route['admin/branch'] = 'Admin/Branch/index';
$route['admin/add-branch'] = 'Admin/Branch/add';
$route['admin/save-branch'] = 'Admin/Branch/saveBranch';
$route['admin/update-branch'] = 'Admin/Branch/updateBranch';
$route['admin/edit-branch/(:any)'] = 'Admin/Branch/editBranch/$1';
$route['admin/delete-branch'] = 'Admin/Branch/deleteBranch';
$route['admin/import-branch'] = 'Admin/Branch/importBranch';
$route['admin/import-branch-by-excel'] = 'Admin/Branch/importBranchByExcel';
$route['admin/export-branch'] = 'Admin/Export/branch';

$route['admin/exams'] = 'Admin/Exams/index';
$route['admin/add-exams'] = 'Admin/Exams/add';
$route['admin/save-exams'] = 'Admin/Exams/saveExams';
$route['admin/update-exams'] = 'Admin/Exams/updateExams';
$route['admin/edit-exams/(:any)'] = 'Admin/Exams/editExams/$1';
$route['admin/delete-exams'] = 'Admin/Exams/deleteExams';
$route['admin/import-exams'] = 'Admin/Exams/importExams';
$route['admin/import-exams-by-excel'] = 'Admin/Exams/importExamsByExcel';
$route['admin/export-exams'] = 'Admin/Export/exams';



$route['admin/district'] = 'Admin/District/index';
$route['admin/add-district'] = 'Admin/District/add';
$route['admin/save-district'] = 'Admin/District/saveCity';
$route['admin/update-district'] = 'Admin/District/updateCity';
$route['admin/edit-district/(:any)'] = 'Admin/District/editCity/$1';
$route['admin/delete-district'] = 'Admin/District/deleteCity';
$route['admin/get-state'] = 'Admin/Common/getStateByCountry';
$route['admin/get-city'] = 'Admin/Common/getCityByState';
$route['admin/get-subdistrict'] = 'Admin/Common/getSubdistrictByCity';
$route['admin/get-catgeorybyhead'] = 'Admin/Common/getCategoryByHead';
$route['admin/import-district'] = 'Admin/District/importCity';
$route['admin/import-district-by-excel'] = 'Admin/District/importCityByExcel';
$route['admin/export-district'] = 'Admin/Export/district';



$route['admin/ownership'] = 'Admin/Ownership/index';
$route['admin/add-ownership'] = 'Admin/Ownership/add';
$route['admin/save-ownership'] = 'Admin/Ownership/saveOwnership';
$route['admin/update-ownership'] = 'Admin/Ownership/updateOwnership';
$route['admin/edit-ownership/(:any)/(:any)'] = 'Admin/Ownership/editOwnership/$1/$2';
$route['admin/delete-ownership'] = 'Admin/Ownership/deleteOwnership';
$route['admin/import-ownership'] = 'Admin/Ownership/importOwnership';
$route['admin/import-ownership-by-excel'] = 'Admin/Ownership/importOwnershipByExcel';
$route['admin/export-ownership'] = 'Admin/Export/ownership';

// 06-11-2023
$route['admin/gallery'] = 'Admin/Gallery/index';
$route['admin/add-gallery'] = 'Admin/Gallery/add';
$route['admin/save-gallery'] = 'Admin/Gallery/saveGallery';
$route['admin/update-gallery'] = 'Admin/Gallery/updateGallery';
$route['admin/edit-gallery/(:any)'] = 'Admin/Gallery/editGallery/$1';
$route['admin/delete-gallery'] = 'Admin/Gallery/deleteGallery';

// 07-11-2023
$route['admin/college'] = 'Admin/College/index';
$route['admin/add-college'] = 'Admin/College/add';
$route['admin/save-college'] = 'Admin/College/saveCollege';
$route['admin/update-college'] = 'Admin/College/updateCollege';
$route['admin/edit-college/(:any)/(:any)'] = 'Admin/College/editCollege/$1/$2';
$route['admin/delete-college'] = 'Admin/College/deleteCollege';
$route['admin/import-college'] = 'Admin/College/importCollege';
$route['admin/import-college-by-excel'] = 'Admin/College/importCollegeByExcel';
$route['admin/export-college'] = 'Admin/Export/college';



$route['admin/feeshead'] = 'Admin/FeesHead/index';
$route['admin/add-feeshead'] = 'Admin/FeesHead/add';
$route['admin/save-feeshead'] = 'Admin/FeesHead/saveFeesHead';
$route['admin/update-feeshead'] = 'Admin/FeesHead/updateFeesHead';
$route['admin/edit-feeshead/(:any)'] = 'Admin/FeesHead/editFeesHead/$1';
$route['admin/delete-feeshead'] = 'Admin/FeesHead/deleteFeesHead';
$route['admin/import-feeshead'] = 'Admin/FeesHead/importFeesHead';
$route['admin/import-feeshead-by-excel'] = 'Admin/FeesHead/importFeesHeadByExcel';
$route['admin/export-feehead'] = 'Admin/Export/feehead';



$route['admin/fees'] = 'Admin/Fees/index';
$route['admin/add-fees'] = 'Admin/Fees/add';
$route['admin/save-fees'] = 'Admin/Fees/saveFees';
$route['admin/update-fees'] = 'Admin/Fees/updateFees';
$route['admin/edit-fees/(:any)'] = 'Admin/Fees/editFees/$1';
$route['admin/delete-fees'] = 'Admin/Fees/deleteFees';


$route['admin/sub-district'] = 'Admin/SubDistrict/index';
$route['admin/add-sub-district'] = 'Admin/SubDistrict/add';
$route['admin/save-sub-district'] = 'Admin/SubDistrict/saveSubDistrict';
$route['admin/update-sub-district'] = 'Admin/SubDistrict/updateSubDistrict';
$route['admin/edit-sub-district/(:any)'] = 'Admin/SubDistrict/editSubDistrict/$1';
$route['admin/delete-sub-district'] = 'Admin/SubDistrict/deleteSubDistrict';
$route['admin/import-sub-district'] = 'Admin/SubDistrict/importSubDistrict';
$route['admin/import-sub-district-by-excel'] = 'Admin/SubDistrict/importSubDistrictByExcel';
$route['admin/export-sub-district'] = 'Admin/Export/subDistrict';


$route['admin/opens'] = 'Admin/Opens/index';
$route['admin/add-opens'] = 'Admin/Opens/add';
$route['admin/save-opens'] = 'Admin/Opens/saveOpens';
$route['admin/update-opens'] = 'Admin/Opens/updateOpens';
$route['admin/edit-opens/(:any)'] = 'Admin/Opens/editOpens/$1';
$route['admin/delete-opens'] = 'Admin/Opens/deleteOpens';
$route['admin/import-opens'] = 'Admin/Opens/importOpens';
$route['admin/import-opens-by-excel'] = 'Admin/Opens/importOpensByExcel';
$route['admin/export-opens'] = 'Admin/Export/opens';



$route['admin/visibility'] = 'Admin/Visibility/index';
$route['admin/add-visibility'] = 'Admin/Visibility/add';
$route['admin/save-visibility'] = 'Admin/Visibility/saveVisibility';
$route['admin/update-visibility'] = 'Admin/Visibility/updateVisibility';
$route['admin/edit-visibility/(:any)'] = 'Admin/Visibility/editVisibility/$1';
$route['admin/delete-visibility'] = 'Admin/Visibility/deleteVisibility';
$route['admin/import-visibility'] = 'Admin/Visibility/importVisibility';
$route['admin/import-visibility-by-excel'] = 'Admin/Visibility/importVisibilityByExcel';
$route['admin/export-visibility'] = 'Admin/Export/visibility';


$route['admin/clinicdetails'] = 'Admin/ClinicDetails/index';
$route['admin/add-clinicdetails'] = 'Admin/ClinicDetails/add';
$route['admin/save-clinicdetails'] = 'Admin/ClinicDetails/saveClinicDetails';
$route['admin/update-clinicdetails'] = 'Admin/ClinicDetails/updateClinicDetails';
$route['admin/edit-clinicdetails/(:any)'] = 'Admin/ClinicDetails/editClinicDetails/$1';
$route['admin/delete-clinicdetails'] = 'Admin/ClinicDetails/deleteClinicDetails';
$route['admin/import-clinicdetails'] = 'Admin/ClinicDetails/importClinicDetails';
$route['admin/import-clinicdetails-by-excel'] = 'Admin/ClinicDetails/importClinicDetailsByExcel';
$route['admin/export-clinicdetails'] = 'Admin/Export/clinicdetails';



$route['admin/clinical-facility'] = 'Admin/ClinicFacility/index';
$route['admin/add-clinical-facility'] = 'Admin/ClinicFacility/add';
$route['admin/save-clinical-facility'] = 'Admin/ClinicFacility/saveClinicFacility';
$route['admin/update-clinical-facility'] = 'Admin/ClinicFacility/updateClinicFacility';
$route['admin/edit-clinical-facility/(:any)'] = 'Admin/ClinicFacility/editClinicFacility/$1';
$route['admin/delete-clinical-facility'] = 'Admin/ClinicFacility/deleteClinicFacility';
$route['admin/import-clinical-facility'] = 'Admin/ClinicFacility/importClinicFacility';
$route['admin/import-clinical-facility-by-excel'] = 'Admin/ClinicFacility/importClinicFacilityByExcel';
$route['admin/export-clinical-facility'] = 'Admin/Export/clinicfacility';


$route['admin/gallery-heads'] = 'Admin/GalleryHeads/index';
$route['admin/add-gallery-heads'] = 'Admin/GalleryHeads/add';
$route['admin/save-gallery-heads'] = 'Admin/GalleryHeads/saveGalleryHeads';
$route['admin/update-gallery-heads'] = 'Admin/GalleryHeads/updateGalleryHeads';
$route['admin/edit-gallery-heads/(:any)'] = 'Admin/GalleryHeads/editGalleryHeads/$1';
$route['admin/delete-gallery-heads'] = 'Admin/GalleryHeads/deleteGalleryHeads';
$route['admin/import-gallery-heads'] = 'Admin/GalleryHeads/importGalleryHeads';
$route['admin/import-gallery-heads-by-excel'] = 'Admin/GalleryHeads/importGalleryHeadsByExcel';
$route['admin/export-gallery-heads'] = 'Admin/Export/gallery_heads';

$route['admin/service-rules'] = 'Admin/ServiceRules/index';
$route['admin/add-service-rules'] = 'Admin/ServiceRules/add';
$route['admin/save-service-rules'] = 'Admin/ServiceRules/saveServiceRule';
$route['admin/update-service-rules'] = 'Admin/ServiceRules/updateServiceRule';
$route['admin/edit-service-rules/(:any)'] = 'Admin/ServiceRules/editServiceRule/$1';
$route['admin/delete-service-rules'] = 'Admin/ServiceRules/deleteServiceRule';
$route['admin/import-service-rules'] = 'Admin/ServiceRules/importServiceRules';
$route['admin/import-service-rules-by-excel'] = 'Admin/ServiceRules/importServiceRulesByExcel';
$route['admin/export-service-bond-rules'] = 'Admin/Export/service_bond_rules';


$route['admin/counselling-level'] = 'Admin/CounsellingLevel/index';
$route['admin/add-counselling-level'] = 'Admin/CounsellingLevel/add';
$route['admin/save-counselling-level'] = 'Admin/CounsellingLevel/saveCounsellingLevel';
$route['admin/update-counselling-level'] = 'Admin/CounsellingLevel/updateCounsellingLevel';
$route['admin/edit-counselling-level/(:any)'] = 'Admin/CounsellingLevel/editCounsellingLevel/$1';
$route['admin/delete-counselling-level'] = 'Admin/CounsellingLevel/deleteCounsellingLevel';
$route['admin/import-counselling-level'] = 'Admin/CounsellingLevel/importCounsellingLevel';
$route['admin/import-counselling-level-by-excel'] = 'Admin/CounsellingLevel/importCounsellingLevelByExcel';
$route['admin/export-counselling-level'] = 'Admin/Export/counselling_level';



$route['admin/cutoff-head-name'] = 'Admin/CounsellingHead/index';
$route['admin/add-cutoff-head-name'] = 'Admin/CounsellingHead/add';
$route['admin/save-cutoff-head-name'] = 'Admin/CounsellingHead/saveCounsellingHead';
$route['admin/update-cutoff-head-name'] = 'Admin/CounsellingHead/updateCounsellingHead';
$route['admin/edit-cutoff-head-name/(:any)'] = 'Admin/CounsellingHead/editCounsellingHead/$1';
$route['admin/delete-cutoff-head-name'] = 'Admin/CounsellingHead/deleteCounsellingHead';
$route['admin/import-cutoff-head-name'] = 'Admin/CounsellingHead/importCounsellingHead';
$route['admin/import-cutoff-head-name-by-excel'] = 'Admin/CounsellingHead/importCounsellingHeadByExcel';
$route['admin/export-cutoff-head-name'] = 'Admin/Export/counselling_head';




$route['admin/category'] = 'Admin/Category/index';
$route['admin/add-category'] = 'Admin/Category/add';
$route['admin/save-category'] = 'Admin/Category/saveCategory';
$route['admin/update-category'] = 'Admin/Category/updateCategory';
$route['admin/edit-category/(:any)'] = 'Admin/Category/editCategory/$1';
$route['admin/delete-category'] = 'Admin/Category/deleteCategory';
$route['admin/import-category'] = 'Admin/Category/importCategory';
$route['admin/import-category-by-excel'] = 'Admin/Category/importCategoryByExcel';
$route['admin/export-category'] = 'Admin/Export/category';




$route['admin/sub-category'] = 'Admin/SubCategory/index';
$route['admin/add-sub-category'] = 'Admin/SubCategory/add';
$route['admin/save-sub-category'] = 'Admin/SubCategory/saveSubCategory';
$route['admin/update-sub-category'] = 'Admin/SubCategory/updateSubCategory';
$route['admin/edit-sub-category/(:any)'] = 'Admin/SubCategory/editSubCategory/$1';
$route['admin/delete-sub-category'] = 'Admin/SubCategory/deleteSubCategory';
$route['admin/import-sub-category'] = 'Admin/SubCategory/importSubCategory';
$route['admin/import-sub-category-by-excel'] = 'Admin/SubCategory/importSubCategoryByExcel';
$route['admin/export-sub-category'] = 'Admin/Export/sub_category';

$route['admin/special-category'] = 'Admin/SpecialCategory/index';
$route['admin/add-special-category'] = 'Admin/SpecialCategory/add';
$route['admin/save-special-category'] = 'Admin/SpecialCategory/saveSpecialCategory';
$route['admin/update-special-category'] = 'Admin/SpecialCategory/updateSpecialCategory';
$route['admin/edit-special-category/(:any)'] = 'Admin/SpecialCategory/editSpecialCategory/$1';
$route['admin/delete-special-category'] = 'Admin/SpecialCategory/deleteSpecialCategory';
$route['admin/import-special-category'] = 'Admin/SpecialCategory/importSpecialCategory';
$route['admin/import-special-category-by-excel'] = 'Admin/SpecialCategory/importSpecialCategoryByExcel';
$route['admin/export-special-category'] = 'Admin/Export/special_category';

$route['admin/sub-special-category'] = 'Admin/SubSpecialCategory/index';
$route['admin/add-sub-special-category'] = 'Admin/SubSpecialCategory/add';
$route['admin/save-sub-special-category'] = 'Admin/SubSpecialCategory/saveSubSpecialCategory';
$route['admin/update-sub-special-category'] = 'Admin/SubSpecialCategory/updateSubSpecialCategory';
$route['admin/edit-sub-special-category/(:any)'] = 'Admin/SubSpecialCategory/editSubSpecialCategory/$1';
$route['admin/delete-sub-special-category'] = 'Admin/SubSpecialCategory/deleteSubSpecialCategory';
$route['admin/import-sub-special-category'] = 'Admin/SubSpecialCategory/importSubSpecialCategory';
$route['admin/import-sub-special-category-by-excel'] = 'Admin/SubSpecialCategory/importSubSpecialCategoryByExcel';
$route['admin/export-sub-special-category'] = 'Admin/Export/sub_special_category';



$route['admin/clinical-details'] = 'Admin/ClinicalDetails/index';
$route['admin/add-clinical-details'] = 'Admin/ClinicalDetails/add';
$route['admin/save-clinical-details'] = 'Admin/ClinicalDetails/saveClinicalDetails';
$route['admin/update-clinical-details'] = 'Admin/ClinicalDetails/updateClinicalDetails';
$route['admin/edit-clinical-details/(:any)'] = 'Admin/ClinicalDetails/editClinicalDetails/$1';
$route['admin/delete-clinical-details'] = 'Admin/ClinicalDetails/deleteClinicalDetails';
$route['admin/import-clinical-details'] = 'Admin/ClinicalDetails/importClinicalDetails';
$route['admin/import-clinical-details-by-excel'] = 'Admin/ClinicalDetails/importClinicalDetailsByExcel';
$route['admin/export-clinical-details'] = 'Admin/Export/clinical_details';


$route['admin/facilities'] = 'Admin/Facilities/index';
$route['admin/add-facilities'] = 'Admin/Facilities/add';
$route['admin/save-facilities'] = 'Admin/Facilities/saveFacilities';
$route['admin/update-facilities'] = 'Admin/Facilities/updateFacilities';
$route['admin/edit-facilities/(:any)'] = 'Admin/Facilities/editFacilities/$1';
$route['admin/delete-facilities'] = 'Admin/Facilities/deleteFacilities';
$route['admin/import-facilities'] = 'Admin/Facilities/importFacilities';
$route['admin/import-facilities-by-excel'] = 'Admin/Facilities/importFacilitiesByExcel';
$route['admin/export-facilities'] = 'Admin/Export/facilities';




$route['admin/counselling-plan'] = 'Admin/CounsellingPlan/index';
$route['admin/add-counselling-plan'] = 'Admin/CounsellingPlan/add';
$route['admin/save-counselling-plan'] = 'Admin/CounsellingPlan/saveCounsellingPlan';
$route['admin/update-counselling-plan'] = 'Admin/CounsellingPlan/updateCounsellingPlan';
$route['admin/edit-counselling-plan/(:any)/(:any)'] = 'Admin/CounsellingPlan/editCounsellingPlan/$1/$2';
$route['admin/delete-counselling-plan'] = 'Admin/CounsellingPlan/deleteCounsellingPlan';
$route['admin/import-counselling-plan'] = 'Admin/CounsellingPlan/importCounsellingPlan';
$route['admin/import-counselling-plan-by-excel'] = 'Admin/CounsellingPlan/importCounsellingPlanByExcel';
$route['admin/export-counselling-plan'] = 'Admin/Export/counselling_plan';



$route['admin/news'] = 'Admin/News/index';
$route['admin/add-news'] = 'Admin/News/add';
$route['admin/save-news'] = 'Admin/News/saveNews';
$route['admin/update-news'] = 'Admin/News/updateNews';
$route['admin/edit-news/(:any)'] = 'Admin/News/editNews/$1';
$route['admin/delete-news'] = 'Admin/News/deleteNews';
$route['admin/import-news'] = 'Admin/News/importNews';
$route['admin/import-news-by-excel'] = 'Admin/News/importNewsByExcel';
$route['admin/export-news'] = 'Admin/Export/news';


$route['admin/college-files'] = 'Admin/CollegeFiles/index';
$route['admin/add-college-files'] = 'Admin/CollegeFiles/add';
$route['admin/save-college-files'] = 'Admin/CollegeFiles/saveCollegeFiles';
$route['admin/update-college-files'] = 'Admin/CollegeFiles/updateCollegeFiles';
$route['admin/edit-college-files/(:any)'] = 'Admin/CollegeFiles/editCollegeFiles/$1';
$route['admin/delete-college-files'] = 'Admin/CollegeFiles/deleteCollegeFiles';
$route['admin/assign-media/(:any)'] = 'Admin/CollegeFiles/assignMedia/$1';
$route['admin/save-single-gallery-media'] = 'Admin/CollegeFiles/saveMediaToGallery';
$route['admin/delete-media-from-college'] = 'Admin/CollegeFiles/deleteMediaToGallery';

$route['admin/cutoff-entry-data'] = 'Admin/CounsellingHead/cutOffEntryData';
$route['admin/filter-cutoff-data'] = 'Admin/CounsellingHead/filterCutOffData';
$route['admin/import-cutoffdata'] = 'Admin/CounsellingHead/importCutOffData';
$route['admin/import-cutoffdata-by-excel'] = 'Admin/CounsellingHead/importCutOffDataExcel';
$route['admin/get-category'] = 'Admin/CounsellingHead/getCategory';
$route['admin/export-cutoff-entry-data/(:any)/(:any)/(:any)'] = 'Admin/Export/exportCutOffEntryData/$1/$2/$3';



$route['admin/college-seat-matrix'] = 'Admin/CollegeMatrix/collegeSeatMatrix';
$route['admin/get-courses'] = 'Admin/CollegeMatrix/getCourses';
$route['admin/get-course-branches'] = 'Admin/CollegeMatrix/getBranches';
$route['admin/get-colleges-data'] = 'Admin/CollegeMatrix/getCOllegesData';
$route['admin/save-colleges-seat-matrix'] = 'Admin/CollegeMatrix/saveCollegeSeatMatrix';
$route['admin/import-college-seat-matrix'] = 'Admin/CollegeMatrix/importSeatMatrixPage';
$route['admin/export-college-seat-matrix'] = 'Admin/CollegeMatrix/exportSeatMatrixPage';
$route['admin/import-college-seat-matrix-data'] = 'Admin/CollegeMatrix/importSeatMatrixData';
$route['admin/export-college-seat-matrix-data/(:any)/(:any)/(:any)/(:any)'] = 'Admin/CollegeMatrix/exportSeatMatrixData/$1/$2/$3/$4';



$route['admin/logout'] = 'Admin/Authenticate/logout';
$route['admin/settings'] = 'Admin/Settings/index';
$route['admin/update-site-settings'] = 'Admin/Settings/updateSiteSettings';
$route['admin/get-branches'] = 'Admin/Common/getBranchesByCourse';
$route['admin/candidate'] = 'Admin/Candidate/index';


$route['admin/coursegroup'] = 'Admin/Coursegroup/index';
$route['admin/add-coursegroup'] = 'Admin/Coursegroup/add';
$route['admin/save-coursegroup'] = 'Admin/Coursegroup/saveCoursegroup';
$route['admin/update-coursegroup'] = 'Admin/Coursegroup/updateCoursegroup';
$route['admin/edit-coursegroup/(:any)/(:any)'] = 'Admin/Coursegroup/editCoursegroup/$1/$2';
$route['admin/delete-coursegroup'] = 'Admin/Coursegroup/deleteCoursegroup';
$route['admin/import-coursegroup'] = 'Admin/Coursegroup/importCoursegroup';
$route['admin/import-coursegroup-by-excel'] = 'Admin/Coursegroup/importCoursegroupByExcel';
$route['admin/export-coursegroup'] = 'Admin/Export/coursegroup';