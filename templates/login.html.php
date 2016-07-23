<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Panel logowania | Zespół Szkół w Rokietincy</title>
		<link href="<?=$this->themePath;?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?=$this->themePath;?>/css/singin.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<div class="container">
		<form method="post" action="" class="form-horizontal" role="form">
			<h2 class="form-signin-heading">Zaloguj się</h2>
			<?php if ($this->isMessage()):?> 
				<div class="alert alert-<?=$this->getMessage('type');?>"><?=$this->getMessage('message');?></div>
			<?php endif;?> 
			<div class="form-group">
				<label for="email" class="col-sm-2 control-label">Nazwa użytkownika</label>
				<div class="col-sm-5">
					<input type="text" value="<?=$this->getNick();?>" class="form-control" id="email" name="email" placeholder="Nazwa użytkownika" autofocus required>
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-2 control-label">Hasło</label>
				<div class="col-sm-5">
					<input type="password" class="form-control" id="password" name="password" placeholder="Hasło" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-1">
					<button type="submit" name="send" class="btn btn-primary">Zaloguj</button>
				</div>
				<br><br><br>
			</div>
				
			<a href="<?=DIR;?>/">&#171; Wróć do strony głównej</a>
		</form>
	</div>
	</body>
</html>