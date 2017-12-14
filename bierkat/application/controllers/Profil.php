<?php
class Profil extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('uzytkownik_model');
  }

  public function index() {
    $this->uzytkownik_model->sprawdz_czy_zalogowany();

    $data['aktywne']=count($this->uzytkownik_model->wczytaj_aktywne());
    $data['nieaktywne']=count($this->uzytkownik_model->wczytaj_nieaktywne());

    $data['tytul']='Profil';

    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/nawigacja');
    $this->load->view('profil/index');
    $this->load->view('szablon/koniec');
  }

  public function wyloguj() {
    $this->uzytkownik_model->wyloguj();
  }

  public function moje_aktywne() {
    $this->uzytkownik_model->sprawdz_czy_zalogowany();

    $data['ogloszenia']=$this->uzytkownik_model->wczytaj_aktywne();

    $data['tytul']='Twoje aktywne ogłoszenia';

    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/nawigacja');
    $this->load->view('profil/moje_aktywne');
    $this->load->view('szablon/koniec');
  }

  public function moje_nieaktywne() {
    $this->uzytkownik_model->sprawdz_czy_zalogowany();

    $data['ogloszenia']=$this->uzytkownik_model->wczytaj_nieaktywne();

    $data['tytul']='Twoje nieaktywne ogłoszenia';

    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/nawigacja');
    $this->load->view('profil/moje_nieaktywne');
    $this->load->view('szablon/koniec');
  }

  public function wyroznij_ogloszenie($id=false) {
    if(!$id) show_404();

    $this->uzytkownik_model->sprawdz_czy_zalogowany();

    $this->uzytkownik_model->wyroznij_ogloszenie($id);

    redirect('profil/moje_aktywne');
  }

  public function odnow_ogloszenie($id=false) {
    if(!$id) show_404();

    $this->uzytkownik_model->sprawdz_czy_zalogowany();

    $this->uzytkownik_model->odnow_ogloszenie($id);

    redirect('profil/moje_nieaktywne');
  }

  public function usun_ogloszenie($id=false) {
    if(!$id) show_404();

    $this->uzytkownik_model->sprawdz_czy_zalogowany();

    if(!$this->uzytkownik_model->czy_wlasciciel($id)) redirect('profil');

    $this->uzytkownik_model->usun_ogloszenie($id);

    redirect('profil');
  }

  public function nowe_ogloszenie() {
    $this->uzytkownik_model->sprawdz_czy_zalogowany();

    $this->form_validation->set_rules('nazwa','Nazwa','required');
    $this->form_validation->set_rules('kategoria','Kategoria','required');
    $this->form_validation->set_rules('opis','Opis','required');
    $this->form_validation->set_rules('cena','Cena','required|greater_than_equal_to[0]');
    $this->form_validation->set_rules('atrybut1','Atrybut 1','required');
    $this->form_validation->set_rules('atrybut2','Atrybut 2','required');
    $this->form_validation->set_rules('atrybut3','Atrybut 3','required');
    $this->form_validation->set_rules('atrybut4','Atrybut 4','required');
    $this->form_validation->set_rules('atrybut5','Atrybut 5','required');

    if($this->form_validation->run()) $this->uzytkownik_model->nowe_ogloszenie();

    $data['kategorie']=$this->uzytkownik_model->wczytaj_kategorie();

    $data['tytul']='Nowe ogłoszenie';
    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/nawigacja');
    $this->load->view('profil/nowe_ogloszenie');
    $this->load->view('szablon/koniec');
  }
}
