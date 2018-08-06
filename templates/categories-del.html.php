<?php

/** @var \Rudolf\Modules\Articles\Category\One\Admin\DelView $this */

include '_head.html.php';?>

<form method="post" action="<?=$this->path;?>">
  <div class="panel panel-default">
    <div class="panel-heading">Czy na pewno chcesz usunąć?</div>
    <div class="panel-body">
      <p>Tytuł: <b><?=$this->category->title();?></b></p>
    </div>
    <div class="panel-footer">
      <a href="../" class="btn">Anuluj</a>
      <input name="delete" type="submit" class="btn btn-danger btn-flat pull-right" value="Usuń">
    </div>
  </div>
</form>

<?php include '_foot.html.php';
