<?php

require "connection.php";

$n = $_GET["name"];

if (!empty($n)) {
    $test = Database::search("SELECT * FROM `brand` WHERE `name` = '" . $n . "'");
    $num = $test->num_rows;

    if ($num == 1) {
        echo "Brand is already exist !";
    } else {

        Database::iud("INSERT INTO `brand`(`name`) VALUE ('" . $n . "')");
        echo "success";
    }
}else{
    echo "please enter a Brand name";
}
