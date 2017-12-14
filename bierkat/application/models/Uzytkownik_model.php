<?php
class Uzytkownik_model extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function sprawdz_czy_zalogowany() {
    if(!$this->session->userdata('zalogowany')) redirect(site_url());
  }

  public function zalogowany() {
    return $this->session->userdata('zalogowany');
  }

  public function czy_wlasciciel($id) {
    return $this->db->get_where('ogloszenia',array('id'=>$id,'id_uzytkownika'=>$this->session->userdata('id')))->result_array();
  }

  public function rejestracja() {
    $data=array(
      'login'=>$this->input->post('login'),
      'haslo'=>md5($this->input->post('haslo1')),
      'imie'=>$this->input->post('imie'),
      'nazwisko'=>$this->input->post('nazwisko'),
      'miasto'=>$this->input->post('miasto'),
      'telefon'=>$this->input->post('numer')
    );
    if($this->db->insert('uzytkownicy',$data)) $this->session->set_flashdata('alert','Zarejestrowano');
    else $this->session->set_flashdata('alert','Nie zarejestrowano');
  }

  public function logowanie() {
    $data=array(
      'login'=>$this->input->post('login'),
      'haslo'=>md5($this->input->post('haslo'))
    );
    $r=$this->db->get_where('uzytkownicy',$data)->row_array();
    if($r) {
      $this->session->set_userdata(array(
        'zalogowany'=>true,
        'id'=>$r['id'],
        'imie'=>$r['imie'],
        'nazwisko'=>$r['nazwisko'],
        'login'=>$r['login'],
        'miasto'=>$r['miasto'],
        'telefon'=>$r['telefon']));
    }
    else $this->session->set_flashdata('alert','Zły login lub hasło.');
  }

  public function wyloguj() {
    $this->session->sess_destroy();
    redirect(site_url());
  }

  public function wczytaj_aktywne() {
    $data=date('Y-m-d');
    $this->db->where("koniec>='$data'");
    return $this->db->get_where('ogloszenia',array('id_uzytkownika'=>$this->session->userdata('id')))->result_array();
  }

  public function wczytaj_nieaktywne() {
    $data=date('Y-m-d');
    $this->db->where("koniec<'$data'");
    return $this->db->get_where('ogloszenia',array('id_uzytkownika'=>$this->session->userdata('id')))->result_array();
  }

  public function wczytaj_kategorie() {
    return $this->db->get('kategorie')->result_array();
  }

  public function odnow_ogloszenie($id) {
    if($this->db->update('ogloszenia',array('koniec'=>date('Y-m-d',strtotime('+1 month'))),array('id'=>$id))) $this->session->set_flashdata('alert','Odnowiono ogłoszenie');
    else $this->session->set_flashdata('alert','Nie odnowiono ogłoszenia');
  }

  public function wyroznij_ogloszenie($id) {
    if($this->db->update('ogloszenia',array('wyroznione_do'=>date('Y-m-d',strtotime('+14 days'))),array('id'=>$id))) $this->session->set_flashdata('alert','Wyróżniono ogłoszenie');
    else $this->session->set_flashdata('alert','Nie wyróżniono ogłoszenia');
  }

  public function usun_ogloszenie($id) {
    if($this->db->delete('ogloszenia',array('id'=>$id))) $this->session->set_flashdata('alert','Usunięto ogłoszenie');
    else $this->session->set_flashdata('alert','Nie usunięto ogłoszenia');
  }

  public function nowe_ogloszenie() {
    $file=$_FILES['zdjecie'];
    $zdjecie='zdjecia/'.$this->input->post('nazwa').date('YmdHis').$this->session->userdata('id');
    $tmp=$file['tmp_name'];
    $name=$file['name'];
    $koniec = pathinfo($name,PATHINFO_EXTENSION);
    if(is_uploaded_file($tmp)) {
      $zdjecie=$zdjecie.'.'.$koniec;
      if(!move_uploaded_file($tmp,$zdjecie)) $zdjecie='';
    }
    else $zdjecie='';
    $data=array(
      'id_kategorii'=>$this->input->post('kategoria'),
      'id_uzytkownika'=>$this->session->userdata('id'),
      'nazwa'=>$this->input->post('nazwa'),
      'opis'=>$this->input->post('opis'),
      'cena'=>$this->input->post('cena'),
      'koniec'=>date('Y-m-d',strtotime('+1 month')),
      'wyroznione_do'=>null,
      'sciezka_zdjecia'=>$zdjecie,
      'atrybut1'=>$this->input->post('atrybut1'),
      'atrybut2'=>$this->input->post('atrybut2'),
      'atrybut3'=>$this->input->post('atrybut3'),
      'atrybut4'=>$this->input->post('atrybut4'),
      'atrybut5'=>$this->input->post('atrybut5')
    );
    if($this->db->insert('ogloszenia',$data)) $this->session->set_flashdata('alert','Dodano ogłoszenie');
    else $this->session->set_flashdata('alert','Nie dodano ogłoszenia');
  }
}
