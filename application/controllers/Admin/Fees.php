<?php

Class Fees extends MY_Controller {

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
            $data['feesList'] = $this->db->select('tbl_college_fees.*,tbl_college.full_name')->join('tbl_college','tbl_college_fees.college_id=tbl_college.id')->get('tbl_college_fees')->result_array();
            $this->load->view('admin/fees/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/fees/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editFees($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleFees'] = $this->master->singleRecord('tbl_college_fees',array('id'=>$id));
            $this->load->view('admin/fees/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Fees
    public function saveFees(){
        $this->form_validation->set_rules('college_id', 'College', 'trim|required');
        $this->form_validation->set_rules('fee_head_id', 'Fee Head', 'trim|required');
        if ($this->form_validation->run()) {
            $data['fee_head_id'] = $this->input->post('fee_head_id');
            $data['college_id'] = $this->input->post('college_id');
            $data['course_id'] = $this->input->post('course_id');
            $data['year'] = $this->input->post('year');
            $data['tution_fees'] = $this->input->post('tution_fees');
            $data['hostel_fees'] = $this->input->post('hostel_fees');
            $data['misc_fees'] = $this->input->post('misc_fees');
            $data['bank_details_1'] = $this->input->post('bank_details_1');
            $data['bank_details_2'] = $this->input->post('bank_details_2');
            $data['demand_draft_name'] = $this->input->post('demand_draft_name');
            $data['bondrule'] = $this->input->post('bondrule');
            $data['seat_indentity_charges'] = $this->input->post('seat_indentity_charges');
            $data['upgradation_processing_fees'] = $this->input->post('upgradation_processing_fees');
            $result = $this->master->insert('tbl_college_fees',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Fees added successfully','url'=>base_url('admin/fees'));
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
                    'college_id' => form_error('college_id'),
                    'fee_head_id' => form_error('fee_head_id')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Gender
    public function updateFees(){

        $this->form_validation->set_rules('college_id', 'College', 'trim|required');
        $this->form_validation->set_rules('fee_head_id', 'Fee Head', 'trim|required');
        if ($this->form_validation->run()) {
            $data['fee_head_id'] = $this->input->post('fee_head_id');
            $data['college_id'] = $this->input->post('college_id');
            $data['course_id'] = $this->input->post('course_id');
            $data['year'] = $this->input->post('year');
            $data['tution_fees'] = $this->input->post('tution_fees');
            $data['hostel_fees'] = $this->input->post('hostel_fees');
            $data['misc_fees'] = $this->input->post('misc_fees');
            $data['bank_details_1'] = $this->input->post('bank_details_1');
            $data['bank_details_2'] = $this->input->post('bank_details_2');
            $data['demand_draft_name'] = $this->input->post('demand_draft_name');
            $data['bondrule'] = $this->input->post('bondrule');
            $data['seat_indentity_charges'] = $this->input->post('seat_indentity_charges');
            $data['upgradation_processing_fees'] = $this->input->post('upgradation_processing_fees');
            $result = $this->master->updateRecord('tbl_college_fees',array('id'=>$this->input->post('college_fees_id')),$data);
            $response = array('status' => 'success','message'=> 'College Fees updated successfully','url'=>base_url('admin/fees'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'college_id' => form_error('college_id'),
                    'fee_head_id' => form_error('fee_head_id')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteFees(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_college_fees',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Gender deleted successfully','url'=>base_url('admin/fees'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
            $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function getheadetail($id=null)
    {
        //echo $id;
        $singleFees = $this->master->singleRecord('tbl_feeshead',array('id'=>$id));
        echo '<div class="row">
              <div class="col-lg-12">
                  <div class="form-group">
                      <label for="basiInput" class="form-label">Tution Fees</label>
                      <textarea class="form-control" name="tution_fees" id="tution_feess">'.$singleFees['tution_fees'].'</textarea>
                      <span class="text-danger" id="tution_fees"></span>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-12">
                  <div class="form-group">
                      <label for="basiInput" class="form-label">Hostel Fees</label>
                      <textarea class="form-control" name="hostel_fees" id="hostel_fees">'.$singleFees['hostel_fees'].'</textarea>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-12">
                  <div class="form-group">
                      <label for="basiInput" class="form-label">Miscellaneous Fees</label>
                      <textarea class="form-control" name="misc_fees" id="misc_fees">'.$singleFees['misc_fees'].'</textarea>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-lg-12">
                  <div class="form-group">
                      <label for="basiInput" class="form-label">Bank Details 1</label>
                      <textarea class="form-control" name="bank_details_1" id="bank_details_1">'.$singleFees['bank_details_1'].'</textarea>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-lg-12">
                  <div class="form-group">
                      <label for="basiInput" class="form-label">Bank Details 2</label>
                      <textarea class="form-control" name="bank_details_2" id="bank_details_2">'.$singleFees['bank_details_2'].'</textarea>
                  </div>
              </div>
          </div>


          <div class="row">
              <div class="col-lg-12">
                  <div class="form-group">
                      <label for="basiInput" class="form-label">Demand Draft Name</label>
                      <input class="form-control" type="text" name="demand_draft_name"  placeholder="Demand Draft Name" value="'.$singleFees['demand_draft_name'].'">
                  </div>
              </div>
          </div>
           <div class="row">
              <div class="col-lg-12">
                  <div class="form-group">
                      <label for="basiInput" class="form-label">Service & Bond Rules</label>
                      <textarea class="form-control" name="bondrule" id="bondrule">'.$singleFees['bondrule'].'</textarea>
                  </div>
              </div>
          </div>


          <div class="row">
              <div class="col-lg-6 col-12">
                  <div class="form-group">
                      <label for="basiInput" class="form-label">Seat Indemnity Charges</label>
                      <input class="form-control" type="text" name="seat_indentity_charges"  placeholder="Seat Indemnity Charges" value="'.$singleFees['seat_indentity_charges'].'">
                  </div>
              </div>
              <div class="col-lg-6 col-12">
                  <div class="form-group">
                      <label for="basiInput" class="form-label">Upgradation Processing Fees</label>
                      <input class="form-control" type="text" name="upgradation_processing_fees"  placeholder="Upgradation Processing Fees" value="'.$singleFees['upgradation_processing_fees'].'">
                  </div>
              </div>
          </div><div class="row">
          <div class="col-lg-12">
              <div class="form-group">
                  <label for="basiInput" class="form-label">Other Fees</label>
                  <textarea class="form-control" name="otfee" id="otfee">'.$singleFees['otfee'].'</textarea>
              </div>
          </div>
      </div>';
    }
    public function getcourses($id=null)
    {
        //echo $id;
        $singleFees = $this->master->singleRecord('tbl_college',array('id'=>$id));
        $courses=explode(',',$singleFees['course_offered']);
        $data='';
        foreach($courses as $course){
            $coursename=$this->master->singleRecord('tbl_course',array('id'=>$course));
            $data.="<option value='".$course."'>".$coursename['course']."</option>";
        }
        echo $data;
    }
}

?>