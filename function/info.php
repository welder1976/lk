
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
                $last_login = $row["last_login"];
                $last_ip = $row["last_ip"];
				$joindate = $row["joindate"];
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

<div class="container">
<div class="row">
<div class="column">
<div class="head-content">
<div class="breadcrumbs">
<a href="./">
Личный кабинет </a>
<span class="ico-raquo"></span>
<div>
Аккаунт </div>
</div>
<div class="realm_picker">
<div class="">
Выбранный реалм: </div>
<font color="#fedfa4"> <?php echo $realmlich ?></font>
</div>
</div>
<h3 class="main-title">Информация</h3>
<div class="general-info">
<div class="item item-1">
<div class="item__info">
<p>E-mail адрес</p>
<div><?= $_SESSION['user']['email'] ?></div>
</div>

</div>
<div class="item item-2 tfa">
<div class="item__info">
<p>Голосов</p>
<div><span class="coin-gold"></span> <span class="count-gold"><?php echo $vp ?></span></div>
</div>
<a href="vote.php" class="btn btn-low-yellow">Голосовать</a>
</div>
<div class="item item-3">
<div class="item__info">
<p>Бонусов</p>
<div><span class="coin-gold"></span> <span class="count-gold"><?php echo $dp ?></span></div>
</div>
<a href="donate.php" class="btn btn-low-yellow">Купить бонусы</a>
</div>

<div class="item item-4">
<div class="item__info">
<p>Последний вход в игру</p>
<div><span class="numbers"><?php echo $last_login ?></span></div>
<p>Ваш последний IP</p>
<div><span class="numbers"><?php echo $last_ip  ?></span></div>
</div>
<a href="changepass.php" class="btn btn-low-yellow">Сменить пароль</a>
</div>
</div>
<section class="extra-info">
</section>
<section class="my-characters">
</section>
<section class="transfer-lh">
<center><h3 class="transferlh-main">Дата регистрации: <?php echo $joindate ?></h3></center>
</section>
</div>
</div>
</div>