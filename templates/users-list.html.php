<?php

/** @var \Rudolf\Modules\Users\Roll\Admin\View $this */
/** @var \Rudolf\Modules\Users\One\Admin\User $a */

include '_head.html.php'; ?>

<?php if ($this->loop->isItems()): ?>
    <table class="table table-hover table-responsive-md table-sm table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>nick</th>
            <th>name</th>
            <th>surname</th>
            <th>email</th>
            <th>Edytuj</th>
            <th>Usuń</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($this->loop->haveItems()): $a = $this->loop->item(); ?>
            <tr>
                <th><?= $a->id(); ?></th>
                <td><?= $a->nick(); ?></td>
                <td><?= $a->firstName(); ?></td>
                <td><?= $a->surname(); ?></td>
                <td><?= $a->email(); ?></td>
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

<?php else: ?>
    <div class="alert alert-info">Brak elementów do wyświetlenia!</div>
<?php endif; ?>

<?php include '_foot.html.php';
