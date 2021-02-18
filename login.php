<?php
  session_start();
  // $_SESSION['loggedin'] = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST['email'];
    $pw = md5($_POST['password']);
// Include config file
require_once "config.php";
$showAlert = false;
$showError = false;
$exists=false;
$sql="select * from pinfo  where email='$email' and password='$pw'";
//echo "$sql";
$i=0;
$id = -1;
$pid;
if ($result=mysqli_query($conn,$sql))
  {
    echo "in result if ";
      while ($row=mysqli_fetch_assoc($result))
     {
       echo "in row if";
      $id = $row["id"];
      $pid = $row["pid"];
      $email = $row["email"];
      $name = $row["name"];
      $age = $row["age"];
      $gender = $row["gender"];
      $i++;
     }
  }

  if ($i == 1){
    $login = true;
    $_SESSION['loggedin'] = true;
    $_SESSION["id"] = $id; 
    $_SESSION["pid"] = $pid; 
    $_SESSION["email"] = $email; 
    $_SESSION["name"] = $name;
    $_SESSION["age"] = $age;
    $_SESSION["gender"] = $gender;
    // $_SESSION['username'] = $un;
    header("location: dashboard.php");

} 
  else{
    $showError = "Invalid Credentials";
    // header("location: dashboard.php");
    echo "Error updating record: " . mysqli_error($conn);
}


}

?>
