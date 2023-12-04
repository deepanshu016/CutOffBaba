<?php

class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
	}

	public function SecretHash() {
		return 'MY*S3C537#4$H';
	}

	public function is_admin_logged_in() {
		$user = $this->session->userdata('admin');
		if ($user) {
			return true;
		} else {
			return false;
		}
	}
	public function is_user_logged_in() {
		$user = $this->session->userdata('user');
		if ($user) {
			return true;
		} else {
			return false;
		}
	}

	public function logout() {
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
			if ($key != 'id' && $key != 'name' && $key != 'designation' && $key != 'last_activity') {
				$this->session->unset_userdata($key);
			}
		}
		$this->session->sess_destroy();
		redirect('Admin/');
	}
	public function uploadFile($file,$fileName,$config){
		if(!empty($file)){
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload($fileName)){ 
                $upload_data = $this->upload->data();
                $data['error_msg'] = '';
	            $file_path = $upload_data['file_name'];
	            $data['file'] = $file_path;
            }else{
                $data['error_msg'] = $this->upload->display_errors();
                $data['file'] = '';
            }
        } else {
        	$data['error_msg'] = '';
            $data['file'] = '';
        }
        return $data;
	}
	public function uploadVideoFile($file,$fileName,$config){
		if(!empty($file)){
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if($this->upload->do_upload($fileName)){ 
                $upload_data = $this->upload->data();
                $data['error_msg'] = '';
	            $file_path = $upload_data['file_name'];
	            $data['file'] = $file_path;
            }else{
                $data['error_msg'] = $this->upload->display_errors();
                $data['file'] = '';
            }
        } else {
        	$data['error_msg'] = '';
            $data['file'] = '';
        }
        return $data;
	}
	public function slug($string, $spaceRepl = "-"){
	    $string = str_replace("&", "and", $string);

	    $string = preg_replace("/[^a-zA-Z0-9 _-]/", "", $string);

	    $string = strtolower($string);

	    $string = preg_replace("/[ ]+/", " ", $string);

	    $string = str_replace(" ", $spaceRepl, $string);

	    return $string.'-'.sha1($string);
	}

    public function remove_file_from_directory($file_path,$file_name){
        $full_path = $file_path.'/'.$file_name;
        if (file_exists($full_path)) {
            if (unlink($full_path)) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function csv_formatter($excelData){
        $formattedData = array();
        $header = $excelData[0];

        for ($i = 1; $i < count($excelData); $i++) {
            $row = array();
            for ($j = 0; $j < count($header); $j++) {
                if(isset($header[$j])){
                    $row[trim($header[$j])] = $excelData[$i][$j];
                }
            }
            $formattedData[] = $row;
        }
        return $formattedData;
    }
} // end of class

?>