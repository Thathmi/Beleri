<?php
session_start();

require "connection.php";

$id =$_POST['c'];
// echo $id;

$_SESSION["cat"]=$id;
?>