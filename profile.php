<?php
session_start();
include "config.php";
include "display.php";
include "update.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guvi</title>
    <link rel="icon" type="image/x-icon" href="img/guvi-website-favicon-color.svg">
    <!-- BOOTSTRAP ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Boostrap includes -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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

        body::before {
            display: block;
            content: "";
            height: 60px;
        }

        .profilepicture {
            filter: drop-shadow(0px 0px 13px #4E973F);
        }

        a {
            text-decoration: none;
            color: #212124;
        }
    </style>

</head>

<body style="background-color: #eee;">
    <!-- Edit Modal -->
    <!-- Modal body-->
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content p-2">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Details </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">

                    <form id="upd">
                        <div id="errorMessage" class="alert alert-warning d-none"></div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload image</label>
                            <input class="x form-control" type="file" accept="image/*" id="formFile" name="profilepic">
                        </div>
                        <div class=" mb-3">
                            <span class="bi-person-lines-fill"></span>
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter new username">
                        </div>
                        <div class="mb-3 bi-calendar-date">
                            <label for="dob" class="form-label">Date Of Birth</label>
                            <input type="date" name="dob" class="form-control" id="dob" placeholder="Enter name">
                        </div>
                        <div class="mb-3 bi-telephone-fill">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Ex: 97845 02316">
                        </div>
                        <div class=" mb-3">
                            <i class="bi bi-geo-fill"></i>
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="Ex: Karur">
                        </div>
                        <div class=" mb-3">
                            <span class="bi-geo-alt-fill"></span>
                            <label for="state" class="form-label">State</label>
                            <input type="text" name="state" class="form-control" id="state" placeholder="Ex: Tamil Nadu">
                        </div>
                        <div class=" mb-3">
                            <span class="bi-mailbox"></span>
                            <label for="zip" class="form-label">Zip</label>
                            <input type="text" name="zip" class="form-control" id="zip" placeholder="Ex: 639 004">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="upd" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Social Media Modal Start-->
    <div class="modal fade" id="linkmodal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content p-2">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Links </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">

                    <form id="link">
                        <div id="errorMessage" class="alert alert-warning d-none"></div>
                        <div class=" mb-3">
                            <span class="bi-linkedin"></span>
                            <label for="linkedin" class="form-label">Linkedin</label>
                            <input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="Ex: https://linkedin.com/ramesh">
                        </div>
                        <div class=" mb-3">
                            <i class="bi bi-github"></i>
                            <label for="github" class="form-label">Github</label>
                            <input type="text" name="github" class="form-control" id="github" placeholder="Ex: https://github.com/ramesh">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="link" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Navigation Bar Start-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand ps-2" href="#">
                <img src="img/logo-no-background.svg" alt="" width="100" height="44" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item my-2 mx-2">
                        <a class="nav-link btn btn-danger text-light logout" type="button">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Displaying Content-->
    <section id="contentContainer">
        <div class="container vh-100 py-5">
            <div class="row">
                <div class="col-lg-4 disp ">
                    <div class="card mb-4 shadow">
                        <div class="card-body text-center" id="leftcard">
                            <div class="rounded-circle overflow-hidden mx-auto my-3  profilepicture" style="width: 150px; height: 150px;">
                                <img src="<?php echo $profilepic . '?' . time(); ?>" alt="avatar" class="img-fluid " style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <h5 class="my-4 fs-3"><?php echo $name; ?></h5>
                            <p class="text-muted mb-4">
                                <?php
                                if ($city === null || $state == null || $zip == null) {
                                    echo 'NA , NA , NA';
                                } else {
                                    echo $city . ', ' . $state . ', ' . $zip;
                                }
                                ?></p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="bi bi-pencil-square"></span>&nbsp;Edit Profile</button>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0 shadow-lg">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center pt-4 pb-3 px-5 ">
                                    <i class="bi bi-linkedin h2 text-primary"></i>
                                    <a href="<?php
                                                if ($linkedin !== null) {
                                                    echo $linkedin;
                                                }
                                                ?>" target="_blank" class="mb-0"><?php
                                                                                    if ($linkedin === null) {
                                                                                        echo 'NA';
                                                                                    } else {
                                                                                        echo 'Click to redirect';
                                                                                    }
                                                                                    ?></a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center pt-4 pb-3 px-5">
                                    <i class="bi bi-github h2 text-dark"></i>
                                    <a href="<?php
                                                if ($github !== null) {
                                                    echo $github;
                                                }
                                                ?>" target="_blank" class="mb-0"><?php
                                                                                    if ($github === null) {
                                                                                        echo 'NA';
                                                                                    } else {
                                                                                        echo 'Click to redirect';
                                                                                    }
                                                                                    ?></a>
                                </li>

                                <li class="list-group-item d-flex justify-content-center align-items-center p-3 mb-2">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#linkmodal"><span class="bi bi-pencil-square"></span>&nbsp;Edit links</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4 shadow-lg">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $name; ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $email; ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Date of Birth</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php
                                                                if ($dob === null) {
                                                                    echo 'NA';
                                                                } else {
                                                                    echo $dob;
                                                                }
                                                                ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Age</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php
                                        if ($age === null) {
                                            echo 'NA';
                                        } else {
                                            echo $age . ' years';
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mobile</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php
                                                                if ($mobile === null) {
                                                                    echo 'NA';
                                                                } else {
                                                                    echo $mobile;
                                                                }
                                                                ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">City</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php
                                                                if ($city === null) {
                                                                    echo 'NA';
                                                                } else {
                                                                    echo $city;
                                                                }
                                                                ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">State</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php
                                                                if ($state === null) {
                                                                    echo 'NA';
                                                                } else {
                                                                    echo $state;
                                                                }
                                                                ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Postal Code</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php
                                                                if ($zip === null) {
                                                                    echo 'NA';
                                                                } else {
                                                                    echo $zip;
                                                                }
                                                                ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- All scripts used -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- logout script -->
    <script>
        $(document).on('click', '.logout', function(e) {
            e.preventDefault();

            if (confirm('Are you sure you want to logout?')) {
                $.ajax({
                    type: "POST",
                    url: "logout.php",
                    data: {
                        'logout': true
                    },
                    success: function(response) {

                        var res = jQuery.parseJSON(response);
                        if (res.status == 200) {

                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(res.message);
                            setTimeout(function() {
                                window.location.href = "index.php";
                            }, 1000);
                        }
                    }
                });
            }
        });
    </script>
    <!-- Profile Updation Script -->
    <script>
        $(document).on('submit', '#upd', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_reg", true);
            // Remove whitespace from the zip input value
            formData.set('zip', formData.get('zip').replace(/\s+/g, ''));
            console.log("Entered jquery");
            console.log(formData);
            $.ajax({
                type: "POST",
                url: "update.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    console.log(response);
                    if (res.status == 500) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    } else if (res.status == 200) {
                        $('#upd')[0].reset();

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);
                        var profilePicElement = document.querySelector('.img-fluid');
                        if (profilePicElement) {
                            var currentSrc = profilePicElement.getAttribute('src');
                            var updatedSrc = currentSrc + '?' + new Date().getTime();
                            profilePicElement.setAttribute('src', updatedSrc);
                            $('#contentContainer').load(window.location.href + ' #contentContainer');
                        }
                        $('#exampleModal').modal('hide');

                    } else if (res.status == 400) {
                        $('#errorMessage').addClass('d-none');
                        $('#upd')[0].reset();
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.error(res.message);
                    }
                }
            });

        });
    </script>
    <!-- Social Link Updation -->
    <script>
        $(document).on('submit', '#link', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("linkclick", true);

            console.log(formData);
            $.ajax({
                type: "POST",
                url: "update.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 500) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    } else if (res.status == 200) {
                        $('#link')[0].reset();

                        $('#contentContainer').load(window.location.href + ' #contentContainer');
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);
                        $('#linkmodal').modal('hide');

                    } else if (res.status == 404) {
                        $('#errorMessage').addClass('d-none');
                        $('#link')[0].reset();
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.error(res.message);
                    }
                }
            });

        });
    </script>
</body>

</html>
