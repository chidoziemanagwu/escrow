<?php
session_start();
include('db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_ALL);
ini_set('display_errors', 1);

$sql = "SELECT * FROM admin";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
 $row = mysqli_fetch_assoc($result);

    $escrowwallet = $row["escrowwallet"];
   $escrowset = $row["escrowset"];
  
} else {
  echo "0 results";
}


$sqlqr = "SELECT * FROM qr WHERE id = '1'";
$resultqr = mysqli_query($con, $sqlqr);

if (mysqli_num_rows($resultqr) > 0) {
  // output data of each row
 $row = mysqli_fetch_assoc($resultqr);

    $mixinwallet = $row["mixinwallet"];
   $mixinqr = $row["mixinqr"];
  
} else {
  echo "0 results";
}


$sqlqr2 = "SELECT * FROM qr2 WHERE id = '1'";
$resultqr2 = mysqli_query($con, $sqlqr2);

if (mysqli_num_rows($resultqr2) > 0) {
  // output data of each row
 $row = mysqli_fetch_assoc($resultqr2);

    $mixinwallet2 = $row["mixinwallet"];
   $mixinqr2 = $row["mixinqr"];
  
} else {
  echo "0 results";
}


$sqlusers = "SELECT * FROM users";
$resultusers = mysqli_query($con, $sqlusers);
$count = mysqli_num_rows($resultusers); 


$sqlescrow = "SELECT * FROM escrow2";
$resultescrow = mysqli_query($con, $sqlescrow);
$countescrow = mysqli_num_rows($resultescrow);


$sqlmixin = "SELECT * FROM mixin2";
$resultmixin = mysqli_query($con, $sqlmixin);
$countmixin = mysqli_num_rows($resultmixin);

$sqldeposit = "SELECT * FROM deposit";
$resultdeposit = mysqli_query($con, $sqldeposit);
$countdeposit = mysqli_num_rows($resultdeposit);

$sqlwithdraw = "SELECT * FROM withdraw";
$resultwithdraw = mysqli_query($con, $sqlwithdraw);
$countwithdraw = mysqli_num_rows($resultwithdraw);



if(isset($_GET['id1'])){
    $id = $_GET['id1'];
     $query = "UPDATE escrow2 SET status = 'APPROVED' WHERE `id` = '$id'";
               
               $result = mysqli_query($con, $query);
               
               if($result)
               {
                   header( "refresh:3;url=admin.php" );
                   echo '<script>alert(" Data Updated ")</script>';
               }else{
                   header( "refresh:5;url=admin.php" );
                   echo '<script>alert(" Data Not Updated")</script>';
               }
}

if(isset($_GET['id1b'])){
    $id = $_GET['id1b'];
     $query = "UPDATE escrow2 SET status = 'Declined' WHERE `id` = '$id'";
               
               $result = mysqli_query($con, $query);
               
               if($result)
               {
                   header( "refresh:3;url=admin.php" );
                   echo '<script>alert(" Data Updated ")</script>';
               }else{
                   header( "refresh:5;url=admin.php" );
                   echo '<script>alert(" Data Not Updated")</script>';
               }
}


if(isset($_GET['id4a'])){
    $id = $_GET['id4a'];
     $query = "UPDATE deposit SET status = 'APPROVED' WHERE `id` = '$id'";
               
               $result = mysqli_query($con, $query);
        $sqlusers = "SELECT * FROM deposit where id = '$id'";
        $resultusers = mysqli_query($con, $sqlusers);
        $rowusers = mysqli_fetch_assoc($resultusers);
        $amount = $rowusers['amount'];
        $uid = $rowusers['uid']; 
           if($result)
               {
                   $sqlusers = "SELECT * FROM users where username = '$uid'";
                    $resultusers = mysqli_query($con, $sqlusers);
                    $rowusers = mysqli_fetch_assoc($resultusers);
                    $newamt = $amount + $rowusers['balance'];
                    
                    $query = "UPDATE users SET balance = '$newamt' WHERE `username` = '$uid'";
               
                   $result2 = mysqli_query($con, $query);
                   
           if($result2)
               {
                   header( "refresh:3;url=admin.php" );
                   echo '<script>alert(" Data Updated ")</script>';
               }else{
                   header( "refresh:3;url=admin.php" );
                   echo '<script>alert(" Data Updated ")</script>';
               }
               }else{
                   header( "refresh:5;url=admin.php" );
                   echo '<script>alert(" Data Not Updated")</script>';
               }
}

