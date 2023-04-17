<?php
// require '../configuration.php';




?>

<!doctype html>
<html lang="en">
    
<!-- Mirrored from themesbrand.com/chatvia/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 12:38:03 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Log in | Chatvia - Responsive Bootstrap 4 Chat App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive Bootstrap 4 Chat App" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


    </head>

    <body>

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center mb-4">
                            <a href="index.html" class="auth-logo mb-5 d-block">
                                <img src="assets/images/logo-dark.png" alt="" height="30" class="logo logo-dark">
                                <img src="assets/images/logo-light.png" alt="" height="30" class="logo logo-light">
                            </a>

                            <h4>Sign in</h4>
                            <p class="text-muted mb-4">Sign in to continue to Chatvia.</p>
                            
                        </div>

                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-3">
                                    <form action="" id='logInForm' method = "post">
                                    <div class="msg"></div>
                                    
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <div class="input-group mb-3 bg-soft-light rounded-3">
                                                <span class="input-group-text text-muted" id="basic-addon3">
                                                    <i class="ri-user-2-line"></i>
                                                </span>
                                                <input type="text" id='uid' name='Username' class="form-control form-control-lg border-light bg-soft-light" placeholder="Enter Username" aria-label="Enter Username" aria-describedby="basic-addon3">
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <div class="float-end">
                                                <a href="auth-recoverpw.html" class="text-muted font-size-13">Forgot password?</a>
                                            </div>
                                            <label class="form-label">Password</label>
                                            <div class="input-group mb-3 bg-soft-light rounded-3">
                                                <span class="input-group-text text-muted" id="basic-addon4">
                                                    <i class="ri-lock-2-line"></i>
                                                </span>
                                                <input type="password" id='pwd' name='pwd' class="form-control form-control-lg border-light bg-soft-light" placeholder="Enter Password" aria-label="Enter Password" aria-describedby="basic-addon4">
                                                
                                            </div>
                                        </div>

                                        <div class="form-check mb-4">
                                            <input type="checkbox" class="form-check-input" id="remember-check">
                                            <label class="form-check-label" for="remember-check">Remember me</label>
                                        </div>

                                        <div class="d-grid">
                                            <button class="btn btn-primary name='signin' waves-effect waves-light" type="submit">Sign in</button>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <p>Don't have an account ? <a href="auth-register.php" class="fw-medium text-primary"> Signup now </a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script> Chatvia. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
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

        <!-- <script src="assets/js/app.js"></script> -->
        <script src="../login.js"></script>
        

    </body>

<!-- Mirrored from themesbrand.com/chatvia/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 31 May 2022 12:38:05 GMT -->
</html>
