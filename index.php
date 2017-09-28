<!DOCTYPE html>
<html lang="en">

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
			<div class="col-xs-2">
				<h1>Some logo</h1>
			</div>
			<nav class="col-lg-8 col-lg-offset-2 col-sm-10 ">
			<!--Тоже самое (почти) на чистом html 
			<a href='login.php'>LogIn</a>
			<a href="signUp.php">SignIn</a>
			<a href="html/question.html">Questions</a>
			-->
				<!--КОД PHP который взаимодействует с html. Пожалуйста запусти меня на локальном сервере-->
					<?php
    					require "db.php"; // Подключаем соеденение с БД.
    					if(isset($_SESSION['logged_user']) ){ //Проверка сессии. Если не пустая тогда пользователь зашел.
							echo "Авторизован. Привет ",  $_SESSION['logged_user']->login , "!"; // Строчка где показывается login пользователя
							echo '<a href="html/question.html">Questions</a>';
							echo '<a href="logOut.php">Прыгнуть из окна</a>';//ссылка для выхода
						}else{
							echo "<a href='login.php'>LogIn</a>";
							// Вход здесь!
							echo '<a href="signUp.php">SignIn</a>';
							// Регистрация тута!
							echo '<a href="html/question.html">Questions</a>';
						}
					?> 
					<!--КОНЕЦ кода PHP -->
			</nav>
		</div>
		</div>

	</header>


	<main>
		<div id="particles-js">
			<img src="img/img_homepage/t1.jpg">
			<img src="img/img_homepage/t2.jpg" class="display_none">
			<img src="img/img_homepage/t3.jpg" class="display_none">
			<img src="img/img_homepage/t4.jpg" class="display_none">
			<img src="img/img_homepage/t5.jpg" class="display_none">
			<img src="img/img_homepage/t6.jpg" class="display_none">
			<img src="img/img_homepage/t7.jpg" class="display_none">

		</div>
		<div class="main_block" id="front">
			<h1>Lorem ipsum dolor sit amet.</h1>
			<p>Lorem ipsum dolor sit amet.</p>

			<br>
			<a href="html/question.html" class="text-center a_btn">
				start here &rarr;
			</a>
		</div>
	</main>

	<footer class="text-center">
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-github"></i></a>
		<a href="#"><i class="fa fa-google"></i></a>
	</footer>

	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js'></script>
	<script src='http://threejs.org/examples/js/libs/stats.min.js'></script>
	<script src="js/for_part.js"></script>
	<script src="js/slider.js"></script>

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>-->
</body>

</html>
