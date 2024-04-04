<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $id = $_GET["id"];
    $qty = $_GET["qty"];
    $umail = $_SESSION["u"]["email"];

    $array;

    $orderID = uniqid();

    $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "' ");
    $pr = $productrs->fetch_assoc();

   $cityrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $umail . "' ");
    $cn = $cityrs->num_rows;

    
    if ($cn == 1) {
        $cr = $cityrs->fetch_assoc();
      
        $address = $cr["line1"] . "," . $cr["line2"];
    

    $loid = $cr["user_email"];

    $locationrs = Database::search("SELECT * FROM `location` WHERE `user_email` = '" . $loid . "' ");
    $lr = $locationrs->fetch_assoc();

    $cid = $lr["city_id"];

    $crs = Database::search("SELECT * FROM `city` WHERE `id` = '" . $cid . "' ");
    $cidr = $crs->fetch_assoc();

    $districtid = $lr["district_id"];



    $delivery = "0";

    if ($districtid == "1") {
        $delivery = $pr["delivery_fee_colombo"];
    } else {
        $delivery = $pr["delivery_fee_other"];
    }

    $item = $pr["title"];
    $amount  = (int)$pr["price"] * (int)$qty +(int)$delivery;

    $fname = $_SESSION["u"]["fname"];
    $lname = $_SESSION["u"]["lname"];
    $mobile = $_SESSION["u"]["mobile"];
    $city = $cidr["name"];

    $array['id'] = $orderID;
    $array['item'] = $item;
    $array['amount'] =$amount ;
    $array['fname'] =$fname ;
    $array['lname'] =$lname ;
    $array['email'] =$umail ;
    $array['mobile'] =$mobile ;
    $array['address'] =$address ;
    $array['city'] =$city ;

    echo json_encode($array);

} else {
    echo "2";
}


} else {
    echo "1";
}
