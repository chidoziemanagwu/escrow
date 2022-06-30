<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// php code to Update data from mysql database Table

if(isset($_POST['update']))
{
    
include('db.php');
   
   $sql = "SELECT * FROM qr2 WHERE id = '1'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
 $row = mysqli_fetch_assoc($result);
   $mixinqr = $row["mixinqr"];
   
   if (unlink("qr2/$mixinqr")){
         $mixinwallet = $_POST['mixinwallet2'];
   
   $mixinqr2 = $_FILES["qrcode2"]["name"];
    $tempname = $_FILES["qrcode2"]["tmp_name"];   
        $folder = "qr2/$mixinqr2";

           if (move_uploaded_file($tempname, $folder))  {
                  
               // mysql query to Update data
               $query = "UPDATE qr2 SET mixinwallet = '$mixinwallet',mixinqr = '$mixinqr2' WHERE `id` = 1";
               
               $result = mysqli_query($con, $query);
               
               if($result)
               {
                   header( "refresh:3;url=admin.php" );
                   echo 'Data Updated';
               }else{
                   header( "refresh:5;url=admin.php" );
                   echo 'Data Not Updated';
               }
               mysqli_close($con);
        }else{
            $msg = "Failed to upload image";
      }

       
   }else{
        $mixinwallet = $_POST['mixinwallet2'];
   
   $mixinqr2 = $_FILES["qrcode2"]["name"];
    $tempname = $_FILES["qrcode2"]["tmp_name"];   
        $folder = "qr2/".$mixinqr2;

           if (move_uploaded_file($tempname, $folder))  {
                  
               // mysql query to Update data
               $query = "UPDATE qr2 SET mixinwallet = '$mixinwallet', mixinqr = '$mixinqr2' WHERE `id` = 1";
               
               $result = mysqli_query($con, $query);
               
               if($result)
               {
                   header( "refresh:3;url=admin.php" );
                   echo 'Data Updated';
               }else{
                   header( "refresh:5;url=admin.php" );
                   echo 'Data Not Updated';
               }
               mysqli_close($con);
        }else{
            $msg = "Failed to upload image";
      }

   }
  
} else {
  echo "0 results";
}

   // get values form input text and number
}

?>