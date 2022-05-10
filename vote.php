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
<link rel="stylesheet" type="text/css" href="style/magicstorm/panel/armory.css"> <link rel="stylesheet" href="style/magicstorm/panel/jquery.modal.min.css">
<link rel="stylesheet" href="style/magicstorm/panel/jquery.mCustomScrollbar.min.css">
<title>Игровой сервер <?php echo "$titleproject"; ?> - Голосование</title>
<script id="twitter-wjs" src="style/magicstorm/panel/widgets.js.download"></script>
<link rel="stylesheet" type="text/css" href="style/magicstorm/panel/power.css">
<script src="style/magicstorm/panel/locale_enus.js.download" type="text/javascript"></script>
<script src="style/magicstorm/panel/global.js.download"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link type="text/css" href="style/magicstorm/panel/global.css" rel="stylesheet">
<link rel="icon" type="image/png" href="../../../favicon.png" />
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
Голосование </div>
</div>
<div class="realm_picker">
<div class="">
Выбранный реалм: </div>
<font color="#fedfa4"> <?php echo $realmlich ?></font>
</div>
</div>
<h3 class="main-title">Голосование</h3>
<br>





<div class="container">
<div class="row">
<div class="column">



<ul class="vote-nav clearfix">
<li>
<span class="vote-icon"></span>
<p><span><span class="numbers">1</span> монета</span> за каждый голос</p>
</li>
<li class="middle">
<span class="vote-icon"></span>
<p>Вы не можете голосовать <br>более <span><span class="numbers">1</span> раза в <span class="numbers">24</span> часа</span></p>
</li>
<li>
<span class="vote-icon"></span>
<p>При необходимости напишите<br>логин <span>своей учетной записи</span></p>
</li>
</ul>
<h3 class="main-title">Выберите ТОП для голосования</h3>
<div class="vote">
<div class="row">


<?php
require_once "config.php";

$connectAuth = new mysqli($lichdbip, $lichdbuser, $lichdbpass, $lichdbauth);
$connectChar = new mysqli($lichdbip, $lichdbuser, $lichdbpass, $lichdbchar);
$connectChar->query("SET NAMES `utf8` COLLATE `utf8_general_ci`");
$connectAuth->query("SET NAMES `utf8` COLLATE `utf8_general_ci`");

if ($connectChar->connect_errno and $connectAuth->connectAuth) {
  echo @$connectChar->connect_error . " " . @$connectAuth->connect_error;
}


$countVote = [0, 1, 10, 50, 100];
$current_day = date('j');

$asnwer = "<br><a class='btnvote buttonvote' target='_blank' href='$mmotop_link'>Голосовать</a>";


$conn = mysqli_connect("$lichdbip", "$lichdbuser", "$lichdbpass", "$lichdbauth");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }

	
$userid=  $_SESSION["user"]["id"];
$sql = "SELECT * FROM account WHERE id = '$userid'";
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            foreach($result as $row){
                $bonuses = $row["dp"];
                $votes = $row["vp"];
                
            }
        }
        mysqli_free_result($result);
    } 

	
	
	else{
        echo "Ошибка: " . mysqli_error($conn);
    }
    mysqli_close($conn);
	
	
