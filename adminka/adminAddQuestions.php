<?php 
require "../db.php";
    if( isset($_SESSION['logged_user']) ){
        if( $_SESSION['logged_user']->levelAccess == 3 ){
            echo "Привет Админ<br>";
        }
    }
?>

<form action="adminAddQuestions.php" method="POST">
    <?php
echo '<select name="category">';
$categories = R::find("categories","ORDER BY 'name' DESC", array());
$i=1;
foreach ($categories as $c){
    echo "<option value ='" . $i. "'>" . $c->name . "</option>";
    $i++;
} 

echo "</select>";
?>
<p><button type='submit' name="choose">Выбрать</button></p>
</form>
<?php 
if(isset($_POST['choose'])){
    $tests = R::find("tests", "category_id = ?", array($_POST['category']) );
    echo '<form action="adminAddQuestions.php" method="POST">';
    echo '<select name="test">';
    $i=1;
    foreach($tests as $t){
        echo '<option value ="'. $i .'">' .$t->name . '</option>'; 
        $i++;
    }
   echo '</select>';
   echo '<p><button type="submit" name="chooseTest">Выбрать</button></p>';
    echo "</form>";
}    
?>