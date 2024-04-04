<?php
session_start();
require "connection.php";
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

<body style="background-color:#C0D9D9;min-height: 100vh;">
<div id="wish"></div>
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

    <div class="container-fluid col-md-10 mt-4 bg-light rounded">
        <div class="row">

            <!-- /// -->
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Add New Category
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">


                            <div class="col-12 mb-3">
                                <div class="row g-1">

                                    <div class="col-md-12">
                                        <div class="row offset-lg-3">
                                            <div class="col-md-7 col-9">
                                                <input class="form-control" id="name" type="text"
                                                    placeholder="Add new category">
                                            </div>
                                            <div class="col-md-2 col-3">
                                                <button onclick="add();" type="button"
                                                    class="btn btn-info">Add</button>
                                            </div>
                                        </div>
                                    </div>


                                    <table class="table table-sm col-md-5 mt-3" id="t" style="width: 200px;">
                                        <tbody>
                                            <?php

                                        $categoryrs = Database::search("SELECT * FROM `category`");
                                        $num = $categoryrs->num_rows;

                                        for ($i = 0; $i < $num; $i++) {

                                            $row = $categoryrs->fetch_assoc();
                                        ?>
                                            <tr>
                                                <?php
                                                ?>

                                                <td><?php echo $row["name"]; ?></td>

                                                <?php
                                        }
                                            ?>
                                            <tr>


                                        </tbody>
                                    </table>





                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Add New Brand
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">

                            <div class="col-12 mb-3">
                                <div class="row g-1">

                                    <div class="col-md-12">
                                        <div class="row offset-lg-3">
                                            <div class="col-md-7 col-9">
                                                <input class="form-control" id="nameBrand" type="text"
                                                    placeholder="Add new Brand">
                                            </div>
                                            <div class="col-md-2 col-3">
                                                <button onclick="addBrand();" type="button"
                                                    class="btn btn-info">Add</button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="btn-group dropend col-lg-3 mt-4" id="t1">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Brands alredy exist
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">



                                            <?php

                                        $categoryrs = Database::search("SELECT * FROM `brand`");
                                        $num = $categoryrs->num_rows;

                                        for ($i = 0; $i < $num; $i++) {

                                            $row = $categoryrs->fetch_assoc();
                                        ?>

                                            <td></td>
                                            <li><a class="dropdown-item" href="#"><?php echo $row["name"]; ?></a></li>

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
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button fw-bold collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            Add New Model
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">

                            <div class="col-12 mb-3">
                                <div class="row g-1">


                                    <div class="dropdown col-md-3"  id="t1">
                                        <select class="btn btn-secondary dropdown-toggle" type="button" 
                                            id="s" data-bs-toggle="dropdown" aria-expanded="false">
                                           
                                      
                                        <option value="0"> Add a Brand to the model</option>
                                       



                                            <?php

                                        $categoryrs = Database::search("SELECT * FROM `brand`");
                                        $num = $categoryrs->num_rows;

                                        for ($i = 0; $i < $num; $i++) {

                                            $row = $categoryrs->fetch_assoc();
                                        ?>

                                            <td></td>
                                            <option><a class="dropdown-item" href="#"><?php echo $row["name"]; ?></a></option>

                                            <?php
                                        }
                                            ?>
                                          </select>
                                    </div>

                                    <div class="col-md-9 " >
                                        <div class="row ">
                                            <div class="col-md-7 col-9">
                                                <input class="form-control" id="nameModel" type="text"
                                                    placeholder="Add new Model">
                                            </div>
                                            <div class="col-md-2 col-3">
                                                <button onclick="addModel();" type="button"
                                                    class="btn btn-info">Add</button>
                                            </div>
                                        </div>
                                    </div>







                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /// -->
        </div>
    </div>



    <script src="admin.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="bootstrap.bundle.js"></script>

    <script>
    $(document).ready(function() {
        setInterval(function() {
            $("#t").load(window.location.href + " #t");
        }, 1500);
    });

    setInterval(function() {
        $("#t1").load(window.location.href + " #t1");
    }, 1500);
    </script>
</body>

</html>