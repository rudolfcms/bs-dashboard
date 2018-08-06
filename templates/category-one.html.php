<?php

/** @var \Rudolf\Modules\Albums\Category\One\Admin\EditView $this */
/** @var \Rudolf\Modules\Articles\Category\One\Admin\EditView $this */
/** @var \Rudolf\Modules\Albums\Category\One\Admin\AddView $this */
/** @var \Rudolf\Modules\Articles\Category\One\Admin\AddView $this */

include '_head.html.php'; ?>

    <form action="<?= $this->path; ?>" method="post">
        <div class="row">
            <div class="col-md-8">

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Tytuł</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title"
                               value="<?= $this->category->title(); ?>" placeholder="Tytuł" required>
                    </div>
                </div>

                <div class="form-group row">
                    <?= $this->adminFields->textarea(
                        $this->category->content(),
                        'content',
                        'form-control',
                        'content'
                    ); ?>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Opis</label>
                    <div class="col-sm-10">
                        <input type="text" id="description" name="description"
                               value="<?= $this->category->description(); ?>" placeholder="Opis" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="keywords" class="col-sm-2 col-form-label">Słowa</label>
                    <div class="col-sm-10">
                        <input type="text" id="keywords" name="keywords" value="<?= $this->category->keywords(); ?>"
                               placeholder="Słowa kluczowe" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label">URL</label>
                    <div class="col-sm-10">
                        <input type="text" id="slug" name="slug" value="<?= $this->category->slug(); ?>"
                               placeholder="URL" class="form-control">
                        <p class="text-muted">Adres pod jakim będzie dostępna kategoria (http://twojastrona.pl/&lt;moduł&gt;/kategorie/<b>{URL)</b>.
                            Jeśli zostawisz to pole puste, URL zostanie wygenerowany automatycznie.</p>
                    </div>
                </div>

            </div><!-- /.col-->

            <div class="col-md-4">

                <?php if ('edit' === $this->templateType): ?>
                    <input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="update" value="Edytuj">
                <?php else: ?>
                    <input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="add" value="Dodaj">
                <?php endif; ?>

                <?php if ('edit' === $this->templateType): ?>
                    <a class="btn btn-outline-danger btn-lg btn-block" href="<?= $this->category->delUrl(); ?>">Usuń</a>
                <?php endif; ?>

                <a class="btn btn-outline-secondary btn-lg btn-block" href="../categories">Anuluj</a>

                <?php if ('edit' === $this->templateType): ?>
                    <hr>
                    <div class="card">
                        <div class="card-header">Informacje o kategorii</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Dodano przez: <b><?= $this->category->adderFullName(); ?></b>
                            </li>
                            <li class="list-group-item">Data dodania: <b><?= $this->category->added(); ?></b></li>
                            <?php if ($this->category->isModified()): ?>
                                <li class="list-group-item">Modyfikacja: <b><?= $this->category->modified(); ?></b></li>
                                <li class="list-group-item">Ostatnio edytował: <b><?= $this->category->modifierFullName(); ?></b></li>
                            <?php endif; ?>
                            <li class="list-group-item">Liczba odsłon: <b><?= $this->category->views(); ?></b></li>
                            <li class="list-group-item">Odnośnik do kategorii: <b>
                                    <a target="_blank" href="<?= $this->category->url(); ?>">zobacz kategorię</a></b>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>

            </div>
    </form>

<?php include '_foot.html.php';
