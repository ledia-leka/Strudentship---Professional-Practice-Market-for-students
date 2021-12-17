<?php 
session_start();
$pdo= require('config.php');
if(isset($_SESSION["loggedinst"]) && $_SESSION["loggedinst"] === true){
    header("Location: studentfeed.php ");
    exit;}
elseif(isset($_SESSION["loggedincomp"]) && $_SESSION["loggedincomp"] === true){
    header("Location: companyfeed.php ");
    exit;
}
if(isset($_SESSION["loggedinuni"]) && $_SESSION["loggedinuni"] === true){
    header("Location: showStudents.php ");
    exit;}
if(isset($_POST['submit'])){
    $sql="SELECT pid,email,password FROM student_profile where pid= :pid and email= :stemail";
$stmt1 = $pdo->prepare($sql);

$param_pid=$_POST['pid'];
$param_email=$_POST['stemail'];
$password=$_POST['stpassword'];
$stmt1->bindParam(":pid", $param_pid, PDO::PARAM_STR);
$stmt1->bindParam(":stemail",$param_email,PDO::PARAM_STR);
//$p = [':pid'=> $param_pid,
  //      ':email'=>$param_email];
$stmt1->execute();
if ($stmt1->rowCount() ==1)  
{   if($row=$stmt1->fetch()){
    $pid=$row['pid'];
    $email=$row['email'];
    $hasshed_pass=$row['password'];
    if (password_verify($password, $hasshed_pass)) {
        session_start();
		$_SESSION['loggedinst'] = TRUE;
		$_SESSION['pid'] = $pid;
     header("Location: studentfeed.php");
    }
    } else{
         echo "<script>alert('Incorrect credentials')</script>";
     }}else{
         echo "<script>alert('Incorrect credentials')</script>";
     
}}elseif (isset($_POST['submit1'])){
    $sql="SELECT compid,compemail,comppass FROM company where compid= :compid and compemail= :compemail";
$stmt1 = $pdo->prepare($sql);

$param_compid=$_POST['compid'];
$param_compemail=$_POST['compemail'];
$password=$_POST['compass'];
$stmt1->bindParam(":compid", $param_compid, PDO::PARAM_STR);
$stmt1->bindParam(":compemail",$param_compemail,PDO::PARAM_STR);
$stmt1->execute();
if ($stmt1->rowCount() ==1)  
{   if($row=$stmt1->fetch()){
    $compid=$row['compid'];
    $compemail=$row['compemail'];
    $hasshed_pass=$row['comppass'];
    if (password_verify($password, $hasshed_pass)) {
        session_start();
		$_SESSION['loggedincomp'] = TRUE;
		$_SESSION['compid'] = $compid;
     header("Location: companyfeed.php ");
    } else{
         echo "<script>alert('Incorrect credentials')</script>";
     }}else{
         echo "<script>alert('Incorrect credentials')</script>";
     
}}}elseif (isset($_POST['submit2'])){
    $sql="SELECT repId,unipassword FROM universityregister where repId= :repId";
$stmt1 = $pdo->prepare($sql);

$param_repId=$_POST['repid'];
$password=$_POST['unipass'];
$stmt1->bindParam(":repId", $param_repId, PDO::PARAM_STR);
$stmt1->execute();
if ($stmt1->rowCount() ==1)  
{   if($row=$stmt1->fetch()){
    $repId=$row['repId'];
    $hasshed_pass=$row['unipassword'];
    if (password_verify($password, $hasshed_pass)) {
        session_start();
		$_SESSION['loggedinuni'] = TRUE;
		$_SESSION['repId'] = $compid;
     header("Location: showStudents.php ");
    }
    } else{
         echo "<script>alert('Incorrect credentials')</script>";
     }}else{
         echo "<script>alert('Incorrect credentials')</script>";
     
}}
?>

<!DOCTYPE html >
<html >

<head>
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes">
    <title>Students to attend professional practice.</title>
    <?php include('./headers/headermain.php') ?>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/login.css">
<title>Login page</title>
</head>

<body>

<div class="form"><form action="" method="Post" class="tab">
	<div class="login"><h1 class="active" onclick="tabs(0)">Student </h1>
	<h1  onclick="tabs(1)">Company </h1>
    <h1  onclick="tabs(2)">University</h1>
</div>
	
<div>
<img src="./imgs/ll.png" alt="img" class="img" style="height: 130px;width:130px; ">
<input class="line" type="text" id="usr" name="pid" placeholder="Enter personal id number"  required> 
<input class="line" type="text" id="usr" name="stemail" placeholder="Enter email"  required> 
	<input class="line" id="pass" type="password" name="stpassword" placeholder="Enter password"  required>
	</div>	
	
	<button  id="button" type="submit" name="submit" onclick="checkPass()">Login</button>
	<div><label style="font-size:18px; font-family: 'Roboto' ;color:white;border-color:red;">
	<input class="chbox" type="checkbox" onclick="showfunction('pass') "name="show"> Show Password
      </label></div>
</form>
<login>
<form action="#" method="post" class="tab">
	<div class="login"><h1 onclick="tabs(0)">Student</h1>
	<h1 class="active" onclick="tabs(1)">Company</h1>
    <h1  onclick="tabs(2)">University</h1>
	</div>
    	
<div>
<img src="./imgs/ll.png" alt="img" class="img" style="height: 130px;width:130px; ">
<input class="line" type="text" id="usr" name="compid" placeholder="Enter company identification number"  required> 
<input class="line" type="text" id="usr" name="compemail" placeholder="Enter email"  required> 
	<input class="line" id="pass" type="password" name="compass" placeholder="Enter password"  required>
	</div>	
	
	<button  id="button" type="submit1" name="submit1" onclick="checkPass()">Login</button>
	<div><label style="font-size:18px; font-family: 'Roboto' ;color:white;border-color:red;">
	<input class="chbox" type="checkbox" onclick="showfunction('pass') "name="show"> Show Password
      </label></div>
</form></form></login>
<form action="#" method="post" class="tab">
	<div class="login"><h1 onclick="tabs(0)">Student</h1>
	<h1  onclick="tabs(1)">Company</h1>
    <h1  class="active" onclick="tabs(2)">University</h1>
</div>
	
<div>
<img src="./imgs/ll.png" alt="img" class="img" style="height: 130px;width:130px; ">
<input class="line" type="text" id="usr" name="repid" placeholder="Enter representative personal id number"  required> 
	<input class="line" id="pass" name="unipass" type="password" placeholder="Enter password"  required>
	</div>	
	
	<button  id="button" type="submit" name="submit2" onclick="checkPass()">Login</button>
	<div><label style="font-size:18px; font-family: 'Roboto' ;color:white;border-color:red;">
	<input class="chbox" type="checkbox" onclick="showfunction('pass') "name="show"> Show Password
      </label></div>
</form></div>
<script>
function showfunction(y){
var x=document.getElementById(y);
if(x.type==="password"){
x.type="text";
}else{
x.type="password";}}
</script>
<script type="text/javascript">
	const Tbut=document.querySelectorAll(".login h1");
	const tab=document.querySelectorAll(".tab");
	function tabs(panelIndex){
		tab.forEach(function(node){
			node.style.display="none";});
		tab[panelIndex].style.display="block";}tabs(0)</script>
</script>



</body>