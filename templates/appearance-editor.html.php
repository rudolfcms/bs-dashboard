<?php include '_head.html.php';?>

<div class="row">
  <div class="col-md-3">
    <?php foreach ($this->filesList as $catalog => $files): ?>
    <h3><?=$catalog;?></h3>
    <ul class="nav nav-pills nav-stacked">
      <?php foreach ($files as $key => $file): ?>
      <li><a href="<?=base64_encode($catalog.'/'.$file);?>"><?=$file;?></a></li>
      <?php endforeach; ?>
    </ul>

    <?php endforeach; ?>
  </div>
  <div class="col-md-9">
    <form class="form" action="" method="post">
      <input class="btn btn-primary pull-right" type="submit" name="save" value="Zapisz"/>
      <h3><?=$this->file['name'];?></h3>
      <textarea class="form-control" rows="25" name="content" spellcheck="false"><?=htmlspecialchars($this->file['content']); ?></textarea>
      <hr>
      <div class="panel panel-default">
        <div class="panel-heading">Informacje</div>
        <ul class="list-group">
          <li class="list-group-item">Wielkość pliku: <b><?=$this->file['size']?> bajtów</b></li>
          <li class="list-group-item">Modyfikacja: <b><?=$this->file['last-modified'];?></b></li>
          <li class="list-group-item">Prawa dostępu: <b><?=$this->file['perms'];?></b></li>
        </ul>
      </div>
    </form>
  </div>
</div>

<?php include '_foot.html.php';?>
