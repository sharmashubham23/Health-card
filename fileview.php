<?php
session_start();
include "config.php";
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){
    header("location: index.php");
    exit;
}
$pid = $_SESSION["pid"];
$email = $_SESSION["email"];
$allowtoview = false;

    // Store the cipher method 
$ciphering = "AES-128-CTR"; 
$u = $_GET["u"];

// Use OpenSSl Encryption method 
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0; 
// Non-NULL Initialization Vector for encryption 
$encryption_iv = '1234567891011121'; 


// Store the encryption key 
$encryption_key = "sjdknskdjfnkjsfklskpdfk"; 
// Non-NULL Initialization Vector for decryption 
$decryption_iv = '1234567891011121'; 

// Store the decryption key 

$decryption_key = "sjdknskdjfnkjsfklskpdfk"; 
// Use openssl_decrypt() function to decrypt the data 
$decryption=openssl_decrypt ($u, $ciphering, 
		$decryption_key, $options, $decryption_iv); 



    $file1 = $decryption;
    // echo "This is d : ";
    $reportpdf = substr($file1,7);  
    $pidofreportowner = "111";
$sqlsharecheck = "SELECT * FROM `mreports` WHERE `reportpdf` = '$reportpdf'";
echo "This is reportpdf = ",$reportpdf;
$resultsharecheck = mysqli_query($conn, $sqlsharecheck);

if (mysqli_num_rows($resultsharecheck) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($resultsharecheck)) {
        
      $pidofreportowner = $row["pid"];
    //   echo "Inside while loop\n";
      }
    }
  
  // test sql=============
  $sql = "SELECT * FROM `sharewith` WHERE `shareemail` = '$email' AND `pid` = '$pidofreportowner'";
  // $sql2 = "SELECT * FROM `sharewith` WHERE `shareemail` = 'hello2@gmail.com' AND `pid` = '82406658'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo "Inside if\n";
    // output data of each row
    while($rows = mysqli_fetch_assoc($result)) {
        
      $pidofreportownerformshareemail = $rows["pid"];
      echo "Inside while loop\n";
      echo $rows["pid"];
      echo "\n";
      $allowtoview = true;
      }
    }
if($allowtoview == true){
  header('Content-type: application/pdf');
              header('Content-Disposition: inline; filename="'.$file1.'"');
              header('Content-Transfer-Encoding: binary');
              header('Accept-Ranges: bytes');
              @readfile($file1);
}else{
  echo $pidofreportownerformshareemail;
  echo "\nYou do not have rights!\n";
  echo $pidofreportowner;
  echo "\n";
  echo $email;
}
  // ends sql ============








?>