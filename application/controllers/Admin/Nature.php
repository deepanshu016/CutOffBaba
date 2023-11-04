<?php

Class Nature extends MY_Controller {

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
            $data['natureList'] = $this->master->getRecords('tbl_nature');
            $this->load->view('admin/nature/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/nature/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editNature($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleNature'] = $this->master->singleRecord('tbl_nature',array('id'=>$id));
            $this->load->view('admin/nature/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Nature
    public function saveNature(){
        $this->form_validation->set_rules('nature', 'Nature', 'trim|required');
        if ($this->form_validation->run()) {
            $data['nature'] = $this->input->post('nature');
            $result = $this->master->insert('tbl_nature',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Nature added successfully','url'=>base_url('admin/nature'));
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
                    'nature' => form_error('nature')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Nature
    public function updateNature(){

        $this->form_validation->set_rules('nature', 'Nature', 'trim|required');
        if ($this->form_validation->run()) {
            $data['nature'] = $this->input->post('nature');
            $result = $this->master->updateRecord('tbl_nature',array('id'=>$this->input->post('nature_id')),$data);
            $response = array('status' => 'success','message'=> 'Nature updated successfully','url'=>base_url('admin/nature'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'nature' => form_error('nature')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteNature(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_nature',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Nature deleted successfully','url'=>base_url('admin/nature'));
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