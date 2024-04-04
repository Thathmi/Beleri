<?php

session_start();

$user = $_SESSION["s"];

require "connection.php";

?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php

    $array;

    $search = $_POST["s"];
    $age = $_POST["a"];
    $qty = $_POST["q"];
    $condition = $_POST["c"];

    if (!empty($search)) {

        $products = Database::search("SELECT * FROM `product` WHERE `seller_email`='" . $user["email"] . "' AND `title` LIKE '%" . $search . "%'");
        $pn = $products->num_rows;

        for ($x = 0; $x < $pn; $x++) {
            $pd = $products->fetch_assoc();

            // $array[$x] = $products->fetch_assoc();

            $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $pd["id"] . "'");

            if ($productimg->num_rows == 1) {
                $img = $productimg->fetch_assoc();
    ?>
    <div class="card mb-3 col-12 col-lg-5 mt-3" style="margin-left: 50px;">
        <div class="row g-0">



            <div class="col-md-4 mt-4">
                <img src="<?php echo $img["code"]; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-secondary fw-bold" style="font-size: 17px;"><?php echo $pd["title"]; ?>
                    </h5>
                    <span class="card-text text-secondary fw-bold" style="font-size: 15px;">Rs.
                        <?php echo $pd["price"]; ?>.00</span>
                    <br />
                    <span class="card-text text-danger fw-bold" style="font-size: 15px;"><?php echo $pd["qty"]; ?> items
                        left</span>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="check"
                            onchange="changeStatus(<?php echo $pd['id']; ?>);"
                            <?php

                                                                                                                                                    if ($pd["status_id"] == 2) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }

                                                                                                                                                    ?>>

                        <label class="form-check-label fw-bold text-info" style="font-size: small;" for="check"
                            id="checklabel<?php echo $pd['id']; ?>">
                            <?php
                                        if ($pd["status_id"] == 2) {
                                            echo "Make Your Product Active";
                                        } else {
                                            echo "Make Your Product Deactive";
                                        }
                                        ?>
                        </label>

                    </div>
                    <div class="col-12">
                        <hr width="90%" />
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <a href="#" class="btn btn-light btn-sm d-grid" style="color: green;"
                                    onclick="sendid(<?php echo $pd['id']; ?>);">Update</a>
                            </div>
                            <div class="col-12 col-lg-6 mt-1 mt-lg-0">
                                <a href="#" class="btn btn-light btn-sm d-grid" style="color: red;"
                                    onclick="deletemodal(<?php echo $pd['id']; ?>);">Delete</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
            }
        }

        // echo json_encode($array);
    
    } else if (!empty($age)) {
        if ($age == 1) {
            $page = Database::search("SELECT * FROM `product` WHERE `seller_email`='" . $user["email"] . "' ORDER BY `datetime_added` DESC");

            $pnage = $page->num_rows;

            for ($y = 0; $y < $pnage; $y++) {
                $pdage = $page->fetch_assoc();

                $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $pdage["id"] . "'");

                if ($productimg->num_rows == 1) {
                    $aimg = $productimg->fetch_assoc();
                }
            ?>
    <div class="card mb-3 col-12 col-lg-5 mt-3" style="margin-left: 50px;">
        <div class="row g-0">



            <div class="col-md-4 mt-4">
                <img src="<?php echo $aimg["code"]; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-secondary fw-bold" style="font-size: 17px;">
                        <?php echo $pdage["title"]; ?></h5>
                    <span class="card-text text-secondary fw-bold" style="font-size: 15px;">Rs.
                        <?php echo $pdage["price"]; ?>.00</span>
                    <br />
                    <span class="card-text text-danger fw-bold" style="font-size: 15px;"><?php echo $pdage["qty"]; ?>
                        items
                        left</span>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="check"
                            onchange="changeStatus(<?php echo $pdage['id']; ?>);"
                            <?php

                                                                                                                                                                                    if ($pdage["status_id"] == 2) {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    }

                                                                                                                                                                                    ?>>

                        <label class="form-check-label fw-bold text-info" style="font-size: small;" for="check"
                            id="checklabel<?php echo $pdage['id']; ?>">
                            <?php
                                                                        if ($pdage["status_id"] == 2) {
                                                                            echo "Make Your Product Active";
                                                                        } else {
                                                                            echo "Make Your Product Deactive";
                                                                        }
                                                                        ?>
                        </label>

                    </div>
                    <div class="col-12">
                        <hr width="90%" />
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <a href="#" class="btn btn-light btn-sm d-grid" style="color: green;"
                                    onclick="sendid(<?php echo $pdage['id']; ?>);">Update</a>
                            </div>
                            <div class="col-12 col-lg-6 mt-1 mt-lg-0">
                                <a href="#" class="btn btn-light btn-sm d-grid" style="color: red;"
                                    onclick="deletemodal(<?php echo $pdage['id']; ?>);">Delete</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal<?php echo $pdage['id']; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bolder text-warning" id="exampleModalLabel">Warning...</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are You Sure You Want To Delete This Product?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger"
                        onclick="deleteproduct(<?php echo $pdage['id']; ?>);">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <?php
            }
        } else if ($age != 0) {
            $page = Database::search("SELECT * FROM `product` WHERE `seller_email`='" . $user["email"] . "' ORDER BY `datetime_added` ASC");

            $pnage = $page->num_rows;

            for ($y = 0; $y < $pnage; $y++) {
                $pdage = $page->fetch_assoc();

                $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $pdage["id"] . "'");

                if ($productimg->num_rows == 1) {
                    $aimg = $productimg->fetch_assoc();
                }
            ?>
    <div class="card mb-3 col-12 col-lg-5 mt-3" style="margin-left: 50px;">
        <div class="row g-0">



            <div class="col-md-4 mt-4">
                <img src="<?php echo $aimg["code"]; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-secondary fw-bold" style="font-size: 17px;">
                        <?php echo $pdage["title"]; ?></h5>
                    <span class="card-text text-secondary fw-bold" style="font-size: 15px;">Rs.
                        <?php echo $pdage["price"]; ?>.00</span>
                    <br />
                    <span class="card-text text-danger fw-bold" style="font-size: 15px;"><?php echo $pdage["qty"]; ?>
                        items
                        left</span>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="check"
                            onchange="changeStatus(<?php echo $pdage['id']; ?>);"
                            <?php

                                                                                                                                                                                    if ($pdage["status_id"] == 2) {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    }

                                                                                                                                                                                    ?>>

                        <label class="form-check-label fw-bold text-info" style="font-size: small;" for="check"
                            id="checklabel<?php echo $pdage['id']; ?>">
                            <?php
                                                                        if ($pdage["status_id"] == 2) {
                                                                            echo "Make Your Product Active";
                                                                        } else {
                                                                            echo "Make Your Product Deactive";
                                                                        }
                                                                        ?>
                        </label>

                    </div>
                    <div class="col-12">
                        <hr width="90%" />
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <a href="#" class="btn btn-light btn-sm d-grid" style="color: green;"
                                    onclick="sendid(<?php echo $pdage['id']; ?>);">Update</a>
                            </div>
                            <div class="col-12 col-lg-6 mt-1 mt-lg-0">
                                <a href="#" class="btn btn-light btn-sm d-grid" style="color: red;"
                                    onclick="deletemodal(<?php echo $pdage['id']; ?>);">Delete</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
            }
        }
    } else if (!empty($qty)) {
        if ($qty == 1) {
            $page = Database::search("SELECT * FROM `product` WHERE `seller_email`='" . $user["email"] . "' ORDER BY `qty` ASC");

            $pnage = $page->num_rows;

            for ($y = 0; $y < $pnage; $y++) {
                $pdage = $page->fetch_assoc();

                $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $pdage["id"] . "'");

                if ($productimg->num_rows == 1) {
                    $aimg = $productimg->fetch_assoc();
                }
            ?>
   <div class="card mb-3 col-12 col-lg-5 mt-3" style="margin-left: 50px;">
        <div class="row g-0">



            <div class="col-md-4 mt-4">
                <img src="<?php echo $aimg["code"]; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-secondary fw-bold" style="font-size: 17px;">
                        <?php echo $pdage["title"]; ?></h5>
                    <span class="card-text text-secondary fw-bold" style="font-size: 15px;">Rs.
                        <?php echo $pdage["price"]; ?>.00</span>
                    <br />
                    <span class="card-text text-danger fw-bold" style="font-size: 15px;"><?php echo $pdage["qty"]; ?>
                        items
                        left</span>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="check"
                            onchange="changeStatus(<?php echo $pdage['id']; ?>);"
                            <?php

                                                                                                                                                                                    if ($pdage["status_id"] == 2) {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    }

                                                                                                                                                                                    ?>>

                        <label class="form-check-label fw-bold text-info" style="font-size: small;" for="check"
                            id="checklabel<?php echo $pdage['id']; ?>">
                            <?php
                                                                        if ($pdage["status_id"] == 2) {
                                                                            echo "Make Your Product Active";
                                                                        } else {
                                                                            echo "Make Your Product Deactive";
                                                                        }
                                                                        ?>
                        </label>

                    </div>
                    <div class="col-12">
                        <hr width="90%" />
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <a href="#" class="btn btn-light btn-sm d-grid" style="color: green;"
                                    onclick="sendid(<?php echo $pdage['id']; ?>);">Update</a>
                            </div>
                            <div class="col-12 col-lg-6 mt-1 mt-lg-0">
                                <a href="#" class="btn btn-light btn-sm d-grid" style="color: red;"
                                    onclick="deletemodal(<?php echo $pdage['id']; ?>);">Delete</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal<?php echo $pdage['id']; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bolder text-warning" id="exampleModalLabel">Warning...</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are You Sure You Want To Delete This Product?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger"
                        onclick="deleteproduct(<?php echo $pdage['id']; ?>);">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <?php
            }
        } else if ($qty != 0) {
            $page = Database::search("SELECT * FROM `product` WHERE `seller_email`='" . $user["email"] . "' ORDER BY `qty` DESC");

            $pnage = $page->num_rows;

            for ($y = 0; $y < $pnage; $y++) {
                $pdage = $page->fetch_assoc();

                $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $pdage["id"] . "'");

                if ($productimg->num_rows == 1) {
                    $aimg = $productimg->fetch_assoc();
                }
            ?>
   <div class="card mb-3 col-12 col-lg-5 mt-3" style="margin-left: 50px;">
        <div class="row g-0">



            <div class="col-md-4 mt-4">
                <img src="<?php echo $aimg["code"]; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-secondary fw-bold" style="font-size: 17px;">
                        <?php echo $pdage["title"]; ?></h5>
                    <span class="card-text text-secondary fw-bold" style="font-size: 15px;">Rs.
                        <?php echo $pdage["price"]; ?>.00</span>
                    <br />
                    <span class="card-text text-danger fw-bold" style="font-size: 15px;"><?php echo $pdage["qty"]; ?>
                        items
                        left</span>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="check"
                            onchange="changeStatus(<?php echo $pdage['id']; ?>);"
                            <?php

                                                                                                                                                                                    if ($pdage["status_id"] == 2) {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    }

                                                                                                                                                                                    ?>>

                        <label class="form-check-label fw-bold text-info" style="font-size: small;" for="check"
                            id="checklabel<?php echo $pdage['id']; ?>">
                            <?php
                                                                        if ($pdage["status_id"] == 2) {
                                                                            echo "Make Your Product Active";
                                                                        } else {
                                                                            echo "Make Your Product Deactive";
                                                                        }
                                                                        ?>
                        </label>

                    </div>
                    <div class="col-12">
                        <hr width="90%" />
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <a href="#" class="btn btn-light btn-sm d-grid" style="color: green;"
                                    onclick="sendid(<?php echo $pdage['id']; ?>);">Update</a>
                            </div>
                            <div class="col-12 col-lg-6 mt-1 mt-lg-0">
                                <a href="#" class="btn btn-light btn-sm d-grid" style="color: red;"
                                    onclick="deletemodal(<?php echo $pdage['id']; ?>);">Delete</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
            }
        }
    } else if (!empty($condition)) {
        if ($condition == 1) {
            $page = Database::search("SELECT * FROM `product` WHERE `seller_email`='" . $user["email"] . "' AND `condition_id` = '1' ");

            $pnage = $page->num_rows;

            for ($y = 0; $y < $pnage; $y++) {
                $pdage = $page->fetch_assoc();

                $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $pdage["id"] . "'");

                if ($productimg->num_rows == 1) {
                    $aimg = $productimg->fetch_assoc();
                }
            ?>
    <div class="card mb-3 col-12 col-lg-5 mt-3" style="margin-left: 50px;">
        <div class="row g-0">



            <div class="col-md-4 mt-4">
                <img src="<?php echo $aimg["code"]; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-secondary fw-bold" style="font-size: 17px;">
                        <?php echo $pdage["title"]; ?></h5>
                    <span class="card-text text-secondary fw-bold" style="font-size: 15px;">Rs.
                        <?php echo $pdage["price"]; ?>.00</span>
                    <br />
                    <span class="card-text text-danger fw-bold" style="font-size: 15px;"><?php echo $pdage["qty"]; ?>
                        items
                        left</span>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="check"
                            onchange="changeStatus(<?php echo $pdage['id']; ?>);"
                            <?php

                                                                                                                                                                                    if ($pdage["status_id"] == 2) {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    }

                                                                                                                                                                                    ?>>

                        <label class="form-check-label fw-bold text-info" style="font-size: small;" for="check"
                            id="checklabel<?php echo $pdage['id']; ?>">
                            <?php
                                                                        if ($pdage["status_id"] == 2) {
                                                                            echo "Make Your Product Active";
                                                                        } else {
                                                                            echo "Make Your Product Deactive";
                                                                        }
                                                                        ?>
                        </label>

                    </div>
                    <div class="col-12">
                        <hr width="90%" />
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <a href="#" class="btn btn-light btn-sm d-grid" style="color: green;"
                                    onclick="sendid(<?php echo $pdage['id']; ?>);">Update</a>
                            </div>
                            <div class="col-12 col-lg-6 mt-1 mt-lg-0">
                                <a href="#" class="btn btn-light btn-sm d-grid" style="color: red;"
                                    onclick="deletemodal(<?php echo $pdage['id']; ?>);">Delete</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal<?php echo $pdage['id']; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bolder text-warning" id="exampleModalLabel">Warning...</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are You Sure You Want To Delete This Product?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger"
                        onclick="deleteproduct(<?php echo $pdage['id']; ?>);">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <?php
            }
        } else if ($condition != 0) {
            $page = Database::search("SELECT * FROM `product` WHERE `seller_email`='" . $user["email"] . "' AND `condition_id` = '2' ");

            $pnage = $page->num_rows;

            for ($y = 0; $y < $pnage; $y++) {
                $pdage = $page->fetch_assoc();

                $productimg = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $pdage["id"] . "'");

                if ($productimg->num_rows == 1) {
                    $aimg = $productimg->fetch_assoc();
                }
            ?>
    <div class="card mb-3 col-12 col-lg-5 mt-3" style="margin-left: 50px;">
        <div class="row g-0">



            <div class="col-md-4 mt-4">
                <img src="<?php echo $aimg["code"]; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-secondary fw-bold" style="font-size: 17px;">
                        <?php echo $pdage["title"]; ?></h5>
                    <span class="card-text text-secondary fw-bold" style="font-size: 15px;">Rs.
                        <?php echo $pdage["price"]; ?>.00</span>
                    <br />
                    <span class="card-text text-danger fw-bold" style="font-size: 15px;"><?php echo $pdage["qty"]; ?>
                        items
                        left</span>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="check"
                            onchange="changeStatus(<?php echo $pdage['id']; ?>);"
                            <?php

                                                                                                                                                                                    if ($pdage["status_id"] == 2) {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                    }

                                                                                                                                                                                    ?>>

                        <label class="form-check-label fw-bold text-info" style="font-size: small;" for="check"
                            id="checklabel<?php echo $pdage['id']; ?>">
                            <?php
                                                                        if ($pdage["status_id"] == 2) {
                                                                            echo "Make Your Product Active";
                                                                        } else {
                                                                            echo "Make Your Product Deactive";
                                                                        }
                                                                        ?>
                        </label>

                    </div>
                    <div class="col-12">
                        <hr width="90%" />
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <a href="#" class="btn btn-light btn-sm d-grid" style="color: green;"
                                    onclick="sendid(<?php echo $pdage['id']; ?>);">Update</a>
                            </div>
                            <div class="col-12 col-lg-6 mt-1 mt-lg-0">
                                <a href="#" class="btn btn-light btn-sm d-grid" style="color: red;"
                                    onclick="deletemodal(<?php echo $pdage['id']; ?>);">Delete</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
            }
        }
    }

    ?>

    <script src="script.js"></script>
</body>

</html>