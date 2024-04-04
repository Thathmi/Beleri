<?php
session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $email=$_SESSION["u"]["email"];
    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    $mobile = $_POST["m"];
    $line1 = $_POST["a1"];
    $line2 = $_POST["a2"];
    $city = $_POST["c"];
    $province = $_POST["p"];
    $district = $_POST["d"];
    $newmail = $_POST["ne"];
 


    if (isset($_FILES["img"])) {
        $image = $_FILES["img"];
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

            $filename = "resources//user//" . uniqid() . $newimgextention;

            move_uploaded_file($image["tmp_name"], $filename);
            $resultProfileImg = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email. "'  ");
            $pror = $resultProfileImg->num_rows;
    
            if ($pror == 1) {
    

            Database::iud("UPDATE `profile_image` SET `code`='" . $filename . "' WHERE `user_email`='" .  $email . "'  ");
          
            echo "Image Saved Successfully.";
        }else{
            Database::iud("INSERT INTO `profile_image` (`code`,`user_email`) VALUES ('" . $filename . "','" . $email. "') ");

        }
     } 
    





    } 
 

     if(!empty($fname)){
        Database::iud("UPDATE `user` SET 
    `fname` = '".$fname."' WHERE `email` = '".$_SESSION["u"]["email"]."' ");
    }
    if(!empty($lname)){
        Database::iud("UPDATE `user` SET 
    `lname` = '".$lname."' WHERE `email` = '".$_SESSION["u"]["email"]."' ");
    }
    if(!empty($mobile)){
        Database::iud("UPDATE `user` SET 
    `mobile` = '".$mobile."' WHERE `email` = '".$_SESSION["u"]["email"]."' ");
    }
    if(!empty($newmail)){
        Database::iud("UPDATE `user` SET 
    `email` = '".$newmail."' WHERE `email` = '".$_SESSION["u"]["email"]."' ");
    }
    
    

        if(!empty($city)){
            if(!empty($province)){
                if(!empty($district)){

        

        $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' ");
        $nr = $addressrs->num_rows;

        if ($nr == 1) {
                  //update
                  $lid = $addressrs->fetch_assoc();
                //   $l = $lid["location_id"];
                  $ucity = Database::search("SELECT * FROM `location` WHERE `user_email`='".$_SESSION["u"]["email"]."'");
                  $newl = $ucity->fetch_assoc();
                  $id=$newl["id"];
                //   $c = $newl["city_id"];
                //   $d=$newl["district_id"];
                //   $p = $newl["province_id"];

                  $city = Database::search("SELECT * FROM `city` WHERE `name` = '".$city."'");
                  $cf = $city->fetch_assoc();
                  $cid = $cf["id"];

                  $dis = Database::search("SELECT * FROM `district` WHERE `name` = '".$district."'");
                  $df = $dis->fetch_assoc();
                  $did = $df["id"];

                  $pro = Database::search("SELECT * FROM `province` WHERE `name` = '".$province."'");
                  $pf = $pro->fetch_assoc();
                  $pid = $pf["id"];
                //   $ucity = Database::search("SELECT city.id AS city_id FROM city 
                //   INNER JOIN district ON district.id=city.district_id
                //    INNER JOIN province ON province.id=district.province_id 
                //    WHERE city.id='" . $city . "' AND district.id='" . $district . "' AND province.id='" . $province . "'");
                  if ($ucity->num_rows == 1) {
                    //   $unr = $ucity->fetch_assoc();
      
                      Database::iud("UPDATE `user_has_address` SET `line1`='" . $line1 . "',`line2`='" . $line2 . "' WHERE `user_has_address`.`user_email`='" . $_SESSION["u"]["email"] . "'");
                      Database::iud("UPDATE `location` SET `city_id`='" .$cid . "', `province_id`='".$pid."',`district_id`='".$did."' WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
      
                      echo " || Address Successfuly updated";
                    } else {
                        echo " || Invalid Address , Please Try Again";
                    }

        } else {

            $city = Database::search("SELECT * FROM `city` WHERE `name` = '".$city."'");
                  $cf = $city->fetch_assoc();
                  $cid = $cf["id"];

                  $dis = Database::search("SELECT * FROM `district` WHERE `name` = '".$district."'");
                  $df = $dis->fetch_assoc();
                  $did = $df["id"];

                  $pro = Database::search("SELECT * FROM `province` WHERE `name` = '".$province."'");
                  $pf = $pro->fetch_assoc();
                  $pid = $pf["id"];

                  if(!empty($cid)){
                    if(!empty($did)){
                        if(!empty($pid)){
                      
                            $newl = Database::iud("INSERT INTO `location`(`city_id`,`province_id`,`district_id`,`user_email`) VALUES('".$cid."','".$pid."','".$did."','".$_SESSION["u"]["email"]."')");
                            
                            Database::iud("INSERT INTO `user_has_address` (`user_email`,`line1`,`line2`) VALUES 
                            ('" . $_SESSION["u"]["email"] . "','" . $line1 . "','" . $line2 . "')  ");
                        }else{
                           
                        }
                    }
                  }else{
                    echo "invalid addrress";
                  }

                
$location=Database::search("SELECT * FROM `location` WHERE `city_id`='".$cid."' AND `province_id` = '".$pid."' AND `district_id`='".$did."' WHERE `user_email`='" . $_SESSION["u"]["email"] . "' ");
            // $location = Database::search("SELECT city.id AS city_id FROM city
            // INNER JOIN district ON district.id=city.district_id 
            // INNER JOIN province ON province.id=district.province_id
            // WHERE city.id='" . $city . "' AND district.id='" . $district . "' AND province.id='" . $province . "' AND
            // city.postal_code = '".$postal_code."' ");
            // if ( $location->num_rows == 1) {
                // $unr =  $location->fetch_assoc();

  

            echo "New Address Added";

        // }else{
        //     echo "Invalid Address Please Try Again";

        // }
      }
    }
}
}
        $last_email = $_SESSION["u"]["email"];

       

            if (isset($_FILES["i"])) {
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

                    $filename = "resouses//profile_img//" . uniqid() . $newimgextention;

                    move_uploaded_file($image["tmp_name"], $filename);
                    $resultProfileImg = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'  ");
                    $pror = $resultProfileImg->num_rows;
            
                    if ($pror == 1) {
            

                    Database::iud("UPDATE `profile_image` SET `code`='" . $filename . "' WHERE `user_email`='" . $_SESSION["u"]["email"] . "'  ");
                  
                    echo "Image Saved Successfully.";
                }else{
                    Database::iud("INSERT INTO `profile_image` (`code`,`user_email`) VALUES ('" . $filename . "','" . $last_email . "') ");

                }
             } 
            }

        
        // }

    }else{
        echo "invalid User";
    }   
      
echo "Profile updated successfuly";
?>
