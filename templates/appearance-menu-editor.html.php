<?php

/** @var \Rudolf\Modules\Appearance\Menu\MenuView $this */

include '_head.html.php'; ?>

<style>
    .editor-menu li {
        line-height: 200%;
    }
</style>

<div class="editor-menu">
    <?php foreach ($this->types as $type): ?>
        <h2><?=$type['title'];?>
            <a href="<?=DIR;?>/admin/appearance/menu/edit-type/<?=$type['id'];?>" class="btn btn-primary btn-xs">Edytuj</a>
            <a href="<?=DIR;?>/admin/appearance/menu/del-type/<?=$type['id'];?>" class="btn btn-danger btn-xs">Usuń</a>
        </h2>
        <p><?=$type['description'];?></p>
        <?php echo $this->createMenu($type['menu_type']); ?>
    <?php endforeach; ?>
</div>

<?php include '_foot.html.php';
