<?php
/**
 * Created by PhpStorm.
 * User: Ivan Zadorozhniy
 * Date: 30.11.2017
 * Time: 0:17
 */
require "../db.php";
if (isset($_SESSION['logged_user'])) {
    if ($_SESSION['logged_user']->levelAccess == 3) {
        echo "Привет Админ<br>";
        if (isset($_POST['do_signup'])) {
            $data = $_POST;

            $errors = array();
            if (trim($data['nameCategory'] == '')) {
                $errors[] = "Введите название, Please";
            }
            if (empty($errors)) {
                $categories = R::dispense("categories");
                $categories->name = $data['nameCategory'];
                R::store($categories);
                unset($_POST);
                unset($data);
                echo "Категория добавленна добавлен <br>";

            } else {
                echo "<font color='red'>" . $errors[0] . "</font>";
            }

        }
    } else {
        header("Location = ./index.php");
    }
} else {
    header("Location = ./index.php");
}

?>
<form action="addCategories.php" method="POST">
    <p> Введите название для новой категории тестов</p> <input type="text" name="nameCategory"
                                                               value="<?php echo @$data['nameCategory']; ?>"> </input>
    <br>
    <p>
        <button type="submit" name="do_signup"> Клац</button>
    </p>


</form>
