<!DOCTYPE html>
<html>
    <head>
        <title></title>
    
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.svg" />

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="font&hr.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style="background-color: #74EBD5; background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%); min-height:100vh">
        <div class="container-fluid justify-content-center " style="margin-top: 50px;">
            <div class="row align-content-center">

            <div class="col-12">
               <div class="row">
                   <div class="col-12 logo"></div>
                   <div class="col-12">
                       <p class="text-center title1">Hi, Welcome To eshop Admin</p>
                   </div>

               </div>

            </div>
<div class="col-12 p-5">
    <div class="row">
        <div class="col-6 d-none d-lg-block background-image" style="height: 250px;"> </div>
        <div class="col-12 col-lg-6 d-block">
            <div class="row g-3">
                <div class="col-12">
                    <p class="title2">Sign In To Your Account.</p>
                </div>
                <div class="col-12">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" id="e">
                </div>
           

                <div class="col-12 col-lg-6 d-grid">
                    <button class="btn btn-primary" onclick="code();" > Send Verification Code To Login</button>
                </div>
                
                <div class="col-12 col-lg-6 d-grid">
                    <button class="btn btn-danger"> Back to User's Login</button>
                </div>

            </div>
        </div>
    </div>
</div>

   <!-- modal-->
   <div class="modal fade" tabindex="-1" id="codeModal">
            <div class="modal-dialog">
                <div class="modal-content">  
                    <div class="modal-header">
                        <h5 class="modal-title">Verification code to admin panel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                       
                            <div class="col-12">
                                <label class="form-label">Verification Code</label>
                                <input type="text" class="form-control" id="vc" />
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="codemodal();">Sign In</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal-->


<div class="col-12 d-none d-lg-block fixed-bottom">
    <p class="text-center">&copy;2021 Beleri.lk All Rights Reserved.</p>
</div>

            </div>

        </div>

        <script src="admin.js"></script>
        
       
        <script src="bootstrap.js"></script>
    </body>
</html>