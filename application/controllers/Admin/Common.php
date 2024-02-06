<?php

Class Common extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MasterModel','master');
    }
    public function getStateByCountry()
    {
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $id = $this->input->post('id');
            $data['admin_session'] = $this->session->userdata('admin');
            $stateList = $this->master->getRecordsOrderBy('tbl_state',['country_id'=>$id],'name');
            $html = '';
            if(!empty($stateList)){
                foreach($stateList as $state){
                    $html.= '<option value="'.$state['id'].'">'.$state['name'].'</option>';
                }
                $response = array('status' =>'success', 'html'=>$html,'message'=>'Data fetched successfully');
                echo json_encode($response);
                return false;
            }
            $response = array('status' =>'errors', 'html'=>$html,'message'=>'Data not found');
            echo json_encode($response);
            return false;
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    } 

    public function getCityByState()
    {
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $data['admin_session'] = $this->session->userdata('admin');
            $cityList = $this->master->getRecordsOrderBy('tbl_city',['state_id'=>$id],'city');
            $html = '';
            if(!empty($cityList)){
                foreach($cityList as $city){
                    $html.= '<option value="'.$city['id'].'">'.$city['city'].'</option>';
                }
                $response = array('status' =>'success', 'html'=>$html,'message'=>'Data fetched successfully');
                echo json_encode($response);
                return false;
            }
            $response = array('status' =>'errors', 'html'=>$html,'message'=>'Data not found');
            echo json_encode($response);
            return false;
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function getSubdistrictByCity()
    {
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $data['admin_session'] = $this->session->userdata('admin');
            $cityList = $this->master->getRecordsOrderBy('tbl_sub_district',['district'=>$id],'district');
            $html = '';
            if(!empty($cityList)){
                foreach($cityList as $city){
                    $html.= '<option value="'.$city['id'].'">'.$city['sub_district'].'</option>';
                }
                $response = array('status' =>'success', 'html'=>$html,'message'=>'Data fetched successfully');
                echo json_encode($response);
                return false;
            }
            $response = array('status' =>'errors', 'html'=>$html,'message'=>'Data not found');
            echo json_encode($response);
            return false;
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
public function getCategoryByHead()
    {
        
            $id = $this->input->post('id');
            $cityList = $this->master->getRecordsOrderBy('tbl_category',['head_id'=>$id],'category_name');
            $html = '';
            if(!empty($cityList)){
                foreach($cityList as $city){
                    $html.= '<option value="'.$city['id'].'">'.$city['category_name'].'</option>';
                }
                $response = array('status' =>'success', 'html'=>$html,'message'=>'Data fetched successfully');
                echo json_encode($response);
                return false;
            }
            $response = array('status' =>'errors', 'html'=>$html,'message'=>'Data not found');
            echo json_encode($response);
            return false;
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['countryList'] = $this->master->getRecords('tbl_country');
            $this->load->view('admin/state/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editState($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['countryList'] = $this->master->getRecords('tbl_country');
            $data['singleState'] = $this->master->singleRecord('tbl_state',array('id'=>$id));
            $this->load->view('admin/state/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Country
    public function saveState(){
        $this->form_validation->set_rules('name', 'State Name', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        if ($this->form_validation->run()) {
            $data['name'] = $this->input->post('name');
            $data['country_id'] = $this->input->post('country_id');
            $result = $this->master->insert('tbl_state',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'State added successfully','url'=>base_url('admin/state'));
                echo json_encode($response);
                return false;
            }else{
                $response = array('status' => 'errors','message'=> 'Something went wrong');
                echo json_encode($response);
                return false;
            }
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'name' => form_error('name'),
                    'country_id' => form_error('country_id')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Category
    public function updateState(){

        $this->form_validation->set_rules('name', 'State Name', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        if ($this->form_validation->run()) {
            $data['name'] = $this->input->post('name');
            $data['country_id'] = $this->input->post('country_id');
            $result = $this->master->updateRecord('tbl_state',array('id'=>$this->input->post('state_id')),$data);
            $response = array('status' => 'success','message'=> 'State updated successfully','url'=>base_url('admin/state'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'country_id' => form_error('country_id'),
                    'name' => form_error('name')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteState(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_country',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'State deleted successfully','url'=>base_url('admin/state'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
            $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    public function getBranchesByCourse()
    {
         $id = $this->input->post('id');

        $branchList = $this->db->select('*')->where('id',$id)->get('tbl_course')->result_array();
        $branchList=$branchList[0]['branch_type'];
        $branchtypeList=explode('|',$branchList);
        $html = '';
        if(!empty($branchtypeList)){
            foreach($branchtypeList as $branchtypeid){
                $nature=$this->master->singleRecord('tbl_nature',array('id'=>$branchtypeid));
                $html.= '<option value="'.$nature['id'].'">'.$nature['nature'].'</option>';
            }
            $response = array('status' =>'success', 'html'=>$html,'message'=>'Data fetched successfully');
            echo json_encode($response);
            return false;
        }
        $response = array('status' =>'errors', 'html'=>$html,'message'=>'Data not found');
        echo json_encode($response);
        return false;
    }
}

?>