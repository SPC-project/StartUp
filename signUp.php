<?php
function generatePassword($length = 32){
  $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890';
  $numChars = strlen($chars);
  $string = '';
  for ($i = 0; $i < $length; $i++) {
    $string .= substr($chars, rand(1, $numChars) - 1, 1);
  }
  return $string;
}
    require "db.php"; // Подключение к БД
	$data = $_POST; // Забираем из запроса данные
	if( isset($data['do_signup']) ){//Проверяем есть ли что то
		$errors = array(); // массив ошибок

		if( trim($data['login'] == '') ){
			$errors[] = "Введите логин!";
		}

		if( trim($data['email'] == '') ){
			$errors[] = "Введите email!";
		}

		if( trim($data['password'] == '') ){
			$errors[] = "Введите пароль!";
		}

		if( $data['password_2'] != $data['password'] ){
			$errors[] = 'Повторный пароль не верен!';
		}
		// ^ 4 проверки на ввод данных
		// Ниже 2 Проверки на совпадение логина и майле

		if ( R::count('users', "login = ?",array($data['login'])) > 0){
			$errors[] = 'Пользователь с таким логином существует';
		}

		if ( R::count('users', "email = ?",array($data['email'])) > 0){
			$errors[] = 'Пользователь с таким Email существует';
		}

		if( empty($errors) ){
			// Все хорошо регаем
		 	$user = R::dispense('users'); // функция подключения кк таблице юзерс. Если ее нету то она  тут и создается
		 	$user->login = $data['login']; //Добавляем поля
		 	$user->email = $data['email']; //add поля
		 	$user->password = password_hash($data['password'], PASSWORD_DEFAULT); // поле пароля
			$user->level_access = 1;
                        $user->is_verification = 0;
$user->for_verification = generatePassword(32);
			 R::store($user); // Заполняем таблицу. Если ее нету она сама создается			 
			 mail($data['email'], "Подтвердение регестрации", 'www.drendoo.ho.ua/conf.php?login='.$user->for_verification); 
			 echo "<div style='color:green;'>Регистрация успешна</div><br>";
			 header('Location: index.php'); // Перешли в index.php 
		 	


		}else{ // показать ошибки ввода
			echo '<div style="color:red;">' . array_shift($errors) . '</div> <hr>';
		}


		
	}

	
?>
  <form action='signUp.php' method="POST">
  <p>
  	<p><strong>Введите логин </strong></p>
  	<input type='text' name="login" value ="<?php echo @$data['login'];?>">
  </p>

  <p>
  	<p><strong>Введите email </strong></p>
  	<input type='email' name="email" value ="<?php echo @$data['email'];?>">
  </p>
 
  <p>
  	<p><strong>Введите пароль </strong></p>
  	<input type='password' name="password">
  </p>
  
  <p>
  	<p><strong>Введите пароль второй раз </strong></p>
  	<input type='password' name="password_2">
  </p>

  <p>
  	<button type="submit" name="do_signup"> Зарегестрироватся </button>
  </p>

  </form>
  <a href="index.php">Вернутся на главную</a>
