<?php
require "db.php"; //Подключаемся к БД
$data = $_POST; // Забираем все данные из ПОСТ(внизу форма POST запрос делает).(Зачем? Удобней писать.);
if (isset($data['do_login'])) {//Проверяем есть в запросе хоть что то
    //если что то есть в запросе
    $errors = array(); //Массив ошибок
    $user = R::findOne('users', 'login = ?', array($data['login'])); //Вот тут формируется запрос к БД. в таблице Users, по login. Про функцию findOne почитать в документации
    echo $user->is_verification;
    if ($user) { // проверка есть ли такой пользователь
        //Юзер нашелся в БД
        if (password_verify($data['password'], $user->password)) {//Проверка совпадений пароля.
            if ($user->is_verification == 1) {//зашли
                $_SESSION['logged_user'] = $user; // добавили в сессиб
                echo '<div style="color:green;"> Вы вошли</div> <hr>';
                header('Location: index.php'); // Перешли в index.php

            } else {
                $errors[] = "Подтвердите свой аккаунт по электронной почте";
            }
        } else { // неправильный пароль
            $errors[] = "Неправильно введет пароль";
        }
    } else { // если нету то добавляем ошибку
        $errors[] = 'Пользователя не существует';
    }

    if (!empty($errors)) { // показываеться какая ошибка была
        echo '<div style="color:red;">' . array_shift($errors) . '</div> <hr>';
    }

}//Если ничего нету то ничего не меняем на странице


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


<form class="form-horizontal" action="login.php" method="post">

    <fieldset>
        <br><br><br><br><br><br>

        <div class="form-group">
            <div class="col-md-offset-4 col-sm-offset-4 col-xs-offset-4 col-md-3 col-sm-3 col-xs-3">
                <h3 align="center">Sign In</h3>
                <br>
                <label for="login">Login or email address</label>
                <input type="text" class="form-control" id="input_Login_or_email" name="login" placeholder="Pick a login or email address">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-4 col-sm-offset-4 col-xs-offset-4 col-md-3 col-sm-3 col-xs-3">
                <label for="login">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter your password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-4 col-sm-offset-4 col-xs-offset-4 col-md-3 col-sm-3 col-xs-3">
                <button  type="submit"  name="do_login" class="btn btn-success btn-block" >Sign in</button>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-4 col-sm-offset-4 col-xs-offset-4 col-md-3 col-sm-3 col-xs-3">
                <a href="signUp.php"><button type="button" class="btn btn-primary btn-block" >Sign up</button></a>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-4 col-sm-offset-4 col-xs-offset-4 col-md-3 col-sm-3 col-xs-3">
               <a href="index.php"> <button type="button" class="btn btn-info btn-link btn-block" ><span class="glyphicon glyphicon-arrow-left"></span>Back to home</button></a>
            </div>
        </div>
    </fieldset>
</form>




<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>-->
</body>

</html>
