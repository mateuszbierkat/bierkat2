<?php
class Ogloszenia extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('ogloszenie_model');
  }

  public function index($id=false) {
    $data['ogloszenia']=$this->ogloszenie_model->wczytaj_ogloszenia($id);

    $data['tytul']='Ogłoszenia';
    if($id) $data['tytul'].=' - w kategorii';

    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/nawigacja');
    $this->load->view('ogloszenia/index');
    $this->load->view('szablon/koniec');
  }

  public function podglad($id=false) {
    if(!$id || !$this->ogloszenie_model->czy_ogloszenie_istnieje($id)) show_404();

    $data['ogloszenie']=$this->ogloszenie_model->wczytaj_ogloszenie($id);

    $data['tytul']='Podgląd - '.$data['ogloszenie']['nazwa'];

    $this->load->view('szablon/start',$data);
    $this->load->view('szablon/nawigacja');
    $this->load->view('ogloszenia/podglad');
    $this->load->view('szablon/koniec');
  }
}
