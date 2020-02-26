<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_manager extends CI_Model {
  
    public function count_staff(){
        $query = $this->db->query('SELECT * FROM pegawai');
        return $query->num_rows();
    }

    public function count_depart(){
        $query = $this->db->query('SELECT * FROM departement');
        return $query->num_rows();
    }

  public function staff(){

    
    $departement_id = $this->session->userdata("departement_id");

    $this->db->select('*');
    $this->db->from('pegawai');
    $this->db->join('departement','departement.id_departement=pegawai.departement_id');
    $this->db->join('jabatan','jabatan.id_jabatan=pegawai.jabatan_id');
    $this->db->where('departement_id', $departement_id);
    $query = $this->db->get();
    return $query->result();
  }


  public function depart(){
    return $this->db->get('departement')->result();
  }

  public function jabatan(){
    return $this->db->get('jabatan')->result();
  }
  
  public function detail_staff($nik = NULL){
    $query = $this->db->get_where('pegawai' , array('nik' => $nik))->row();
    return $query;
  }

  public function detail_staff_d(){

    $nik = $this->session->userdata("nik");
    $this->db->from('pegawai');
    $this->db->join('departement','departement.id_departement=pegawai.departement_id');
    $this->db->join('jabatan','jabatan.id_jabatan=pegawai.jabatan_id');
    $this->db->where('nik', $nik);
    $query = $this->db->get();
    return $query->result();
  }

  function input_data($data,$table){
    $this->db->insert($table,$data);
    return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
  }
  
  public function update($data, $nik){
     $this->db->update('pegawai', $data, array('nik' => $nik));
     return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
  }

  
}