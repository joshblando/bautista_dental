<?php
require 'define.php';

//SET DSN

$dsn = 'mysql:host=' . HOST . ';dbname=' . DB;

//CREATE PDO Instance

$connect = new PDO($dsn, USER, PASSWORD_DB);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
