<?php include '_head.html.php'; ?>

<?php if ($this->loop->isItems()): ?>
<div class="row">
  <?php while ($this->loop->haveItems()): $a = $this->loop->item(); ?>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a data-toggle="modal" data-target="#<?=$a->name();?>">
        <img src="<?=$a->urlPath();?>/thumb.png" alt="<?=$a->name();?>">
      </a>
      <div class="caption">
        <h3><?=$a->fullName();?></h3>
        <p><?=$a->description();?></p>
        <p>
          <?php if($a->isActive()): ?>
          <a class="btn btn-primary disabled" role="button">Aktualnie używany</a>
          <a href="./editor" class="btn btn-success" role="button">Dostosuj</a>
          <?php else: ?>
          <a href="./switch/<?=$a->name()?>" class="btn btn-primary">Zacznij używać</a>
          <?php endif; ?>
        </p>
        <div class="modal fade bs-example-modal-lg" id="<?=$a->name();?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
            </button>
                <h4 class="modal-title">
                  <?=$a->fullName();?> <small>Szczegóły szablonu</small></h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-xs-8">
                    <img class="thumbnail img-responsive" src="<?=$a->urlPath();?>/thumb.png" alt="Zrzut ekranu">
                  </div>
                  <div class="col-xs-4">
                    <h3>
                      <?=$a->fullName();?> <small>v<?=$a->version();?></small></h3>
                    <h4><small>created by <?=$a->author()?></small></h4>
                    <hr/>
                    <?=$a->description();?>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <?php if($a->isActive()): ?>
                <a class="btn btn-primary disabled" role="button">Aktualnie używany</a>
                <a href="./editor" class="btn btn-success" role="button">Dostosuj</a>
                <?php else: ?>
                <a href="./switch/<?=$a->name()?>" class="btn btn-primary">Zacznij używać</a>
                <?php endif; ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
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
<nav role="navigation" class="pagination-container">
  <?=$this->loop->nav(['ul' => 'pagination', 'current' => 'active'], 2);?>
</nav>
<?php endif;?>

<?php else: ?>
<div class="alert alert-info">Brak szablonów do wyświetlenia!</div>
<?php endif;?>

<?php include '_foot.html.php'; ?>
