<?php
session_start();
$pdo = require('config.php');
if(isset($_SESSION["loggedinst"]) && $_SESSION["loggedinst"] === true){
   $compid= $_GET['compid'];
  }
elseif(isset($_SESSION["loggedincomp"]) && $_SESSION["loggedincomp"] === true){
    $compid= $_SESSION['compid'];
}else{
    header("Location: login.php ");
    exit;
}
$pdo = require('config.php');

$stmt = $pdo->prepare('SELECT * FROM company_profile where compid= :compid');
$p = ['compid'=>$compid];  
$stmt->execute($p);  
if($stmt->rowCount() > 0)  
{  
if($row=$stmt->fetch(PDO::FETCH_ASSOC))  
{  
    extract($row); } }
  
$stmt1 = $pdo->prepare('SELECT * FROM company where compid= :compid');
$p = ['compid'=>$compid];  
$stmt1->execute($p);  
if($stmt1->rowCount() > 0)  
{  
if($row1=$stmt1->fetch(PDO::FETCH_ASSOC))  
{  
    extract($row1); } }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes">
    <title>Company Profile</title>
    <?php include('./headers/headerstudent.php') ?>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/companyprofile.css">

</head>
<body>
    <section class="section1">
    <div class="row">
        <div class="col-lg-4 col-md-12">
        <img alt="logo" class="logo" src="upload/<?php echo $row['compimage']; ?>">
        </div>
        <div class="col-lg-8 col-md-12">
        <h1 class="header h1"><?php echo $row['compname']; ?></h1>
        <h4 class="header h4"><?php echo $row['slogan']; ?></h4>
        <h3 class="contact">Contact:</h3>
        <h3 class=" contact"><?php echo $row1['compemail']; ?></h3>|
        <h3 class=" contact"><?php echo $row['compphone']; ?></h3>
        
  </div>  </div></section>
  <section class="section2">
  <div class="row">
      <div class="col-lg-4 col-md-12">
          <image alt="about us" class="about-img" src="imgs/aboutus.png">
          <p class="about-p"><?php echo $row['about']; ?></p>
      </div>
      <div class="col-lg-4 col-md-12 c2">
          
      </div>
      <div class="col-lg-4 col-md-12">
        <image alt="what_we_do" class="what-img" src="imgs/what_we_do.png">
            <p class="about-w"><?php echo $row['what_wodo']; ?></p>
      </div>
  </div></section>
  <div class="internn">
      <h1>What we look for in an intern?</h1>
      <p class="intern"><?php echo $row['what_welookfor']; ?> </p>
  </div>
</body>
</html>