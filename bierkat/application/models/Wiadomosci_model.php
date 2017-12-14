<?php
class Wiadomosci_model extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function wczytaj_rozmowy() {
    $id=$this->session->userdata('id');
    $this->db->where("id_nadawcy='$id' or id_odbiorcy='$id'");
    $wiadomosci=$this->db->get('wiadomosci')->result_array();
    $rozmowy=array();
    foreach($wiadomosci as $a) {
      if($a['id_nadawcy']==$this->session->userdata('id')) $rozmowy[]=$a['id_odbiorcy'];
      else $rozmowy[]=$a['id_nadawcy'];
    }
    $rozmowy=array_unique($rozmowy, SORT_REGULAR);
    if($rozmowy) {
      $this->db->where_in('id',$rozmowy);
      return $this->db->get('uzytkownicy')->result_array();
    }
    else return false;
  }

  public function wczytaj_wiadomosci($id) {
    $id1=$this->session->userdata('id');
    $this->db->order_by('data');
    $this->db->where("(id_nadawcy='$id' and id_odbiorcy='$id1') or (id_nadawcy='$id1' and id_odbiorcy='$id')");
    return $this->db->get('wiadomosci')->result_array();
  }

  public function wyslij_wiadomosc($id) {
    $data=array(
      'id_nadawcy'=>$this->session->userdata('id'),'id_odbiorcy'=>$id,'tresc'=>$this->input->post('tresc'),'data'=>date('Y-m-d H:i:s')
    );
    if($this->db->insert('wiadomosci',$data))   $this->session->set_flashdata('alert','Wysłano wiadomość.');
    else $this->session->set_flashdata('alert','Nie wysłano wiadomości.');
  }
}
