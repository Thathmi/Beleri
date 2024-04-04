<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Beleri | User login</title>
  
    <link rel="stylesheet" href="log.css"> 
    <link rel="stylesheet" href="bootstrap.css"> 
    <link rel="icon" href="resources/2.jpg"> 
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    
    <!---we had linked our css file----->
</head>

<body style="background-color:#FFB6C1; background-image: linear-gradient(180deg,#fffafa 0%, #FFF0F5	 100%); min-height:100vh">
    <div class="full-page">
     <div id="wish"></div>  
            
                <!-- <div style="width: 10px;height:auto;">
                <img src="resources/logo.svg" alt=""> 
                </div> -->
                
                <text class="topic">Be</text><text class="topic1">l</text><text class="topic2">eri</text><br/>
                <text class="caption" >First choice for purchase</text>
                
                <!---->
               
                
            
            <!-- <nav>
                <ul id='MenuItems'>

                    <li><a href='#'>About Us</a></li>
                    <li><a href='#'>Services</a></li>
                    <li><a href='#'>Contact</a></li>
                    <li><button class='loginbtn' onclick="document.getElementById('login-form').style.display='block'"
                            style="width:auto;">Signin</button></li>
                </ul>
            </nav> -->
            
       
        <div id='login-form' style="display:block" class='login-page'>
            <div class="form-box">
                <div class='button-box2'>
                    <div id='btn2'></div>
                    <button type='button' onclick='login()'  class='toggle-btn2' style="  outline: none;border: none;">Log In</button>
                    <button type='button' onclick='register()' class='a' style="  outline: none;border: none;">Register</button>
                </div>

                <?php

$e = "";
$p = "";

if (isset($_COOKIE["e"])) {
    $e = $_COOKIE["e"];
}

if (isset($_COOKIE["p"])) {
    $p = $_COOKIE["p"];
}
?>

                <div id='login' class='input-group-login' style="font-size:13px;">
                <p id="mssg1" style="color: red;font-size:13px;"></p>

                    <input type='text' class='input-field' placeholder='Enter email' id="e1" value="<?php echo $e; ?>" required>
                    <input type='password' class='input-field' placeholder='Enter Password' id="p1" value="<?php echo $p; ?>"  required>
                    <input type='checkbox' class='check-box'  id="remember" ><text class="r">Remember me</text>
                    <span class="f" onclick="forgot();">Forgot Password?</span>
                    <button  onclick="signIn();" class='submit-btn2' style="  outline: none;border: none;height:40px">Log in</button>
                </div>

                <div id='register' class='input-group-register' style="font-size:14px;margin-top:-20px">
                <p id="mssg" style="color: red;font-size:13px;"></p>

                    <input type='text' class='input-field' placeholder='First Name' id="f" required>
                    <input type='text' class='input-field' placeholder='Last Name ' id="l" required>
                    <input type='text' class='input-field' placeholder='Email ' id="e" >
                    <input type='text' class='input-field' placeholder='Mobile' id="m" required>
                    <!-- <input type='email' class='input-field' placeholder='' id="e" required> -->
                    <input type='password' class='input-field' placeholder='password' id="p" >


                    <button onclick="signup();" class='submit-btn2' style="  outline: none;border: none;height:40px">Register</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal-->
    <div class="modal fade" tabindex="-1" id="forgetpasswordModal1">
            <div class="modal-dialog">
                <div class="modal-content">  
                    <div class="modal-header">
                          <div class="row">
                            <div class="col-12">
                            <h5 class="modal-title">Password Reset</h5>
                            </div>
                            <div class="col-12">
                            <h6 style="font-size: 13px;color:rgb(155, 0, 0)">The verification code was send to your email. Please check your email.</h6>
                            </div>

                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row g-3">
                            <div class="col-6">
                                <label class="form-label">New Password</label>
                                <div class="input-group mb-3">
                                    <input class="form-control" type="password" id="np">
                                    <button class="btn btn-outline-primary" type="button" id="npb"
                                        onclick="showPassword1();">Show</button> 
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Re-type Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="rnp" />
                                    <button class="btn btn-outline-primary" id="rnpb" onclick="showPassword2();"
                                        type="button">Show</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Verification Code</label>
                                <input type="text" class="form-control" id="vc" />
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

    <script>
    var x = document.getElementById('login');
    var y = document.getElementById('register');
    var z = document.getElementById('btn2');

    function register() {
        x.style.left = '-400px';
        y.style.left = '50px';
        z.style.left = '110px';
    }

    function login() {
        x.style.left = '50px';
        y.style.left = '450px';
        z.style.left = '0px';
    }
    </script>
    <script>
    var modal = document.getElementById('login-form');
    window.onclick = function(event) {
        if (event.target == modal) {
            // modal.style.display = "none";
        }
    }
    </script>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>

</html>