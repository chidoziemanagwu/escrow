<?php
session_start();
require('../../db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_REQUEST['email'])){
     $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($con,$email);
//  $password = stripslashes($_REQUEST['pword']);
//  $password = mysqli_real_escape_string($con,$password);
 
    $quer = "SELECT * FROM users WHERE email = '$email' ";
    $result1 = mysqli_query($con,$quer);
    $num_rows = mysqli_num_rows($result1);
    $row = mysqli_fetch_assoc($result1);
    
    if($num_rows == 1){
        // header("Refresh:1; url=dashboard.php");
            //  $_SESSION['is_logged_in'] = $username;
            //  $_SESSION['is_logged_in'] = $email;
            //  $_SESSION['id'] = $row['id'];
            //  echo $row['id'];
             
             
                
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

$mail->Subject = 'Password reset';
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
                                        <b>Password reset</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        You have requested your password be reset, click the button below to proceed<br> 
                                        <p style="text-align:center"><a href="https://escrow-chain.com/dashboard/pages/reset.php?email='.$email.'" style="  background: #8c82f6;
  background-image: linear-gradient(to bottom, #e09e13, #8c82f6);
  border-radius: 20px;
  color: #ffffff;
  font-size: 20px;
  padding: 5px 10px 5px 10px;
  text-decoration: none;">Reset Password</a></p><p style="text-align:center">or you can copy and paste the url<br>https://escrow-chain.com/dashboard/pages/reset.php?email='.$email.'</p>. If you have further enquiries, please contact us<br>
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
$mail->AltBody = "Here is your password reset link. copy and paste the url in your browser: https://escrow-chain.com/dashboard/pages/reset.php?email='.$email.' ";

    if($mail->send()) {
    

        header("Refresh:1; url=sign-in.php");
            //  $_SESSION['is_logged_in'] = $email;
             
   echo "
            <script>alert('Password reset link sent successfully!')</script>
            ";   
    

            }
            else{
                   echo "
            <script>alert('Password reset link failed!')</script>
            ";  
            }

            
    }else {
        //   header("Refresh:1; url=login.php");
            //  $_SESSION['is_logged_in'] = $username;
            
               echo "
            <script>alert('This email does not exist')</script>
            "; 
}
    
}
?>
<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">-->
  <!--<link rel="icon" type="image/png" href="../assets/img/favicon.png">-->
  <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
<link rel="icon" href="../../img/favicon.ico" type="image/x-icon">
  <title>
    Escrow-Chain: Forgot Password
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="">

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                    <a href="../../index.html" class="text-center mb-4"><img src="../../img/logo2.png" class="img-thumbnail shadow-1-strong mb-3" style="border-radius:20px"></a>
                  <h3 class="font-weight-bolder text-info text-gradient">Recover Password</h3>
                  <p class="mb-0">Enter your registered email to recover your password</p>
                </div>
                <div class="card-body">
                  <form role="form" action="forgot.php" method="post">
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                    </div>
                    <!--<label>Password</label>-->
                    <!--<div class="mb-3">-->
                    <!--  <input type="password" class="form-control" name="pword" placeholder="Password" aria-label="Password" aria-describedby="password-addon">-->
                    <!--</div>-->
                    <!--<div class="form-check form-switch">-->
                    <!--  <input class="form-check-input" type="checkbox" id="rememberMe" checked="">-->
                    <!--  <label class="form-check-label" for="rememberMe">Remember me</label>-->
                    <!--</div>-->
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Reset Password</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Already have an account?
                    <a href="sign-in.php" class="text-info text-gradient font-weight-bold">Sign In</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('https://images.pexels.com/photos/935756/pexels-photo-935756.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>