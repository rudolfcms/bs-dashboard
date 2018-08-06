<?php

/** @var \Rudolf\Modules\Modules\Roll\Admin\View $this */
/** @var \Rudolf\Modules\Modules\One\Admin\Module $a */

include '_head.html.php'; ?>

<?php if ($this->loop->isItems()): ?>
<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nazwa</th>
      <th>Status</th>
      <th>Wyłącz/włącz</th>
      <th>Edytuj</th>
    </tr>
  </thead>
  <tbody>
<?php while ($this->loop->haveItems()): $a = $this->loop->item(); ?> 
    <tr>
      <th><?=$a->id();?></th>
      <td><?=$a->name();?></td>
      
      <?php if ($a->status()): ?>
      <td class="text-success" style="font-weight:bold">Włączony</td>
      <td><a href="<?=$a->offUrl();?>" class="btn btn-warning btn-xs">Wyłącz</a></td>
      
      <?php else: ?> 
      <td class="text-muted">Wyłączony</td>
      <td><a href="<?=$a->onUrl();?>" class="btn btn-success btn-xs">Włącz</a></td>
      <?php endif;?> 
      
      <td><a href="<?=$a->editUrl();?>" class="btn btn-primary btn-xs">Edytuj</a></td>
    </tr>
<?php endwhile;?> 
  </tbody>
</table>

<?php if ($this->loop->isPagination()): ?> 
  <nav role="navigation" class="pagination-container">
    <?=$this->loop->nav(['ul' => 'pagination', 'li_current' => 'active'], 2);?>
  </nav>
<?php endif;?> 

<?php else: ?> 
  <div class="alert alert-info">Brak modułów do wyświetlenia!</div>
<?php endif;?> 

<?php include '_foot.html.php';
