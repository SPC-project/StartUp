<?php 
    require "../db.php";
	if( isset($_SESSION['logged_user']) ){
        if( $_SESSION['logged_user']->level_access == 3 ){
            echo "Привет Админ<br>";
			echo '<a href="adminAddTest.php">Добавить тест</a> <br>';
			echo '<a href="adminAddQuestions.php">Добавить вопросы</a><br>';
            echo '<a href="addCategories.php">Добавить Категории</a>';
        } else header("Location = ./index.php");
    } else header("Location = ./index.php");
?>
