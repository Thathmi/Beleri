<?php

require "connection.php";

$n = $_GET["name"];

if (!empty($n)) {
    $test = Database::search("SELECT * FROM `category` WHERE `name` = '" . $n . "'");
    $num = $test->num_rows;

    if ($num == 1) {
        echo "category is already exist !";
    } else {

        Database::iud("INSERT INTO `category`(`name`) VALUE ('" . $n . "')");
        echo "success";
    }
}else{
    echo "please enter a category name";
}
