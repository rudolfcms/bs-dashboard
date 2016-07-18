
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="row">
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
        <div class="pull-right version"><?=VER_NAME;?></div>
        <strong>&copy; <?=date('Y');?> <?=NAME;?></strong>
      </div>
    </div>
  </footer>
  <script src="<?=$this->themePath;?>/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?=$this->themePath;?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script>
    $("#nav-sidebar .treeview").on("click", ".caret-container", function(event) {
      event.stopPropagation();
      var el = $(event.currentTarget);
      el.next().slideToggle();
      el.parent().toggleClass('open');
    });
  </script>
  </body>
</html>