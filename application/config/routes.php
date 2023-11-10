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
$route['admin/update-degreetype'] = 'Admin/DegreeType/updateDegreeType';
$route['admin/edit-degreetype/(:any)'] = 'Admin/DegreeType/editDegreeType/$1';
$route['admin/delete-degreetype'] = 'Admin/DegreeType/deleteDegreeType';


$route['admin/nature'] = 'Admin/Nature/index';
$route['admin/add-nature'] = 'Admin/Nature/add';
$route['admin/save-nature'] = 'Admin/Nature/saveNature';
$route['admin/update-nature'] = 'Admin/Nature/updateNature';
$route['admin/edit-nature/(:any)'] = 'Admin/Nature/editNature/$1';
$route['admin/delete-nature'] = 'Admin/Nature/deleteNature';


$route['admin/course'] = 'Admin/Course/index';
$route['admin/add-course'] = 'Admin/Course/add';
$route['admin/save-course'] = 'Admin/Course/saveCourse';
$route['admin/update-course'] = 'Admin/Course/updateCourse';
$route['admin/edit-course/(:any)'] = 'Admin/Course/editCourse/$1';
$route['admin/delete-course'] = 'Admin/Course/deleteCourse';

$route['admin/branch'] = 'Admin/Branch/index';
$route['admin/add-branch'] = 'Admin/Branch/add';
$route['admin/save-branch'] = 'Admin/Branch/saveBranch';
$route['admin/update-branch'] = 'Admin/Branch/updateBranch';
$route['admin/edit-branch/(:any)'] = 'Admin/Branch/editBranch/$1';
$route['admin/delete-branch'] = 'Admin/Branch/deleteBranch';

$route['admin/exams'] = 'Admin/Exams/index';
$route['admin/add-exams'] = 'Admin/Exams/add';
$route['admin/save-exams'] = 'Admin/Exams/saveExams';
$route['admin/update-exams'] = 'Admin/Exams/updateExams';
$route['admin/edit-exams/(:any)'] = 'Admin/Exams/editExams/$1';
$route['admin/delete-exams'] = 'Admin/Exams/deleteExams';


$route['admin/district'] = 'Admin/City/index';
$route['admin/add-district'] = 'Admin/City/add';
$route['admin/save-district'] = 'Admin/City/saveCity';
$route['admin/update-district'] = 'Admin/City/updateCity';
$route['admin/edit-district/(:any)'] = 'Admin/City/editCity/$1';
$route['admin/delete-district'] = 'Admin/City/deleteCity';
$route['admin/get-state'] = 'Admin/Common/getStateByCountry';
$route['admin/get-city'] = 'Admin/Common/getCityByState';

$route['admin/ownership'] = 'Admin/Ownership/index';
$route['admin/add-ownership'] = 'Admin/Ownership/add';
$route['admin/save-ownership'] = 'Admin/Ownership/saveOwnership';
$route['admin/update-ownership'] = 'Admin/Ownership/updateOwnership';
$route['admin/edit-ownership/(:any)/(:any)'] = 'Admin/Ownership/editOwnership/$1/$2';
$route['admin/delete-ownership'] = 'Admin/Ownership/deleteOwnership';

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



$route['admin/feeshead'] = 'Admin/FeesHead/index';
$route['admin/add-feeshead'] = 'Admin/FeesHead/add';
$route['admin/save-feeshead'] = 'Admin/FeesHead/saveFeesHead';
$route['admin/update-feeshead'] = 'Admin/FeesHead/updateFeesHead';
$route['admin/edit-feeshead/(:any)'] = 'Admin/FeesHead/editFeesHead/$1';
$route['admin/delete-feeshead'] = 'Admin/FeesHead/deleteFeesHead';

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



$route['admin/opens'] = 'Admin/Opens/index';
$route['admin/add-opens'] = 'Admin/Opens/add';
$route['admin/save-opens'] = 'Admin/Opens/saveOpens';
$route['admin/update-opens'] = 'Admin/Opens/updateOpens';
$route['admin/edit-opens/(:any)'] = 'Admin/Opens/editOpens/$1';
$route['admin/delete-opens'] = 'Admin/Opens/deleteOpens';





$route['admin/visibility'] = 'Admin/Visibility/index';
$route['admin/add-visibility'] = 'Admin/Visibility/add';
$route['admin/save-visibility'] = 'Admin/Visibility/saveVisibility';
$route['admin/update-visibility'] = 'Admin/Visibility/updateVisibility';
$route['admin/edit-visibility/(:any)'] = 'Admin/Visibility/editVisibility/$1';
$route['admin/delete-visibility'] = 'Admin/Visibility/deleteVisibility';


$route['admin/clinicdetails'] = 'Admin/ClinicDetails/index';
$route['admin/add-clinicdetails'] = 'Admin/ClinicDetails/add';
$route['admin/save-clinicdetails'] = 'Admin/ClinicDetails/saveClinicDetails';
$route['admin/update-clinicdetails'] = 'Admin/ClinicDetails/updateClinicDetails';
$route['admin/edit-clinicdetails/(:any)'] = 'Admin/ClinicDetails/editClinicDetails/$1';
$route['admin/delete-clinicdetails'] = 'Admin/ClinicDetails/deleteClinicDetails';



$route['admin/clinical-facility'] = 'Admin/ClinicFacility/index';
$route['admin/add-clinical-facility'] = 'Admin/ClinicFacility/add';
$route['admin/save-clinical-facility'] = 'Admin/ClinicFacility/saveClinicFacility';
$route['admin/update-clinical-facility'] = 'Admin/ClinicFacility/updateClinicFacility';
$route['admin/edit-clinical-facility/(:any)'] = 'Admin/ClinicFacility/editClinicFacility/$1';
$route['admin/delete-clinical-facility'] = 'Admin/ClinicFacility/deleteClinicFacility';


$route['admin/logout'] = 'Admin/Authenticate/logout';
$route['admin/settings'] = 'Admin/Settings/index';
$route['admin/update-site-settings'] = 'Admin/Settings/updateSiteSettings';