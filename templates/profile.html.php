<?php

/** @var \Rudolf\Modules\Users\One\Admin\Profile\View $this */

include '_head.html.php';?>

<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?=$this->themePath;?>/img/man.jpg" width="250" height="250" alt="avatar">
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="caption">
      <h2><?=$this->getUserFullName();?> (<?=$this->getUserNick();?>)</h2>
      <p>Adres email: <b><?=$this->getUserEmail();?></b></p>
      <p>Data rejestracji: <b>yyyy-mm-dd HH:ii:ss</b></p>
      <p>Ostatnie logowanie: <b>yyyy-mm-dd HH:ii:ss</b></p>
      <p>Adres IP ostatniego logowania: <b>127.0.0.1</b></p>
      <p>
        <a href="#" class="btn btn-primary" role="button">Edytuj profil</a>
        <a href="#" class="btn btn-default" role="button">Zmień hasło</a>
      </p>
      </div>
  </div>
</div>

<?php include '_foot.html.php';
