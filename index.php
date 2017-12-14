<?php
require "db.php"; // Подключаем соеденение с БД.
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Start page</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/style_common.css">
    <link rel="stylesheet" href="css/style_index.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class = "navbar navbar-default navbar-fixed-top">
    <header class="container">
        <!-- <div class = "header_Main"> -->
        <div class="row">
            <div class=" col-md-4">
                <a href = "">
                    <img id="new-logo" src="img/img_about/logo.png" alt="Logo of company">
                </a>
            </div>
            <!-- <nav class="col-lg-8 col-lg-offset-2 col-sm-10 ">
 -->
            <nav class="col-md-8 ">
                <!--Тоже самое (почти) на чистом html
                <a href='login.php'>LogIn</a>
                <a href="signUp.php">SignIn</a>
                <a href="html/question.html">Questions</a>
                -->
                <!--КОД PHP который взаимодействует с html. Пожалуйста запусти меня на локальном сервере-->
                <?php
                //require "db.php"; // Подключаем соеденение с БД.
                if(isset($_SESSION['logged_user']) ){ //Проверка сессии. Если не пустая тогда пользователь зашел.
//							echo "Authorized. Hello, ",  $_SESSION['logged_user']->login , "!";
                    echo '<div class = "text_header">';
                    echo "Authorized. Hello, ",  $_SESSION['logged_user']->login , "!";
                    echo '</div>';

//							Строчка где показывается login пользователя
                    echo '<a href="html/chooseQuestion.php">Questions</a>';
                    if($_SESSION['logged_user']->level_access == 3)
                    {
                        echo '<a href="adminka/admin.php">Все для администрации</a>';//ссылка для выхода
                    }
                    echo '<a href="#info">About Us</a>';
                    echo '<a href="logOut.php">Exit</a>';
                }else{
                    echo "<a href='login.php'>LogIn</a>";
                    // Вход здесь!
//							echo '<a href="signUp.php">SignIn</a>';
                    // Регистрация тута!
//							echo '<a href="#info_subj">Questions</a>';
                    echo '<a href="#info">About Us</a>';
                }
                ?>
                <!--КОНЕЦ кода PHP -->

            </nav>
        </div>
    </header>
</nav>


<main>
    <div id="particles-js">
        <img src="img/img_homepage/t1.jpg">
        <img src="img/img_homepage/t2.jpg" class="display_none">
        <img src="img/img_homepage/t3.jpg" class="display_none">
        <img src="img/img_homepage/t4.jpg" class="display_none">
        <img src="img/img_homepage/t5.jpg" class="display_none">
        <img src="img/img_homepage/t6.jpg" class="display_none">
        <img src="img/img_homepage/t7.jpg" class="display_none">

    </div>
    <div class="main_block wow fadeIn" id="front">
        <h1>You are welcome! :)</h1>
        <p>Check your knowledges.</p>

        <br>
        <a href="html/question.html" class="text-center a_btn">
            Random test &rarr;
        </a>
    </div>
</main>


<!--===========   ABOUT   ================-->
<a name = "info"></a>

<section id="eggs">
    <div class="container ">
        <div class="row text-center header-eggs">
            <h2>How it works?</h2>
            <a href="startDB.php">Создать БД</a>
        </div>
         <div class = "row  icons text-center">
            <div class="col-sm-4 wow fadeInUp" data-wow-delay = "0.2s">
                <img src="img/img_about/tests.png" alt="Interactive tests">
                <h3>Interactive tests</h3>
                <h5>Check the knowledge received through various interactive tasks.</h5>
            </div>
            <div class="col-sm-4 wow fadeInUp" data-wow-delay = "0.4s">
                <img src="img/img_about/road.png" alt="">
                <h3>Anywhere</h3>
                <h5>Take tests without leaving home or on the road. All you need is access to the Internet.</h5>
            </div>
            <div class="col-sm-4 wow fadeInUp" data-wow-delay = "0.6s">
                <img src="img/img_about/clock.png" alt="">
                <h3>Anytime</h3>
                <h5>Study at the time convenient for you. Tests are available round the clock.</h5>
            </div>
        </div>
    </div>
</section>


<!--==============     MATERIALS    ==============-->
<a name = "info_subj"></a>
<br><br>
<section id="subjects">
    <div class="row text-center header-subj">
        <h2>Choose topic</h2>
    </div>
    <ul class="products ">
        <li class="product-wrapper">
            <a href="" class="product">
                <div class="product-photo">
                    <img src="img/img_about/physics2_sm.jpg" alt="">
                    <div class="product-preview"><span class="button">Physics</span></div>
                </div>
            </a>
        </li>

        <li class="product-wrapper">
            <a href="" class="product">
                <div class="product-photo">
                    <img src="img/img_about/programming_sm.jpg" alt="">
                    <div class="product-preview"><span class="button">Programming</span></div>
                </div>
            </a>
        </li>

        <li class="product-wrapper">
            <a href="" class="product">
                <div class="product-photo">
                    <img src="img/img_about/geography_sm.jpg" alt="">
                    <div class="product-preview"><span class="button">Geography</span></div>
                </div>
            </a>
        </li>

        <li class="product-wrapper">
            <a href="" class="product">
                <div class="product-photo">
                    <img src="img/img_about/english_sm.jpg" alt="">
                    <div class="product-preview"><span class="button">English</span></div>
                </div>
            </a>
        </li>
        <li class="product-wrapper">
            <a href="" class="product">
                <div class="product-photo">
                    <img src="img/img_about/history_sm.jpg" alt="">
                    <div class="product-preview"><span class="button">History</span></div>
                </div>
            </a>
        </li>

        <li class="product-wrapper">
            <a href="" class="product">
                <div class="product-photo">
                    <img src="img/img_about/math3_sm.jpg" alt="">
                    <div class="product-preview"><span class="button">Math</span>

                    </div>
                </div>
            </a>
        </li>
        <li class="product-wrapper">
            <a href="" class="product">
                <div class="product-photo">
                    <img src="img/img_about/economics_sm.jpg" alt="">
                    <div class="product-preview"><span class="button">Economics</span></div>
                </div>
            </a>
        </li>

        <li class="product-wrapper">
            <a href="" class="product">
                <div class="product-photo">
                    <img src="img/img_about/math_sm.jpg" alt="">
                    <div class="product-preview"><span class="button">Math</span></div>
                </div>
            </a>
        </li>
    </ul>
</section>



<section id="About_team">
    <div class="container">
        <div class="row text-center">
            <h2>Smth else</h2>
        </div>
    </div>
</section>



<footer class="text-center">
    <a href="https://www.facebook.com/official.cmps/"><i class="fa fa-facebook"></i></a>
    <a href="https://github.com/SPC-project"><i class="fa fa-github"></i></a>
    <a href="https://www.google.com.ua/"><i class="fa fa-google"></i></a>
</footer>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js'></script>
<script src='http://threejs.org/examples/js/libs/stats.min.js'></script>
<script src="js/for_part.js"></script>
<script src="js/slider.js"></script>
<link rel="stylesheet" href="css/animate.css">
<script src = "js/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>-->
</body>

</html>
