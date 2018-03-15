<?php

define (DB_USER, "nagisa");
define (DB_PASSWORD, "nagisapassword");
define (DB_DATABASE, "nagisa");
define (DB_HOST, "mysql.nagisa.svc");

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
?>

