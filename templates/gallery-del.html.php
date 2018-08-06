<?php

/** @var \Rudolf\Modules\Galleries\One\Admin\DelView $this */

include '_head.html.php';?>

<form method="post" action="<?=$this->path;?>">
  <div class="card">
    <div class="card-header">Czy na pewno chcesz usunąć?</div>
    <div class="card-body">Tytuł: <b><?=$this->gallery->title();?></b></div>
    <div class="card-footer">
      <a href="../" class="btn btn-outline-secondary">Anuluj</a>
      <input name="delete" type="submit" class="btn btn-danger btn-flat pull-right" value="Usuń">
    </div>
  </div>
</form>

<?php include '_foot.html.php';
