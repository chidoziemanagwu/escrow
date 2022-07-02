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

$mail->From = 'support@internetescrowservices.co.uk';
$mail->FromName = 'INTERNET ESCROW SERVICES UK LIMITED';
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
                            <img src="https://internetescrowservices.co.uk/assets/img/logo.png"  alt="INTERNET ESCROW SERVICES UK LIMITED" width="200" style="display: block;"/>
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
                                        Regards,<br> <br> INTERNET ESCROW SERVICES UK LIMITED Team<br><br>
                                      
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
    INTERNET ESCROW SERVICES UK LIMITED: Forgot Password
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
              <div style="background-color:rgba(22,223,126,.8);" class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                    <a href="../../index.html" class="text-center mb-4"><img src="../../assets/img/logo.png" class="img-thumbnail shadow-1-strong mb-3" width="80"  style="border-radius:20px"></a>
                  <h3 class="font-weight-bolder text-white">Recover Password</h3>
                  <p class="mb-0">In order to reset your password, enter your registered email.</p>
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
                      <button style="color:rgba(22,223,126,.8);" type="submit" class="btn btn-white w-100 mt-4 mb-0">Reset Password</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Already have an account?
                    <a href="sign-in.php" class="text-white font-weight-bold">Sign In</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8 border">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('')">
