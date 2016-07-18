		</section>
		<!-- /.content -->
	</div>

	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<?=VER_NAME;?>
		</div>
		<strong>&copy; <?=date('Y');?> <?=NAME;?></strong>
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