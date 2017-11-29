<?php
/**
 * Created by PhpStorm.
 * User: Ivan Zadorozhniy
 * Date: 29.11.2017
 * Time: 20:41
 */

require "../db.php";
if (isset($_SESSION['logged_user'])) {
    if ($_SESSION['logged_user']->levelAccess == 3) {
        echo "Привет Админ<br>";
    } else header("Location = ./index.php");
} else header("Location = ./index.php");


if (isset($_POST['test'])) {
    if (isset($_POST['question'])) {
        $question = R::dispense('questions');
        $question->text = $_POST['question'];
        $question->goodAnswer = $_POST['goodAnswer'];
        $question->badAnswer1 = $_POST['badAnswer1'];
        $question->badAnswer2 = $_POST['badAnswer2'];
        $question->badAnswer3 = $_POST['badAnswer3'];
        $question->category = R::load('categories', $_POST['category']);
        $question->test = R::load('tests', $_POST['test']);
        R::store($question);
    }
    $tests = R::find("questions", "test_id = ?", array(intval($_POST['test'])));
    $amoungCurrentQuest = 0;
    foreach ($tests as $t) {
        $amoungCurrentQuest++;
        echo "<font color='Blue'><b> Вопрос: " . $t->text . "</b></font><br>";
        echo '<font color="green">Правильный ответ:</font> ' . $t->good_answer . "<br>";
        echo '<font color = "red">Неправильный ответ: </font>' . $t->bad_answer1 . "<br>";
        echo '<font color = "red">Неправильный ответ: </font> ' . $t->bad_answer2 . "<br>";
        echo '<font color = "red">Неправильный ответ: </font>' . $t->bad_answer3 . "<br>";
    }
    $oneTest = R::find("tests", "id = ?", array($_POST['test']));
    foreach ($oneTest as $oT) {
        $amoungQuestNeed = $oT->amoung_questions;
    }
    if ((int)$amoungQuestNeed > $amoungCurrentQuest) {

        echo '<hr>';
        echo '<form action="addQuest.php" method="POST">';

        echo '<table>';

        echo '<tr><td>Введите вопрос:</td><td> <input type="text" name="question"><td> </tr>';
        echo '<tr><td>Введите ПРАВИЛЬНЫЙ ОТВЕТ: </td><td><input type="text" name="goodAnswer"></td></tr> ';
        echo '<tr><td>Введите НЕправильный ответ:</td> <td><input type="text" name="badAnswer1"></td></tr> ';
        echo '<tr><td>Введите НЕправильный ответ:</td> <td><input type="text" name="badAnswer2"></td></tr> ';
        echo '<tr><td>Введите НЕправильный ответ:</td><td> <input type="text" name="badAnswer3"></td></tr> ';
        echo '</table>';
        echo '<input type="hidden" name="test" value="' . $_POST['test'] . '">';
        echo '<input type="hidden" name="category" value="' . $_POST['category'] . '">';
        echo '<br> <button type="submit" name="addQ">Добавить</button> ';
        echo '</form>';
    }
}