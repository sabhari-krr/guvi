<?php

include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Guvi</title>
    <link rel="icon" type="image/x-icon" href="img/guvi-website-favicon-color.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!--BTS ICON-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <!--ALERTIFY-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz@9..40&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'DM Sans', sans-serif;
        }

        body {
            background: linear-gradient(45deg, #4A4D4B, #8ABE53, #8ABE53, #FFFFFF);

        }

        @media (max-width: 1000px) {

            /* #1210 was set */
            .right {
                display: none !important;

            }

            .left {
                width: auto !important;
            }

            .container {
                backdrop-filter: blur(3.5px) !important;


            }

        }

        .left {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .container {

            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(3.5px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .right {
            display: flex;
            flex-direction: column;
            justify-content: center;

        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Resistration Modal body-->
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-2">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">

                    <form id="reg">
                        <div id="errorMessage" class="alert alert-warning d-none"></div>
                        <div class="class mb-3 text-center">
                            <img src="img/logo-no-background.svg" class="image-fluid" alt="Guvi Logo" width="50%" height="25%">
                        </div>
                        <div class=" mb-3">
                            <span class="bi-envelope-fill"></span>
                            <label for="mail" class="form-label">Email
                                address</label>
                            <input type="email" name="email" class="form-control" id="mail" placeholder="Enter email">
                        </div>
                        <div class="mb-3 bi-person-lines-fill">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                        </div>
                        <div class="mb-3 bi-key-fill">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="pwd" class="form-control" id="password" placeholder="Enter password">
                        </div>
                        <div class="mb-3 bi-telephone-fill">
                            <label for="phone" class="form-label">Mobile
                                number</label>
                            <input type="number" name="mobile" class="form-control" id="phone" placeholder="Enter Mobile number">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="reg" class="btn btn-success ">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Forgot password modal body -->
    <div class="modal fade" id="forgotpasswordmodal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content p-2">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Password </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">

                    <form id="forgotpassword">
                        <div id="pwderrorMessage" class="alert alert-warning d-none"></div>
                        <div class="mb-3">
                            <i class="bi-envelope-fill "></i>
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class=" mb-3">
                            <i class="bi bi-telephone-fill"></i>
                            <label for="mobile" class="form-label">Mobile number</label>
                            <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter your mobile number">
                        </div>
                        <div class=" mb-3">
                            <i class="bi bi-lock-fill"></i>
                            <label for="newpwd" class="form-label">New password</label>
                            <input type="password" name="newpwd" class="form-control" id="newpwd" placeholder="Enter new password">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="forgotpassword" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="user"></div>
    <div class="container d-flex justify-content-center align-items-center vh-100  text-center ">
        <div class="left w-50 gy-sm-3 gy-md-2 py-5 d-flex flex-column align-items-center">
            <div class="welcomemsg">
                <p class="display-6 mb-5">Welcome...!</p>
            </div>
            <form id="log">
                <div class="row mx-auto">

                    <div id="loginerrorMessage" class="alert alert-danger d-none col-auto justify-content-center mx-auto text-center rounded-3 shadow"></div>
                </div>
                <div class="form-content row mx-1">
                    <div class="col-12 form-floating mb-5">
                        <input type="email" class="form-control rounded-pill" name="email" id="floatingInput" placeholder="name@example.com" />
                        <label for="floatingInput">&nbsp;&nbsp;&nbsp;&nbsp;Email address</label>
                    </div>
                    <div class="col-12 form-floating mb-5">
                        <input type="password" class="form-control rounded-pill" name="pwd" id="floatingInput" placeholder="name@example.com" />
                        <label for="floatingInput">&nbsp;&nbsp;&nbsp;&nbsp;Password</label>
                    </div>
                </div>


                <div class="d-grid d-block col-7 mx-auto mb-3 ">
                    <button class="btn-lg btn-outline-success bg-success text-light rounded-pill" type="submit" name="log">
                        Login
                    </button>
                </div>

            </form>
            <!-- Modal Button-->
            <div class="d-grid d-block col-7 mx-auto mb-3">
                <button class="btn-lg  btn-outline-success rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Create Account
                </button>
            </div>


            <div class="row ">
                <div class="col-auto mx-auto">
                    <button type="button" class="btn-md btn-outline-success bg-success text-light rounded-pill p-1 px-3" data-bs-toggle="modal" data-bs-target="#forgotpasswordmodal"><i class="bi bi-lock-fill"></i>&nbsp;Forgot password</button>
                </div>
            </div>
        </div>
        <div class="right h-75 w-50 align-items-center justify-content-center">
            <img src="img/animatedlogin1.svg" alt="loginimage" width="500" height="500">

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!--REGISTRATION SCRIPT-->
    <script>
        $(document).on('submit', '#reg', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_reg", true);

            console.log(formData);
            $.ajax({
                type: "POST",
                url: "insert.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    console.log(res);
                    console.log(1);
                    if (res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    } else if (res.status == 200) {
                        $('#errorMessage').addClass('d-none');
                        $('#reg')[0].reset();

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);
                        setTimeout(function() {
                            window.location.href = "index.php";
                        }, 2000);

                    } else if (res.status == 500) {
                        $('#errorMessage').addClass('d-none');
                        $('#reg')[0].reset();
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.error(res.message);
                    }
                }
            });

        });
    </script>
    <!--LOGIN SCRIPT-->
    <script>
        $(document).on('submit', '#log', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("log", true);

            console.log(formData);
            $.ajax({
                type: "POST",
                url: "session.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    console.log(res);
                    console.log(1);
                    if (res.status == 422) {
                        $('#loginerrorMessage').removeClass('d-none');
                        $('#loginerrorMessage').text(res.message);

                    } else if (res.status == 200) {
                        $('#loginerrorMessage').addClass('d-none');
                        $('#reg')[0].reset();

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);
                        setTimeout(function() {
                            window.location.href = "profile.php";
                        }, 1000);

                    } else if (res.status == 500) {
                        $('#loginerrorMessage').addClass('d-none');
                        $('#reg')[0].reset();
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.error(res.message);

                    } else if (res.status == 404) {
                        $('#errorMessage').addClass('d-none');
                        $('#reg')[0].reset();
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.error(res.message);

                    }
                }
            });

        });
    </script>
    <!-- FORGOT PASSWORD SCRIPT -->
    <script>
        $(document).on('submit', '#forgotpassword', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("fpwd", true);
            // Remove whitespace from the zip input value
            console.log(formData);
            $.ajax({
                type: "POST",
                url: "updatepwd.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    console.log(response);
                    if (res.status == 404) {
                        $('#pwderrorMessage').removeClass('d-none');
                        $('#pwderrorMessage').text(res.message);

                    } else if (res.status == 200) {
                        $('#forgotpassword')[0].reset();

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);
                        $('#forgotpasswordmodal').modal('hide');
                        setTimeout(function() {
                            window.location.href = "index.php";
                        }, 1000);

                    } else if (res.status == 500) {
                        $('#pwderrorMessage').addClass('d-none');
                        $('#forgotpassword')[0].reset();
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.error(res.message);
                    } else if (res.status == 400) {
                        $('#forgotpassword')[0].reset();
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.error(res.message);
                    }
                }
            });

        });
    </script>
</body>

</html>
