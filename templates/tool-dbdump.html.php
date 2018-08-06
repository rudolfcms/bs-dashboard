<?php

/** @var \Rudolf\Modules\Tools\Admin\One\DatabaseDump\View $this */

include '_head.html.php'; ?>

    <form method="post">
        <input type="hidden" name="backup">
        <button class="btn btn-primary" type="submit" name="plain">Pobierz zrzut bazy</button>

        <button class="btn btn-outline-dark" type="submit" name="gziped">Pobierz skompresowany zrzut bazy</button>
        <hr>
        <a href="./db-import" class="btn btn-outline-secondary">Importuj bazę</a>
    </form>

<?php include '_foot.html.php';
