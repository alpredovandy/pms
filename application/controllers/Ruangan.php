<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ruangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Ruangan_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('ruangan/ruangan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Ruangan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Ruangan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_ruangan' => $row->id_ruangan,
		'nama_ruangan' => $row->nama_ruangan,
		'nomor_ruangan' => $row->nomor_ruangan,
		'kapasitas' => $row->kapasitas,
	    );
            $this->load->view('ruangan/ruangan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ruangan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ruangan/create_action'),
	    'id_ruangan' => set_value('id_ruangan'),
	    'nama_ruangan' => set_value('nama_ruangan'),
	    'nomor_ruangan' => set_value('nomor_ruangan'),
	    'kapasitas' => set_value('kapasitas'),
	);
        $this->load->view('ruangan/ruangan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_ruangan' => $this->input->post('nama_ruangan',TRUE),
		'nomor_ruangan' => $this->input->post('nomor_ruangan',TRUE),
		'kapasitas' => $this->input->post('kapasitas',TRUE),
	    );

            $this->Ruangan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ruangan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ruangan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ruangan/update_action'),
		'id_ruangan' => set_value('id_ruangan', $row->id_ruangan),
		'nama_ruangan' => set_value('nama_ruangan', $row->nama_ruangan),
		'nomor_ruangan' => set_value('nomor_ruangan', $row->nomor_ruangan),
		'kapasitas' => set_value('kapasitas', $row->kapasitas),
	    );
            $this->load->view('ruangan/ruangan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ruangan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ruangan', TRUE));
        } else {
            $data = array(
		'nama_ruangan' => $this->input->post('nama_ruangan',TRUE),
		'nomor_ruangan' => $this->input->post('nomor_ruangan',TRUE),
		'kapasitas' => $this->input->post('kapasitas',TRUE),
	    );

            $this->Ruangan_model->update($this->input->post('id_ruangan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ruangan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ruangan_model->get_by_id($id);

        if ($row) {
            $this->Ruangan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ruangan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ruangan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_ruangan', 'nama ruangan', 'trim|required');
	$this->form_validation->set_rules('nomor_ruangan', 'nomor ruangan', 'trim|required');
	$this->form_validation->set_rules('kapasitas', 'kapasitas', 'trim|required');

	$this->form_validation->set_rules('id_ruangan', 'id_ruangan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Ruangan.php */
/* Location: ./application/controllers/Ruangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-24 00:42:22 */
/* http://harviacode.com */