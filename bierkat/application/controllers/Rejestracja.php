<?php
class Rejestracja extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('uzytkownik_model');
  }

  public function index() {
    if($this->uzytkownik_model->zalogowany())   redirect(site_url());

    $data['tytul']=' Rejestracja';

    $this->form_validation->set_rules('login','Login','required|is_unique[uzytkownicy.login]');
    $this->form_validation->set_rules('haslo1','Hasło','required');
    $this->form_validation->set_rules('haslo2','Powtórz hasło','required|matches[haslo1]');
    $this->form_validation->set_rules('imie','Imię','required');
    $this->form_validation->set_rules('nazwisko','Nazwisko','required');
    $this->form_validation->set_rules('miasto','Miasto','required');
    $this->form_validation->set_rules('numer','Numer Telefonu','required|numeric|exact_length[9]');

    if($this->form_validation->run()) $this->uzytkownik_model->rejestracja();

    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/nawigacja');
    $this->load->view('rejestracja/index');
    $this->load->view('szablon/koniec');
  }
}
