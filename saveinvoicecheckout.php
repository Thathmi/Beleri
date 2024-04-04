<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){

$oid =$_POST["oid"];
// $pid =$_POST["pid"];
$email =$_POST["email"];
$total =$_POST["total"];
// $pqty =$_POST["pqty"];

$cart =Database::search("SELECT * FROM `cart`");
$cn = $cart->num_rows;

for($w=0;$w<$cn;$w++){


$c = $cart->fetch_assoc();
$cid=$c["product_id"];

$p = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cid . "' ");
$pi = $p->num_rows;
$pid = $p->fetch_assoc();

$cp = $pid["price"];




$cityrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $email . "' ");
$cic = $cityrs->num_rows;

$totla="0";
if ($cic == 1) {
    $cr = $cityrs->fetch_assoc();
  
    $address = $cr["line1"] . "," . $cr["line2"];


$loid = $cr["user_email"];

$locationrs = Database::search("SELECT * FROM `location` WHERE `user_email` = '" . $loid . "' ");
$lr = $locationrs->fetch_assoc();

$ctd = $lr["city_id"];

$crs = Database::search("SELECT * FROM `city` WHERE `id` = '" . $ctd . "' ");
$cidr = $crs->fetch_assoc();

$districtid = $lr["district_id"];



$delivery = "0";

if ($districtid == "1") {
    $delivery = $pid["delivery_fee_colombo"];
} else {
    $delivery = $pid["delivery_fee_other"];
}

$totla = $cp+$delivery;

// $productrs =Database::search("SELECT * FROM `product` WHERE `id` = '".$cid."'");
// $pn = $productrs->fetch_assoc();

$qty = $pid["qty"];
$newqty = $qty - 1;

Database::iud("UPDATE `product` SET `qty` ='".$newqty."' WHERE `id` = '".$cid."'");

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d) H:i:s");

Database::iud("INSERT INTO `invoice`(`order_id`,`date`,`product_id`,`user_email`,`total`,`qty`) VALUES ('".$oid."','".$date."','".$cid."','".$email."','".$totla."','1')");
}}
echo "1";
}





?>