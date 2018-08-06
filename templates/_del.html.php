<?php

/** @var \Rudolf\Modules\Articles\One\Admin\DelView $this */
/** @var \Rudolf\Modules\Albums\One\Admin\DelView $this */
/** @var \Rudolf\Modules\Articles\One\Admin\Article $item */
/** @var \Rudolf\Modules\Albums\One\Admin\Album $item */

include '_head.html.php'; ?>

    <form method="post" action="<?= $this->path; ?>">
        <div class="card">
            <div class="card-header">Czy na pewno chcesz usunąć?</div>
            <div class="card-body">
                <p>Tytuł: <b><?= $item->title(); ?></b></p>
                <p><i class="fa fa-key"></i>
                    Status: <b><?= $item->isPublished() ? 'opublikowany' : 'szkic'; ?></b>
                </p>
                <p><i class="fa fa-calendar"></i> Data wyświetlana: <b><?= $item->date(); ?></b></p>
            </div>
            <div class="card-footer">
                <a href="../" class="btn btn-outline-secondary">Anuluj</a>
                <input name="delete" type="submit" class="btn btn-danger btn-flat pull-right" value="Usuń">
            </div>
        </div>
    </form>

<?php include '_foot.html.php';
