<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=Studentship", "root", "");
  
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
try{
    if(isset($_REQUEST["term"])){
        // create prepared statement
        $sql = "SELECT * FROM student_profile sp 
        join student on sp.pid=student.pid
        join university u on u.uniId=student.iduni
        join degrees d on d.did=student.degree_id WHERE sp.fullname LIKE :term or d.degree_name LIKE :term or u.uniname LIKE :term";
        $stmt = $pdo->prepare($sql);
        $term = '%' .  $_REQUEST["term"] . '%';
        // bind parameters to statement
        $stmt->bindParam(":term", $term);
        // execute the prepared statement
        $stmt->execute();
        if($stmt->rowCount() > 0){
            while($row = $stmt->fetch()){ ?>
              <label style="font-size:20px">SEARCH RESULT:</label>
              <div class="row" style="width:50%">
               <form  >
                  
              <table style="background-color:#F8F5F2;color:#433E3F;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.788), 0 4px 8px rgba(0,0,0,.28);
   padding:80px; " border="0" cellspacing="15"height="250" class="tablee">
                   <tr>
                       <td width="20%"><label style="color:#433E3F;">Student name</label></td>
                       <td><input style="width:100%" type="text"class="txtF" disabled="disabled" value="<?php echo $row['fullname'] ?>"></input></td>
                   </tr>
                   <tr>
                       <td><label style="color:#433E3F;">Email</label></td>
                       <td><input type="text" style="width:100%" value = "<?php echo $row['email'] ?>" disabled="disabled" class="txtF"/></td>
                   </tr>
                   <tr>
                       <td><label style="color:#433E3F;">University</label></td>
                       <td><input type="text" style="width:100%" value = "<?php echo $row['uniname'] ?>" disabled="disabled" id="p-sname" class="txtF"/></td>
                        </tr>
                   <tr><td><label style="color:#433E3F;">Degree</label></td>
                   <td><input type="text" style="width:100%" disabled="disabled"  class="txtF" value = "<?php echo $row['degree_name'] ?>" ></input></td>  </tr>
                    <tr>
                       <td><label style="color:#433E3F;">Skills</label></td>
                       <td><textarea type="text" disabled="disabled" style="width:100%;length:30px" class="txtF"><?php echo $row['skills']?></textarea></td>
                       
                   </tr>
                  
                     <td><a href="EmployeePOV.php?pid=<?=$row['pid'] ?> "><button onclick="a" type="button" name="submit" style="width:200%;"  id="postbutton">Visit student profile</button></a></td>
                    </tr>
                     <?php  ?>
                    <br>
       <hr>
               </table> 
       </form> </div><?php      }
        } else{
            echo "<p>No matches found</p>";
        }
    }  
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
// Close statement
unset($stmt);
 
// Close connection
unset($pdo);
?>