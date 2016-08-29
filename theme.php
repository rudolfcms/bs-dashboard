<?php

use Rudolf\Component\Html\Theme;

class bs_dashboard extends Theme
{
    public function init()
    {
        $this->addHeadBefore('<meta http-equiv="X-UA-Compatible" content="IE=edge">');
        $this->addHeadBefore('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
        $this->addStylesheet($this->path.'/bower_components/bootstrap/dist/css/bootstrap.min.css');
        $this->addStylesheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
        $this->addStylesheet($this->path.'/css/dashboard.css');
        $this->addStylesheet($this->path.'/css/custom.css');
        $this->addFootBefore('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>window.jQuery || document.write("<script src=\''.$this->path.'/bower_components/jquery/dist/jquery.min.js\'><script>")</script>');
        $this->addScript($this->path.'/bower_components/bootstrap/dist/js/bootstrap.min.js');
        $this->addFootAfter('<script>
        $("#nav-sidebar .treeview").on("click", ".caret-container", function(event) {
          event.stopPropagation();
          var el = $(event.currentTarget);
          el.next().slideToggle();
          el.parent().toggleClass("open");
        });
    </script>');
    }
}
