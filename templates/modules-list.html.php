<?php

/** @var \Rudolf\Modules\Modules\Roll\Admin\View $this */
/** @var \Rudolf\Modules\Modules\One\Admin\Module $a */

include '_head.html.php'; ?>

<?php if ($this->loop->isItems()): ?>
    <table class="table table-hover table-responsive-lg table-sm table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Status</th>
            <th style="width: 100px">Wyłącz/włącz</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($this->loop->haveItems()): $a = $this->loop->item(); ?>
            <tr>
                <th><?= $a->id(); ?></th>
                <td><?= $a->name(); ?></td>

                <?php if ($a->status()): ?>
                    <td class="text-success">Włączony</td>
                    <td class="text-center"><a href="<?= $a->offUrl(); ?>" class="btn btn-warning btn-sm">Wyłącz</a></td>

                <?php else: ?>
                    <td class="text-muted">Wyłączony</td>
                    <td class="text-center"><a href="<?= $a->onUrl(); ?>" class="btn btn-success btn-sm">Włącz</a></td>
                <?php endif; ?>
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
