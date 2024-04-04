<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="bootstrap.css" />

</head>

<body>


    <?php

    session_start();

    $user = $_SESSION["u"];

    require "connection.php";

    $array;

    $id = $_POST["cid"];
    $age = $_POST["a"];
    $qty = $_POST["q"];
    $condition = $_POST["c"];
    $price = $_POST["p"];


    if (!empty($age)&& !empty($condition)) {
        if ($age == 1 && $condition == 1) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' AND `condition_id` ='1' ORDER BY `datetime_added`  DESC  ");

            $pnage = $resulset->num_rows;

    ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




        <?php

        } else  if ($age == 2 && $condition==2) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' AND `condition_id` ='2' ORDER BY `datetime_added`  ASC");

            $pnage = $resulset->num_rows;

        ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




    <?php

        }
        else  if ($age == 1 && $condition==2) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' AND `condition_id` ='2' ORDER BY `datetime_added`  DESC");

            $pnage = $resulset->num_rows;

        ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




    <?php

        }
        else  if ($age == 2 && $condition==1) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' AND `condition_id` ='1' ORDER BY `datetime_added`  ASC");

            $pnage = $resulset->num_rows;

        ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




    <?php

        }
    }
    else if (!empty($qty)&& !empty($condition)) {
        if ($qty == 1 && $condition == 1) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' AND `condition_id` ='1' ORDER BY `qty`  ASC  ");

            $pnage = $resulset->num_rows;

    ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




        <?php

        } else  if ($qty == 2 && $condition==2) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' AND `condition_id` ='2' ORDER BY `qty`  ASC");

            $pnage = $resulset->num_rows;

        ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




    <?php

        }
        else  if ($qty == 1 && $condition==2) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' AND `condition_id` ='2' ORDER BY `qty`  DESC");

            $pnage = $resulset->num_rows;

        ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




    <?php

        }
        else  if ($qty == 2 && $condition==1) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' AND `condition_id` ='1' ORDER BY `qty`  DESC");

            $pnage = $resulset->num_rows;

        ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




    <?php

        }
    }

    // 

    else if (!empty($price)&& !empty($condition)) {
        if ($price == 1 && $condition == 1) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' AND `condition_id` ='1' ORDER BY `price`  ASC  ");

            $pnage = $resulset->num_rows;

    ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




        <?php

        } else  if ($price == 2 && $condition==2) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' AND `condition_id` ='2' ORDER BY `price`  ASC");

            $pnage = $resulset->num_rows;

        ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




    <?php

        }
        else  if ($price == 1 && $condition==2) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' AND `condition_id` ='2' ORDER BY `price`  DESC");

            $pnage = $resulset->num_rows;

        ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




    <?php

        }
        else  if ($price == 2 && $condition==1) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' AND `condition_id` ='1' ORDER BY `price`  DESC");

            $pnage = $resulset->num_rows;

        ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




    <?php

        }
    }





   else if (!empty($age)) {
        if ($age == 1) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' ORDER BY `datetime_added`  DESC");

            $pnage = $resulset->num_rows;

    ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




        <?php

        } else  if ($age == 2) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' ORDER BY `datetime_added`  ASC");

            $pnage = $resulset->num_rows;

        ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




    <?php

        }
    } else if (!empty($qty)) {

        if ($qty == 1) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' ORDER BY `qty`  ASC");

            $pnage = $resulset->num_rows;

    ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




        <?php

        } else  if ($qty == 2) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' ORDER BY `qty`  DESC");

            $pnage = $resulset->num_rows;

        ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




    <?php

        }
    } else if (!empty($condition)) {

        if ($condition == 1) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' AND `condition_id`='1' ");

            $pnage = $resulset->num_rows;

    ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




        <?php

        } else  if ($condition == 2) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' AND `condition_id`='2' ");

            $pnage = $resulset->num_rows;

        ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




    <?php

        }
    }else if (!empty($price)) {

        if ($price == 1) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' ORDER BY `price` ASC ");

            $pnage = $resulset->num_rows;

    ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




        <?php

        } else  if ($price == 2) {

            $resulset = Database::search("SELECT * FROM `product` WHERE `category_id` ='" . $id . "' ORDER BY `price` DESC ");

            $pnage = $resulset->num_rows;

        ?>

            <!-- ////////////////// -->

            <div class="col-12">
                <div class="row" style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                    <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">
                        <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                            <?php
                            $nr = $resulset->num_rows;

                            for ($y = 0; $y < $nr; $y++) {
                                $prod = $resulset->fetch_assoc();
                            ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($prod["id"])  ?>" style="text-decoration: none; display:block">
                                        <?php
                                        $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $prod["id"] . "'");
                                        $aimg = $productimg->fetch_assoc();

                                        ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $aimg["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary" style="font-size:large;font-weight:bolder">
                                                        <?php echo $prod["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    if ((int)$prod["condition_id"] == 1) { ?>
                                                        <span class="badge bg-info">New</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="badge bg-warning">Used</span>
                                                    <?php
                                                    } ?>


                                                </div>
                                            </div>
                                            <div class="row" style="height: 55px;">
                                                <div class="col-md-12 ">
                                                    <p style="font-size:12px;color:rgb(134, 134, 134);">
                                                        <?php echo $prod["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark " style="font-weight: bold;">Rs.
                                                            <?php echo $prod["price"]; ?></span> <br />
                                                    </div>

                                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-33px">

                                                        <div class="row">

                                                            <?php
                                                            if ((int)$prod["qty"] != 0) {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a onclick="addToCart(<?php echo $prod['id']; ?>);" class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6 " style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);" id="wishheart">
                                                                        <i class="bi bi-suit-heart " id="wishheart" style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                            <?php

                                                            } else {
                                                            ?>

                                                                <div class="col-6">

                                                                    <a class=" d-grid mt-2 carticon"></a>
                                                                </div>

                                                                <div class="col-6" style="margin-top:5px">
                                                                    <a onclick="addtoWatchlist(<?php echo $prod['id'] ?>);">
                                                                        <i class="bi bi-suit-heart " style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                                                </div>

                                                                <span class="card-text text-danger fw-bold" style="font-size: small;margin-left:0;">Out of
                                                                    stock</span>

                                                            <?php
                                                            }
                                                            ?>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>








                                        </div>
                                    </a>
                                </div>

                                <!-- card -->

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>


            <!-- ////////////////// -->




    <?php

        }
    }
  
    ?>
  

</body>

</html>