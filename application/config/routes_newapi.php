<?php 
// API Routes

// payment
$route['api/payment'] 						= 'API/MasterApis/Getpayments';
$route['api/payment-status'] 				= 'API/MasterApis/GetpaymentsByStatus/$1';
$route['api/payment-date/(:any)'] 			= 'API/MasterApis/GetpaymentsByDate/$1';
$route['api/payment-txnId/(:any)'] 			= 'API/MasterApis/GetpaymentsByTxnId/$1';
$route['api/payment-userId/(:any)'] 		= 'API/MasterApis/GetpaymentsByUserId/$1';
$route['api/payment-planId/(:any)'] 		= 'API/MasterApis/GetpaymentsByPlanId/$1';
$route['api/payment-id/(:any)'] 			= 'API/MasterApis/GetpaymentsById/$1';

// approval
$route['api/approval'] 						= 'API/MasterApis/Getapproval';
$route['api/approval-id/(:any)'] 			= 'API/MasterApis/GetapprovalById/$1';

// Branch
$route['api/branch'] 					 	= 'API/MasterApis/Getbranch';
$route['api/branch-id/(:any)'] 				= 'API/MasterApis/GetbranchById/$1';
$route['api/branch-branchType/(:any)'] 		= 'API/MasterApis/GetbranchByBranchtype/$1';
$route['api/branch-course/(:any)'] 			= 'API/MasterApis/GetbranchByCourse/$1';


// Category
$route['api/category'] 					 	= 'API/MasterApis/Getcategory';
$route['api/category-id/(:any)'] 			= 'API/MasterApis/GetcategoryById/$1';
$route['api/category-head/(:any)'] 			= 'API/MasterApis/GetcategoryByHead/$1';

// City
$route['api/city'] 					 		= 'API/MasterApis/Getcity';
$route['api/city-id/(:any)'] 				= 'API/MasterApis/GetcityById/$1';
$route['api/city-country/(:any)'] 			= 'API/MasterApis/GetcityByCountry/$1';
$route['api/city-state/(:any)'] 			= 'API/MasterApis/GetcityBystate/$1';


// clinical_details
$route['api/clinical_details'] 				= 'API/MasterApis/Getclinical_details';
$route['api/clinical_details-id/(:any)'] 	= 'API/MasterApis/Getclinical_detailsById/$1';

// clinic_details
$route['api/clinic_details'] 				= 'API/MasterApis/Getclinic_details';
$route['api/clinic_details-id/(:any)'] 		= 'API/MasterApis/Getclinic_detailsById/$1';

// clinic_facility
$route['api/clinic_facility'] 				= 'API/MasterApis/Getclinic_facility';
$route['api/clinic_facility-id/(:any)'] 	= 'API/MasterApis/Getclinic_facilityById/$1';


// college
$route['api/college'] 							= 'API/MasterApis/Getcollege';
$route['api/college-id/(:any)'] 				= 'API/MasterApis/GetcollegeById/$1';
$route['api/college-establishment/(:any)'] 		= 'API/MasterApis/GetcollegeByEstablishment/$1';
$route['api/college-gender_accepted/(:any)'] 	= 'API/MasterApis/GetcollegeByGender_accepted/$1';
$route['api/college-stream/(:any)'] 			= 'API/MasterApis/GetcollegeByStream/$1';
$route['api/college-course_offered/(:any)'] 	= 'API/MasterApis/GetcollegeByCourse_offered/$1';
$route['api/college-country/(:any)'] 			= 'API/MasterApis/GetcollegeByCountry/$1';
$route['api/college-state/(:any)'] 				= 'API/MasterApis/GetcollegeByState/$1';
$route['api/college-city/(:any)'] 				= 'API/MasterApis/GetcollegeByCity/$1';
$route['api/college-subdistrict/(:any)'] 		= 'API/MasterApis/GetcollegeBySubdistrict/$1';
$route['api/college-approved_by/(:any)'] 		= 'API/MasterApis/GetcollegeByApproved_by/$1';
$route['api/college-ownership/(:any)'] 			= 'API/MasterApis/GetcollegeByOwnership/$1';
$route['api/college-added_by/(:any)'] 			= 'API/MasterApis/GetcollegeByAdded_by/$1';


// college
$route['api/fee'] 											= 'API/MasterApis/Getfee';
$route['api/fee-id/(:any)'] 								= 'API/MasterApis/GetfeeById/$1';
$route['api/fee-college/(:any)'] 							= 'API/MasterApis/GetfeeByCollege/$1';
$route['api/fee-fee_head/(:any)'] 							= 'API/MasterApis/GetfeeByFee_head/$1';
$route['api/fee-course/(:any)'] 							= 'API/MasterApis/GetfeeByCourse/$1';
$route['api/fee-year/(:any)'] 								= 'API/MasterApis/GetfeeByYear/$1';
$route['api/fee-course-year/(:any)/(:any)'] 				= 'API/MasterApis/GetfeeByCourseAndYear/$1/$2';
$route['api/fee-college-course-year/(:any)/(:any)/(:any)']  = 'API/MasterApis/GetfeeByCollegeAndCourseAndYear/$1/$2/$3';

