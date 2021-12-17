
    <?php
    session_start();
    $conn = require 'config.php';
    $msg = '';
	$msgClass = '';
    
    global $conn ;
    if(filter_has_var(INPUT_POST, 'submit')){
            $nrid = htmlspecialchars($_POST['nrid']);
            $stid = htmlspecialchars($_POST['stid']);
            $fullname = htmlspecialchars($_POST['fullname']);
            $email = htmlspecialchars($_POST['email']);
            $iduni = htmlspecialchars($_POST['iduni']);
            $degree = htmlspecialchars($_POST['degree']);

            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $msg = 'Invalid email';
                $msgClass = 'alert-danger';
                
            } else{
      
       
       $sql = "Insert into student (pid,studentid,fullname,email,iduni,degree_id) values ('$nrid','$stid','$fullname','$email','$iduni','$degree')";
        $conn->exec($sql);
        $conn= null;
      header("Location: showStudents.php ");
       
       die;
            }}
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes">
    <title>Students to attend professional practice.</title>
    <?php 
    $conn = require 'config.php' ;
    include('./headers/headeruni.php')
    ?>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/addStudents.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {term: inputVal}).done(function(data){
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
<script>
$(document).ready(function(){
    $('.search-degree input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".degree");
        if(inputVal.length){
            $.get("search-degree.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".degree p", function(){
        $(this).parents(".search-degree").find('input[type="text"]').val($(this).text());
        $(this).parent(".degree").empty();
    });
});</script>
</head>
<body>
  <h1>Add student:</h1>
  <div class="tbl">
    <form  method="Post" class="form" name="form1" action="<?php echo $_SERVER['PHP_SELF'];?>">
<table class="tablee">
		<tr>
		    <td><label>ID Card Number</label></td>
			<td id="idNumber" ><input type="" name="nrid" id="nr-id" value="<?php echo isset($_POST['nrid']) ? $nrid : ''; ?>" class="nr-id" required/></td>	</tr>
		
			<td><label>Student ID Number</label></td>
            <td id="studentid" ><input type="" name="stid" id="st-id" value="<?php echo isset($_POST['stid']) ? $stid : ''; ?>" class="st-id" required/></td>
			</tr>
		<tr>
			<td><label>Full Name</label></td>
			<td id="fullname" ><input type="" name="fullname" id="fullname" value="<?php echo isset($_POST['fullname']) ? $fullname : ''; ?>" class="fullname" required/></td>
				</tr>	
                <?php if($msg != ''): ?>
    		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    	<?php endif; ?>
		<tr><td><label>Email</label></td>
            <td id="email" ><input type="" name="email" id="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" class="email" required/></td>
        </tr>
        <tr>
		    <td><label>University</label></td>
			<td id="iduni" >
            <div class="search-box">
        <input name="iduni" type="text" autocomplete="off" placeholder="" value="<?php echo $_SESSION['uniname']; ?>" required/>
        <h6 style="color:white;padding-left:5%;" class="result" >
      </h6>
    </div>
    </div>
</div></div></td>

					</tr>
    
			<tr>
			<td><label>Degree</label></td>	
            <td id="degree" >
            <div class="search-degree">
        <input name="degree" value="<?php echo isset($_POST['degree']) ? $degree : ''; ?>" type="text" autocomplete="off" placeholder="Search degree..." required />
        <h6 style="color:white;padding-left:5%;" class="degree" >
      </h6>
        </tr>
        <tr>
			
	</table>
	<button type="submit" name="submit" id="button" class="btn">Submit</button></form>
	</div>

    <!--JQuery js-->
    <script src="js/jquery.js"></script>
    <!-- JS Bootstrap-->
    <script src="./js/bootstrap.min.js"></script>
    
</body>
</html>