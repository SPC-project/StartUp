
<?php
    require "db.php";
	$data = $_POST;
	if( isset($data['do_signup']) ){
		$errors = array();

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

		if ( R::count('users', "login = ?",array($data['login'])) > 0){
			$errors[] = 'Пользователь с таким логином существует';
		}

		if ( R::count('users', "email = ?",array($data['email'])) > 0){
			$errors[] = 'Пользователь с таким Email существует';
		}
		if( empty($errors) ){
			// Все хорошо регаем
		 	$user = R::dispense('users');
		 	$user->login = $data['login'];
		 	$user->email = $data['email'];
		 	$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			 R::store($user);
			 $_SESSION['logged_user'] = $user;
		 	echo "<div style='color:green;'>Регистрация успешна</div><br>";
		 	


		}else{
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