$sql = "SELECT MAX(`vote_id`) AS 'max_id' FROM `mmotop_vote`";
$res = $connectAuth->query($sql);
if ($res) {
  $data = $res->fetch_assoc();
  $max_id = $data["max_id"] ? $data["max_id"] : 0; 
  if ((@$fileConnect = fopen($file_path_mmotop, 'r')) !== false) {
    while (($parseFile = fgetcsv($fileConnect, 0, "\t")) !== false) { 
      if (count($parseFile) != 5 or $max_id >= $parseFile[0]) {
        continue;
      } else {
        $vote_id = $parseFile[0];
        $vote_date = date('j', strtotime($parseFile[1]));
        $vote_ip = $parseFile[2];
        $vote_name = $parseFile[3];
        $vote_count = $countVote[$parseFile[4]];
        $sql = "SELECT `id` FROM `account` WHERE `username` = '$vote_name'";
        $res = $connectAuth->query($sql);
        if ($res and $data = $res->fetch_assoc()) {
          $vote_acc_id = $data["id"];
        } else { 
          $vote_acc_id = -1;
        }
        $sql = "INSERT INTO `mmotop_vote`(`vote_id`, `vote_date`, `vote_ip`, `vote_name`, `vote_count`, `acc_id`) 
        VALUES($vote_id, $vote_date, '$vote_ip', '$vote_name', $vote_count, $vote_acc_id)";
        $res = $connectAuth->query($sql);
        if (!$res) {
          echo $connectAuth->error;
        }
      }
    } 
    $sql = "SELECT * FROM mmotop_vote WHERE vote_today = 0 AND vote_date = '$current_day'";
    $res = $connectAuth->query($sql);
    if ($res) {
      while ($data = $res->fetch_assoc()) { // Если такие найдены, то начинаем цикл с проверкой
        $current_acc_id = $data["acc_id"];
        $sql_inner = "SELECT * FROM mmotop_vote WHERE vote_today != 0 AND acc_id =  '$current_acc_id' AND vote_date = '$current_day'";
        $res_inner = $connectAuth->query($sql_inner);
        if ($res_inner and $data_inner = $res_inner->fetch_assoc()) { 
          continue; 
        } else {  
          $count_bonus = $data["vote_count"] * $mmotop_vote_count;
          $sql_add_bonus = "UPDATE account SET vp = (vp + '$count_bonus') WHERE id = '$current_acc_id'";
          $res_add_bonus = $connectAuth->query($sql_add_bonus);
         if ($vote_today = 1) { 
            $asnwer = "<br><div class='green buttonvote'>Бонус начислен!</div>";
          }
          $sql_add_vote = "UPDATE mmotop_vote SET vote_today = 1 WHERE acc_id = '$current_acc_id'";
          $res_add_vote = $connectAuth->query($sql_add_vote);
        }
      }
      
    } 	
	
	
	$conn = mysqli_connect("$lichdbip", "$lichdbuser", "$lichdbpass", "$lichdbauth");
    if (!$conn) {
      die("Ошибка: " . mysqli_connect_error());
    }

$current_day = date('j');	
$userid=  $_SESSION["user"]["id"];
$sqll = "SELECT * FROM mmotop_vote WHERE vote_today = 1 AND vote_date = '$current_day' AND acc_id = '$userid'";
$res = $connectAuth->query($sqll);

 
    $res = $connectAuth->query($sqll);
    if ($res) {
      while ($data = $res->fetch_assoc()) { 
        $sql_innerr = "SELECT * FROM `mmotop_vote` WHERE `vote_today` != 1 AND `acc_id` =  $userid AND `vote_date` = $current_day";
        $res_inner = $connectAuth->query($sql_innerr);
        if ($res_inner and $data_inner = $res_inner->fetch_assoc()) { 
          continue; 
        } else {  
          if ($vote_today = 1) { 
            $asnwer = "<br><div class='red buttonvote'>Вы уже голосовали!</div>";
          }
        }
      }
      

        
      
      
    











	

      
    }else {
      echo $connectAuth->error;
    }
  } else {
    echo "Файл с статистикой голосов не найден";
  }
} else {
  echo $connectAuth->error;
}
?>

<div class="col">
<div class="item">
<img src="<?php echo $mmotop_img; ?>" alt=""> <div class="item-content">
<h3><?php echo $mmotop_name; ?></h3>

<div class="bonus"><span class="amount text-primary"><?php echo $mmotop_vote_count; ?> <span class="coin-gold"></span></span></div>


<? echo $asnwer; ?>

 </div>




</div>
</div>


</div>
</div>
</div>
</div>
</div>
<br><br><br><br>
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