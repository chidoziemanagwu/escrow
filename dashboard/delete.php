<?php
require('db.php');



if(isset($_REQUEST['id'])){

$id=$_REQUEST['id'];
$query = "DELETE FROM users WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: admin.php");

}

if(isset($_REQUEST['idwithdraw'])){

$id=$_REQUEST['idwithdraw'];
$query = "DELETE FROM withdraw WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: admin.php");

}

if(isset($_REQUEST['iddeposit'])){

$id=$_REQUEST['iddeposit'];
$query = "DELETE FROM deposit WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: admin.php");

}

if(isset($_REQUEST['idmixin'])){

$id=$_REQUEST['idmixin'];
$query = "DELETE FROM mixin2 WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: admin.php");

}

if(isset($_REQUEST['idescrow'])){

$id=$_REQUEST['idescrow'];
$query = "DELETE FROM escrow2 WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: admin.php");

}


if(isset($_REQUEST['id2'])){

$id2=$_REQUEST['id2'];
$query2 = "DELETE FROM escrow WHERE id=$id2"; 
$result2 = mysqli_query($con,$query2) or die ( mysqli_error());
header("Location: admin.php");

}
?>