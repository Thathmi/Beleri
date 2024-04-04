<?php

require "connection.php";

if(isset($_POST["e"])){

    $email = $_POST["e"];

    $users = Database::search("SELECT * FROM `product` WHERE `id` = '".$email."'");
    $num = $users->num_rows;

    if($num==1){
        $row=$users->fetch_assoc();
        $us=$row["status_id"];

        if($us=="1"){
            Database::iud("UPDATE `product` SET `status_id` ='2' WHERE `id`='".$email."'");
            echo "1";
        }else{
            Database::iud("UPDATE `product` SET `status_id` ='1' WHERE `id`='".$email."'");
            echo "1";
        }
    }
}

?>