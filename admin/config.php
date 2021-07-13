<?php 

$hostname ='http://localhost/new_project/news_project';
$db_host ='localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'demo_db';

$conn = mysqli_connect($db_host, $db_user,$db_password, $db_name) or die("Connection Failed :". mysqli_connect_error());


?>