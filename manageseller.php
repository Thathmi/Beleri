<?php
session_start();
?>


<!DOCTYPE html>

<html>

<head>
    <title>Beleri | Admin manage Seller</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/2.jpg">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>

<body style="background-color:#d3d3d3;min-height: 100vh;">

    <!-- header -->
    <div class="container-fluid">
        <div class="row" style="background-color: #F2F3F1	;">

            <!--header design-->
            <div class="col-12">
                <div class="row mt-2 mb-1">
                    <div class="offset-lg-0 col-12 col-lg-4 align-self-start">
                        <text class="topic">Be</text><text class="topic1">l</text><text class="topic2">eri</text>
                        <label style="margin-left: 5px;margin-right:5px;">|</label>
                        <label style="margin-left: 5px;margin-right:5px;font-size:13px;font-weight:bold">Admin
                            Panel</label>
                        <label style="margin-left: 5px;margin-right:5px;font-size:13px" >|  </label>
                        <!-- <span class="text-start label1"><b>Welcome</b></span> -->
                        <?php
                            if (isset($_SESSION["a"])) {

                                $u = $_SESSION["a"];
                                echo $u["fname"]; 

                            }else {
                            ?>
                        <a href="index.php" style="font-size: 13px;text-decoration:none;color:red;">Sign In as Admin</a>
                        <?php
                            } ?>
                        <label style="margin-left: 5px;">|</label>

                        <!-- <span class="text-start label2" onclick="signout();">Sign out</span> -->
                    </div>
                    <div class="offset-lg-4 col-12 col-lg-4 align-self-end">
                        <div class="row ">

                            <div><a href="adminpanel.php"
                                    style="text-decoration: none;margin-left:100px;font-weight:bold;color:black;font-size:14px;margin-top:-10px"><i
                                        class="bi bi-arrow-left-short"></i>Back To Dashboard</a></div>






                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header design over-->




    </div>
    </div>
    <!-- header -->

    <div class="container-fluid">
        <div class="row">

            <div class="col-12  text-center rounded" style="background-color:#fff0f5">
                <label class="form-label  fs-2 fw-bold" style="color: #4682b4;">Manage all Sellers</label>
            </div>
            <div class="col-12  rounded" style="background-color: #fffafa;">
                <div class="row">
                    <div class="col-1 d-grid" style="height: 25px;">

                        <button onclick="userback();" class="btn btn-outline-srcondary" type="button"
                            id="button-addon2"><i class="bi bi-arrow-left"></i>Back</button>
                        <!-- <button onclick="searchuser();" class="btn btn-primary">Search Button</button> -->
                    </div>
                    <div class="offset-0 offset-lg-3 mb-3 col-12 col-lg-6">

                        <div class="row">

                            <div class="col-9">
                                <input type="text" class="form-control" id="searchtext">
                            </div>
                            <div class="col-1 d-grid" style="margin-left: -25px;">

                                <button onclick="searchseller();" class="btn btn-outline-primary" type="button"
                                    id="button-addon2"><i class="bi bi-search"></i></button>
                                <!-- <button onclick="searchuser();" class="btn btn-primary">Search Button</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <?php
            
 

            if (isset($_SESSION["seller"])) {
                $u = $_SESSION["seller"];
                
            ?>
            <table class="table table-striped table-hover table-success " style="margin-top: 10px;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Store Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Registered date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <div class="row" id="mainbox"> -->
                    <tr>
                        <th scope="row">1</th>
                        <!-- <td><?php echo  $image["code"]?></td> -->
                        <td><?php echo $u["business_name"] ?></td>
                        <td><?php echo $u["email"] ?></td>
                        <td><?php echo $u["fname"] . " " . $u["lname"] ?></td>
                        <td><?php echo $u["mobile"] ?></td>
                        <td><?php echo $u["register_date"]  ?></td>


                        <td>
                            <?php

                                $s = $u["status"];

                                if ($s == "1") {
                                ?>
                            <buttton id="blockbutton2<?php echo $u['email'] ?>"
                                onclick="blockseller('<?php echo $u['email'] ?>');"
                                class="btn btn-danger btn-sm d-inline-block d-grid">Block</buttton>
                            <?php
                                } else {
                                ?>
                            <buttton id="blockbutton<?php echo $u['email'] ?>"
                                onclick="blockseller('<?php echo $u['email'] ?>');"
                                class="btn btn-success btn-sm d-inline-block d-grid">Unblock</buttton>
                            <?php
                                }

                                ?>
                        </td>
                    </tr>

                    <?php
            } else {
            

            ?>
                    <table class="table table-striped table-hover table-success " style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Store Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Registered date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
        </div>
        <div class="col-12">
            <div id="1235e" class="row">
                <?php

                require "connection.php";

                if (isset($_GET["page"])) {
                    $pageno = $_GET["page"];
                } else {
                    $pageno = 1;
                }

                $products = Database::search("SELECT * FROM `user`;");
                $d = $products->num_rows;
                $srow = $products->fetch_assoc();
                $e = $srow["email"];

                // $i = Database::search("SELECT * FROM `profile_image` WHERE `user_email` = '".$e."';");
                // $in = $i->num_rows;
                // $image = $i->fetch_assoc();

                $results_per_page = 10;

                $number_of_pages = ceil($d / $results_per_page);





                $page_first_result = ((int)$pageno - 1) * $results_per_page;

                $selectedrs = Database::search("SELECT * FROM `seller` LIMIT " . $results_per_page . " OFFSET " . $page_first_result . " ");
                $srn = $selectedrs->num_rows;

                $c = "0";

                while ($srow = $selectedrs->fetch_assoc()) {
                    $c = $c + 1;
                    // for($i = 0; $i<$srn; $i++){
                    // $imagers = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '".$srow["email"]."';");
                    // $image = $imagers->fetch_assoc();

                ?>

                <tr>
                    <th scope="row"><?php echo $c ?></th>
                    <!-- <td><?php echo  $image["code"]?></td> -->
                    <td><?php echo $srow["business_name"] ?></td>
                    <td><?php echo $srow["email"] ?></td>
                    <td><?php echo $srow["fname"] . " " . $srow["lname"] ?></td>
                    <td><?php echo $srow["mobile"] ?></td>
                    <td><?php echo $srow["register_date"]  ?></td>


                    <td>
                        <?php

                                $s = $srow["status"];

                                if ($s == '1') {
                                ?>
                        <buttton id="blockbutton2<?php echo $srow['email'] ?>"
                            onclick="blockseller('<?php echo $srow['email'] ?>');"
                            class="btn btn-danger btn-sm d-inline-block d-grid">Block</buttton>
                        <?php
                                } else {
                                ?>
                        <buttton id="blockbutton<?php echo $srow['email'] ?>"
                            onclick="blockseller('<?php echo $srow['email'] ?>');"
                            class="btn btn-success btn-sm d-inline-block d-grid">Unblock</buttton>
                        <?php
                                }

                                ?>
                    </td>
                </tr>
            </div>
        </div>
        <?php
                }

                ?>

    </div>
    </div>
    </tbody>
    </table>



    <div class="col-12 justify-content-center d-flex mt-3 mb-3">
        <div class="pagination ">
            <?php if ($pageno <= 1) {
                } else {
                ?>

            <a href="<?php echo "?page=" . ($pageno - 1); ?>">&laquo;</a>
            <?php
                } ?>
            <?php
                for ($page = 1; $page <= $number_of_pages; $page++) {
                    if ($page == $pageno) {
                ?>
            <a class="ms- 1 active" href="<?php echo "?page=" . ($page); ?>"><?php echo $page ?></a>
            <?php
                    } else {
                    ?>
            <a href="<?php echo "?page=" . ($page); ?>"><?php echo $page ?></a>
            <?php
                    }
                }
                ?>
            <?php if ($pageno >= $number_of_pages) {
                } else {
                ?>
            <a href="<?php echo "?page=" . ($pageno + 1); ?>">&raquo;</a>
            <?php
                }
                ?>
        </div>
    </div>
    <?php } ?>
    </tbody>
    </table>
    </div>
    </div>
    <?php require "footer.php" ?>



    <script src="script.js"></script>
</body>

</html>