<?php

Class FeesHead extends MY_Controller {

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
            $data['feesHeadList'] = $this->master->getRecords('tbl_feeshead');
            $this->load->view('admin/feeshead/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/feeshead/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editFeesHead($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleFeesHead'] = $this->master->singleRecord('tbl_feeshead',array('id'=>$id));
            $this->load->view('admin/feeshead/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Feeshead
    public function saveFeesHead(){
        $this->form_validation->set_rules('fee_head_name', 'Fees Head Name', 'trim|required');
        $this->form_validation->set_rules('tution_fees', 'Tution Fees', 'trim|required');
        if ($this->form_validation->run()) {
            $data['fee_head_name'] = $this->input->post('fee_head_name');
            $data['tution_fees'] = $this->input->post('tution_fees');
            $data['hostel_fees'] = $this->input->post('hostel_fees');
            $data['misc_fees'] = $this->input->post('misc_fees');
            $data['bank_details_1'] = $this->input->post('bank_details_1');
            $data['bank_details_2'] = $this->input->post('bank_details_2');
            $data['demand_draft_name'] = $this->input->post('demand_draft_name');
            $result = $this->master->insert('tbl_feeshead',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Fees Head added successfully','url'=>base_url('admin/feeshead'));
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
                    'fee_head_name' => form_error('fee_head_name'),
                    'tution_fees' => form_error('tution_fees')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Feeshead
    public function updateFeesHead(){

        $this->form_validation->set_rules('fee_head_name', 'Fees Head Name', 'trim|required');
        $this->form_validation->set_rules('tution_fees', 'Tution Fees', 'trim|required');
        if ($this->form_validation->run()) {
            $data['fee_head_name'] = $this->input->post('fee_head_name');
            $data['tution_fees'] = $this->input->post('tution_fees');
            $data['hostel_fees'] = $this->input->post('hostel_fees');
            $data['misc_fees'] = $this->input->post('misc_fees');
            $data['bank_details_1'] = $this->input->post('bank_details_1');
            $data['bank_details_2'] = $this->input->post('bank_details_2');
            $data['demand_draft_name'] = $this->input->post('demand_draft_name');
            $result = $this->master->updateRecord('tbl_feeshead',array('id'=>$this->input->post('name_id')),$data);
            $response = array('status' => 'success','message'=> 'Fees Head updated successfully','url'=>base_url('admin/feeshead'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'fee_head_name' => form_error('fee_head_name'),
                    'tution_fees' => form_error('tution_fees')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteFeesHead(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_feeshead',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Fees Head deleted successfully','url'=>base_url('admin/feeshead'));
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