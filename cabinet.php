<?php
    require "db.php"; //Подключаемся к БД
	if( !isset($_SESSION['logged_user']) )header("Location: index.php");

	$errors = array();
	$events = array();	
	//Массив ошибок
	$data = $_POST; // Забираем из запроса данные
	if( isset($data['save']) ){ //Проверка сессии. Если не пустая тогда пользователь зашел.
	 	$user = R::dispense('users'); // функция подключения кк таблице юзерс. Если ее нету то она  тут и создается
	 	$user = $_SESSION['logged_user'];
		$user->name = $data['name']; //Добавляем поля
	 	$user->surname = $data['surname']; //add поля
	 	$user->about_me = $data['aboutme']; // поле пароля
        $user->my_group = $data['mygroup'];
		R::store($user); // Заполняем таблицу. Если ее нету она сама создается			 
		$events[] = " Сохранено.";
	}
	if (isset($data['edit_password']))
	{
		if( trim($data['password'] == '') && trim($data['password_2'] == '') )
		{
			$errors[] = "Введите пароль!";
		}  
		if( $data['password_2'] != $data['password'] )
		{
			$errors[] = 'Пароли не совпадают!';
		} 
		if( $data['password_2'] == $data['new_password'] )
		{
			$errors[] = 'Новый пароль не должен совападать с текущим!';
		}
		if (!password_verify($data['password'],$_SESSION['logged_user']->password))
		{
			$errors[] = 'Неверно введен пароль!';
		}
		if(empty($errors)){
			
			$user = R::dispense('users'); // функция подключения кк таблице юзерс. Если ее нету то она  тут и создается
			$user = $_SESSION['logged_user'];
			$user->password = password_hash($data['new_password'], PASSWORD_DEFAULT);
			R::store($user); // Заполняем таблицу. Если ее нету она сама создается	
			$_SESSION['logged_user'] = $user; // добавили в сессиб			
			$events[] = " Пароль успешно изменен. ";
		} else 
			{
				echo '<div style="color:red;">' . array_shift($errors) . '</div> ';
			}
	}		
	echo '<div style="color:green;">' . array_shift($events) . '</div> <hr>';
?>
<form action='cabinet.php' method="POST">
  <p>
  	<p><strong>Ваше имя </strong></p>
  	<input type='text' name="name" value ="<?php echo $_SESSION['logged_user']->name?>">
  </p>

  <p>
  	<p><strong>Ваша фамилия </strong></p>
  	<input type='text' name="surname" value ="<?php echo $_SESSION['logged_user']->surname;?>">
  </p>
 
  <p>
  	<p><strong>Напишите немного о себе </strong></p>
  	<input type='text' name="aboutme" value ="<?php echo $_SESSION['logged_user']->about_me;?>">
  </p>  
    <p>
  	<p><strong>В какой группе Вы состоите </strong></p>
  	<input type='text' name="mygroup" value ="<?php echo $_SESSION['logged_user']->my_group;?>">
  </p>

  <p>
  	<button type="submit" name="save"> Сохранить данные о себе </button>
  </p>
  
  <p>
  	<p><strong>Введите новый пароль </strong></p>
  	<input type='password' name="new_password">
  </p>
  
<p>
  	<p><strong>Введите старый пароль </strong></p>
  	<input type='password' name="password">
  </p>
  
  <p>
  	<p><strong>Введите старый пароль второй раз </strong></p>
  	<input type='password' name="password_2">
  </p>

  <p>
  	<button type="submit" name="edit_password"> Сменить пароль </button>
  </p>  

  </form>
  <a href="index.php">Вернутся на главную</a>
