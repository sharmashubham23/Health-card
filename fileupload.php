<?php
  session_start();
include_once 'config.php';
if(isset($_POST['upload']))
{   
    $addnote = $_POST["addnote"];
    // $category = $_POST["Category"];
    $reportname = $_POST["rname"];
    $doctorname = $_POST["dname"];
    $labname = $_POST["lname"];
    $id = $_SESSION["id"];
    
     $q = "SELECT * FROM `pinfo` WHERE `id` = '$id'";
     $r = mysqli_query($conn, $q);
     if (mysqli_num_rows($r) > 0) {
        // output data of each row
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
//  $file = $rownum."f.pdf";
    $file_loc = $_FILES['file']['tmp_name'];
//  $file_size = $_FILES['file']['size'];
//  $file_type = $_FILES['file']['type'];
 $folder="upload/";
 
 /* new file size in KB */
//  $new_size = $file_size/1024;  
 /* new file size in KB */

 $ALGORITHM = 'AES-128-CBC';
$IV    = '12dasdq3g5b2434b';

$error = '';

  
  $password   = "helloji123";
  $action = 'c';
  // $file     = $file_loc;
  $file     = isset($_FILES) && isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK ? $_FILES['file'] : null;
  
  if ($password === null) {
    $error .= 'Invalid Password<br>';
  }
  if ($action === null) {
    $error .= 'Invalid Action<br>';
  }
  if ($file === null) {
    $error .= 'Errors occurred while elaborating the file<br>';
  }
  
  if ($error === '') {
  
    $contenuto = '';
    $nomefile  = '';
  
    $contenuto = file_get_contents($file_loc);
    $filename  = $rownum."f.pdf";
  
    switch ($action) {
      case 'c':
        $contenuto = openssl_encrypt($contenuto, $ALGORITHM, $password, 0, $IV);
        $filename  = $filename . '.crypto';
        break;
      case 'd':
        $contenuto = openssl_decrypt($contenuto, $ALGORITHM, $password, 0, $IV);
        $filename  = preg_replace('#\.crypto$#','',$filename);
        break;
    }
    
    if ($contenuto === false) {
      $error .= 'Errors occurred while encrypting/decrypting the file ';
    }
    
    if ($error === '') {
    
      // header("Pragma: public");
      // header("Pragma: no-cache");
      // header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
      // header("Cache-Control: post-check=0, pre-check=0", false);
      // header("Expires: 0");
      // header("Content-Type: application/octet-stream");
      // header("Content-Disposition: attachment; filename=\"" . $filename . "\";");
      // $size = strlen($contenuto);
      // header("Content-Length: " . $size);
      // echo $contenuto;    
      
   
  


 
 /* make file name in lower case */
 $new_file_name = strtolower($filename);
 /* make file name in lower case */


 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO `mreports`(`pid`,`reportname`, `doctorname`, `labname`, `reportpdf`, `dateofupload`, `addnote`) VALUES('$pid', '$reportname', '$doctorname', '$labname', '$final_file', CURRENT_TIMESTAMP, '$addnote')";
  if(mysqli_query($conn,$sql)){
    // header("location: medical-reports.php");
  
  $destination = $folder.$final_file;
  sleep(10);
  if (!copy($contenuto, $destination)) {
    die("Error accessing file");
}
  }
 
  echo "File sucessfully upload";
        
  
 }
 else
 {
  
  echo "Error.Please try again\n";
  // echo("Error description: " . mysqli_error($conn));

		
		}
	}
}
  
}
?>