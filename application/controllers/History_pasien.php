<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class History_pasien extends CI_Controller
{

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();

        $this->load->model('History_pasien_model');
        $this->load->library('form_validation');

        if (!$this->session->userdata('logined') || $this->session->userdata('logined') != true) {
            redirect('/');
        }
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('history_pasien/history_pasien_list');
    }
    public function dashboard()
    {

        $this->load->view('history_pasien/dashboard');
    }
    public function telp()
    {
        $users=$this->db->query('select * from user where role="perawat"')->result();
        // print_r($users);
        foreach ($users as $key => $value) {
            $curl444 = curl_init();
                curl_setopt_array($curl444, array(
                    CURLOPT_URL => "https://api.thebigbox.id/voice-notif/1.0.0/broadcast",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\n  \"text\": \"Selamat Pagi ".$value->nama.". Kami ingin memberitahu bahwa infus Pasien A sudah habis. Mohon Bantuannya untuk datang ke kamar Flamboyan. Terimakasih\",\n  \"phone\": \"".$value->no_hp."\",\n  \"repeat\": \"1\"\n}",
                    CURLOPT_HTTPHEADER => array(
                        "accept: application/json",
                        "cache-control: no-cache",
                        "content-type: application/json",
                        "postman-token: a402e83b-a4da-3c49-64d9-238a3c8d0ee4",
                        "x-api-key: K4RKq1AUT55K7j1ASQsFBtsC1PE4vxvt",
                    ),
                ));
    
                $response = curl_exec($curl444);
                $err = curl_error($curl444);
    
                curl_close($curl444);
                if ($err) {
                    echo "cURL Error #:" . $err;
                  } else {
                    echo $response;
                  }
        }
        
    }
    public function telegram()
    {
     

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.telegram.org/bot903006008:AAERTu5luHD1ylwRBYGkguu65K3kYvnR07U/sendMessage?chat_id=777338015&text=Selamat%20pagi%20.%20Kami%20ingin%20memberitahu%20bahwa%%20Pasien%20A%20membutuhkan%20Pertolongan.%20Mohon%20Bantuannya%20untuk%20datang%20ke%20kamar%20Flamboyan.%20Terimakasih",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "postman-token: dbaa3d7a-170c-289c-17f2-d04b016aa7ce"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
    public function telegram_infus()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.telegram.org/bot903006008:AAERTu5luHD1ylwRBYGkguu65K3kYvnR07U/sendMessage?chat_id=777338015&text=Selamat%20pagi%20.%20Kami%20ingin%20memberitahu%20bahwa%20infus%20Pasien%20A%20sudah%20habis.%20Mohon%20Bantuannya%20untuk%20datang%20ke%20kamar%20Flamboyan.%20Terimakasih",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "postman-token: a201745b-c186-b6ba-fb8f-1e55819418e8"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
    public function telp_panic()
    {
        $users=$this->db->query('select * from user where role="perawat"')->result();
        // print_r($users);
        foreach ($users as $key => $value) {
            $curl444 = curl_init();
                curl_setopt_array($curl444, array(
                    CURLOPT_URL => "https://api.thebigbox.id/voice-notif/1.0.0/broadcast",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\n  \"text\": \"Selamat Pagi ".$value->nama.". Kami ingin memberitahu bahwa pasien di Ruang Flamboyan membutuhkan pertolongan. Mohon Bantuannya untuk datang ke kamar Flamboyan. Terimakasih\",\n  \"phone\": \"".$value->no_hp."\",\n  \"repeat\": \"1\"\n}",
                    CURLOPT_HTTPHEADER => array(
                        "accept: application/json",
                        "cache-control: no-cache",
                        "content-type: application/json",
                        "postman-token: a402e83b-a4da-3c49-64d9-238a3c8d0ee4",
                        "x-api-key: K4RKq1AUT55K7j1ASQsFBtsC1PE4vxvt",
                    ),
                ));
    
                $response = curl_exec($curl444);
                $err = curl_error($curl444);
    
                curl_close($curl444);
                if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              echo $response;
            }
        }
        
    }
    public function sms_panic()
    {
        $users=$this->db->query('select * from user where role="pasien"')->result();
        // print_r($users);
        foreach ($users as $key => $value) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.thebigbox.id/sms-notification/1.0.0/messages",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "msisdn=".$value->no_hp."&content=Selamat%20Pagi%20.%20Kami%20ingin%20memberitahu%20bahwa%20pasien%20di%20Ruang%20Flamboyan%20membutuhkan%20pertolongan.%20Mohon%20Bantuannya%20untuk%20datang%20ke%20kamar%20Flamboyan.%20Terimakasih",
              CURLOPT_HTTPHEADER => array(
                "accept: application/x-www-form-urlencoded",
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "postman-token: a1a4c24c-db68-e59f-50c7-a70f5facf004",
                "x-api-key: Kt9C3mSgBem2Zlj8qIftjPueMOugyAcr"
              ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              echo $response;
            }
            }
    }
    public function sms()
    {
        $users=$this->db->query('select * from user where role="pasien"')->result();
        // print_r($users);
        foreach ($users as $key => $value) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.thebigbox.id/sms-notification/1.0.0/messages",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "msisdn=".$value->no_hp."&content=Selamat%20pagi%20.%20Kami%20ingin%20memberitahu%20bahwa%20infus%20Pasien%20A%20sudah%20habis.%20Mohon%20Bantuannya%20untuk%20datang%20ke%20kamar%20Flamboyan.%20Terimakasih",
              CURLOPT_HTTPHEADER => array(
                "accept: application/x-www-form-urlencoded",
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "postman-token: a1a4c24c-db68-e59f-50c7-a70f5facf004",
                "x-api-key: Kt9C3mSgBem2Zlj8qIftjPueMOugyAcr"
              ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            
            curl_close($curl);
            
            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              echo $response;
            }
            }
    }

    public function get_button()
    {

        $curl3 = curl_init();

        curl_setopt_array($curl3, array(
            CURLOPT_PORT => "8443",
            CURLOPT_URL => "https://platform.antares.id:8443/~/antares-cse/antares-id/SHM/CNT-21/la",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "cache-control: no-cache",
                "content-type: application/json;ty=4",
                "postman-token: 0c93040d-f57e-82a5-d397-5eacb3daca1c",
                "x-m2m-origin: a8cc892ea6103cf6:258ea5744af982a3",
            ),
        ));

        $response = curl_exec($curl3);
        $err = curl_error($curl3);

        curl_close($curl3);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //echo $response;
            $someArray = json_decode($response, true);
            $encode_lagi = json_encode($someArray['m2m:cin']['con'], true);
