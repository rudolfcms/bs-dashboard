<?php

/** @var \Rudolf\Modules\Pages\One\Admin\AddView $this */
/** @var \Rudolf\Modules\Pages\One\Admin\EditView $this */

include '_head.html.php'; ?>

    <form action="<?= $this->path; ?>" method="post">
        <div class="row">
            <div class="col-md-8">

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Tytuł strony</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title"
                               value="<?= $this->page->title('raw'); ?>" placeholder="Tytuł" required>
                    </div>
                </div>

                <div class="form-group row">
                    <?= $this->adminFields->textarea($this->page->textarea(), 'content', 'form-control', 'content'); ?>
                </div>

                <div class="form-group row">
                    <label for="parent_id" class="col-sm-2 col-form-label">Strona nadrzędna</label>
                    <div class="col-sm-10">
                        <select class="custom-select" id="parent_id" name="parent_id">
                            <option value="0">(brak)</option>
                            <?php foreach ($this->pages() as $key => $value): ?>
                                <option <?= ($value['id'] == $this->page->parentID()) ? 'selected="selected" ' : ''; ?>
                                        value="<?= $value['id']; ?>">
                                    <?= $value['title']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label col-form-label-sm">URL</label>
                    <div class="col-sm-10">
                        <input type="text" id="slug" name="slug" value="<?= $this->page->slug(); ?>" placeholder="URL"
                               class="form-control form-control-sm">
                        <p class="text-muted">Adres pod jakim będzie dostępny artykuł
                            (http://twojastrona.pl/artykuly/<?= date('Y'); ?>/<?= date('m'); ?>/<b>{URL)</b>. Jeśli
                            zostawisz to pole puste, URL zostanie wygenerowany automatycznie.</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label col-form-label-sm">Opis strony</label>
                    <div class="col-sm-10">
                        <input type="text" id="description" name="description"
                               value="<?= $this->page->description('raw'); ?>"
                               placeholder="Opis" class="form-control form-control-sm">
                        <p class="text-muted">Jest widoczny w wynikach wyszukiwania. Staraj się jak najlepiej opisać
                            zawartość strony. Opis i słowa kluczowe <b>nie mogą</b> być takie same.</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="keywords" class="col-sm-2 col-form-label col-form-label-sm">Słowa kluczowe</label>
                    <div class="col-sm-10">
                        <input type="text" id="keywords" name="keywords" value="<?= $this->page->keywords('raw'); ?>"
                               placeholder="Słowa kluczowe" class="form-control form-control-sm">
                        <p class="text-muted">Choć ten tag tak samo jak <u>opis</u> <b>nie wpływa</b> na pozycję strony
                            w wynikach wyszukiwania, warto go uzupełnić słowami kluczowymi, z których mogą korzystać
                            mniej znane wyszukiwarki.</p>
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
                    <a class="btn btn-outline-danger btn-lg btn-block" href="<?= $this->page->delUrl(); ?>">Usuń</a>
                <?php endif; ?>

                <a class="btn btn-outline-secondary btn-lg btn-block"
                   href="<?= $this->adminDir(); ?>/articles">Anuluj</a>

                <?php if ('edit' === $this->templateType): ?>
                    <hr>
                    <div class="card panel-default">
                        <div class="card-header">Informacje o stronie</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Dodano przez: <b><?= $this->page->adderFullName(); ?></b></li>
                            <li class="list-group-item">Data dodania: <b><?= $this->page->added(); ?></b></li>
                            <?php if ($this->page->isModified()): ?>
                                <li class="list-group-item">Modyfikacja: <b><?= $this->page->modified(); ?></b></li>
                                <li class="list-group-item">Ostatnio edytował: <b><?= $this->page->modifierFullName(
                                        ); ?></b></li>
                            <?php endif; ?>
                            <li class="list-group-item">Liczba odsłon: <b><?= $this->page->views(); ?></b></li>
                            <li class="list-group-item">Odnośnik do strony: <b>
                                    <a target="_blank" href="<?= $this->page->url(); ?>">zobacz stronę</a></b></li>
                        </ul>
                    </div>
                <?php endif; ?>
                <hr>
                <!-- published box -->
                <div class="card">
                    <div class="card-body">
                        <p>
                            <i class="fa fa-key"></i> Status:
                            <b><?= $this->page->isPublished() ? 'opublikowany' : 'szkic'; ?></b>
                        </p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="published"
                                   name="published" <?= $this->page->isPublished() ? ' checked' : ''; ?>>
                            <label class="form-check-label" for="published">
                                <?php if (!$this->page->isPublished()): ?>Zaznacz, by opublikować
                                <?php else: ?>Odznacz, by zamienić w szkic<?php endif; ?>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>

<?php include '_foot.html.php';
