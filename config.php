<?

//Лич база
$lichdbip = "айпи";
$lichdbuser = "логин";
$lichdbpass = "пароль";
$lichdbauth = "база акков";
$lichdbchar = "база чаров";


$titleproject = "Magic-Storm";
$realmlich = "Название реалма";


// ID магазина
$merchant_id = 0;
// Секретный ключ ( в лк енот как "Секретный пароль" )
$secret_key1 = '123';
// Cекретный ключ 2 ( в лк енот как "Дополнительный ключ" )
$secret_key2 = '123';
// Множитель баланса
$colbonus = 1;
// Конфиг подключения к игровой бд для магаза
$config = [
	'dbhost' => 'айпи',
	'dbuser' => 'логин',
	'dbpass' => 'пароль',
	'dbname' => 'база акков',
	'dbport' => 3306
];


include 'function/mmotop_conf.php';
$mmotop_name = "$row[name]";
$mmotop_img = "$row[imgcp]";
$mmotop_vote_count = "$row[bonus]";
$file_path_mmotop = "$row[file_stat]";
$mmotop_link = "$row[link]";
?>