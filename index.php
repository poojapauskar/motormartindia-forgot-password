<!DOCTYPE html>
<html lang="en">
<head>
<title>MMI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
 
</head>
<body>

<nav class="navbar navbar-default nav_customized" >
    <div class="navbar-header nav_header_customized">

          <a class="navbar-brand" href="./financer_dashboard.php">
          <img style="" src="images/logo.png" height="32px"></img></a>
          <span class="brand_logo_text brand_text">Motor Mart India</span>
          <a class="navbar-brand" href="./financer_dashboard.php">
        </a>
    </div>
<!--     <ul class="nav navbar-nav" style="float: right;">
      <li><a href="./dealer_dashboard.php">Home</a></li>
      <li><a href="./archived_sales.php">Archived Sales</a></li>
      <li><a href="./products.php">Products</a></li>
      <li><a href="./dealer_details.php">Dealer Details</a></li>
    </ul> -->
</nav>

<?php

session_start();

if(isset($_POST['reset'])){
$url2 = 'https://motormartindia.herokuapp.com/reset_password/';
$options2 = array(
  'http' => array(
    'header'  => array(
                  'TOKEN':$_GET['token'],
                  'PASSWORD: '.$_POST['pwd'],
                ),
    'method'  => 'GET',
  ),
);
$context2 = stream_context_create($options2);
$output2 = file_get_contents($url2, false,$context2);
/*echo $output2;*/
$arr2 = json_decode($output2,true);


if($arr2['status']==200){
  echo "<script>location='success.php'</script>";

}

}
?>
  
<div class="container" style="width:20%">
  <form action="./index.php" style="margin-top:5%" method="post">
    <div class="form-group">
      <input type="text" class="form-control" id="password" placeholder="Password" name="password">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
    </div>
    <button name="reset" type="submit" class="btn btn-success" style="">Reset</button>
  </form>
</div>



 <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
