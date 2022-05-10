<? require_once 'config.php'; ?>
<?php
@session_start();
if (!$_SESSION['user']) {

    header('Location: ./');
}

?>

<html lang="ru" class="js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="style/magicstorm/panel/animate.css"> 
<link rel="stylesheet" type="text/css" href="style/magicstorm/panel/style.css"> 
<link rel="stylesheet" type="text/css" href="style/magicstorm/panel/armory.css"> 
<link rel="stylesheet" href="style/magicstorm/panel/jquery.modal.min.css">
<link rel="stylesheet" href="style/magicstorm/panel/jquery.mCustomScrollbar.min.css">
<title>Игровой сервер <?php echo "$titleproject"; ?> - Купить бонусы</title>
<link rel="stylesheet" type="text/css" href="style/magicstorm/panel/power.css">
<script src="style/magicstorm/js/jquery-2.1.1.min.js"></script>
<link type="text/css" href="style/magicstorm/panel/global.css" rel="stylesheet">
<link rel="icon" type="image/png" href="favicon.png" />
</head>
<body class="home">
<div class="wrapper">
<header id="header">
<center>
<div class="brand">
<a class="logo" href="./">
<img class="center-block" role="banner" src="style/magicstorm/panel/logo.png" alt="logo">
</div>
</center>
<div class="container">
<nav class="navbar clearfix" role="navigation">
<ul class="nav navbar-nav clearfix wow flip" style="display:inline !important;">
<li style="display:inline"><a href="../../">Главная</a></li>
<li><a href="../../forum" target="_blank">Форум</a></li>
</ul>

<ul class="nav navbar-user clearfix wow flip">
<li class="">
<p class="username"><?= $_SESSION['user']['username'] ?></p>
<a href="donate.php" class="balance">
<span class="coin-gold"></span>
<?php
$conn = mysqli_connect("$lichdbip", "$lichdbuser", "$lichdbpass", "$lichdbauth");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }

	
$userid=  $_SESSION["user"]["id"];
$sql = "SELECT * FROM account WHERE id = '$userid'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $dp = $row["dp"];
                $vp = $row["vp"];
                
            }
        }
        mysqli_free_result($result);
    } 

	
	
	else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);

?>
<span class="count-gold"><? echo $dp ?></span>
</a>
</li>
<li class="last"><a href="logout.php"><span class="ico-exit"></span></a></li>
</ul>
</nav>
</div>
<?php include "function/menu.php" ?>
</header>
<main id="content-wrapper">
<div class ="x_panel">
<div class="head-content">
<div class="breadcrumbs">
<a href="./">
Личный кабинет </a>
<span class="ico-raquo"></span>
<div>
Купить бонусы </div>
</div>
<div class="realm_picker">
<div class="">
Выбранный реалм: </div>
<font color="#fedfa4"> <?php echo $realmlich ?></font>
</div>
</div>

<div class="centerInnerTitle" style="text-align: center;">
<h2>Пополнить баланс аккаунта</h2>
</div>
<br><br>
	<div class="content-box standart">
						<div class="content-holder">
							<div class="content-frame">
								<div class="content">
								<br><center>
											<script>
				document.addEventListener( "DOMContentLoaded", function( event )
				{
					$( "#enotForm" ).submit( function( event )
					{
						var char = $( "#char" ).val();
						var count = $( "#count" ).val();

						$.ajax(
						{
							type: "POST",
							url: "sign.php",
							data: ( { "char" : char, "count" : count } ),
							async: false,
							dataType: "json",
							success: function( response )
							{
								$( "#MERCHANT_ID" ).val( response["merchant_id"] );
								$( "#PAY_SUM" ).val( response["sum"] );
								$( "#PAY_ID" ).val( response["payment_id"] );
								$( "#SIGN" ).val( response["sign"] );
								
								$( 'input[name^="cf[char]"]' ).val( char );
							}
						});
					});
				});
			</script>
                 <form id="enotForm" method="get" action="https://enot.io/pay">
				<input type="hidden" name="m" id="MERCHANT_ID" value="{MERCHANT_ID}">
				<input type="hidden" name="oa" id="PAY_SUM" value="{PAY_SUM}">
				<input type="hidden" name="o" id="PAY_ID" value="{PAY_ID}">
				<input type="hidden" name="s" id="SIGN" value="{SIGN}">
				<input type="hidden" name="cf[char]" value="YOUR_PARAMS">
									                                        Введите логин аккаунта:
                                        <input type="text" id="char" name="char" value="<?= $_SESSION['user']['username'] ?>" class="default" style="width: 100px" max="15000">
										<br>
                                        Введите количество желаемых бонусов:
                                        <input type="number" id="count" name="count" value="15" class="default" style="width: 100px" max="15000">
										<br><br>
                                        <input type="submit" value="Оплатить">
                                    </form>
								</div>
								<span class="image"></span>
							</div>
						</div>
					</div>
					<br><br><br>
	<center>
	
		<div class="courseInfo">
		&nbsp <br /><br>
		<h3><font color="orange">КУРС: <br /></font></h3>
		<h3><font color="orange"><?php echo"$colbonus"; ?> РУБЛЬ = 1&nbsp <span class="coin-gold"></span></font></h3><br><br><br>
	</div>

<br><br>
<br><br>

</main>
</div>
</div>
<footer id="footer">
<div class="container">
<div class="row clearfix">
<div class="column">
<div id="footer-copy" class="wow fadeInUp"><? require_once 'config.php'; ?>
<font color="#fff">© Игровой проект <?php echo $titleproject ?>. Все права защищены. Любое копирование информации является нарушением закона.</font></div>
</div>
</div>
</div>
</footer>

<iframe scrolling="no" frameborder="0" allowtransparency="true" src="style/magicstorm/panel/widget_iframe.21f942bb866c2823339b839747a0c50c.html" title="Twitter settings iframe" style="display: none;"></iframe><iframe id="rufous-sandbox" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px; padding: 0px; border: none;" title="Twitter analytics iframe" src="style/magicstorm/panel/saved_resource.html"></iframe>

							<video id="vBG" class="opacity" muted="muted" autoplay="autoplay" loop="loop">
         <source src="style/magicstorm/images/video/Fire - 84469.webm" type="video/webm">
		 
      </video>	
</body></html>