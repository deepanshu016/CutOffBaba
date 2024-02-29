<?php
	function inwords($number, $true = true) {
		$no = floor($number);
		$point = number_format(number_format($number, 2, '.', '') - $no, 2, '', '');
		$digitpoint = strlen($point);
		$digit = strlen($no);
		//Ones, Tens, Hundreds
		$ones = array(0 => 'Zero', '1' => 'One', '2' => 'Two', '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six', '7' => 'Seven', '8' => 'Eight', '9' => 'Nine', '10' => 'Ten');
		$tens = array('11' => 'Eleven', '12' => 'Twelve', '13' => 'Thirteen', '14' => 'Fourteen', '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen', '18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty', '30' => 'Thirty', 40 => 'Forty', '50' => 'Fifty', '60' => 'Sixty', '70' => 'Seventy', '80' => 'Eighty', '90' => 'Ninety');
		$hundred = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
		$string_word = array();
		$numbers = array_reverse(str_split($no, 1));
		$i = 0;
		while ($i < $digit) {
			if ($i == 0) {
				if (!isset($numbers[2]) && !isset($numbers[1])) {
					$string_word[] = $ones[$numbers[0]];
				}
			}
			if ($i == 1) {
				$temp = intval($numbers[1] . "" . $numbers[0]);
				$ten = intval($numbers[1] . "0");
				if ($ten == 0 && $temp == 0) {
				} else if ($temp <= 10) {
					$string_word[] = $ones[$temp];
				} else if ($temp > 11 && $temp <= 20) {
					$string_word[] = $tens[$temp];
				} else if (isset($tens[$temp])) {
					$string_word[] = $tens[$temp];
				} else {
					$string_word[] = $tens[$ten] . " " . $ones[$numbers[0]];
				}
			}
			if ($i == 2) {
				if (!isset($numbers[3]) && $numbers[2] != 0) {
					$string_word[] = $ones[$numbers[2]] . " " . $hundred[1];
				}
				if (isset($numbers[3]) && $numbers[2] != 0) {
					$string_word[] = $ones[$numbers[2]] . " " . $hundred[1];
				}
			}
			if ($i == 3 || $i == 4) {
				if (isset($numbers[4])) {
					$temp = intval($numbers[4] . "" . $numbers[3]);
					$ten = intval($numbers[4] . "0");
					echo $temp . "--" . $ten;
					if ($temp == 0 && $ten == 0) {
					} else if ($temp == 10) {
						$string_word[] = $ones[$temp] . " " . $hundred[2];
					} elseif ($temp > 10 && $temp <= 20) {
						$string_word[] = $tens[$temp] . " " . $hundred[2];
					} else {
						$num = ($numbers[3] == 0) ? '' : $ones[$numbers[3]];
						$string_word[] = $tens[$ten] . " " . $num . " " . $hundred[2];
					}
				} else {
					$string_word[] = $ones[$numbers[3]] . " " . $hundred[2];
				}
				$i++;
			}
			if ($i == 5 || $i == 6) {
				if (isset($numbers[6])) {
					$temp = intval($numbers[6] . "" . $numbers[5]);
					$ten = intval($numbers[6] . "0");
					if ($numbers[5] == 0 && $numbers[6] == 0) {
					} elseif ($temp == 10) {
						$string_word[] = $ones[$temp] . " " . $hundred[5];
					} elseif ($temp > 10 && $temp <= 20) {
						$string_word[] = $tens[$temp] . " " . $hundred[5];
					} else {
						$num = ($numbers[5] == 0) ? '' : $ones[$numbers[5]];
						$tens_1 = (!isset($tens[$ten])) ? '' : $tens[$ten];
						$string_word[] = $tens_1 . " " . $num . " " . $hundred[3];
					}
				} else {
					$string_word[] = $ones[$numbers[5]] . " " . $hundred[3];
				}
				$i++;
			}
			if ($i == 7 || $i == 8) {
				if (isset($numbers[8])) {
					$temp = intval($numbers[8] . "" . $numbers[7]);
					$ten = intval($numbers[8] . "0");
					if ($numbers[7] == 0 && $numbers[8] == 0) {
						continue;
					} else if ($temp == 10) {
						$string_word[] = $ones[$temp] . " " . $hundred[4];
					} elseif ($temp > 10 && $temp <= 20) {
						$string_word[] = $tens[$temp] . " " . $hundred[4];
					} else {
						$num = ($numbers[7] == 0) ? '' : $ones[$numbers[7]];
						$string_word[] = $tens[$ten] . " " . $num . " " . $hundred[4];
					}
				} else {
					$string_word[] = $ones[$numbers[7]] . " " . $hundred[4];
				}
				$i++;
			}
			if ($i == 9) {
				$string_word[] = $ones[$numbers[9]] . " " . $hundred[1];
			}
			$i++;
			//$string_word[] = $i;
		}
		$str = array_reverse($string_word);
		return implode(' ', $str);
	}

    //get countries
if (!function_exists('get_master_data')) {
    function get_master_data($table, $condition)
    {
        $CI =& get_instance();
        $CI->load->model('MasterModel');
        return $CI->MasterModel->getRecords($table,$condition);
    }
}

if (!function_exists('debugger')) {
    function debugger($data)
    {
        echo "<pre>";
        print_r($data); die;
    }
}
if (!function_exists('show_months')){
    function show_months()
    {
        $data = [];
        for ($i = 0; $i < 12; $i++) {
            $time = strtotime(sprintf('%d months', $i));
            $label = date('F', $time);
            $value = date('n', $time);
            $data[$i]['id'] = $value;
            $data[$i]['label'] = $label;
        }
        return $data;
    }
}

if (!function_exists('branch_type_data')){
    function branch_type_data(){
        $array = array(
            array(
                'id' => 1,
                'name' => 'Clinical'
            ),
            array(
                'id' => 2,
                'name' => 'Non- Clinical'
            ),
        );
        return $array;
    }
}



if (!function_exists('file_type_data')){
    function file_type_data(){
        $array = array(
            array(
                'id' => 'doc',
                'name' => 'Document(doc/pdf)'
            ),
            array(
                'id' => 'image',
                'name' => 'Image'
            ),
            array(
                'id' => 'video',
                'name' => 'Video'
            ),
        );
        return $array;
    }
}
if (!function_exists('excerpt')){
	function excerpt($str, $limit = 50) { // function with limit 50
		if (strlen($str) <= $limit) { // if length less than or equal to limit
			return $str; // return string
		}
		$str = substr($str, 0, $limit); // extract first characters
		$str = rtrim($str, "!,.-"); // remove trailing punctuation
		$str .= "..."; // append '...'
		return $str; // return excerpt
	 }
}

?>