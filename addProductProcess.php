<?php
session_start();
require "connection.php";

$s = $_SESSION["s"];

$category = $_POST["c"];
$brand = $_POST["b"];
$model = $_POST["m"];
$title = $_POST["t"];
$condition = $_POST["co"];
$colour = $_POST["col"];
$qty = (int)$_POST["qty"];
$price = (int)$_POST["p"];
$dwc = (int)$_POST["dwc"];
$doc = (int)$_POST["doc"];
$description = $_POST["desc"];



$d= new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$state = 1;
$useremail = $s["email"]; //temporory hard code

if($category == "Select Category"){
    echo "Please Select a Category.";
}else if($brand == "Select Brand"){
    echo "Please Select a Brand.";
}else if($model == "Select Model"){
    echo "Please Select a Model.";
}else if(empty($title)){
    echo "Please Add a Title.";
}else if(strlen($title) > 100){
    echo "Title Must Contain 100 or Less than 100 Characters.";
}else if($qty == "0"|| $qty == "e"){
    echo "Please Add the Quantity of Your Product.";
}else if(!is_int($qty)){
    echo "Please Add a Valid Quantity.";
}else if(empty($qty)){
    echo "Please Add the Quantity of Your Product.";
}else if($qty < 0){
    echo "Please Add a Valid Quantity.";
}
elseif(empty($price)){
    echo "Please add the price.";
}
elseif(!is_int($price)){
    echo "Please enter a valid price.";
}
elseif(empty($dwc)){
    echo "Please add the delivery cost inside the colombo destirct.";
}
elseif(!is_int($dwc)){
    echo "Please enter a valid price.";
}
elseif(empty($doc)){
    echo "Please add the delivery cost outside the colombo destirct.";
}
elseif(!is_int($doc)){
    echo "Please enter a valid price.";
}
elseif(empty($description)){
    echo "Please add the product description.";
}
else{
$brandid = Database::search("SELECT `id` FROM `brand` WHERE `name`='".$brand."'");
 $modelid = Database::search("SELECT `id` FROM `model` WHERE `name`='".$model."'");
 $categoryid = Database::search("SELECT `id` FROM `category` WHERE `name`='".$category."'");
 $statusid = Database::search("SELECT `id` FROM `status` WHERE `name`='".$state."'");

 $imageFile = $_FILES["img"]; 

 $nb = $brandid->fetch_assoc();
 $bid = $nb["id"];

 $nm = $modelid->fetch_assoc();
 $mid = $nm["id"];

 $c = $categoryid->fetch_assoc();
 $cid = $c["id"];

 if($nb !=0 ){
     if($nm!=0){

        


        $modelHasBrand = Database::search("SELECT * FROM `model_has_brand` WHERE `brand_id` ='".$bid."' AND `model_id`='".$mid."' ");
         
        if($modelHasBrand->num_rows==0){
            echo "The product doesn't exist"; 
            
        }else{
            $f= $modelHasBrand->fetch_assoc();
            $modelHasBrandId = $f["id"];  
            
    
            Database::iud("INSERT INTO `product`(`category_id`,`model_has_brand_model_id`,`color_id`,`price`,`qty`,`description`,`title`,`seller_email`,`condition_id`,`status_id`,`datetime_added`,`delivery_fee_colombo`,`delivery_fee_other`)
            VALUES ('".$cid."', '".$modelHasBrandId."', '".$colour."', '".$price."', '".$qty."', '".$description."', '".$title."', '".$useremail."', '".$condition."', '".$state."', '".$date."', '".$dwc."', '".$doc."')");
        
        echo "1"; 
    
        $last_id = Database::$connection->insert_id;
    
        
    
        //$file_extension = pathinfo($imageFile,PATHINFO_EXTENSION);
        //}else if(in_array($file_extension,$allowed_image_extention)){
        //echo "Please Select a Valid image.";
    
       //$file_extension = $imageFile["type"];
        if(isset($_FILES["img"])){
            // $allowed_image_extention = array("image/jpg","image/png","image/svg");        
            // $fileex = $imageFile["type"];
    
            // if(!in_array($fileex,$allowed_image_extention)){
            //     echo "Please Select a Valid image.";
            // }else{
            //     //echo $imageFile["name"];
    
    
            //     $newimgentention;
            //     if($fileex="image/jpeg"){
            //         $newimgentention=".jpeg";
            //     }else if($fileex="image/jpg"){
            //         $newimgentention=".jpg";
            //     }else if($fileex="image/png"){
            //         $newimgentention=".png";
            //     } else if($fileex="image/svg"){
            //         $newimgentention=".svg";
            //     }
    
                $file_name = "resources//products//".uniqid(). ".png";
    
               
                move_uploaded_file($imageFile["tmp_name"],$file_name);
    
                Database::iud("INSERT INTO `image`(`code`,`product_id`) VALUES ('".$file_name."','".$last_id."')");
                // echo "Image Saved Successfully";
    
            
        }else{
            echo "Please Select an Image";
        }
    }


     }
 }

   
     
}
