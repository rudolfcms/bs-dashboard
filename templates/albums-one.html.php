<?php

/** @var \Rudolf\Modules\Albums\One\Admin\EditView $this */
/** @var \Rudolf\Modules\Albums\One\Admin\AddView $this */

include '_head.html.php'; ?>

<form action="<?= $this->path; ?>" method="post">
    <div class="row">
        <div class="col-md-8">

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Tytuł albumu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title"
                           value="<?= $this->album->title('raw'); ?>" placeholder="Tytuł" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="album" class="col-sm-2 col-form-label">Adres albumu</label>
                <div class="col-sm-10">
                    <input type="text" id="album" name="album" value="<?= $this->album->album('raw'); ?>"
                           placeholder="Album" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="thumb" class="col-sm-2 col-form-label">Miniatura</label>
                <div class="col-sm-10">
                    <?= $this->adminFields->pathInput(
                        $this->album->thumb('raw'),
                        'thumb',
                        'form-control',
                        'thumb',
                        'Miniatura'
                    ); ?>
                </div>

                <div class="row pt-3 pl-3">
                    <div class="col-md-6">
                        <p class="text-muted">
                            Miniatura wyróżniająca album.
                            Możesz wpisać ręcznie adres miniatury w pole powyżej, lub użyć menadżera plików,
                            w którym możesz wysłać miniaturę na serwer i który ją automatycznie wstawi.
                        </p>
                    </div>
                    <div class="col-md-6" id="thumbnail-preview">
                        <?= $this->album->thumbnail(
                            300,
                            250,
                            false,
                            $this->album->title('raw'),
                            'https://placehold.it/300x250'
                        ); ?>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Data wyświetlana</label>
                <div class="col-sm-10">
                    <input type="text" id="date" name="date" value="<?= $this->album->date(); ?>"
                           placeholder="Data wyświetlana" class="form-control">
                    <?php //$adminFields->datetimeInput($this->album->date(), 'date', 'form-control', 'date', 'Data wyświetlana');?>
                    <p class="text-muted">Data dodania, wyświetlana odwiedzającym stronę. Zalecane jest by
                        przedstawiała prawdziwą datę publikacji albumu. Zostawiając pole pustym, zostatnie ustawiona
                        data dodania.</p>
                </div>
            </div>

            <div class="form-group row">
                <label for="photos" class="col-sm-2 col-form-label">Liczba zdjęć</label>
                <div class="col-sm-10">
                    <input type="number" min="0" id="photos" name="photos" value="<?= $this->album->photos(); ?>"
                           placeholder="Liczba zdjęć" class="form-control">
                    <p class="text-muted">Liczba zdjęć w albumie</p>
                </div>
            </div>

            <div class="form-group row">
                <label for="author" class="col-sm-2 col-form-label">Autor wyświetlany</label>
                <div class="col-sm-10">
                    <input type="text" id="author" name="author" value="<?= $this->album->author('raw', false); ?>"
                           placeholder="Autor wyświetlany" class="form-control">
                    <p class="text-muted">Autor albumu. Gdy pole puste, wyświetlanie jako autora osoby która dodała
                        album.</p>
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Kategoria</label>
                <div class="col-sm-10">
                    <select class="custom-select" id="category" name="category_ID">
                        <option value="0">(brak)</option>
                        <?php foreach ($this->categories() as $key => $value): ?>
                            <option <?= ($value['id'] == $this->album->categoryID(
                                )) ? 'selected="selected" ' : ''; ?>value="<?= $value['id']; ?>">
                                <?= $value['title']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <a href="<?= $this->album->addCategory(); ?>" target="_blank">Dodaj kategorię</a>
                    <p class="text-muted">Po dodaniu kategorii, by wyświetliła się w menu powyżej, wymagane jest
                        odświeżenie strony.</p>
                </div>
            </div>

            <div class="form-group row">
                <label for="slug" class="col-sm-2 col-form-label">URL</label>
                <div class="col-sm-10">
                    <input type="text" id="slug" name="slug" value="<?= $this->album->slug('raw'); ?>"
                           placeholder="URL" class="form-control">
                    <p class="text-muted">Adres pod jakim będzie dostępny album
                        (http://twojastrona.pl/artykuly/<?= date('Y'); ?>/<?= date('m'); ?>/<b>{URL)</b>. Jeśli
                        zostawisz to pole puste, URL zostanie wygenerowany automatycznie.</p>
                </div>
            </div>

        </div>
        <div class="col-md-4">

            <?php if ('edit' === $this->templateType): ?>
                <input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="update" value="Edytuj">
            <?php else: ?>
                <input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="add" value="Dodaj">
            <?php endif; ?>

            <?php if ('edit' === $this->templateType): ?>
                <a class="btn btn-outline-danger btn-lg btn-block" href="<?= $this->album->delUrl(); ?>">Usuń</a>
            <?php endif; ?>

            <a class="btn btn-outline-secondary btn-lg btn-block" href="<?= $this->adminDir(); ?>/albums">Anuluj</a>

            <?php if ('edit' === $this->templateType): ?>
                <hr>
                <div class="card">
                    <div class="card-header">Informacje o albumie</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Dodano przez: <b><?= $this->album->adderFullName(); ?></b></li>
                        <li class="list-group-item">Data dodania: <b><?= $this->album->added(); ?></b></li>
                        <?php if ($this->album->isModified()): ?>
                            <li class="list-group-item">Modyfikacja: <b><?= $this->album->modified(); ?></b></li>
                            <li class="list-group-item">Ostatnio edytował: <b><?= $this->album->modifierFullName(); ?></b></li>
                        <?php endif; ?>
                        <li class="list-group-item">Liczba odsłon: <b><?= $this->album->views(); ?></b></li>
                        <li class="list-group-item">Odnośnik do albumu:
                            <b><a target="_blank" href="<?= $this->album->url(); ?>">zobacz album</a></b></li>
                    </ul>
                </div>
            <?php endif; ?>

            <hr>

            <!-- published box -->
            <div class="card">
                <div class="card-body">
                    <p>
                        <i class="fa fa-key"></i> Status:
                        <b><?= $this->album->isPublished() ? 'opublikowany' : 'szkic'; ?></b>
                    </p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="published" name="published" <?= $this->album->isPublished() ? ' checked' : ''; ?>>
                        <label class="form-check-label" for="published">
                            <?php if (!$this->album->isPublished()): ?>Zaznacz, by opublikować
                            <?php else: ?>Odznacz, by zamienić w szkic<?php endif; ?>
                        </label>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

<?php include '_foot.html.php';
