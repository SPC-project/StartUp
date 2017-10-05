<?php 
    require "../db.php";
    if( isset($_SESSION['logged_user']) ){
        if( $_SESSION['logged_user']->levelAccess == 3 ){
            echo "Привет Админ<br>";
            echo '<a href="../adminka/adminAddTest.php">Добавить тест</a> <br>';
            echo '<a href="../adminka/adminAddQuestions.php">Добавить вопросы</a>';
        }
    }

?>