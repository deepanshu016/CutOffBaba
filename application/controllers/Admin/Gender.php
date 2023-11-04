<?php

Class Gender extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MasterModel','master');
        $this->load->model('SiteSettings','site');
    }
    public function index()
    {
        if ($this->is_admin_logged_in() == true) {
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['admin_session'] = $this->session->userdata('admin');
            $data['genderList'] = $this->master->getRecords('tbl_gender');
            $this->load->view('admin/gender/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/gender/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editGender($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleGender'] = $this->master->singleRecord('tbl_gender',array('id'=>$id));
            $this->load->view('admin/gender/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Gender
    public function saveGender(){
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        if ($this->form_validation->run()) {
            $data['gender'] = $this->input->post('gender');
            $result = $this->master->insert('tbl_gender',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Gender added successfully','url'=>base_url('admin/gender'));
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
                    'gender' => form_error('gender')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Gender
    public function updateGender(){

        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        if ($this->form_validation->run()) {
            $data['gender'] = $this->input->post('gender');
            $result = $this->master->updateRecord('tbl_gender',array('id'=>$this->input->post('gender_id')),$data);
            $response = array('status' => 'success','message'=> 'Gender updated successfully','url'=>base_url('admin/gender'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'gender' => form_error('gender')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteGender(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_gender',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Gender deleted successfully','url'=>base_url('admin/gender'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
            $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}

?>