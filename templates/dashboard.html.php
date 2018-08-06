<?php

/** @var \Rudolf\Modules\Dashboard\View $this */
/** @var \Rudolf\Component\Helpers\Navigation\MenuItem $value */


include '_head.html.php'; ?>

<div class="row">
    <?php foreach ($this->getMenuCollection() as $key => $value): ?>

        <div class="col-4">
            <div class="card mb-4">
                <a href="<?=DIR.$value->getSlug();?>" style="text-decoration: none;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="fa <?=$value->getIco();?> mr-3"></span>
                            <?=$value->getTitle();?>
                        </h5>
                    </div>
                </a>
            </div>
        </div>

    <?php endforeach; ?>
</div>

<?php include '_foot.html.php';
