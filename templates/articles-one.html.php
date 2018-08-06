<?php

/** @var \Rudolf\Modules\Articles\One\Admin\AddView $this */
/** @var \Rudolf\Modules\Articles\One\Admin\EditView $this */

include '_head.html.php'; ?>

    <form action="<?= $this->path; ?>" method="post">
        <div class="row">
            <div class="col-md-8">

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Tytuł wpisu</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title"
                               value="<?= $this->article->title('raw'); ?>" placeholder="Tytuł" required>
                    </div>
                </div>

                <div class="form-group row">
                    <?= $this->adminFields->textarea(
                        $this->article->textarea(),
                        'content',
                        'form-control',
                        'content'
                    ); ?>
                </div>

                <div class="form-group row">
                    <label for="author" class="col-sm-2 col-form-label">Autor wyświetlany</label>
                    <div class="col-sm-10">
                        <input type="text" id="author" name="author"
                               value="<?= $this->article->author('raw', false); ?>"
                               placeholder="Autor wyświetlany" class="form-control">
                        <p class="text-muted">Autor artykułu. Gdy pole puste, wyświetlanie jako autora osoby która
                            dodała artykuł.</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Kategoria</label>
                    <div class="col-sm-10">
                        <select class="custom-select select2" id="category" name="category_ID">
                            <option value="0">(brak)</option>
                            <?php foreach ($this->categories() as $key => $value): ?>
                                <option <?= ($value['id'] == $this->article->categoryID())
                                    ? 'selected="selected" ' : ''; ?>value="<?= $value['id']; ?>"><?= $value['title']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <a href="<?= $this->article->addCategory(); ?>" target="_blank">Dodaj kategorię</a>
                        <p class="text-muted">Po dodaniu kategorii, by wyświetliła się w menu powyżej, wymagane jest
                            odświeżenie strony.</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="thumb" class="col-sm-2 col-form-label">Miniatura</label>
                    <div class="col-sm-10">
                        <?= $this->adminFields->pathInput(
                            $this->article->thumb('raw'),
                            'thumb',
                            'form-control',
                            'thumb',
                            'Miniatura'
                        ); ?>
                    </div>
                    <div class="row pt-3 pl-3">
                        <div class="col-md-6">
                            <p class="text-muted">
                                Miniatura wyróżniająca artykuł. Artykuł bez uzupełnionego tego pola (jeśli wspiera tą
                                funkcję aktywny szablon) będzie okraszony domyślną miniaturą. Możesz wpisać ręcznie
                                adres miniatury w pole powyżej, lub użyć menadżera plików, w którym możesz wysłać
                                miniaturę na serwer i który ją automatycznie wstawi.
                            </p>
                        </div>
                        <div class="col col-md-6" id="thumbnail-preview">
                            <?= $this->article->thumbnail(
                                300,
                                250,
                                false,
                                $this->article->title('raw'),
                                'https://placehold.it/300x250'
                            ); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date" class="col-sm-2 col-form-label col-form-label-sm">Data wyświetlana</label>
                    <div class="col-sm-10">
                        <?= $this->adminFields->dateInput(
                            $this->article->date(),
                            'date',
                            'form-control form-control-sm',
                            'date',
                            'Data wyświetlana'
                        ); ?>
                        <p class="text-muted">Data dodania, wyświetlana odwiedzającym stronę. Zalecane jest by
                            przedstawiała prawdziwą datę publikacji artykułu. Zostawiając pole pustym, zostatnie
                            ustawiona data dodania.</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="album" class="col-sm-2 col-form-label col-form-label-sm">Album</label>
                    <div class="col-sm-10">
                        <input type="text" id="album" name="album" value="<?= $this->article->album('raw'); ?>"
                               placeholder="Album" class="form-control form-control-sm">
                        <p class="text-muted">Adres albumu powiązanego z artykułem. Pole puste = brak powiązania.</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="photos" class="col-sm-2 col-form-label col-form-label-sm">Liczba zdjęć</label>
                    <div class="col-sm-10">
                        <input type="number" min="0" id="photos" name="photos" value="<?= $this->article->photos(); ?>"
                               placeholder="Liczba zdjęć" class="form-control form-control-sm">
                        <p class="text-muted">Liczba zdjęć w powiązanym albumie.</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label col-form-label-sm">Opis artykułu</label>
                    <div class="col-sm-10">
                        <input type="text" id="description" name="description"
                               value="<?= $this->article->description('raw'); ?>"
                               placeholder="Opis" class="form-control form-control-sm">
                        <p class="text-muted">Jest widoczny w wynikach wyszukiwania. Staraj się jak najlepiej opisać
                            zawartość artykułu. Opis i słowa kluczowe <b>nie mogą</b> być takie same.</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="keywords" class="col-sm-2 col-form-label col-form-label-sm">Słowa kluczowe</label>
                    <div class="col-sm-10">
                        <input type="text" id="keywords" name="keywords" value="<?= $this->article->keywords('raw'); ?>"
                               placeholder="Słowa kluczowe" class="form-control form-control-sm">
                        <p class="text-muted">Choć ten tag tak samo jak <u>opis</u> <b>nie wpływa</b> na pozycję strony
                            w wynikach wyszukiwania, warto go uzupełnić słowami kluczowymi, z których mogą korzystać
                            mniej znane wyszukiwarki.</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label col-form-label-sm">URL</label>
                    <div class="col-sm-10">
                        <input type="text" id="slug" name="slug" value="<?= $this->article->slug('raw'); ?>"
                               placeholder="URL" class="form-control form-control-sm">
                        <p class="text-muted">Adres pod jakim będzie dostępny artykuł (np.
                            http://twojastrona.pl/artykuly/<?= date('Y'); ?>/<?= date('m'); ?>/<b>{URL)</b>.
                            Jeśli zostawisz to pole puste, URL zostanie wygenerowany automatycznie.</p>
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
                    <a class="btn btn-outline-danger btn-lg btn-block" href="<?= $this->article->delUrl(); ?>">Usuń</a>
                <?php endif; ?>

                <a class="btn btn-outline-secondary btn-lg btn-block"
                   href="<?= $this->adminDir(); ?>/articles">Anuluj</a>

                <?php if ('edit' === $this->templateType): ?>
                    <hr>
                    <div class="card">
                        <div class="card-header">Informacje o wpisie</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Dodano przez: <b><?= $this->article->adderFullName(); ?></b>
                            </li>
                            <li class="list-group-item">Data dodania: <b><?= $this->article->added(); ?></b></li>
                            <?php if ($this->article->isModified()): ?>
                                <li class="list-group-item">Modyfikacja: <b><?= $this->article->modified(); ?></b></li>
                                <li class="list-group-item">Ostatnio edytował: <b><?= $this->article->modifierFullName(
                                        ); ?></b></li>
                            <?php endif; ?>
                            <li class="list-group-item">Liczba odsłon: <b><?= $this->article->views(); ?></b></li>
                            <li class="list-group-item">Odnośnik do artykułu: <b>
                                    <a target="_blank" href="<?= $this->article->url(); ?>">zobacz wpis</a></b></li>
                        </ul>
                    </div>
                <?php endif; ?>
                <hr>
                <!-- published box -->
                <div class="card">
                    <div class="card-body">
                        <p>
                            <i class="fa fa-key"></i> Status:
                            <b><?= $this->article->isPublished() ? 'opublikowany' : 'szkic'; ?></b>
                        </p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="published"
                                   name="published" <?= $this->article->isPublished() ? ' checked' : ''; ?>>
                            <label class="form-check-label" for="published">
                                <?php if (!$this->article->isPublished()): ?>Zaznacz, by opublikować
                                <?php else: ?>Odznacz, by zamienić w szkic<?php endif; ?>
                            </label>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- options box -->
                <div class="card">
                    <div class="card-body">
                        <p><i class="fa fa-eye"></i> Widoczność:
                            <b><?= $this->article->isHomepageHidden(
                                ) ? 'Niewidoczny na głównej' : 'Widoczny wszędzie'; ?></b>
                        </p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="homepage_hidden"
                                   name="homepage_hidden" <?= $this->article->isHomepageHidden() ? ' checked' : ''; ?>>
                            <label class="form-check-label" for="homepage_hidden">
                                <?php if (!$this->article->isHomepageHidden()): ?>Zaznacz, by ukryć na stronie głównej
                                <?php else: ?>Odznacz, by ponownie pokazać na stronie głównej<?php endif; ?>
                            </label>
                        </div>
                        <p class="text-muted">Ukryty artykuł będzie widoczny tylko w widoku kategorii.</p>
                    </div>
                </div>

            </div>
        </div>
    </form>

<?php include '_foot.html.php';
