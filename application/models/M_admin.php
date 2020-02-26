<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_admin extends CI_Model {
  
  public function count_staff(){
    $query = $this->db->query('SELECT * FROM pegawai');
    return $query->num_rows();
}

public function count_depart(){
    $query = $this->db->query('SELECT * FROM departement');
    return $query->num_rows();
}

  public function view(){
    $this->db->select('*');
    $this->db->from('pegawai');
    $this->db->join('departement','departement.id_departement=pegawai.departement_id');
    $this->db->join('jabatan','jabatan.id_jabatan=pegawai.jabatan_id');
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
  function input_data($data,$table){
    $this->db->insert($table,$data);
    return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
  }
  
  public function update($data, $nik){
     $this->db->update('pegawai', $data, array('nik' => $nik));
     return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
  }


  // START CONTROLLER DEPARTEMENT

  function tambah_depart($data,$table){
    $this->db->insert($table,$data);
    return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
  }

  public function detail_depart($id = NULL){
    $query = $this->db->get_where('departement' , array('id_departement' => $id))->row();
    return $query;
  }

  public function update_depart($data, $id){
    $this->db->update('departement', $data, array('id_departement' => $id));
    return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }

  // START CONTROLLER DEPARTEMENT

  // START CONTROLLER JABATAN

  function tambah_jabatan($data,$table){
    $this->db->insert($table,$data);
    return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
  }

  public function detail_jabatan($id = NULL){
    $query = $this->db->get_where('jabatan' , array('id_jabatan' => $id))->row();
    return $query;
  }

  public function update_jabatan($data, $id){
    $this->db->update('jabatan', $data, array('id_jabatan' => $id));
    return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
   }

  // START CONTROLLER JABATAN
  
}