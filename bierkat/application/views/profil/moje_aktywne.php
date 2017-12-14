<div class="container">
  <?php
  foreach($ogloszenia as $a) {
    if($a['wyroznione_do']>=date('Y-m-d')) $wyroznione='Wyróżnione';
    else $wyroznione='Niewyróżnione';
    ?>
    <div class="col-xs-12">
      <div class="col-xs-12 col-md-4">
        <img class="img-responsive" src="<?=base_url($a['sciezka_zdjecia'])?>">
      </div>
      <div class="col-xs-12 col-md-8">
        <p>Nazwa: <?=$a['nazwa']?> <sup><?=$wyroznione?></sup></p>
        <p>Cena: <?=$a['cena']?> zł</p>
        <?=anchor('profil/wyroznij_ogloszenie/'.$a['id'],'Wyróżnij',array('class'=>'btn btn-default'))?>
        <?=anchor('profil/usun_ogloszenie/'.$a['id'],'Usuń',array('class'=>'btn btn-default'))?>
       <p>Koniec: <?=$a['koniec']?></p>
      </div>
    </div>
    <?php
  }
  ?>
</div>