//   print_r(json_decode($encode_lagi,true));
            $data_akhir = json_decode($encode_lagi, true);
// echo $data_akhir;'
            $data_simpan = [];
            $data_akhir = str_replace("{", "", $data_akhir);
            $data_akhir = str_replace("}", "", $data_akhir);
            $data_akhir = explode(',', $data_akhir);
            for ($i = 0; $i < count($data_akhir); $i++) {
                // echo $data_akhir[$i];
                $tes = str_replace('"', "", $data_akhir[$i]);
                // echo $tes;
                $fix = explode(':', $tes);
                if ($i == 0) {
                    $data_simpan[$i] = $fix[1];
                } else {
                    $data_simpan[$i] = $fix[1];
                }

            }
            // echo $data_simpan[1];
            if ($data_simpan[1] == 1) {
                # code...
            } else if ($data_simpan[1] == 2) {
                $curl44 = curl_init();

                curl_setopt_array($curl44, array(
                    CURLOPT_URL => "https://api.thebigbox.id/sms-notification/1.0.0/messages",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "msisdn=082284809665&content=Mohon%20bantuanya%20bapak%2Fibu%20perawat%20untuk%20datang%20ke%20ruang",
                    CURLOPT_HTTPHEADER => array(
                        "accept: application/x-www-form-urlencoded",
                        "cache-control: no-cache",
                        "content-type: application/x-www-form-urlencoded",
                        "postman-token: a402e83b-a4da-3c49-64d9-238a3c8d0ee4",
                        "x-api-key: K4RKq1AUT55K7j1ASQsFBtsC1PE4vxvt",
                    ),
                ));

                $response = curl_exec($curl44);
                $err = curl_error($curl44);

                curl_close($curl44);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    // echo $response;
                }
            }else if ($data_simpan[1]==3) {
                $curl444 = curl_init();
                curl_setopt_array($curl444, array(
                    CURLOPT_URL => "https://api.thebigbox.id/voice-notif/1.0.0/broadcast",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\n  \"text\": \"Selamat malam keluarga si A. Kami ingin memberitahu bahwa infus saudara A sudah habis\",\n  \"phone\": \"081275575929\",\n  \"repeat\": \"1\"\n}",
                    CURLOPT_HTTPHEADER => array(
                        "accept: application/json",
                        "cache-control: no-cache",
                        "content-type: application/json",
                        "postman-token: 6f295d72-7b64-f524-ded7-ca4c8e602705",
                        "x-api-key: K4RKq1AUT55K7j1ASQsFBtsC1PE4vxvt",
                    ),
                ));
    
                $response = curl_exec($curl444);
                $err = curl_error($curl444);
    
                curl_close($curl444);
            }
            echo $data_simpan[1];

        }

