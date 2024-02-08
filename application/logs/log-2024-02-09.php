<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

DEBUG - 2024-02-09 00:00:03 --> Total execution time: 0.0258
DEBUG - 2024-02-09 00:00:28 --> Total execution time: 0.0195
DEBUG - 2024-02-09 00:00:30 --> Total execution time: 0.0374
DEBUG - 2024-02-09 00:00:31 --> Total execution time: 0.0297
DEBUG - 2024-02-09 00:00:31 --> Total execution time: 0.0288
DEBUG - 2024-02-09 00:00:36 --> Total execution time: 0.0164
DEBUG - 2024-02-09 00:00:37 --> Total execution time: 0.0305
DEBUG - 2024-02-09 00:00:38 --> Total execution time: 0.0140
DEBUG - 2024-02-09 00:00:38 --> Total execution time: 0.0187
DEBUG - 2024-02-09 00:00:38 --> Total execution time: 0.0138
DEBUG - 2024-02-09 00:00:48 --> Total execution time: 0.0174
DEBUG - 2024-02-09 00:00:49 --> Total execution time: 0.0143
DEBUG - 2024-02-09 00:01:05 --> Total execution time: 0.0167
DEBUG - 2024-02-09 00:01:08 --> Total execution time: 0.0233
DEBUG - 2024-02-09 00:01:27 --> Total execution time: 0.0201
DEBUG - 2024-02-09 00:01:28 --> Total execution time: 0.0393
DEBUG - 2024-02-09 00:01:43 --> Total execution time: 0.0227
DEBUG - 2024-02-09 00:01:44 --> Total execution time: 0.0394
DEBUG - 2024-02-09 00:02:13 --> Total execution time: 0.0273
DEBUG - 2024-02-09 00:02:30 --> Total execution time: 0.0507
ERROR - 2024-02-09 00:02:47 --> Severity: Notice --> Undefined property: Authenticate::$us C:\deepanshu\CutOffBaba\application\controllers\SmallScreen\Authenticate.php 57
ERROR - 2024-02-09 00:02:48 --> Severity: error --> Exception: Call to a member function insert() on null C:\deepanshu\CutOffBaba\application\controllers\SmallScreen\Authenticate.php 57
ERROR - 2024-02-09 00:03:09 --> Query error: Unknown column 'state' in 'field list' - Invalid query: INSERT INTO `tbl_users` (`name`, `email`, `mobile`, `password`, `user_type`, `state`, `status`, `created_at`) VALUES ('Deepanshu Mishra', 'mishra100@gmail.com', NULL, '845db344c37ba8e692b6fa190265424ab8622aa8', 1, '12', 0, '2024-02-09 00:03:09')
ERROR - 2024-02-09 00:03:26 --> Query error: Column 'mobile' cannot be null - Invalid query: INSERT INTO `tbl_users` (`name`, `email`, `mobile`, `password`, `user_type`, `permanent_state`, `status`, `created_at`) VALUES ('Deepanshu Mishra', 'mishra100@gmail.com', NULL, '845db344c37ba8e692b6fa190265424ab8622aa8', 1, '12', 0, '2024-02-09 00:03:26')
ERROR - 2024-02-09 00:03:39 --> Severity: error --> Exception: Call to undefined method Authenticate::sendEmailCommon() C:\deepanshu\CutOffBaba\application\controllers\SmallScreen\Authenticate.php 60
ERROR - 2024-02-09 00:04:11 --> Query error: Duplicate entry 'mishra100@gmail.com' for key 'tbl_users.email' - Invalid query: INSERT INTO `tbl_users` (`name`, `email`, `mobile`, `password`, `user_type`, `permanent_state`, `status`, `created_at`) VALUES ('Deepanshu Mishra', 'mishra100@gmail.com', '7786931286', '845db344c37ba8e692b6fa190265424ab8622aa8', 1, '12', 0, '2024-02-09 00:04:11')
DEBUG - 2024-02-09 00:04:27 --> Total execution time: 0.0304
DEBUG - 2024-02-09 00:04:29 --> Total execution time: 0.0145
DEBUG - 2024-02-09 00:06:10 --> Total execution time: 0.0414
DEBUG - 2024-02-09 00:06:27 --> Total execution time: 0.0302
DEBUG - 2024-02-09 00:09:48 --> Total execution time: 0.0157
DEBUG - 2024-02-09 00:10:40 --> Total execution time: 0.0171
DEBUG - 2024-02-09 00:10:48 --> Total execution time: 0.0285
DEBUG - 2024-02-09 00:10:50 --> Total execution time: 0.0245
DEBUG - 2024-02-09 00:11:26 --> Total execution time: 0.0149
DEBUG - 2024-02-09 00:11:27 --> Total execution time: 0.0161
ERROR - 2024-02-09 00:11:35 --> Query error: Unknown column 'phone' in 'where clause' - Invalid query: SELECT *
FROM `tbl_users`
WHERE `phone` = '778693126'
AND `password` = '845db344c37ba8e692b6fa190265424ab8622aa8'
AND `user_type` = 1
DEBUG - 2024-02-09 00:11:51 --> Total execution time: 0.0407
DEBUG - 2024-02-09 00:12:01 --> Total execution time: 0.0354
DEBUG - 2024-02-09 00:12:12 --> Total execution time: 0.0622
DEBUG - 2024-02-09 00:12:13 --> Total execution time: 0.0139
DEBUG - 2024-02-09 00:12:17 --> Total execution time: 0.0327
DEBUG - 2024-02-09 00:14:25 --> Total execution time: 0.0231
DEBUG - 2024-02-09 00:17:59 --> Total execution time: 0.0350
DEBUG - 2024-02-09 00:18:53 --> Total execution time: 0.0198
DEBUG - 2024-02-09 01:05:41 --> Total execution time: 0.0768
DEBUG - 2024-02-09 01:09:06 --> Total execution time: 0.0283
DEBUG - 2024-02-09 01:17:14 --> Total execution time: 0.0998
DEBUG - 2024-02-09 01:17:18 --> Total execution time: 0.0276
DEBUG - 2024-02-09 01:17:21 --> Total execution time: 0.0306
ERROR - 2024-02-09 01:17:33 --> Unable to load the requested class: Curl
DEBUG - 2024-02-09 01:21:33 --> Total execution time: 0.0309
ERROR - 2024-02-09 01:21:38 --> Unable to load the requested class: Curl
DEBUG - 2024-02-09 01:23:56 --> Total execution time: 0.0388
