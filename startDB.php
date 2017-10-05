<?php
    require "db.php";
    R::nuke(); // Полностью чистим БД. 
    //_________________________________________
    $user = R::dispense('users'); // функция подключения кк таблице юзерс. Если ее нету то она  тут и создается
    $user->login = "admin"; //Добавляем поля
	$user->email = "test@gmail.com"; //add поля
    $user->password = password_hash("1", PASSWORD_DEFAULT); // поле пароля
    $user->levelAccess = 3;
    $user->isVerification = true;
    R::store($user);
    $user = R::dispense('users'); // функция подключения кк таблице юзерс. Если ее нету то она  тут и создается
    $user->login = "vaki"; //Добавляем поля
	$user->email = "test2@gmail.com"; //add поля
    $user->password = password_hash("1321", PASSWORD_DEFAULT); // поле пароля
    $user->levelAccess = 1;
    $user->isVerification = true;
    R::store($user);
    $user = R::dispense('users'); // функция подключения кк таблице юзерс. Если ее нету то она  тут и создается
    $user->login = "ivan"; //Добавляем поля
	$user->email = "test3@gmail.com"; //add поля
    $user->password = password_hash("1sa", PASSWORD_DEFAULT); // поле пароля
    $user->levelAccess = 1;
    $user->isVerification = true;
    R::store($user);
    $user = R::dispense('users'); // функция подключения кк таблице юзерс. Если ее нету то она  тут и создается
    $user->login = "teacher"; //Добавляем поля
	$user->email = "testTeacher@gmail.com"; //add поля
    $user->password = password_hash("teach", PASSWORD_DEFAULT); // поле пароля
    $user->levelAccess = 2;
    $user->isVerification = true;
    R::store($user);
    //________________________________________
    $category = R::dispense('categories');
    $category->name = "Математика";
    R::store($category);
    $category = R::dispense('categories');
    $category->name = "История";
    R::store($category);
     $category = R::dispense('categories');
    $category->name = "Информатика";
    R::store($category);
    $category = R::dispense('categories');
    $category->name = "Физика";
    R::store($category);
    $category = R::dispense('categories');
    $category->name = "Экономика";
    R::store($category);
    //_________________________________________
    $test = R::dispense("tests");
    $test->name = "Вопрос о ёлках и енотах";
    $test->amoungQuestions = 3;
    $test->category = R::load('categories',1); 
    $test->nameCreator = R::load('users',1);
    R::store($test);
    $test = R::dispense("tests");
    $test->name = "Колоквиум по программировании";
    $test->amoungQuestions = 4;
    $test->category = R::load('categories',3); 
    $test->nameCreator = R::load('users',4);
    R::store($test);
  //  ____________________________________________
    $question = R::dispense('questions');
    $question->text = "Зимой и летом одним цветом?";
    $question->goodAnswer = "Ёлка";
    $question->badAnswer1 = "Енот";
    $question->badAnswer2 = "Енот1";
    $question->badAnswer3 = "Енот2";
    $question->category = R::load('categories',1);
    $question->test = R::load('tests',1);
    R::store($question);
    $question = R::dispense('questions');
    $question->text = "Сколько будет 2 елки + 2 елки";
    $question->goodAnswer = "4";
    $question->badAnswer1 = "12";
    $question->badAnswer2 = "32";
    $question->badAnswer3 = "14";
    $question->category = R::load('categories',1);
    $question->test = R::load('tests',1);
    R::store($question);
    $question = R::dispense('questions');
    $question->text = "Елка и енот. Чем они одинаковы?";
    $question->goodAnswer = "Начинаются на е";
    $question->badAnswer1 = "Не знаю";
    $question->badAnswer2 = "Ничем";
    $question->badAnswer3 = "Вы с ума сошли такое спрашивать?";
    $question->category = R::load('categories',1);
    $question->test = R::load('tests',1);
    R::store($question);
    //_________________________________________________
    $question = R::dispense('questions');
    $question->text = "Сколько бит в байте?";
    $question->goodAnswer = "8";
    $question->badAnswer1 = "16";
    $question->badAnswer2 = "Смотря какая разрядность в заданной системе";
    $question->badAnswer3 = "Зависит от кол-ва ОЗУ в компьютере";
    $question->category = R::load('categories',3);
    $question->test = R::load('tests',2);
    R::store($question);
    $question = R::dispense('questions');
    $question->text = "Что такое DDR4 и DDR3?";
    $question->goodAnswer = "Поколения оперативной памяти";
    $question->badAnswer1 = "Название видеокарты";
    $question->badAnswer2 = "Название компании что выпускает клавиатуры";
    $question->badAnswer3 = "Вы с ума сошли такое спрашивать?";
    $question->category = R::load('categories',3);
    $question->test = R::load('tests',2);
    R::store($question);
    $question = R::dispense('questions');
    $question->text = "Что такое процессор?";
    $question->goodAnswer = "Центральная часть компьютера, выполняющая заданные программой преобразования информации и осуществляющая управление всем вычислительным процессом.";
    $question->badAnswer1 = "Ящик рядом с ногами. Он греет мне ножки когда холодно";
    $question->badAnswer2 = "Плата которая собирает пыль";
    $question->badAnswer3 = "ну это как его ну вы поняли";
    $question->category = R::load('categories',3);
    $question->test = R::load('tests',2);
    R::store($question);
    $question = R::dispense('questions');
    $question->text = "Что значит синий экран-смерти?";
    $question->goodAnswer = "В системе произошла критическая ошибка";
    $question->badAnswer1 = "Мне хана от папы";
    $question->badAnswer2 = "Пора собирать деньги на ремонт";
    $question->badAnswer3 = "Пойду поем";
    $question->category = R::load('categories',3);
    $question->test = R::load('tests',2);
    R::store($question);
    //____________________________________
    $history = R::dispense('histories');
    $history->user = R::load('users',1);
    $history->test = R::load('tests',1);
    $history->result = 4;
    R::store($history);		
    echo "true";


?>