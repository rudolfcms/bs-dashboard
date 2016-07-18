<?php include '_head.html.php';?>

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
<?php while ($this->loop->haveItems()): $c = $this->loop->item(); ?>
    <tr>
      <th><?=$c->id();?></th>
      <td class="wrap_container"><a href="<?=$c->url();?>" title="<?=$c->title();?>"><?=$c->title();?></a></td>
      <td><?=$c->total();?></td>
      <td><a href="<?=$c->editUrl();?>" class="btn btn-primary btn-xs">Edytuj</a></td>
      <td><a href="<?=$c->delUrl();?>" class="btn btn-danger btn-xs">Usuń</a></td>
    </tr>
    <?php endwhile; ?> 
    </tbody>
  </table>
<?php else: ?>
  <div class="alert alert-info">
    Brak kategorii! Dodaj je z formularza obok.
  </div>
<?php endif;?>

<?php if ($this->loop->isPagination()): ?> 
  <nav role="navigation" class="pagination-container">
    <?=$this->loop->nav(['ul' => 'pagination', 'current' => 'active'], 1);?>
  </nav>
<?php endif;?> 

<?php include '_foot.html.php';?>