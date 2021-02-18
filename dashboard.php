<?php
session_start();
include "config.php";
// if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] ==true ){
//     header("location: index.php");
//     exit;
// }

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){
    header("location: index.php");
    exit;
}
$pid = $_SESSION['pid'];
$name = $_SESSION['name'];
$age = $_SESSION['age'];
$gender = $_SESSION['gender'];
$shareurl = "http://localhost/HealthCard/shareprofile.php?pid=".$pid;;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $shareemail = $_POST["shareemail"];
$sqlshareemail = "INSERT INTO `sharewith`(`pid`, `shareemail`, `sharetype`) VALUES ('$pid','$shareemail','viewer')";
$resultshareemail = mysqli_query($conn, $sqlshareemail);

if($resultshareemail){
    echo "YeeeEE";
}else{
    echo "No0000000";
}
}
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

    <!-- Extra qr code js -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Potta+One&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


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
                    <li ><a href="index.php">Home</a></li>
                    
                    <li>
                        <a href="logout.php">Log Out</a>
                    </li>

                </ul>
            </nav><!-- .nav-menu -->

            <!-- <button type='button' class="appointment-btn scrollto" data-toggle="modal" data-target="#popUpWindow"
                style="border: none;">Register</button> -->

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
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>Services</h2>
                <p></p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="icon-box" style="
    width: 365px;
">
                        <div class="icon"><i class="icofont-heart-beat"></i></div>
                        <h4><a href="medical-reports.php">Medical Reports</a></h4>
                        
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                    <div class="icon-box" style="
    width: 365px;
">
                        <div class="icon"><i class="icofont-drug"></i></div>
                        <h4><a href="vaccinationrecord.php">Vaccination Records</a></h4>
                        
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                    <div class="icon-box" style="
    width: 365px;
">
                        <div class="icon"><i class="icofont-dna-alt-2"></i></div>
                        <h4><a href="generalhealth.php">General Health</a></h4>
                        
                    </div>
                </div>

                <!-- <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box" style="
    width: 365px;">
                        <div class="icon"><i class="icofont-heartbeat"></i></div>
                        <h4><a href="fitnesscheck.php">Fitness Check</a></h4>
                        
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box" style="
    width: 365px;
">
                        <div class="icon"><i class="icofont-disabled"></i></div>
                        <h4><a href="myschedule.php">My Schedule</a></h4>
                        
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                    <div class="icon-box" style="
    width: 365px;
