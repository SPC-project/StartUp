<?php
require "../db.php";
if (isset($_SESSION['logged_user'])) {
    if ($_SESSION['logged_user']->levelAccess == 3) {
        echo "Привет Админ<br>";
    } else header("Location = ./index.php");
} else header("Location = ./index.php");
?>
<?php
echo '<form action="adminAddQuestions.php" method="POST">';

echo '<select name="category">';
$categories = R::find("categories", "ORDER BY 'name' DESC", array());
$i = 1;
foreach ($categories as $c) {
    echo "<option value ='" . $i . "'>" . $c->name . "</option>";
    $i++;
}

echo "</select>";

echo '<p>';
echo ' <button type="submit" name="choose">Выбрать</button>';

echo '</p>';
echo '</form>';
?>
<?php
if (isset($_POST['category'])) {
    $tests = R::find("tests", "category_id = ?", array($_POST['category']));
    echo '<form action="addQuest.php" method="POST">';
    echo '<select name="test">';
    $i = 1;
    foreach ($tests as $t) {
        echo '<option value ="' . $i . '">' . $t->name . '</option>';
        $i++;
    }
    echo '</select>';
    echo '<input type="hidden" name="category" value="' . $_POST['category'] . '">';
    echo '<p><button type="submit" name="chooseTest">Выбрать</button></p>';
    echo "</form>";
}
?>

