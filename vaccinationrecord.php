<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){
    header("location: index.php");
    exit;
}

require_once "config.php";
$pid = $_SESSION["pid"];
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $vname = $_POST["vname"];
    $lname = $_POST["lname"];
    $addnote = $_POST["addnotev"];
    $pid = $_SESSION["pid"];

    $sql = "INSERT INTO `pvaccineinfo`(`pid`, `vaccinename`, `vaccinefor`) VALUES ('$pid', '$vname', '$addnote')";
    $result = mysqli_query($conn, $sql);
}

$sqlvac = "SELECT * FROM `pvaccineinfo` WHERE pid='$pid'";
$resultvac = mysqli_query($conn, $sqlvac);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination Records</title>
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
                    <h1 class="mt-4" style="color: white;">Vaccination Records</h1>
                    <p class="m-0" style="color: white;"></p>
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

    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
        <div class="container">

            <div class="section-title">
                <h2>Vaccine Taken</h2>
                
            </div>

            <div class="row">
<?php
            while($row = mysqli_fetch_assoc($resultvac)) {

echo'<div class="col-lg-6 mt-4">
    <div class="member d-flex align-items-start" style="box-shadow: 0px 2px 15px rgb(0 0 0 / 8%);">
        <!-- <div class="pic"><img src="assets/img/doctors/doctors-1.jpg" class="img-fluid" alt=""></div> -->
        <div class="member-info">
        <a href="http://localhost/HealthCard/upload/'.$row["vaccinename"].'" target="_blank"><h4>'.$row["vaccinename"].'</h4></a>
            <p>'.$row["vaccinefor"].'</p>    

            
        </div>
    </div>
</div>';
}
?>



            </div>

        </div>
    </section><!-- End Doctors Section -->
    <!-- ======= Doctors Section ======= -->
    <!-- <section id="doctors" class="doctors">
        <div class="container">

            <div class="section-title">
                <h2>Recommended Vaccine</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit
                    in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="member d-flex align-items-start" style="box-shadow: 0px 2px 15px rgb(0 0 0 / 8%);">
                        <div class="member-info">
                            <h4>Walter White</h4>
                            <span>Chief Medical Officer</span>
                            <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
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
                            <h4>Sarah Jhonson</h4>
                            <span>Anesthesiologist</span>
                            <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
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
    <!-- End Doctors Section -->

    <!-- Add New Vaccine Data -->
    <div class="container">
        <button type='button' class="btn btn-primary" data-toggle="modal" data-target="#addVaccine">Add New Vaccine
            Data</button>
    </div>

    <div class="modal fade" id="addVaccine">

        <div class="modal-dialog">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header container">
                    <div class="container">
                        <div class="section-title">
                            <h2>Add New Vaccine Data</h2>

                        </div>

                        <form action="" method="post">

                            <div class="form-group">
                                <label for="Vaccinename">Vaccine Name</label>
                                <input type="text" class="form-control" name="vname" id="text" placeholder="Covid-19 vaccine">
                                <small id="emailHelp" class="form-text text-muted">Enter Report name such as Consulation
                                    Report, Discharge Report, Pathology Report, etc.</small>
                            </div>
                            <div class="form-group">
                                <label for="Lab Name">Lab Name</label>
                                <input type="text" class="form-control" name="lname" id="text" aria-describedby="emailHelp"
                                    data-rule="email" data-msg="Please enter a valid email" placeholder="Ajmer Lab">

                            </div>
                            <div class="form-group">
                                <label for="Additional Note">Additional Note</label>
                                <textarea class="form-control" name="addnotev" id="addnotev" rows="3"></textarea>
                            </div>
                            <!-- <div class="form-group">
                                <label for="exampleFormControlFile1">Add Vaccine PDF</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div> -->
                            <center>
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                            </center>
                        </form>
                        <!-- <div class="section-title">
                            <p>New User created account</p>
                        </div> -->
                    </div>
                    <!-- footer -->
                    <!-- <div class="modal-footer">
                <button class="btn btn-primary btn-block">Log In</button>
              </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Add New Vaccine Data ends -->

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