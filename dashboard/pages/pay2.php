<?php
session_start();
include('../../db.php');

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
$deposit = $_POST['deposit'];
$currency = $_POST['currency'];

$query = "INSERT into `deposit` (uid,amount,currency,status)
            VALUES ('$uname', '$deposit', '$currency', 'Pending')";
            $result = mysqli_query($con,$query);
            if($result){
                echo "<script>alert('Deposit transaction has been successful, pending approval')</script>";
            }else{
                echo 'hard no';
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
        <a href="deposit.php" class="btn btn-danger btn-sm rounded-pill my-3 text-center">Go Back</a>
        <h4 class="text-center">You are required to pay <span class="text-danger"><?php echo $deposit; ?> <?php echo $currency; ?></span>  into the specified wallet below:</h4>
<p class="text-center">Barcode</p>
<!--<img src="https://2d6qxj3uqdaw38d6lk27l0ao-wpengine.netdna-ssl.com/wp-content/uploads/2015/10/apb-qr-code.png" class="rounded mx-auto d-block" alt="...">-->

       <?php echo '<img src="../qr2/'.$mixinqr2.'" class="img img-fluid shadow-1-strong mx-auto mb-2" width="200" height="200"> ';       ?> 

<p class="text-center">or</p>
<p class="text-center">Address</p>
<h3 class="text-center"><?php echo $mixinwallet2 ?></h3>
</div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    </body>

</html>