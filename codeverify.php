<?php
session_start();
require "connection.php";

$c = $_POST["c"];
$e = $_POST["e"];


if (empty($c)) {
    echo "Missing verification code";
} else  {
 

    $rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$e."' AND `verification`='".$c."'");
    if($rs->num_rows==1){
$aa = $rs->fetch_assoc();
$_SESSION["a"]=$aa;

         echo "1";

    }else{
        echo "Password Reset Fail";
    }
}

?> 
