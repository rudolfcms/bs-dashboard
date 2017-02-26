<?php include '_head.html.php';?>

<form class="form-horizontal" action="<?=$this->path;?>" method="post">
  <div class="row">
    <div class="col-md-8">

      <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Tytuł wpisu</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="title" id="title" value="<?=$this->article->title('raw');?>" placeholder="Tytuł" required>
        </div>
      </div>

      <div class="form-group">
        <label for="description" class="col-sm-3 control-label">Opis artykułu</label>
        <div class="col-sm-9">
          <input type="text" id="description" name="description" value="<?=$this->article->description('raw');?>" placeholder="Opis" class="form-control">
          <p class="text-muted">Jest widoczny w wynikach wyszukiwania. Staraj się jak najlepiej opisać zawartość artykułu. Opis i słowa kluczowe <b>nie mogą</b> być takie same.</p>
        </div>
      </div>

      <div class="form-group">
        <label for="keywords" class="col-sm-3 control-label">Słowa kluczowe</label>
        <div class="col-sm-9">
          <input type="text" id="keywords" name="keywords" value="<?=$this->article->keywords('raw');?>" placeholder="Słowa kluczowe" class="form-control">
          <p class="text-muted">Choć ten tag tak samo jak <u>opis</u> <b>nie wpływa</b> na pozycję strony w wynikach wyszukiwania, warto go uzupełnić słowami kluczowymi, z których mogą korzystać mniej znane wyszukiwarki.</p>
        </div>
      </div>

      <div class="form-group">
        <label for="date" class="col-sm-3 control-label">Data wyświetlana</label>
        <div class="col-sm-9">
          <?=$this->adminFields->datetimeInput($this->article->date(), 'date', 'form-control', 'date', 'Data wyświetlana');?> 
          <p class="text-muted">Data dodania, wyświetlana odwiedzającym stronę. Zalecane jest by przedstawiała prawdziwą datę publikacji artykułu. Zostawiając pole pustym, zostatnie ustawiona data dodania.</p>
        </div>
      </div>

      <div class="form-group">
        <?=$this->adminFields->textarea($this->article->textarea(), 'content', 'form-control', 'content');?> 
      </div>

      <div class="form-group">
        <label for="slug" class="col-sm-3 control-label">URL</label>
        <div class="col-sm-9">
          <input type="text" id="slug" name="slug" value="<?=$this->article->slug('raw');?>" placeholder="URL" class="form-control">
          <p class="text-muted">Adres pod jakim będzie dostępny artykuł (np. http://twojastrona.pl/artykuly/<?=date('Y');?>/<?=date('m');?>/<b>{URL)</b>. Jeśli zostawisz to pole puste, URL zostanie wygenerowany automatycznie.</p>
        </div>
      </div>

      <div class="form-group">
        <label for="author" class="col-sm-3 control-label">Autor wyświetlany</label>
        <div class="col-sm-9">
          <input type="text" id="author" name="author" value="<?=$this->article->author('raw', false);?>" placeholder="Autor wyświetlany" class="form-control">
          <p class="text-muted">Autor artykułu. Gdy pole puste, wyświetlanie jako autora osoby która dodała artykuł.</p>
        </div>
      </div>

      <div class="form-group">
        <label for="author" class="col-sm-3 control-label">Kategoria</label>
        <div class="col-sm-9">
          <select class="form-control select2" name="category_ID">
            <option value="0">(brak)</option>
            <?php foreach ($this->categories() as $key => $value): ?><option <?=($value['id'] == $this->article->categoryID()) ? 'selected="selected" ' : '';?>value="<?=$value['id'];?>"><?=$value['title'];?></option>
            <?php endforeach; ?> 
          </select>
          <a href="<?=$this->article->addCategory();?>" target="_blank">Dodaj kategorię</a>
          <p class="text-muted">Po dodaniu kategorii, by wyświetliła się w menu powyżej, wymagane jest odświeżenie strony.</p>
        </div>
      </div>

      <div class="form-group">
        <label for="thumb" class="col-sm-3 control-label">Miniatura</label>
        <div class="col-sm-9">
           <?=$this->adminFields->pathInput($this->article->thumb('raw'), 'thumb', 'form-control', 'thumb', 'Miniatura');?> 
        </div>
        <br><br><br>
        <div class="row">
          <div class="col-md-6">
            <p class="text-muted">
              Miniatura wyróżniająca artykuł. Artykuł bez uzupełnionego tego pola (jeśli wspiera tą funkcję aktywny szablon) 
              będzie okraszony domyślną miniaturą. Możesz wpisać ręcznie adres miniatury w pole powyżej, lub użyć menadżera plików, 
              w którym możesz wysłać miniaturę na serwer i który ją automatycznie wstawi.
            </p>
          </div>
          <div class="col-md-6" id="thumbnail-preview">
            <?=$this->article->thumbnail(300, 250, false, $this->article->title('raw'), 'https://placehold.it/300x250');?> 
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="album" class="col-sm-3 control-label">Album</label>
        <div class="col-sm-9">
          <input type="text" id="album" name="album" value="<?=$this->article->album('raw');?>" placeholder="Album" class="form-control">
          <p class="text-muted">Adres albumu powiązanego z artykułem. Pole puste = brak powiązania.</p>
        </div>
      </div>

      <div class="form-group">
        <label for="photos" class="col-sm-3 control-label">Liczba zdjęć</label>
        <div class="col-sm-9">
          <input type="number" min="0" id="photos" name="photos" value="<?=$this->article->photos();?>" placeholder="Liczba zdjęć" class="form-control">
          <p class="text-muted">Liczba zdjęć w powiązanym albumie.</p>
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
      <a class="btn btn-danger btn-lg btn-block" href="<?=$this->article->delUrl();?>">Usuń</a>
      <hr>
      <div class="panel panel-default">
        <div class="panel-heading">Informacje o wpisie</div>
        <ul class="list-group">
          <li class="list-group-item">Dodano przez: <b><?=$this->article->adderFullName();?></b></li>
          <li class="list-group-item">Data dodania: <b><?=$this->article->added();?></b></li>
          <?php if ($this->article->isModified()):?> 
          <li class="list-group-item">Modyfikacja: <b><?=$this->article->modified();?></b></li>
          <li class="list-group-item">Ostatnio edytował: <b><?=$this->article->modifierFullName();?></b></li>
          <?php endif; ?> 
          <li class="list-group-item">Liczba odsłon: <b><?=$this->article->views();?></b></li>
          <li class="list-group-item">Odnośnik do artykułu: <b><a target="_blank" href="<?=$this->article->url();?>">zobacz wpis</a></b></li>
        </ul>
      </div>
    <?php endif;?>
    <hr>
    <!-- published box -->
    <div class="panel panel-default">
     <div class="panel-body">
        <p><i class="fa fa-key"></i> Status:
          <b><?=($this->article->isPublished()) ? 'opublikowany' : 'szkic';?></b>
        </p>
        <label>
          <input type="checkbox" name="published" class="minimal"<?=($this->article->isPublished()) ? ' checked' : '';?>>&nbsp;
        <?php if (!$this->article->isPublished()):?>Zaznacz, by opublikować<?php else:?>Odznacz, by zamienić w szkic<?php endif;?>
        </label>
     </div>
    </div>

    <!-- options box -->
    <div class="panel panel-default">
     <div class="panel-body">
        <p><i class="fa fa-eye"></i> Widoczność:
          <b><?=($this->article->isHomepageHidden()) ? 'Niewidoczny na głównej' : 'Widoczny wszędzie';?></b>
        </p>
        <label>
          <input type="checkbox" name="homepage_hidden" class="minimal"<?=($this->article->isHomepageHidden()) ? ' checked' : '';?>>&nbsp;
        <?php if (!$this->article->isHomepageHidden()):?>Zaznacz, by ukryć na stronie głównej<?php else:?>Odznacz, by ponownie pokazać na stronie głównej<?php endif;?>
        </label>
        <p class="text-muted">Ukryty artykuł będzie widoczny tylko w widoku kategorii.</p>
     </div>
    </div>

    </div>
  </div>
</form>

<?php include '_foot.html.php';?>