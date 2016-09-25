<?php include '_head.html.php'; ?>

<form method="post" action="">
  <input type="hidden" name="backup">
  <button class="btn btn-primary" type="submit" name="plain">Pobierz zrzut bazy</button>
  <hr>
  <button class="btn btn-primary" type="submit" name="gziped">Pobierz skompresowany zrzut bazy</button>
</form>

<?php include '_foot.html.php'; ?>