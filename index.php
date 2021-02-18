<?php
session_start();

// if($_SESSION['loggedin'] == true){
//   header("location: dashboard.php");

// }
// Include config file
require_once "config.php";

$showAlert = false;
$showError = false;
$exists=false;
if(isset($_SESSION['loggedin'])){
  header("location: dashboard.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $password = md5($_POST["password"]);
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $pid;

    $q = "SELECT * FROM `lastpid` WHERE `lastpid` = '1'";
    $r = mysqli_query($conn, $q);
    if (mysqli_num_rows($r) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($r)) {
        $pid =  $row["pid"] + 1;
        echo $pid;
      }
    }
    $q2 = "UPDATE `lastpid` SET `pid`= '$pid' WHERE `lastpid` = '1'";
    $r2 = mysqli_query($conn, $q2);
    if ($r2) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }

        $sql = "INSERT INTO `pinfo` (`name`, `Password`, `email`, `phone`, `gender`, `age`, `pid`) VALUES ('$name', '$password','$email', '$phone', '$gender', '$age', '$pid')";
        $result = mysqli_query($conn, $sql);


        $sqlshare = "INSERT INTO `sharewith`(`pid`, `shareemail`, `sharetype`) VALUES ('$pid', '$email', 'owner')";
        $resultshare = mysqli_query($conn, $sqlshare);
        if ($result){
          $showAlert = true;
          header("location: dashboard.php");

      }


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MY HEALTH CARD</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


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

  <!-- =======================================================
  * Template Name: Medilab - v2.1.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <!-- Extra start-->
  <!-- <script data-require="jquery@3.0.0" data-semver="3.0.0"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
  <link data-require="bootstrap@3.3.7" data-semver="3.3.7" rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script data-require="bootstrap@3.3.7" data-semver="3.3.7"
    src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css" /> -->
  <!-- Extra ends -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55
        <i class="icofont-google-map"></i> A108 Adam Street, NY
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">MY HEALTH CARD</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Home</a></li>
          
          <li>
            <a data-toggle="modal" data-target="#popUpWindowlogin" style="cursor: pointer;">Log In</a>
          </li>

        </ul>
      </nav><!-- .nav-menu -->

      <button type='button' class="appointment-btn scrollto" data-toggle="modal" data-target="#popUpWindow"
        style="border: none;">Register</button>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome to My Health Card</h1>
      <h2>A UNIQUE MEDICAL
IDENTITY THAT CAN
STORE YOUR ALL MEDICAL
DATA</h2>
      <a data-toggle="modal" data-target="#popUpWindowlogin" style="cursor: pointer;" class="btn-get-started ">LOG IN</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why To Use Health Card ?</h3>
              <p>
                Helath Card provides a secure online platform to store you medical data and access all your data in single click.
                You can share your medical data easily and securely with doctore and your loved ones. 
              </p>
              <div class="text-center">
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Medical Reports</h4>
                    <p></p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Vaccination Records</h4>
                    <p></p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>General Health</h4>
                    <p></p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->


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
    width: 365px;
">
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

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


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

  <!-- 
  <script>
    // This is extra 
    // Code goes here


    $('#collapseOne').on('show.bs.collapse', function () {
      // do something…
      alert('ok');
    })
  </script> -->
  <div class="modal fade" id="popUpWindow">

    <div class="modal-dialog">
      <div class="modal-content">
        <!-- header -->
        <div class="modal-header container">
          <div class="container">
            <div class="section-title">
              <h2>Register</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>

            <form action="" method="post" role="form" class="php-email-form">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" data-rule="minlen:4"
                  data-msg="Please enter at least 4 chars" placeholder="Rahul Sharma">
                <div class="validate"></div>
              </div>

              <div class="form-group">
                <label for="Birth">Age</label>
                <input type="number" name="age" class="form-control " id="age"
                  placeholder=" 35" >
              </div>
              <div class="form-group">
                <label for="Gender">Gender</label>
                <select name="gender" id="gender" class="form-control">
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Prefer">Prefer not to say</option>
                </select>
                <div class="validate"></div>
              </div>

              <!-- <div class="form-group">
                <label for="Phone number">Phone number</label>
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone"
                  data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div> -->
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" data-rule="email"
                  data-msg="Please enter a valid email" placeholder="hello@email.com">
                <div class="validate"></div>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                  else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
              </div>


              <!-- <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div> -->
              <!-- <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
              </div> -->
              <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <div class="section-title">
              <p>Already created account </p>
              <a data-dismiss="modal" data-toggle="modal" data-target="#popUpWindowlogin" style="cursor: pointer; color: blue;">Log In</a>


            </div>
          </div>
          <!-- footer -->
          <!-- <div class="modal-footer">
            <button class="btn btn-primary btn-block">Log In</button>
          </div> -->
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="popUpWindowlogin">

    <div class="modal-dialog">
      <div class="modal-content">
        <!-- header -->
        <div class="modal-header container">
          <div class="container">
            <div class="section-title">
              <h2>Log In</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>

            <form action="login.php" method="post" role="form" class="php-email-form">

              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="emaillogin" aria-describedby="emailHelp" data-rule="email"
                  data-msg="Please enter a valid email" placeholder="hello@email.com">
                <div class="validate"></div>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                  else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              </div>

              <button type="submit" class="btn btn-primary">Log In</button>
            </form>
            <div class="section-title">
              <p>New User create account</p>
              <a data-dismiss="modal" data-toggle="modal" data-target="#popUpWindow" style="cursor: pointer; color: blue;">Register First</a>
        
            </div>
          </div>
          <!-- footer -->
          <!-- <div class="modal-footer">
            <button class="btn btn-primary btn-block">Log In</button>
          </div> -->
        </div>
      </div>
    </div>
  </div>


</body>

</html>