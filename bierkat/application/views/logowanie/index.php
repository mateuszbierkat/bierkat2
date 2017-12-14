<div class="container">
  <?=form_open('logowanie')?>
    <p class="col-xs-12">
      Login: <input class="form-control" type="text" name="login">
    </p>
    <p class="col-xs-12">
      Hasło: <input class="form-control" type="password" name="haslo">
    </p>
    <p class="col-xs-12">
      <input class="btn btn-default" type="submit" value="Zaloguj">
    </p>
  </form>
  <?=validation_errors('<div class="alert alert-danger">','</div>')?>
</div>
