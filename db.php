<?php
	require "rb-mysql.php";
	R::setup( 'mysql:host=localhost;dbname=startup','root', '111111' ); //for both mysql or mariaDB
	session_start();
?>
