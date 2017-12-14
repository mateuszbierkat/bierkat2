<div class="container">
  <p>Imię i nazwisko: <?=$this->session->userdata('imie').' '.$this->session->userdata('nazwisko')?></p>
  <p>Miasto:</strong> <?=$this->session->userdata('miasto')?></p>
  <p>Numer telefonu:</strong> <?=$this->session->userdata('telefon')?></p>
  <div class="col-xs-12">
    <?=anchor('profil/moje_aktywne','Aktywne ('.$aktywne.')',array('class'=>'btn btn-default'))?>
    <?=anchor('profil/moje_nieaktywne','Nieaktywne ('.$nieaktywne.')',array('class'=>'btn btn-default'))?>
    <?=anchor('profil/nowe_ogloszenie','Dodaj',array('class'=>'btn btn-default'))?>
    <?=anchor('profil/wyloguj','Wyloguj',array('class'=>'btn btn-default'))?>
  </div>
</div>
