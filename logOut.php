<?php
    require "db.php"; //Соеденяемся с БД
    unset($_SESSION['logged_user']); // Чистим сессию от юзера
    header('Location: http://localhost/project_startup/startUp/index.php'); //Перехход на страницу 
    // ^Эту строчку менять в зависимости от располажения проекта. Путь к index.php
?>
