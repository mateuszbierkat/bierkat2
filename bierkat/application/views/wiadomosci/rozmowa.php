<div class="container">
  <h2>Wiadomości:</h2>
  <?php if($wiadomosci) {
    foreach($wiadomosci as $a) {
      $uzytkownik=$this->db->get_where('uzytkownicy',array('id'=>$a['id_nadawcy']))->row_array();
      ?>
      <div class="col-xs-12">
        <p><?=$uzytkownik['imie'].' '.$uzytkownik['nazwisko']?> <sup><?=$a['data']?></sup></p>
        <p><?=$a['tresc']?></p>
      </div>
      <hr>
      <?php
    }
  }
  ?>
  <div class="col-xs-12">
    <hr>
    <?=form_open('wiadomosci/rozmowa/'.$id_rozmowy)?>
    <textarea class="form-control" name="tresc" rows="3" placeholder="Treść wiadomości..."></textarea>
    <input class="btn btn-default" type="submit" value="Wyślij">
    </form>
  </div>
  <div class="col-xs-12">
    <?=validation_errors('<div class="alert alert-danger">','</div>')?>
  </div>
</div>
