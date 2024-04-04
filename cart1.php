<!DOCTYPE html>
<html>

<head>
    <title>eShop | Cart</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php
            require "header.php";
            ?>

            <div class="col-12" style="background-color: #e3e5e4;">

                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </nav>

            </div>

            <div class="col-12 border border-2 border-secondary rounded mb-3">
                <div class="row">

                    <div class="col-12">
                        <label class="form-label fs-2 fw-bolder">Shopping Cart <i class="bi bi-cart3"></i></label>
                    </div>
                    <div class="col-12 col-lg-6">
                        <hr class="hrbreak1">
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="offset-0 offset-lg-2 col-12 col-lg-6 mb-2">
                                <input type="text" class="form-control " placeholder="Search in shopping cart" />

                            </div>
                            <div class="col-12 col-lg-2 d-grid mb-2">
                                <button class="btn btn-outline-primary">Search</button>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <hr class="hrbreak1">
                    </div>
                    <!-- <div class="col-12">
                        <div class="row">
                            <div class="emptycart col-12"></div>
                            <div class="col-12 text-center">
                                <label class="form-label fs-2 fw-bold">You have no item in the cart</label>
                            </div>
                            <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid mb-4">
                                <a href="home.php" class="btn btn-primary btn-sm fs-5 ">Start Shopping</a>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-12 col-lg-9">
                        <div class="row">

                            <!-- card -->

                            <div class="card mb-3 mx-0 mx-lg-2 col-12">
                                <div class="row g-0">

                                    <div class="col-md-12 mt-2 mb-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="fw-bold text-black-50 fs-6">Seller : </span>&nbsp;
                                                <span class="fw-bold text-black fs-6">Seller : </span>&nbsp;

                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="col-md-4">
                                        <img src="resources/mobile images/iphone12.jpg" class="img-fluid rounded-start"
                                            alt="...">
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card-body">
                                            <h3 class="card-title fw-bold">iPhone 12</h3>
                                            <span class="fw-bold text-black-50">color : blue
                                            </span>&nbsp;|
                                            &nbsp; <span class="fw-bold text-black-50">Condition :
                                                new</span><br />
                                            <span class="fw-bold text-black-50 ">Price :</span>&nbsp;
                                            <span class="fw-bolder text-black">Rs. 90 000.00
                                            </span>
                                            <br />
                                            <span class="fw-bold text-black-50 ">quantity :</span>&nbsp;
                                            <input type="text" value="1"
                                                class="mt-3 border border-1 rounded border-secondary fs-5 px-3 cardqtytext">
                                            <br />
                                            <span class="fw-bold text-black-50 ">Delivery fee :</span>&nbsp;
                                            <span class="fw-bolder text-black">Rs. 90.00
                                            </span>

                                        </div>
                                    </div>
                                    <div class="col-md-3 mt-4">
                                        <div class="card-body d-grid">
                                            <a href="#" class="btn btn-outline-success mb-2">Buy now</a>

                                            <a class="btn btn-outline-danger mb-2">Remove</a>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="col-md-12 mt-1 mb-3">
                                        <div class="row">
                                            <div class="col-6 col-md-6">
                                                <span class="fw-bold fs-6 text-black-50">Requested Total :<i
                                                        class="bi bi-info-circle"></i></span>
                                            </div>

                                            <div class="col-6 col-md-6 text-end">
                                                <span class="fw-bold fs-6 text-black-50">Rs. 90 000</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- card -->
                            </div>
                        </div>
                    </div>

                        <div class="col-12 col-lg-3">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label fs-4 fw-bold ">Summery</label>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-6">
                                    <span class="fs-6 fw-bold">Items (1)</span>
                                </div>

                                <div class="col-6 text-end">
                                    <span class="fs-6 fw-bold">Rs. 90 000</span>
                                </div>

                                <div class="col-6 mt-1">
                                    <span class="fs-6 fw-bold">Shipping </span>
                                </div>

                                <div class="col-6 text-end mt-1">
                                    <span class="fs-6 fw-bold">Rs. 90</span>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-6 mt-1">
                                    <span class="fs-5 fw-bold">Total </span>
                                </div>

                                <div class="col-6 text-end mt-1">
                                    <span class="fs-5 fw-bold">Rs. 90 090</span>
                                </div>

                                <div class="col-12 mt-3 mb-3 d-grid">
                                    <button class="btn btn-primary fs-6 btn-sm fw-bold">CHECKOUT</button>
                                </div>

                            </div>
                        </div>

                    
                </div>

                <?php
                require "footer.php";
                ?>
            </div>
        </div>

        <script src="cart.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.min.js"></script>
        <script src="bootstrap.bundle.js"></script>
</body>

</html>