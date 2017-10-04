<?php
    require "db.php"; //Подключаемся к БД
	$errors = array(); //Массив ошибок
		$user = R::findOne('users','for_verification = ?',array($_GET['login']));
if( isset($user)) echo 'w'; else echo 'r';

	if($user->is_verification == 0) { $user->is_verification = 1; R::store($user);}
header('Location: index.php');
?>
	
