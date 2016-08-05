<?php

$p = $this->page;
include '_head.html.php';?>

<form class="form-horizontal" action="<?=$this->path;?>" method="post">
  <div class="row">
    <div class="col-md-8">

      <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Tytuł strony</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="title" id="title" value="<?=$p->title('raw');?>" placeholder="Tytuł" required>
        </div>
      </div>

      <div class="form-group">
        <label for="description" class="col-sm-3 control-label">Opis strony</label>
        <div class="col-sm-9">
          <input type="text" id="description" name="description" value="<?=$p->description('raw');?>" placeholder="Opis" class="form-control">
          <p class="text-muted">Jest widoczny w wynikach wyszukiwania. Staraj się jak najlepiej opisać zawartość strony. Opis i słowa kluczowe <b>nie mogą</b> być takie same.</p>
        </div>
      </div>

      <div class="form-group">
        <label for="keywords" class="col-sm-3 control-label">Słowa kluczowe</label>
        <div class="col-sm-9">
          <input type="text" id="keywords" name="keywords" value="<?=$p->keywords('raw');?>" placeholder="Słowa kluczowe" class="form-control">
          <p class="text-muted">Choć ten tag tak samo jak <u>opis</u> <b>nie wpływa</b> na pozycję strony w wynikach wyszukiwania, warto go uzupełnić słowami kluczowymi, z których mogą korzystać mniej znane wyszukiwarki.</p>
        </div>
      </div>

      <div class="form-group">
        <textarea id="content" name="content" class="form-control" rows="15"><?=$p->textarea();?></textarea>
      </div>

      <div class="form-group">
        <label for="slug" class="col-sm-3 control-label">URL</label>
        <div class="col-sm-9">
          <input type="text" id="slug" name="slug" value="<?=$p->slug('raw');?>" placeholder="URL" class="form-control">
          <p class="text-muted">Adres pod jakim będzie dostępny artykuł (http://twojastrona.pl/artykuly/<?=date('Y');?>/<?=date('m');?>/<b>{URL)</b>. Jeśli zostawisz to pole puste, URL zostanie wygenerowany automatycznie.</p>
        </div>
      </div>

      <div class="form-group">
        <label for="author" class="col-sm-3 control-label">Strona nadrzędna</label>
        <div class="col-sm-9">
          <select class="form-control select2" name="parent_id">
            <option value="0">(brak)</option>
            <?php foreach ($this->pages() as $key => $value): ?><option <?=($value['id'] == $p->parentID()) ? 'selected="selected" ' : '';?>value="<?=$value['id'];?>"><?=$value['title'];?></option>
            <?php endforeach; ?> 
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-4">

      <?php if ('edit' === $this->templateType): ?> 
        <input class="btn btn-primary btn-lg btn-block" type="submit" name="update" value="Edytuj">
      <?php else: ?>
        <input class="btn btn-primary btn-lg btn-block" type="submit" name="add" value="Dodaj">
      <?php endif;?>

      <a class="btn btn-default btn-lg btn-block" href="<?=$this->adminDir();?>/articles">Anuluj</a>
     
      <?php if ('edit' === $this->templateType): ?> 
      <a class="btn btn-danger btn-lg btn-block" href="<?=$p->delUrl();?>">Usuń</a>
      <hr>
      <div class="panel panel-default">
        <div class="panel-heading">Informacje o stronie</div>
        <ul class="list-group">
          <li class="list-group-item">Dodano przez: <b><?=$p->adderFullName();?></b></li>
          <li class="list-group-item">Data dodania: <b><?=$p->added();?></b></li>
          <?php if ($p->isModified()):?> 
          <li class="list-group-item">Modyfikacja: <b><?=$p->modified();?></b></li>
          <li class="list-group-item">Ostatnio edytował: <b><?=$p->modifierFullName();?></b></li>
          <?php endif; ?> 
          <li class="list-group-item">Liczba odsłon: <b><?=$p->views();?></b></li>
          <li class="list-group-item">Odnośnik do strony: <b><a target="_blank" href="<?=$p->url();?>">zobacz stronę</a></b></li>
        </ul>
      </div>
    <?php endif;?>
    <hr>
    <!-- published box -->
    <div class="panel panel-default">
     <div class="panel-body">
        <p><i class="fa fa-key"></i> Status:
          <b><?=($p->isPublished()) ? 'opublikowany' : 'szkic';?></b>
        </p>
        <label>
          <input type="checkbox" name="published" class="minimal"<?=($p->isPublished()) ? ' checked' : '';?>>&nbsp;
        <?php if (!$p->isPublished()):?>Zaznacz, by opublikować<?php else:?>Odznacz, by zamienić w szkic<?php endif;?>
        </label>
     </div>
    </div>

    </div>
  </form>
</section>

<?php include '_foot.html.php';?>