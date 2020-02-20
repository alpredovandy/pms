<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('user/user_list');
    } 
    public function pasien()
    {
        $data['role']='pasien';
        $this->load->view('user/user_list_pasien',$data);
    }
    public function dokter()
    {

        $data['role']='dokter';
        $this->load->view('user/user_list',$data);
    }
    public function perawat()
    {
        $data['role']='perawat';
        $this->load->view('user/user_list',$data);
    }
    public function json() {
        header('Content-Type: application/json');
        echo $this->User_model->json();
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user' => $row->id_user,
		'nama' => $row->nama,
		'no_hp' => $row->no_hp,
		'email' => $row->email,
		'jk' => $row->jk,
		'username' => $row->username,
		'password' => $row->password,
		'foto' => $row->foto,
		'nama_keluarga' => $row->nama_keluarga,
		'alamat_keluarga' => $row->alamat_keluarga,
		'email_keluarga' => $row->email_keluarga,
		'no_hp_keluarga' => $row->no_hp_keluarga,
		'role' => $row->role,
	    );
            $this->load->view('user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create($role="") 
    {  
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'id_user' => set_value('id_user'),
	    'nama' => set_value('nama'),
	    'no_hp' => set_value('no_hp'),
	    'email' => set_value('email'),
	    'jk' => set_value('jk'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'foto' => set_value('foto'),
	    'nama_keluarga' => set_value('nama_keluarga'),
	    'alamat_keluarga' => set_value('alamat_keluarga'),
	    'email_keluarga' => set_value('email_keluarga'),
	    'no_hp_keluarga' => set_value('no_hp_keluarga'),
	    'role' => $role,
	);
        $this->load->view('user/user_form', $data);
    }

    public function create_pasien() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'id_user' => set_value('id_user'),
	    'nama' => set_value('nama'),
	    'no_hp' => set_value('no_hp'),
	    'email' => set_value('email'),
	    'jk' => set_value('jk'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'foto' => set_value('foto'),
	    'nama_keluarga' => set_value('nama_keluarga'),
	    'alamat_keluarga' => set_value('alamat_keluarga'),
	    'email_keluarga' => set_value('email_keluarga'),
	    'no_hp_keluarga' => set_value('no_hp_keluarga'),
	    'dokter' => set_value('dokter'),
	    'ruangan' => set_value('ruangan'),
	    'role' => 'pasien',
	);
        $this->load->view('user/user_form_pasien', $data);
    }
    
    public function create_action() 
    {
        
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'email' => $this->input->post('email',TRUE),
		'jk' => $this->input->post('jk',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'nama_keluarga' => $this->input->post('nama_keluarga',TRUE),
		'alamat_keluarga' => $this->input->post('alamat_keluarga',TRUE),
		'email_keluarga' => $this->input->post('email_keluarga',TRUE),
		'no_hp_keluarga' => $this->input->post('no_hp_keluarga',TRUE),
		'role' => $this->input->post('role',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user/'.$this->input->post('role',TRUE)));
        
    }
    public function update_pasien($id) 
    {
        
        $row = $this->User_model->get_by_id($id);
        $data = array(
            'button' => 'Update',
            'action' => site_url('user/update_action'),
    'id_user' => set_value('id_user', $row->id_user),
    'nama' => set_value('nama', $row->nama),
    'no_hp' => set_value('no_hp', $row->no_hp),
    'email' => set_value('email', $row->email),
    'jk' => set_value('jk', $row->jk),
    'username' => set_value('username', $row->username),
    'password' => set_value('password', $row->password),
    'foto' => set_value('foto', $row->foto),
    'nama_keluarga' => set_value('nama_keluarga', $row->nama_keluarga),
    'alamat_keluarga' => set_value('alamat_keluarga', $row->alamat_keluarga),
    'email_keluarga' => set_value('email_keluarga', $row->email_keluarga),
    'no_hp_keluarga' => set_value('no_hp_keluarga', $row->no_hp_keluarga),
    'role' => set_value('role', $row->role),
    );
        $this->load->view('user/user_form_pasien', $data);
    }
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'id_user' => set_value('id_user', $row->id_user),
		'nama' => set_value('nama', $row->nama),
		'no_hp' => set_value('no_hp', $row->no_hp),
		'email' => set_value('email', $row->email),
		'jk' => set_value('jk', $row->jk),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'foto' => set_value('foto', $row->foto),
		'nama_keluarga' => set_value('nama_keluarga', $row->nama_keluarga),
		'alamat_keluarga' => set_value('alamat_keluarga', $row->alamat_keluarga),
		'email_keluarga' => set_value('email_keluarga', $row->email_keluarga),
		'no_hp_keluarga' => set_value('no_hp_keluarga', $row->no_hp_keluarga),
		'role' => set_value('role', $row->role),
	    );
            $this->load->view('user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        // $this->_rules();

        
        $data = array(
            'nama' => $this->input->post('nama',TRUE),
            'no_hp' => $this->input->post('no_hp',TRUE),
            'email' => $this->input->post('email',TRUE),
            'jk' => $this->input->post('jk',TRUE),
            'username' => $this->input->post('username',TRUE),
            'password' => $this->input->post('password',TRUE),
            'foto' => $this->input->post('foto',TRUE),
            'nama_keluarga' => $this->input->post('nama_keluarga',TRUE),
            'alamat_keluarga' => $this->input->post('alamat_keluarga',TRUE),
            'email_keluarga' => $this->input->post('email_keluarga',TRUE),
            'no_hp_keluarga' => $this->input->post('no_hp_keluarga',TRUE),
            'dokter' => $this->input->post('dokter',TRUE),
            'ruangan' => $this->input->post('ruangan',TRUE),
            'role' => $this->input->post('role',TRUE),
            );
            // print_r($data);
            $this->User_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user/'. $this->input->post('role',TRUE)));
    }
    
    public function delete($id,$role) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user/'.$role));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user/'.$role));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('jk', 'jk', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('nama_keluarga', 'nama keluarga', 'trim|required');
	$this->form_validation->set_rules('alamat_keluarga', 'alamat keluarga', 'trim|required');
	$this->form_validation->set_rules('email_keluarga', 'email keluarga', 'trim|required');
	$this->form_validation->set_rules('no_hp_keluarga', 'no hp keluarga', 'trim|required');
	$this->form_validation->set_rules('role', 'role', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-24 00:42:22 */
/* http://harviacode.com */