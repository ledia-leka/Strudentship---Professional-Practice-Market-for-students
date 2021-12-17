<?php
session_start();
if(!isset($_SESSION["loggedincomp"]) && $_SESSION["loggedincomp"] != true){
    header("Location: login.php ");
    exit;}
$pdo = require('config.php');
$compid=$_SESSION['compid'];
if(isset($_POST['submit']))
{  
        $compid = $_SESSION['compid'];
        $title = $_POST['title'];
        $position = $_POST['position'];
        $location=$_POST['location'];
        $background=$_POST['background'];
        $weeks=$_POST['weeks'];
        $description=$_POST['description'];
        $internreq=$_POST['internreq'];
        $workh=$_POST['workh'];
        $paid=$_POST['paid'];
        $remote=$_POST['remote'];
        $flexible=$_POST['flexible'];
      

        $sql = 'select * from company where compid = :compid';
        $stmt = $pdo->prepare($sql);
        $p = ['compid'=>$compid];
        $stmt->execute($p);

            if($stmt->rowCount() == 1){
             $sql =  "INSERT INTO jobinfo(jobtitle,position,internbackground,jobdesc,internreq,weeks,hoursperweek,joblocation,wage,remote,flexibleh) values (:title,:position,:background,:description,:internreq,:weeks,:workh,:location,:paid,:remote,:flexible)";
            
                try{
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':title' => $title,
                        ':position' => $position,
                        ':background' => $background,
                        ':description' => $description,
                        ':internreq'=>$internreq,
                        ':weeks' => $weeks,
                        ':workh'=>$workh,
                        ':location'=> $location,
                        ':paid' => $paid,
                        ':remote' => $remote,
                        ':flexible' => $flexible,
                    ];
                     $handle->execute($params);
                  $jobid = $pdo->query("SELECT jobid FROM jobinfo ORDER BY jobid DESC LIMIT 1")->fetch();
                  
                  $jobid=$jobid[0];
                 $sql1= "INSERT INTO newpost(compid,jobid) values (:compid, :jobid)";
                    $handle1 = $pdo->prepare($sql1);
              
                     $params1 = [
                        ':compid'=>$compid,
                        ':jobid' => $jobid
                    ]; 
                    $handle1->execute($params1); 
                    $success = 'User has been created successfully';
                  
                }
                catch(PDOException $e){
                    echo($e->getMessage());
                }
            }
            else
            {
                echo "<script>alert('Id does not exist.')</script>";
            }  
}

?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes">
    <title>New Post</title>
    <?php include('./headers/headercompany.php') ?>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/newpost.css">

</head>
<body>
    <h1 class="post">Post a job position</h1>
    <div>
    <form method="Post">
        
    <input class="line" type="text" id="title" name="title" placeholder="Enter job title"  required>
    <input class="line" type="text" id="position" name="position" placeholder="Enter position"  required>
    <input class="line" type="text" id="location" name="location" placeholder="Enter locations"  required>
    <input class="background" name="background" placeholder="Enter intern's academic background"></input>
    <input class="jobdesc" name="weeks" placeholder="How many weeks does the internship last:"></input>
    <textarea class="jobdesc" name="description" placeholder="Enter job description"></textarea>
    <textarea class="internreq" name="internreq" placeholder="Enter intern requirements"></textarea>
    <input class="line"  type="text" id="workh" name="workh" placeholder="Enter working hours per week"  required>
    <label for="paid">Paid internship:</label>
    <select name="paid">
        <option value="Not paid">No</option>
        <option value="Paid">Yes</option>
        
    </select>
    <label for="remote">Remote work:</label>
    <select name="remote">
        <option value="Not remote">No</option>
        <option value="Remote work">Yes</option>
        
    </select>
    <label for="flexible">Flexible working hours:</label>
    <select name="flexible">
        <option value="Not flexible hours">No</option>
        <option value="Flexible hours">Yes</option>
       
    </select>
    <button type="submit" name="submit" onclick="a" id="postbutton">POST</button></a></div>
</form> </div>          
</body>
</html>