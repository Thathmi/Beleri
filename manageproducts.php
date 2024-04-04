<?php
session_start();
?>


<!DOCTYPE html>

<html>

<head>
    <title>Beleri | Admin manage products</title>

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
                        <label style="margin-left: 5px;margin-right:5px;font-size:13px">| </label>
                        <!-- <span class="text-start label1"><b>Welcome</b></span> -->
                        <?php
                            if (isset($_SESSION["a"])) {

                                $u = $_SESSION["a"];
                                echo $u["fname"];
                            } else {
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

            <div class="col-12  text-center rounded" style="background-color:#e7feff">
                <label class="form-label  fs-2 fw-bold" style="color: #4682b4;">Manage all Products</label>
            </div>
            <div class="col-12  rounded" style="background-color: #f0f8ff;">
                <div class="row">
                    <div class="col-1 d-grid" style="height: 25px;">

                        <button onclick="userback();" class="btn btn-outline-srcondary" type="button"
                            id="button-addon2"><i class="bi bi-arrow-left"></i>Back</button>
                        <!-- <button onclick="searchuser();" class="btn btn-primary">Search Button</button> -->
                    </div>
                    <div class="offset-0 offset-lg-3 mb-3 col-12 col-lg-6">

                        <div class="row">

                            <div class="col-9">
                                <input type="text" class="form-control" id="searchtxt">
                            </div>
                            <div class="col-1 d-grid" style="margin-left: -25px;">

                                <button onclick="searchProduct();" class="btn btn-outline-primary" type="button"
                                    id="button-addon2"><i class="bi bi-search"></i></button>
                                <!-- <button onclick="searchuser();" class="btn btn-primary">Search Button</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <?php
            
 

            if (isset($_SESSION["p"])) {
                $u = $_SESSION["p"];

                require "connection.php";

                $imager = Database::search("SELECT * FROM `image` WHERE `product_id` = '".$u["id"]."';");
                $images = $imager->fetch_assoc();
                
            ?>
            <table class="table table-striped table-hover table-dark " style="margin-top: 10px;">
                <thead>
                    <tr>
                        <th scope="col">Product Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity left</th>
                        <th scope="col">Registered date</th>
                        <th scope="col">Status</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- <div class="row" id="mainbox"> -->
                    <tr>
                        <th scope="row"><?php echo $u["id"]?></th>
                        <td><img src="<?php echo  $images["code"]?>" style="width: 100px;height:auto"></td>
                        <td><?php echo $u["title"] ?></td>
                        <td><?php echo $u["price"] ?></td>
                        <td><?php echo $u["qty"] ?></td>
                        <td><?php echo $u["datetime_added"]  ?></td>


                        <td>
                            <?php

                                $s = $u["status_id"];

                                if ($s == "1") {
                                ?>
                            <buttton onclick="blockproduct('<?php echo $u['id'] ?>');"
                                class="btn btn-danger btn-sm d-inline-block d-grid">Block</buttton>
                            <?php
                                } else {
                                ?>
                            <buttton onclick="blockproduct('<?php echo $u['id'] ?>');"
                                class="btn btn-success btn-sm d-inline-block d-grid">Unblock</buttton>
                            <?php
                                }

                                ?>
                        </td>
                    </tr>

                    <?php
            } else {
            

            ?>
                    <table class="table table-striped table-hover table-dark " style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <th scope="col">Product Id</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity left</th>
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

                $products = Database::search("SELECT * FROM `product`;");
                $d = $products->num_rows;
                $srow = $products->fetch_assoc();
                $e = $srow["seller_email"];

                // $i = Database::search("SELECT * FROM `profile_image` WHERE `user_email` = '".$e."';");
                // $in = $i->num_rows;
                // $image = $i->fetch_assoc();

                $results_per_page = 10;

                $number_of_pages = ceil($d / $results_per_page);





                $page_first_result = ((int)$pageno - 1) * $results_per_page;

                $selectedrs = Database::search("SELECT * FROM `product` LIMIT " . $results_per_page . " OFFSET " . $page_first_result . " ");
                $srn = $selectedrs->num_rows;

                $c = "0";

                while ($srow = $selectedrs->fetch_assoc()) {
                    $c = $c + 1;
                    
                    $imagers = Database::search("SELECT * FROM `image` WHERE `product_id` = '".$srow["id"]."';");
                    $image = $imagers->fetch_assoc();

                ?>

                <tr>
                    <th scope="row"><?php echo $srow["id"] ?></th>
                    <td><img src="<?php echo  $image["code"]?>" style="width: 100px;height:auto"></td>
                    <td><?php echo $srow["title"] ?></td>
                    <td><?php echo $srow["price"]?></td>
                    <td><?php echo $srow["qty"] ?></td>
                    <td><?php echo $srow["datetime_added"]  ?></td>


                    <td>
                        <?php
                    
                                $s = $srow["status_id"];

                                if ($s == "1") {
                                ?>
                        <buttton onclick="blockproduct('<?php echo $srow['id'] ?>');"
                            class="btn btn-danger btn-sm d-inline-block d-grid">Block</buttton>
                        <?php
                                } else {
                                ?>
                        <buttton onclick="blockproduct('<?php echo $srow['id'] ?>');"
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

<!-- <?php



?>

<!DOCTYPE html>

<html>

<head>

    <title>eShop | Manage Products</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="resources/logo.svg">

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css">

</head>

<body onload="searchProduct();"
    style="background-color: #74EBD5; background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%); min-height: 100vh;">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 bg-light text-center rounded">
                <label class="form-label fs-2 fw-bold text-primary">Manage All Products</label>
            </div>

            <div class="col-12 bg-light rounded">
                <div class="row">
                    <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-9">
                                <input type="text" class="form-control" id="searchtxt" />
                            </div>
                            <div class="col-3 d-grid">
                                <button class="btn btn-primary" onclick="searchProduct();">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-2">
                <div class="row">
                    <div class="col-lg-1 col-2 bg-primary text-white fw-bold p-2">
                        <span>#</span>
                    </div>
                    <div class="col-lg-2 bg-light fw-bold p-2 d-none d-lg-block">
                        <span>Products Image</span>
                    </div>
                    <div class="col-lg-2 bg-primary text-white fw-bold p-2 d-none d-lg-block">
                        <span>Title</span>
                    </div>
                    <div class="col-lg-2 col-10  bg-light fw-bold p-2">
                        <span>Price</span>
                    </div>
                    <div class="col-lg-2 bg-primary text-white fw-bold p-2 d-none d-lg-block">
                        <span>Qunatity</span>
                    </div>
                    <div class="col-lg-3 bg-light fw-bold p-2 d-none d-lg-block">
                        <span>Registered Date</span>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-2 mb-3" id="viewProduct"></div>

            <?php

require "connection.php";

if (isset($_GET["page"])) {
    $pageno = $_GET["page"];
} else {
    $pageno = 1;
}

$products = Database::search("SELECT * FROM `product`;");
$d = $products->num_rows;
$row = $products->fetch_assoc();

$results_per_page = 10;

$number_of_pages = ceil($d / $results_per_page);





$page_first_result = ((int)$pageno - 1) * $results_per_page;

$selectedrs = Database::search("SELECT * FROM `product` LIMIT " . $results_per_page . " OFFSET " . $page_first_result . " ");
$srn = $selectedrs->num_rows;

$c = "0";

while ($srow = $selectedrs->fetch_assoc()) {
    $c = $c + 1;
    
    $imagers = Database::search("SELECT * FROM `image` WHERE `product_id` = '".$srow["id"]."';");
    $image = $imagers->fetch_assoc();

?>

            <div class="col-12 mt-3 mb-2">
                <div class="row">
                    <div class="col-2 col-lg-1 pt-2 mb-2 bg-primary text-ceneter">
                        <span class="fs-4 fw-bold text-white"><?php echo $c ?></span>
                    </div>
                    <div class="col-2 pt-2 mb-2 bg-light d-none d-lg-block">
                        <span class="fs-4 fw-bold text-dark"> <img onclick="deletemodal(<?php echo $srow['id']  ?>);"
                                height="150px" src="<?php echo  $image["code"]; ?>"></span>
                    </div>
                    <div class="col-2  col-lg-2 pt-2 mb-2 bg-primary d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white"><?php echo $srow["title"]  ?></span>
                    </div>
                    <div class="col-2 pt-2 mb-2 bg-light d-none d-lg-block">
                        <span class="fs-4 fw-bold text-dark"><?php echo $srow["price"] ?></span>
                    </div>
                    <div class="col-2 pt-2 mb-2 bg-primary d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white"><?php echo $srow["qty"] ?></span>
                    </div>
                    <div class="col-2 pt-2 mb-2 bg-light d-none d-lg-block">
                        <span class="fs-4 fw-bold text-dark"><?php echo $srow["datetime_added"] ?></span>
                    </div>

                    <div class="col-4 col-lg-1 bg-white pt-2 mb-2">

                        <!-- Modal -->
<div class="modal fade" id="deleteModal<?php echo $srow['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold text-warning" id="exampleModalLabel">
                    <?php echo $srow["title"] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?php echo  $image["code"]; ?>" style="height: 120px;width:auto" class="img-fluid " />
                <h6 style="font-size: smaller;color:gray;">about the product :</h6>
                <?php echo $srow["description"]; ?><br />
                <!-- <h6 style="font-size: smaller;color:gray;" class="mt-1">Brand :</h6> -->

                <!-- <?php echo $bb[""]; ?> -->
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button> -->
                <!-- <button type="button" class="btn btn-primary" onclick="deleteProductmanage(<?php echo $srow['id'] ?>);">Yes</button> -->
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<?php
  

  $s = $srow["status_id"];

  if ($s == "1") {
  ?>
<buttton id="blockbutton2<?php echo $srow['id'] ?>" onclick="blockuser('<?php echo $srow['id'] ?>');"
    class="btn btn-danger d-inline-block d-grid">Block</buttton>
<?php
  } else {
  ?>
<buttton id="blockbutton<?php echo $srow['id'] ?>" onclick="blockuser('<?php echo $srow['id'] ?>');"
    class="btn btn-success d-inline-block d-grid">Unblock</buttton>
<?php
  }

  ?>




</div>
</div>
</div>
<?php
}

?>
</div>
</div>



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

<hr />

<div class="col-12">
    <h3 class="text-primary">Manage Categories</h3>
</div>



<hr>

<div class="col-12 mb-3">
    <div class="row g-1">

        <?php

                    $categoryrs = Database::search("SELECT * FROM `category`");
                    $num = $categoryrs->num_rows;

                    for ($i = 0; $i < $num; $i++) {

                        $row = $categoryrs->fetch_assoc();
                    ?>
        <div class="col-12 col-lg-3">
            <div class="row g-1 px-1">
                <div class="col-12 text-center bg-body border border-2 border-success shadow rounded">
                    <label class="form-label fs-4 fw-bold py-3"><?php echo $row["name"]; ?></label>
                </div>
            </div>
        </div>



        <?php
                    }


                    ?>



        <div class="col-12 col-lg-3">
            <div class="row g-1 px-1">
                <div class="col-12 text-center bg-body border border-2 border-danger shadow rounded">
                    <div class="row">
                        <div class="col-3 mt-3 addnewimg"></div>
                        <div class="col-9">
                            <label class="form-label fs-4 fw-bold py-3 text-black-50" onclick="addcategory();">Add
                                New Category</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addcat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold text-warning" id="exampleModalLabel">
                            Add a new category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- <h4>Add the name of the new category</h4> -->
                        <input id="name" type="text" placeholder="Type the name of the new category"
                            style="width: 80%; " class="rounded form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            onclick="add();">Add</button>
                        <!-- <button type="button" class="btn btn-primary" onclick="deleteProductmanage(<?php echo $srow['id'] ?>);">Yes</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

    </div>
</div>

<!-- footer -->
<?php require "footer.php"; ?>
<!-- footer -->

</div>
</div>

<script src="script.js"></script>
<script src="bootstrap.js"></script>

<script src="bootstrap.min.js"></script>

<script src="bootstrap.bundle.js"></script>
</body>

</html> -->