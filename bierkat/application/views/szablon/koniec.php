<div class="container">
  <?php
  if($this->session->flashdata('alert')) {
    ?>
    <div class="col-xs-12 alert alert-info alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <?=$this->session->flashdata('alert')?>
    </div>
    <?php
  }
  ?>
</div>
<script src="<?=base_url('js/jquery-3.2.1.min.js')?>"></script>
<script src="<?=base_url('js/bootstrap.min.js')?>"></script>
</body>
</html>
