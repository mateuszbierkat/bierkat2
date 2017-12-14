<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=site_url()?>">Ogłoszenia</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategorie<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php
          $kategorie=$this->db->get('kategorie')->result_array();
          foreach($kategorie as $a) {
            ?>
            <li><?=anchor('ogloszenia/index/'.$a['id'],$a['nazwa'])?></li>
            <?php
          }
          ?>
        </ul>
      </li>
        <?php
        if($this->session->userdata('zalogowany')) {
          ?>
          <li><?=anchor('profil','Mój profil')?></li>
          <li><?=anchor('wiadomosci','Wiadomości')?></li>
          <?php
        }
        else {
          ?>
          <li><?=anchor('rejestracja','Rejestracja')?></li>
          <li><?=anchor('logowanie','Logowanie')?></li>
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
