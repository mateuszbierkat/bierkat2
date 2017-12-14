<div class="container">
  <div class="col-xs-12">
    <h2>Wszystkie rozmowy:</h2>
    <?php
    if($rozmowy) {
      foreach($rozmowy as $a) {
        ?>
        <p><?=$a['imie'].' '.$a['nazwisko']?> <?=anchor('wiadomosci/rozmowa/'.$a['id'],'Otwórz',array('class'=>'btn btn-default'))?></p>
        <?php
      }
    }
    ?>
  </div>
</div>
