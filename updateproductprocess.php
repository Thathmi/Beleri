<?php
session_start();
require "connection.php";


if(isset($_POST["id"])){
    

    $id = $_POST["id"];
    $title = $_POST["t"];
$qty   = $_POST["qty"];
$dwc   = $_POST["dwc"];
$doc   = $_POST["doc"];
$desc   = $_POST["desc"];

// echo $id;
// echo $id;
// echo $title;
// echo $qty;
// echo $dwc;
// echo $doc;
// echo $desc;

if(isset($_FILES["img"])){
    $image= $_FILES["img"];
}else{

}

if(!empty($qty)){
    Database::iud("UPDATE `product` SET 
`qty` = '".$qty."' WHERE `id` = '".$id."' ");
}

if(!empty($desc)){
    Database::iud("UPDATE `product` SET 
`Description` = '".$desc."' WHERE `id` = '".$id."' ");
}

if(!empty($dwc)){
    Database::iud("UPDATE `product` SET 
`delivery_fee_colombo` = '".$dwc ."' WHERE `id` = '".$id."' ");
}

if(!empty($doc)){
    Database::iud("UPDATE `product` SET 
`delivery_fee_other` = '".$doc ."' WHERE `id` = '".$id."' ");
}

if(!empty($title)){
    Database::iud("UPDATE `product` SET 
`title` = '".$title ."' WHERE `id` = '".$id."' ");
}


// Database::iud("UPDATE `product` SET 
// `qty` = '".$qty."',
// `Description` = '".$desc."',
// `delivery_fee_colombo` = '".$dwc ."',
// `delivery_fee_other` = '".$doc ."',
// `title` = '".$title ."'
//  WHERE `id` = '".$id."' ");

// echo "Product details Updated";

}else{
    echo "Product Does not Exit";
}






$last_product_id = $id;


       

            if (isset($_FILES["img"])) {
            

                $allowed_image_extention = array("image/jpeg", "image/jpg", "image/png", "image/svg");
                $file_extention = $image["type"];

                if (!in_array($file_extention, $allowed_image_extention)) {
                    echo "Please Select a valid image.";
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

                    $filename = "resources//products//" . uniqid() . $newimgextention;

                    move_uploaded_file($image["tmp_name"], $filename);
                    $resultProfileImg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $id . "'  ");
                    $pror = $resultProfileImg->num_rows;
            
                    if ($pror == 1) {
            

                    Database::iud("UPDATE `image` SET `code`='" . $filename . "' WHERE `product_id`='" .  $id . "'  ");
                  
                    // echo "Image Saved Successfully.";
                }else{
                    Database::iud("INSERT INTO `image` (`code`,`product_id`) VALUES ('" . $filename . "','" . $last_product_id . "') ");

                }
             } 
            
        
        }


        echo "Product details Updated";







   



?>