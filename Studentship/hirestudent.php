<?php
session_start();
$pdo= require('config.php'); 
        $compid = $_SESSION['compid'];
        $pid = $_GET['pid'];
         $postid=$_GET['postid'];

         $sql = 'select * from notification_center where company_id = :compid and personalst_id= :pid and actionid=1';
         $stmt = $pdo->prepare($sql);
         $p = ['compid'=>$compid,
                'pid'=>$pid];
         $stmt->execute($p);
         if($stmt->rowCount() == 0){
 
         try{
    $query = "insert into notification_center(personalst_id,postid,company_id,actionid) values('$pid','$postid','$compid',1)";
    $stmt = $pdo->prepare($query);
    //$stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT);
    $stmt->execute();} catch(PDOException $e){
        var_dump($e->getMessage());
        
     }

    }
  header("Location: companyfeed.php");
    
     