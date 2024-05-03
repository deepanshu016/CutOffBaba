<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CurlHook {
    public function initialize() {
        $CI =& get_instance();
        $CI->load->library('curl');
    }
}
