<?php
class Wiadomosci extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('uzytkownik_model');
    $this->load->model('wiadomosci_model');
  }

  public function index() {
    $this->uzytkownik_model->sprawdz_czy_zalogowany();

    $data['rozmowy']=$this->wiadomosci_model->wczytaj_rozmowy();
    $data['tytul']='Wiadomości';

    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/nawigacja');
    $this->load->view('wiadomosci/index');
    $this->load->view('szablon/koniec');
  }

  public function rozmowa($id=false) {
    if(!$id) show_404();

    $this->uzytkownik_model->sprawdz_czy_zalogowany();
    $this->form_validation->set_rules('tresc','Treść','required');

    if($this->form_validation->run()) {
      $this->wiadomosci_model->wyslij_wiadomosc($id);
      redirect('wiadomosci/rozmowa/'.$id);
    }

    $data['wiadomosci']=$this->wiadomosci_model->wczytaj_wiadomosci($id);
    $data['id_rozmowy']=$id;
    $data['tytul']='Rozmowa';
    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/nawigacja');
    $this->load->view('wiadomosci/rozmowa');
    $this->load->view('szablon/koniec');
  }
}
