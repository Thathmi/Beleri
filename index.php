<?php
session_start();

require "connection.php";

?>
<!DOCTYPE html>
<html>

<head>
    <title>Beleri | Home page</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/2.jpg" />
    <!--icon show in title-->
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
                                <button class="btn btn-white dropdown-toggle" style="font-size: 15px;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Seller
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="font-size: 15px;">
                                    <li><a class="dropdown-item" href="sellerlog.php">Seller Login</a></li>
                                    <li><a class="dropdown-item" href="adminlog.php">Admin Login</a></li>

                                </ul>
                            </div> |
                            <div class="col-1  col-lg-1 ms-lg-3 ms-5 " onclick="wish();"><i class="bi bi-suit-heart position-relative" style="color: black;font-size: 18px;margin-right:20px;">
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger " style="font-size: 11px;margin-left:25px;position:static; font-style: normal;">
                                        <div id="r">
                                            <?php
                                            if(isset($_SESSION["u"])){
                                                $w = Database::search("SELECT * FROM `watchlist` WHERE `user_email` = '" . $u["email"] . "'");
                                                $ww = $w->num_rows;
                                                echo $ww;
                                            }else{
                                                echo "0";
                                            }

                                         

                                          
                                            ?>
                                        </div>

                                    </span>
                                </i>
                            </div>
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

    <div id="wish"> </div>

    <!-- <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> You have been signed in successfully!
</div> -->


    <div class="container-fluid">

        <div class="row ">



            <div class="col-12 justify-content-center" style="z-index: 2;">
                <div class="row mb-3">
                    <div style="background-position: center;" class="col-lg-1 col-12 mt-3  offset-lg-1">
                        <text class="topiclg">Be</text><text class="topiclg1">l</text><text class="topiclg2">eri</text><br />
                    </div>

                    <!-- search -->
                    <div class="col-8 col-lg-7 mt-4 " style="margin-left: 10px;">
                        <div class="row">
                            <div class="input-group  mb-3">
                                <input type="text" class="form-control" id="search" aria-label="Text input with dropdown button">
                                <select id="basic_search_select" class="btn  dropdown-toggle border border-1 " style="color: grey; width:200px" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <option value="">Select Category</option>

                                    <?php
                                    $rs = Database::search("SELECT * FROM `category`");
                                    $n = $rs->num_rows;

                                    for ($i = 0; $i < $n; $i++) {
                                        $cat = $rs->fetch_assoc();

                                    ?>

                                        <option value="<?php echo $cat["id"]; ?>"><?php echo $cat["name"]; ?></option>

                                    <?php
                                    }
                                    ?>

                                </select>

                                <button onclick="search();" class="btn btn-outline-danger" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>



                    <!-- search -->

                    <!-- 
                    <div class="col-8 col-lg-6">
                        <div class="row">
                            <div class=" input-group input-group-lg mt-3 mb-3 ">
                                <input id="basic_search_txt" type="text" class="form-control col-lg-8"
                                    aria-label="Text input with dropdown button" />


                                <select id="basic_search_select" class="btn btn-outline-primary col-lg-4">

                                    <option value="0">select category</option> -->


                    <!-- </select>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="col-2 d-grid gap-2">
                        <button onclick="basic_search();" class="btn btn-primary mt-3 searchbtn"> Search</button>
                    </div>

                    <div class="col-2 mt-4">
                        <a class="link-secondary link1">Advanced</a>
                    </div> -->

                </div>
            </div>

            <!-- img slider and category section -->

            <div class="row" style="background-color: #F1F2F4;height:450px">
                <!-- cat -->
                <div class="col-lg-3 ">
                    <div class="mt-2 rounded" style="margin-left: 10px;">
                        <div class="card">
                            <div class="card-header" style="text-align: center;">
                                <i class="bi bi-list"></i> Categories
                            </div>
                            <div class="card-body">
                                <table class="table table-hover" style="overflow-y: scroll;">

                                    <?php
                                    $rs = Database::search("SELECT * FROM `category`");
                                    $n = $rs->num_rows;

                                    for ($i = 0; $i < $n; $i++) {
                                        $cat = $rs->fetch_assoc();

                                    ?>

                                        <tr>
                                            <th scope="row">
                                            <td value="<?php echo $cat["id"]; ?>" onclick='cat(<?php echo $cat["id"]; ?>);' style="cursor: pointer;"><?php echo $cat["name"]; ?></td>
                                            </th>
                                        </tr>

                                    <?php
                                    }
                                    ?>

                                </table>

                            </div>
                        </div>
                    </div>


                </div>
                <!-- cat -->

                <!-- img slider -->
                <div class="col-lg-9 d-none d-lg-block">


                    <div class="banner1">
                        <img class="img1" src="resources/slider images/b2.jpg" />
                        <div class="text-box text-box1">
                            <h1>I believe something very magical good book.</h1>
                            <p>You can buy the world best books at one place. All comic,learning,novel,scientific etc.
                                books are available.</p>
                        </div>
                    </div>

                    <div class="banner2">
                        <img class="img1" src="resources/slider images/b13.jpg" />
                        <div class="text-box text-box2">
                            <h1>First choice for purchase</h1>
                            <p>We have millions of products with thousands of brands all over the world. you can choose
                                the exact product in your mind .</p>
                        </div>
                    </div>

                    <div class="banner3">
                        <img class="img1" src="resources/slider images/b4.jpg" />
                        <div class="text-box text-box3">

                        </div>
                    </div>

                    <div class="banner4">
                        <img class="img1" src="resources/slider images/b12.jpg" />
                        <div class="text-box text-box4">
                            <h1>so much fun with colors.</h1>
                            <p>You can buy all the stationary,painting products and books in one place.</p>
                        </div>
                    </div>


                </div>
                <!-- img slider-->
            </div>






            <!-- product title view  -->

            <?php


            ?>



            <?php

            $resulset = Database::search("SELECT * FROM `product` WHERE  `status_id` = '1' ORDER BY `datetime_added` DESC LIMIT 16");
            ?>
            <!-- product view  -->
            <div id="table">
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

                                            $pimage = Database::search("SELECT * FROM `image` WHERE `product_id`= '" . $prod["id"] . "' ");
                                            $imgrow = $pimage->fetch_assoc();
                                            ?>
                                            <div style="height:250px;margin-left:auto;margin-right:auto;">

                                                <img src="<?php echo $imgrow["code"]; ?>" class="card-img-top cardTopImg" style="width: 99%;margin-top:10px;background-size: cover;height:100%;">
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
                                        </a>



                                        <input class="form-control" type="number" placeholder="quantity" value="1" id="qtytxt" />
                                    </div>

                                    <div class="col-3 col-lg-5" style="margin-left: 150px;margin-top:-43px">

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

                </div>

                <!-- card -->

            <?php
                                }
            ?>


            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- product view  -->
    <?php

    ?>
    </div>

    <!-- product title view over  -->



    <!-- footer -->

    <?php
    require "footer.php";
    ?>

    <!-- footer -->
    </div>
    </div>




    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="home.js"></script>

    <script>
        $(document).ready(function() {
            setInterval(function() {
                $("#r").load(window.location.href + " #r");
            }, 1500);
        });
    </script>


</body>

</html>