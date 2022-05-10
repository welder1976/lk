<? require_once 'config.php'; ?>
<?php
@session_start();
if (!$_SESSION['user']) {

    header('Location: ./');
}

?>
<!DOCTYPE html>
<html lang="ru" class=" js no-touch">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="keywords" content="">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=0.5, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="style/magicstorm/panel/animate.css"> 
<link rel="stylesheet" type="text/css" href="style/magicstorm/panel/style.css"> 
<link rel="stylesheet" type="text/css" href="style/magicstorm/panel/armory.css"> 
<link rel="stylesheet" href="style/magicstorm/panel/jquery.modal.min.css">
<link rel="stylesheet" href="style/magicstorm/panel/jquery.mCustomScrollbar.min.css">
<title>Игровой сервер <?php echo "$titleproject"; ?> - Просмотр банов</title>
<script id="twitter-wjs" src="style/magicstorm/panel/widgets.js.download"></script>
<link rel="stylesheet" type="text/css" href="style/magicstorm/panel/power.css">
<script src="style/magicstorm/panel/locale_enus.js.download" type="text/javascript"></script>
<script src="style/magicstorm/panel/global.js.download"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
Просмотр банов </div>
</div>
<div class="realm_picker">
<div class="">
Выбранный реалм: </div>
<font color="#fedfa4"> <?php echo $realmlich ?></font>
</div>
</div>

<div class="centerInnerTitle" style="text-align: center;">
<h2>Список заблокированных: </h2>
</div>
<table class="table">
<tr>
                                            <th>Аккаунт</th>
                                            <th>Когда выдан</th>
                                            <th>Дата разблокировки</th>
                                            <th>Кем выдан</th>
											<th>Причина</th>
											<th>Статус</th>
                                        </tr>

							<?php
$connlich = mysqli_connect("$lichdbip", "$lichdbuser", "$lichdbpass", "$lichdbauth");
if (!$connlich) {
  die("Ошибка: " . mysqli_connect_error());
}
mysqli_set_charset($connlich, "utf8");  
$userid=  $_SESSION["user"]["id"];
$sql =  "SELECT account_banned.*, account.id, username FROM account_banned INNER JOIN account ON (account.id = account_banned.id) ORDER BY `bandate` DESC LIMIT 50";


	
if($result = mysqli_query($connlich, $sql))
{
	

	
    $rowsCount = ($result);

    foreach($result as $row)

	{
		
	if ($row['active'] == 0){
    $active = 'Разблокирован';
    }
	
	if ($row['active'] == 1){
    $active = 'Заблокирован';
    }

		
		
		
echo "


								
				<tr>
				<td>$row[username]</td>"?>

				<td><?php $timestamp = $row['bandate']; echo(date("d.m.Y H:i:s", $timestamp));?></td>
				<td><?php $timestamp = $row['unbandate']; echo(date("d.m.Y H:i:s", $timestamp));?></td>
				<?php echo"
				<td>$row[bannedby]</td>
				<td>$row[banreason]</td>
				<td>$active</td>
				</tr>								
								
								
								";

			    }
    $result->free();
} 
else{
    echo "Ошибка: " . $connlich->error;
}
$connlich->close();
?>
</table>	
<br><br>
<br><br><br><br><br>

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
<script type="text/javascript" src="style/magicstorm/panel/jquery-2.1.0.min.js.download"></script><script type="text/javascript" src="style/magicstorm/panel/modernizr.custom.js.download"></script><script type="text/javascript" src="style/magicstorm/panel/jquery.easing.js.download"></script><script type="text/javascript" src="style/magicstorm/panel/jquery-ui.js.download"></script><script type="text/javascript" src="style/magicstorm/panel/wow.min.js.download"></script><script type="text/javascript" src="style/magicstorm/panel/custom.js.download"></script><script type="text/javascript" src="style/magicstorm/panel/main.js.download"></script>
<div id="modal-block" class="modal text-center" style="background-color:#111111;min-width:500px;top:-15vh">
<style>.blocker {background-color:rgba(40,40,50,0.75);}</style>
<h3 class="title text-center" id="modal-title" style="margin: 20px 0 40px 0">Error!</h3>
<div class="content text-center" id="modal-message" style="min-height:100px"></div>
<div class="readmore text-center" style="margin:25px 0 5px;">
<a class="btn" href="javascript:void(0)" id="modal-close-btn">Close</a>
</div>
</div>
<script src="style/magicstorm/panel/jquery.modal.min.js.download"></script>
<script type="text/javascript" src="style/magicstorm/panel/power.js.download"></script>
<script type="text/javascript" src="style/magicstorm/panel/tooltip.js.download"></script>
<script src="style/magicstorm/panel/copy.js"></script>
<script src="style/magicstorm/panel/jquery.mCustomScrollbar.concat.min.js.download"></script>
<script type="text/javascript" src="style/magicstorm/panel/pretty-scroll.js.download"></script><script type="text/javascript" src="style/magicstorm/panel/goldexchange.js.download"></script><iframe scrolling="no" frameborder="0" allowtransparency="true" src="style/magicstorm/panel/widget_iframe.21f942bb866c2823339b839747a0c50c.html" title="Twitter settings iframe" style="display: none;"></iframe><iframe id="rufous-sandbox" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px; padding: 0px; border: none;" title="Twitter analytics iframe" src="style/magicstorm/panel/saved_resource.html"></iframe>

							<video id="vBG" class="opacity" muted="muted" autoplay="autoplay" loop="loop">
         <source src="style/magicstorm/images/video/Fire - 84469.webm" type="video/webm">
		 
      </video>	
</body></html>