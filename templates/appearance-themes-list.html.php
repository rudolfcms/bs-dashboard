<?php

/** @var \Rudolf\Modules\Appearance\Roll\Admin\View $this */
/** @var \Rudolf\Modules\Appearance\One\Admin\Theme $a */

include '_head.html.php'; ?>

<?php if ($this->loop->isItems()): ?>
    <div class="row">
        <?php while ($this->loop->haveItems()): $a = $this->loop->item(); ?>
            <div class="col-sm-6 col-md-4">
                <div class="card">
                    <a data-toggle="modal" data-target="#<?= $a->name(); ?>">
                        <img src="<?= $a->urlPath(); ?>/thumb.png" alt="<?= $a->name(); ?>" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <h3><?= $a->fullName(); ?></h3>
                        <p><?= $a->description(); ?></p>
                        <p>
                            <?php if ($a->isActive()): ?>
                                <a class="btn btn-outline-secondary disabled" role="button">Aktualnie używany</a>
                                <a href="./editor" class="btn btn-outline-success" role="button">Dostosuj</a>
                            <?php else: ?>
                                <a href="./switch/<?= $a->name() ?>" class="btn btn-primary">Zacznij używać</a>
                            <?php endif; ?>
                        </p>
                        <div class="modal fade" id="<?= $a->name(); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?= $a->fullName(); ?>
                                            <small>Szczegóły szablonu</small>
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <img class="img-thumbnail"
                                                     src="<?= $a->urlPath(); ?>/thumb.png" alt="Zrzut ekranu">
                                            </div>
                                            <div class="col-sm-4">
                                                <h3><?= $a->fullName(); ?></h3>
                                                <p class="text-muted">v<?= $a->version(); ?></p>
                                                <p class="text-muted">created by <?= $a->author() ?></p>
                                                <hr/>
                                                <?= $a->description(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?php if ($a->isActive()): ?>
                                            <a class="btn btn-outline-secondary disabled" role="button">Aktualnie
                                                używany</a>
                                            <a href="./editor" class="btn btn-outline-success"
                                               role="button">Dostosuj</a>
                                        <?php else: ?>
                                            <a href="./switch/<?= $a->name() ?>" class="btn btn-primary">Zacznij
                                                używać</a>
                                        <?php endif; ?>
                                        <button type="button" class="btn btn-outline-default" data-dismiss="modal">
                                            Zamknij
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

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
