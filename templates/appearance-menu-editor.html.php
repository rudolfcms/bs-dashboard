<?php include '_head.html.php'; ?>

<style>
    .editor-menu li {
        line-height: 200%;
    }
</style>

<a href="<?=$this->adminDir();?>/appearance/menu/add" class="btn btn-default">Dodaj</a>

<div class="editor-menu">
    <?php foreach ($this->types as $type): ?>
        <h2><?=$type['title'];?></h2>
        <p><?=$type['description'];?></p>
        <?php echo $this->createMenu($type['menu_type']); ?>
    <?php endforeach; ?>
</div>

<?php include '_foot.html.php';
