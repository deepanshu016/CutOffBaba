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
DEBUG - 2024-02-09 18:06:33 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:06:33 --> No URI present. Default controller set.
DEBUG - 2024-02-09 18:06:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:06:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 23:36:33 --> Total execution time: 0.1047
DEBUG - 2024-02-09 18:06:34 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:06:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:06:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 23:36:34 --> Total execution time: 0.0230
DEBUG - 2024-02-09 18:06:34 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:06:34 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:06:34 --> 404 Page Not Found: Faviconico/index
DEBUG - 2024-02-09 18:06:36 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:06:36 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:06:36 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:06:37 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:06:37 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:06:37 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:06:37 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:06:37 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:06:37 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:06:37 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:06:37 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:06:37 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:06:38 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:06:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:06:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 23:36:38 --> Total execution time: 0.0192
DEBUG - 2024-02-09 18:06:38 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:06:38 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:06:38 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:06:38 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:06:38 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:06:38 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:06:38 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:06:38 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:06:38 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:06:38 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:06:38 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:06:38 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:08:26 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:08:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:08:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 23:38:26 --> Total execution time: 0.0329
DEBUG - 2024-02-09 18:08:26 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:08:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:08:26 --> UTF-8 Support Enabled
ERROR - 2024-02-09 18:08:26 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:08:26 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:08:26 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:08:26 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:08:26 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:08:26 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:08:26 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:08:26 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:08:26 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:08:29 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:08:29 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:08:29 --> 404 Page Not Found: Small/verify-otp
DEBUG - 2024-02-09 18:09:05 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:09:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:09:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 23:39:05 --> Total execution time: 0.0354
DEBUG - 2024-02-09 18:09:05 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:09:05 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:09:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:09:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:09:06 --> 404 Page Not Found: Small/img
ERROR - 2024-02-09 18:09:06 --> 404 Page Not Found: Small/img
DEBUG - 2024-02-09 18:09:06 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:09:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:09:06 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:09:06 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:09:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:09:06 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:09:06 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:09:06 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:09:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:09:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:09:06 --> 404 Page Not Found: Assets/admin
ERROR - 2024-02-09 18:09:06 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:09:06 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:09:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:09:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 23:39:06 --> Total execution time: 0.0201
DEBUG - 2024-02-09 18:09:06 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:09:06 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:09:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:09:06 --> 404 Page Not Found: Small/img
DEBUG - 2024-02-09 18:09:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:09:06 --> 404 Page Not Found: Small/img
DEBUG - 2024-02-09 18:09:06 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:09:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:09:06 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:09:06 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:09:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:09:06 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:09:06 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:09:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:09:06 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:09:06 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:09:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:09:06 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:13:06 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:13:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:13:06 --> 404 Page Not Found: Small/verify-otp
DEBUG - 2024-02-09 18:13:06 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:13:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:13:06 --> 404 Page Not Found: Faviconico/index
DEBUG - 2024-02-09 18:13:14 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:13:14 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:13:14 --> 404 Page Not Found: Small/verify-otp
DEBUG - 2024-02-09 18:13:18 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:13:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:13:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 23:43:18 --> Total execution time: 0.0227
DEBUG - 2024-02-09 18:13:18 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:13:18 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:13:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:13:18 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:13:18 --> 404 Page Not Found: Assets/frontend
ERROR - 2024-02-09 18:13:19 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:13:19 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:13:19 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:13:19 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:13:19 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:13:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:13:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 23:43:19 --> Total execution time: 0.0389
DEBUG - 2024-02-09 18:13:19 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:13:19 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:13:19 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:13:19 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:13:19 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:13:19 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:13:19 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:13:19 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:13:19 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:13:20 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:13:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:13:20 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:13:20 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:13:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:13:20 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:22:44 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:22:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:22:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 23:52:56 --> Total execution time: 11.7214
DEBUG - 2024-02-09 18:25:10 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:25:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:25:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 23:55:21 --> Total execution time: 11.5572
DEBUG - 2024-02-09 18:25:23 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:25:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:25:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 18:25:39 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:25:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:25:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 18:35:24 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:35:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:35:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 18:35:24 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:35:24 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:35:24 --> 404 Page Not Found: Small/verify-otp
DEBUG - 2024-02-09 18:35:24 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:35:25 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:35:25 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:35:25 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:35:25 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:35:25 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:35:26 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:35:26 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:35:26 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:35:26 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:35:26 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:35:26 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:35:51 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:35:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:35:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 18:35:51 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:35:51 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:35:51 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:35:51 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:35:51 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:35:51 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:35:51 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:35:51 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:35:51 --> 404 Page Not Found: Faviconico/index
DEBUG - 2024-02-09 18:35:52 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:35:52 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:35:52 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:35:52 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:35:52 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:35:52 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:36:05 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:36:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:36:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 18:36:05 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:36:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:36:05 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:36:05 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:36:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:36:05 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:36:05 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:36:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:36:05 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:36:05 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:36:05 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:36:05 --> 404 Page Not Found: Faviconico/index
DEBUG - 2024-02-09 18:36:06 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:36:06 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:36:06 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:36:41 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:36:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:36:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 18:37:12 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:37:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:37:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 18:37:14 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:37:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:37:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 18:37:14 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:37:14 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:37:14 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:37:14 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:37:14 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:37:14 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:37:14 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:37:14 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:37:14 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:37:15 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:37:15 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:37:15 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:37:19 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:37:19 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:37:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:37:19 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:37:19 --> 404 Page Not Found: Assets/admin
ERROR - 2024-02-09 18:37:19 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:37:20 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:37:20 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:37:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:37:20 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:37:20 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:37:20 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:37:31 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:37:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:37:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 18:37:31 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:37:31 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:37:31 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:37:31 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:37:31 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:37:31 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:37:31 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:37:31 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:37:31 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:37:31 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:37:31 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:37:31 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:40:36 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:40:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:40:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 18:40:36 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:40:36 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:40:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:40:36 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:40:36 --> 404 Page Not Found: Assets/frontend
ERROR - 2024-02-09 18:40:36 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:40:36 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:40:36 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:40:36 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:40:36 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:40:36 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:40:36 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:46:12 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:46:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2024-02-09 18:46:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2024-02-09 18:46:12 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:46:12 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:46:12 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:46:12 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:46:12 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:46:12 --> 404 Page Not Found: Assets/frontend
DEBUG - 2024-02-09 18:46:12 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:46:12 --> UTF-8 Support Enabled
DEBUG - 2024-02-09 18:46:12 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:46:12 --> 404 Page Not Found: Assets/admin
DEBUG - 2024-02-09 18:46:12 --> Global POST, GET and COOKIE data sanitized
ERROR - 2024-02-09 18:46:12 --> 404 Page Not Found: Assets/admin
