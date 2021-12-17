<?php
session_start();
$pdo = require('config.php');
if(isset($_SESSION["loggedinst"]) && $_SESSION["loggedinst"] === true){
   $pid= $_SESSION['pid'];
  }
elseif(isset($_SESSION["loggedincomp"]) && $_SESSION["loggedincomp"] === true){
    $pid= $_GET['pid'];
}else{
    header("Location: login.php ");
    exit;
}

$stmt = $pdo->prepare(' select * from student as s
join university as u on s.iduni= u.uniId
join degrees as d on  d.did=s.degree_id where pid= :pid');
$p = ['pid'=>$pid];  
$stmt->execute($p);  
if($stmt->rowCount() > 0)  
{  
if($row=$stmt->fetch(PDO::FETCH_ASSOC))  
{  
    extract($row);
 } }
  
$stmt1 = $pdo->prepare('SELECT * FROM student_profile where pid= :pid');
$p1 = ['pid'=>$pid];  
$stmt1->execute($p1);  
if($stmt1->rowCount() > 0)  
{  
if($row1=$stmt1->fetch(PDO::FETCH_ASSOC))  
{  
    extract($row1); } } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes">
    <title>Student Profile</title>
    <?php
if(isset($_SESSION["loggedinst"]) && $_SESSION["loggedinst"] === true){
   include('./headers/headerstudent.php');
  }
elseif(isset($_SESSION["loggedincomp"]) && $_SESSION["loggedincomp"] === true){
    include('./headers/headercompany.php');
}?>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/student.css">

</head>
<body>
    <main class="site-main">
<section class="banner">

    <div class="container">

        <div class="row">
        <div class="col-lg-6 col-md-12">
                <h3 class="text-title" style="color: red;">Hello_______________</h3>
                <h1 class="text-title text-uppercase">I am <?php echo $row['fullname'] ?></h1>
                <h4 class="text-title text-uppercase"><?php echo $row['degree_name'] ?></h4>
                <div class="d-flex flex-row flex-wrap">
                <a href="./hirestudent.php?postid=1&&pid=<?=$row['pid'] ?>">  <button type="button" class="btn button primary-button m-4 test-uppercase">Hire me</button>
                </a>   <button type="button" onclick="window.print()" class="btn button secondary-button m-4 test-uppercase">Get CV</button>
                </div>
            </div>
        <div class="col-lg-6 col-md-12">
                <img src="./imgs/ll.png" alt="img" class="img" style="max-width: 90%; ">

            </div>
        </div>
       
    </div>
</section>
<section class="resumee">
    <div class="container">
        <div class="row">
<div class="col-lg-4 col-md-12">
   <div class="card">
       <div class="card-header"  
        <a id="image-from-file"
      style="background-image: url(./upload/<?php echo $row1['image']?>); width:315px; margin-left: 0px"></a> 
             <div class="card-header-slanted-edge">
                 <svg viewBox="0 0 1000 200"><path class="polygon" d="M-20,200,1000,0V200Z" /></svg>
                <a href="./contactform.php" id="iconn" class="btn-message"><span class="icons"></span></a>
              </div> 
        </div>
  
        <div class="card-body">
            <h2 class="name"><?php echo $row1['fullname']?></h2>
            <h3 class="data">University:<?php echo $row['uniname']?> <br>Degree:<?php echo $row['degree_name']?><br>Email:<?php echo $row['email']?><br>Phone number:<?php echo $row1['phone']?><br>City:<?php echo $row1['city']?><br>Languages:<?php echo $row1['languages']?></h3>
            <div class="socials">
              <a href="<?php echo $row1['linkdin']?>">  <i class="fab fa-linkedin"></i></a>
              <a href="<?php echo $row1['github']?>">  <i class="fab fa-github"></i></a>
              <a href="<?php echo $row1['otherlinks']?>">  <i class="fab fa-google-drive"></i></a>
            </div> 
        </div> 
  </div>
    </div>
<div class="col-lg-4 col-md-12">
   <div class="cvcard-why">
    <h1>Why you should hire me...</h1>
    <p><?php echo $row1['why_you']?></p>
    
    </div></div>
    <div class="col-lg-4 col-md-12">
    <div class="cvcard-skills">
        <h6>Skills</h6>
        <p><?php echo $row1['skills']?></p>
        </div>
        <br>
       <div class="cvcard-lang">
            <h6>Education</h6>
            <p><?php echo $row1['education']?></p>
            </div> </div>
       <div class="cvcard-Experience">
                <h6>Experience</h6>
                <p><?php echo $row1['experience']?></p>
                </div> 

</section>

</main>

    <!--JQuery js-->
    <script src="js/jquery.js"></script>
    <!-- JS Bootstrap-->
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>

