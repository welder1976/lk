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
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
		
if (isset($_GET["key"]) && isset($_GET["email"])
&& isset($_GET["action"]) && ($_GET["action"]=="reset")
&& !isset($_POST["action"])){
$key = $_GET["key"];
$email = $_GET["email"];
$curDate = date("Y-m-d H:i:s");
$query = mysqli_query($con,"
SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';");
$row = mysqli_num_rows($query);
if ($row==""){
$error .= "<div class='alert alert-fill alert-fail alert-icon' role='alert'>
            <em class='icon ni ni-check-circle'></em>
            <strong>Ссылка недействительна или срок действия истек. Либо вы скопировали неправильную ссылку из электронного письма, либо вы уже использовали ключ, и в этом случае он деактивируется.</strong>
        </div>
		<center><p><a class = 'btn btn-darkblue btn-block' href='password.php'>Кликните сюда чтобы сбросить пароль.</a></p></center>
";
	}else{
	$row = mysqli_fetch_assoc($query);
	$expDate = $row['expDate'];
	if ($expDate >= $curDate){
	?>
<form class="form-horizontal form-label-left" style="margin-top: 12px;" autocomplete="off" method="post" action="" name="update">
				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="email" value="<?php echo $email;?>"/>
				
<input type="text" style="display:none" />
<div class="form-group" style="margin-bottom: 0px;">

<div class="input-group">
<span class="input-group-addon"><i class="fas fa-key" style="color: #606f7d"></i></span>
<input id="pass1" name="pass1" type="password" class="form-control" autocomplete="off" placeholder="Введите пароль" />
</div>

<div class="input-group">
<span class="input-group-addon"><i class="fas fa-key" style="color: #606f7d"></i></span>
<input id="pass2" name="pass2" type="password" class="form-control" autocomplete="off" placeholder="Повторите пароль" />
</div>



</div>

<p class="msg none"></p>
<div class="form-group">
<button type="submit" id = "reset" class="btn btn-darkblue btn-block">Сменить пароль </button>
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
<?php
}else{
$error .= "<div class='alert alert-fill alert-fail alert-icon' role='alert'>
            <em class='icon ni ni-check-circle'></em>
            <strong>Срок действия ссылки истек. Вы пытаетесь использовать ссылку с истекшим сроком действия, которая действительна только 24 часа (1 день после запроса).</strong>
        </div>
		<center><p><a class = 'btn btn-darkblue btn-block' href='/'>Назад</a></p></center>";
				}
		}
if($error!=""){
	echo "<div class='error'>".$error."</div><br />";
	}			
} // isset email key validate end


if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
$error="";
$pass1 = mysqli_real_escape_string($con,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($con,$_POST["pass2"]);







$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
if ($pass1!=$pass2){
		$error .= "<div class='alert alert-fill alert-fail alert-icon' role='alert'>
            <em class='icon ni ni-check-circle'></em>
            <strong>Пароль не совпадает, оба пароля должны быть одинаковыми.</strong>
        </div>
		<center><p><a class = 'btn btn-darkblue btn-block' href='javascript:history.go(-1)'>Назад</a></p></center>
		
		";
		}
	if($error!=""){
		echo "<div class='error'>".$error."</div><br />";
		}else{
?>
<?php
$conn = mysqli_connect("$lichdbip", "$lichdbuser", "$lichdbpass", "$lichdbauth");
if (!$conn) {
  die("Ошибка: " . mysqli_connect_error());
}
$sql = "SELECT * FROM account where email = '$email'";
if($result = mysqli_query($conn, $sql))
{
    $rowsCount = ($result);
            foreach($result as $row){
                $username= $row["username"];
                
            }
    $result->free();
} 
else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
<?
$password = $_POST['pass1'];
mysqli_query($con,"UPDATE `account` SET `sha_pass_hash`='" . $password = sha1(strtoupper($username) . ':' . strtoupper($password)) . "', s = '' WHERE `email`='".$email."';");	



mysqli_query($con,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");		
	
echo "<div class='alert alert-fill alert-success alert-icon' role='alert'>
            <em class='icon ni ni-check-circle'></em>
            <strong>Поздравляю! Ваш пароль был успешно обновлен.</strong>
        </div><br>
		<center><p><a class = 'btn btn-darkblue btn-block' href='./'>Кликните сюда чтобы войти.</a></p></center>
";
		}		
}
?>
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