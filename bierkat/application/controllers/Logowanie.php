<?php
class Logowanie extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('uzytkownik_model');
  }

  public function index() {
    $this->form_validation->set_rules('login','Login','required');
    $this->form_validation->set_rules('haslo','Hasło','required');

    if($this->form_validation->run()) $this->uzytkownik_model->logowanie();

    if($this->uzytkownik_model->zalogowany()) redirect(site_url());

    $data['tytul']='Logowanie';

    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/nawigacja');
    $this->load->view('logowanie/index');
    $this->load->view('szablon/koniec');
  }
}
