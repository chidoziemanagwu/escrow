<?php
session_start();
include('db.php');

if(!isset($_SESSION['is_logged_in'])){
    header('location:login.php');
}
$email = $_SESSION['is_logged_in'];
$sql = "SELECT * FROM users WHERE username = '$email'";
$result = $con->query($sql);
$row = $result->fetch_assoc();

$id = $row['id'];
$escrowfee = $row['escrowfee'];

$sql2 = "SELECT * FROM escrow WHERE uid = '$id'";
$result2 = $con->query($sql2);

$sql3 = "SELECT * FROM escrow WHERE uid = '$id'";
$result3 = $con->query($sql3);
$row3 = $result3->fetch_assoc();
$escrowfee = $row3['escrowfee'];

$sql4 = "SELECT * FROM admin";
$result4 = $con->query($sql4);
$row4 = $result4->fetch_assoc();
$escrowset = $row4['escrowset'];
$escrowwallet = $row4['escrowwallet'];


if(isset($_POST['btc'])){
    
    $fullname = $_POST['fullname'];
    $amount = $_POST['btc'];
    $_SESSION['mixinamt'] = $amount;
    
     $query = "INSERT into `mixin` (fullname, amount, status)
            VALUES ('$fullname', '$amount', 'PENDING')";
            $result = mysqli_query($con,$query);
            if($result){
                header( "refresh:3;url=mixin.php" );
                   echo '<script>alert(" Bitcoin Mixing Request has been placed ")</script>';
                
            }else{
                 header( "refresh:3;url=dashboard.php" );
                   echo '<script>alert(" Bitcoin Mixing Request failed!! ")</script>';
            }
}
?>
<!DOCTYPE html>
<html>
<!-- Mirrored from www.Escrow.com/check-status by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jun 2020 12:58:13 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Check Escrow Status</title>
    <base>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="en-US">
    <META NAME="CONTENT-LANGUAGE" CONTENT="en-US">
    <META NAME="OWNER" CONTENT="support@Escrow.com">
    <META NAME="AUTHOR" CONTENT="Escrow.com">
    <META NAME="ROBOTS" CONTENT="index,follow">
    <META NAME="REVISIT-AFTER" CONTENT="3days">
    <META NAME="KEYWORDS" CONTENT="bitcoin escrow, litecoin escrow, BTC escrow, LTC escrow">
    <meta name="description" content="Escrow provider for many cryptocurrencies.">
    <script type="text/javascript">
    if (top != self) { top.location.replace(self.location.href); }
    </script>
    <link href="maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="assets/css/app3.css">
    <script src="ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
    <script>
        WebFont.load({
        google: {
          families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Montserrat:400,700","Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic"]
        }
      });
    </script>
    <!--<link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-touch-icon-57x57.png">-->
    <!--<link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-touch-icon-60x60.png">-->
    <!--<link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-touch-icon-72x72.png">-->
    <!--<link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-touch-icon-76x76.png">-->
    <!--<link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-touch-icon-114x114.png">-->
    <!--<link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-touch-icon-120x120.png">-->
    <!--<link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-touch-icon-144x144.png">-->
    <!--<link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-touch-icon-152x152.png">-->
    <!--<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon-180x180.png">-->
    <!--<link rel="icon" type="image/png" href="images/favicon/favicon-32x32.png" sizes="32x32">-->
    <!--<link rel="icon" type="image/png" href="images/favicon/android-chrome-192x192.png" sizes="192x192">-->
    <!--<link rel="icon" type="image/png" href="images/favicon/favicon-96x96.png" sizes="96x96">-->
    <!--<link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png" sizes="16x16">-->
    <!--<link rel="manifest" href="manifest.json">-->
    <!--<link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#f47721">-->
    <!--<meta name="msapplication-TileColor" content="#da532c">-->
    <!--<meta name="msapplication-TileImage" content="/images/favicon/mstile-144x144.png">-->
    <!--<meta name="theme-color" content="#ffffff">-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link rel="canonical" href="check-status.html" />
