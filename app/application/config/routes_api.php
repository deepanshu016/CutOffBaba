<?php 
// API Routes

$route['api/sitesettings'] = 'API/MasterApi/getSiteSettings';
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
$route['api/getcoursebystream/(:any)'] = 'API/MasterApi/getcoursebystream/$1';
$route['api/open'] = 'API/MasterApi/getOpensList';
$route['api/visibility'] = 'API/MasterApi/getVisibilityList';
$route['api/clinic-details'] = 'API/MasterApi/getClinicDetailsList';
$route['api/facility'] = 'API/MasterApi/getClinicFacilityList';
$route['api/exams'] = 'API/MasterApi/getExamsList';
$route['api/nature'] = 'API/MasterApi/getNatureList';
$route['api/course'] = 'API/MasterApi/getCourseList';
$route['api/getcoursedetail/(:any)'] = 'API/MasterApi/getCourseList/$1';
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
 ?>