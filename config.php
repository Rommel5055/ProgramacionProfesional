<?php
$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpassword = "";
$dbdatabase = "mydb";
$config_basedir = "http://localhost/Ferreteria/";
$config_sitename = "Ferreteria";
$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase) or die(mysqli_error())
?>
