<? require_once 'config.php'; ?>
<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: cabinet.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Игровой сервер <?php echo "$titleproject"; ?> - Регистрация</title>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

		<link href="style/magicstorm/css/custom_bootstrap.css" rel="stylesheet">
		<link href="style/magicstorm/css/custom.min.css@v=1.42445.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link rel="stylesheet" href="style/magicstorm/css/adaptive_panel.css@v=1.42445.css">
		<link rel="icon" type="image/png" href="favicon.png" />
		<script src="style/magicstorm/js/jquery-2.1.1.min.js"></script>
		



</head>
<body class="login"> 
<div class="login_wrappers">
<a href="./" title=""><img src="style/magicstorm/images/logo.png" class="img-responsive center-block"></a>
<div class="main_container">
<div class="x_panel_login_margin">
<div class="x_content">
<div class="text-center" style="font-size: 26px;">Регистрация аккаунта </div>
<form>
<input type="text" style="display:none" />

<div class="form-group" style="margin-bottom: 0px;">
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-user" style="color: #606f7d"></i></span>
<input minlength="2" maxlength="15" type="text" id="name" name="username" class="form-control col-md-7 col-xs-12" autocomplete="off" placeholder="Логин" value=""></div>
<div class="help-block with-errors"></div>
</div>

<div class="form-group" style="margin-bottom: 0px;">
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-key" style="color: #606f7d"></i></span>
<input minlength="5" maxlength="16" type="password" id="password" name="password" class="form-control col-md-7 col-xs-12" autocomplete="off" placeholder="Пароль">
</div>
</div>

<div class="form-group" style="margin-bottom: 0px;">
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-key" style="color: #606f7d"></i></span>
<input type="password" id="password_confirmation" name="password_confirmation" class="form-control col-md-7 col-xs-12" autocomplete="off" placeholder="Повторите пароль"></div>
</div>


<div class="form-group" style="margin-bottom: 0px;">
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-envelope" style="color: #606f7d"></i></span>
<input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12" autocomplete="off" placeholder="Почта" value=""></div>
</div>


<div class="form-group" style="margin-bottom: 0px;">
<input type="checkbox" class="flat" checked="checked" "> Подписаться на рассылку новостей на почту </div>
<div class="form-group">
<strong>Регистрируясь, вы принимаете <a href="#" data-toggle="modal" data-target="#rules"><u>условия системы</u></a> автоматически</strong>
</div>


<p class="msg none"></p>

<div id="rules" class="modal fade" role="dialog">
<div class="modal-dialog">

<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Публичая оферта</h4>
</div>
<div class="modal-body">
<p>Подключаясь к данному серверу, Вы автоматически принимаете условия данного соглашения, а также все правила и условия, установленные на данном ресурсе moonwell.su. Администрация не несет ответственности за возможные нарушения игроками Пользовательского Лицензионного Соглашения (EULA) World Of Warcraft™ . Если Вы не согласны с какими-то пунктами данного Соглашения, Вы имеете полное право прекратить пользование данным ресурсом.<br /><br />1) Данный не официальный сервер игры World of Warcraft (в дальнейшем Сервер) является экспериментальной не коммерческой разработкой, созданной для ознакомления пользователей с игрой World of Warcraft. Данный сервер не является нарушением EULA World of Warcraft, т.к. для его разработки не производилась декомпиляция или исследования клиентской части игры, а сама разработка не является производной (derivative work) от оригинальной игры, а только ознакомительным проектом-подражанием.<br /><br />2) Подключение к Серверу требует изменения файла realmlist.wtf либо использование сторонних программ, что является нарушением пункта A, статья 4 EULA World of Warcraft. Пользователи выполняют данное изменение, принимая ответственность и соглашаясь с положениями данного Соглашения.<br /><br />3) Распространение клиентской части игры запрещено EULA, потому на Сервере не предоставляется целиком или частично ни оригинальный клиент World of Warcraft, ни какая-либо из предварительных (альфа, бета и др.) версий клиента. Все обновления к игре, выложенные на сервере этого сайта не имеют изменений и полностью соответствуют официальным. Сервер является не официальным зеркалом для обновлений enGB и enUS игры.<br /><br />4) Все учетные записи пользователей, персонажи, игровые предметы, навыки и другие приобретенные элементы являются собственностью Администрации сервера. Весь статический игровой контент (включающий, но не ограниченный следующими элементами: названия, компьютерный код, музыкальное сопровождение, объекты, истории, диалоги, местности, графика и анимация NPC, их расположение, элементы ландшафта, визуальные эффекты, история и другие элементы) является интеллектуальной собственностью Blizzard Entertainment за исключением отдельно обговоренных случаев.<br /><br />5) Статический игровой контент, такой как расположение NPC, объектов, информация о талантах, заклинаниях, формулах, и другие игровые данные получены путем изучения открытых интернет-ресурсов, официального Руководства Пользователя, данных официального форума, платных и бесплатных руководств по игре, а также на основании собственного опыта представителей Администрации, базирующегося на игре на официальных серверах World of Warcraft.<br /><br />6) Претензии по поводу статического игрового контента, графических элементов, оформления игры и других объектов интеллектуальной собственности Blizzard Entertaiment могут быть предъявлены представителям Blizzard Entertaiment в порядке предусмотренном EULA World of Warcraft в случае наличия учетной записи на официальном сервере, а также в случае отсутствия нарушений EULA со стороны игрока.<br /><br />7) Все пожертвования, совершаемые пользователями ресурса, являются добровольными, безвозмездными и не подлежат возврату. Совершая пожертвование, пользователь автоматически соглашается с данными условиями, и условиями расположенными здесь. Просьбы о возврате пожертвованных средств Администрацией не рассматриваются, пользователь должен заранее оценить преимущества и недостатки, прежде чем совершить пожертвование. Все действия по материальной поддержке проекта пользователи совершают на свой страх и риск.</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
</div>
</div>
</div>
</div>
<div class="form-group">
<button type="submit" class="btn btn-darkblue btn-block register-btn">Зарегистрировать </button>

<div class="pull-left">
<small><a href="../../" class="color-native" style="text-decoration: none !important;">Перейти на сайт</a> -
<a href="./" class="color-native" style="text-decoration: none !important;">Вход в личный кабинет</a>
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

<script src="style/magicstorm/js/bootstrap-modal.js"></script>
<script src="style/magicstorm/js/validator.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>function onSubmit(token) {document.getElementById("recaptcha").submit();$("*").css("cursor","wait");}</script>
<script src="style/magicstorm/js/global.js@v=1.42445" type="text/javascript"></script>	
<script src="style/magicstorm/js/maincp.js"></script>
							<video id="vBG" class="opacity" muted="muted" autoplay="autoplay" loop="loop">
         <source src="style/magicstorm/images/video/Fire - 84469.webm" type="video/webm">
		 
      </video>		
							</body>
</html>