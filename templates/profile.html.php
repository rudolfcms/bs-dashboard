<?php

/** @var \Rudolf\Modules\Users\One\Admin\Profile\ShowView $this */

include '_head.html.php'; ?>

    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="<?= $this->themePath; ?>/img/man.jpg" width="250" height="250" alt="avatar">
            </div>
        </div>
        <div class="col-md-8">
            <div class="caption">
                <h2><?= $this->getUserFullName(); ?> (<?= $this->getUserNick(); ?>)</h2>
                <p>Adres email: <b><?= $this->getUserEmail(); ?></b></p>
                <p>Data rejestracji: <b><?=$this->getUserRegisterDate();?></b></p>
                <p>
                    <a href="<?=$this->adminDir();?>/users/edit/<?=$this->getUserId();?>" class="btn btn-primary" role="button">Edytuj profil</a>
                </p>
            </div>
        </div>
    </div>

<?php include '_foot.html.php';
