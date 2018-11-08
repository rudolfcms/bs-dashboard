<?php

use Rudolf\Component\Html\Theme;

class bs_dashboard extends Theme
{
    const VERSION = '2.0.1';

    public function init()
    {
        $this->addHeadBefore('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">');
        $this->addStylesheet($this->path.'/css/bootstrap.min.css', self::VERSION);
        $this->addStylesheet('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', self::VERSION);

        $this->addStylesheet($this->path.'/css/dashboard.css', self::VERSION);
        $this->addStylesheet($this->path.'/css/custom.css', self::VERSION);

        $this->addFootBefore('<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>window.jQuery || document.write("<script src=\''.$this->path.'/js/jquery.min.js\'><script>")</script>');
        $this->addScript($this->path.'/js/bootstrap.min.js');
        $this->addFootAfter('<script>
        $(".treeview").on("click", ".caret-container", function(e) {
          e.stopPropagation();
          var el = $(e.currentTarget);
          el.next().slideToggle();
          el.parent().toggleClass("open");
        });
    </script>
    ');
        $this->addHeadAfter('<noscript><style>.nav-sidebar-sub {display: block; }</style></noscript>');
    }
}
