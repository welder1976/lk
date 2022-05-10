<? require_once 'config.php'; ?>
<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: cabinet.php');
    }
?>
<!DOCTYPE HTML >
<html>
	<head>
		<meta charset="utf-8">
		<link href="style/magicstorm/css/custom_bootstrap.css" rel="stylesheet">
		<link href="style/magicstorm/css/custom.min.css@v=1.42445.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link rel="stylesheet" href="style/magicstorm/css/adaptive_panel.css@v=1.42445.css">
		<link rel="icon" type="image/png" href="favicon.png" />
		<script src="style/magicstorm/js/jquery-2.1.1.min.js"></script>
		
		<title>Игровой сервер <?php echo "$titleproject"; ?> - Вход</title>
		

	</head>
<body class="login">
<div class="login_wrappers">
<a href="./" title=""><img src="style/magicstorm/images/logo.png" class="img-responsive center-block"></a>
<div class="main_container">
<div class="x_add_margin">
<div class="x_panel_login">
<div class="x_content">
<div class="text-center" style="font-size: 26px;">Вход в личный кабинет </div>

<form class="form-horizontal form-label-left" style="margin-top: 12px;" autocomplete="off">

<input type="text" style="display:none" />
<div class="form-group" style="margin-bottom: 0px;">

<div class="input-group">
<span class="input-group-addon"><i class="fas fa-user" style="color: #606f7d"></i></span>
<input minlength="2" maxlength="16" type="text" id="username" name="username" class="form-control col-md-7 col-xs-12" autocomplete="off" placeholder="Логин" value="" /></div>
</div>
 <div class="form-group" style="margin-bottom: 0px;">
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-key" style="color: #606f7d"></i></span>
<input id="password" name="password" type="password" class="form-control" autocomplete="off" placeholder="Пароль" />
</div>
</div>
<p class="msg none"></p>
<div class="form-group">
<button type="submit" class="btn btn-darkblue btn-block login-btn">Войти </button>
<div>
<center>
<div class="pull-left">
<small>
<a href="../../" class="color-native" style="text-decoration: none !important;">Перейти на сайт</a> -
<a href="./register.php" class="color-native" style="text-decoration: none !important;">Регистрация аккаунта</a>
-
<a href="password.php" class="color-native" style="text-decoration: none !important;">Восстановить пароль</a>
</small>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

		
		
		
		
		
		</div>
	</div>
</div>
<script src="style/magicstorm/js/maincp.js"></script>
							<video id="vBG" class="opacity" muted="muted" autoplay="autoplay" loop="loop">
         <source src="style/magicstorm/images/video/Fire - 84469.webm" type="video/webm">
      </video>	
	</body>
</html>