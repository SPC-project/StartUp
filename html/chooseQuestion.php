<?php
require "../db.php"; // Подключаем соеденение с БД.
?>

<form action="chooseQuestion.php" method="POST">
    <p> Выберите категорию: </p>
    <?php
    echo '<select name="category">';
    $categories = R::find("categories", "ORDER BY 'name' DESC", array());
    echo "<pre>";
    echo print_r($categories);
    echo "</pre>";
    foreach ($categories as $c) {
        echo "<option value ='" . $c->id . "'>" . $c->name . "</option>";
    }

    echo "</select>";
    ?>
    <p>
        <button type="submit" name="do_signup"> Клац</button>
    </p>


</form>


<?php
if (isset($_POST['category'])) {
    $tests = R::find("tests", "category_id = ?", array($_POST['category']));
    echo '<form action="../tests/goTest.php" method="POST">';
    echo '<select name="test">';
    foreach ($tests as $t) {
        echo '<option value ="' . $t->id . '">' . $t->name . '</option>';
    }
    echo '</select>';
    echo '<input type="hidden" name="category" value="' . $_POST['category'] . '">';
    echo '<p><button type="submit" name="chooseTest">Выбрать</button></p>';
    echo "</form>";
}
?>
