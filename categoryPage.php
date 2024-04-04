<?php
session_start();

require "connection.php";

if (isset($_SESSION["cat"])) {

    $id = $_SESSION["cat"];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Beleri</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/2.jpg" />

    <link rel="stylesheet" href="home.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

</head>

<body>

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
                                <button class="btn btn-white dropdown-toggle" style="font-size: 15px;" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Seller
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                                    style="font-size: 15px;">
                                    <li><a class="dropdown-item" href="sellerlog.php">Seller Login</a></li>
                                    <li><a class="dropdown-item" href="adminlog.php">Admin Login</a></li>

                                </ul>
                            </div> |
                            <div class="col-1  col-lg-1 ms-lg-3 ms-5 " onclick="wish();"><i class="bi bi-suit-heart "
                                    style="color: black;font-size: 18px;margin-right:10px;">
                                
                                </i></div>
                            <div class="col-1 col-lg-1 ms-lg-3 ms-5 carticon" style="height: 23px;" onclick="cart();">
                            </div> |


                            <div class="dropdown col-2  col-lg-4">
                                <button class="btn btn-white dropdown-toggle" style="font-size: 14px;margin-right:-10px"
                                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-person"></i> Acoount
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                                    style="font-size: 15px;">
                                    <li> </li>
                                    <li><a class="dropdown-item" href="userProfile.php">My account</a></li>
                                    <li><a class="dropdown-item" href="purchasehistory.php">My orders</a></li>
                                    <li><a class="dropdown-item" href="messages.php">Message <i
                                                class="bi bi-chat-dots"></i></a>
                                    </li>

                                    <li><a class="dropdown-item" href="index.php">Home</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a href="signOut.php" style="color:red;text-decoration:none;font-size:15px"><i
                                                class="bi bi-person-dash"
                                                style="margin-right: 5px;margin-left:20px;color:red;"></i> Sign Out</a>
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
    <div id="wish"> </div>
    <?php
        $cmain = Database::search("SELECT * FROM `category` WHERE `id`='" . $id . "'");
        $cid = $cmain->fetch_assoc();

        $c = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $id . "'");



        ?>
    <div class="container-fluid">

        <div class="row ">

            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $cid["name"]; ?></li>
                </ol>
            </nav>

            <div class="col-12 justify-content-center" style="z-index: 2;margin-top:-10px">
                <div class="row mb-3">
                    <div style="background-position: center;" class="col-lg-1 col-12 mt-3  offset-lg-1">
                        <text class="topiclg">Be</text><text class="topiclg1">l</text><text
                            class="topiclg2">eri</text><br />
                    </div>

                    <div class="col-lg-1 " style="margin-top: 30px;margin-left: 15px;">
                        <div class="btn-group">
                            <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="bi bi-list"></i>

                            </button>
                            <ul class="dropdown-menu">
                                <table class="table table-hover" style="overflow-y: scroll;font-size:15px">

                                    <?php
                                        $rs = Database::search("SELECT * FROM `category`");
                                        $n = $rs->num_rows;

                                        for ($i = 0; $i < $n; $i++) {
                                            $cat = $rs->fetch_assoc();
                                            $cc = $cat["id"];
                                        ?>

                                    <tr>
                                        <th scope="row">
                                        <td value="<?php echo $cat["id"]; ?>" onclick='cat(<?php echo $cat["id"]; ?>);'
                                            style="cursor: pointer;"><?php echo $cat["name"]; ?></td>
                                        </th>
                                    </tr>

                                    <?php
                                        }
                                        ?>

                                </table>

                            </ul>
                        </div>
                    </div>
                    <!-- search -->
                    <div class="col-8 col-lg-7 mt-4 " style="margin-left: -30px;">
                        <div class="row">
                            <div class="input-group  mb-3">
                                <input type="text" id="search" class="form-control"
                                    placeholder="Search on <?php echo $cid["name"]; ?>"
                                    aria-label="Text input with dropdown button">


                                <button onclick='searchpage(<?php echo $id; ?>)' class="btn btn-outline-danger"
                                    type="button" id="button-addon2"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- search -->


            <!-- ///////////////////////////////////////////////////// -->
            <!-- sortings -->
            <div class="row">
                <div class="col-12 col-lg-12  my-3 rounded  border border-white  "
                    style="background-color: #F2F3F1;margin-top:10px">
                    <div class="row">
                        <div class="col-12  ms-0 ms-lg-2 fs-6">
                            <div class="row">

                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input-sm fs-6" type="radio" name="flexRadioDefault"
                                            id="n" onclick="addFilters(<?php echo $id; ?>);">
                                        <label class="form-check-label" style="font-size: small;" for="n">
                                            Newer to Oldest
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-top: -7px;">
                                        <input class="form-check-input-sm fs-6" type="radio" name="flexRadioDefault"
                                            id="o" onclick="addFilters(<?php echo $id; ?>);">
                                        <label class="form-check-label " style="font-size: small;" for="o">
                                            Oldest to Newer
                                        </label>
                                    </div>
                                </div>



                                <div class="col-2">
                                    <div class="form-check">
                                        <input class="form-check-input-sm fs-6" type="radio" name="flexRadioDefault1"
                                            id="l" onclick="addFilters(<?php echo $id; ?>);">
                                        <label class="form-check-label-sm " style="font-size: small;" for="l">
                                            Quatity Low to High
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-top: -7px;">
                                        <input class="form-check-input-sm fs-6" type="radio" name="flexRadioDefault1"
                                            id="h" onclick="addFilters(<?php echo $id; ?>);">
                                        <label class="form-check-label " style="font-size: small;" for="h">
                                            Quanity High to Low
                                        </label>
                                    </div>
                                </div>



                                <div class="col-2">
                                    <div class="form-chec">
                                        <input class="form-check-input-sm fs-6" type="radio" name="flexRadioDefault2"
                                            id="b" onclick="addFilters(<?php echo $id; ?>);">
                                        <label class="form-check-label " style="font-size: small;" for="b">
                                            Brand New
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-top: -7px; margin-left:-24px">
                                        <input class="form-check-input-sm fs-6" type="radio" name="flexRadioDefault2"
                                            id="u" onclick="addFilters(<?php echo $id; ?>);">
                                        <label class="form-check-label " style="font-size: small;" for="u">
                                            Used
                                        </label>
                                    </div>
                                </div>


                                <div class="col-2">
                                    <div class="form-chec">
                                        <input class="form-check-input-sm fs-6" type="radio" name="flexRadioDefault2"
                                            id="pl" onclick="addFilters(<?php echo $id; ?>);">
                                        <label class="form-check-label " style="font-size: small;" for="pl">
                                            Price Low to High
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-top: -7px; margin-left:-24px">
                                        <input class="form-check-input-sm fs-6" type="radio" name="flexRadioDefault2"
                                            id="ph" onclick="addFilters(<?php echo $id; ?>);">
                                        <label class="form-check-label " style="font-size: small;" for="ph">
                                            Price High to Low
                                        </label>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="btn-group">
                                        <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Select brand
                                        </button>
                                        <ul class="dropdown-menu">
                                            <?php
                                                $cd = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $id . "'");
                                                $cdn = $cd->num_rows;

                                                for ($r = 0; $r < $cdn; $r++) {
                                                    $cn = $cd->fetch_assoc();
                                                    $cb = $cn["model_has_brand_model_id"];

                                                    $z = Database::search("SELECT DISTINCT `brand_id` FROM `model_has_brand` WHERE `id` = '".$cb."'");
                                                    $zz = $z->fetch_assoc();
                                                    $az = $zz["brand_id"];
                                                    $md = Database::search("SELECT DISTINCT brand.name FROM `brand` WHERE `id` ='".$az."'");
                                                    $mdn = $md->fetch_assoc();
                                                    $br = $mdn["name"];

                                                    // $bz = Database::search("SELECT * FROM `brand` WHERE `id`='" . $br . "'");
                                                    // $bbz = $bz->fetch_assoc();
                                                    // $bbbz = $bz["name"];
                                                ?>
                                            <li onclick="option(<?php echo $br;?>)"><a class="dropdown-item" href="#"><?php echo $br;?></a></li>

                                            <?php
                                                }
                                                ?>


                                        </ul>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //////////////////////////////////////////////////////////////////// -->

            <!-- product view  -->

            <div id="table1">
                <div class="col-12">
                    <div class="row"
                        style="border-style: solid;color:silver;border-width:0px;;border-radius:5px;height:auto;margin-left:10px;margin-right:10px;background-color:rgb(233, 235, 235);">
                        <!-- <div id="mainbox"> -->
                        <div id="pdiv" class=" col-12 col-lg-12" style="margin-left: 16px;">

                            <div class="row" id="pdetails" style="margin-top:10px;margin-bottom:10px;">

                                <?php
                                    $nr = $c->num_rows;

                                    for ($y = 0; $y < $nr; $y++) {
                                        $ci = $c->fetch_assoc();
                                    ?>

                                <!-- card -->

                                <div class="card col-6 col-lg-2 mt-1 mb-1" style="width: 18rem;margin-left:6px;">
                                    <a href="<?php echo 'singleproductview.php?id=' . ($ci["id"])  ?>"
                                        style="text-decoration: none; display:block">
                                        <?php

                                                $pimage = Database::search("SELECT * FROM `image` WHERE `product_id`= '" . $ci["id"] . "' ");
                                                $imgrow = $pimage->fetch_assoc();
                                                ?>

                                        <div style="height:250px;margin-left:auto;margin-right:auto;">

                                            <img src="<?php echo $imgrow["code"]; ?>" class="card-img-top cardTopImg"
                                                style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
                                        </div>


                                        <div class="card-body mt-2">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5 class="card-title text-secondary"
                                                        style="font-size:large;font-weight:bolder">
                                                        <?php echo $ci["title"]; ?></h5>
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                            if ((int)$ci["condition_id"] == 1) { ?>
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
                                                        <?php echo $ci["description"] ?> </p>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-9 col-lg-6" style="margin-top:10px">
                                                        <span class=" card-text text-dark "
                                                            style="font-weight: bold;">Rs.
                                                            <?php echo $ci["price"]; ?></span> <br />
                                    </a>
                                    <input class="form-control" type="number" placeholder="quantity" value="1"
                                        id="qtytxt" />
                                </div>


                                <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-43px">

                                    <div class="row">

                                        <?php
                                                if ((int)$ci["qty"] != 0) {
                                                ?>

                                        <div class="col-6">

                                            <a onclick="addToCart(<?php echo $ci['id']; ?>);"
                                                class=" d-grid mt-2 carticon"></a>
                                        </div>

                                        <div class="col-6 " style="margin-top:5px">
                                            <a onclick="addtoWatchlist(<?php echo $ci['id'] ?>);" id="wishheart">
                                                <i class="bi bi-suit-heart " id="wishheart"
                                                    style="color: black;font-size:23px;margin-top:-5px;"></i></a>
                                        </div>

                                        <?php

                                                } else {
                                                ?>

                                        <div class="col-6">

                                            <a class=" d-grid mt-2 carticon"></a>
                                        </div>

                                        <div class="col-6" style="margin-top:5px">
                                            <a onclick="addtoWatchlist(<?php echo $ci['id'] ?>);">
                                                <i class="bi bi-suit-heart "
                                                    style="color: black;font-size:23px;margin-top:-5px;"></i>
                                            </a>
                                        </div>

                                        <span class="card-text text-danger fw-bold"
                                            style="font-size: small;margin-left:0;">Out of
                                            stock</span>

                                        <?php
                                                }
                                                ?>


                                    </div>


                                </div>
                            </div>
                        </div>

                        <!-- </div> -->






                    </div>

                </div>

                <!-- card -->

                <?php
                                    }
                ?>



            </div>
        </div>
    </div>

    <!-- product view  -->



    <script src="home.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</body>

</html>

<?php
}
?>