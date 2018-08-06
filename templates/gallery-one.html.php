<?php

/** @var \Rudolf\Modules\Galleries\One\Admin\AddView $this */
/** @var \Rudolf\Modules\Galleries\One\Admin\EditView $this */

include '_head.html.php'; ?>

    <form action="<?= $this->path; ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">

                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Tytuł galerii</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title"
                               value="<?= $this->gallery->title('raw'); ?>" placeholder="Tytuł" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="slug" class="col-sm-2 col-form-label col-form-label-sm">URL</label>
                    <div class="col-sm-10">
                        <input type="text" id="slug" name="slug" value="<?= $this->gallery->slug('raw'); ?>"
                               placeholder="URL" class="form-control form-control-sm">
                        <p class="text-muted">
                            Jeśli zostawisz to pole puste, zostanie uzupełnione wygenerowanym URLem.
                        </p>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="thumb_width" class="col-sm-2 col-form-label col-form-label-sm">Szerokość miniatur</label>
                    <div class="col-sm-10">
                        <input type="number" min="0" id="thumb_width" name="thumb_width"
                               value="<?= $this->gallery->thumbsWidth(); ?>" placeholder="Szerokość miniatur"
                               class="form-control form-control-sm">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="thumb_height" class="col-sm-2 col-form-label col-form-label-sm">Wysokość miniatur</label>
                    <div class="col-sm-10">
                        <input type="number" min="0" id="thumb_height" name="thumb_height"
                               value="<?= $this->gallery->thumbsHegiht(); ?>" placeholder="Wysokość miniatur"
                               class="form-control form-control-sm">
                    </div>
                </div>

                <?php if ('edit' === $this->templateType): ?>
                    <div class="form-group row">
                        <label for="photo_upload" class="col-sm-2 col-form-label">Dodaj zdjęcie</label>
                        <div class="col-sm-10">
                            <input type="file" name="photo_upload" id="photo_upload" class="form-control-file">
                            <input type="hidden" name="MAX_FILE_SIZE" value="<?= 1024 * (1024 * 2); ?>">
                            <p class="help-block">
                                Maksymalny rozmiar: <b>2MiB</b>.<br>
                                Obsługiwane formaty: <b>JPG</b>, <b>PNG</b>, <b>GIF</b>.<br>
                                Po dodaniu zdjęcia kliknij przycisk <b>Edytuj</b>.
                            </p>
                        </div>
                    </div>

                    <hr>

                    <?php if ($this->gallery->hasPhotos()): ?>
                        <div class="row">
                            <div class="table table-striped">
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
                                            <td><?= ++$key; ?></td>
                                            <td>
                                                <a href="<?= $value['photo']; ?>" target="_blank">
                                                    <img src="<?= $value['thumb']; ?>" width="100" height="75" alt="<?= $value['alt']; ?>">
                                                </a>
                                            </td>
                                            <td><?= $value['alt']; ?></td>
                                            <td>
                                                <button class="btn btn-danger" name="delete" value="<?= $value['alt']; ?>">
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
                    <input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="update" value="Edytuj">
                <?php else: ?>
                    <input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="add" value="Dodaj">
                <?php endif; ?>

                <?php if ('edit' === $this->templateType): ?>
                    <a class="btn btn-outline-danger btn-lg btn-block" href="<?= $this->gallery->delUrl(); ?>">Usuń</a>
                <?php endif; ?>

                <a class="btn btn-outline-secondary btn-lg btn-block" href="<?= $this->adminDir(); ?>/gallerys">Anuluj</a>

                <?php if ('edit' === $this->templateType): ?>
                    <hr>
                    <div class="card">
                        <div class="card-header">Informacje o galerii</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Dodano przez: <b><?= $this->gallery->adderFullName(); ?></b>
                            </li>
                            <li class="list-group-item">Data dodania: <b><?= $this->gallery->added(); ?></b></li>
                            <?php if ($this->gallery->isModified()): ?>
                                <li class="list-group-item">Modyfikacja: <b><?= $this->gallery->modified(); ?></b></li>
                                <li class="list-group-item">Ostatnio edytował: <b><?= $this->gallery->modifierFullName(); ?></b></li>
                            <?php endif; ?>
                            <li class="list-group-item">Kod galerii: <code><?= $this->gallery->code(); ?></code></li>
                        </ul>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </form>

<?php include '_foot.html.php';
