<?php

$serverName = "mysql.ct8.pl";
$dbUsername = "m19100_jaltman";
$dbPassword = "XotiCj)VvE!&)niuCy64";
$dbName = "m19100_nazwa_bazy";

$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);
$znaki=$conn->query("SET CHARSET utf8");
$znaki2=$conn->query("SET NAMES utf8 COLLATE utf8_polish_ci");

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

