<?php
session_start();

require "connection.php";

if (isset($_SESSION["s"])) {

    $email = $_SESSION["s"]["email"];
    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    $mobile = $_POST["m"];
    // $newmail = $_POST["ne"];

    if(!empty($fname)){
        Database::iud("UPDATE `seller` SET 
    `fname` = '".$fname."' WHERE `email` = '".$email."' ");
    }
    
    if(!empty($lname)){
        Database::iud("UPDATE `seller` SET 
        `lname` = '".$lname."' WHERE `email` = '".$email."' ");
    }
    
    if(!empty($mobile)){
        Database::iud("UPDATE `seller` SET 
        `mobile` = '".$mobile."' WHERE `email` = '".$email."' ");
    }
    
    $last_product_id = $id;


       

    if (isset($_FILES["img"])) {
    
        $image= $_FILES["img"];
        $allowed_image_extention = array("image/jpeg", "image/jpg", "image/png", "image/svg");
        $file_extention = $image["type"];

        if (!in_array($file_extention, $allowed_image_extention)) {
            echo "1";
        } else {
            // echo $imageFile["name"];

            $newimgextention;
            if ($file_extention = "image/jpeg") {
                $newimgextention = ".jpeg";
            } elseif ($file_extention = "image/jpg") {
                $newimgextention = ".jpg";
            } elseif ($file_extention = "image/png") {
                $newimgextention = ".png";
            } elseif ($file_extention = "image/svg") {
                $newimgextention = ".svg";
            }

            $filename = "resources//seller//" . uniqid() . $newimgextention;

            move_uploaded_file($image["tmp_name"], $filename);
            $resultProfileImg = Database::search("SELECT * FROM `seller_profile_image` WHERE `seller_email`='" . $email. "'  ");
            $pror = $resultProfileImg->num_rows;
    
            if ($pror == 1) {
    

            Database::iud("UPDATE `seller_profile_image` SET `code`='" . $filename . "' WHERE `seller_email`='" .  $email . "'  ");
          
            // echo "Image Saved Successfully.";
        }else{
            Database::iud("INSERT INTO `seller_profile_image` (`code`,`seller_email`) VALUES ('" . $filename . "','" . $email. "') ");

        }
     } 
    

}


echo "2";
}

 ?>