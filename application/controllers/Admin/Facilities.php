<?php


class Facilities extends MY_Controller
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
            $data['facilitiesList'] = $this->master->getRecords('tbl_facilities');
            $this->load->view('admin/facilities/list', $data);
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
            $this->load->view('admin/facilities/add-edit', $data);
        } else {
            $this->session->set_flashdata('error', 'Please login first');
            return redirect('admin');
        }
    }

    public function editFacilities($id)
    {
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings', []);
            $data['singleFacility'] = $this->master->singleRecord('tbl_facilities', array('id' => $id));
            $this->load->view('admin/facilities/add-edit', $data);
        } else {
            $this->session->set_flashdata('error', 'Please login first');
            return redirect('admin');
        }
    }

    //Save Facilities
    public function saveFacilities()
    {
        $this->form_validation->set_rules('facility', 'Facilities', 'trim|required');
        if ($this->form_validation->run()) {
            $data['facility'] = $this->input->post('facility');
            $result = $this->master->insert('tbl_facilities', $data);
            if ($result > 0) {
                $response = array('status' => 'success', 'message' => 'Facilities added successfully', 'url' => base_url('admin/facilities'));
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
                    'facility' => form_error('facility')
                )
            );
            echo json_encode($response);
            return false;
        }
    }

    //Save Facilities
    public function updateFacilities()
    {

        $this->form_validation->set_rules('facility', 'Facilities', 'trim|required');
        if ($this->form_validation->run()) {
            $data['facility'] = $this->input->post('facility');
            $result = $this->master->updateRecord('tbl_facilities', array('id' => $this->input->post('facility_id')), $data);
            $response = array('status' => 'success', 'message' => 'Facilities updated successfully', 'url' => base_url('admin/facilities'));
            echo json_encode($response);
            return true;
        } else {
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'facility' => form_error('facility')
                )
            );
            echo json_encode($response);
            return false;
        }
    }

    public function deleteFacilities()
    {
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_facilities', array('id' => $id));
            if ($result > 0) {
                $response = array('status' => 'success', 'message' => 'Facilities deleted successfully', 'url' => base_url('admin/facilities'));
            } else {
                $response = array('status' => 'errors', 'message' => 'Something went wrong !!!', 'url' => '');
            }
        } else {
            $response = array('status' => 'errors', 'message' => 'Something went wrong !!!', 'url' => '');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}

