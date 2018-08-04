<?php

/** @var \Rudolf\Modules\Appearance\Menu\Item\ItemAddView $this */
/** @var \Rudolf\Component\Helpers\Navigation\MenuItem $parent */

include '_head.html.php';?>

    <form class="form-horizontal" method="post">
        <div class="row">
            <div class="col-md-8">

                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Nazwa pozycji</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="title" id="title" value="<?=$this->item->getTitle();?>" placeholder="Tytuł" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="caption" class="col-sm-3 control-label">Podpis</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="caption" id="caption" value="<?=$this->item->getCaption();?>" placeholder="Podpis">
                    </div>
                </div>

                <div class="form-group">
                    <label for="menu_type" class="col-sm-3 control-label">Rodzaj menu</label>
                    <div class="col-sm-9">
                        <select name="menu_type" id="menu_type" class="form-control">
                            <?php foreach ($this->types as $type): ?>
                                <option value="<?=$type['menu_type'];?>" <?=$type['menu_type'] === $this->item->getType() ? ' selected' : '';?>>
                                    <?=$type['title'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="parent_id" class="col-sm-3 control-label">ID rodzica</label>
                    <div class="col-sm-9">
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="0">- Brak pozycji nadrzędnej -</option>
                            <?php foreach ($this->items->getByType($this->item->getType(), false) as $parent): ?>
                            <?php if ($parent->getId() === $this->item->getId()) { continue; } ?>
                                <option value="<?=$parent->getId(); ?>" <?=$parent->getId() === $this->item->getParentId() ? ' selected' : ''; ?>>
                                    <?=$parent->getId(); ?> - <?=$parent->getTitle(); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <p class="text-muted">Pozycje z danego rodzaju menu. By zobaczyć pozycje z innego, wcześniej zapisz pozycję.</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="position" class="col-sm-3 control-label">Pozycja</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="position" id="position" value="<?=$this->item->getPosition();?>" placeholder="Pozycja" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="item_type" class="col-sm-3 control-label">Rodzaj pozycji</label>
                    <div class="col-sm-9">
                        <select name="item_type" id="item_type" class="form-control">
                            <option value=""<?=$this->item->getItemType() !== 'absolute' ? ' selected="selected"' : '';?>>Aplikacja</option>
                            <option value="absolute" <?=$this->item->getItemType() === 'absolute' ? ' selected' : '';?>>Zewnętrzna</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="slug" class="col-sm-3 control-label">URL</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="slug" id="slug" value="<?=$this->item->getRealSlug();?>" placeholder="URL">
                    </div>
                </div>

            </div>
            <div class="col-md-4">

                <?php if ('edit' === $this->templateType): ?>
                    <input class="btn btn-primary btn-lg btn-block" type="submit" name="update" value="Edytuj">
                <?php else: ?>
                    <input class="btn btn-primary btn-lg btn-block" type="submit" name="add" value="Dodaj">
                <?php endif;?>

                <a class="btn btn-default btn-lg btn-block" href="<?=$this->adminDir();?>/appearance/menu">Anuluj</a>

                <?php if ('edit' === $this->templateType): ?>
                    <a class="btn btn-danger btn-lg btn-block" href="<?=$this->item->delUrl();?>">Usuń</a>
                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-heading">Informacje o pozycji</div>
                        <ul class="list-group">
                            <li class="list-group-item">Odnośnik: <b><a target="_blank" href="<?=$this->item->url();?>">zobacz</a></b></li>
                        </ul>
                    </div>
                <?php endif;?>

            </div>
        </div>
    </form>

<?php include '_foot.html.php';
