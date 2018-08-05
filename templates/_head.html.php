<!DOCTYPE html>
<html lang="pl">
  <head>
    <?php $this->head->make();?>
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=$this->adminDir();?>"><?=strip_tags(GENERAL_SITE_NAME);?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=DIR;?>/">
              <span class="fa fa-eye"></span> Strona</a>
            </li>
            <li><a href="#">
              <span class="fa fa-cog"></span> Ustawienia</a>
            </li>
            <li><a href="#">
              <span class="fa fa-question-circle"></span> Pomoc</a>
            </li>
            <li><a href="<?=DIR;?>/user/profile">
              <span class="fa fa-user"></span> Profil</a>
            </li>
            <li><a href="<?=DIR;?>/user/logout">
              <span class="fa fa-sign-out"></span> Wyloguj się</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" id="nav-sidebar">
            <?=$this->pageNav('main', 3,
            [
              'root_ul' => 'nav nav-sidebar',
              'li_active' => 'active open',
              'sub_ul' => 'nav-sidebar-sub',
              'li_with_ul' => 'treeview',
            ],
            [],
            [
              'li_with_ul_a' => '<div class="caret-container"><span class="caret"></span></div>',
            ],
            [
              'li_a_text-container' => 'span',
              'li_a_ico-container' => 'i',
              'li_a_ico-class_base' => 'fa',
            ]
          ); ?> 
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="page-header">
            <h1><?=$this->pageTitle();?></h1>
          </div>

          <?=$this->breadcrumb($nesting = 2, ['ul' => 'breadcrumb', 'li_active' => 'active']);?> 

<?=$this->alerts(); ?>
