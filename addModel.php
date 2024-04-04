<?php

require "connection.php";

$n = $_GET["name"];
$s = $_GET["select"];

if(empty($s)){
    echo "please select a brand";
}

else if (!empty($n)) {
    $test = Database::search("SELECT * FROM `model` WHERE `name` = '" . $n . "'");
    $num = $test->num_rows;
    

    if ($num == 1) {
        echo "Model is already exist !";
    } else {

        Database::iud("INSERT INTO `model`(`name`) VALUE ('" . $n . "')");
        // echo "success";
    } 
    

}else{
    echo "please enter a model name";
}

if(!empty($n) && !empty($s)){

    $testm = Database::search("SELECT * FROM `model` WHERE `name` = '" . $n . "'");
    $numm = $testm->num_rows;
    $mid = $testm->fetch_assoc();
    $id = $mid["id"];

    $testb = Database::search("SELECT * FROM `brand` WHERE `name` = '" . $s . "'");
    $numb = $testb->num_rows;
    $bid = $testb->fetch_assoc();
    $idb = $bid["id"];

    $testi = Database::search("SELECT * FROM `model_has_brand` WHERE `model_id`='".$id."' AND `brand_id`='".$idb."'");
    $numi = $testi->num_rows;

    if ($numi == 1) {
        echo "Combination is already exist !";
    } else {

        Database::iud("INSERT INTO `model_has_brand`(`model_id`,`brand_id`) VALUE ('" . $id . "','".$idb."')");
        echo "success";
    }

}
