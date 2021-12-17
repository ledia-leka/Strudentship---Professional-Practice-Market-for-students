<?php
session_start();
$pdo= require('config.php'); 
        $compid = $_GET['compid'];
        $pid = $_SESSION['pid'];
         $postid=$_GET['postid'];

         $sql = 'select * from notification_center where company_id = :compid and personalst_id = :pid and postid= :postid;';
         $stmt = $pdo->prepare($sql);
         $p = ['compid'=>$compid,
                'pid'=>$pid,
                'postid'=> $postid];
         $stmt->execute($p);
         if($stmt->rowCount() == 0){
 
         try{
    $query = "insert into notification_center(personalst_id,postid,company_id,actionid) values('$pid','$postid','$compid',4)";
    $stmt = $pdo->prepare($query);
    //$stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT);
    $stmt->execute();} catch(PDOException $e){
        var_dump($e->getMessage());
     }

    }
    header("Location: studentfeed.php");
    
     