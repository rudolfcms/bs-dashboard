<?php

/** @var \Rudolf\Modules\Users\One\Login\View $this */

?><!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel logowania | <?=strip_tags(GENERAL_SITE_NAME);?></title>
    <link href="<?= $this->themePath; ?>/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $this->themePath; ?>/css/singin.css" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" method="post">
    <img class="mb-4" src="https://avatars3.githubusercontent.com/u/25126979" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Panel zarządzania</h1>

    <?php if ($this->isMessage()): ?>
        <div class="alert alert-<?= $this->getMessage('type'); ?>"><?= ucfirst($this->getMessage('message')); ?>.</div>
    <?php endif; ?>

    <label for="inputEmail" class="sr-only">Email</label>
    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email"
           value="<?= $this->getNick(); ?>" required autofocus>

    <label for="inputPassword" class="sr-only">Hasło</label>
    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Hasło" required>

    <button name="send" class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj</button>
    <p class="mt-5 mb-3 text-muted">&copy; by Rudolf <?= VER_NAME; ?></p>
</form>
</body>

</html>
