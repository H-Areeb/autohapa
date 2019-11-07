<?php 
//@session_start();

	$server_name = '199.188.200.126';
	//$server_name = '192.168.3.181';
	//$server_name = 'localhost';
	$user_name	 = 'autohapa_user';
	$password = 'Terminal9090A';
	//$password = 'Logoinn345@';
	$db_name = 'autohapa_db';
	
	
// @$conn = mysql_connect($server_name,$user_name,$password) or die('Could not connect to Database');
// mysql_select_db($db_name,$conn);

@$conni = mysqli_connect($server_name,$user_name,$password, $db_name);
// @$conni2 = mysqli_connect($server_name,$user_name,$password, $db_name);
// @$conni_menu = mysqli_connect($server_name,$user_name,$password, $db_name);
// @$conni_tab = mysqli_connect($server_name,$user_name,$password, $db_name);
// @$conni_chat = mysqli_connect($server_name,$user_name,$password, $db_name);

if (mysqli_connect_errno()) 
{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}






?>
