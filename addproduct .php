<?php
session_start();
require "connection.php";
?>

<!DOCTYPE html>

<html>

<head>

    <title>Beleri | Product Registration</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="addproduct.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="resources/2.jpg" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body style="background-color: #B6D1DB	 ;">

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
                        if (isset($_SESSION["s"])) {

                            $u = $_SESSION["s"];
                            echo $u["fname"];
                        } else {
                        ?>

                            <a href="index.php" style="font-size: 13px;text-decoration:none;color:red;">Sign In or
                                Register as a seller</a>
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
                                    <li><a class="dropdown-item" href="index.php">User Login</a></li>
                                    <li><a class="dropdown-item" href="purchasehistory.php">Admin Login</a></li>

                                </ul>
                            </div> |
                            <div class="col-1  col-lg-1 ms-lg-3 ms-5 " onclick="mssgseller();"><i class="bi bi-envelope" style="color: black;font-size: 18px;margin-right:10px;"></i></div>
                            <!-- <div class="col-1 col-lg-1 ms-lg-3 ms-5 carticon" style="height: 23px;"></div>  -->


                            <div class="dropdown col-2  col-lg-4" style="margin-left: 10px;">|
                                <button class="btn btn-white dropdown-toggle" style="font-size: 14px;margin-right:-10px" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person"></i> Acoount
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="font-size: 15px;">
                                    <li> </li>
                                    <li><a class="dropdown-item" href="sellerProfile.php">My account</a></li>
                                    <li><a class="dropdown-item" href="sellerproductview.php">My products</a></li>
                                    <li><a class="dropdown-item" href="addproduct%20.php">New product</a>
                                    <li><a class="dropdown-item" href="sellinghistory.php">Selling History</a>

                                    </li>

                                    <li><a class="dropdown-item" href="sellerhomepage.php">Home</a></li>
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


    <div class="container-fluid col-md-11 border border-white rounded bg-light mt-5">
        <div class="row gy-3">

            <!-- ADD -->

            <!-- header -->

            <div id="addproductbox">


                <div class="col-12 mb-2 mt-4" style="background-color: #f0ffff;">
                    <h2 class="h1 text-center " style="color: #769CC9;">Register Product </h2>
                </div>
                <!-- header -->
                <hr>
                <!-- category,brand,model -->
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Category</label>
                                </div>
                                <div class="col-12">
                                    <select class="form-select" id="ca">

                                        <option>Select Product Category</option>

                                        <?php
                                        $r = Database::search("SELECT * FROM `category`");
                                        $n = $r->num_rows;
                                        for ($x = 0; $x < $n; $x++) {
                                            $d = $r->fetch_assoc();
                                        ?>
                                            <option><?php echo $d["name"]; ?></option>

                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Brand</label>
                                </div>
                                <div class="col-12">
                                    <select class="form-select" id="br">

                                        <option>Select Product Brand</option>

                                        <?php
                                        $r = Database::search("SELECT * FROM `brand`");
                                        $n = $r->num_rows;
                                        for ($x = 0; $x < $n; $x++) {
                                            $d = $r->fetch_assoc();
                                        ?>
                                            <option><?php echo $d["name"]; ?></option>

                                        <?php
                                        }
                                        ?>


                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Model</label>
                                </div>
                                <div class="col-12">
                                    <select class="form-select" id="mo">

                                        <option>Select Product Model</option>

                                        <?php
                                        $r = Database::search("SELECT * FROM `model`");
                                        $n = $r->num_rows;
                                        for ($x = 0; $x < $n; $x++) {
                                            $d = $r->fetch_assoc();
                                        ?>
                                            <option><?php echo $d["name"]; ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- category,brand,model -->

                <!-- title -->

                <hr class="hrbreak1" />

                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label lbl1">Add a Title to your Product</label>
                        </div>
                        <div class="offset-lg-2 col-12 col-lg-8">
                            <input type="text" class="form-control" id="ti" />
                        </div>
                    </div>
                </div>

                <!-- title -->

                <hr class="hrbreak1" />

                <!-- condition,color,qty -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Condition</label>
                                </div>
                                <div class="offset-lg-1 col-6 col-lg-3 ms-5 form-check">
                                    <input class="form-check-input" type="radio" id="bn" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="bn">
                                        Brandnew
                                    </label>
                                </div>
                                <div class="offset-lg-1 col-6 col-lg-3 ms-5 form-check">
                                    <input class="form-check-input" type="radio" id="us" name="flexRadioDefault" id="flexRadioDefault2">
                                    <label class="form-check-label" for="us">
                                        Used
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Colour</label>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr1" checked>
                                            <label class="form-check-label" for="clr1">
                                                Gold
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr2">
                                            <label class="form-check-label" for="clr2">
                                                Silver
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr3">
                                            <label class="form-check-label" for="clr3">
                                                Graphite
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr4">
                                            <label class="form-check-label" for="clr4">
                                                Pacific Blue
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr5">
                                            <label class="form-check-label" for="clr5">
                                                Black
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5+ col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr6">
                                            <label class="form-check-label" for="clr6">
                                                Rose Gold
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5+ col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr6">
                                            <label class="form-check-label" for="clr7">
                                                White
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5+ col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr6">
                                            <label class="form-check-label" for="clr8">
                                                Red
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5+ col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr6">
                                            <label class="form-check-label" for="clr9">
                                                Pink
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5+ col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr6">
                                            <label class="form-check-label" for="clr10">
                                                Blue
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5+ col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr6">
                                            <label class="form-check-label" for="clr11">
                                                Other
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-0 col-5+ col-lg-4 form-check">
                                            <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr6">
                                            <label class="form-check-label" style="font-size:small;" for="clr12">
                                                No specific color
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Add Product Quantity</label>
                                    <input class="form-control" type="number" value="0" min="0" id="qty" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- condition,color,qty -->

                <hr class="hrbreak1" />

                <!-- cost,payment method -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Cost Per Item</label>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="cost">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Approved Payment Methods</label>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="offset-2 col-2 pm pm1"><img src="resources/payment method images/american_express_img.png" alt=""></div>
                                        <div class="col-2 pm pm2"><img src="resources/payment method images/mastercard_img.png" alt=""></div>
                                        <div class="col-2 pm pm3"><img src="resources/payment method images/paypal_img.png" alt=""></div>
                                        <div class="col-2 pm pm4"><img src="resources/payment method images/visa_img.png" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- cost,payment method -->

                <hr class="hrbreak1" />

                <!-- delivery cost -->
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1">Delivery Costs</label>
                            </div>
                            <div class="offset-lg-1 col-12 col-lg-3">
                                <label class="form-label">Delivery cost within Colombo</label>
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="dwc">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label lbl1"></label>
                            </div>
                            <div class="offset-lg-1 col-12 col-lg-3 mt-3">
                                <label class="form-label">Delivery cost out of Colombo</label>
                            </div>
                            <div class="col-12 col-lg-7 mt-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="doc">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- delivery cost -->

                <hr class="hrbreak1" />


                <!--description-->

                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label lbl1">Product Description</label>
                        </div>
                        <div class="col-12">
                            <textarea cols="100" rows="15" class="form-control" id="desc" style="background-color:rgb(236, 235, 235) ;"></textarea>
                        </div>
                    </div>
                </div>

                <!--description-->

                <hr class="hrbreak1" />

                <!-- product image -->

                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label lbl1">Add Product Image</label>
                        </div>

                        <img class="col-4 col-lg-2 productimg" src="resources/addproductimg.svg" img-thumbnail id="prev" />
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-12 col-6 ms-4 mt-2">
                                    <div class="col-12 col-lg-6">
                                        <input class="d-none" type="file" accept="img/*" id="imguploader" />
                                        <div class="row">
                                            <label class="col-4 col-lg-4 mt-2 ms-3 btn btn-primary" for="imguploader" onclick="clickimg();">Upload</label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-6 col-lg-4 d-grid mt-2 ">
                                    <button class="btn btn-primary">Upload</button>
                                </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- product image-->

                <hr class="hrbreak1" />

                <!-- notice -->

                <div class="col-12">
                    <label class="form-label lbl1">Notice...</label>
                    <br />
                    <label class="form-label">We are taking 5% of the product price from every product as a service
                        charge.</label>
                </div>

                <!-- notice -->

                <!-- save btn -->

                <div class="col-12">
                    <div class="row">

                        <div class="col-12 offset-0 col-lg-6 offset-lg-3 d-grid mb-3">
                            <button class="btn btn-success searchbtn" onclick="addProduct();">Add Product</button>
                        </div>


                        <!-- <div class="col-12  col-lg-4  d-grid mt-2 mt-lg-0">
                            <button class="btn btn-dark searchbtn" onclick="changeproduct();">Update Product</button>
                        </div> -->
                    </div>
                </div>

                <!--  btn over-->
            </div>

            <!-- ADD OVER -->


            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



            <!-- footer -->



            <!-- footer -->
        </div>
    </div>

    <?php
    require "footer.php";
    ?>

    <script src="addproduct.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>