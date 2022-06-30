<?php
require('db.php');
// include("auth.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_REQUEST['id'])){
$id=$_REQUEST['id'];
$query = "SELECT * from users where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
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
<body>
<div class="form">
<h1>Update User Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
     
// header( "refresh:5;url=wherever.php" );
$id=$_REQUEST['id'];

$trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['name'];
$email =$_REQUEST['email'];
$password =$_REQUEST['password'];
$location =$_REQUEST['location'];
$balance = $_REQUEST['balance'];

// $submittedby = $_SESSION["username"];

$update="update users set trn_date='".$trn_date."',
username='".$name."', email='".$email."',
password='".$password."', location='".$location."', balance='".$balance."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
// header('location:admin.php');
 echo "
            <script>
            alert('Update Successful')
            window.location.replace('admin.php');
            </script>
            "; 
}else {
?>
<div>
<form name="form" method="post" action="" class='w-75 mx-auto'> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" class="w-100" value="<?php echo $row['id'];?>" />
<p><input type="text" name="name" class="w-100" placeholder="Enter Name" 
required value="<?php echo $row['username'];?>" /></p>
<p><input type="text" name="email" class="w-100" placeholder="Enter Age" 
required value="<?php echo $row['email'];?>" /></p>
<p><input type="text" name="password" class="w-100" placeholder="Enter Age" 
required value="<?php echo $row['password'];?>" /></p>
<p><input type="text" class="w-100" name="location" placeholder="Enter Age" 
required value="<?php echo $row['location'];?>" /></p>
<p><input type="text" class="w-100" name="balance" placeholder="Enter Age" 
required value="<?php echo $row['balance'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
<?php }else if(isset($_REQUEST['id2'])){
$id2=$_REQUEST['id2'];
$query2 = "SELECT * from escrow where id='".$id2."'"; 
$result2 = mysqli_query($con, $query2) or die ( mysqli_error());
$row2 = mysqli_fetch_assoc($result2);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="form">
 
<h1>Update Escrow Record</h1>
<?php
// $status = "";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_POST['new2']) && $_POST['new2']==2)
{
$id2=$_REQUEST['id2'];
// $trn_date = date("Y-m-d H:i:s");
$amount =$_REQUEST['amount'];
$currency =$_REQUEST['currency'];
$escrowfee =$_REQUEST['escrowfee'];
$buyername =$_REQUEST['buyername'];
$buyeremail =$_REQUEST['buyeremail'];
$sellername =$_REQUEST['sellername'];
$selleremail =$_REQUEST['selleremail'];
$wallet =$_REQUEST['wallet'];
$status =$_REQUEST['status'];
// $submittedby = $_SESSION["username"];
$update2="update escrow set amount='".$amount."',
currency='".$currency."', escrowfee='".$escrowfee."',
buyername='".$buyername."',
buyeremail='".$buyeremail."',
sellername='".$sellername."',
selleremail='".$selleremail."',
wallet='".$wallet."',
status='".$status."' where id='".$id2."'";
mysqli_query($con, $update2) or die(mysqli_error());

if(mysqli_query($con, $update2)){
header('location:admin.php');
}
}else {
?>
<div>
<form name="form" method="post" action="" class='w-75 mx-auto'> 
<input type="hidden" name="new2" value="2" />

<input name="id2" type="hidden" value="<?php echo $row2['id'];?>" />

<p><input type="text" name="amount" class="w-100" placeholder="Enter Name" 
required value="<?php echo $row2['amount'];?>" /></p>

<p><input type="text" name="currency" class="w-100" placeholder="Enter Age" 
required value="<?php echo $row2['currency'];?>" /></p>

<p><input type="text" name="escrowfee" class="w-100" placeholder="Enter Name" 
required value="<?php echo $row2['escrowfee'];?>" /></p>

<p><input type="text" name="buyername" class="w-100" placeholder="Enter Age" 
required value="<?php echo $row2['buyername'];?>" /></p>

<p><input type="text" name="buyeremail" class="w-100" placeholder="Enter Name" 
required value="<?php echo $row2['buyeremail'];?>" /></p>

<p><input type="text" name="sellername" class="w-100" placeholder="Enter Age" 
required value="<?php echo $row2['sellername'];?>" /></p>

<p><input type="text" name="selleremail" class="w-100" placeholder="Enter Name" 
required value="<?php echo $row2['selleremail'];?>" /></p>

<p><input type="text" name="wallet" class="w-100" placeholder="Enter Age" 
required value="<?php echo $row2['wallet'];?>" /></p>

<p><input type="text" name="status" class="w-100" placeholder="Enter Age" 
required value="<?php echo $row2['status'];?>" /></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>


<?php } ?>