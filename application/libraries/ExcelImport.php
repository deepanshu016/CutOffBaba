<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');  
  
require_once APPPATH."third_party/PHPExcel/Classes/PHPExcel.php";
  
class ExcelImport extends PHPExcel {
    public function __construct() {
        parent::__construct();
        echo "Hello"; die;
    }
}