<?php

Class DegreeType extends MY_Controller {

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
            $data['degreetypeList'] = $this->master->getRecords('tbl_degree_type');
            $this->load->view('admin/degreetype/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/degreetype/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editDegreeType($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleDegreeType'] = $this->master->singleRecord('tbl_degree_type',array('id'=>$id));
            $this->load->view('admin/degreetype/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save DegreeType
    public function saveDegreeType(){
        $this->form_validation->set_rules('degreetype', 'Degree Type', 'trim|required');
        if ($this->form_validation->run()) {
            $data['degreetype'] = $this->input->post('degreetype');
            $result = $this->master->insert('tbl_degree_type',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Degree Type added successfully','url'=>base_url('admin/degreetype'));
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
                    'degreetype' => form_error('degreetype')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Updatte Degree Type
    public function updateDegreeType(){

        $this->form_validation->set_rules('degreetype', 'Degree Type', 'trim|required');
        if ($this->form_validation->run()) {
            $data['degreetype'] = $this->input->post('degreetype');
            $result = $this->master->updateRecord('tbl_degree_type',array('id'=>$this->input->post('degreetype_id')),$data);
            $response = array('status' => 'success','message'=> 'Degree Type updated successfully','url'=>base_url('admin/degreetype'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'degreetype' => form_error('degreetype')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteDegreeType(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_degree_type',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Degree Type deleted successfully','url'=>base_url('admin/degreetype'));
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