<?php

/** @var \Rudolf\Modules\Galleries\One\Admin\AddView $this */
/** @var \Rudolf\Modules\Galleries\One\Admin\EditView $this */

include '_head.html.php';?>

<form class="form-horizontal" action="<?=$this->path;?>" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-8">

      <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Tytuł galerii</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="title" id="title" value="<?=$this->gallery->title('raw');?>" placeholder="Tytuł" required>
        </div>
      </div>

      <div class="form-group">
        <label for="slug" class="col-sm-3 control-label">URL</label>
        <div class="col-sm-9">
          <input type="text" id="slug" name="slug" value="<?=$this->gallery->slug('raw');?>" placeholder="URL" class="form-control">
          <p class="help-block">
            Jeśli zostawisz to pole puste, zostanie uzupełnione wygenerowanym URLem.
          </p>
        </div>
      </div>

      <div class="form-group">
        <label for="thumb_width" class="col-sm-3 control-label">Szerokość miniatur</label>
        <div class="col-sm-9">
          <input type="number" min="0" id="thumb_width" name="thumb_width" value="<?=$this->gallery->thumbsWidth();?>" placeholder="Szerokość miniatur" class="form-control">
          <p class="help-block">
            Jeśli zostawisz to pole puste, zostanie uzupełnione wartością domyślną.
          </p>
        </div>
      </div>

      <div class="form-group">
        <label for="thumb_height" class="col-sm-3 control-label">Wysokość miniatur</label>
        <div class="col-sm-9">
          <input type="number" min="0" id="thumb_height" name="thumb_height" value="<?=$this->gallery->thumbsHegiht();?>" placeholder="Wysokość miniatur" class="form-control">
          <p class="help-block">
            Jeśli zostawisz to pole puste, zostanie uzupełnione wartością domyślną.
          </p>
        </div>
      </div>

    <?php if ('edit' === $this->templateType): ?>
      <div class="form-group">
        <label for="photo_upload" class="col-sm-3 control-label">Dodaj zdjęcie</label>
        <div class="col-sm-9">
          <input type="file" name="photo_upload" id="photo_upload">
          <input type="hidden" name="MAX_FILE_SIZE" value="<?=1024 * (1024 * 2);?>">
          <p class="help-block">
            Maksymalny rozmiar: <b>2MiB</b>.<br>
            Obsługiwane formaty: <b>JPG</b>, <b>PNG</b>, <b>GIF</b>.<br>
            Po dodaniu zdjęcia kliknij przycisk <b>Edytuj</b>.
          </p>
        </div>
      </div>

      <hr>

      <?php if($this->gallery->hasPhotos()): ?>
        <div class="form-group">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>miniatura</th>
                  <th>nazwa</th>
                  <th>usuń</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($this->gallery->imagesList() as $key => $value): ?>
                <tr>
                  <td><?=++$key;?></td>
                  <td>
                    <a href="<?=$value['photo'];?>" target="_blank">
                      <img src="<?=$value['thumb'];?>" width="100" height="75" alt="<?=$value['alt'];?>">
                    </a>
                  </td>
                  <td><?=$value['alt'];?></td>
                  <td>
                    <button class="btn btn-danger" name="delete" value="<?=$value['alt'];?>">
                      Usuń
                    </button>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      <?php else: ?>
        <div class="alert alert-info">Brak zdjęć!</div>
      <?php endif; ?>
    <?php endif; ?>

    </div>
    <div class="col-md-4">

      <?php if ('edit' === $this->templateType): ?>
        <input class="btn btn-primary btn-lg btn-block" type="submit" name="update" value="Edytuj">
      <?php else: ?>
        <input class="btn btn-primary btn-lg btn-block" type="submit" name="add" value="Dodaj">
      <?php endif;?>

      <a class="btn btn-default btn-lg btn-block" href="<?=$this->adminDir();?>/gallerys">Anuluj</a>

      <?php if ('edit' === $this->templateType): ?>
      <a class="btn btn-danger btn-lg btn-block" href="<?=$this->gallery->delUrl();?>">Usuń</a>
      <hr>
      <div class="panel panel-default">
        <div class="panel-heading">Informacje o galerii</div>
        <ul class="list-group">
          <li class="list-group-item">Dodano przez: <b><?=$this->gallery->adderFullName();?></b></li>
          <li class="list-group-item">Data dodania: <b><?=$this->gallery->added();?></b></li>
          <?php if ($this->gallery->isModified()):?>
          <li class="list-group-item">Modyfikacja: <b><?=$this->gallery->modified();?></b></li>
          <li class="list-group-item">Ostatnio edytował: <b><?=$this->gallery->modifierFullName();?></b></li>
          <?php endif; ?>
          <li class="list-group-item">Kod galerii: <code><?=$this->gallery->code();?></code></li>
        </ul>
      </div>
    <?php endif;?>

    </div>
  </div>
</form>

<?php include '_foot.html.php';