// Seat matrix
$route['api/seat_matrix'] 						= 'API/MasterApis/Getseat_matrix';
;
// counselling head
$route['api/counselling_head'] 					= 'API/MasterApis/Getcounselling_head';
$route['api/counselling_head-id/(:any)'] 		= 'API/MasterApis/Getcounselling_headById/$1';
$route['api/counselling_head-state/(:any)'] 	= 'API/MasterApis/Getcounselling_headByState/$1';

// counsellng_plans
$route['api/counsellng_plans'] 					= 'API/MasterApis/Getcounsellng_plans';
$route['api/counsellng_plans-id/(:any)'] 		= 'API/MasterApis/Getcounsellng_plansById/$1';
$route['api/counsellng_plans-degree/(:any)'] 	= 'API/MasterApis/Getcounsellng_plansByDegree/$1';
$route['api/counsellng_plans-course/(:any)'] 	= 'API/MasterApis/Getcounsellng_plansByCourse/$1';
$route['api/counsellng_plans-status/(:any)'] 	= 'API/MasterApis/Getcounsellng_plansByStatus/$1';


// tbl_course
$route['api/course'] 							= 'API/MasterApis/Getcourse';
$route['api/course-id/(:any)'] 					= 'API/MasterApis/GetcourseById/$1';
$route['api/course-stream/(:any)'] 				= 'API/MasterApis/GetcourseByStream/$1';
$route['api/course-degree_type/(:any)'] 		= 'API/MasterApis/GetcourseByDegree_type/$1';
$route['api/course-exam/(:any)'] 				= 'API/MasterApis/GetcourseBExam/$1';
$route['api/course-status/(:any)'] 				= 'API/MasterApis/GetcourseByStatus/$1';
$route['api/course-coursegroup/(:any)'] 		= 'API/MasterApis/GetcourseByCoursegroup/$1';


// tbl_coursegroup
$route['api/coursegroup'] 						= 'API/MasterApis/Getcoursegroup';
$route['api/coursegroup-id/(:any)'] 			= 'API/MasterApis/GetcoursegroupById/$1';

// tbl_cutfoff_marks_data
$route['api/cutfoff_marks_data'] 						= 'API/MasterApis/Getcutfoff_marks_data';
$route['api/cutfoff_marks_data-id/(:any)'] 				= 'API/MasterApis/Getcutfoff_marks_dataById/$1';
$route['api/cutfoff_marks_data-college/(:any)'] 		= 'API/MasterApis/Getcutfoff_marks_dataByCollege/$1';
$route['api/cutfoff_marks_data-course/(:any)'] 			= 'API/MasterApis/Getcutfoff_marks_dataByCourse/$1';
$route['api/cutfoff_marks_data-branch/(:any)'] 			= 'API/MasterApis/Getcutfoff_marks_dataByBranch/$1';
$route['api/cutfoff_marks_data-category_type/(:any)'] 	= 'API/MasterApis/Getcutfoff_marks_dataByCategory_type/$1';
$route['api/cutfoff_marks_data-cutoff_head/(:any)'] 	= 'API/MasterApis/Getcutfoff_marks_dataByCutoff_head/$1';

// tbl_coursegroup
$route['api/degree_type'] 								= 'API/MasterApis/Getdegree_type';
$route['api/degree_type-id/(:any)'] 					= 'API/MasterApis/Getdegree_typeById/$1';

// tbl_exam
$route['api/exam'] 										= 'API/MasterApis/Getexam';
$route['api/exam-id/(:any)'] 							= 'API/MasterApis/GetexamById/$1';
$route['api/exam-degree_type/(:any)'] 					= 'API/MasterApis/GetexamByDegree_type/$1';

// facilities
$route['api/facilities'] 								= 'API/MasterApis/Getfacilities';
$route['api/facilities-id/(:any)'] 						= 'API/MasterApis/GetfacilitiesById/$1';

// tbl_feeshead
$route['api/feeshead'] 									= 'API/MasterApis/Getfeeshead';
$route['api/feeshead-id/(:any)'] 						= 'API/MasterApis/GetfeesheadById/$1';

// gallery
$route['api/gallery-college/(:any)'] 					= 'API/MasterApis/GetgalleryByCollege/$1';


// news
$route['api/news'] 										= 'API/MasterApis/Getnews';
$route['api/news-id/(:any)'] 							= 'API/MasterApis/GetnewsById/$1';
$route['api/news-course/(:any)'] 						= 'API/MasterApis/GetnewsByCourse/$1';

// users
$route['api/users-type/(:any)'] 						= 'API/MasterApis/GetusersByType/$1';

// Seat matrix
$route['api/country'] 									= 'API/MasterApis/Getcountry';



 
?>