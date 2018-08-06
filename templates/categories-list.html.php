<?php

/** @var \Rudolf\Modules\Albums\Category\Roll\Admin\View $this */
/** @var \Rudolf\Modules\Articles\Category\Roll\Admin\View $this */
/** @var \Rudolf\Modules\Albums\Category\One\Admin\Category $a */
/** @var \Rudolf\Modules\Articles\Category\One\Admin\Category $c */

include '_head.html.php'; ?>

<?php if ($this->loop->isItems()): ?>
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tytuł</th>
            <th>Ilość</th>
            <th>Edytuj</th>
            <th>Usuń</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($this->loop->haveItems()): $a = $this->loop->item(); ?>
            <tr>
                <th><?= $a->id(); ?></th>
                <td class="text-truncate" style="max-width: 310px;">
                    <a href="<?= $a->url(); ?>" title="<?= $a->title(); ?>"><?= $a->title(); ?></a>
                </td>
                <td><?= $a->total(); ?></td>
                <td>
                    <a href="<?= $a->editUrl(); ?>" class="btn btn-outline-primary btn-sm">
                        <span class="fa fa-edit"></span> Edytuj</a>
                </td>
                <td>
                    <a href="<?= $a->delUrl(); ?>" class="btn btn-outline-danger btn-sm">
                        <span class="fa fa-remove"></span> Usuń</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="alert alert-info">
        Brak elementów do wyświetlenia.
    </div>
<?php endif; ?>

<?php if ($this->loop->isPagination()): ?>
    <nav aria-label="Page navigation">
        <?= $this->loop->nav(
            [
                'ul'         => 'pagination justify-content-center',
                'li'         => 'page-item',
                'li_current' => 'active',
                'a'          => 'page-link',
            ],
            2
        ); ?>
    </nav>
<?php endif; ?>

<?php include '_foot.html.php';