<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="543.21934" height="633.6012" viewBox="0 0 543.21934 633.6012" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M854.05236,366.72793H345.48229a17.11177,17.11177,0,0,1-17.092-17.092V150.29137a17.11177,17.11177,0,0,1,17.092-17.092H854.05236a17.11177,17.11177,0,0,1,17.092,17.092V349.636A17.11177,17.11177,0,0,1,854.05236,366.72793Z" transform="translate(-328.39033 -133.1994)" fill="#f2f2f2"/><path d="M735.44243,355.827H426.21a87.01423,87.01423,0,0,1-86.916-86.916V231.02584a87.01476,87.01476,0,0,1,86.916-86.91662h347.1176a87.01476,87.01476,0,0,1,86.916,86.91662A124.94266,124.94266,0,0,1,735.44243,355.827Z" transform="translate(-328.39033 -133.1994)" fill="#fff"/><path d="M655.673,201.175H451.26661a4.408,4.408,0,1,1,0-8.81606H655.673a4.408,4.408,0,0,1,0,8.81606Z" transform="translate(-328.39033 -133.1994)" fill="#e6e6e6"/><path d="M759.14708,248.20578H451.26661a4.408,4.408,0,1,1,0-8.81606H759.14708a4.408,4.408,0,0,1,0,8.81606Z" transform="translate(-328.39033 -133.1994)" fill="#e6e6e6"/><path d="M759.14708,295.23659H451.26661a4.408,4.408,0,1,1,0-8.81606H759.14708a4.408,4.408,0,0,1,0,8.81606Z" transform="translate(-328.39033 -133.1994)" fill="#e6e6e6"/><path d="M759.14708,295.23659H451.26661a4.408,4.408,0,1,1,0-8.81606H759.14708a4.408,4.408,0,0,1,0,8.81606Z" transform="translate(-328.39033 -133.1994)" fill="#e6e6e6"/><path d="M634.10291,253.6037a9.08847,9.08847,0,0,0,11.00741,8.54713l16.81052,27.57777,7.15453-15.18214L652.015,250.6857a9.13775,9.13775,0,0,0-17.912,2.918Z" transform="translate(-328.39033 -133.1994)" fill="#ffb6b6"/><path d="M760.255,332.63993,702.3227,301.21629,684.04961,284.0724s-7.94382-2.1269-5.02-4.70983-5.40826-5.074-5.40826-5.074l-9.80947-9.20329L649.8729,274.948l4.0341,6.25338s-.27766,10.35216,5.39346,8.36056,4.25394,6.59416,4.25394,6.59416l33.84976,52.47148Z" transform="translate(-328.39033 -133.1994)" fill="#3f3d56"/><circle cx="260.85489" cy="113.24865" r="56.58599" fill="#16df7e"/><polygon points="432.044 611.601 420.278 611.601 414.679 566.219 432.044 566.219 432.044 611.601" fill="#ffb6b6"/><path d="M766.64449,765.186h-8.43765l-1.50609-7.96615-3.8573,7.96614H730.46478a5.03052,5.03052,0,0,1-2.85851-9.17017l17.87094-12.34231V735.62l18.79712,1.12193Z" transform="translate(-328.39033 -133.1994)" fill="#2f2e41"/><polygon points="337.942 611.601 326.176 611.601 320.577 566.219 337.942 566.219 337.942 611.601" fill="#ffb6b6"/><path d="M672.54234,765.186h-8.43765l-1.50608-7.96615L658.7413,765.186H636.36263a5.03052,5.03052,0,0,1-2.85851-9.17017l17.871-12.34231V735.62l18.79711,1.12193Z" transform="translate(-328.39033 -133.1994)" fill="#2f2e41"/><rect x="360.17495" y="268.38114" width="59.38485" height="67.60737" fill="#ffb6b6"/><path d="M689.9357,434.92742l-10.04975,11.877L662.5273,483.34891,618.788,587.41832l-9.25023,22.00919,7.47021,38.90734s1.20911,27.41093,1.20911,31.89768c0,9.13613,7.64134,14.19843,7.64134,14.19843l5.606,29.19819,54.36-2.284s-1.89668-32.18465-13.28212-40.30307-16.6191-50.42877-16.6191-50.42877l-6.1865-18.77224,60.29846-71.47763.38919,24.98513.18838,12.09342s-8.83024,78.65618,1.463,93.921.20981,13.46892.20981,13.46892l.49048,31.48835,64.40973.45681L762.976,626.12129s-7.2153-5.6971-3.35489-11.42384-3.74157-12.74053-3.74157-12.74053l3.40954-70.77248s-3.7751-12.22439.66547-13.81333.583-12.10132.583-12.10132l.65994-13.69836-13.24739-42.483Z" transform="translate(-328.39033 -133.1994)" fill="#2f2e41"/><path d="M748.86374,401.58054l6.39529-19.18588,4.56807-6.39529,1.82722-18.27226c0-49.33511-11.00445-41.11978-11.00445-41.11978l-6.3542-17.35146-29.23561-.91361L696.331,316.15772l-15.53142,5.48167-6.082,31.60212,11.10688,33.72122,2.74084,18.27226c-5.22846,9.6521-4.78621,5.08671-.45681,12.33378l51.61914,14.161c18.27226,6.39529,18.27226-10.04974,14.60827-14.161C750.672,413.45751,748.86374,401.58054,748.86374,401.58054Z" transform="translate(-328.39033 -133.1994)" fill="#3f3d56"/><circle cx="397.51079" cy="131.90749" r="27.10245" fill="#ffb6b6"/><path d="M699.50588,307.8341" transform="translate(-328.39033 -133.1994)" fill="#2f2e41"/><path d="M762.08369,301.28407a3.32909,3.32909,0,0,1-1.8546,4.86957c-3.63616,1.206-5.87453,4.72337-8.48745,7.53731-2.60383,2.8048-6.79728,5.1345-10.12284,3.225-3.31642-1.90027-3.54483-6.75155-6.32219-9.38276-2.70432-2.55811-7.19928-2.24751-10.37869-.30151l-.09507.05848a3.35133,3.35133,0,0,1-5.12711-3.40958q1.671-8.88678,3.34014-17.77163a59.76117,59.76117,0,0,1-12.50736,18.9118,13.757,13.757,0,0,1-5.42687,3.8189c-1.90027.603-3.74579-1.36128-5.59131-1.005,4.58636-4.01077,20.00815-29.71986,17.249-46.90492q-4.865.5482-9.72994,1.09635A8.94324,8.94324,0,0,0,704.855,257.924a10.51041,10.51041,0,0,1-.55734,4.41271c-1.35213.15535-2.71341.30151-4.06554.4568-1.882.21017-3.92858.39285-5.54563-.59381-2.69517-1.64449-2.77742-5.53649-2.01-8.60628,2.2475-8.926,9.063-16.39022,17.40431-20.30045,8.3413-3.90115,10.80806,4.78732,19.597,2.01,17.35864-5.48168,30.66085,3.892,35.34769,21.28717C768.96323,271.18051,766.10361,286.66626,762.08369,301.28407Z" transform="translate(-328.39033 -133.1994)" fill="#2f2e41"/><path d="M837.11581,765.77552H803.92929l-.14258-.25879c-.42431-.76953-.834-1.585-1.2168-2.42285-3.41845-7.31836-4.86328-15.68848-6.13818-23.07325l-.96-5.5664a3.43689,3.43689,0,0,1,5.41016-3.36231q7.56517,5.5049,15.13623,10.999c1.91113,1.39062,4.09375,3,6.18408,4.73925.20166-.97949.4126-1.96191.62353-2.93066a3.43916,3.43916,0,0,1,6.28077-1.08594l3.88281,6.23828c2.832,4.55567,5.33154,9.04493,4.82226,13.88672a.756.756,0,0,1-.01318.17578,10.94679,10.94679,0,0,1-.56348,2.33106Z" transform="translate(-328.39033 -133.1994)" fill="#f0f0f0"/><path d="M870.42521,766.49329l-315.3575.30731a1.19069,1.19069,0,0,1,0-2.38135l315.3575-.30731a1.19069,1.19069,0,0,1,0,2.38135Z" transform="translate(-328.39033 -133.1994)" fill="#cacaca"/><path d="M584.10145,322.60868l-34.688-29.29381a5.86536,5.86536,0,0,1-.69609-8.25652l6.38441-7.56005a5.86537,5.86537,0,0,1,8.25653-.6961l34.688,29.29381a5.86536,5.86536,0,0,1,.6961,8.25652l-6.38442,7.56006A5.86537,5.86537,0,0,1,584.10145,322.60868Z" transform="translate(-328.39033 -133.1994)" fill="#3f3d56"/><path d="M551.2336,285.66783a3.161,3.161,0,0,0,.37511,4.44934l34.688,29.29381a3.16093,3.16093,0,0,0,4.44933-.37512l6.38442-7.56a3.161,3.161,0,0,0-.37512-4.44934l-34.688-29.29381a3.161,3.161,0,0,0-4.44934.37512Z" transform="translate(-328.39033 -133.1994)" fill="#fff"/><path d="M571.59773,297.05559a1.33329,1.33329,0,0,1-1.05444.55768l-5.45025.12517a1.33366,1.33366,0,1,1-.06117-2.66662l3.56552-.082-3.5114-9.26539a1.33372,1.33372,0,0,1,2.49431-.94531l4.17956,11.02823a1.33428,1.33428,0,0,1-.14089,1.21782Z" transform="translate(-328.39033 -133.1994)" fill="#16df7e"/><path d="M572.29679,299.38408a9.08846,9.08846,0,0,1,7.29959,11.8715l25.5864,19.70946-15.87006,5.46132-21.86426-19.5537a9.13775,9.13775,0,0,1,4.84831-17.48852Z" transform="translate(-328.39033 -133.1994)" fill="#ffb6b6"/><path d="M705.50514,309.12932l-65.50929,40.27784s-26.4126-9.77273-21.25071-14.29686-11.2708-7.58266-11.2708-7.58266l-18.15322-12.213-10.534,12.24231s1.91937,19.88518,5.18517,16.442,8.14738,5.96269,8.14738,5.96269,1.44254,10.50246,10.73916,7.8595S637.101,382.88158,637.101,382.88158l80.62233-30.06905Z" transform="translate(-328.39033 -133.1994)" fill="#3f3d56"/><path d="M587.25535,269.147a4.89054,4.89054,0,0,1-3.91317-1.95719l-11.99792-15.99749a4.89185,4.89185,0,1,1,7.82715-5.87l7.84945,10.46514,20.16029-30.24a4.89206,4.89206,0,0,1,8.14088,5.42726l-23.99584,35.99375a4.894,4.894,0,0,1-3.93468,2.177C587.34613,269.14624,587.30074,269.147,587.25535,269.147Z" transform="translate(-328.39033 -133.1994)" fill="#fff"/></svg></div>
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