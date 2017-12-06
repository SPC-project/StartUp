<?php
/**
 * Created by PhpStorm.
 * User: Ivan Zadorozhniy
 * Date: 06.12.2017
 * Time: 19:36
 */
require "../db.php";

$nameTest = R::load("tests", $_POST['category']);
?>
<?php
$dataQuestions = R::find('questions', "test_id = ?", array($_POST['test']));
?>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf8'>
    <link rel="stylesheet" href="../css/test.css" type="text/css"/>
    <title>ТЕСТ</title>
</head>
<body>

<style type="text/css">

    .wrapper {
        width: 600px;
        height: 130px;
        margin: 0 auto;
        display: none;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
    }

</style>


<script type="text/javascript">
    function severalRandom(min, max, num) {

        var i, arr = [], res = [];

        for (i = min; i <= max; i++) arr.push(i);

        for (i = 0; i < num; i++) res.push(arr.splice(Math.floor(Math.random() * (arr.length)), 1)[0])

        return res;

    }

    var countQuest = 0;
    var plus = 0;
    var test_start = 0;

    var questions = [<?php foreach ($dataQuestions as $dq) {
        echo '"' . $dq->text . '",';
    }?>];

    var goodAnswer = [<?php foreach ($dataQuestions as $dq) {
        echo '"' . $dq->goodAnswer . '",';
    }?>];

    var badAnswer1 = [<?php foreach ($dataQuestions as $dq) {
        echo '"' . $dq->badAnswer1 . '",';
    }?>];

    var badAnswer2 = [<?php foreach ($dataQuestions as $dq) {
        echo '"' . $dq->badAnswer2 . '",';
    }?>];

    var badAnswer3 = [<?php foreach ($dataQuestions as $dq) {
        echo '"' . $dq->badAnswer3 . '",';
    }?>];


    //Массивы вариантов ответов
    var number1 = [];
    var number2 = [];
    var number3 = [];
    var number4 = [];
    var answer = [];
    alert(questions.length);
    for(var i=0;i<questions.length;i++){
        var res = severalRandom(0,3,4);
        console.log(res);
        var res2 = severalRandom(0,3,4);
        console.log(res2);
        for(var j=0; j<4; j++){
            switch (res[j]) {
                case 0:
                    switch (res2[j]){
                        case 0:
                            number1.push(goodAnswer[i]);
                            answer.push(res2[j]);
                            break;
                        case 1:
                            number2.push(goodAnswer[i]);
                            answer.push(res2[j]);
                            break;
                        case 2:
                            number3.push(goodAnswer[i]);
                            answer.push(res2[j]);
                            break;
                        case 3:
                            number4.push(goodAnswer[i]);
                            answer.push(res2[j]);
                            break;
                    }
                    break;
                case 1:
                    switch (res2[j]){
                        case 0:
                            number1.push(badAnswer1[i]);
                            break;
                        case 1:
                            number2.push(badAnswer1[i]);
                            break;
                        case 2:
                            number3.push(badAnswer1[i]);
                            break;
                        case 3:
                            number4.push(badAnswer1[i]);
                            break;
                    }
                    break;
                case 2:
                    switch (res2[j]){
                        case 0:
                            number1.push(badAnswer2[i]);
                            break;
                        case 1:
                            number2.push(badAnswer2[i]);
                            break;
                        case 2:
                            number3.push(badAnswer2[i]);
                            break;
                        case 3:
                            number4.push(badAnswer2[i]);
                            break;
                    }
                    break;
                case 3:
                    switch (res2[j]){
                        case 0:
                            number1.push(badAnswer3[i]);
                            break;
                        case 1:
                            number2.push(badAnswer3[i]);
                            break;
                        case 2:
                            number3.push(badAnswer3[i]);
                            break;
                        case 3:
                            number4.push(badAnswer3[i]);
                            break;
                    }
                    break;

            }
        }
    }
    console.log(number1);
    console.log(number2);
    console.log(number3);
    console.log(number4);
    console.log(answer);
    //Массив правильных ответов


    function check(num) {

        if (num == 4) {

            document.getElementById('area').style.display = 'block'; //
            document.getElementById('start').style.display = 'none';
            document.getElementById('end').style.display = 'inline';

            if (test_start == 0) {

                document.getElementById('question').innerHTML = questions[countQuest];

                document.getElementById('option1').innerHTML = number1[countQuest];
                document.getElementById('option2').innerHTML = number2[countQuest];
                document.getElementById('option3').innerHTML = number3[countQuest];
                document.getElementById('option4').innerHTML = number4[countQuest];

                test_start = 1;
            }
        }
        else {
            //Массив вопросов


            if (num == answer[countQuest]) plus++;

            if (questions.length - 1 > countQuest) {

                countQuest++;

                document.getElementById('question').innerHTML = questions[countQuest];

                document.getElementById('option1').innerHTML = number1[countQuest];
                document.getElementById('option2').innerHTML = number2[countQuest];
                document.getElementById('option3').innerHTML = number3[countQuest];
                document.getElementById('option4').innerHTML = number4[countQuest];

            }
            else {

                document.getElementById('area').style.display = 'none';
                alert('У Вас ' + plus + ' правильных ответа!');
            }
        }
    }

</script>

<div style="margin-top: 200px;">

    <div id="area" class="wrapper">

        <center>

            <p style="font-size: 38px;font-weight: bold;padding-top: 2px;color: #fff;" id="question"></p>

            <button onclick="check(0)" class="myButton" id="option1"></button>

            <button onclick="check(1)" class="myButton" id="option2"></button>

            <button onclick="check(2)" class="myButton" id="option3"></button>

            <button onclick="check(3)" class="myButton" id="option4"></button>

        </center>

    </div>

</div>

<br>
<center>
    <button id="start" class="myButton" onclick="check(4)">Приступить к тесту</button>
    <script type="text/javascript"> var curent_url = document.URL;
        document.write("<a id='end' style='display: none;' class='myButton' href='" + curent_url + "'>Начать сначала</a>"); </script>
</center>

<br><br>
<center><br>

</center>

</body>
</html>