<?php
// require '../configuration.php';

// reg();
?>


<doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/chatvia/layouts/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 12:38:15 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Register | TalkIt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive Bootstrap 4 Chat App" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/wimit.png">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


    </head>

    <body class=" bg-soft-primary">


        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center mb-4">
                            <a href="index.html" class="auth-logo mb-5 d-block">
                                <img src="assets/images/wimit.png" alt="" height="20" class="logo logo-dark">
                                <img src="assets/images/wimit.png" alt="" height="20" class="logo logo-light">
                            </a>

                            <h4 style="color: purple;">Register Now</h4>
                            <p class="text-muted mb-4">Get an account with TalkIt now.</p>
                            
                        </div>

                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-3">
                                    <form action="" method="post" id='form'>

                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <div class="input-group bg-soft-light rounded-3  mb-3">
                                                <span class="input-group-text text-muted" id="basic-addon5">
                                                    <i class="ri-user-2-line"></i>
                                                </span>
                                                <input type="text" id='uid' name="username" class="form-control form-control-lg bg-soft-light border-light" placeholder="Enter Username" aria-label="Enter Email" aria-describedby="basic-addon5">
                                                
                                            </div>
                                        </div>
    
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <div class="input-group bg-soft-light mb-3 rounded-3">
                                                <span class="input-group-text border-light text-muted" id="basic-addon6">
                                                    <i class="ri-mail-line"></i>
                                                </span>
                                                <input type="email" id='mail' name="email" class="form-control form-control-lg bg-soft-light border-light" placeholder="Enter Email" aria-label="Enter Username" aria-describedby="basic-addon6">
                                                
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Phone No.</label>
                                            <div class="input-group bg-soft-light mb-3 rounded-3">
                                                <span class="input-group-text border-light text-muted" id="basic-addon7">
                                                    <i class="ri-phone-line"></i>
                                                </span>
                                                <input type="tel" id='fone' name="fone" class="form-control form-control-lg bg-soft-light border-light" placeholder="Enter Phone No." aria-label="Enter Password" aria-describedby="basic-addon7">
                                                
                                            </div>
                                        </div>


                                        <div class="mb-4">
                                            <label class="form-label">Password</label>
                                            <div class="input-group bg-soft-light mb-3 rounded-3">
                                                <span class="input-group-text border-light text-muted" id="basic-addon7">
                                                    <i class="ri-lock-2-line"></i>
                                                </span>
                                                <input type="password" id='pwd' name="pwd" class="form-control form-control-lg bg-soft-light border-light" placeholder="Enter Password" aria-label="Enter Password" aria-describedby="basic-addon7">
                                                
                                            </div>
                                        </div>


                                        <div class="mb-4">
                                            <label class="form-label">Confirm Password</label>
                                            <div class="input-group bg-soft-light mb-3 rounded-3">
                                                <span class="input-group-text border-light text-muted" id="basic-addon7">
                                                    <i class="ri-lock-2-line"></i>
                                                </span>
                                                <input type="password" id='repwd' name="re_pwd" class="form-control form-control-lg bg-soft-light border-light" placeholder="Confirm Password" aria-label="Enter Password" aria-describedby="basic-addon7">
                                                
                                            </div>
                                        </div>


                                        <div class="mb-4">
                                            <label class="form-label">Invite Code</label>
                                            <div class="input-group bg-soft-light mb-3 rounded-3">
                                                <span class="input-group-text border-light text-muted" id="basic-addon7">
                                                    <!-- <i class="ri-lock-2-line"></i> -->
                                                </span>
                                                <input type="text" id='code' name="Invite Code" class="form-control form-control-lg bg-soft-light border-light" placeholder="Enter Invite Code" aria-label="Enter Invite Code" aria-describedby="basic-addon7">
                                                
                                            </div>
                                        </div>


                                        <div class="d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" id='btn' type="submit" name="reg">Register</button>
                                        </div>

                                        <div id="msg"></div>

                                        <div class="mt-4 text-center">
                                            <p class="text-muted mb-0">By registering you agree to the TalkIt <a href="#" class="text-primary">Terms of Use</a></p>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <p>Already have an account ? <a href="auth-login.php" class="fw-medium text-primary"> Login here </a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script></p>
                            <!-- <p>© <script>document.write(new Date().getFullYear())</script> Chatvia. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->



        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- <script src="assets/js/app.js"></script>
        <script src="script.js"></script> -->

        <script src="../config.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/chatvia/layouts/auth-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 12:38:15 GMT -->
</html>
