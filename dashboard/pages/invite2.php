<?php
session_start();
require('../../db.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$id = $_SESSION['id'];
if(!isset($_SESSION['is_logged_in'])){
    header('location:logout.php');
}

if(isset($_GET['escrowid'])){
$escrowid = $_GET['escrowid'];
$sql2 = "SELECT * FROM escrow2 WHERE id = '$escrowid'";
$result2 = $con->query($sql2);
// $num_rows = mysqli_num_rows($result2);

$row = $result2->fetch_assoc();

$role = $_GET['role'];
$uid = $_GET['uid'];
$email = $_GET['email'];

     $usertype = $role;
$transactiontype =  $row['transactiontype'];
$currency =  $row['currency'];
$price =  $row['price'];
 $description = $row['description'];
 $address = $row['address'];
 $trans = date("Y-m-d");
 $status = $row['status'];
 $deadline = $row['deadline'];
 
$query = "INSERT into `escrow2` (uid,usertype,transactiontype,currency,price,description,address,status,transactiondate, deadline)
            VALUES ('$uid', '$usertype', '$transactiontype', '$currency', '$price', '$description','$address', '$status', '$trans', '$deadline')";
            $result = mysqli_query($con,$query);
            if($result){
                
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

$mail->Subject = 'Escrow-Chain Successful Escrow Creation';
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
                                        <b>Escrow Creation Successful</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        Your Escrow has been created successfully, You have been added as a <b><u>'.$role.'</u></b> to the escrow transaction with ID <b><u>'.$escrowid.'</u></b>. If you have further enquiries, please contact us<br>
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
$mail->AltBody = "Escrow Has been successfully created. ";

    if($mail->send()) {
    

        header("Refresh:1; url=logout.php");
             $_SESSION['is_logged_in'] = $email;
             
   echo "
            <script>alert('Invite accepted and Escrow created successfully!')</script>
            ";   
    

            }
            else{
                echo 'EMail Not sent';
            }

            }
            




}


$usersQuery1 = "SELECT * FROM users where id = $id ";
$usersResult1=mysqli_query($con,$usersQuery1);
$rowUser1 = mysqli_fetch_array($usersResult1);

$uid = $rowUser1['username'];


$email = $_SESSION['is_logged_in'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $con->query($sql);
$row = $result->fetch_assoc();

$id = $row['id'];
$balance = $row['balance'];

// $sql2 = "SELECT * FROM deposit WHERE uid = '$uid'";
// $result2 = $con->query($sql2);

?>