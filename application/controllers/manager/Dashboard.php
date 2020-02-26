<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        $this->load->model('M_manager');
        //cek session dan level user
        if($this->admin->is_role() != "manager"){
            redirect("login/");
        }
    }



    //  START CONTROLLER 

    public function index(){


        $data = array(
            'count_staff' => $this->M_manager->count_staff(),
            'count_depart' => $this->M_manager->count_depart(),
            'staff' => $this->M_manager->staff(),
            'depart' => $this->M_manager->depart(),
            'jabatan' => $this->M_manager->jabatan(),
            'detail' => $this->M_manager->detail_staff_d()
			);
        $this->load->view("manager/dashboard", $data);       

    }

    function tambah_aksi(){
 
		$data = array(
			'nik' => $this->input->post('nik'),
			'nm_pegawai' => $this->input->post('nm_pegawai'),
            'password' => MD5($this->input->post('password')),
            'departement_id' => $this->input->post('departement_id'),
            'jabatan_id' => $this->input->post('jabatan_id'),
            'role' => 'pegawai',
			);
        
        
        if($this->M_manager->input_data($data,'pegawai') == TRUE) {
            $this->session->set_flashdata('register', true);
       }
       else {
            $this->session->set_flashdata('register', false);
       }

		redirect('manager/dashboard');
    }


    public function update(){
  
        $nik =  $this->input->post('nik');

        $data = array(
            'nik' => $this->input->post('nik'),
			'nm_pegawai' => $this->input->post('nm_pegawai'),
            'password' => $this->input->post('password'),
            'departement_id' => $this->input->post('departement_id'),
            'jabatan_id' => $this->input->post('jabatan_id'),
        );

     if($this->M_manager->update($data, $nik) == TRUE) {
          $this->session->set_flashdata('edit', true);
     }
     else {
          $this->session->set_flashdata('edit', false);
     }
        redirect('manager/dashboard');
    }

    public function updateshow($nik){

        $data = array(
            'depart' => $this->M_manager->depart(),
            'jabatan' => $this->M_manager->jabatan(),
            'detail' => $this->M_manager->detail_staff($nik)
        );
        
		$this->load->view('manager/updateshow', $data);
      }

      public function delete($nik){

          if($this->db->delete('pegawai', array('nik' => $nik)) == TRUE) {
            $this->session->set_flashdata('hapus', true);
        }
        else {
                $this->session->set_flashdata('hapus', false);
        }
        redirect('manager/dashboard');

      }

    
    //  END CONTROLLER 

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}