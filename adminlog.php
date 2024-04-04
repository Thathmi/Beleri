<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Beleri | Admin </title>
  
    <link rel="stylesheet" href="log.css"> 
    <link rel="stylesheet" href="bootstrap.css"> 
    <link rel="icon" href="resources/2.jpg"> 
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    
    <!---we had linked our css file----->
</head>

<body style="background-color:#FFB6C1; background-image: linear-gradient(180deg,#fffafa 0%, #FEF7E7	 100%); min-height:100vh">
    <div class="full-page">
       
        <div id="wish"></div>    
                <!-- <div style="width: 10px;height:auto;">
                <img src="resources/logo.svg" alt=""> 
                </div> -->
                
                <text class="topic">Be</text><text class="topic1">l</text><text class="topic2">eri</text><br/>
                <text class="caption" >First choice for purchase</text>
                
                <!---->
               
                
            
          
            
       
        <div id='login-form' style="display:block" class='login-page'>
      
            <div class="form-box">  
                <!-- <text style="text-align:center;color:whitesmoke;font-size:large;text-decoration:underline">Admin login</text> -->
                <div class='button-box3'>
                    <div id='btn3'></div>
                    <button type='button' onclick='login()'  class='toggle-btn3' style="  outline: none;border: none;">Admin Log In</button>
                  
                </div>



                <div id='login' class='input-group-login' style="font-size:13px;">
                <p id="mssg1" style="color: red;font-size:13px;"></p>

                    <input type='text' class='input-field' placeholder='Enter email' id="e"  required>
                  
                 
                    <button onclick="code();"  class='submit-btn3' style="  outline: none;border: none;">Send Verification code</button>
                </div>

           
            </div>
        </div>
    </div>

    <!-- modal-->
    <div class="modal fade" tabindex="-1" id="codeModal">
            <div class="modal-dialog">
                <div class="modal-content">  
                    <div class="modal-header">
                    <h6 style="font-size: 13px;color:rgb(155, 0, 0)">verification email sent,please check your inbox.</h6>
                          
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                       
                            <div class="col-12">
                                <label class="form-label">Verification Code</label>
                                <input type="text" class="form-control" id="vc" />
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="codemodal();">sign in</button>

                    </div>
                 
                </div>
            </div>
        </div>
        <!-- modal-->

    <script>
    var x = document.getElementById('login');
    var y = document.getElementById('register');
    var z = document.getElementById('btn3');

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
  <script src="admin.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   
</body>

</html>