</head>

<body style="background-image:none">
   <nav class='navbar navbar-static-top' style="background-color: #5bc0de">
            <a href="home.php" class="logo">
                <img width="185" src="assets/img/logo1.png">
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-dd" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="links navbar-collapse collapse" id="navbar-dd">
                <ul class="nav navbar-nav">
                <?php
                if(isset($_SESSION['is_logged_in'])){
               echo'<li><a href="dashboard.php">Dashboard</a></li>';
                }
                ?>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="supported-coins.php">Supported Coins</a></li>
                    <li><a href="create-escrow.php">Create Escrow</a></li>
                    <li><a href="check-status.php">Check Status</a></li>
                    <li><a href="help.php">Help</a></li>
                    <?php
                if(!isset($_SESSION['is_logged_in'])){
               echo'<li><a href="login.php">sign in</a></li>
                    <li><a href="register.php" class="btn btn-warning">create an account</a></li>';
                }else{
                    echo '<li><a href="logout.php" class="btn btn-warning">Logout</a></li>';
                }
                    ?>
                </ul>
            </div>
        </nav>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Current Escrow Fee Charge and Wallet Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Escrow Fee for current Transaction</h5>
        <p><?php echo $escrowset;  ?></p>
        <hr>
        <h5>Escrow Wallet Address for payment</h4>
        <p><?php echo $escrowwallet;  ?></p>
        <hr>
        <h5>Escrow Ratio</h5>
        <p><?php echo ' Buyer % '.$escrowfee.' Seller %';  ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="exampleModalLabel">Enter Bitcoin to Mix</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>Bitcoin mixing makes your bitcoin untraceable to you</p>
          <form method="post"  action="">
  <div class="mb-3">
    <input type="text" readonly class="form-control" name="fullname" value="<?php echo  $row['username'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Bitcoin Amount</label>
    <input type="text" class="form-control" name="btc" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


    <div class="escrow-form" style="width:90%; margin:auto;" >
        <p>Hello, <b><?php echo $_SESSION['is_logged_in'] ?></b> </p>
        <button class="btn btn-success w-75" type="button" data-toggle="modal" data-target="#exampleModal"> ESCROW FEE DETAILS </button>
        
        <button class="btn btn-success w-75" type="button" data-toggle="modal" data-target="#exampleModal2"> BITCOIN MIXING</button>
        
        <a href="btcmixin.php"><button class="btn btn-secondary btn-sm w-75" > BITCOIN MIXING TRANSACTION HISTORY</button></a>
        
        <div class="table-responsive" style="padding-top:20px; margin-top:30px">
            <table class="table">
                <tr>
<th>Total Amount</th>
<th>Buyer name</th>
<th>Buyer email</th>
<th>Seller name</th>
<th>Seller email</th>
<th>Status</th>
<th>Transaction Pin</th>
<th>Date</th>
</tr>

<?php
while($row2 = $result2->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row2['amount'].' '. $row2['currency'] ; ?></td>
    <td><?php echo $row2['buyername']; ?></td>
    <td><?php echo $row2['buyeremail']; ?></td>
    <td><?php echo $row2['sellername']; ?></td>
    <td><?php echo $row2['selleremail']; ?></td>
    <td><?php echo $row2['status']; ?></td>
    <td><?php echo $row2['pin']; ?></td>
    <td><?php echo date('Y-m-d', strtotime($row2['trans'])); ?></td>
    </tr>
    <?php
}
?>
            </table>
        </div>

    </div>
  <div class="container py-4">
         <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = 'http://demoblogtest.unaux.com';  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = 08159517374; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://escrow-bond-com.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </div>
    <script type="text/javascript" src="ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5eeb8a819e5f69442290d8a2/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
<!-- Mirrored from www.Escrow.com/check-status by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jun 2020 12:58:13 GMT -->

</html>