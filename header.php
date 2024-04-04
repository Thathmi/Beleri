<!DOCTYPE html>
<html>

<head>
    <title>Beleri</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.svg" />
    <!--icon show in title-->
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
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


    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.min.js"></script>

</body>

</html>