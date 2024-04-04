<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){
    $umail = $_SESSION["u"]["email"];
    $oid = $_GET["id"];


}
?>


<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="resources/2.jpg">

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">

    <title>Beleri | Invoice</title>

</head>

<body class="mt-1" style="background-color: 3f7f7ff;">

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
                        }else{
                            ?>

                        <a href="index.php" style="font-size: 13px;text-decoration:none;color:red;">Sign In or
                            Register</a>
                        <?php
                    }?>
                        <label style="margin-left: 5px;">|</label>

                        <!-- <span class="text-start label2" onclick="signout();">Sign out</span> -->
                    </div>
                    <div class="offset-lg-4 col-12 col-lg-4 align-self-end">
                        <div class="row ">



                            <div class="dropdown col-2  col-lg-4">
                                <button class="btn btn-white dropdown-toggle" style="font-size: 15px;" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Seller
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                                    style="font-size: 15px;">
                                    <li><a class="dropdown-item" href="watchlist.php">Seller Login</a></li>
                                    <li><a class="dropdown-item" href="purchasehistory.php">Admin Login</a></li>

                                </ul>
                            </div> |
                            <div class="col-1  col-lg-1 ms-lg-3 ms-5 "><i class="bi bi-suit-heart "
                                    style="color: black;font-size: 18px;margin-right:10px;"></i></div>
                            <div class="col-1 col-lg-1 ms-lg-3 ms-5 carticon" style="height: 23px;"></div> |


                            <div class="dropdown col-2  col-lg-4">
                                <button class="btn btn-white dropdown-toggle" style="font-size: 14px;margin-right:-10px"
                                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-person"></i> Acoount
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                                    style="font-size: 15px;">
                                    <li> </li>
                                    <li><a class="dropdown-item" href="purchasehistory.php">My account</a></li>
                                    <li><a class="dropdown-item" href="messages.php">My orders</a></li>
                                    <li><a class="dropdown-item" href="#">Message <i class="bi bi-chat-dots"></i></a>
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

         

            <!-- <div class="col-12">
                <hr>
            </div> -->

            <div class="col-12 btn-toolbar justify-content-end">
                <button class="btn btn-dark me-2 shadow-none" onclick="printDiv();"><i class="bi bi-printer-fill"></i> Print</button>
                <button class="btn btn-danger me-2 shadow-none"><i class="bi bi-file-earmark-pdf-fill"></i> Save as
                    PDF</button>
            </div>

            <div class="col-12">
                <hr>
            </div>

            <div id="GFG">

                <div class="col-12">
                    <div class="row">
                        <div class="col-2 col-md-1">
                        <text class="topiclg">Be</text><text class="topiclg1">l</text><text
                            class="topiclg2">eri</text>
                            <!-- <img src="resources/logo.svg" class="img-fluid mx-auto d-block"> -->
                        </div>
                        <div class="col-6 col-md-4 offset-md-7 offset-4 text-end">
                            <h3 class=" text-decoration-underline" style="color: #769CC9;">Beleri</h3>
                            <span>324 Havelock Rd, Colombo 5, Sri Lanka</span><br>
                            <span>+94112546978</span><br>
                            <span>beleri@gmail.com</span>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <hr >
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-7 col-md-4">
                            <h6>INVOICE TO:</h6>
                            <?php 
                        $address = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`= '".$umail."'");
                        $ar = $address->fetch_assoc();

                        ?>
                            <h3><?php echo $_SESSION["u"]["fname"]." ".$_SESSION["u"]["lname"]; ?></h3>
                            <span class="fw-bold"><?php echo $ar["line1"].",". $ar["line2"];?> </span><br>
                            <span class="text-primary text-decoration-underline"><?php echo $umail;?></span>
                        </div>

                        <?php
               
               $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id`='".$oid."'");
               $in = $invoicers->num_rows;

              
                   $ir = $invoicers->fetch_assoc();
                   ?>

                        <div class="col-5 col-md-4 offset-md-4 offset-0 text-end">
                            <h3 style="color: #769CC9;">INVOICE <?php echo $ir["id"]; ?></h3>
                            <span>Date and Time of Invoice:</span>&nbsp;<span> <?php echo $ir["date"]; ?></span>
                        </div>




                    </div>
                </div>

                <div class="col-12 mt-3">
                    <table class="table">
                        <tr class="table table-light">
                            <td>#</td>
                            <td>Order id & Product</td>
                            <td>Unit Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>

                        <?php
                    
                    $subtotal = "0";

                    for($i=0;$i<$in;$i++){

                    // $ir = $invoicers->fetch_assoc();
                    $pid = $ir["product_id"];

                    $subtotal = $subtotal + $ir["total"];

                    $productrs = Database::search("SELECT * FROM `product` WHERE `id`= '".$pid."'");
                    $pr = $productrs->fetch_assoc();

                    ?>
                        <tr class="table table-light">
                            <td class=" text-white" style="background-color: #769CC9;"> <?php echo $ir["id"]; ?></td>
                            <td class="text-primary"><?php echo $ir["order_id"];?> <br>
                                <?php echo $pr["title"];?></td>
                            <td class="bg-secondary text-white text-end">Rs. <?php echo $pr["price"]?></td>
                            <td class="text-end"><?php echo $ir["qty"]; ?></td>
                            <td class=" text-white text-end" style="background-color: #769CC9;">Rs. <?php echo $ir["total"]; ?></td>
                        </tr>

<!-- 
                        <tr>
                            <td colspan="2" class="border-0"></td>
                            <td></td>
                            <td class="">SUBTOTAL</td>
                            <td class="table-light">Rs. <?php echo $subtotal; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border-0"></td>
                            <td class="border-primary"></td>
                            <td class="border-primary">Discount</td>
                            <td class="table-light border-primary">Rs.00.00</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border-0 fs-5 fw-bolder">Thank You!</td>
                            <td colspan="2" class="border-0 text-primary text-end fs-6">GRAND TOTAL</td>
                            <td class="border-0 text-primary fs-6">Rs. <?php echo $subtotal; ?></< /td>
                        </tr> -->

                        <?php
                    }
                    ?>
                      <tr>
                            <td colspan="2" class="border-0"></td>
                            <td></td>
                            <td class="">SUBTOTAL</td>
                            <td class="table-light">Rs. <?php echo $subtotal; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border-0"></td>
                            <td class="border-primary"></td>
                            <td class="border-primary">Discount</td>
                            <td class="table-light border-primary">Rs.00.00</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border-0 fs-5 fw-bolder">Thank You!</td>
                            <td colspan="2" class="border-0 text-primary text-end fs-6">GRAND TOTAL</td>
                            <td class="border-0 text-primary fs-6">Rs. <?php echo $subtotal; ?></< /td>
                        </tr>

                    </table>
                </div>

                <div class="col-12 mb-3">
                    <div class="rounded pt-1 pb-1 bgn">
                        <span class="fw-bold">&nbsp; NOTICE:</span><br>
                        <span>&nbsp; Purchased items can be return before 7 days delivery</span>
                    </div>
                </div>

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12 mb-3 text-center">
                    <label class="form-label fs-6 text-black-50">
                        Invoice was careted on a computer and is valid without Signatre and Seal
                    </label>
                </div>

            </div>

            <!-- footer -->
            <?php require "footer.php"; ?>
            <!-- footer -->

        </div>
    </div>



    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="invoice.js"></script>
</body>

</html>