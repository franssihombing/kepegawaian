<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        $this->load->model('M_admin');
        //cek session dan level user
        if($this->admin->is_role() != "admin"){
            redirect("login/");
        }
    }

    public function index(){

        $data = array(
            'count_staff' => $this->M_admin->count_staff(),
            'count_depart' => $this->M_admin->count_depart(),
            'pegawai' => $this->M_admin->view(),
            'depart' => $this->M_admin->depart(),
            'jabatan' => $this->M_admin->jabatan()
			);
        $this->load->view("admin/dashboard", $data);       

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
        
        
        if($this->M_admin->input_data($data,'pegawai') == TRUE) {
            $this->session->set_flashdata('register', true);
       }
       else {
            $this->session->set_flashdata('register', false);
       }

		redirect('admin/dashboard');
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

     if($this->M_admin->update($data, $nik) == TRUE) {
          $this->session->set_flashdata('edit', true);
     }
     else {
          $this->session->set_flashdata('edit', false);
     }
        redirect('admin/dashboard');
    }

    public function updateshow($nik){

        $data = array(
            'depart' => $this->M_admin->depart(),
            'jabatan' => $this->M_admin->jabatan(),
            'detail' => $this->M_admin->detail_staff($nik)
        );
        
		$this->load->view('admin/updateshow', $data);
      }

      public function delete($nik){

          if($this->db->delete('pegawai', array('nik' => $nik)) == TRUE) {
            $this->session->set_flashdata('hapus', true);
        }
        else {
                $this->session->set_flashdata('hapus', false);
        }
        redirect('admin/dashboard');

      }


    //  START CONTROLLER DEPARTEMENT

    public function departement(){

        $data = array(
            'depart' => $this->M_admin->depart(),
			);
        $this->load->view("admin/departement", $data);       

    }

    function tambah_depart(){
 
		$data = array(
			'nm_departement' => $this->input->post('nm_departement'),
            'keterangan' => $this->input->post('keterangan'),
			);
        
        
        if($this->M_admin->tambah_depart($data,'departement') == TRUE) {
            $this->session->set_flashdata('tambah', true);
       }
       else {
            $this->session->set_flashdata('tambah', false);
       }

		redirect('admin/departement');
    }



    public function update_depart(){
  
        $id =  $this->input->post('id_departement');

        $data = array(
            'nm_departement' => $this->input->post('nm_departement'),
			'keterangan' => $this->input->post('keterangan'),
            
        );

     if($this->M_admin->update_depart($data, $id) == TRUE) {
          $this->session->set_flashdata('edit', true);
     }
     else {
          $this->session->set_flashdata('edit', false);
     }
        redirect('admin/departement');
    }

    public function updateshow_depart($nik){

        $data = array(
            'detail' => $this->M_admin->detail_depart($nik)
        );
        
		$this->load->view('admin/updateshow_depart', $data);
      }


    public function delete_depart($id){

        if($this->db->delete('departement', array('id_departement' => $id)) == TRUE) {
          $this->session->set_flashdata('hapus', true);
      }
      else {
              $this->session->set_flashdata('hapus', false);
      }
      redirect('admin/departement');

    }
    
    //  END CONTROLLER DEPARTEMENT


    //  START CONTROLLER JABATAN

    public function jabatan(){

        $data = array(
            'jabatan' => $this->M_admin->jabatan(),
			);
        $this->load->view("admin/jabatan", $data);       

    }

    function tambah_jabatan(){
 
		$data = array(
			'jabatan' => $this->input->post('jabatan'),
			);
        
        
        if($this->M_admin->tambah_jabatan($data,'jabatan') == TRUE) {
            $this->session->set_flashdata('tambah', true);
       }
       else {
            $this->session->set_flashdata('tambah', false);
       }

		redirect('admin/jabatan');
    }



    public function update_jabatan(){
  
        $id =  $this->input->post('id_jabatan');

        $data = array(
            'jabatan' => $this->input->post('jabatan'),
        );

     if($this->M_admin->update_jabatan($data, $id) == TRUE) {
          $this->session->set_flashdata('edit', true);
     }
     else {
          $this->session->set_flashdata('edit', false);
     }
        redirect('admin/jabatan');
    }

    public function updateshow_jabatan($id){

        $data = array(
            'detail' => $this->M_admin->detail_jabatan($id)
        );
        
		$this->load->view('admin/updateshow_jabatan', $data);
      }


    public function delete_jabatan($id){

        if($this->db->delete('jabatan', array('id_jabatan' => $id)) == TRUE) {
          $this->session->set_flashdata('hapus', true);
      }
      else {
              $this->session->set_flashdata('hapus', false);
      }
      redirect('admin/jabatan');

    }
    
    //  END CONTROLLER JABATAN

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }




}