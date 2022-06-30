<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include('../../db.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(!isset($_SESSION['is_logged_in'])){
    header('location:logout.php');
}
$email = $_SESSION['is_logged_in'];
// $sql = "SELECT * FROM users WHERE username = '$email'";
// $result = $con->query($sql);
// $row = $result->fetch_assoc();

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $con->query($sql);
$row = $result->fetch_assoc();

$id = $row['id'];
$uname = $row['username'];
$balance = $row['balance'];

// $id = $row['id'];
// $balance = $row['balance'];
$mixin = $_POST['mixin'];

if (isset($_POST['mixin'])){
        // removes backslashes
if ($balance > 0){ 
        
$email = $_SESSION['is_logged_in'];

// $Today=date('y-m-d');

// // add 3 days to date
// $NewDate=Date('y-m-d', strtotime('+3 days'));
// echo $NewDate;

$dateelapse = date('Y-m-d',strtotime('+3 day'));

            $query = "INSERT into `mixin2` (fullname,amount,status,mixinstatus,dateelapse)
            VALUES ('$uname', '$mixin', 'Pending','Pending','$dateelapse')";
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

$mail->Subject = 'Escrow-Chain Successful Mixin Creation';
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
                                        <b>Mixin Creation Successful</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                        Your Mixin has been created successfully. If you have further enquiries, please contact us<br>
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
$mail->AltBody = "Mixin Has been successfully created.";

    if($mail->send()) {
    

        // header("Refresh:15; url=dashboard.php");
             $_SESSION['is_logged_in'] = $email;
             
    echo "
            <script>alert('Mixin has been successfully created')</script>
            ";
           
    

            }
            else{
                echo 'EMail Not sent';
            }

            
            
    }else{
        echo 'hard no';
//          $digits = 6;
// $pin = rand(pow(10, $digits-1), pow(10, $digits)-1);

// echo $pin;
    }
}else{
    // header( "refresh:0.001;url=coinmixin.php" );
     echo "
            <script>
            alert('You must have funds to create mixin. Deposit Funds first')
            window.location.replace('coinmixin.php');
            </script>
            "; 
}

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

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ESCROW - CHAIN</title>
  <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
<link rel="icon" href="../../img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
  rel="stylesheet"
/>
</head>

<body style="background:#f8f9fa">
    
    <div class="container py-3 text-center">
        
        <a href="dashboard.php" class="btn btn-danger btn-sm rounded-pill my-3 text-center">Go Back</a>
        
<div class="shadow-2-strong p-4 rounded-lg" style="border-radius:20px;">
           Instructions:
           <ul class="list-group">
  <li class="list-group-item"><b>1. YOU CAN ONLY MIX BITCOIN (BTC)</b></li>
  <li class="list-group-item">2. To begin the coin mixing process, you will include <b>10%</b> of the amount you intend to mix to the amount to be sent. E.g Mixing 10BTC requires you to add 10% of 10BTC (1BTC), you will send 11BTC.</li>
  <li class="list-group-item">3. Kindly copy the wallet address or scan the barcode to complete your Payment charges towards the Coin Mixing Protocol.</li>
  <li class="list-group-item">4. Send proof of payment to <b class="text-danger">mixin@escrow-chain.com</b>.</li>
  <li class="list-group-item">5. You will get a confirmation email from us regarding your coin mixin request.</li>
  <li class="list-group-item">6. The Coin Mixing Protocol will be begin once payment is completed. NOTE: IT MAY TAKE UP TO 72HOURS FOR YOUR REQUEST TO BE COMPLETED</li>
</ul>
</div>
<hr>
        <h4 class="text-center">You are required to pay <span class="text-danger">$1000 + 10% of <?php echo $mixin ?>BTC</span> (standard charge +10% of <?php echo $mixin ?>BTC to mix) worth of BTC  into the specified mixing wallet below For the coin mixing protocol to begin.:</h4>
<p class="text-center">Barcode</p>
<!--<img src="https://2d6qxj3uqdaw38d6lk27l0ao-wpengine.netdna-ssl.com/wp-content/uploads/2015/10/apb-qr-code.png" class="rounded mx-auto d-block" alt="...">-->
<?php echo '<img src="../qr/'.$mixinqr.'" class="img img-fluid shadow-1-strong mx-auto mb-2" width="200" height="200"> ';
       ?> 

 
<p class="text-center">or</p>
<p class="text-center">Address</p>
<h3 class="text-center"><?php echo $mixinwallet ?></h3>
<hr>
</div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    </body>

</html>