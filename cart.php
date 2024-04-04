<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $umail = $_SESSION["u"]["email"];

    $total = "0";
    $subtotal = "0";
    $shipping = "0";

?>

<!DOCTYPE html>
<html>

<head>
    <title>Beleri | Cart</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="resources/2.jpg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
</head>

<body >
<div class="container-fluid">
            <div class="row" style="background-color: #F2F3F1	;">

                <!--header design-->
                <div class="col-12">
                    <div class="row mt-2 mb-1">
                        <div class="offset-lg-0 col-12 col-lg-4 align-self-start">
                            <text class="topic">Be</text><text class="topic1">l</text><text class="topic2">eri</text>
                            <label style="margin-left: 5px;margin-right:5px;">|</label>
                            <span class="text-start label1"><b>Welcome</b></span>
                            <?php
                            if (isset($_SESSION["u"])) {

                                $u = $_SESSION["u"];
                                echo $u["fname"];
                            } else {
                            ?>

                                <a href="log.php" style="font-size: 13px;text-decoration:none;color:red;">Sign In or
                                    Register</a>
                            <?php
                            } ?>
                            <label style="margin-left: 5px;">|</label>

                            <!-- <span class="text-start label2" onclick="signout();">Sign out</span> -->
                        </div>
                        <div class="offset-lg-4 col-12 col-lg-4 align-self-end">
                            <div class="row ">



                                <div class="dropdown col-2  col-lg-4">
                                    <button class="btn btn-white dropdown-toggle" style="font-size: 15px;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Seller
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="font-size: 15px;">
                                        <li><a class="dropdown-item" href="sellerlog.php">Seller Login</a></li>
                                        <li><a class="dropdown-item" href="adminlog.php">Admin Login</a></li>

                                    </ul>
                                </div> |
                                <div class="col-1  col-lg-1 ms-lg-3 ms-5 " onclick="wish();"><i class="bi bi-suit-heart " style="color: black;font-size: 18px;margin-right:10px;">
                            
                            </i></div>
                                <div class="col-1 col-lg-1 ms-lg-3 ms-5 carticon" style="height: 23px;" onclick="cart();">
                                </div> |


                                <div class="dropdown col-2  col-lg-4">
                                    <button class="btn btn-white dropdown-toggle" style="font-size: 14px;margin-right:-10px" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person"></i> Acoount
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="font-size: 15px;">
                                        <li> </li>
                                        <li><a class="dropdown-item" href="userProfile.php">My account</a></li>
                                        <li><a class="dropdown-item" href="purchasehistory.php">My orders</a></li>
                                        <li><a class="dropdown-item" href="messages.php">Message <i class="bi bi-chat-dots"></i></a>
                                        </li>

                                        <li><a class="dropdown-item" href="index.php">Home</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a href="signOut.php" style="color:red;text-decoration:none;font-size:15px"><i class="bi bi-person-dash" style="margin-right: 5px;margin-left:20px;color:red;"></i> Sign Out</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header design over-->
            </div>
        </div>
    <div class="container-fluid">
        <div class="row">
        <div id="wish" > </div>
          
        

            <div class="col-12" style="background-color: #e3e5e4;">

                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </nav>

            </div>

            <div class="col-12 border border-2 border-secondary rounded mb-3">
                <div class="row">

                    <div class="col-12">
                        <label class="form-label fs-2 fw-bolder">Shopping Cart <i class="bi bi-cart3"></i></label>
                    </div>
                    

                    <div class="col-12">
                        <div class="row">
                            <div class="offset-0 offset-lg-2 col-12 col-lg-6 mb-2">
                                <input type="text" class="form-control " placeholder="Search in shopping cart" />

                            </div>
                            <div class="col-12 col-lg-2 d-grid mb-2">
                                <button class="btn btn-outline-primary">Search</button>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <hr class="hrbreak1">
                    </div>

                    <?php

                        $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $umail . "'");
                        $cn = $cartrs->num_rows;

                        if ($cn == 0) {

                        ?>

                    <div class="col-12">
                        <div class="row">
                            <div class="emptycart col-12"></div>
                            <div class="col-12 text-center">
                                <label class="form-label fs-2 fw-bold">You have no item in the cart</label>
                            </div>
                            <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid mb-4">
                                <a href="index.php" class="btn btn-primary btn-sm fs-5 ">Start Shopping</a>
                            </div>
                        </div>
                    </div>

                    <?php

                        } else {

                        ?>

                    <div class="col-12 col-lg-9">
                        <div class="row">

                            <?php

                                    for ($i = 0; $i < $cn; $i++) {
                                        $cr = $cartrs->fetch_assoc();

                                        $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cr["product_id"] . "'");
                                        $pr = $productrs->fetch_assoc();
                                        $brand = $pr["model_has_brand_model_id"];

                                        $brs = Database::search("SELECT * FROM `model_has_brand` WHERE `id`='" .$brand . "'");
                                        $br = $brs->fetch_assoc();
                                        $bid = $br["brand_id"];

                                        $bs = Database::search("SELECT * FROM `brand` WHERE `id`='" .$bid . "'");
                                        $bb = $bs->fetch_assoc();

                                        // $total = $total + ($pr["price"]);

                                        $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $umail . "'");
                                        $ar = $addressrs->fetch_assoc();
                                        $cityid = $ar["id"];

                                        $districtrs = Database::search("SELECT * FROM `city` WHERE `id`='" . $cityid . "'");
                                        $xr = $districtrs->fetch_assoc();
                                        $districtid = $xr["id"];

                                        $ship = "0";

                                        if ($districtid == "1") {
                                            $ship = $pr["delivery_fee_colombo"];

                                            $shipping = $shipping + $pr["delivery_fee_colombo"];
                                        } else {
                                            $ship = $pr["delivery_fee_other"];

                                            $shipping = $shipping + $pr["delivery_fee_other"];
                                        }

                                        //echo $total;
                                        //echo $shipping;

                                        $sellerrs = Database::search("SELECT * FROM `seller` WHERE `email`='" . $pr["seller_email"] . "'");
                                        $sn = $sellerrs->fetch_assoc();

                                    ?>

                            <!-- card -->

                            <div class="card mb-3 mx-0 mx-lg-2 col-12">
                                <div class="row g-0">

                                    <div class="col-md-12 mt-2 mb-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="fw-bold text-black-50 fs-6">Seller : </span>&nbsp;
                                                <span
                                                    class="fw-bold text-black fs-6"><?php echo $sn["fname"] . " " . $sn["lname"]; ?></span>&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="col-md-4">

                                        <?php

                                                    $imagers = Database::search("SELECT * FROM `image` WHERE `product_id` = '" . $pr["id"] . "'");
                                                    $in = $imagers->num_rows;

                                                    $arr;

                                                    for ($x = 0; $x < $in; $x++) {
                                                        $ir = $imagers->fetch_assoc();
                                                        $arr[$x] = $ir["code"];
                                                    }

                                                    ?>

                                        <img src="<?php echo $arr[0]; ?>" class="img-fluid rounded-start"
                                            onmouseover="deletemodal(<?php echo $pr['id']; ?>);" onmouseout="remove();">
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card-body">
                                            <h3 class="card-title fw-bold"><?php echo $pr["title"]; ?></h3>

                                            <?php

                                                        $color = Database::search("SELECT `name` FROM `color` WHERE `id` = '" . $pr["color_id"] . "'");
                                                        $clr = $color->fetch_assoc();

                                                        ?>

                                            <span class="fw-bold text-black-50">Color :
                                                <?php echo $clr["name"]; ?></span>&nbsp;|

                                            <?php

                                                        $con = Database::search("SELECT `name` FROM `condition` WHERE `id` = '" . $pr["condition_id"] . "'");
                                                        $conid = $con->fetch_assoc();

                                         

                                                        ?>
                                            &nbsp; <span class="fw-bold text-black-50">Condition :
                                                <?php echo $conid["name"]; ?></span><br />
                                            <span class="fw-bold text-black-50 ">Price : </span>&nbsp;
                                            <span class="fw-bolder text-black">Rs. <?php echo $pr["price"]; ?> .00
                                            </span>
                                            <br />
                                            <span class="fw-bold text-black-50 ">quantity :</span>&nbsp;
                                            <span 
                                                class="mt-3 fs-5 px-3  cardqtytext" id="qtyinput"><?php echo $cr["qty"]; ?></span>
                                            <br />
                                            <span class="fw-bold text-black-50 ">Delivery fee :</span>&nbsp;
                                            <span class="fw-bolder text-black"><?php echo $ship; ?></span>

                                        </div>
                                        <?php 
                                        
                                        $total = $total + ($pr["price"] * $cr["qty"]);
                                        //    $total1="0";
                                        //    $total1 = $pr["price"]+$ship;
                                        //    $total= $total+$pr["price"];

