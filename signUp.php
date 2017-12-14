<link href="css/bootstrap.min.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/fonts.css">
<link rel="stylesheet" href="css/media.css">
<link rel="stylesheet" href="css/style_common.css">
<link rel="stylesheet" href="css/style_index.css">
<style>
    body {
        background-color: #e8e7e7;
        font-family: 'Comic Sans MS', sans-serif;
        font-size: 14px;
        color: #424242;
    }
    h3{
        text-align: center;
    }
</style>
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
    if (!preg_match("/^[a-zA-Z0-9_]{5,20}$/",$data['login']))
    {
        $errors[] = "Логин может содержать символы A-Z, a-z, 0-9! Длинна логина должна быть от 5 до 20 символов";
    }
    if (!preg_match("/^[a-zA-Z0-9_]{8,20}$/",$data['password']))
    {
        $errors[] = "Пароль может содержать символы A-Z, a-z, 0-9! Длинна пароля должна быть от 8 до 20 символов";
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
        $user = R::dispense('users'); // функция подключения кк таблице юзерс. Если ее нет то она  тут и создается
        $user->login = $data['login']; //Добавляем поля
        $user->email = $data['email']; //add поля
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT); // поле пароля
        $user->level_access = 1;
        $user->is_verification = 0;
        $user->for_verification = generatePassword(32);
        R::store($user); // Заполняем таблицу. Если ее нету она сама создается
        mail($data['email'], "Подтверждение регистрации", 'Для подтверждения регистрации нажмите на ссылку 
www.drendoo.ho.ua/conf.php?login='.$user->for_verification);
        echo '<script type= "text/javascript">

	alert("Вам на почту выслано письмо с подтверждением.");
	document.location.href = "index.php";

</script>';
        //echo "<div style='color:green;'>Регистрация успешна</div><br>";
        //header('Location: index.php'); // Перешли в index.php


    }else{ // показать ошибки ввода
        echo '<div style="color:red;">' . array_shift($errors) . '</div> <hr>';
    }

}

?>

<form class="form-horizontal" action='signUp.php' method="POST">
    <fieldset>
        <br><br><br><br><br><br>

        <div class="form-group">
            <div class="col-xs-offset-4 col-xs-3">
                <h3 align="centr">Sign Up</h3>
                <br>
                <label for="inputLogin">Login</label>
                <input type="text"  name="login" class="form-control" id="inputLogin" placeholder="Pick a login" value="<?php echo @$data['login'];?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-4 col-xs-3">
                <label for="login">Email</label>
                <input type="email" name="email"  class="form-control" id="E_mail_address" placeholder="you@example.com" value="<?php echo @$data['email'];?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-4 col-xs-3">
                <label for="login">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Create you password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-4 col-xs-3">
                <input type="password" name="password_2" class="form-control" id="Repeat_password" placeholder="Repeat your password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-4 col-xs-3">
                <button type="submit" name="do_signup" class="btn btn-success btn-block" >Sign up</button>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-4 col-xs-3">
                <a href="index.php"><button type="button" class="btn btn-info btn-link btn-block" ><span class="glyphicon glyphicon-arrow-left"></span>Back to home</button></a>
            </div>
        </div>

    </fieldset>
</form>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>

