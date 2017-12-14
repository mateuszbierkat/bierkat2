<?php
$kategoria=$this->db->get_where('kategorie',array('id'=>$ogloszenie['id_kategorii']))->row_array();
$uzytkownik=$this->db->get_where('uzytkownicy',array('id'=>$ogloszenie['id_uzytkownika']))->row_array();
?>
<div class="container">
  <div class="col-xs-12 col-md-4">
      <img class="img-responsive" src="<?=base_url($ogloszenie['sciezka_zdjecia'])?>">
  </div>
  <div class="col-xs-12 col-md-8">
    <p><h2><?=$ogloszenie['nazwa']?></h2></p>
    <p>Cena: <?=$ogloszenie['cena']?> zł</p>
    <p><?=$kategoria['atrybut1']?>: <?=$ogloszenie['atrybut1']?></p>
    <p><?=$kategoria['atrybut2']?>: <?=$ogloszenie['atrybut2']?></p>
    <p><?=$kategoria['atrybut3']?>: <?=$ogloszenie['atrybut3']?></p>
    <p><?=$kategoria['atrybut4']?>: <?=$ogloszenie['atrybut4']?></p>
    <p><?=$kategoria['atrybut5']?>: <?=$ogloszenie['atrybut5']?></p>
    <p><h2>Kontakt</h2></p>
    <p>Sprzedający: <?=$uzytkownik['imie'].' '.$uzytkownik['nazwisko']?></p>
    <p>Miasto: <?=$uzytkownik['miasto']?></p>
    <p>Numer telefonu: <?=$uzytkownik['telefon']?></p>
    <p><strong>Do kiedy</strong>: <?=$ogloszenie['koniec']?></p>

    <p>
      <?php
      if($ogloszenie['id_uzytkownika']!=$this->session->userdata('id')) {
        ?>
        <?=anchor('wiadomosci/rozmowa/'.$ogloszenie['id_uzytkownika'],'Napisz do użytkownika',array('class'=>'btn btn-default'))?>
        <?php
      }
      ?>
    </p>
  </div>
</div>
