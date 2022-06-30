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
        echo 'ok';
    
    }else{
        echo 'nope';
    }
}


?>