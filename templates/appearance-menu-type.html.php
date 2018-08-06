<?php

/** @var \Rudolf\Modules\Appearance\Menu\Type\TypeAddView $this */
/** @var \Rudolf\Modules\Appearance\Menu\Type\MenuType $this ->item */

include '_head.html.php'; ?>

<form class="form-horizontal" method="post">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Nazwa menu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title"
                           value="<?= $this->item->getTitle(); ?>" placeholder="Tytuł" required autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Opis</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="description" id="description"
                           value="<?= $this->item->getDescription(); ?>" placeholder="Opis">
                </div>
            </div>

            <div class="form-group row">
                <label for="menu_type" class="col-sm-2 col-form-label col-form-label-sm">URL</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-control-sm" name="menu_type" id="menu_type"
                           value="<?= $this->item->getSlug(); ?>" placeholder="URL">
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
                <a class="btn btn-outline-danger btn-lg btn-block" href="<?= $this->item->delUrl(); ?>">Usuń</a>
            <?php endif; ?>

            <a class="btn btn-outline-secondary btn-lg btn-block" href="<?= $this->adminDir(); ?>/appearance/menu">Anuluj</a>

        </div>
    </div>
</form>

<?php include '_foot.html.php';
