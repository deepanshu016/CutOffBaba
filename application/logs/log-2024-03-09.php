<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

DEBUG - 2024-03-09 00:01:43 --> Total execution time: 0.1496
ERROR - 2024-03-09 00:02:02 --> Severity: error --> Exception: Too few arguments to function Home::filterCollegeData(), 0 passed in C:\deepanshu\CutOffBaba\system\core\CodeIgniter.php on line 533 and exactly 2 expected C:\deepanshu\CutOffBaba\application\controllers\Home.php 132
DEBUG - 2024-03-09 00:05:48 --> Total execution time: 0.1771
ERROR - 2024-03-09 00:07:52 --> Severity: Warning --> Undefined variable $state_id C:\deepanshu\CutOffBaba\application\controllers\Home.php 134
ERROR - 2024-03-09 00:07:52 --> Severity: Warning --> Undefined variable $course_id C:\deepanshu\CutOffBaba\application\controllers\Home.php 134
ERROR - 2024-03-09 00:07:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ', c.course_offered) > 0' at line 9 - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`
FROM `tbl_college` as `c`
JOIN `tbl_state` as `s` ON `s`.`id` = `c`.`state`
JOIN `tbl_city` as `cit` ON `cit`.`id` = `c`.`city`
JOIN `tbl_country` as `count` ON `count`.`id` = `c`.`country`
JOIN `tbl_approval` as `a` ON `a`.`id` = `c`.`approved_by`
JOIN `tbl_ownership` as `o` ON `o`.`id` = `c`.`ownership`
WHERE `c`.`state` IS NULL
AND FIND_IN_SET(, c.course_offered) > 0
ERROR - 2024-03-09 00:07:52 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 251
ERROR - 2024-03-09 00:07:57 --> Severity: Warning --> Undefined variable $state_id C:\deepanshu\CutOffBaba\application\controllers\Home.php 134
ERROR - 2024-03-09 00:07:57 --> Severity: Warning --> Undefined variable $course_id C:\deepanshu\CutOffBaba\application\controllers\Home.php 134
ERROR - 2024-03-09 00:07:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ', c.course_offered) > 0' at line 9 - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`
FROM `tbl_college` as `c`
JOIN `tbl_state` as `s` ON `s`.`id` = `c`.`state`
JOIN `tbl_city` as `cit` ON `cit`.`id` = `c`.`city`
JOIN `tbl_country` as `count` ON `count`.`id` = `c`.`country`
JOIN `tbl_approval` as `a` ON `a`.`id` = `c`.`approved_by`
JOIN `tbl_ownership` as `o` ON `o`.`id` = `c`.`ownership`
WHERE `c`.`state` IS NULL
AND FIND_IN_SET(, c.course_offered) > 0
ERROR - 2024-03-09 00:07:57 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 251
DEBUG - 2024-03-09 00:09:54 --> Total execution time: 0.1536
ERROR - 2024-03-09 00:09:58 --> Severity: Warning --> Undefined variable $state_id C:\deepanshu\CutOffBaba\application\controllers\Home.php 134
ERROR - 2024-03-09 00:09:58 --> Severity: Warning --> Undefined variable $course_id C:\deepanshu\CutOffBaba\application\controllers\Home.php 134
ERROR - 2024-03-09 00:09:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ', c.course_offered) >0
AND `c`.`state` IS NULL' at line 8 - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`
FROM `tbl_college` as `c`
JOIN `tbl_state` as `s` ON `s`.`id` = `c`.`state`
JOIN `tbl_city` as `cit` ON `cit`.`id` = `c`.`city`
JOIN `tbl_country` as `count` ON `count`.`id` = `c`.`country`
JOIN `tbl_approval` as `a` ON `a`.`id` = `c`.`approved_by`
JOIN `tbl_ownership` as `o` ON `o`.`id` = `c`.`ownership`
WHERE FIND_IN_SET(, c.course_offered) >0
AND `c`.`state` IS NULL
ERROR - 2024-03-09 00:09:58 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 261
ERROR - 2024-03-09 00:17:56 --> Query error: Unknown column 'c.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`, `id`
FROM `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:17:56 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 246
ERROR - 2024-03-09 00:18:00 --> Severity: Warning --> Undefined array key "degree_type" C:\deepanshu\CutOffBaba\application\models\MasterModel.php 245
ERROR - 2024-03-09 00:18:00 --> Severity: Warning --> Undefined array key "exam" C:\deepanshu\CutOffBaba\application\models\MasterModel.php 260
DEBUG - 2024-03-09 00:18:00 --> Total execution time: 0.1600
ERROR - 2024-03-09 00:18:04 --> Query error: Unknown column 'c.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`, `id`
FROM `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:18:04 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 246
ERROR - 2024-03-09 00:18:16 --> Severity: Warning --> Undefined array key "degree_type" C:\deepanshu\CutOffBaba\application\models\MasterModel.php 245
ERROR - 2024-03-09 00:18:16 --> Severity: Warning --> Undefined array key "exam" C:\deepanshu\CutOffBaba\application\models\MasterModel.php 260
DEBUG - 2024-03-09 00:18:16 --> Total execution time: 0.1708
ERROR - 2024-03-09 00:20:58 --> Query error: Unknown column 'c.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`, `id`
FROM `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:20:59 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 247
ERROR - 2024-03-09 00:21:11 --> Query error: Unknown column 'c.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`, `id`
FROM `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:21:11 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 247
ERROR - 2024-03-09 00:32:29 --> Query error: Unknown column 'c.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`, `id`
FROM `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:32:29 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 247
ERROR - 2024-03-09 00:33:04 --> Query error: Unknown column 'c.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`, `id`
FROM `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:33:04 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 247
ERROR - 2024-03-09 00:33:21 --> Query error: Unknown column 'c.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`, `id`
FROM `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:33:21 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 247
ERROR - 2024-03-09 00:34:33 --> Query error: Unknown column 'c.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`, `id`
FROM `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:34:33 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 247
ERROR - 2024-03-09 00:34:52 --> Query error: Unknown column 'c.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`, `id`
FROM `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:34:52 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 247
ERROR - 2024-03-09 00:35:47 --> Severity: 8192 --> Creation of dynamic property Home::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:35:47 --> Severity: 8192 --> Creation of dynamic property Home::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:35:47 --> Severity: 8192 --> Creation of dynamic property Home::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:35:47 --> Severity: 8192 --> Creation of dynamic property Home::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:35:47 --> Severity: 8192 --> Creation of dynamic property Home::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:35:47 --> Severity: 8192 --> Creation of dynamic property Home::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:35:47 --> Severity: 8192 --> Creation of dynamic property Home::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:35:47 --> Severity: 8192 --> Creation of dynamic property Home::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:35:47 --> Query error: Unknown column 'c.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`, `id`
FROM `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:35:47 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\deepanshu\CutOffBaba\system\core\Exceptions.php:272) C:\deepanshu\CutOffBaba\system\core\Common.php 565
ERROR - 2024-03-09 00:36:53 --> Severity: 8192 --> Creation of dynamic property Home::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:36:53 --> Severity: 8192 --> Creation of dynamic property Home::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:36:53 --> Severity: 8192 --> Creation of dynamic property Home::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:36:53 --> Severity: 8192 --> Creation of dynamic property Home::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:36:53 --> Severity: 8192 --> Creation of dynamic property Home::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:36:53 --> Severity: 8192 --> Creation of dynamic property Home::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:36:53 --> Severity: 8192 --> Creation of dynamic property Home::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:36:53 --> Severity: 8192 --> Creation of dynamic property Home::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:36:53 --> Query error: Unknown column 's.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`, `id`
FROM `tbl_college` as `c`, `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:36:53 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\deepanshu\CutOffBaba\system\core\Exceptions.php:272) C:\deepanshu\CutOffBaba\system\core\Common.php 565
ERROR - 2024-03-09 00:37:33 --> Severity: 8192 --> Creation of dynamic property Home::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:37:33 --> Severity: 8192 --> Creation of dynamic property Home::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:37:33 --> Severity: 8192 --> Creation of dynamic property Home::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:37:33 --> Severity: 8192 --> Creation of dynamic property Home::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:37:33 --> Severity: 8192 --> Creation of dynamic property Home::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:37:33 --> Severity: 8192 --> Creation of dynamic property Home::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:37:33 --> Severity: 8192 --> Creation of dynamic property Home::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:37:33 --> Severity: 8192 --> Creation of dynamic property Home::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:37:33 --> Query error: Unknown column 's.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`, `cd`.`id`
FROM `tbl_college` as `c`, `tbl_course` as `cd`
WHERE `cd`.`degree_type` = '2'
ERROR - 2024-03-09 00:37:33 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\deepanshu\CutOffBaba\system\core\Exceptions.php:272) C:\deepanshu\CutOffBaba\system\core\Common.php 565
ERROR - 2024-03-09 00:39:17 --> Severity: 8192 --> Creation of dynamic property Home::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:17 --> Severity: 8192 --> Creation of dynamic property Home::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:17 --> Severity: 8192 --> Creation of dynamic property Home::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:17 --> Severity: 8192 --> Creation of dynamic property Home::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:17 --> Severity: 8192 --> Creation of dynamic property Home::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:17 --> Severity: 8192 --> Creation of dynamic property Home::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:17 --> Severity: 8192 --> Creation of dynamic property Home::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:17 --> Severity: 8192 --> Creation of dynamic property Home::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:17 --> Query error: Unknown column 's.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`, `id`
FROM `tbl_college` as `c`, `tbl_course` as `cd`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:39:17 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\deepanshu\CutOffBaba\system\core\Exceptions.php:272) C:\deepanshu\CutOffBaba\system\core\Common.php 565
ERROR - 2024-03-09 00:39:59 --> Severity: 8192 --> Creation of dynamic property Home::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:59 --> Severity: 8192 --> Creation of dynamic property Home::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:59 --> Severity: 8192 --> Creation of dynamic property Home::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:59 --> Severity: 8192 --> Creation of dynamic property Home::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:59 --> Severity: 8192 --> Creation of dynamic property Home::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:59 --> Severity: 8192 --> Creation of dynamic property Home::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:59 --> Severity: 8192 --> Creation of dynamic property Home::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:59 --> Severity: 8192 --> Creation of dynamic property Home::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:39:59 --> Query error: Unknown column 's.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`, `id`
FROM `tbl_college` as `c`, `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:39:59 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\deepanshu\CutOffBaba\system\core\Exceptions.php:272) C:\deepanshu\CutOffBaba\system\core\Common.php 565
ERROR - 2024-03-09 00:41:43 --> Severity: 8192 --> Creation of dynamic property Home::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:41:43 --> Severity: 8192 --> Creation of dynamic property Home::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:41:43 --> Severity: 8192 --> Creation of dynamic property Home::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:41:43 --> Severity: 8192 --> Creation of dynamic property Home::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:41:43 --> Severity: 8192 --> Creation of dynamic property Home::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:41:43 --> Severity: 8192 --> Creation of dynamic property Home::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:41:43 --> Severity: 8192 --> Creation of dynamic property Home::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:41:43 --> Severity: 8192 --> Creation of dynamic property Home::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:41:43 --> Query error: Unknown column 's.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`
FROM `tbl_college` as `c`, `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:41:43 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\deepanshu\CutOffBaba\system\core\Exceptions.php:272) C:\deepanshu\CutOffBaba\system\core\Common.php 565
ERROR - 2024-03-09 00:42:05 --> Severity: 8192 --> Creation of dynamic property Home::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:05 --> Severity: 8192 --> Creation of dynamic property Home::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:05 --> Severity: 8192 --> Creation of dynamic property Home::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:05 --> Severity: 8192 --> Creation of dynamic property Home::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:05 --> Severity: 8192 --> Creation of dynamic property Home::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:05 --> Severity: 8192 --> Optional parameter $table declared before required parameter $column_name is implicitly treated as a required parameter C:\deepanshu\CutOffBaba\application\models\MasterModel.php 39
ERROR - 2024-03-09 00:42:05 --> Severity: 8192 --> Creation of dynamic property Home::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:05 --> Severity: 8192 --> Creation of dynamic property Home::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:05 --> Severity: 8192 --> Creation of dynamic property Home::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:05 --> Query error: Unknown column 's.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`
FROM `tbl_college` as `c`, `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:42:05 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\deepanshu\CutOffBaba\system\core\Exceptions.php:272) C:\deepanshu\CutOffBaba\system\core\Common.php 565
ERROR - 2024-03-09 00:42:51 --> Severity: 8192 --> Creation of dynamic property Home::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:51 --> Severity: 8192 --> Creation of dynamic property Home::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:51 --> Severity: 8192 --> Creation of dynamic property Home::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:51 --> Severity: 8192 --> Creation of dynamic property Home::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:51 --> Severity: 8192 --> Creation of dynamic property Home::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:51 --> Severity: 8192 --> Creation of dynamic property Home::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:51 --> Severity: 8192 --> Creation of dynamic property Home::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:51 --> Severity: 8192 --> Creation of dynamic property Home::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:42:51 --> Query error: Unknown column 's.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`
FROM `tbl_college` as `c`, `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:42:51 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\deepanshu\CutOffBaba\system\core\Exceptions.php:272) C:\deepanshu\CutOffBaba\system\core\Common.php 565
ERROR - 2024-03-09 00:45:41 --> Severity: 8192 --> Creation of dynamic property Home::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:45:41 --> Severity: 8192 --> Creation of dynamic property Home::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:45:41 --> Severity: 8192 --> Creation of dynamic property Home::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:45:41 --> Severity: 8192 --> Creation of dynamic property Home::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:45:41 --> Severity: 8192 --> Creation of dynamic property Home::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:45:41 --> Severity: 8192 --> Creation of dynamic property Home::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:45:41 --> Severity: 8192 --> Creation of dynamic property Home::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:45:41 --> Severity: 8192 --> Creation of dynamic property Home::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:45:41 --> Query error: Unknown column 's.id' in 'field list' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`
FROM `tbl_college` as `c`, `tbl_course`
WHERE `degree_type` = '2'
ERROR - 2024-03-09 00:45:41 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\deepanshu\CutOffBaba\system\core\Exceptions.php:272) C:\deepanshu\CutOffBaba\system\core\Common.php 565
ERROR - 2024-03-09 00:46:11 --> Severity: 8192 --> Creation of dynamic property Home::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:11 --> Severity: 8192 --> Creation of dynamic property Home::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:11 --> Severity: 8192 --> Creation of dynamic property Home::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:11 --> Severity: 8192 --> Creation of dynamic property Home::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:11 --> Severity: 8192 --> Creation of dynamic property Home::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:11 --> Severity: 8192 --> Creation of dynamic property Home::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:11 --> Severity: 8192 --> Creation of dynamic property Home::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:11 --> Severity: 8192 --> Creation of dynamic property Home::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:11 --> Severity: Warning --> Undefined array key "exam" C:\deepanshu\CutOffBaba\application\models\MasterModel.php 264
ERROR - 2024-03-09 00:46:11 --> Severity: Warning --> Undefined variable $query C:\deepanshu\CutOffBaba\application\models\MasterModel.php 284
ERROR - 2024-03-09 00:46:11 --> Severity: error --> Exception: Call to a member function result_array() on null C:\deepanshu\CutOffBaba\application\models\MasterModel.php 284
ERROR - 2024-03-09 00:46:11 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\deepanshu\CutOffBaba\system\core\Exceptions.php:272) C:\deepanshu\CutOffBaba\system\core\Common.php 565
ERROR - 2024-03-09 00:46:31 --> Severity: 8192 --> Creation of dynamic property Home::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:31 --> Severity: 8192 --> Creation of dynamic property Home::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:31 --> Severity: 8192 --> Creation of dynamic property Home::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:31 --> Severity: 8192 --> Creation of dynamic property Home::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:31 --> Severity: 8192 --> Creation of dynamic property Home::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:31 --> Severity: 8192 --> Creation of dynamic property Home::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:31 --> Severity: 8192 --> Creation of dynamic property Home::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:31 --> Severity: 8192 --> Creation of dynamic property Home::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 00:46:31 --> Severity: Warning --> Undefined array key "exam" C:\deepanshu\CutOffBaba\application\models\MasterModel.php 264
ERROR - 2024-03-09 00:46:38 --> Severity: Warning --> Undefined array key "exam" C:\deepanshu\CutOffBaba\application\models\MasterModel.php 264
ERROR - 2024-03-09 00:49:38 --> Query error: Column 'id' in field list is ambiguous - Invalid query: SELECT `id`, `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`
FROM `tbl_course`, `tbl_college` as `c`
WHERE `degree_type` = '3'
ERROR - 2024-03-09 00:49:38 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 249
ERROR - 2024-03-09 00:53:25 --> Query error: Column 'id' in field list is ambiguous - Invalid query: SELECT `id`, `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`
FROM `tbl_course`, `tbl_college` as `c`
WHERE `degree_type` = '3'
ERROR - 2024-03-09 00:53:25 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 248
ERROR - 2024-03-09 00:58:41 --> Severity: Warning --> Undefined array key "exam" C:\deepanshu\CutOffBaba\application\models\MasterModel.php 264
ERROR - 2024-03-09 00:58:41 --> Query error: Column 'id' in field list is ambiguous - Invalid query: SELECT `id`, `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`
FROM (`tbl_course`, `tbl_college` as `c`)
JOIN `tbl_state` as `s` ON `s`.`id` = `c`.`state`
JOIN `tbl_city` as `cit` ON `cit`.`id` = `c`.`city`
JOIN `tbl_country` as `count` ON `count`.`id` = `c`.`country`
JOIN `tbl_approval` as `a` ON `a`.`id` = `c`.`approved_by`
JOIN `tbl_ownership` as `o` ON `o`.`id` = `c`.`ownership`
WHERE FIND_IN_SET(5, c.course_offered) >0
AND `c`.`state` = '19'
AND `c`.`city` = '3'
ERROR - 2024-03-09 00:58:41 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 282
ERROR - 2024-03-09 01:02:18 --> Severity: error --> Exception: Object of class CI_Loader could not be converted to string C:\deepanshu\CutOffBaba\application\views\site\state-wise-colleges.php 243
ERROR - 2024-03-09 01:02:25 --> Severity: error --> Exception: Object of class CI_Loader could not be converted to string C:\deepanshu\CutOffBaba\application\views\site\state-wise-colleges.php 243
ERROR - 2024-03-09 01:03:00 --> Severity: error --> Exception: Object of class CI_Loader could not be converted to string C:\deepanshu\CutOffBaba\application\views\site\state-wise-colleges.php 243
ERROR - 2024-03-09 01:03:12 --> Severity: error --> Exception: Object of class CI_Loader could not be converted to string C:\deepanshu\CutOffBaba\application\views\site\state-wise-colleges.php 243
ERROR - 2024-03-09 01:03:34 --> Severity: error --> Exception: Object of class CI_Loader could not be converted to string C:\deepanshu\CutOffBaba\application\views\site\state-wise-colleges.php 243
ERROR - 2024-03-09 01:03:53 --> Severity: error --> Exception: Object of class CI_Loader could not be converted to string C:\deepanshu\CutOffBaba\application\views\site\state-wise-colleges.php 243
ERROR - 2024-03-09 01:04:11 --> Severity: error --> Exception: Object of class CI_Loader could not be converted to string C:\deepanshu\CutOffBaba\application\views\site\state-wise-colleges.php 243
ERROR - 2024-03-09 01:04:17 --> Severity: error --> Exception: Object of class CI_Loader could not be converted to string C:\deepanshu\CutOffBaba\application\views\site\state-wise-colleges.php 243
ERROR - 2024-03-09 01:04:43 --> Severity: error --> Exception: Object of class CI_Loader could not be converted to string C:\deepanshu\CutOffBaba\application\views\site\state-wise-colleges.php 243
ERROR - 2024-03-09 01:04:48 --> Severity: error --> Exception: Object of class CI_Loader could not be converted to string C:\deepanshu\CutOffBaba\application\views\site\state-wise-colleges.php 243
ERROR - 2024-03-09 01:04:51 --> Severity: error --> Exception: Object of class CI_Loader could not be converted to string C:\deepanshu\CutOffBaba\application\views\site\state-wise-colleges.php 243
ERROR - 2024-03-09 01:05:16 --> Severity: error --> Exception: Object of class CI_Loader could not be converted to string C:\deepanshu\CutOffBaba\application\views\site\state-wise-colleges.php 243
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property Home::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property Home::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property Home::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property Home::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property Home::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property Home::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property Home::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property Home::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$load is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$benchmark is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$hooks is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$config is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$log is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$utf8 is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$uri is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$exceptions is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$router is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$output is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$security is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$input is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$lang is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$db is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$session is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$upload is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$form_validation is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$email is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$pagination is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:32 --> Severity: error --> Exception: Object of class CI_Loader could not be converted to string C:\deepanshu\CutOffBaba\application\views\site\state-wise-colleges.php 243
ERROR - 2024-03-09 01:05:32 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\deepanshu\CutOffBaba\system\core\Exceptions.php:272) C:\deepanshu\CutOffBaba\system\core\Common.php 565
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property Home::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property Home::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property Home::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property Home::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property Home::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property Home::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property Home::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property Home::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$load is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$benchmark is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$hooks is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$config is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$log is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$utf8 is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$uri is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$exceptions is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$router is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$output is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$security is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$input is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$lang is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$db is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$session is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$upload is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$form_validation is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$email is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$pagination is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:05:57 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
DEBUG - 2024-03-09 01:05:57 --> Total execution time: 0.2884
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property Home::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property Home::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property Home::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property Home::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property Home::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property Home::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property Home::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property Home::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 359
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$load is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$benchmark is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$hooks is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$config is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$log is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$utf8 is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$uri is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$exceptions is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$router is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$output is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$security is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$input is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$lang is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$db is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$session is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$upload is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$form_validation is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$email is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$pagination is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$site is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$review is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$category is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$company is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$blog is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$master is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$course is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
ERROR - 2024-03-09 01:06:05 --> Severity: 8192 --> Creation of dynamic property CI_Loader::$slider is deprecated C:\deepanshu\CutOffBaba\system\core\Loader.php 932
DEBUG - 2024-03-09 01:06:05 --> Total execution time: 0.1947
DEBUG - 2024-03-09 01:06:10 --> Total execution time: 0.1505
DEBUG - 2024-03-09 01:07:36 --> Total execution time: 0.1489
DEBUG - 2024-03-09 01:07:40 --> Total execution time: 0.0223
DEBUG - 2024-03-09 01:08:00 --> Total execution time: 0.0169
DEBUG - 2024-03-09 01:08:14 --> Total execution time: 0.0376
DEBUG - 2024-03-09 01:09:10 --> Total execution time: 0.0387
DEBUG - 2024-03-09 01:09:13 --> Total execution time: 0.0375
DEBUG - 2024-03-09 01:09:18 --> Total execution time: 0.0231
DEBUG - 2024-03-09 01:34:27 --> Total execution time: 0.0655
DEBUG - 2024-03-09 01:34:34 --> Total execution time: 0.0408
DEBUG - 2024-03-09 01:34:38 --> Total execution time: 0.0334
DEBUG - 2024-03-09 01:34:40 --> Total execution time: 0.0323
DEBUG - 2024-03-09 01:34:43 --> Total execution time: 0.0357
DEBUG - 2024-03-09 01:34:46 --> Total execution time: 0.0335
DEBUG - 2024-03-09 01:34:50 --> Total execution time: 0.0272
ERROR - 2024-03-09 01:34:55 --> Query error: Unknown column 'c.facility' in 'where clause' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`
FROM `tbl_college` as `c`
JOIN `tbl_state` as `s` ON `s`.`id` = `c`.`state`
JOIN `tbl_city` as `cit` ON `cit`.`id` = `c`.`city`
JOIN `tbl_country` as `count` ON `count`.`id` = `c`.`country`
JOIN `tbl_approval` as `a` ON `a`.`id` = `c`.`approved_by`
JOIN `tbl_ownership` as `o` ON `o`.`id` = `c`.`ownership`
WHERE FIND_IN_SET(5, c.course_offered) >0
OR FIND_IN_SET(5, c.course_offered) >0
OR FIND_IN_SET(8, c.course_offered) >0
OR FIND_IN_SET(9, c.course_offered) >0
OR FIND_IN_SET(10, c.course_offered) >0
OR FIND_IN_SET(11, c.course_offered) >0
AND `c`.`state` = '19'
AND `c`.`city` = '3'
AND `c`.`ownership` = '4'
AND `c`.`facility` = '11'
ERROR - 2024-03-09 01:34:55 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 294
ERROR - 2024-03-09 01:34:56 --> Query error: Unknown column 'c.facility' in 'where clause' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`
FROM `tbl_college` as `c`
JOIN `tbl_state` as `s` ON `s`.`id` = `c`.`state`
JOIN `tbl_city` as `cit` ON `cit`.`id` = `c`.`city`
JOIN `tbl_country` as `count` ON `count`.`id` = `c`.`country`
JOIN `tbl_approval` as `a` ON `a`.`id` = `c`.`approved_by`
JOIN `tbl_ownership` as `o` ON `o`.`id` = `c`.`ownership`
WHERE FIND_IN_SET(5, c.course_offered) >0
OR FIND_IN_SET(5, c.course_offered) >0
OR FIND_IN_SET(8, c.course_offered) >0
OR FIND_IN_SET(9, c.course_offered) >0
OR FIND_IN_SET(10, c.course_offered) >0
OR FIND_IN_SET(11, c.course_offered) >0
AND `c`.`state` = '19'
AND `c`.`city` = '3'
AND `c`.`ownership` = '4'
AND `c`.`facility` = '11'
ERROR - 2024-03-09 01:34:56 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 294
ERROR - 2024-03-09 01:34:56 --> Query error: Unknown column 'c.facility' in 'where clause' - Invalid query: SELECT `c`.`id` as `college_id`, `c`.`full_name`, `c`.`slug`, `c`.`short_description`, `c`.`popular_name_one`, `c`.`popular_name_two`, `c`.`establishment`, `c`.`gender_accepted`, `c`.`course_offered`, `c`.`affiliated_by`, `c`.`university_name`, `c`.`approved_by`, `c`.`college_logo`, `c`.`college_banner`, `c`.`prospectus_file`, `c`.`website`, `c`.`email`, `c`.`contact_one`, `c`.`contact_two`, `c`.`contact_three`, `c`.`nodal_officer_name`, `c`.`nodal_officer_no`, `c`.`keywords`, `c`.`tags`, `s`.`id` as `state_id`, `s`.`name` as `state_name`, `cit`.`id` as `city_id`, `cit`.`city` as `city_name`, `count`.`countryCode`, `a`.`id` as `approval_id`, `a`.`approval`, `o`.`id` as `ownership_id`, `o`.`title` as `ownership_title`
FROM `tbl_college` as `c`
JOIN `tbl_state` as `s` ON `s`.`id` = `c`.`state`
JOIN `tbl_city` as `cit` ON `cit`.`id` = `c`.`city`
JOIN `tbl_country` as `count` ON `count`.`id` = `c`.`country`
JOIN `tbl_approval` as `a` ON `a`.`id` = `c`.`approved_by`
JOIN `tbl_ownership` as `o` ON `o`.`id` = `c`.`ownership`
WHERE FIND_IN_SET(5, c.course_offered) >0
OR FIND_IN_SET(5, c.course_offered) >0
OR FIND_IN_SET(8, c.course_offered) >0
OR FIND_IN_SET(9, c.course_offered) >0
OR FIND_IN_SET(10, c.course_offered) >0
OR FIND_IN_SET(11, c.course_offered) >0
AND `c`.`state` = '19'
AND `c`.`city` = '3'
AND `c`.`ownership` = '4'
AND `c`.`facility` = '11'
ERROR - 2024-03-09 01:34:56 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 294
DEBUG - 2024-03-09 01:35:15 --> Total execution time: 0.0345
DEBUG - 2024-03-09 01:36:33 --> Total execution time: 0.0371
DEBUG - 2024-03-09 01:48:46 --> Total execution time: 0.0147
DEBUG - 2024-03-09 01:48:48 --> Total execution time: 0.0272
DEBUG - 2024-03-09 01:48:50 --> Total execution time: 0.0287
ERROR - 2024-03-09 01:48:52 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
ERROR - 2024-03-09 01:48:52 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
ERROR - 2024-03-09 01:48:52 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
DEBUG - 2024-03-09 01:48:52 --> Total execution time: 0.0312
ERROR - 2024-03-09 01:48:57 --> Severity: Warning --> Undefined variable $singleCollege C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 217
ERROR - 2024-03-09 01:48:57 --> Severity: Warning --> Trying to access array offset on value of type null C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 217
DEBUG - 2024-03-09 01:48:57 --> Total execution time: 0.0540
ERROR - 2024-03-09 01:49:41 --> Severity: Warning --> Undefined variable $singleCollege C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 217
ERROR - 2024-03-09 01:49:41 --> Severity: Warning --> Trying to access array offset on value of type null C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 217
DEBUG - 2024-03-09 01:49:41 --> Total execution time: 0.0192
ERROR - 2024-03-09 01:51:04 --> Severity: Warning --> Undefined variable $singleCollege C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 217
ERROR - 2024-03-09 01:51:04 --> Severity: Warning --> Trying to access array offset on value of type null C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 217
ERROR - 2024-03-09 01:51:04 --> Query error: Table 'cutoff_baba.tbl_facility' doesn't exist - Invalid query: SELECT *
FROM `tbl_facility`
ERROR - 2024-03-09 01:51:04 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\deepanshu\CutOffBaba\application\models\MasterModel.php 36
ERROR - 2024-03-09 01:52:19 --> Severity: Warning --> Undefined array key "exam" C:\deepanshu\CutOffBaba\application\models\MasterModel.php 249
DEBUG - 2024-03-09 01:52:19 --> Total execution time: 0.1638
ERROR - 2024-03-09 01:52:21 --> Severity: Warning --> Undefined variable $singleCollege C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 217
ERROR - 2024-03-09 01:52:21 --> Severity: Warning --> Trying to access array offset on value of type null C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 217
DEBUG - 2024-03-09 01:52:21 --> Total execution time: 0.0453
ERROR - 2024-03-09 01:54:15 --> Severity: Warning --> Undefined variable $singleCollege C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 217
ERROR - 2024-03-09 01:54:15 --> Severity: Warning --> Trying to access array offset on value of type null C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 217
DEBUG - 2024-03-09 01:54:15 --> Total execution time: 0.0446
DEBUG - 2024-03-09 01:54:58 --> Total execution time: 0.0238
DEBUG - 2024-03-09 01:55:04 --> Total execution time: 0.0350
DEBUG - 2024-03-09 01:55:05 --> Total execution time: 0.0331
DEBUG - 2024-03-09 01:55:06 --> Total execution time: 0.0316
DEBUG - 2024-03-09 01:55:13 --> Total execution time: 0.0271
DEBUG - 2024-03-09 01:55:15 --> Total execution time: 0.0474
DEBUG - 2024-03-09 01:55:19 --> Total execution time: 0.0190
DEBUG - 2024-03-09 01:55:21 --> Total execution time: 0.0148
DEBUG - 2024-03-09 01:55:23 --> Total execution time: 0.0440
DEBUG - 2024-03-09 01:55:47 --> Total execution time: 0.0287
DEBUG - 2024-03-09 01:55:50 --> Total execution time: 0.0202
DEBUG - 2024-03-09 01:56:25 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:56:25 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:56:25 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:56:25 --> The filetype you are attempting to upload is not allowed.
DEBUG - 2024-03-09 01:56:25 --> Total execution time: 0.0331
DEBUG - 2024-03-09 01:57:02 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:57:02 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:57:02 --> Upload class already loaded. Second attempt ignored.
ERROR - 2024-03-09 01:57:02 --> Query error: Unknown column 'short_name' in 'field list' - Invalid query: INSERT INTO `tbl_college` (`college_logo`, `college_banner`, `prospectus_file`, `full_name`, `short_name`, `slug`, `short_description`, `popular_name_one`, `popular_name_two`, `establishment`, `stream`, `gender_accepted`, `course_offered`, `facility`, `country`, `state`, `city`, `sub_district`, `affiliated_by`, `university_name`, `approved_by`, `ownership`, `website`, `email`, `contact_one`, `contact_two`, `contact_three`, `nodal_officer_name`, `nodal_officer_no`, `keywords`, `tags`, `added_by`, `status`) VALUES ('35217610e2f3eb4bb0e5092b59c7b04d.png', '5ab7ac77c0663145e78ee18e2e228e3c.png', 'a4b3fa0812b9bd06794d81665c8a0041.pdf', 'gfdhfghfgh', 'fgdhdfhfgh', 'gfdhfghfgh-b427b3a32a6643330852c3172a39c6d273533a48', '<p>fghdgfhdfghfhfgh</p>\r\n', 'gfhdfh', 'fgdhfgh', '4355', '3', '3,5', '3,5', '5,7,10', '105', '23', '520', '', NULL, 'hdhdgfhfhgf', '5|8', '6', 'www.cdfgdg.com', 'annaiyyer@mail.com', '567567567567', '567675756767', '65756756756', NULL, '', 'gdfsgsdgdfghdhfgh', 'fghfghghfghfdghfghdfghfhfghf', '5', 1)
DEBUG - 2024-03-09 01:57:02 --> Total execution time: 0.0361
DEBUG - 2024-03-09 01:57:10 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:57:10 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:57:10 --> Upload class already loaded. Second attempt ignored.
ERROR - 2024-03-09 01:57:10 --> Query error: Unknown column 'short_name' in 'field list' - Invalid query: INSERT INTO `tbl_college` (`college_logo`, `college_banner`, `prospectus_file`, `full_name`, `short_name`, `slug`, `short_description`, `popular_name_one`, `popular_name_two`, `establishment`, `stream`, `gender_accepted`, `course_offered`, `facility`, `country`, `state`, `city`, `sub_district`, `affiliated_by`, `university_name`, `approved_by`, `ownership`, `website`, `email`, `contact_one`, `contact_two`, `contact_three`, `nodal_officer_name`, `nodal_officer_no`, `keywords`, `tags`, `added_by`, `status`) VALUES ('f97508d71de27bd5eb707487f6889fc1.png', '131dacb7e19948e5933624b34e951233.png', 'c6b055d4e57d848384400611f50d8912.pdf', 'gfdhfghfgh', 'fgdhdfhfgh', 'gfdhfghfgh-b427b3a32a6643330852c3172a39c6d273533a48', '<p>fghdgfhdfghfhfgh</p>\r\n', 'gfhdfh', 'fgdhfgh', '4355', '3', '3,5', '3,5', '5,7,10', '105', '23', '520', '', NULL, 'hdhdgfhfhgf', '5|8', '6', 'www.cdfgdg.com', 'annaiyyer@mail.com', '567567567567', '567675756767', '65756756756', NULL, '', 'gdfsgsdgdfghdhfgh', 'fghfghghfghfdghfghdfghfhfghf', '5', 1)
DEBUG - 2024-03-09 01:57:10 --> Total execution time: 0.0479
DEBUG - 2024-03-09 01:57:42 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:57:42 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:57:42 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:58:06 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:58:06 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:58:06 --> Upload class already loaded. Second attempt ignored.
ERROR - 2024-03-09 01:58:06 --> Query error: Unknown column 'short_name' in 'field list' - Invalid query: INSERT INTO `tbl_college` (`college_logo`, `college_banner`, `prospectus_file`, `full_name`, `short_name`, `slug`, `short_description`, `popular_name_one`, `popular_name_two`, `establishment`, `stream`, `gender_accepted`, `course_offered`, `facility`, `country`, `state`, `city`, `sub_district`, `affiliated_by`, `university_name`, `approved_by`, `ownership`, `website`, `email`, `contact_one`, `contact_two`, `contact_three`, `nodal_officer_name`, `nodal_officer_no`, `keywords`, `tags`, `added_by`, `status`) VALUES ('2c12d2530b1ce624201b6f882bf927f8.png', 'd52ee7d8c7e3647fbd8e4fe0503926c5.png', 'a961889e25e09ca53067bfcf42a7f536.pdf', 'gfdhfghfgh', 'fgdhdfhfgh', 'gfdhfghfgh-b427b3a32a6643330852c3172a39c6d273533a48', '<p>fghdgfhdfghfhfgh</p>\r\n', 'gfhdfh', 'fgdhfgh', '4355', '3', '3,5', '3,5', '5,7,10', '105', '23', '520', '', NULL, 'hdhdgfhfhgf', '5,8', '6', 'www.cdfgdg.com', 'annaiyyer@mail.com', '567567567567', '567675756767', '65756756756', NULL, '', 'gdfsgsdgdfghdhfgh', 'fghfghghfghfdghfghdfghfhfghf', '5', 1)
DEBUG - 2024-03-09 01:58:14 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:58:14 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:58:14 --> Upload class already loaded. Second attempt ignored.
ERROR - 2024-03-09 01:58:14 --> Query error: Unknown column 'short_name' in 'field list' - Invalid query: INSERT INTO `tbl_college` (`college_logo`, `college_banner`, `prospectus_file`, `full_name`, `short_name`, `slug`, `short_description`, `popular_name_one`, `popular_name_two`, `establishment`, `stream`, `gender_accepted`, `course_offered`, `facility`, `country`, `state`, `city`, `sub_district`, `affiliated_by`, `university_name`, `approved_by`, `ownership`, `website`, `email`, `contact_one`, `contact_two`, `contact_three`, `nodal_officer_name`, `nodal_officer_no`, `keywords`, `tags`, `added_by`, `status`) VALUES ('19a0d46883e5b8c103bacb2753b2afed.png', '63f308721548b9c096e372c9f06bd503.png', 'b8cb4758a19eec9b9b7646f20e38e1c1.pdf', 'gfdhfghfgh', 'fgdhdfhfgh', 'gfdhfghfgh-b427b3a32a6643330852c3172a39c6d273533a48', '<p>fghdgfhdfghfhfgh</p>\r\n', 'gfhdfh', 'fgdhfgh', '4355', '3', '3,5', '3,5', '5,7,10', '105', '23', '520', '', NULL, 'hdhdgfhfhgf', '5,8', '6', 'www.cdfgdg.com', 'annaiyyer@mail.com', '567567567567', '567675756767', '65756756756', NULL, '', 'gdfsgsdgdfghdhfgh', 'fghfghghfghfdghfghdfghfhfghf', '5', 1)
DEBUG - 2024-03-09 01:59:19 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:59:19 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:59:19 --> Upload class already loaded. Second attempt ignored.
ERROR - 2024-03-09 01:59:19 --> Query error: Unknown column 'short_name' in 'field list' - Invalid query: INSERT INTO `tbl_college` (`college_logo`, `college_banner`, `prospectus_file`, `full_name`, `short_name`, `slug`, `short_description`, `popular_name_one`, `popular_name_two`, `establishment`, `stream`, `gender_accepted`, `course_offered`, `facility`, `country`, `state`, `city`, `sub_district`, `affiliated_by`, `university_name`, `approved_by`, `ownership`, `website`, `email`, `contact_one`, `contact_two`, `contact_three`, `nodal_officer_name`, `nodal_officer_no`, `keywords`, `tags`, `added_by`, `status`) VALUES ('cefb90fc0533380a178ca34b4955a06f.png', '7f227bd060ce64d2d248e747a7cecf08.png', '652aef2bb1af2b3cc6fc0006a50196a4.pdf', 'gfdhfghfgh', 'fgdhdfhfgh', 'gfdhfghfgh-b427b3a32a6643330852c3172a39c6d273533a48', '<p>fghdgfhdfghfhfgh</p>\r\n', 'gfhdfh', 'fgdhfgh', '4355', '3', '3,5', '3,5', '5,7,10', '105', '23', '520', '', NULL, 'hdhdgfhfhgf', '5,8', '6', 'www.cdfgdg.com', 'annaiyyer@mail.com', '567567567567', '567675756767', '65756756756', NULL, '', 'gdfsgsdgdfghdhfgh', 'fghfghghfghfdghfghdfghfhfghf', '5', 1)
DEBUG - 2024-03-09 01:59:26 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:59:26 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:59:26 --> Upload class already loaded. Second attempt ignored.
ERROR - 2024-03-09 01:59:27 --> Query error: Unknown column 'short_name' in 'field list' - Invalid query: INSERT INTO `tbl_college` (`college_logo`, `college_banner`, `prospectus_file`, `full_name`, `short_name`, `slug`, `short_description`, `popular_name_one`, `popular_name_two`, `establishment`, `stream`, `gender_accepted`, `course_offered`, `facility`, `country`, `state`, `city`, `sub_district`, `affiliated_by`, `university_name`, `approved_by`, `ownership`, `website`, `email`, `contact_one`, `contact_two`, `contact_three`, `nodal_officer_name`, `nodal_officer_no`, `keywords`, `tags`, `added_by`, `status`) VALUES ('64af9086fbfecbb42f6c973260c1a55c.png', 'ccab45f7f06eb645af05d41b4eba979b.png', 'ddd497c38e0b8ebefb333164abab1bdf.pdf', 'gfdhfghfgh', 'fgdhdfhfgh', 'gfdhfghfgh-b427b3a32a6643330852c3172a39c6d273533a48', '<p>fghdgfhdfghfhfgh</p>\r\n', 'gfhdfh', 'fgdhfgh', '4355', '3', '3,5', '3,5', '5,7,10', '105', '23', '520', '', NULL, 'hdhdgfhfhgf', '5,8', '6', 'www.cdfgdg.com', 'annaiyyer@mail.com', '567567567567', '567675756767', '65756756756', NULL, '', 'gdfsgsdgdfghdhfgh', 'fghfghghfghfdghfghdfghfhfghf', '5', 1)
DEBUG - 2024-03-09 01:59:27 --> Total execution time: 0.0750
DEBUG - 2024-03-09 01:59:35 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:59:35 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 01:59:35 --> Upload class already loaded. Second attempt ignored.
ERROR - 2024-03-09 01:59:35 --> Query error: Unknown column 'short_name' in 'field list' - Invalid query: INSERT INTO `tbl_college` (`college_logo`, `college_banner`, `prospectus_file`, `full_name`, `short_name`, `slug`, `short_description`, `popular_name_one`, `popular_name_two`, `establishment`, `stream`, `gender_accepted`, `course_offered`, `facility`, `country`, `state`, `city`, `sub_district`, `affiliated_by`, `university_name`, `approved_by`, `ownership`, `website`, `email`, `contact_one`, `contact_two`, `contact_three`, `nodal_officer_name`, `nodal_officer_no`, `keywords`, `tags`, `added_by`, `status`) VALUES ('d942a8510f45eff0ba17bd3c8e4433c8.png', '55800372ed10c2b1b4c0c6d72415190d.png', 'a57776f820051bb8921fc8344a30cc0b.pdf', 'gfdhfghfgh', 'fgdhdfhfgh', 'gfdhfghfgh-b427b3a32a6643330852c3172a39c6d273533a48', '<p>fghdgfhdfghfhfgh</p>\r\n', 'gfhdfh', 'fgdhfgh', '4355', '3', '3,5', '3,5', '5,7,10', '105', '23', '520', '', NULL, 'hdhdgfhfhgf', '5,8', '6', 'www.cdfgdg.com', 'annaiyyer@mail.com', '567567567567', '567675756767', '65756756756', NULL, '', 'gdfsgsdgdfghdhfgh', 'fghfghghfghfdghfghdfghfhfghf', '5', 1)
DEBUG - 2024-03-09 02:00:08 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:00:08 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:00:08 --> Upload class already loaded. Second attempt ignored.
ERROR - 2024-03-09 02:00:08 --> Query error: Unknown column 'short_name' in 'field list' - Invalid query: INSERT INTO `tbl_college` (`college_logo`, `college_banner`, `prospectus_file`, `full_name`, `short_name`, `slug`, `short_description`, `popular_name_one`, `popular_name_two`, `establishment`, `stream`, `gender_accepted`, `course_offered`, `facility`, `country`, `state`, `city`, `sub_district`, `affiliated_by`, `university_name`, `approved_by`, `ownership`, `website`, `email`, `contact_one`, `contact_two`, `contact_three`, `nodal_officer_name`, `nodal_officer_no`, `keywords`, `tags`, `added_by`, `status`) VALUES ('db85e56f8aa70de0674ca6d211412c4b.png', 'f37817bf46b9ba31985abff460dac342.png', '313a7a824c1575c041368662f7b084f6.pdf', 'gfdhfghfgh', 'fgdhdfhfgh', 'gfdhfghfgh-b427b3a32a6643330852c3172a39c6d273533a48', '<p>fghdgfhdfghfhfgh</p>\r\n', 'gfhdfh', 'fgdhfgh', '4355', '3', '3,5', '3,5', '5,7,10', '105', '23', '520', '', NULL, 'hdhdgfhfhgf', '5,8', '6', 'www.cdfgdg.com', 'annaiyyer@mail.com', '567567567567', '567675756767', '65756756756', NULL, '', 'gdfsgsdgdfghdhfgh', 'fghfghghfghfdghfghdfghfhfghf', '5', 1)
DEBUG - 2024-03-09 02:00:08 --> Total execution time: 0.0394
DEBUG - 2024-03-09 02:00:28 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:00:28 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:00:28 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:00:52 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:00:52 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:00:52 --> Upload class already loaded. Second attempt ignored.
ERROR - 2024-03-09 02:00:52 --> Query error: Unknown column 'short_name' in 'field list' - Invalid query: INSERT INTO `tbl_college` (`college_logo`, `college_banner`, `prospectus_file`, `full_name`, `short_name`, `slug`, `short_description`, `popular_name_one`, `popular_name_two`, `establishment`, `stream`, `gender_accepted`, `course_offered`, `facility`, `country`, `state`, `city`, `sub_district`, `affiliated_by`, `university_name`, `approved_by`, `ownership`, `website`, `email`, `contact_one`, `contact_two`, `contact_three`, `nodal_officer_name`, `nodal_officer_no`, `keywords`, `tags`, `added_by`, `status`) VALUES ('22dc8a1ed50af753df5d421b3589a829.png', 'b092035ea4b8969cd9368424872ccb0c.png', '00b62fac62a3877ca65cc4f2efb44fa6.pdf', 'gfdhfghfgh', 'fgdhdfhfgh', 'gfdhfghfgh-b427b3a32a6643330852c3172a39c6d273533a48', '<p>fghdgfhdfghfhfgh</p>\r\n', 'gfhdfh', 'fgdhfgh', '4355', '3', '3,5', '3,5', '5,7,10', '105', '23', '520', '', NULL, 'hdhdgfhfhgf', '5,8', '6', 'www.cdfgdg.com', 'annaiyyer@mail.com', '567567567567', '567675756767', '65756756756', NULL, '', 'gdfsgsdgdfghdhfgh', 'fghfghghfghfdghfghdfghfhfghf', '5', 1)
DEBUG - 2024-03-09 02:01:03 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:01:03 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:01:03 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:01:18 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:01:18 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:01:18 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:02:57 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:02:57 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:02:57 --> Upload class already loaded. Second attempt ignored.
DEBUG - 2024-03-09 02:03:18 --> Total execution time: 0.0206
DEBUG - 2024-03-09 02:03:27 --> Total execution time: 0.0196
DEBUG - 2024-03-09 02:03:30 --> Total execution time: 0.0216
DEBUG - 2024-03-09 16:43:09 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:43:09 --> No URI present. Default controller set.
DEBUG - 2024-03-09 16:43:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:43:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 22:13:09 --> Total execution time: 0.0817
DEBUG - 2024-03-09 16:43:09 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:43:09 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-03-09 16:43:09 --> 404 Page Not Found: Faviconico/index
DEBUG - 2024-03-09 16:43:12 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:43:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:43:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 22:13:12 --> Total execution time: 0.0252
DEBUG - 2024-03-09 16:43:18 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:43:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:43:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 16:43:18 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:43:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:43:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 22:13:18 --> Total execution time: 0.0162
DEBUG - 2024-03-09 16:43:29 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:43:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:43:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 22:13:29 --> Total execution time: 0.0253
DEBUG - 2024-03-09 16:43:32 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:43:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:43:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 22:13:32 --> Total execution time: 0.0399
DEBUG - 2024-03-09 16:43:38 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:43:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:43:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2024-03-09 22:13:38 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
ERROR - 2024-03-09 22:13:38 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
ERROR - 2024-03-09 22:13:38 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
DEBUG - 2024-03-09 22:13:38 --> Total execution time: 0.0467
DEBUG - 2024-03-09 16:43:38 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:43:38 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-03-09 16:43:38 --> 404 Page Not Found: Assets/uploads
DEBUG - 2024-03-09 16:43:40 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:43:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:43:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2024-03-09 22:13:40 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
ERROR - 2024-03-09 22:13:40 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
ERROR - 2024-03-09 22:13:40 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
DEBUG - 2024-03-09 22:13:40 --> Total execution time: 0.0164
DEBUG - 2024-03-09 16:43:41 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:43:41 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-03-09 16:43:41 --> 404 Page Not Found: Assets/uploads
DEBUG - 2024-03-09 16:44:27 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:44:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:44:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2024-03-09 22:14:27 --> Severity: Warning --> Undefined array key "short_name" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 60
ERROR - 2024-03-09 22:14:27 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:14:27 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:14:27 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:14:27 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:14:27 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:14:27 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:14:27 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:14:27 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:14:27 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:14:27 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:14:27 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:14:27 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:14:27 --> Severity: Warning --> Undefined array key "sub_district" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 203
DEBUG - 2024-03-09 22:14:27 --> Total execution time: 0.0453
DEBUG - 2024-03-09 16:44:29 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:44:29 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-03-09 16:44:29 --> 404 Page Not Found: admin/Get-course/index
DEBUG - 2024-03-09 16:44:31 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:44:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:44:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 22:14:31 --> Total execution time: 0.0144
DEBUG - 2024-03-09 16:44:33 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:44:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:44:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 22:14:33 --> Total execution time: 0.0355
DEBUG - 2024-03-09 16:45:02 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:45:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:45:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2024-03-09 22:15:02 --> Query error: Unknown column 'short_name' in 'field list' - Invalid query: UPDATE `tbl_college` SET `full_name` = 'College One', `short_name` = '', `slug` = 'college-one-6604730891acb75920a08e7b4ab5f9f89cc059a3', `short_description` = '<p>sdfadsfdsfadsf</p>\r\n', `popular_name_one` = 'adsfasdf', `popular_name_two` = 'gdfsgdfgdfg', `establishment` = '2024-01-20', `stream` = '3', `gender_accepted` = '3,4', `course_offered` = '', `facility` = '', `country` = '105', `state` = '19', `city` = '446', `sub_district` = '', `affiliated_by` = NULL, `university_name` = 'sdafsdfdsfsdff', `approved_by` = '', `ownership` = '4', `website` = 'https://www.deepanshumishra.com', `email` = 'mdeepanshu205@gmail.com', `contact_one` = '646446456', `contact_two` = '4564', `contact_three` = '43534534543', `nodal_officer_name` = '', `nodal_officer_no` = '453535453', `keywords` = '', `tags` = 'fsdfsafdsf, adsfdsf, adsfsdf, sadfasdf, asdfasdf', `status` = 1
WHERE `id` = '2'
DEBUG - 2024-03-09 22:15:02 --> Total execution time: 0.0211
DEBUG - 2024-03-09 16:45:04 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:45:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:45:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2024-03-09 22:15:04 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
ERROR - 2024-03-09 22:15:04 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
ERROR - 2024-03-09 22:15:04 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
DEBUG - 2024-03-09 22:15:04 --> Total execution time: 0.0281
DEBUG - 2024-03-09 16:45:04 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:45:04 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-03-09 16:45:04 --> 404 Page Not Found: Assets/uploads
DEBUG - 2024-03-09 16:45:06 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:45:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:45:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2024-03-09 22:15:06 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
ERROR - 2024-03-09 22:15:06 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
ERROR - 2024-03-09 22:15:06 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
DEBUG - 2024-03-09 22:15:06 --> Total execution time: 0.0326
DEBUG - 2024-03-09 16:45:06 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:45:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-03-09 16:45:06 --> 404 Page Not Found: Assets/uploads
DEBUG - 2024-03-09 16:45:08 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:45:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:45:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2024-03-09 22:15:08 --> Severity: Warning --> Undefined array key "short_name" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 60
ERROR - 2024-03-09 22:15:08 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:15:08 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:15:08 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:15:08 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:15:08 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:15:08 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:15:08 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:15:08 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:15:08 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:15:08 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:15:08 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:15:08 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:15:08 --> Severity: Warning --> Undefined array key "sub_district" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 203
DEBUG - 2024-03-09 22:15:08 --> Total execution time: 0.0297
DEBUG - 2024-03-09 16:46:02 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:46:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:46:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2024-03-09 22:16:02 --> Severity: Warning --> Undefined array key "short_name" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 60
ERROR - 2024-03-09 22:16:02 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:16:02 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:16:02 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:16:02 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:16:02 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:16:02 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:16:02 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:16:02 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:16:02 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:16:02 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:16:02 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:16:02 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:16:02 --> Severity: Warning --> Undefined array key "sub_district" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 203
DEBUG - 2024-03-09 22:16:02 --> Total execution time: 0.0199
DEBUG - 2024-03-09 16:46:12 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:46:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:46:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 16:46:12 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:46:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:46:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 22:16:12 --> Total execution time: 0.0168
DEBUG - 2024-03-09 16:46:12 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:46:12 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-03-09 16:46:12 --> 404 Page Not Found: Faviconico/index
DEBUG - 2024-03-09 16:46:14 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:46:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:46:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 22:16:14 --> Total execution time: 0.0186
DEBUG - 2024-03-09 16:46:16 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:46:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:46:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 22:16:16 --> Total execution time: 0.0328
DEBUG - 2024-03-09 16:46:18 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:46:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:46:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2024-03-09 22:16:18 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
ERROR - 2024-03-09 22:16:18 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
ERROR - 2024-03-09 22:16:18 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
DEBUG - 2024-03-09 22:16:18 --> Total execution time: 0.0333
DEBUG - 2024-03-09 16:46:18 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:46:18 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-03-09 16:46:18 --> 404 Page Not Found: Assets/uploads
DEBUG - 2024-03-09 16:46:19 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:46:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:46:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2024-03-09 22:16:19 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
ERROR - 2024-03-09 22:16:19 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
ERROR - 2024-03-09 22:16:19 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\list.php 49
DEBUG - 2024-03-09 22:16:19 --> Total execution time: 0.0133
DEBUG - 2024-03-09 16:46:19 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:46:19 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-03-09 16:46:19 --> 404 Page Not Found: Assets/uploads
DEBUG - 2024-03-09 16:47:40 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:47:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:47:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2024-03-09 22:17:40 --> Severity: Warning --> Undefined array key "short_name" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 60
ERROR - 2024-03-09 22:17:40 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:40 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:40 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:40 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:40 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:40 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:40 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:40 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:40 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:40 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:40 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:40 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:40 --> Severity: Warning --> Undefined array key "sub_district" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 203
DEBUG - 2024-03-09 22:17:40 --> Total execution time: 0.0395
DEBUG - 2024-03-09 16:47:43 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:47:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:47:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2024-03-09 22:17:43 --> Severity: Warning --> Undefined array key "short_name" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 60
ERROR - 2024-03-09 22:17:43 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:43 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:43 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:43 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:43 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:43 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:43 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:43 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:43 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:43 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:43 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:43 --> Severity: Warning --> Undefined array key "stream" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 120
ERROR - 2024-03-09 22:17:43 --> Severity: Warning --> Undefined array key "sub_district" C:\deepanshu\CutOffBaba\application\views\admin\college\add-edit.php 203
DEBUG - 2024-03-09 22:17:43 --> Total execution time: 0.0239
DEBUG - 2024-03-09 16:47:46 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:47:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:47:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 16:47:46 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:47:46 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-03-09 16:47:46 --> 404 Page Not Found: Faviconico/index
DEBUG - 2024-03-09 16:47:46 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:47:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:47:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 16:47:46 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:47:46 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-03-09 16:47:46 --> 404 Page Not Found: Faviconico/index
DEBUG - 2024-03-09 16:48:25 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:48:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:48:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 16:48:25 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:48:25 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-03-09 16:48:25 --> 404 Page Not Found: Faviconico/index
DEBUG - 2024-03-09 16:48:31 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:48:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-03-09 16:48:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-03-09 22:18:31 --> Total execution time: 0.0195
DEBUG - 2024-03-09 16:48:31 --> UTF-8 Support Enabled
DEBUG - 2024-03-09 16:48:31 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-03-09 16:48:31 --> 404 Page Not Found: Assets/uploads