if(isset($_GET['id4b'])){
    $id = $_GET['id4b'];
     $query = "UPDATE deposit SET status = 'Declined' WHERE `id` = '$id'";
               
               $result = mysqli_query($con, $query);
               
               if($result)
               {
                   header( "refresh:3;url=admin.php" );
                   echo '<script>alert(" Data Updated ")</script>';
               }else{
                   header( "refresh:5;url=admin.php" );
                   echo '<script>alert(" Data Not Updated")</script>';
               }
}


if(isset($_GET['id5a'])){
    $id = $_GET['id5a'];
     $query = "UPDATE withdraw SET status = 'APPROVED' WHERE `id` = '$id'";
               
               $result = mysqli_query($con, $query);
        $sqlusers = "SELECT * FROM withdraw where id = '$id'";
        $resultusers = mysqli_query($con, $sqlusers);
        $rowusers = mysqli_fetch_assoc($resultusers);
        $amount = $rowusers['amount'];
        $uid = $rowusers['uid']; 
           if($result)
               {
                   $sqlusers = "SELECT * FROM users where username = '$uid'";
                    $resultusers = mysqli_query($con, $sqlusers);
                    $rowusers = mysqli_fetch_assoc($resultusers);
                    $newamt = $rowusers['balance'] - $amount ;
                    
                    $query = "UPDATE users SET balance = '$newamt' WHERE `username` = '$uid'";
               
                   $result2 = mysqli_query($con, $query);
                   
           if($result2)
               {
                   header( "refresh:3;url=admin.php" );
                   echo '<script>alert(" Data Updated ")</script>';
               }else{
                   header( "refresh:3;url=admin.php" );
                   echo '<script>alert(" Data Updated ")</script>';
               }
               }else{
                   header( "refresh:5;url=admin.php" );
                   echo '<script>alert(" Data Not Updated")</script>';
               }
}

if(isset($_GET['id5b'])){
    $id = $_GET['id5b'];
     $query = "UPDATE withdraw SET status = 'Declined' WHERE `id` = '$id'";
               
               $result = mysqli_query($con, $query);
               
               if($result)
               {
                   header( "refresh:3;url=admin.php" );
                   echo '<script>alert(" Data Updated ")</script>';
               }else{
                   header( "refresh:5;url=admin.php" );
                   echo '<script>alert(" Data Not Updated")</script>';
               }
}


