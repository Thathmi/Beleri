<?php

session_start();

require "connection.php";

if(isset($_SESSION["u"])){

    $id = $_GET["id"];
    $qtytxt = $_GET["txt"];
    $umail = $_SESSION["u"]["email"];

   
    if($qtytxt == 0){
        echo "Please add a Quantity.";
    }else{
        $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email`='".$umail."' AND `product_id`='".$id."'");
        $cn = $cartrs->num_rows;
    
        if($cn == 1){
            echo "This Product is already exists in your Cart.";
        }else{

            $productrs = Database::search("SELECT `qty` FROM `product` WHERE `id`='".$id."'");
            $pr = $productrs->fetch_assoc();

         

                Database::iud("INSERT INTO `cart` (`user_email`,`product_id`,`qty`) VALUES ('".$umail."','".$id."','".$qtytxt."')");
                echo "success";

            
           
        
    }
    

}
}

?>
