<?php

Class Recognition extends MY_Controller {

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
            $data['recognitionList'] = $this->master->getRecords('tbl_recognition');
            $this->load->view('admin/recognition/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/recognition/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editRecognition($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleRecognition'] = $this->master->singleRecord('tbl_recognition',array('id'=>$id));
            $this->load->view('admin/recognition/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Recognition
    public function saveRecognition(){
        $this->form_validation->set_rules('recognition', 'Recognition', 'trim|required');
        if ($this->form_validation->run()) {
            $data['recognition'] = $this->input->post('recognition');
            $result = $this->master->insert('tbl_recognition',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Recognition added successfully','url'=>base_url('admin/recognition'));
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
                    'recognition' => form_error('recognition')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Recognition
    public function updateRecognition(){

        $this->form_validation->set_rules('recognition', 'Recognition', 'trim|required');
        if ($this->form_validation->run()) {
            $data['recognition'] = $this->input->post('recognition');
            $result = $this->master->updateRecord('tbl_recognition',array('id'=>$this->input->post('recognition_id')),$data);
            $response = array('status' => 'success','message'=> 'Recognition updated successfully','url'=>base_url('admin/recognition'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'recognition' => form_error('recognition')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteRecognition(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_recognition',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Recognition deleted successfully','url'=>base_url('admin/recognition'));
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