if(isset($_GET['id2'])){
    $id = $_GET['id2'];
     $query = "UPDATE mixin2 SET status = 'APPROVED', mixinstatus = 'Processing'  WHERE `id` = '$id'";
               
               $result = mysqli_query($con, $query);
               
               $sqlusers = "SELECT * FROM mixin2 where id = '$id'";
        $resultusers = mysqli_query($con, $sqlusers);
        $rowusers = mysqli_fetch_assoc($resultusers);
        $amount = $rowusers['amount'];
        $uid = $rowusers['fullname'];
        
               if($result)
               {
                   $sqlusers = "SELECT * FROM users where username = '$uid'";
                    $resultusers = mysqli_query($con, $sqlusers);
                    $rowusers = mysqli_fetch_assoc($resultusers);
                    $email = $rowusers['email'];
                    
                                    require 'PHPMailer/src/Exception.php';

/* The main PHPMailer class. */
require 'PHPMailer/src/PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(TRUE);

$mail->From = 'noreply@escrow-chain.com';
$mail->FromName = 'Escrow-Chain';
$mail->addAddress($email);     // Add a recipient
// $mail->addAddress('ghostfrancis2@gmail.com');               // Name is optional
// $mail->addReplyTo('info@AfriqueBank.com', 'AfriqueBank');

// $mail->addBCC('info@AfriqueBank.com');

// $mail->addAttachment('');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Escrow-Chain Mixin Request Now Being Processed';
$mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Demystifying Email Design</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">

                    <tr>
                        <td bgcolor="#fff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                            <td align="center"  style="padding: 40px 0 30px 0; color: #153643; font-size: 28px;  font-weight: bold; font-family: Arial, sans-serif;">
                            <img src="https://escrow-chain.com/img/logo.png"  alt="Escrow-Chain" width="200" style="display: block;"/>
                            </td>
                            </tr>
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                        <b>Mixin Request Now Being Processed</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        Your Mixin request is now being processed.It may take up to 72 hours to complete process. If you have further enquiries, please contact us<br>
                                        Regards,<br> <br> Escrow-Chain Team<br><br>
                                      
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';
$mail->AltBody = "Mixin request is now being processed.";

    if($mail->send()) {
    

        // header("Refresh:15; url=dashboard.php");
                header( "refresh:3;url=admin.php" );
                           echo '<script>alert(" Data Updated ")</script>';   
            
    

            }
            else{
                echo 'EMail Not sent';
            }
            
       }else{
           header( "refresh:5;url=admin.php" );
           echo '<script>alert(" Data Not Updated")</script>';
       }
}

