<?php

/** @var \Rudolf\Framework\View\AdminView $this */

?><!DOCTYPE html>
<html lang="pl">
<head>
    <?php $this->head->make(); ?>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow" role="navigation">
    <a class="navbar-brand col-9 col-sm-3 col-md-2 mr-0 text-truncate" href="<?= $this->adminDir(); ?>"><?= strip_tags(GENERAL_SITE_NAME); ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav m-md-0 m-3">
            <li class="nav-item">
                <a class="nav-link" href="<?= DIR; ?>/"><span class="fa fa-eye"></span> Strona</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><span class="fa fa-cog"></span> Ustawienia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://github.com/rudolfcms/rudolf/issues"><span class="fa fa-question-circle"></span> Pomoc</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= DIR; ?>/user/profile"><span class="fa fa-user"></span> Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= DIR; ?>/user/logout"><span class="fa fa-sign-out"></span> Wyloguj się</a>
            </li>
        </ul>
    </div>

</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 d-none d-md-block bg-light sidebar" id="nav-sidebar">
            <div class="sidebar-sticky">
                <?= $this->pageNav(
                    'main',
                    3,
                    [
                        'root_ul'    => 'nav flex-column',
                        'li'         => 'nav-item',
                        'li_active'  => 'active open',
                        'a'          => 'nav-link',
                        'a_active'   => 'active',
                        'sub_ul'     => 'nav-sidebar-sub',
                        'li_with_ul' => 'treeview',
                    ],
                    [],
                    [
                        'li_with_ul_a' => '<div class="caret-container"><span class="caret"></span></div>',
                    ],
                    [
                        'li_a_text-container' => 'span',
                        'li_a_ico-container'  => 'i',
                        'li_a_ico-class_base' => 'fa',
                    ]
                ); ?>
            </div>
        </div>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mb-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><?= $this->pageTitle(); ?></h1>
            </div>

            <nav aria-label="breadcrumb">
                <?= $this->breadcrumb(
                    $nesting = 2,
                    ['ul' => 'breadcrumb', 'li' => 'breadcrumb-item', 'li_active' => 'active']
                ); ?>
            </nav>

            <?= $this->alerts(); ?>
