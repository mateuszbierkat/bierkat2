<div class="container">
  <?=form_open(site_url('rejestracja'))?>
    <p class="col-xs-12">
      Imię: <input class="form-control" type="text" name="imie">
    </p>
    <p class="col-xs-12">
      Nazwisko: <input class="form-control" type="text" name="nazwisko">
    </p>
    <p class="col-xs-12">
      Login: <input class="form-control" type="text" name="login">
    </p>
    <p class="col-xs-12">
      Hasło: <input class="form-control" type="password" name="haslo1">
    </p>
    <p class="col-xs-12">
      Powtórz hasło: <input class="form-control" type="password" name="haslo2">
    </p>
    <p class="col-xs-12">
      Miasto: <input class="form-control" type="text" name="miasto">
    </p>
    <p class="col-xs-12">
      Numer telefonu: <input class="form-control" type="text" name="numer">
    </p>
    <p class="col-xs-12">
      <input class="btn btn-default" type="submit" value="Zarejestruj">
    </p>
  </form>
  <?=validation_errors('<div class="alert alert-danger">','</div>')?>
</div>
