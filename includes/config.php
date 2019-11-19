<?php
session_start();

//$server_name = '199.188.200.126';
// $user_name = 'autohapa_user';
// $password = 'Terminal9090A';

//----------- for localhost
$server_name = 'localhost';
$user_name = 'root';
$password = '';
$db_name = 'autohapa_db';
$site_url = "http://localhost/";

// @$conn = mysql_connect($server_name,$user_name,$password) or die('Could not connect to Database');
// mysql_select_db($db_name,$conn);

@$conni = mysqli_connect($server_name, $user_name, $password, $db_name);
// @$conni2 = mysqli_connect($server_name,$user_name,$password, $db_name);
// @$conni_menu = mysqli_connect($server_name,$user_name,$password, $db_name);
// @$conni_tab = mysqli_connect($server_name,$user_name,$password, $db_name);
// @$conni_chat = mysqli_connect($server_name,$user_name,$password, $db_name);

if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
}