<?php


$server = "localhost";
$password = "";
$user = "root";
$database = "ethiotourism";
$conn = mysql_connect($server, $user, $password, $database);
mysql_select_db($database);

/*
use ethiotourism;# MySQL returned an empty result set (i.e. zero rows).


CREATE TABLE users (
username VARCHAR(20),
password VARCHAR(20) ,
email VARCHAR(50)
);# MySQL returned an empty result set (i.e. zero rows).

*/
?>