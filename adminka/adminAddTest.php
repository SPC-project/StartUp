<?php 
    require "../db.php";
    if( isset($_SESSION['logged_user']) ){
        if( $_SESSION['logged_user']->levelAccess == 3 ){
            echo "Привет Админ<br>";
            if(isset($_POST['do_signup'])){
            $data = $_POST;
            
            $errors = array();
            if( trim($data['nameTest'] == '') ){
                $errors[] = "Введите название теста, пожалуйста";
            }
            if( trim($data['amoung']=='')){
                    $errors[] = "Введите кол-во вопросов";
            }
            if(empty($errors)){
                $test = R::dispense("tests");
                $test->name=$data['nameTest'];
                $test->amoungQuestions = $data['amoung'];
                $test->category = R::load('categories',$data['category']);
                $test->name_creator = R::load('users',$_SESSION['logged_user']->id);
                R::store($test);
                unset($_POST);
                unset($data);
                echo "Test добавлен <br>";

            }else{
                echo "<font color='red'>" . $errors[0] . "</font>";
            }
        
        }
    }else{
        echo "У вас не хватает уровня доступа";
    }
}else{
    echo "Пожалуйста войдите на сайт";
}
    
?>
<form action="adminAddTest.php" method="POST">
<p> Введите имя теста:</p> <input type="text" name="nameTest" value = "<?php echo @$data['nameTest'];?>"> </input> <br>
<p> Количевство вопросов:</p> <input type="number" name="amoung" value = "<?php echo @$data['amoung'];?>"> </input> <br>
<p> Выбирите категорию: </p> 
<?php
echo '<select name="category">';
$categories = R::find("categories","ORDER BY 'name' DESC", array());
echo "<pre>";
echo print_r($categories);
echo "</pre>";
$i=1;
foreach ($categories as $c){
    echo "<option value ='" . $i. "'>" . $c->name . "</option>";
    $i++;
} 

echo "</select>";
?>
<p>
  	<button type="submit" name="do_signup"> Клац </button>
  </p>


</form>
