<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){

    $uemail = $_SESSION["u"]["email"];

    $id = $_GET["id"];

    $watchlistrs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='".$id."' AND `user_email`= '".$uemail."'  ");
    $n = $watchlistrs->num_rows;

    if($n ==1){
echo "Item is Already on the watchlist !";
    }else{

        Database::iud("INSERT INTO `watchlist`(`product_id`,`user_email`) VALUES ('".$id."' , '".$uemail."')");

    echo "success";
    }

    

}


?>