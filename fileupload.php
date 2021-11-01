<?php
  session_start();
include_once 'config.php';
if(isset($_POST['upload']))
{   
    $addnote = $_POST["addnote"];
    $reportname = $_POST["rname"];
    $doctorname = $_POST["dname"];
    $labname = $_POST["lname"];
    $id = $_SESSION["id"];
    
     $q = "SELECT * FROM `pinfo` WHERE `id` = '$id'";
     $r = mysqli_query($conn, $q);
     if (mysqli_num_rows($r) > 0) {
        while($row = mysqli_fetch_assoc($r)) {
          $pid =  $row["pid"];
        }
      }
      $sqlname = "SELECT * FROM `mreports`";
      $rname = mysqli_query($conn, $sqlname);
      if ($rname) 
      { 
          // it return number of rows in the table. 
          $rownum = mysqli_num_rows($rname); 
            
             
          // close the result. 
          mysqli_free_result($rname); 
      } 
    $file_loc = $_FILES['file']['tmp_name'];

//  ==================================================================================
$targetfolder = "upload/";

 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {
   $filename = basename( $_FILES['file']['name']);

  $sql="INSERT INTO `mreports`(`pid`,`reportname`, `doctorname`, `labname`, `reportpdf`, `dateofupload`, `addnote`) VALUES('$pid', '$reportname', '$doctorname', '$labname', '$filename', CURRENT_TIMESTAMP, '$addnote')";
  if(mysqli_query($conn,$sql)){
    header("location: medical-reports.php");
  

 echo "The file ". basename( $_FILES['file']['name']). " is uploaded";

 }

 else {

 echo "Problem uploading file";

 }
}

}
  

?>