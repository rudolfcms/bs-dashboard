<?php include '_head.html.php'; ?>

<?php if ($this->loop->isItems()): ?>
<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Tytuł</th>
      <th>Odsłon</th>
      <th>Modyfikacja</th>
      <th>Dodano</th>
      <th>Edytuj</th>
      <th>Usuń</th>
    </tr>
  </thead>
  <tbody>
<?php while ($this->loop->haveItems()): $a = $this->loop->item(); ?> 
    <tr>
      <th><?=$a->id();?></th>
      <td class="wrap_container"><a href="<?=$a->url();?>" title="<?=$a->title();?>"><?=$a->title();?></a></td>
      <td><?=$a->views();?></td>
      <td><?=$a->modified();?></td>
      <td><?=$a->added();?></td>
      <td><a href="<?=$a->editUrl();?>" class="btn btn-primary btn-xs">Edytuj</a></td>
      <td><a href="<?=$a->delUrl();?>" class="btn btn-danger btn-xs">Usuń</a></td>
    </tr>
<?php endwhile;?> 
  </tbody>
</table>

<?php if ($this->loop->isPagination()): ?> 
  <nav role="navigation" class="pagination-container">
    <?=$this->loop->nav(['ul' => 'pagination', 'current' => 'active'], 2);?>
  </nav>
<?php endif;?> 

<?php else: ?> 
  <div class="alert alert-info">Brak strong do wyświetlenia!</div>
<?php endif;?> 

<?php include '_foot.html.php'; ?>