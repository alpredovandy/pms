<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Checkup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Checkup_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('checkup/checkup_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Checkup_model->json();
    }

    public function read($id) 
    {
        $row = $this->Checkup_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_checkup' => $row->id_checkup,
		'id_pasien' => $row->id_pasien,
		'keluhan' => $row->keluhan,
		'hasil_tensi' => $row->hasil_tensi,
		'suhu' => $row->suhu,
		'hasil_analisa' => $row->hasil_analisa,
		'sistol' => $row->sistol,
		'distol' => $row->distol,
		'denyut_jantung' => $row->denyut_jantung,
		'status' => $row->status,
	    );
            $this->load->view('checkup/checkup_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('checkup'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('checkup/create_action'),
	    'id_checkup' => set_value('id_checkup'),
	    'id_pasien' => set_value('id_pasien'),
	    'keluhan' => set_value('keluhan'),
	    'hasil_tensi' => set_value('hasil_tensi'),
	    'suhu' => set_value('suhu'),
	    'hasil_analisa' => set_value('hasil_analisa'),
	    'sistol' => set_value('sistol'),
	    'distol' => set_value('distol'),
	    'denyut_jantung' => set_value('denyut_jantung'),
	    'status' => set_value('status'),
	);
        $this->load->view('checkup/checkup_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pasien' => $this->input->post('id_pasien',TRUE),
		'keluhan' => $this->input->post('keluhan',TRUE),
		'hasil_tensi' => $this->input->post('hasil_tensi',TRUE),
		'suhu' => $this->input->post('suhu',TRUE),
		'hasil_analisa' => $this->input->post('hasil_analisa',TRUE),
		'sistol' => $this->input->post('sistol',TRUE),
		'distol' => $this->input->post('distol',TRUE),
		'denyut_jantung' => $this->input->post('denyut_jantung',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Checkup_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('checkup'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Checkup_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('checkup/update_action'),
		'id_checkup' => set_value('id_checkup', $row->id_checkup),
		'id_pasien' => set_value('id_pasien', $row->id_pasien),
		'keluhan' => set_value('keluhan', $row->keluhan),
		'hasil_tensi' => set_value('hasil_tensi', $row->hasil_tensi),
		'suhu' => set_value('suhu', $row->suhu),
		'hasil_analisa' => set_value('hasil_analisa', $row->hasil_analisa),
		'sistol' => set_value('sistol', $row->sistol),
		'distol' => set_value('distol', $row->distol),
		'denyut_jantung' => set_value('denyut_jantung', $row->denyut_jantung),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('checkup/checkup_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('checkup'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_checkup', TRUE));
        } else {
            $data = array(
		'id_pasien' => $this->input->post('id_pasien',TRUE),
		'keluhan' => $this->input->post('keluhan',TRUE),
		'hasil_tensi' => $this->input->post('hasil_tensi',TRUE),
		'suhu' => $this->input->post('suhu',TRUE),
		'hasil_analisa' => $this->input->post('hasil_analisa',TRUE),
		'sistol' => $this->input->post('sistol',TRUE),
		'distol' => $this->input->post('distol',TRUE),
		'denyut_jantung' => $this->input->post('denyut_jantung',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Checkup_model->update($this->input->post('id_checkup', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('checkup'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Checkup_model->get_by_id($id);

        if ($row) {
            $this->Checkup_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('checkup'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('checkup'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pasien', 'id pasien', 'trim|required');
	$this->form_validation->set_rules('keluhan', 'keluhan', 'trim|required');
	$this->form_validation->set_rules('hasil_tensi', 'hasil tensi', 'trim|required');
	$this->form_validation->set_rules('suhu', 'suhu', 'trim|required');
	$this->form_validation->set_rules('hasil_analisa', 'hasil analisa', 'trim|required');
	$this->form_validation->set_rules('sistol', 'sistol', 'trim|required');
	$this->form_validation->set_rules('distol', 'distol', 'trim|required');
	$this->form_validation->set_rules('denyut_jantung', 'denyut jantung', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_checkup', 'id_checkup', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Checkup.php */
/* Location: ./application/controllers/Checkup.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-24 00:42:22 */
/* http://harviacode.com */