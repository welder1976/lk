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
		
		<title>Игровой сервер <?php echo "$titleproject"; ?> - Восстановление пароля</title>
		

	</head>
<body class="login">
<div class="login_wrappers">
<a href="./" title=""><img src="style/magicstorm/images/logo.png" class="img-responsive center-block"></a>
<div class="main_container">
<div class="x_add_margin">
<div class="x_panel_login">
<div class="x_content">
<div class="text-center" style="font-size: 26px;">Восстановление пароля</div>
    <?php
include('config.php');
$con = mysqli_connect("$lichdbip","$lichdbuser","$lichdbpass","$lichdbauth");
	if (mysqli_connect_errno()){
		echo "Невозможно установить соединение с MySql: " . mysqli_connect_error();
		die();
		}

$error="";	

if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
  	$error .="<div class='alert alert-fill alert-fail alert-icon' role='alert'>
            <em class='icon ni ni-check-circle'></em>
            <strong>Неверный адрес электронной почты. Пожалуйста, введите действительный адрес электронной почты!</strong>
        </div>
	";
	}else{
	$sel_query = "SELECT * FROM `account` WHERE email='".$email."'";
	$results = mysqli_query($con,$sel_query);
	$row = mysqli_num_rows($results);
	if ($row==""){
		$error .= "<div class='alert alert-fill alert-fail alert-icon' role='alert'>
            <em class='icon ni ni-check-circle'></em>
            <strong>Ни один пользователь не зарегистрирован с этим адресом электронной почты!</strong>
        </div>
		"
		;
		}
	}
	if($error!=""){
	echo "<center><div class='error'>".$error."</div>
	<br /><a class='btn btn-darkblue btn-block' href='javascript:history.go(-1)'>Назад</a></div>";
		}else{
	$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
	$expDate = date("Y-m-d H:i:s",$expFormat);
	$key = md5("2048*2 + $email");
	$addKey = substr(md5(uniqid(rand(),1)),3,10);
	$key = $key . $addKey;

mysqli_query($con,
"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");


$output='<p>Дорогой пользователь,</p>';
$output.='<p>Пожалуйста, перейдите по следующей ссылке, чтобы сбросить свой пароль.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="https://www.magic-storm.ru/lk/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">https://www.magic-storm.ru/lk/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p>Пожалуйста, обязательно скопируйте всю ссылку в свой браузер.
Срок действия ссылки истечет через 1 день по соображениям безопасности.</p>';
$output.='<p>Если вы не запрашивали это электронное письмо с забытым паролем, никаких действий
не требуется, ваш пароль не будет сброшен. Однако вы можете войти в
свою учетную запись и сменить пароль безопасности.</p>';   	
$output.='<p>Спасибо,</p>';
$output.='<p>с уважением администрация проекта Magic-Storm</p>';
$body = $output; 
$subject = "Восстановление пароля - Magic-Storm.";

$email_to = $email;
$fromserver = "magicstorm@magic-storm.ru"; 
    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/SMTP.php";
    require "PHPMailer/src/POP3.php";
    require "PHPMailer/src/Exception.php";
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP();
$mail->Host = "mail.hosting.reg.ru"; // Enter your host here
$mail->SMTPAuth = true;
$mail->Username = "magicstorm@magic-storm.ru"; // Enter your email here
$mail->Password = "Asdf1234asdf"; //Enter your passwrod here
$mail->Port = 587;
$mail->IsHTML(true);
$mail->From = "magicstorm@magic-storm.ru";
$mail->FromName = "Support Magic-Storm";
$mail->CharSet = "utf-8"; 
$mail->Sender = $fromserver; // indicates ReturnPath header
$mail->Subject = $subject;
$mail->Body = $body ;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo "<div class='alert alert-fill alert-success alert-icon' role='alert'>
            <em class='icon ni ni-check-circle'></em>
            <strong>Мы отправили вам по электронной почте ссылку для сброса пароля!</strong>
        </div> <br /><a class='btn btn-darkblue btn-block' href='./'>Войти</a>";
	}

		}	

}else{
?>
<form class="form-horizontal form-label-left" style="margin-top: 12px;" autocomplete="off" method="post" action="" name="reset">

<input type="text" style="display:none" />
<div class="form-group" style="margin-bottom: 0px;">

<div class="input-group">
<span class="input-group-addon"><i class="fas fa-envelope" style="color: #606f7d"></i></span><input data-error="Неверный формат почты" type="email" name="email" required="required" class="form-control col-md-7 col-xs-12" autocomplete="off" placeholder="Почта" value=""></div>
</div>

<p class="msg none"></p>
<div class="form-group">
<button type="submit" class="btn btn-darkblue btn-block">Сбросить </button>
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

							<video id="vBG" class="opacity" muted="muted" autoplay="autoplay" loop="loop">
         <source src="style/magicstorm/images/video/Fire - 84469.webm" type="video/webm">
      </video>	
	</body>
</html>
<?php } ?>