">
                        <div class="icon"><i class="icofont-autism"></i></div>
                        <h4><a href="areahealth.php">Area Health</a></h4>
                    </div>
                </div> -->

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ===========QR code ======================= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>My Card</h2>
                <p></p>
            </div>

            <input type="text" placeholder="Text for QR code" id="QR-content" value="<?php echo $shareurl ?>" hidden>
            <br>




        </div>
        </div>
        <!-- ===========================Health Card=========================== -->
        <style>
            .secHcard {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            /* .secHcard::before{
    content: '';
    position: absolute;
    bottom: -40%;
    left: 40%;
    width: 600px;
    height: 600px;
    border-radius: 50%;
} */
            .Hcard {
                position: relative;
                width: 508px;
                height: 314px;
                transform-style: preserve-3d;
                perspective: 500px;
            }

            .Hcard .face {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
                border-radius: 15px;
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(10px);
                transform-style: preserve-3d;
                transition: 1s;
                backface-visibility: hidden;
            }

            .Hcard:hover .face.front {
                transform: rotateY(180deg);
            }

            .Hcard .face.back {
                transform: rotateY(180deg);
            }

            .Hcard:hover .face.back {
                transform: rotateY(360deg);
            }

            .Hcard .face.front::before {
                content: '';
                position: absolute;
                bottom: 40px;
                right: 40px;
                width: 60px;
                height: 60px;
                background: #fff;
                border-radius: 50%;
                opacity: 0;
            }

            .Hcard .face.front::after {
                content: '';
                position: absolute;
                bottom: 40px;
                right: 80px;
                width: 60px;
                height: 60px;
                background: #fff;
                border-radius: 50%;
                opacity: 0;
            }

            .Hcard .face.front .debit {
                position: absolute;
                left: 40px;
                top: 30px;
                color: #fff;
                font-weight: 500;
            }

            .Hcard .face.front .bank {
                position: absolute;
                right: 35px;
                top: 45px;
                color: #fff;
                font-weight: 500;
                font-style: italic;
                font-size: 24px;
            }

            .Hcard .face.front .chip {


                position: absolute;
    top: 119px;
    left: 324px;
    max-width: 144px;

            }

            .chipback {
                position: absolute;
                top: 120px;
                left: 356px;
                max-width: 120px;
            }



            .Hcard .face.front .number {
                position: absolute;
                bottom: 90px;
                left: 40px;
                color: #fff;
                font-weight: 500;
                letter-spacing: 6px;
                font-size: 18px;
                text-shadow: 0 2px 1px #0005;
                font-family: 'Orbitron', sans-serif;
            }

            .Hcard .face.front .valid {
                position: absolute;
                bottom: 90px;
                left: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #fff;
                font-weight: 300;
                line height: 1em;
                text-align: right;
            }

            .Hcard .face.front .valid span:last-child {
                margin-left: 20px;
                font-size: 16px;
                font-weight: 400;
                letter-spacing: 2px;
            }

            .Hcard .face.front .HcardHolder {
                position: absolute;
                bottom: 40px;
                left: 40px;
                color: #fff;
                font-weight: 300;
                font-size: 16px;
                letter-spacing: 2px;

            }

            .Hcard .face.back .blackbar {
                position: absolute;
                top: 40px;
                width: 100%;
                height: 60px;
                background: #000;

            }

            .Hcard .face.back .ccvtext {
                position: absolute;
                top: 120px;
                left: 30px;

            }

            .Hcard .face.back .ccvtext h5 {
                color: #fff;
                font: 400;
                font-size: 12px;
                text-transform: uppercase;
                letter-spacing: 2px;

            }

            .Hcard .face.back .ccvtext .whiteBar {
                position: relative;
                width: 400px;
                height: 40px;
                background: #fff;
                margin-top: 5px;

            }

            .Hcard .face.back .ccvtext .ccv {
                position: relative;
                background: #ccc;
                color: #111;
                width: 50px;
                height: 30px;
                font-weight: 600;
                letter-spacing: 3px;
                display: flex;
                justify-content: center;
                align-items: center;
                left: 400px;
                top: -35px;
                left: 395px;
            }

            .Hcard .face.back .text {
                position: absolute;
                bottom: 30px;
                left: 30px;
                right: 30px;
                color: #fff;
                font-size: 10px;
                line-height: 1.4em;
                font-weight: 300;

            }
        </style>
        <section class="secHcard">
            <div class="Hcard">
                <div class="face front" style="background-color: #1c1c25;">
                    <h3 class="debit">
                        <?php echo $name ?>
                    </h3>
                    <h3 class="bank">Health Card</h3>
                    <!-- <img style="width: 150px;" src="ClipartKey_1591130.png" class="chip"> -->
                    <img src="https://chart.googleapis.com/chart?cht=qr&amp;chl=Hello+World&amp;chs=300x300&amp;chld=L|0"
                        style="width: 150px;" class="chip qr-code">
                    <h3 class="number">
                        <?php echo $pid ?>
                    </h3>
                    <!-- <h5 class ="valid"><span>Blood Group : </span><span>B</span><sup>+</sup></h5> -->
                    <h5 class="HcardHolder"></h5>
                    <h5 class="F" style="
    bottom: 30px;
    position: absolute;
    bottom: 180px;
    left: 40px;
    color: #fff;
    font-weight: 300;
    font-size: 16px;
    letter-spacing: 2px;
">Age : <span><?php echo $age ?></span></h5>
                    <h5 class="F" style="
    bottom: 30px;
    position: absolute;
    bottom: 140px;
    left: 40px;
    color: #fff;
    font-weight: 300;
    font-size: 16px;
    letter-spacing: 2px;
">Gender : <span><?php echo $gender ?></span></h5>
                </div>
                <div class="face back" style="background-color: #1c1c25;">

                </div>
            </div>
            </div>
        </section>
        <!-- ===========================End Helath Card=========================== -->
    </section>
    <!-- ============Share Profile start's =========================== -->
    <div class="container mb-4">
        <button type='button' class="btn btn-primary" data-toggle="modal" data-target="#shareprofile">Share
            Profile</button>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#getqrcode">Get QR Code</button>

    </div>

    <div class="modal fade" id="shareprofile">

        <div class="modal-dialog">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header container">
                    <div class="container">
                        <div class="section-title">
                            <h2>Share Profile</h2>

                        </div>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="shareemail">Email</label>
                                <input type="email" class="form-control" name="shareemail" id="shareemail"
                                    aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">Enter email whom you want to share
                                    your report</small>
                            </div>

                            <center>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </center>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Share Profile ends -->
    <!-- ============Get QR start's =========================== -->
    <div class="container">
        
            


    </div>

    <div class="modal fade" id="getqrcode">

        <div class="modal-dialog">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header container">
                    <div class="container">
                        <div class="section-title">
                            <h2>My QR Code</h2>

                        </div>

                        <form>
                        <center>
                            <img src="https://chart.googleapis.com/chart?cht=qr&amp;chl=Hello+World&amp;chs=300x300&amp;chld=L|0"
                                style="width: 275px;" class="qr-code">

        </center>
                                <center>
                                <button type="button" class="mt-4 btn btn-primary" data-dismiss="modal">Done</button>

                            </center>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Get QR ends -->
    <style>
        .main-container {
            width: 100%;
            height: 100vh;
            position: relative;
        }

        .item-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 5px solid #000;
            padding: 5px;
        }


        #QR-content {
            height: 25px;
            margin-bottom: 20px;
        }

        #QR-generate {
            padding: 4px 10px;
        }

        .textbox-container {
            margin-bottom: 30px;
        }
    </style>
    <!-- ===========QR code end ==================== -->

    <script>

        function encodeQR(text_content) {
            return $('<div/>').text(text_content)
                .html();
        }

        $(function () {
            $(document).ready(function () {
                let QR_url =
                    'https://chart.googleapis.com/chart?cht=qr&chl='
                    + encodeQR($('#QR-content').val()) +
                    '&chs=300x300&chld=L|0'

                $('.qr-code').attr('src', QR_url);
            });
        });
    </script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>