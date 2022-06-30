<?php
require('db.php');
// include("auth.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_REQUEST['id1c'])){
$id=$_REQUEST['id1c'];
$query = "SELECT * from escrow2 where id='".$id."'"; 
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
<h1>Update Escrow Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
     
// header( "refresh:5;url=wherever.php" );
$id=$_REQUEST['id'];

// $trn_date = date("Y-m-d H:i:s");
$trn_date=$_REQUEST['transactiondate'];
$usertype =$_REQUEST['usertype'];
$transactiontype =$_REQUEST['transactiontype'];
$currency =$_REQUEST['currency'];
$price =$_REQUEST['price'];
$description = $_REQUEST['description'];
$address =$_REQUEST['address'];
$status = $_REQUEST['status'];
// echo $trn_date;
// $submittedby = $_SESSION["username"];

$update="update escrow2 set transactiondate='".$trn_date."',
usertype='".$usertype."', transactiontype='".$transactiontype."',
currency='".$currency."', price='".$price."', description='".$description."', address='".$address."', status='".$status."' where id='".$id."'";
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
<p>
    Current type: <?php echo $row['usertype'];?>
<select class="form-select" name="usertype" aria-label="Default select example">
  <option value="Buyer">Buyer</option>
  <option value="Seller">Seller</option>
</select></p>
<p>
Current Transaction Type:  <?php echo $row['transactiontype'];?>
<select class="form-select" name="transactiontype" aria-label="Default select example">
  <option value="Online">Online</option>
  <option value="Face to Face">Face to Face</option>
</select></p>
<p>
Current Currency: <?php echo $row['currency'];?>:
<select class="form-select" name="currency" aria-label="Default select example">
  <option value="BTC">Bitcoin</option>
  <option value="LTC">Litecoin</option>
  <option value="BCH">Bitcoin Cash</option>
  <option value="ETH">Ethereum</option>
  <option value="$">Dollars</option>
  <option value="£">Pounds</option>
  <option value="€">Euros</option>
</select>
</p>
<p>
<label for="exampleInputPassword1" class="form-label">Price</label>
<input type="text" class="w-100" name="price" placeholder="Enter Age" 
required value="<?php echo $row['price'];?>" /></p>

<p>
<label for="exampleInputPassword1" class="form-label">Description</label>
<input type="text" class="w-100" name="description" placeholder="Enter Age" 
 value="<?php echo $row['description'];?>" /></p>

<p>
<label for="exampleInputPassword1" class="form-label">Address</label>
<input type="text" class="w-100" name="address" placeholder="Enter Age" 
required value="<?php echo $row['address'];?>" /></p>

<p>
<label for="exampleInputPassword1" class="form-label">Status</label>
<input type="text" class="w-100" name="status" placeholder="Enter Age" 
required value="<?php echo $row['status'];?>" /></p>

<p>
<label for="exampleInputPassword1" class="form-label">Current Date: <?php echo $row['transactiondate'];?></label>
<input type="date" class="w-100" name="transactiondate" placeholder="Enter Age" 
required value="" /></p>
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