if(isset($_GET['id3'])){
    $id = $_GET['id3'];
     $query = "UPDATE mixin2 SET status = 'DECLINED' WHERE `id` = '$id'";
               
               $result = mysqli_query($con, $query);
               
               if($result)
               {
                   header( "refresh:3;url=admin.php" );
                   echo '<script>alert(" Data Updated ")</script>';
               }else{
                   header( "refresh:5;url=admin.php" );
                   echo '<script>alert(" Data Not Updated")</script>';
               }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>

  </head>
  <body>

  <div class="container my-4 py-4 text-center">
      
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h4>SET ECROW WALLET ADDRESS AND QR HERE </h4>
    <form action="ad.php" method="POST" enctype="multipart/form-data">
        Current QR Code:<br>
       <?php echo '<img src="qr2/'.$mixinqr2.'" class="img img-fluid w-75 mx-auto mb-2"> ';
       ?> 
  <div class="form-group">
    <label for="exampleInputEmail1">Set QR CODE</label>
    <input required type="file" name="qrcode2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Set Escrow wallet</label>
    <input required type="text" name="mixinwallet2" class="form-control" id="exampleInputPassword1" placeholder="Current address set : <?php echo $mixinwallet2 ?>">
  </div>

  <button type="submit" name="update" class="btn btn-primary">Submit</button>
</form

      </div>
    </div>
  </div>
</div>






</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h4>SET BTC MIXING WALLET ADDRESS AND QR CODE HERE </h4>
    <form action="ad2.php" method="POST" enctype="multipart/form-data">
        Current QR Code:<br>
       <?php echo '<img src="qr/'.$mixinqr.'" class="img img-fluid w-75 mx-auto mb-2"> ';
       ?> 
  <div class="form-group">
    <label for="exampleInputEmail1">Set QR CODE</label>
    <input required type="file" name="qrcode" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Set Mixing wallet</label>
    <input required type="text" name="mixinwallet" class="form-control" id="exampleInputPassword1" placeholder="Current address set : <?php echo $mixinwallet ?>">
  </div>

  <button type="submit" name="update" class="btn btn-primary">Submit</button>
</form

      </div>
    </div>
  </div>
</div>






</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <h3>Total Users: <br><?php echo $count?></h3>
<h3>Total Transactions: <br><?php echo $countescrow?></h3>
<h3>Total Mixins: <br><?php echo $countmixin?></h3>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit Escrow Details</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">Edit Mixing Details</button>
<br><br>
<!--<a href="create-escrow-basic2.php"><button type="button" class="btn btn-primary" >Add Escrow Transaction</button></a>-->

<ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Users Table</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Escrow Transaction Table</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" id="third-tab" data-toggle="tab" href="#third" role="tab" aria-controls="profile" aria-selected="false">Bitcoin Mixing Request Table</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="fourth-tab" data-toggle="tab" href="#fourth" role="tab" aria-controls="profile" aria-selected="false">Deposit Request</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" id="fifth-tab" data-toggle="tab" href="#fifth" role="tab" aria-controls="profile" aria-selected="false">Withdrawal Request</a>
  </li>
  <!--<li class="nav-item">-->
  <!--  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>-->
  <!--</li>-->
</ul>
<div class="tab-content mt-3" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      
      
      <div class="table-responsive">
  <table class="table">
      <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Location</th>
      <th scope="col">Balance</th>
      <th scope="col">Referal</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <?php
  if ( $count > 0) {
  // output data of each row
 
 while($rowusers = mysqli_fetch_assoc($resultusers)){
            echo "<tr>";
                echo "<td>" . $rowusers['username'] . "</td>";
                echo "<td>" . $rowusers['email'] . "</td>";
                echo "<td>" . $rowusers['password'] . "</td>";
                echo "<td>" . $rowusers['location'] . "</td>";
                echo "<td>" . $rowusers['balance'] . "</td>";
                echo "<td>" . $rowusers['referal'] . "</td>";
                echo "<td><a href='edit.php?id=".$rowusers['id'] . "' ><button class='btn btn-primary'>Edit</button></a>  <a href='delete.php?id=".$rowusers['id'] . "'><button class='btn btn-danger'>Delete</button></a>  </td>";
            echo "</tr>";
        }
        
        // Free result set
        mysqli_free_result($resultusers);
  
} else {
  echo "0 results";
}

  
  ?>
  </table>
</div>
      
      
      </div>
      
      
      
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      
      
      <div class="table-responsive">
  <table class="table">
      <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">User Type</th>
      <th scope="col">Transaction Type</th>
      <th scope="col">Currency</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Address</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <?php
  if ( $countescrow > 0) {
  // output data of each row
 
 while($rowescrow = mysqli_fetch_assoc($resultescrow)){
            echo "<tr>";
                echo "<td>" . $rowescrow['uid'] . "</td>";
                echo "<td>" . $rowescrow['usertype'] . "</td>";
                echo "<td>" . $rowescrow['transactiontype'] . "</td>";
                echo "<td>" . $rowescrow['currency'] . "</td>";
                echo "<td>" . $rowescrow['price'] . "</td>";
                echo "<td>" . $rowescrow['description'] . "</td>";
                echo "<td>" . $rowescrow['address'] . "</td>";
                echo "<td>" . $rowescrow['status'] . "</td>";
                echo "<td>" . $rowescrow['transactiondate'] . "</td>";
                echo "<td><a href='editescrow.php?id1c=".$rowescrow['id'] . "' ><button class='btn btn-primary' >Edit</button></a> <a href='admin.php?id1=".$rowescrow['id'] . "' ><button class='btn btn-primary' >Accept</button></a>  <a href='admin.php?id1b=".$rowescrow['id'] . "'><button  class='btn btn-danger'>Decline</button></a>  <a href='delete.php?idescrow=".$rowescrow['id'] . "'><button class='btn btn-danger'>Delete</button></a></td>";
            echo "</tr>";
        }
        
        // Free result set
        mysqli_free_result($resultusers);
  
} else {
  echo "0 results";
}

  
  ?>
  </table>
</div>
      
      
      </div>
      
      
      
      <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
      
      
      <div class="table-responsive">
  <table class="table">
      <thead>
    <tr>
      <th scope="col">Client</th>
      <th scope="col">Amount</th>
      <th scope="col">Status</th>
      <th scope="col">Mixin Status</th>
      <th scope="col">Expected Completion</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <?php
  if ( $countmixin > 0) {
  // output data of each row
 
 while($rowmixin = mysqli_fetch_assoc($resultmixin)){
            echo "<tr>";
                echo "<td>" . $rowmixin['fullname'] . "</td>";
                echo "<td>" . $rowmixin['amount'] . "</td>";
                echo "<td>" . $rowmixin['status'] . "</td>";
                echo "<td>" . $rowmixin['mixinstatus'] . "</td>";
                echo "<td>" . $rowmixin['dateelapse'] . "</td>";
                echo "<td><a href='admin.php?id2=".$rowmixin['id'] . "' ><button class='btn btn-primary' >Accept</button></a>  <a href='admin.php?id3=".$rowmixin['id'] . "'><button  class='btn btn-danger'>Decline</button></a>  <a href='delete.php?idmixin=".$rowmixin['id'] . "'><button class='btn btn-danger'>Delete</button></a></td>";
            echo "</tr>";
        }
        
        // Free result set
        mysqli_free_result($resultmixin);
  
} else {
  echo "0 results";
}

  
  ?>
  </table>
</div>
      
      
      </div>
      
      
      
      
      
      <div class="tab-pane fade" id="fourth" role="tabpanel" aria-labelledby="third-tab">
      
      
      <div class="table-responsive">
  <table class="table">
      <thead>
    <tr>
      <th scope="col">Client</th>
      <th scope="col">Amount</th>
      <th scope="col">Currency</th>
      <th scope="col">Transaction Date</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <?php
  if ( $countmixin > 0) {
  // output data of each row
 
 while($rowdeposit = mysqli_fetch_assoc($resultdeposit)){
            echo "<tr>";
                echo "<td>" . $rowdeposit['uid'] . "</td>";
                echo "<td>" . $rowdeposit['amount'] . "</td>";
                echo "<td>" . $rowdeposit['currency'] . "</td>";
                echo "<td>" . $rowdeposit['transactiondate'] . "</td>";
                echo "<td>" . $rowdeposit['status'] . "</td>";
                echo "<td><a href='admin.php?id4a=".$rowdeposit['id'] . "' ><button class='btn btn-primary' >Accept</button></a>  <a href='admin.php?id4b=".$rowdeposit['id'] . "'><button  class='btn btn-danger'>Decline</button></a>  <a href='delete.php?iddeposit=".$rowdeposit['id'] . "'><button class='btn btn-danger'>Delete</button></a></td>";
            echo "</tr>";
        }
        
        // Free result set
        mysqli_free_result($resultusers);
  
} else {
  echo "0 results";
}

  
  ?>
  </table>
</div>
      
      
      </div>
      
       <div class="tab-pane fade" id="fifth" role="tabpanel" aria-labelledby="third-tab">
      
      
      <div class="table-responsive">
  <table class="table">
      <thead>
    <tr>
      <th scope="col">Client</th>
      <th scope="col">Amount</th>
      <th scope="col">Address</th>
      <th scope="col">Currency</th>
      <th scope="col">Transaction Date</th>
      <th scope="col">Status</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <?php
  if ( $countmixin > 0) {
  // output data of each row
 
 while($rowwithdraw = mysqli_fetch_assoc($resultwithdraw)){
            echo "<tr>";
                echo "<td>" . $rowwithdraw['uid'] . "</td>";
                echo "<td>" . $rowwithdraw['amount'] . "</td>";
                echo "<td>" . $rowwithdraw['address'] . "</td>";
                echo "<td>" . $rowwithdraw['currency'] . "</td>";
                echo "<td>" . $rowwithdraw['transactiondate'] . "</td>";
                echo "<td>" . $rowwithdraw['status'] . "</td>";
                echo "<td><a href='admin.php?id5a=".$rowwithdraw['id'] . "' ><button class='btn btn-primary' >Accept</button></a>  <a href='admin.php?id5b=".$rowwithdraw['id'] . "'><button  class='btn btn-danger'>Decline</button></a>  <a href='delete.php?idwithdraw=".$rowwithdraw['id'] . "'><button class='btn btn-danger'>Delete</button></a></td>";
            echo "</tr>";
        }
        
        // Free result set
        mysqli_free_result($resultusers);
  
} else {
  echo "0 results";
}

  
  ?>
  </table>
</div>
      
      
      </div>
  <!--<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>-->
</div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
  </body>
</html>