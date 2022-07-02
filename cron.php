<?php
session_start();
require('db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_ALL);
ini_set('display_errors', 1);

$quer = "SELECT * FROM mixin2 ";
$result1 = mysqli_query($con,$quer);
// $rowusers = mysqli_fetch_assoc($result1);
// $amount = $rowusers['amount'];
// $uid = $rowusers['fullname'];
// $mixinstatus = $rowusers['mixinstatus'];
// $dateelapse = $rowusers['dateelapse'];

$today = date('Y-m-d');

while($row2 = mysqli_fetch_assoc($result1)){ 
    if ($row2['dateelapse'] == $today){
        // echo 'ok';
        
        $id = $row2['id'];
        $query = "UPDATE mixin2 SET mixinstatus = 'Completed'  WHERE `id` = '$id'";
               
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
                    $newamt = $rowusers['balance'] - $amount;
                    
                    $email = $rowusers['email'];
                    
                    $query = "UPDATE users SET balance = '$newamt' WHERE `username` = '$uid'";
               
                   $result2 = mysqli_query($con, $query);
                   
                   if($result2)
                       {
                           
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

$mail->Subject = 'Escrow-Chain Mixin Request Complete';
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
                                        <b>Mixin Request Complete</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        Your Mixin Request is now Completed. If you have further enquiries, please contact us<br>
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
$mail->AltBody = "Mixin Request Complete.";

    if($mail->send()) {
    

   
                        //   header( "refresh:3;url=admin.php" );
                           echo '<script>alert(" Data Updated ")</script>';
           
    

            }
            else{
                echo 'EMail Not sent';
            }
                       }else{
                           header( "refresh:3;url=admin.php" );
                           echo '<script>alert(" Data Updated ")</script>';
                       }
        }else{
            
        }
    
    }else{
        echo 'nope';
    }
}


?>