<?php
session_start();
if(isset($_GET["pid"])){
    $pidtoview =  $_GET["pid"];

    include "config.php";
// if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] ==true ){
//     header("location: index.php");
//     exit;
// }
$allowtoview = false;
$email = $_SESSION["email"];
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){
    header("location: index.php");
    exit;
}
$pid = $_SESSION['pid'];


// echo $url;  
// echo "\n";

$_SESSION["pidtoview"] = $pidtoview;

// Check permissions
$sqlcheck = "SELECT * FROM `sharewith` WHERE `shareemail` = '$email' AND `pid` = '$pidtoview'";
$resultcheck = mysqli_query($conn, $sqlcheck);

if ($resultcheck) {
    // echo "Inside if\n";
    // output data of each row
    while($rows = mysqli_fetch_assoc($resultcheck)) {
        
    //   $pidofreportownerformshareemail = $rows["pid"];
    //   echo "Inside while loop\n";
    //   echo $rows["pid"];
    //   echo "\n";
      $allowtoview = true;
      }
    }
    if($allowtoview == true){
        echo "Trueeeeeeeeeeeee";
        $sqlmview = "SELECT * FROM `mreports` WHERE pid='$pidtoview'";
$resultmview = mysqli_query($conn, $sqlmview);
$sqlvac = "SELECT * FROM `pvaccineinfo` WHERE pid='$pidtoview'";
$resultv_view = mysqli_query($conn, $sqlvac);
$sqlginfo = "SELECT * FROM `pinfo` WHERE `pid` = '$pidtoview'";
$resultginfo = mysqli_query($conn, $sqlginfo);
    }else{
        echo "noooooooooooo";
    }
}else{
    echo "404 Error";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Health</title>
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
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#departments">Departments</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li class="drop-down"><a href="">Drop Down</a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="drop-down"><a href="#">Deep Drop Down</a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php" data-toggle="modal" data-target="#popUpWindowlogin"
                            style="cursor: pointer;">Log In</a>
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
    ">Area Health</h1>
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
    <!-- =================Medical Reports =========================-->
    <section id="doctors" class="doctors">
        <div class="container">
            <div class="section-title">
                <h2>Medical Reports</h2>
            </div>
            <div class="container">
                <div class="row">
                    <?php
                
                    while($rowmview = mysqli_fetch_assoc($resultmview)) {
                                        // Store the cipher method 
$ciphering = "AES-128-CTR"; 

// Use OpenSSl Encryption method 
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0; 

// Non-NULL Initialization Vector for encryption 
$encryption_iv = '1234567891011121'; 

// Store the encryption key 
$encryption_key = "GeeksforGeeks"; 

$base = "upload/";
$original_string = $base.$rowmview["reportpdf"];
// Use openssl_encrypt() function to encrypt the data 
$encryption = openssl_encrypt($original_string, $ciphering, 
			$encryption_key, $options, $encryption_iv); 

// Display the encrypted string 

    //   $private_secret_key = '1f4276388ad3214c873428dbef42243f'; //some random hex characters
    //   $encrypted = encrypt($original_string,$private_secret_key);
      $surl = $encryption;
    echo'<div class="col-lg-6 mb-4">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">'.$rowmview["reportname"].'</h5>
                                <p class="card-text">'.$rowmview["dateofupload"].'</p>

                                <a target="_blank" href="http://localhost/HealthCard/fileview.php?u='.$surl.'" class="btn btn-outline-primary btn-sm">
                                    Card link
                                </a>
                                
                            </div>
                        </div>
                    </div>';
                }
                ?>


                </div>
            </div>

            <!-- ==================End Medical Reports============================= -->
            <!-- =================Vaccine Records =========================-->
            <section id="doctors" class="doctors">
                <div class="container">
                    <div class="section-title">
                        <h2>Vaccine Records</h2>
                    </div>
                    <div class="container">
                        <div class="row">
                            <?php
                
            while($rowv_view = mysqli_fetch_assoc($resultv_view)) {

            echo'
            <div class="col-lg-6 mb-4"> 
                <div class="card"> 
  
                    <div class="card-body"> 
                        <h5 class="card-title">'.$rowv_view["vaccinename"].'</h5> 
                        <p class="card-text">'.$rowv_view["vaccinefor"].'. 
                        </p> 
  
                        <a target="_blank" href="http://localhost/HealthCard/fileview.php?u='.$surl.'" class="btn btn-outline-primary btn-sm"> 
                            Card link 
                        </a> 
                        
                    </div> 
                </div> 
            </div>';
        }
        ?>


                        </div>
                    </div>

                    <!-- ======================End Vaccine Records============================= -->
                    <!-- ======= General Patient Info ======= -->
                    <section id="doctors" class="doctors">
                        <div class="container">

                            <div class="section-title">
                                <h2>General Health Info</h2>

                            </div>
                            <?php
while($rowginfo = mysqli_fetch_assoc($resultginfo)) {
    
            echo'<form action="">

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Name : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel" value="'.$rowginfo["name"].'" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Age : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel" value="'.$rowginfo["age"].'" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Gender : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel" value="'.$rowginfo["gender"].'" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Blood Group : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel" value="'.$rowginfo["bloodgroup"].'" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Weight : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel" value="'.$rowginfo["weight"].'" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Height : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="colFormLabel" value="'.$rowginfo["height"].'" readonly>
                    </div>
                </div>
                <div class="row mb-3 form-group">
                    <label class="col-sm-2 col-form-label" for="exampleFormControlTextarea1">Allergic To : </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Rose and Love" readonly></textarea>

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