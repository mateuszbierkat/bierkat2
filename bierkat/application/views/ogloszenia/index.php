<div class="container">
  <?php
  foreach($ogloszenia as $a) {
    $kategoria=$this->db->get_where('kategorie',array('id'=>$a['id_kategorii']))->row_array();
    if($a['wyroznione_do']>=date('Y-m-d')) $wyroznione='Wyróżnione';
    else $wyroznione='';
    ?>
    <div class="col-xs-12">
      <div class="col-xs-12 col-md-3">
        <img class="img-responsive" src="<?=base_url($a['sciezka_zdjecia'])?>">
      </div>
      <div class="col-xs-12 col-md-9">
        <p><?=$a['nazwa']?> <sup><?=$wyroznione?></sup></p>
        <p>Cena: <?=$a['cena']?> zł</p>
        <p>Koniec: <?=$a['koniec']?></p>
        <p><?=anchor('ogloszenia/podglad/'.$a['id'],'Więcej...',array('class'=>'btn btn-default'))?></p>
      </div>
    </div>
    <?php
  }
  ?>
</div>
