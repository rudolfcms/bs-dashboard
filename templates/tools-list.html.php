<?php

/** @var \Rudolf\Modules\Tools\Admin\Roll\View $this */
/** @var \Rudolf\Modules\Tools\Admin\One\Tool $a */

include '_head.html.php'; ?>

<?php if ($this->loop->isItems()): ?>
<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nazwa</th>
    </tr>
  </thead>
  <tbody>
<?php $i = 1; while ($this->loop->haveItems()): $a = $this->loop->item(); ?> 
    <tr>
      <th><?=$i++;?></th>
      <td><a href="<?=$a->slug();?>"><?=$a->name();?></a></td>
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
  <div class="alert alert-info">Brak narzędzi do wyświetlenia!</div>
<?php endif;?> 

<?php include '_foot.html.php';
