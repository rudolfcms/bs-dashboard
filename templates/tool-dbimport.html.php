<?php include '_head.html.php'; ?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="file" name="sqlfile">
        <p class="text-muted">Uwaga! Po zaimportowaniu bazy danych może nastąpić wylogowanie.
        Tylko pliki .sql.</p>
    </div>
    <button class="btn btn-primary" type="submit" name="upload" value="1">Wczytaj zrzut bazy</button>
    <a href="./db-dump" class="btn btn-default">Wykonaj zrzut bazy</a>
</form>

<?php include '_foot.html.php';
