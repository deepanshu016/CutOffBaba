<?php


class ClinicalDetails extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MasterModel', 'master');
        $this->load->model('SiteSettings', 'site');
    }

    public function index()
    {
        if ($this->is_admin_logged_in() == true) {
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings', []);
            $data['admin_session'] = $this->session->userdata('admin');
            $data['clinicalDetailsList'] = $this->master->getRecords('tbl_clinical_details');
            $this->load->view('admin/clinical_details/list', $data);
        } else {
            $this->session->set_flashdata('error', 'Please login first');
            return redirect('admin');
        }
    }

    public function add()
    {
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings', []);
            $this->load->view('admin/clinical_details/add-edit', $data);
        } else {
            $this->session->set_flashdata('error', 'Please login first');
            return redirect('admin');
        }
    }

    public function editClinicalDetails($id)
    {
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings', []);
            $data['singleClinicalDetail'] = $this->master->singleRecord('tbl_clinical_details', array('id' => $id));
            $this->load->view('admin/clinical_details/add-edit', $data);
        } else {
            $this->session->set_flashdata('error', 'Please login first');
            return redirect('admin');
        }
    }

    //Save ClinicalDetails
    public function saveClinicalDetails()
    {
        $this->form_validation->set_rules('clinical_detail', 'Clinical Details', 'trim|required');
        if ($this->form_validation->run()) {
            $data['clinical_detail'] = $this->input->post('clinical_detail');
            $result = $this->master->insert('tbl_clinical_details', $data);
            if ($result > 0) {
                $response = array('status' => 'success', 'message' => 'Clinical Details added successfully', 'url' => base_url('admin/clinical-details'));
                echo json_encode($response);
                return false;
            } else {
                $response = array('status' => 'errors', 'message' => 'Something went wrong');
                echo json_encode($response);
                return false;
            }
        } else {
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'clinical_detail' => form_error('clinical_detail')
                )
            );
            echo json_encode($response);
            return false;
        }
    }

    //Save ClinicalDetails
    public function updateClinicalDetails()
    {
        $this->form_validation->set_rules('clinical_detail', 'Clinical Details', 'trim|required');
        if ($this->form_validation->run()) {
            $data['clinical_detail'] = $this->input->post('clinical_detail');
            $result = $this->master->updateRecord('tbl_clinical_details', array('id' => $this->input->post('clinical_detail_id')), $data);
            $response = array('status' => 'success', 'message' => 'Clinical Details updated successfully', 'url' => base_url('admin/clinical-details'));
            echo json_encode($response);
            return true;
        } else {
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'clinical_detail' => form_error('clinical_detail')
                )
            );
            echo json_encode($response);
            return false;
        }
    }

    public function deleteClinicalDetails()
    {
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_clinical_details', array('id' => $id));
            if ($result > 0) {
                $response = array('status' => 'success', 'message' => 'Clinical Details deleted successfully', 'url' => base_url('admin/clinical-details'));
            } else {
                $response = array('status' => 'errors', 'message' => 'Something went wrong !!!', 'url' => '');
            }
        } else {
            $response = array('status' => 'errors', 'message' => 'Something went wrong !!!', 'url' => '');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}

