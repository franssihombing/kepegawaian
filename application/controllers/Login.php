<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('admin');
    }

    public function index()
    {

            if($this->admin->is_logged_in())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                if($this->session->userdata("role") == "admin"){
                    redirect('admin/dashboard/');
                }else{
                    redirect('manager/dashboard/');
                }

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('nik', 'nik', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $nik = $this->input->post("nik", TRUE);
                $password = MD5($this->input->post('password', TRUE));

                //checking data via model
                $checking = $this->admin->check_login('pegawai', array('nik' => $nik), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'nik'                 => $apps->nik,
                            'nm_pegawai'          => $apps->nm_pegawai,
                            'user_pass'           => $apps->password,
                            'role'                => $apps->role,
                            'departement_id'      => $apps->departement_id,
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        //redirect berdasarkan level user
                        if($this->session->userdata("role") == "admin"){
                            redirect('admin/dashboard/');
                        }else{
                            redirect('manager/dashboard/');
                        }

                    }
                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> nik atau password salah!</div></div>';
                    $this->load->view('login', $data);
                }

            }else{

                $this->load->view('login');
            }

        }

    }
}
