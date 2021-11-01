<?php
session_start();
include_once 'config.php';
$pid = $_SESSION["pid"];
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){
    header("location: index.php");
    exit;
}
$q = "SELECT * FROM `pinfo` WHERE `pid` = '$pid'";
$r = mysqli_query($conn, $q);
// if (mysqli_num_rows($r) > 0) {
//    // output data of each row
//    while($row = mysqli_fetch_assoc($r)) {
//      $pid =  $row["pid"];
//    }
//  }
// $sql = "SELECT * FROM `mreports` WHERE pid='$pid'";
// $result = mysqli_query($conn, $sql);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top" style="
        top: 0px;
    ">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="index.html">MY HEALTH CARD</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    
                    <li>
                        <a href="logout.php">Log Out</a>
                    </li>

                </ul>
            </nav><!-- .nav-menu -->

            <button type='button' class="appointment-btn scrollto" data-toggle="modal" data-target="#popUpWindow"
                style="border: none;">Register</button>

        </div>
    </header><!-- End Header -->
    <header class="masthead masthead-page mb-5" style="background-color: blue;padding-top: 50px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 py-5">
                    <h1 class="mt-4" style="
        color: white;
    ">Health Dashboard</h1>
                    <p class="m-0" style="
        color: white;
    "></p>
                </div>
                <div class="col-lg-4">
                </div>
            </div>
        </div>
        <svg style="pointer-events: none" class="wave" width="100%" height="50px" preserveAspectRatio="none"
            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 75">
            <defs>
                <style>
                    .a {
                        fill: none;
                    }

                    .b {
                        clip-path: url(#a);
                    }

                    .c,
                    .d {
                        fill: #f9f9fc;
                    }

                    .d {
                        opacity: 0.5;
                        isolation: isolate;
                    }
                </style>
                <clipPath id="a">
                    <rect class="a" width="1920" height="75"></rect>
                </clipPath>
            </defs>
            <title>wave</title>
            <g class="b">
                <path class="c"
                    d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48">
                </path>
            </g>
            <g class="b">
                <path class="d"
                    d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10">
                </path>
            </g>
            <g class="b">
                <path class="d"
                    d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24">
                </path>
            </g>
            <g class="b">
                <path class="d"
                    d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150">
                </path>
            </g>
        </svg>
    </header>


    <!-- ======= Doctor prescription ======= -->
    <!-- <section id="doctors" class="doctors">
        <div class="container">

            <div class="section-title">
                <h2>Doctor Prescription</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit
                    in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="member d-flex align-items-start" style="box-shadow: 0px 2px 15px rgb(0 0 0 / 8%);">
                        <div class="member-info">
                            <h4>Dr. Ankur</h4>
                            <span>22 Jan 2021</span>
                            <p>Prescription for through pain</p>
                            <div class="social">
                                <a href=""><i class="ri-twitter-fill"></i></a>
                                <a href=""><i class="ri-facebook-fill"></i></a>
                                <a href=""><i class="ri-instagram-fill"></i></a>
                                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="member d-flex align-items-start">
                        <div class="member-info">
                            <h4>Dr. Sharma</h4>
                            <span>15 May 2020</span>
                            <p>Prescription for stomach pain</p>
                            <div class="social">
                                <a href=""><i class="ri-twitter-fill"></i></a>
                                <a href=""><i class="ri-facebook-fill"></i></a>
                                <a href=""><i class="ri-instagram-fill"></i></a>
                                <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </section> -->
    <!-- End Doctor prescription -->

    <!-- ======= General Patient Info ======= -->
    <section id="doctors" class="doctors">
        <div class="container">

            <div class="section-title">
                <h2>General Health Info</h2>
                <p></p>
            </div>
            <?php
while($row = mysqli_fetch_assoc($r)) {
    
            echo'<form action="">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Name : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel" value="'.$row["name"].'" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Age : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel" value="'.$row["age"].'" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Gender : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel" value="'.$row["gender"].'" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Blood Group : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel" value="'.$row["bloodgroup"].'" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Weight(Kilograms) : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel" value="'.$row["weight"].'" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Height(Centimeters) : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel" value="'.$row["height"].'" readonly>
                    </div>
                </div>
                
        </div>
        </form>';
}
        ?>
        </div>
    </section>
</body>

</html>