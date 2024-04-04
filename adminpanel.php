<?php

require "connection.php";
session_start();
if(isset($_SESSION["a"])){

$email = "thathmii.s@gmail.com";


 ?>

<!DOCTYPE html>
<html>

<head>
    <title>Beleri | Admin Panel</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/2.jpg" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="font&hr.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: #fff5ee;">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-2">
                <div class="row">
                    <div class="align-items-start bg-dark col-12 " style="height: 1000px;">
                        <div class="row g-1">
                            <div class="col-12 mt-5">
                                <h4 class="text-white"><?php echo $_SESSION["a"]["fname"] . " " . $_SESSION["a"]["lname"]; ?></h4>
                                <!-- <h4 class="text-white">Thathmi Samarakoon</h4> -->

                                <hr class="hrbreak1" />
                            </div>
                            <div class="nav flex-column nav-pills me-3 mt-3" role="tablist" aria-orientation="vertical">
                                <nav class="nav flex-column">
                                    <a class="nav-link active fs-6" aria-current="page" href="#">Dashboard</a>
                                    <a class="nav-link  text-info fs-6" href="manageusers.php">Manage Users</a>
                                    <a class="nav-link  text-info fs-6" href="manageseller.php">Manage Sellers</a>
                                    <a class="nav-link  text-info fs-6" href="manageproducts.php">Manage Products</a>
                                    <a class="nav-link  text-info fs-6" href="addNew.php">Category,Brand & Model</a>
                                    <a class="nav-link text-info fs-6" onclick="mssg();">Messages</a>
                                </nav>
                            </div>
                            <!-- <div class="col-12 mt-2">
                                <hr class="hrbreak1" />
                                <h5 class="text-white">Selling History</h5>
                                <hr class="hrbreak1" />
                            </div>
                            <div class="col-12 mt-2 d-grid">
                                <label class="form-label text-white ">From Date</label>
                                <input type="date" class="form-control" />
                                <label class="form-label text-white fs-6 mt-2">To Date</label>
                                <input type="date" class="form-control" />
                                <button class="btn btn-primary d-grid mt-2">Search</button>
                                <hr class="hrbreak1" />
                         
                            
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-12 col-lg-10">
                <div class="row">

                <div class="row">
                <div class="col-10 mt-3 mb-3 ">
                        <h2 class="fw-bold">Dashboard - Admin Panel</h2>
                    </div>

                    <div class="col-2 mt-3">
                    <a href="signOut.php" style="color:red;text-decoration:none;font-size:15px"><i
                                                class="bi bi-person-dash"
                                                style="margin-right: 5px;margin-left:20px;color:red;"></i> Sign Out</a>
                    </div>
                </div>


                   

                    <div class="col-12">
                        <hr />
                    </div>

                    <div class="col-12">
                        <div class="row g-1">

                            <div class="col-6 col-lg-4 px-1">
                                <div class="row g-1">

                                    <div class="col-12 bg-primary text-white text-center rounded"
                                        style="height: 100px;">
                                        <br />
                                        <span class="fs-4 fw-bold">Daily Earnings</span>
                                        <br />

                                        <?php
                                    $today = date("Y-m-d");
                                    $thismonth = date("m");
                                    $thisyear = date("Y");

                                    $a = "0";
                                    $b = "0";
                                    $c = "0";
                                    $f = "0";
                                    $g = "0";

                                    $invoicers = Database::search("SELECT * FROM `invoice`");
                                    $in = $invoicers->num_rows;

                                    for ($x = 0; $x < $in; $x++) {
                                        $ir = $invoicers->fetch_assoc();

                                        $g = $g + $ir["qty"];
                                        $d = $ir["date"];
                                        $splitdate = explode(" ", $d);
                                        $pdate = $splitdate[0];

                                        if ($pdate == $today) {
                                            $a = $a + $ir["total"];
                                            $c = $c + $ir["qty"];
                                        }

                                        $splitmonth = explode("-", $pdate);
                                        $pyear = $splitmonth[0];
                                        $pmonth = $splitmonth[1];

                                        if ($pyear == $thisyear) {
                                            if ($pmonth == $thismonth) {
                                                $b = $b + $ir["total"];
                                                $f = $f + $ir["qty"];
                                            }
                                        }
                                    }
                                    ?>
                                        <span class="fs-5">Rs. <?php echo $a; ?></span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 col-lg-4 px-1">
                                <div class="row g-1">

                                    <div class="col-12 bg-white text-dark text-center rounded" style="height: 100px;">
                                        <br />
                                        <span class="fs-4 fw-bold">Monthly Earnings</span>
                                        <br />
                                        <span class="fs-5">Rs. <?php echo $b; ?></span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 col-lg-4 px-1">
                                <div class="row g-1">

                                    <div class="col-12 bg-dark text-white text-center rounded" style="height: 100px;">
                                        <br />
                                        <span class="fs-4 fw-bold">Today Sellings</span>
                                        <br />
                                        <span class="fs-5"><?php echo $c; ?> Items</span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 col-lg-4 px-1">
                                <div class="row g-1">

                                    <div class="col-12 bg-secondary text-white text-center rounded"
                                        style="height: 100px;">
                                        <br />
                                        <span class="fs-4 fw-bold">Monthly Sellings</span>
                                        <br />
                                        <span class="fs-5"><?php echo $f; ?> items</span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 col-lg-4 px-1">
                                <div class="row g-1">

                                    <div class="col-12 bg-success text-white text-center rounded"
                                        style="height: 100px;">
                                        <br />
                                        <span class="fs-4 fw-bold">Total Sellings</span>
                                        <br />
                                        <span class="fs-5"><?php echo $g; ?></span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 col-lg-4 px-1">
                                <div class="row g-1">

                                    <div class="col-12 bg-danger text-white text-center rounded" style="height: 100px;">
                                        <br />
                                        <span class="fs-4 fw-bold">Total Engagements</span>
                                        <br />

                                        <?php

                                    $users = Database::search("SELECT * FROM `user`");
                                    $un = $users->num_rows;

                                    ?>
                                        <span class="fs-5"><?php echo $un; ?> members</span>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-12">
                        <hr />
                    </div>


                    <div class="col-12 bg-dark">
                        <div class="row">
                            <div class="col-12 col-lg-2 text-center mt-3 mb-3">
                                <label class="form-label fs-5  text-white">Total Active Time</label>
                            </div>

                            <?php
                        $startdate = new DateTime("2021-10-01 00:00:00");
                        $tdate = new DateTime();
                        $tz = new DateTimeZone("Asia/Colombo");
                        $tdate->setTimezone($tz);
                        $endDate = new DateTime($tdate->format("Y-m-d H:i:s"));

                        $difference = $endDate->diff($startdate);
                        ?>

                            <div class="col-12 col-lg-10 text-center mt-3 mb-3">
                                <label class="form-label fs-5 fw-bold text-success">
                                    <?php
                                echo $difference->format('%Y') . " years " . $difference->format('%m') . " monthss " .
                                    $difference->format('%d') . " days " . $difference->format('%H') . " hours " .
                                    $difference->format('%i') . " minuts " . $difference->format('%s') . " secondss ";
                                ?>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="offset-1 col-10 col-lg-4 mt-3 mb-3 rounded bg-light">
                        <div class="row g-1">

                            <?php

                        $freq = Database::search("SELECT `product_id`, COUNT(`product_id`) AS `value_occurence`
                           FROM `invoice` WHERE `date` LIKE '%" . $today . "%' GROUP BY `product_id` ORDER BY 
                          `value_occurence` DESC LIMIT 1  ");

                        $freqnum = $freq->num_rows;

                        for ($z = 0; $z < $freqnum; $z++) {
                            $freqrow = $freq->fetch_assoc();
                            //   echo $freqrow["product_id"];

                            $p = Database::search("SELECT * FROM `product` WHERE `id`='" . $freqrow["product_id"] . "'");
                            $pr = $p->fetch_assoc();

                            $ue = $pr["seller_email"];

                            $u = Database::search("SELECT * FROM `seller` WHERE `email`='" . $ue . "'");
                            $ur = $u->fetch_assoc();

                            $up = Database::search("SELECT * FROM `seller_profile_image` WHERE `seller_email`='" . $ue . "'");
                            $urp = $up->fetch_assoc();

                            $i = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $freqrow["product_id"] . "'");
                            $ir = $i->fetch_assoc();
                        }
                        ?>
                            <div class="col-12 text-center">
                                <label class="form-label fs-4 fw-bold">Mostly famous Item</label>
                            </div>

                            <div class="col-12">
                                <img src="<?php echo $ir["code"]; ?>" class="img-fliud-rounded"
                                    style="height:250px;width:100%">
                                <hr>
                            </div>
                            <div class="col-12 text-center">
                                <span class="fs-5 fw-bold"><?php echo $pr["title"]; ?></span>
                                <br>
                                <span class="fs-6"><?php echo $pr["qty"]; ?> Items left</span>
                                <br>
                                <span class="fs-6">Rs. <?php echo $pr["price"]; ?></span>
                            </div>
                            <div class="col-12">
                                <div class="firstplace"></div>
                            </div>
                        </div>
                    </div>


                    <div class="offset-1 col-10 col-lg-4 mt-3 mb-3 rounded bg-light">
                        <div class="row g-1">
                            <div class="col-12 text-center">
                                <label class="form-label fs-4 fw-bold">Mostly Famous Seller</label>
                            </div>

                            <div class="col-12">
                                <img src="<?php echo $urp["code"];?>"  class="rounded-circle img-fluid-rounded" width="200px" height="200px" style="margin-left: 50px;">
                                <hr>
                            </div>
                            <div class="col-12 text-center">
                                <span class="fs-5 fw-bold"><?php echo $ur["fname"] . " " . $ur["lname"]; ?></span>
                                <br>
                                <span class="fs-6"><?php echo $ur["email"] ?></span>
                                <br>
                                <span class="fs-6"> 0<?php echo $ur["mobile"] ?></span>
                            </div>
                            <div class="col-12">
                                <div class="firstplace"></div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <!-- Modal -->
        
                <div class="modal fade"  id="mssgmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold text-danger" id="exampleModalLabel">Admin Message page</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <?php

                            require "messagesAdmin.php";


                            ?>


                            </div>

                        </div>
                    </div>
          
            </div>
            <!-- modal -->
            <?php
        require "footer.php";
        ?>
        </div>
    </div>


    <script src="admin.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.min.js"></script>

    <script src="bootstrap.bundle.js"></script>
</body>

</html>
<?php
}
        ?> 