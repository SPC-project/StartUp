<?php
    require "db.php";
	$data = $_POST;
	if( isset($data['do_login']) ){
		$errors = array();
		$user = R::findOne('users','login = ?',array($data['login']));
		if( $user ){ 
			//login is
			if( password_verify($data['password'],$user->password) ){
				//зашли
				$_SESSION['logged_user'] = $user;
				echo '<div style="color:green;"> Вы вошли</div> <hr>';
				header('Location: /project_startup/startUp');

			}else{
				$errors[] = "Неправильно введет пароль";
			}
		}else{
			$errors[] = 'Пользователя не существует';
		}

		if( !empty($errors) ){
			echo '<div style="color:red;">' . array_shift($errors) . '</div> <hr>';
		}

	}


?>
<html lang="ru-en">
<head>
	<meta charset="UTF-8">
	<title>Start page</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/media.css">
	<link rel="stylesheet" href="css/style_common.css">
	<link rel="stylesheet" href="css/style_index.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

	<header class="container">
		<div class="row">
			<div class="col-xs-6">
				<h1>logo</h1>
			</div>
			<div class="col-xs-6">
				<form style="margin-top:20px" name="search" action="#" method="get" class="form-inline form-search pull-right">
					<div class="input-group">
						<label class="sr-only" for="searchInput">Search</label>
						<input class="form-control" id="searchInput" type="text" name="search" placeholder="Search">
						<div class="input-group-btn">
							<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<a href="login.php">ВХОД</a><!-- Вход здесь!-->
		<a href="signUp.php">Регистрация</a> <!-- Регистрация тута!-->
		<a href="logOut.php">Выйти в окно</a> <!-- Выход из сайта !-->
	</header>

	<main><form action="login.php" method="POST"> 
<p>
  	<p><strong>Введите логин или Email </strong></p>
  	<input type='text' name="login">
  </p>
 
  <p>
  	<p><strong>Введите пароль </strong></p>
  	<input type='password' name="password">
  </p>
   <p>
  	<button type="submit" name="do_login"> Войти </button>
  </p>

  


</form></main>

	<footer class="text-center">
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-github"></i></a>
		<a href="#"><i class="fa fa-google"></i></a>
	</footer>



	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>-->
</body>

</html>
