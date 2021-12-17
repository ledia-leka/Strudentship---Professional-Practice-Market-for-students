<?php
session_start();
if(!isset($_SESSION["loggedincomp"]) && $_SESSION["loggedincomp"] != true){
  header("Location: login.php ");
  exit;}
$pdo = require('config.php');
$compid= $_SESSION['compid'];

$stmt = $pdo->prepare('  select * from jobinfo join newpost on jobinfo.jobid=newpost.jobid where  compid= :compid');
$p = ['compid'=>$compid];  
$stmt->execute($p);   
$count1=$stmt->rowCount();
if($stmt->rowCount() > 0)  
{ 
if($row=$stmt->fetchall(PDO::FETCH_ASSOC))  
{  
    extract($row); } }
  
$stmt1 = $pdo->prepare('select * from notification_center as nc 
join student s on nc.personalst_id=s.pid
join company_profile cp on cp.compid=nc.company_id
join notif_actions na on na.actionid=nc.actionid
join newpost np on np.postid=nc.postid
join jobinfo ji on ji.jobid=np.jobid where cp.compid= :compid and na.actionid=4 or cp.compid="K09876578L" and na.actionid=3;');
$p1 = ['compid'=>$compid];  
$stmt1->execute($p1);  
  $count=$stmt1->rowCount();
if($stmt1->rowCount() > 0)  {
if($row1=$stmt1->fetchall(PDO::FETCH_ASSOC))  
{  
    extract($row1); } } 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes">
    <title>Feed</title>
    <?php include('./headers/headercompany.php') ?>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/companyfeed.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("companysearch.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
<style>
  body{
    background-color:dimgray;
  }
  input{
  padding:1px;
  height: 28px;
  align-items: center;
  letter-spacing: 1px;
  border-radius: 3px;
  border:1px solid #ffffff;
  border-bottom-color: cornflowerblue;
  border-left-color:red;
  display: flex;
  margin-top:2px;
  margin-right:15%;
  transition: all .3s;
  text-align: left;
  padding-left:30px;
  color:black;
  font-weight: bold;
}
  textarea{
  padding:1px;
  height: 100px;
  width:200%;
  align-items: center;
  letter-spacing: 1px;
  border-radius: 3px;
  border:1px solid #ffffff;
  border-bottom-color: cornflowerblue;
  border-left-color:red;
  display: flex;
  margin-top:2px;
  transition: all .3s;
  text-align: left;
  padding-left:30px;
  color: black;
}
  label{
    font-size: 15px;
    font-weight: 600;
    margin-top: 5px;
    color:cornsilk ;
  }

  .notifications{
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.788), 0 4px 8px rgba(0,0,0,.28);
  padding:5%; 
  margin-top:20%;
   width:80%;
   align-items: center;
   background-color:darkgrey;
   padding-bottom:2%;
  }
  .notifications label{
    font-size: 26px;
    letter-spacing: 10px;
  }
  .notifications input{
    color:steelblue;
    background-color: snow;
    
  }
  .notifications p{
    color:black;
    font-weight: 700;
    margin-bottom:0;
    
  }
  </style>
<body>    
    <div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="search-box">
    <input style="width:30%;height:40px; align-self: flex-start; border-width:3px;margin-top:5%;;" type="text" name="studentprofile" id="search" class="txtF"  placeholder="Search for student:"></input>
    <h6 style="color:white;padding-left:5%;" class="result" >
      </h6>
    </div>
      </form>
      <div class="row">
      <div class="col-lg-4 col-md-12">
        <form class="notifications">
        <label>Notifications</label>
        <?php  
          if ($count > 0){ 
            foreach ($row1 as $rows1){ ?>
          <div>
         <a href="EmployeePOV.php?pid=<?=$rows1['personalst_id']?>"><input disabled="disabled" value="<?= $rows1['fullname'] ?>"/></a>
         <p> <?php echo $rows1['action_name'] ?> titled:<p>
         <input disabled="disabled" value="<?= $rows1['jobtitle'] ?>"/></a>
         <hr>
         
          </div>
          <?php }}else{
            ?><label>You have no new notifications</label> <?php
          } ?> 
        </form>
      </div>
      <div class="col-lg-6 col-md-12">
      <a href="./newpost.php"><button type="submit" onclick="a" id="postbutton" value="a">POST</button></a>
       <label  style="margin-top:5%;font-size: 20px;">The jobs you posted: </label>
       <form>
       <?php if ($count1 > 0){foreach ($row as $rows){ ?>
       <table border="0" cellspacing="15" width="700" height="250" class="tablee">
            <tr>
                <td><label>JobID</label></td>
                <td><input type="text" name="id" id="p-id" class="txtF" disabled="disabled" value="<?php echo $rows['jobid'] ?>"></input></td>
            </tr>
            <tr>
                <td><label>Job title</label></td>
                <td><input type="text" name="name" id="p-name" value = "<?php echo $rows['jobtitle'] ?>" disabled="disabled" class="txtF"/></td>
            </tr>
            <tr>
                <td><label>Position</label></td>
                <td><input type="text" name="surname"  value = "<?php echo $rows['position'] ?>" disabled="disabled" id="p-sname" class="txtF"/></td>
                <td><label>Location</label></td>
                <td><input type="text" disabled="disabled" value="<?php echo $rows['joblocation']?>" class="txtF"/></td>
            </tr>
            <tr><td><label>Job Description</label></td>
            <td><textarea type="text" disabled="disabled" value=""  class="txtF"><?php echo $rows['jobdesc']?></textarea></td>  </tr>
            <tr><td><label>Intern background</label></td>
            <td><textarea type="text" disabled="disabled"  class="txtF"><?php echo $rows['internbackground']?></textarea></td>
            </tr>            <tr>
                <td><label>Intern requests</label></td>
                <td><textarea type="text" disabled="disabled" value=""  class="txtF"><?php echo $rows['internreq']?></textarea></td>
                
            </tr>
            <tr>
                <td><label>Weeks</label></td>
                <td><input type="text"disabled="disabled" value="<?php echo $rows['weeks']?>"  class="txtF"/></td>
                <td><label>Hours per week</label></td>
                <td><input type="text" disabled="disabled" value="<?php echo $rows['hoursperweek']?>" class="txtF"/></td>
            </tr>
            <tr>
                <td><label>Paid or not:</label></td>
                <td><input type="text" disabled="disabled" value="<?php echo $rows['wage']?>"  class="txtF"/></td>
                <td><label>Remote or not:</label></td>
                <td><input type="text" disabled="disabled" value="<?php echo $rows['remote']?>"  class="txtF"/></td>
                <td><label>Flexible hours:</label></td>
                <td><input  type="text" disabled="disabled" value="<?php echo $rows['flexibleh']?>" class="txtF"/></td>
            </tr> 
           </form>    </tr>
              <br>
             
<hr>
        </table> <?php }}else{
            ?><label>You have not posted yet.</label> <?php
          } ?>
</form>
      </div>
     
    </div>
     </form>
</div>
</body>
</html>