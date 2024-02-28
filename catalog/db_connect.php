<?php
/*$server = "localhost";
$db_user = "root";
$db_pwd = "";
$db_name = "beverlyheights";*/
$server = "localhost";
$db_user = "root";
$db_pwd = "";
$db_name = "fruits_veggies";

$db_conn = new mysqli($server, $db_user,$db_pwd,$db_name);
$db_conn->connect($server, $db_user,$db_pwd,$db_name);

if (!$db_conn) {
	die("connection unsuccessful". $db_conn->connect_error());
}