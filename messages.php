<?php

session_start();

if (isset($_SESSION["u"])) {
    $u = $_SESSION["u"];
    $customer =$u["email"];//sender
    
    $email ="dulanjana1226@gmail.com" ;//reciever

?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>Beleri | Messages</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="resources/2.jpg" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
    </head>

    <body onload="refresher('<?php echo $email; ?>');">

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
                      

                              
                                echo $u["fname"];
                                ?>
                          
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
                                <div class="col-1  col-lg-1 ms-lg-3 ms-5 " onclick="wish();"><i class="bi bi-suit-heart " style="color: black;font-size: 18px;margin-right:10px;"></i></div>
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

        <div class="container-fluid">
            <div class="row">
             

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12 py-5 px-4" >
                    <div class="row rounded-lg  shadow" >
                        <div class="col-5 px-0">
                            <div class="bg-white">

                                <div class="bg-gray px-4 py-2 bg-light">
                                    <p class="h5 mb-0 py-1">Recent</p>
                                </div>

                                <div class="messages-box">
                                    <div class="list-group rounded-0" id="rcv">

                                        

                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- massage box -->
                        <div class="col-7 px-0">
                            <div class="row px-4 py-5 chat-box bg-white" id="chatrow"><!-- massage load venne methana -->


                            </div>
                        </div>

                        <div class="offset-5 col-7" >
                            <div class="row bg-white">

                                <!-- text -->
                                <div class="col-12" >
                                    <div class="row">
                                        <div class="input-group" >
                                            <input type="text" id="msgtxt" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                                            <div class="input-group-append">
                                                <button id="button-addon2" class="btn btn-link fs-1" onclick="sendmessage('<?php echo $email; ?>');"> <i class="bi bi-cursor-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- text -->

                            </div>
                        </div>

                    </div>
                </div>

                <?php require "footer.php"; ?>
            </div>
        </div>



        <script src="massage.js"></script>
        <script src="bootstrap.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="bootstrap.bundle.js"></script>

    </body>

    </html>

<?php

}else{
    ?>
<script>
    window.location = "log.php";
</script>
    <?php
}

?>