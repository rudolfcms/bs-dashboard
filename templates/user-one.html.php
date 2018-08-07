<?php

/** @var \Rudolf\Modules\Users\One\Admin\Profile\EditView $this */

include '_head.html.php'; ?>

    <form action="<?= $this->path; ?>" method="post">
        <div class="row">
            <div class="col-md-8">

                <div class="form-group row">
                    <label for="nick" class="col-sm-2 col-form-label">Nick</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nick" id="nick"
                               value="<?= $this->user->nick(); ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="first_name" class="col-sm-2 col-form-label">Imię</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="first_name" id="first_name"
                               value="<?= $this->user->firstName(); ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="surname" class="col-sm-2 col-form-label">Nazwisko</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="surname" id="surname"
                               value="<?= $this->user->surname(); ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" id="email"
                               value="<?= $this->user->email(); ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2 col-form-label">Aktywne</div>
                    <div class="col-sm-10 btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary <?= $this->user->isActive() ? 'active' : ''; ?>">
                            <input type="radio" name="active" autocomplete="off" value="1" <?= $this->user->isActive(
                            ) ? 'checked' : ''; ?>> Aktywne
                        </label>
                        <label class="btn btn-secondary <?= !$this->user->isActive() ? 'active' : ''; ?>">
                            <input type="radio" name="active" autocomplete="off" value="0" <?= !$this->user->isActive(
                            ) ? 'checked' : ''; ?>> Nieaktywne
                        </label>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">
                        <?php if ('edit' === $this->templateType): ?>Nowe h<?php else: ?>H<?php endif; ?>asło</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password_again" class="col-sm-2 col-form-label">Powtórz hasło</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password_again" id="password_again">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php if ('edit' === $this->templateType): ?>
                    <input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="update" value="Edytuj">
                <?php else: ?>
                    <input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="add" value="Dodaj">
                <?php endif; ?>

                <?php if ('edit' === $this->templateType): ?>
                    <a class="btn btn-outline-danger btn-lg btn-block" href="<?= $this->user->delUrl(); ?>">Usuń</a>
                <?php endif; ?>

                <a class="btn btn-outline-secondary btn-lg btn-block" href="../">Anuluj</a>

                <?php if ('edit' === $this->templateType): ?>
                    <hr>
                    <div class="card">
                        <div class="card-header">Informacje o użytkowniku</div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Data rejestracji: <b><?= $this->user->getRegisterDate(); ?></b>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </form>


<?php include '_foot.html.php';