// echo $data_infus;
    }
    public function tekan_button_perawat()
    {
        $cek2 = $this->db->query("select * from button ORDER BY `button`.`id_button` ASC")->row();
        $cek2 = $this->db->query("UPDATE `button` SET `counter`=0 WHERE id_button=" . $cek2->id_button);
    }
    public function get_infus()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "8443",
            CURLOPT_URL => "https://platform.antares.id:8443/~/antares-cse/antares-id/SHM/CNT-11/la",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "cache-control: no-cache",
                "content-type: application/json;ty=4",
                "postman-token: c3390096-6021-bcab-bff9-23adeb3d024e",
                "x-m2m-origin: a8cc892ea6103cf6:258ea5744af982a3",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $data_infus = 0;
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
//   echo $response;
            $someArray = json_decode($response, true);
            $encode_lagi = json_decode($someArray['m2m:cin']['con'], true);
            $data_infus = $encode_lagi['Data'];
        }

        if ($data_infus <10&&$data_infus>2) {
            $curl2 = curl_init();

            curl_setopt_array($curl2, array(
                CURLOPT_URL => "https://api.thebigbox.id/voice-notif/1.0.0/broadcast",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\n  \"text\": \"Selamat malam keluarga si A. Kami ingin memberitahu bahwa infus saudara A sudah habis\",\n  \"phone\": \"081275575929\",\n  \"repeat\": \"1\"\n}",
                CURLOPT_HTTPHEADER => array(
                    "accept: application/json",
                    "cache-control: no-cache",
                    "content-type: application/json",
                    "postman-token: 6f295d72-7b64-f524-ded7-ca4c8e602705",
                    "x-api-key: K4RKq1AUT55K7j1ASQsFBtsC1PE4vxvt",
                ),
            ));

            $response = curl_exec($curl2);
            $err = curl_error($curl2);

            curl_close($curl2);
        } else {

        }

        echo $data_infus;
    }
    public function json()
    {
        header('Content-Type: application/json');
        echo $this->History_pasien_model->json();
    }

    public function read($id)
    {
        $row = $this->History_pasien_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_history' => $row->id_history,
                'id_pasien' => $row->id_pasien,
                'id_dokter' => $row->id_dokter,
                'id_ruangan' => $row->id_ruangan,
                'jumlah_infus' => $row->jumlah_infus,
                'ekg' => $row->ekg,
            );
            $this->load->view('history_pasien/history_pasien_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('history_pasien'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('history_pasien/create_action'),
            'id_history' => set_value('id_history'),
            'id_pasien' => set_value('id_pasien'),
            'id_dokter' => set_value('id_dokter'),
            'id_ruangan' => set_value('id_ruangan'),
            'jumlah_infus' => set_value('jumlah_infus'),
            'ekg' => set_value('ekg'),
        );
        $this->load->view('history_pasien/history_pasien_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
                'id_pasien' => $this->input->post('id_pasien', true),
                'id_dokter' => $this->input->post('id_dokter', true),
                'id_ruangan' => $this->input->post('id_ruangan', true),
                'jumlah_infus' => $this->input->post('jumlah_infus', true),
                'ekg' => $this->input->post('ekg', true),
            );

            $this->History_pasien_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('history_pasien'));
        }
    }

    public function update($id)
    {
        $row = $this->History_pasien_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('history_pasien/update_action'),
                'id_history' => set_value('id_history', $row->id_history),
                'id_pasien' => set_value('id_pasien', $row->id_pasien),
                'id_dokter' => set_value('id_dokter', $row->id_dokter),
                'id_ruangan' => set_value('id_ruangan', $row->id_ruangan),
                'jumlah_infus' => set_value('jumlah_infus', $row->jumlah_infus),
                'ekg' => set_value('ekg', $row->ekg),
            );
            $this->load->view('history_pasien/history_pasien_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('history_pasien'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('id_history', true));
        } else {
            $data = array(
                'id_pasien' => $this->input->post('id_pasien', true),
                'id_dokter' => $this->input->post('id_dokter', true),
                'id_ruangan' => $this->input->post('id_ruangan', true),
                'jumlah_infus' => $this->input->post('jumlah_infus', true),
                'ekg' => $this->input->post('ekg', true),
            );

            $this->History_pasien_model->update($this->input->post('id_history', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('history_pasien'));
        }
    }

    public function delete($id)
    {
        $row = $this->History_pasien_model->get_by_id($id);

        if ($row) {
            $this->History_pasien_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('history_pasien'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('history_pasien'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_pasien', 'id pasien', 'trim|required');
        $this->form_validation->set_rules('id_dokter', 'id dokter', 'trim|required');
        $this->form_validation->set_rules('id_ruangan', 'id ruangan', 'trim|required');
        $this->form_validation->set_rules('jumlah_infus', 'jumlah infus', 'trim|required');
        $this->form_validation->set_rules('ekg', 'ekg', 'trim|required');

        $this->form_validation->set_rules('id_history', 'id_history', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file History_pasien.php */
/* Location: ./application/controllers/History_pasien.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-24 00:42:22 */
/* http://harviacode.com */
