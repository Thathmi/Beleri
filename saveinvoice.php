<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){

$oid =$_POST["oid"];
$pid =$_POST["pid"];
$email =$_POST["email"];
$total =$_POST["total"];
$pqty =$_POST["pqty"];

$productrs =Database::search("SELECT * FROM `product` WHERE `id` = '".$pid."'");
$pn = $productrs->fetch_assoc();

$qty = $pn["qty"];
$newqty = $qty - $pqty;

Database::iud("UPDATE `product` SET `qty` ='".$newqty."' WHERE `id` = '".$pid."'");

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d) H:i:s");

Database::iud("INSERT INTO `invoice`(`order_id`,`date`,`product_id`,`user_email`,`total`,`qty`) VALUES ('".$oid."','".$date."','".$pid."','".$email."','".$total."','".$pqty."')");

echo "1";
}





?>