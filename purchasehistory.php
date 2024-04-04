<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $mail = $_SESSION["u"]["email"];

    $invoicers = Database::search("SELECT * FROM `invoice` WHERE `user_email` = '" . $mail . "' ORDER BY `date` DESC");
    $in = $invoicers->num_rows;

?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>Beleri | Transaction History</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

       
        <link rel="icon" href="resources/2.jpg">

        <link rel="stylesheet" href="bootstrap.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <link rel="stylesheet" href="style.css">

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
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger " style="font-size: 11px;margin-left:25px;position:static; font-style: normal;">
                                        <div id="r">
                                            <?php

                                            $w = Database::search("SELECT * FROM `watchlist` WHERE `user_email` = '" . $u["email"] . "'");
                                            $ww = $w->num_rows;

                                            echo $ww;
                                            ?>
                                        </div>

                                    </span>
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

              

                <div class="col-12 text-center mb-3">
                    <span class="fs-1 fw-bold text-danger">Transaction History</span>
                </div>

                <?php

                if ($in == 0) {
                ?>
                    <div class="col-12 text-center bg-light">
                        <div style="height: 450px;"><img height="400px" src="svg/emptytransaction.svg"></div>
                        <span class="fs-1 fw-bold text-primary fst-italic">You have't didn't make any payment yet</span>
                    </div>
                <?php
                } else {
                ?>



                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 d-none d-lg-block">
                                <div class="row">

                                    <div class="col-1">
                                        <label class="form-label  fw-bold" style="color: #769CC9;">#</label>
                                    </div>

                                    <div class="col-4">
                                        <label class="form-label fw-bold" style="color: #769CC9;">Order details</label>
                                    </div>

                                    <div class="col-1 text-end">
                                        <label class="form-label fw-bold" style="color: #769CC9;">Quanity</label>
                                    </div>

                                    <div class="col-1 text-end">
                                        <label class="form-label fw-bold" style="color: #769CC9;">Amount</label>
                                    </div>

                                    <div class="col-2 text-end">
                                        <label class="form-label w-bold" style="color: #769CC9;">Purchase Date & Time</label>
                                    </div>

                                    <div class="col-4 bg-light"></div>

                                    <div class="col-12">
                                        <hr class="border border-2 border-primary">
                                    </div>

                                </div>
                            </div>

                            <?php

                            for ($i = 0; $i < $in; $i++) {
                                $ir = $invoicers->fetch_assoc();
                            ?>



                                <div class="col-12">
                                    <div class="row g-2">
                                        <div class="col-12 col-lg-1 " style="background-color: #769CC9;">
                                            <label class="form-label text-white fs-6 pt-5 pb-5"><?php echo $ir["order_id"] ?></label>
                                        </div>
                                        <div class="col-12 col-lg-4" style="background-color: #f5f5f5;">
                                            <div class="row ms-lg-2 justify-content-center align-content-center">
                                                <div class="card mb-3" style="max-width: 540px;">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <?php
                                                            $pid = $ir["product_id"];
                                                            $imagers = Database::search("SELECT * FROM `image` WHERE `product_id` = '" . $pid . "';");
                                                            $codeimg = $imagers->fetch_assoc();

                                                            ?>
                                                            <img src="<?php echo $codeimg["code"] ?>" class="img-fluid rounded-start">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <?php
                                                                $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "' ");
                                                                $product = $productrs->fetch_assoc();

                                                                ?>
                                                                <h5 class="card-title"><?php echo $product["title"] ?></h5>
                                                                <?php
                                                                $semail = $product["seller_email"];
                                                                $sellers = Database::search("SELECT * FROM `seller` WHERE `email` = '" . $semail . "';");
                                                                $seller = $sellers->fetch_assoc();

                                                                ?>
                                                                <p class="card-text" style="font-size: 15px;"><b>Seller :</b> <?php echo $seller["fname"] . " " . $seller["lname"] ?></p>
                                                                <p class="card-text" style="font-size: 15px;"><b>Price :</b> Rs. <?php echo $product["price"] ?>.00 + dilivery fee</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-1 text-start text-lg-center" style="background-color: #f5f5f5;">
                                            <label class="form-label fs-6 pt-5"><?php echo $ir["qty"] ?></label>
                                        </div>
                                       
                                        <div class="col-12 col-lg-1 text-start text-lg-center " style="background-color: #769CC9;">
                                            <label class="form-label text-white fs-6 pc-3 py-5">Rs. <?php echo $ir["total"] ?>.00</label>
                                        </div>

                                        <div class="col-12 col-lg-2 text-start text-lg-center" style="background-color: #f5f5f5;">
                                            <label class="form-label fs-6 pc-3 py-5"><?php echo $ir["date"] ?></label>
                                        </div>

                                        <div class="col-12 col-lg-3" style="background-color: #f5f5f5;">
                                            <div class="row">
                                                <div class="col-6 d-grid">
                                                    <button class="btn mt-5 btn-outline-success btn-sm fs-6" onclick="addFeedback(<?php echo $product['id'] ?>);"><i class='bx bx-info-circle bx-flashing' style='color:#2c44bb'></i>Feedback</button>
                                                </div>
                                                <!-- <div class="col-6 d-grid"> -->
                                                    <!-- <button class="btn mt-5 btn-outline-primary fs-5"><i class='bx bx-trash bx-flashing' style='color:#2c44bb'></i>Delete</button> -->
                                                <!-- </div> -->
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr class="border border-2 border-primary">
                                        </div>

                                        <!-- Modal -->
                                    <div class="modal fade" id="feedbackmodal<?php echo $pid ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $product["title"] ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <textarea id="feedtxt" cols="30" rows="10" class="form-control fs-5"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" onclick="savefeedback(<?php echo $product['id'] ?>);">Send Feedback</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }

                                    ?>

                                    <!-- <div class="col-12 mb-3">
                                        <div class="row">
                                            <div class="col-lg-9 d-none d-lg-block"></div>
                                            <div class="col-12 col-lg-3 d-grid">
                                                <button class="btn btn-outline-danger fs-4"><i class='bx bx-trash bx-flashing'></i>Clear all records</button>
                                            </div>
                                        </div>
                                    </div> -->

                                    

                                    </div>
                                </div>

                        </div>
                    </div>
                <?php
                }

                ?>
                <div class="col-12">
                    <?php require "footer.php" ?>
                </div>

            </div>
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
       
        <script src="bootstrap.min.js"></script>
        <script src="bootstrap.bundle.js"></script>
     
    </body>

    </html>
<?php

}

?>