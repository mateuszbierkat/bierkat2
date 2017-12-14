<div class="container">
  <?=form_open_multipart(site_url('profil/nowe_ogloszenie'))?>

  <p class="col-xs-12">
    Nazwa: <input class="form-control" type="text" name="nazwa">
  </p>

  <p class="col-xs-12">
    Kategoria: <select class="form-control" name="kategoria">
      <?php
      foreach($kategorie as $a) {
        ?>
        <option value="<?=$a['id']?>"><?=$a['nazwa'].' ('.$a['atrybut1'].'|'.$a['atrybut2'].'|'.$a['atrybut3'].'|'.$a['atrybut4'].'|'.$a['atrybut5'].')'?></option>
        <?php
      }
      ?>
    </select>
  </p>

  <p class="col-xs-12">
    Atrybut 1: <input class="form-control" type="text" name="atrybut1">
  </p>

  <p class="col-xs-12">
    Atrybut 2: <input class="form-control" type="text" name="atrybut2">
  </p>

  <p class="col-xs-12">
    Atrybut 3: <input class="form-control" type="text" name="atrybut3">
  </p>

  <p class="col-xs-12">
    Atrybut 4: <input class="form-control" type="text" name="atrybut4">
  </p>

  <p class="col-xs-12">
    Atrybut 5: <input class="form-control" type="text" name="atrybut5">
  </p>

  <p class="col-xs-12">
    Cena: <input class="form-control" type="number" min="0" name="cena">
  </p>

  <p class="col-xs-12">
    Opis: <textarea class="form-control" name="opis" rows="3"></textarea>
  </p>

  <p class="col-xs-12">
    Zdjęcie: <input class="form-control" type="file" accept="image/*" name="zdjecie">
  </p>

  <p class="col-xs-12">
    <input class="btn btn-default" type="submit" value="Nowe ogłoszenie">
  </p>

  </form>
  <div class="col-xs-12">
    <?=validation_errors('<div class="alert alert-danger">','</div>')?>
  </div>
</div>
