<div class="container">
  <?php
  foreach($ogloszenia as $a) {
    ?>
    <div class="col-xs-12">
      <div class="col-xs-12 col-md-4">
        <img class="img-responsive" src="<?=base_url($a['sciezka_zdjecia'])?>">
      </div>
      <div class="col-xs-12 col-md-8">
        <p>Nazwa: <?=$a['nazwa']?></p>
        <p>Cena: <?=$a['cena']?> zł</p>
        <?=anchor('profil/odnow_ogloszenie/'.$a['id'],'Odnów',array('class'=>'btn btn-default'))?>
        <?=anchor('profil/usun_ogloszenie/'.$a['id'],'Usuń',array('class'=>'btn btn-default'))?>
       <p>Koniec: <?=$a['koniec']?></p>
      </div>
    </div>
    <?php
  }
  ?>
</div>
