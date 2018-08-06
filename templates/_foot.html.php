<?php

/** @var \Rudolf\Framework\View\AdminView $this */
?>

</main>
    </div>
</div>
  <footer class="footer">
    <div class="container">
        <strong>&copy; <?=date('Y');?> <?=NAME;?></strong>>
      <div class="pull-right"><a href="https://github.com/rudolfcms/rudolf/releases/tag/<?=VER_NAME;?>"><?=VER_NAME;?></a></div>
    </div>
  </footer>
  <?php $this->foot->make();?>
  </body>
</html>