// if(isset($_GET["q"])){
                                                            
//     $q = (int)$_GET["q"];

//     $total1= $total1*$q;

//     $total = $total*$q;
// }
                                        ?>
                                    </div>
                                    <div class="col-md-3 mt-4">
                                        <div class="card-body d-grid">
                                            <a href="#" class="btn btn-outline-success mb-2" id="payhere-payment" onclick="paynow(<?php echo $pr['id'];?>);">Buy now</a>
                                            <a class="btn btn-outline-danger mb-2"
                                                onclick="deletefromCart(<?php echo $cr['id']; ?>);">Remove</a>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="col-md-12 mt-1 mb-3">
                                        <div class="row">
                                            <div class="col-6 col-md-6">
                                                <span class="fw-bold fs-6 text-black-50">Requested Total :<i
                                                        class="bi bi-info-circle"></i></span>
                                            </div>

                                            <div class="col-6 col-md-6 text-end">
                                                <span class="fw-bold fs-6 text-black-50">Rs.
                                                    <?php echo $total?> .00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- card -->
                            </div>
<!-- modal -->
                            <!-- <div class="modal modal-dialog-centered" id="deleteModal<?php echo $productImage['id'] ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Modal body text goes here.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
<!-- modal -->

             <!-- Modal -->
             <div class="modal fade" id="deleteModal<?php echo $pr["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold text-dark" id="exampleModalLabel"><?php echo $pr["title"]; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                       
                                                        <div class="modal-body">
                                                        <img src="<?php echo $arr[0]; ?>" style="height: 120px;width:auto" class="img-fluid "/>
                                                        <h6 style="font-size: smaller;color:gray;">about the product :</h6>
                                                        <?php echo $pr["description"]; ?><br/>
                                                        <h6 style="font-size: smaller;color:gray;" class="mt-1">Brand :</h6>

                                                        <?php echo $bb["name"]; ?>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button> -->
                                                            <!-- <button type="button" class="btn btn-primary" onclick="deleteProduct(<?php echo $productImage['id'] ?>);">Yes</button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- modal -->
                            <?php

                                    }

                                    ?>

                        </div>
                    </div>

                    <div class="col-12 col-lg-3">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label fs-4 fw-bold ">Summery</label>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-6">
                                <span class="fs-6 fw-bold">Items (<?php echo $cn; ?>)</span>
                            </div>

                            <div class="col-6 text-end">
                                <span class="fs-6 fw-bold">Rs. <?php echo $total; ?> .00</span>
                            </div>

                            <div class="col-6 mt-1">
                                <span class="fs-6 fw-bold">Shipping </span>
                            </div>

                            <div class="col-6 text-end mt-1">
                                <span class="fs-6 fw-bold">Rs. <?php echo $shipping; ?> .00</span>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>

                            <div class="col-6 mt-1">
                                <span class="fs-5 fw-bold">Total </span>
                            </div>

                            <div class="col-6 text-end mt-1">
                                <span class="fs-5 fw-bold">Rs. <?php echo $total + $shipping; ?> .00</span>
                            </div>

                            <div class="col-12 mt-3 mb-3 d-grid">
                                <button class="btn btn-primary fs-6 btn-sm fw-bold" id="payhere-payment" onclick="checkout(<?php echo $total + $shipping; ?>);">CHECKOUT</button>
                            </div>

                        </div>
                    </div>

                    <?php

                        }

                        ?>

                </div>

            </div>




            <?php
                require "footer.php";
                ?>

        </div>

    </div>

    <script src="cart.js"></script>
    <script src="payment.js"></script>
    <script src="home.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="bootstrap.bundle.js"></script>
    
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
</body>

</html>

<?php
}

?>