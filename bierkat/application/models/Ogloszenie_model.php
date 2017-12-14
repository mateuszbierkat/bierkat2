<?php
class Ogloszenie_model extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function czy_ogloszenie_istnieje($id) {
    return $this->db->get_where('ogloszenia',array('id'=>$id))->row_array();
  }

  public function wczytaj_ogloszenie($id) {
    return $this->db->get_where('ogloszenia',array('id'=>$id))->row_array();
  }

  public function wczytaj_ogloszenia($id=false) {
    $data=date('Y-m-d');
    $this->db->where("koniec>='$data'");
    $this->db->order_by('wyroznione_do DESC, koniec DESC');
    if($id) return $this->db->get_where('ogloszenia',array('id_kategorii'=>$id))->result_array();
    else return $this->db->get('ogloszenia')->result_array();
  }
}
