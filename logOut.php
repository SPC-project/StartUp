<?php
    require "db.php";
    unset($_SESSION['logged_user']);
    header('Location: /project_startup/startUp');
?>
