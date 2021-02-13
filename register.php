<?php
// Include config file
require_once "config.php";

$showAlert = false;
$showError = false;
$exists=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $password = md5($_POST["password"]);
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $bdate = $_POST["bdate"];

//     $sqlcheck ="select * from user_list  where User_name ='$username'";
//     $i=0;
//     if ($result=mysqli_query($conn,$sqlcheck))
//   {
//       while ($row=mysqli_fetch_row($result))
//      {
//       $i++;
//      }
//   }
//     $sqlcheck ="select * from user_list  where User_name ='$username'";
//     $j=0;
//     $i=0;
//     if ($result=mysqli_query($conn,$sqlcheck))
//   {
//       while ($row=mysqli_fetch_row($result))
//      {
//       $j++;
//      }
//   }

//   if ($i == 1 || $j == 1){
//     $showError = "Username already taken, please choose another username";
//     $exists=true;
// } 
//   else{

    
    // if(empty(trim($_POST["email"]))){
    //     $showError = "Email cannot be blank";
    // }
    // elseif(($password == $cpassword) && $exists==false){
        $sql = "INSERT INTO `pinfo` (`name`, `Password`, `email`, `phone`, `gender`, `bdate`) VALUES ('$name', '$password','$email', '$phone', '$gender', '$bdate')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
        header("location: dashboard.php");
    // }
    // else{
    //     $showError = "Passwords do not match";
    // }
// }

}
?>