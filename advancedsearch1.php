<?php
require "connection.php";
?>

<!DOCTYPE html>
<html>

<head>

    <title>eShop | Advanced Search</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="advancedsearch.css" />
    <link rel="icon" href="resources/logo.svg" />

</head>

<body class="bg-info">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row bg-white  ">
                    <?php

                    require "header.php";

                    ?>
                </div>
            </div>
            <div class="col-12 bg-white">
                <div class="row">
                    <div class="offset-0 offset-lg-4 col-12 col-lg-4">
                        <div class="row">
                            <div class="col-2 mt-2 ">
                                <div class="mb-3 searchlogo"></div>
                            </div>
                            <div class="col-10">
                                <label class="text-black-50 fw-bolder fs-3 mt-3">Advanced Search</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="offset-0 offset-lg-2 col-12 col-lg-8 bg-white mt-3 mb-3 rounded">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-0 offset-lg-1">
                        <div class="row">
                            <div class="col-12 col-lg-10 mt-3 mb-2">
                                <input type="text" class="form-control fw-bold" placeholder="Type keyword to search..." id="k" />
                            </div>
                            <div class="col-12 col-lg-2 mt-3 mb-2 d-grid">
                                <button class="btn btn-primary" onclick="advancesearch();">Search</button>
                            </div>
                            <div class="col-12">
                                <hr class="border border-primary border-2" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-10 offset-0 offset-lg-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4 mb-3">
                                        <select class="form-select" id="c">
                                            <option value="0">Select Category</option>
                                       
                                       <?php
                                       $categoryrs = Database::search("SELECT * FROM `category`");
                                       $cn = $categoryrs->num_rows;

                                       $brandrs = Database::search("SELECT * FROM `brand`");
                                       $bn = $brandrs->num_rows;

                                       $modelrs = Database::search("SELECT * FROM `model`");
                                       $mn = $modelrs->num_rows;

                                       $conditionrs = Database::search("SELECT * FROM `condition`");
                                       $con = $conditionrs->num_rows;

                                       $colors = Database::search("SELECT * FROM `color`");
                                       $coln = $colors->num_rows;

                                       for($a=0;$a<$cn;$a++){
                                           $cr=$categoryrs->fetch_assoc();
                                           ?>
                                           <option value="0"><?php echo $cr["name"];?></option>
                                           <?php
                                       }
                                       ?>
                                        </select>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <select class="form-select" id="b">
                                        <option value="0">Select Brand</option>
                                            <?php
                                            for($b=0;$b<$bn;$b++){
                                                $br=$brandrs->fetch_assoc();
                                                ?>
                                                <option value="0"><?php echo $br["name"];?></option>
                                                <?php
                                            }
                                            ?>
                                          
                                        </select>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <select class="form-select" id="m">
                                            <option value="0">Select Model</option>
                                       
                                            <?php
                                            for($c=0;$c<$mn;$c++){
                                                $mr=$modelrs->fetch_assoc();
                                                ?>
                                                <option value="0"><?php echo $mr["name"];?></option>
                                                <?php
                                            }
                                            ?>
                                       
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-10 offset-0 offset-lg-1">
                        <div class="row">
                            <div class="col-12 col-lg-6 mb-3">
                                <select class="form-select" id="con">
                                    <option value="0">Select Condition</option>
                                
                                    <?php
                                            for($d=0;$d<$con;$d++){
                                                $conr=$conditionrs->fetch_assoc();
                                                ?>
                                                <option value="0"><?php echo $conr["name"];?></option>
                                                <?php
                                            }
                                            ?>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <select class="form-select" id="col">
                                    <option value="0">Select Colour</option>
                                
                                    <?php
                                            for($e=0;$e<$coln;$e++){
                                                $colr=$colors->fetch_assoc();
                                                ?>
                                                <option value="0"><?php echo $colr["name"];?></option>
                                                <?php
                                            }
                                            ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-10 offset-0 offset-lg-1">
                        <div class="row">
                            <div class="col-12 col-lg-6 mb-3">
                                <input type="text" class="form-control" placeholder="Price from" id="pf"/>
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <input type="text" class="form-control" placeholder="Price to" id="pt" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offset-0 offset-lg-2 col-12 col-lg-8 bg-white mt-3 mb-3 rounded">
                <div class="row">
                    <div class="offset-0 offset-lg-1 col-12 col-lg-10 text-center">
                        <div class="row">
                            <div class="col-6 card mb-3 mt-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4 mt-4">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 card mb-3 mt-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4 mt-4">
                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="offset-4 col-4 text-center">
                        <div class="offset-3 mb-5 pagination">
                            <a href="#">&laquo;</a>
                            <a href="#" class="ms-1 active">1</a>
                            <a href="#" class="ms-1">2</a>
                            <a href="#">&raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            
            require "footer.php";
            
            ?>

        </div>
    </div>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>